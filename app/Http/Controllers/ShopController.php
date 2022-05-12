<?php

namespace App\Http\Controllers;

use App\Http\Enums\InvoiceStatus;
use App\Http\Enums\OrderStatus;
use App\Http\Enums\PaymentMethod;
use App\Http\Services\Utility;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderItem;
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

    public function addCartByButton($id)
    {
        $product = $this->productService->getProductById($id);
        $existed = false;
        $new = false;
        if (session()->has('product_cart')) {
            $productCarts = session()->pull('product_cart');
            foreach ($productCarts as &$productCart) {
                $productInCart = $productCart['product'];
                if ($productInCart->id == $product->id) {
                    $productCart['quantity']++;
                    $existed = true;
                }
            }
            if ($existed == false) {
                $newProductCart = [];
                $newProductCart['product'] = $product;
                $newProductCart['quantity'] = 1;
                array_push($productCarts, $newProductCart);
                $new = true;
            }
            session()->put('product_cart', $productCarts);
        } else {
            $productCart = [];
            $productCart['product'] = $product;
            $productCart['quantity'] = 1;
            session()->push('product_cart', $productCart);
            $new = true;
        }
        if ($new) {
            $element = "<div id='productCartTemplate' class='media product-" . $product->getId() . "'>
    <a href='/product-single/" . $product->getId() . "'>
        <img class='media-object'
             src='" . asset('images/shop/products/' . $product->getImageUrl()) . "'
             alt='image' style='height: 80px; object-fit: contain'/>
    </a>
    <div class='media-body'>
        <h4 class='media-heading'><a
                href='/product-single/" . $product->getId() . "'>" . $product->name . "</a>
        </h4>
        <div class='cart-price'>
                                                <span
                                                    class='quantity-" . $product->getId() . "'>" . 1 . " </span>x
            <span>" . Utility::convertPrice($product->getPrice()) . "</span>
        </div>
        <h5 class='total-" . $product->getId() . "'>
            <strong>" . Utility::convertPrice($product->getPrice()) . "</strong>
        </h5>
    </div>
    <i id='remove-" . $product->getId() . "'
       class='button tf-ion-close remove' data-toggle='modal'
       data-target='#removeModal'></i>
    </div>";
        }

        $total = 0;
        $productCarts = session()->get('product_cart');
        foreach ($productCarts as $product) {
            $total += optional($product['product'])->getPrice() * $product['quantity'];
        }
        return [
            $productCart['quantity'],
            Utility::convertPrice($productCart['quantity'] * $productCart['product']->getPrice()),
            Utility::convertPrice($total),
            $new ? $element : null,
        ];
    }

    public function remove($id)
    {
        $productCarts = session()->pull('product_cart');
        foreach ($productCarts as &$productCart) {
            if ($productCart['product']->getId() == $id) {
                $productCart = null;
                break;
            }
        }
        $total = 0;
        if (count(array_filter($productCarts)) > 0) {
            foreach ($productCarts as $product) {
                $total += optional($product['product'])->getPrice() * $product['quantity'];
            }
        }
        session()->put('product_cart', array_filter($productCarts));
        return Utility::convertPrice($total);
    }

    public function plus($id)
    {
        $productCarts = session()->pull('product_cart');
        foreach ($productCarts as $key => &$productCart) {
            if ($productCart['product']->getId() == $id) {
                $productCart['quantity']++;
                break;
            }
        }
        session()->put('product_cart', $productCarts);
        $total = 0;
        foreach ($productCarts as $product) {
            $total += optional($product['product'])->getPrice() * $product['quantity'];
        }
        return [
            $productCart['quantity'],
            Utility::convertPrice($productCart['quantity'] * $productCart['product']->getPrice()),
            Utility::convertPrice($total)
        ];
    }

    public function minus($id)
    {
        $productCarts = session()->pull('product_cart');
        foreach ($productCarts as $key => &$productCart) {
            if ($productCart['product']->getId() == $id) {
                $productCart['quantity']--;
                break;
            }
        }
        session()->put('product_cart', $productCarts);
        $total = 0;
        foreach ($productCarts as $product) {
            $total += optional($product['product'])->getPrice() * $product['quantity'];
        }
        return [
            $productCart['quantity'],
            Utility::convertPrice($productCart['quantity'] * $productCart['product']->getPrice()),
            Utility::convertPrice($total)
        ];
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
        $userId = session()->get('user')->id;
        $description = $request['full_name'] . " (" . $request['phone_number'] . ") " . $request['user_address'];
        $productCarts = session()->pull('product_cart');
        $total = 0;
        try {
            if ($productCarts) {
                foreach ($productCarts as &$productCart) {
                    if (!$this->productService->checkQuantity($productCart['product']->getId(),
                        $productCart['quantity'])) {
                        $message = 'Số lượng sản phẩm ' . $productCart['product']->getName() . ' trong kho không đủ';
                        $productCart = null;
                        session()->put('product_cart', array_filter($productCarts));
                        return redirect()->route('checkout')->with('alert-quantity', $message);
                    }
                    $total += optional($productCart['product'])->getPrice() * $productCart['quantity'];
                }
            }


            DB::beginTransaction();

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
                $method = $request->get('payment-method');
                if (
                    ($method == PaymentMethod::CARD
                        && (
                            $request->get('card_number')
                            && $request->get('cvc')
                            && $request->get('expiry')
                        ))
                    ||
                    $method == PaymentMethod::MOMO
                ) {
                    $invoice->status = InvoiceStatus::PAID;
                } else {
                    $invoice->status = InvoiceStatus::UNPAID;
                }
                $invoice->description = PaymentMethod::convert($method);
                $invoice->updateTimestamps();
                $invoice->save();
                DB::commit();
            }
        } catch (\Exception $exception) {
            Log::error($exception . ' UID: ' . $userId);
            DB::rollBack();
        }
        return view('user.confirmation', ['orderId' => $order->id]);
    }
}
