<?php

namespace App\Http\Controllers;

use App\Http\Enums\Gender;
use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ShopController extends Controller
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
        $categoriesOriginal = $this->categoryService->getCategories();
        $categories = [];
        foreach($categoriesOriginal as $category) {
            if ($category->gender == Gender::MALE){
                $categories['male'][] = $category;
            }
            if ($category->gender == Gender::FEMALE){
                $categories['female'][] = $category;
            }
            if ($category->gender == Gender::UNISEX){
                $categories['unisex'][] = $category;
            }
        }
        $products = $this->productService->getProducts();
        return view('shop-sidebar')->with([
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function addCart($id)
    {
        $product = $this->productService->getProductById($id);
        session()->push('product_cart', $product);
        $route = session()->get('current');
        return redirect()->route($route, ['id' => $id]);
    }

    public function removeCart($id)
    {
        foreach (session()->get('product_cart') as $key => $product) {
            if ($product['id'] == $id) {
                session()->forget('product_cart.'.$key);
                break;
            }
        }
        $route = session()->get('current');
        return redirect()->route($route, ['id' => $id]);
    }

    public function getCart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function confirm(Request $request)
    {
        return view('confirmation');
    }
}
