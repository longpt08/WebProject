<?php

namespace App\Http\Controllers;

use App\Http\Enums\Gender;
use App\Http\Enums\InvoiceStatus;
use App\Http\Enums\OrderStatus;
use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $categories = $this->categoryService->getCategories();
        $products = $this->productService->getProducts();
        if ($request['search']) {
            $products = $this->productService->search($request['search']);
        }
        if ($request['from'] && $request['to']) {
            $products = $this->productService->filterPrice($request['from'], $request['to']);
        }
        if ($request['category']) {
            $category = Category::query()->find($request['category']);
            $products = $category->products;
        }
        return view('user.shop-sidebar')->with([
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function addCart(Request $request)
    {
        $product = $this->productService->getProductById($request->id);
        session()->push('product_cart', $product);
        $route = session()->get('current');
        return redirect()->route($route, ['id' => $request->id]);
    }

    public function removeCart($id)
    {
        foreach (session()->get('product_cart') as $key => $product) {
            if ($product['id'] == $id) {
                session()->forget('product_cart.'.$key);
                break;
            }
        }
        $route = session()->get('current');
        return redirect()->route($route, ['id' => $id]);
    }

    public function getCart()
    {
        return view('user.cart');
    }

    public function checkout()
    {
        return view('user.checkout');
    }

    public function confirm(Request $request)
    {
        $description = $request['full_name'] . " (" . $request['phone_number'] . ") " . $request['user_address'];
        $productCarts = session()->get('product_cart');
        $productCounts = array_count_values(array_column(session()->get('product_cart'), 'id'));
        $total = array_sum(array_column(session()->get('product_cart'), 'price'));
        $userId = session()->get('user')->id;
        DB::beginTransaction();
        try {
            $order = new Order();
            $order->description = $description;
            $order->total = $total;
            $order->user_id = $userId;
            $order->status = OrderStatus::CONFIRMED;
            $order->updateTimestamps();
            if ($order->save()) {
                foreach ($productCounts as $key => $count) {
                    foreach ($productCarts as $product) {
                        if ($key == $product['id']) {
                            $orderItem = new OrderItem();
                            $orderItem->order_id = $order->id;
                            $orderItem->product_id = $product['id'];
                            $orderItem->amount = $count;
                            $orderItem->updateTimestamps();
                            $orderItem->save();
                            break;
                        }
                        $this->productService->reduceQuantity($product, $count);
                    }
                }

                $invoice = new Invoice();
                $invoice->order_id = $order->id;
                $invoice->user_id = $userId;
                $invoice->total = $total;
                if ($request['card_number'] && $request['cvc'] && $request['expiry']) {
                    $invoice->description = 'Card method';
                    $invoice->status = InvoiceStatus::PAID;
                }
                $invoice->description = 'COD method';
                $invoice->status = InvoiceStatus::UNPAID;
                $invoice->updateTimestamps();
                $invoice->save();
                session()->forget('product_cart');
                DB::commit();
            }
        } catch (\Exception $exception) {
            Log::error($exception . ' UID: ' . $userId);
            DB::rollBack();
            return view('checkout')->with(['alert' => 'Something went wrong!']);
        }
        return view('user.confirmation');
    }
}
