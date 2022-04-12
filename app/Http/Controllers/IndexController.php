<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * @var ProductService
     */
    private $productService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
        $this->productService = new ProductService();
    }

    public function index()
    {
        $trendyProducts = $this->productService->getProducts(9);
        $categories = $this->categoryService->getCategories(3);
        return view('index')->with([
            'categories' => $categories,
            'trendyProducts' => $trendyProducts,
        ]);
    }
}
