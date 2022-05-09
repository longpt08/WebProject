<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function getCategoryDetail($id)
    {
        $category = Category::query()->find($id);
        $products = $category->products;
        return view('admin.category-detail', ['category' => $category, 'products' => $products]);
    }

    public function editCategory($id, Request $request)
    {
        $category = Category::query()->find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;

        if ($request->file('image')) {
            $imageName = 'category-' . $category->id . '.' . $request->file('image')->extension();
            $request->file('image')->move('images/shop/categories', $imageName);
            $category->image_url = $imageName;
        }
        if ($category->save()) {
            $message = 'Cập nhật thành công!';
            $status = true;
        } else {
            $message = 'Cập nhật không thành công!';
            $status = false;
        }

        return redirect()->route('category-detail', ['id' => $id])
            ->with(['message' => $message, 'status' => $status]);
    }

    public function createCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();

        $imageName = 'category-' . $category->id . '.' . $request->file('image')->extension();
        $request->file('image')->move('images/shop/categories', $imageName);
        $category->image_url = $imageName;
        $category->save();

        return redirect()->route('category-list');
    }
}
