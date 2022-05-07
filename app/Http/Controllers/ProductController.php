<?php

namespace App\Http\Controllers;

use App\Http\Enums\CommentStatus;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index($id)
    {
        $product = $this->productService->getProductById($id);
        $comments = Comment::query()
            ->where('product_id', $id)
            ->where('status', CommentStatus::ACTIVE)
            ->orderBy('rating', 'desc')
            ->get();
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

        if ($request->file('image')) {
            $imageName = 'product-' . $product->id . '.' . $request->file('image')->extension();
            $request->file('image')->move('images/shop/products', $imageName);
            $product->image_url = $imageName;
        }
        if ($product->save()) {
            $message = 'Cập nhật thành công!';
            $status = true;
        } else {
            $message = 'Cập nhật không thành công!';
            $status = false;
        }

        return redirect()->route('product-detail', ['id' => $id])
            ->with(['message' => $message, 'status' => $status]);
    }

    public function getProductForm()
    {
        $categories = Category::query()->get();
        return view('admin.create-product', ['categories' => $categories]);
    }

    public function createProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->detail = $request->detail;
        $product->status = $request->status;
        $product->quantity = $request->quantity;

        $product->save();

        $imageName = 'product-' . $product->id . '.' . $request->file('image')->extension();
        $request->file('image')->move('images/shop/products', $imageName);
        $product->image_url = $imageName;
        $product->save();

        $categoryIds = $request->categories;
        foreach ($categoryIds as $categoryId) {
            $categoryProduct = new CategoryProduct();
            $categoryProduct->product_id = $product->id;
            $categoryProduct->category_id = $categoryId;
            $categoryProduct->save();
        }

        return redirect()->route('product-list');
    }
}
