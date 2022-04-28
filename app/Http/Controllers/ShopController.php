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
        $quantity = $request->get('product-quantity');
        $existed = false;
        if (session()->has('product_cart')) {
            $productCarts = session()->pull('product_cart');
            foreach ($productCarts as &$productCart) {
                $productInCart = $productCart['product'];
                if ($productInCart->id == $product->id) {
                    $productCart['quantity'] += $quantity;
                    $existed = true;
                }
            }
            if ($existed == false) {
                $newProductCart = [];
                $newProductCart['product'] = $product;
                $newProductCart['quantity'] = $quantity;
                array_push($productCarts, $newProductCart);
            }
            session()->put('product_cart', $productCarts);
        } else {
            $productCart = [];
            $productCart['product'] = $product;
            $productCart['quantity'] = $quantity;
            session()->push('product_cart', $productCart);
        }

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
        $total = 0;
        if ($productCarts) {
            foreach ($productCarts as $productCart) {
                $total += optional($productCart['product'])->getPrice() * $productCart['quantity'];
            }
        }

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
                foreach ($productCarts as $productCart) {
                            $orderItem = new OrderItem();
                            $orderItem->order_id = $order->id;
                            $orderItem->product_id = $productCart['product']->getId();
                            $orderItem->amount = $productCart['quantity'];
                            $orderItem->updateTimestamps();
                            $orderItem->save();
                        $this->productService->reduceQuantity($productCart['product'], $productCart['quantity']);
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
