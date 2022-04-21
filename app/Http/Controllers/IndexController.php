<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $trendyProducts = $this->productService->getProducts(9);
        $categories = $this->categoryService->getCategories(3);
        return view('user.index')->with([
            'categories' => $categories,
            'trendyProducts' => $trendyProducts,
        ]);
    }
}
