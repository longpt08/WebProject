<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
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
}
