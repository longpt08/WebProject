<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'middleware' => 'auth',
],function(){
    Route::get('/order-detail/{id}', [\App\Http\Controllers\OrderController::class, 'detail'])->middleware(\App\Http\Middleware\Authenticate::class);

    Route::get('/profile-details', function() {
        return view('user.profile-details');
    })->name('profile');
    Route::post('edit-profile', [\App\Http\Controllers\UserController::class, 'editProfile']);

    Route::get('/order',[\App\Http\Controllers\OrderController::class, 'getOrders']);
    Route::get('/order-detail/{id}', [\App\Http\Controllers\OrderController::class, 'detail'])->name('user-order-detail');
    Route::get('/order-detail/{id}/cancel', [\App\Http\Controllers\OrderController::class, 'cancel']);
    Route::get('/order-detail/{id}/complete', [\App\Http\Controllers\OrderController::class, 'complete']);

    Route::post('/comment/post', [\App\Http\Controllers\CommentController::class, 'postComment']);
    Route::get('/checkout', [\App\Http\Controllers\ShopController::class, 'checkout']);

    Route::post('/confirm', [\App\Http\Controllers\ShopController::class, 'confirm']);

    Route::get('/purchase-confirmation', function () {
        return view ('user.purchase-confirmation');
    });
});

Route::get('/', [IndexController::class, 'index'])->name('home');

//login
Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::post('/login/login', [\App\Http\Controllers\UserController::class, 'login']);

//sign up
Route::get('/sign-up', function () {
    return view('user.signUp');
});
Route::post('/sign-up/create', [\App\Http\Controllers\UserController::class, 'create']);

//log out
Route::get('/log-out', [\App\Http\Controllers\UserController::class, 'logOut']);

Route::get('/shop-sidebar', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop');

Route::get('/product-single/{id}', [\App\Http\Controllers\ProductController::class, 'index'])->name('product-single');

Route::post('/product/add-cart', [\App\Http\Controllers\ShopController::class, 'addCart'])->name('add-cart');

Route::get('/remove-cart/{id}', [\App\Http\Controllers\ShopController::class, 'remove'])->name('remove');
Route::get('/plus/{id}', [\App\Http\Controllers\ShopController::class, 'plus'])->name('plus');
Route::get('/minus/{id}', [\App\Http\Controllers\ShopController::class, 'minus']);

Route::get('/cart', [\App\Http\Controllers\ShopController::class, 'getCart']);

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth',
], function(){
   Route::get('index', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin-index');

   Route::get('user', [\App\Http\Controllers\AdminController::class, 'listUser']);
   Route::get('user/detail/{id}', [\App\Http\Controllers\UserController::class, 'getUserDetail'])->name('user-detail');
   Route::post('user/detail/edit/{id}', [\App\Http\Controllers\UserController::class, 'editUser']);

   Route::get('product', [\App\Http\Controllers\AdminController::class, 'listProduct'])->name('product-list');
   Route::get('product/detail/{id}', [\App\Http\Controllers\ProductController::class, 'getProductDetail'])->name('product-detail');
   Route::post('product/detail/edit/{id}', [\App\Http\Controllers\ProductController::class, 'editProduct']);
   Route::get('product/create-form', [\App\Http\Controllers\ProductController::class, 'getProductForm']);
   Route::post('product/create', [\App\Http\Controllers\ProductController::class, 'createProduct']);

    Route::get('category', [\App\Http\Controllers\AdminController::class, 'listCategory'])->name('category-list');
    Route::get('category/detail/{id}', [\App\Http\Controllers\CategoryController::class, 'getCategoryDetail'])->name('category-detail');
    Route::post('category/detail/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'editCategory']);
    Route::get('category/create-form', function () {
        return view('admin.create-category');
    });
    Route::post('category/create', [\App\Http\Controllers\CategoryController::class, 'createCategory']);

    Route::get('invoice', [\App\Http\Controllers\AdminController::class, 'listInvoice']);

    Route::get('order', [\App\Http\Controllers\AdminController::class, 'listOrder']);
    Route::get('order/detail/{id}', [\App\Http\Controllers\OrderController::class, 'getOrderDetail'])->name('order-detail');
    Route::post('order/detail/edit/{id}', [\App\Http\Controllers\OrderController::class, 'editOrder']);

    Route::get('comment', [\App\Http\Controllers\AdminController::class, 'listComment']);
    Route::get('comment/detail/{id}', [\App\Http\Controllers\CommentController::class, 'getCommentDetail'])->name('comment-detail');
    Route::post('comment/detail/edit/{id}', [\App\Http\Controllers\CommentController::class, 'editComment']);
});






