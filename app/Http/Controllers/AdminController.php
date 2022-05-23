<?php

namespace App\Http\Controllers;

use App\Http\Enums\UserRole;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $productCount = Product::query()->get()->count();
        $profit = array_sum(Invoice::query()->get()->pluck('total')->toArray());
        $userCount = User::query()->where('roles', UserRole::USER)->get()->count();
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
        $users = User::query()
            ->orderByDesc('roles')
            ->orderByDesc('status')
            ->orderBy('id')
            ->get();
        return view('admin.user', ['users' => $users]);
    }

    public function listProduct()
    {
        $products = Product::query()
            ->orderByDesc('status')
            ->orderBy('id')
            ->get();
        return view('admin.product', ['products' => $products]);
    }

    public function listCategory()
    {
        $categories = Category::query()
            ->orderByDesc('status')
            ->orderBy('id')
            ->get();
        return view('admin.category', ['categories' => $categories]);
    }

    public function listInvoice()
    {
        $invoices = Invoice::query()
            ->orderByDesc('status')
            ->orderBy('id')
            ->get();
        return view('admin.invoice', ['invoices' => $invoices]);
    }

    public function listOrder()
    {
        $orders = Order::query()
            ->orderBy('status')
            ->orderBy('id')
            ->get();
        return view('admin.order', ['orders' => $orders]);
    }

    public function listComment()
    {
        $comments = Comment::query()
            ->orderByDesc('status')
            ->orderBy('id')
            ->get();
        return view('admin.comment', ['comments' => $comments]);
    }
}
