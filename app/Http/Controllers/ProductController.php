<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index($id)
    {
        $product = $this->productService->getProductById($id);
        $comments = Comment::query()->where('product_id', $id)->get();
        return view('user.product-single')->with([
            'product' => $product,
            'comments' => $comments,
        ]);
    }
}
