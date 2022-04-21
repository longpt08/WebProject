<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        $product = $this->productService->getProductById($id);
        $comments = Comment::query()->where('product_id', $id)->get();
        return view('user.product-single')->with([
            'product' => $product,
            'comments' => $comments,
        ]);
    }

    public function getProductDetail($id)
    {
        $product = $this->productService->getProductById($id);
        return view('admin.product-detail', ['product' => $product]);
    }

    public function editProduct($id, Request $request)
    {
        $product = $this->productService->getProductById($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->detail = $request->detail;
        $product->status = $request->status;
        $product->quantity = $request->quantity;
        $product->save();

        return redirect()->route('product-detail', ['id' => $id]);
    }
}
