<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategoryDetail($id)
    {
        $category = Category::query()->find($id);
        return view('admin.category-detail', ['category' => $category]);
    }

    public function editCategory($id, Request $request)
    {
        $category = Category::query()->find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('category-detail', ['id' => $id]);
    }
}
