<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $productCount = Product::query()->get()->count();
        $profit = array_sum(Invoice::query()->get()->pluck('total')->toArray());
        $userCount = User::query()->get()->count();
        $orderCount = Order::query()->get()->count();
        return view('admin.index', [
            'productCount' => $productCount,
            'profit' => $profit,
            'userCount' => $userCount,
            'orderCount' => $orderCount,
        ]);
    }

    public function listUser()
    {
        $users = $this->userService->getAll();
        return view('admin.user', ['users' => $users]);
    }

    public function listProduct()
    {
        $products = $this->productService->getProducts();
        return view('admin.product', ['products' => $products]);
    }

    public function listCategory()
    {
        $categories = $this->categoryService->getCategories();
        return view('admin.category', ['categories' => $categories]);
    }

    public function listInvoice()
    {
        $invoices = Invoice::query()->get();
        return view('admin.invoice', ['invoices' => $invoices]);
    }

    public function listOrder()
    {
        $orders = Order::query()->get();
        return view('admin.order', ['orders' => $orders]);
    }

    public function listComment()
    {
        $comments = Comment::query()->get();
        return view('admin.comment', ['comments' => $comments]);
    }
}
