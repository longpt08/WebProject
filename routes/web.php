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
    });

    Route::get('/order', function() {
        return view('user.order');
    });

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

Route::get('/add-cart/{id}', [\App\Http\Controllers\ShopController::class, 'addCart']);

Route::get('/remove-cart/{id}', [\App\Http\Controllers\ShopController::class, 'removeCart']);

Route::get('/cart', [\App\Http\Controllers\ShopController::class, 'getCart']);

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth',
], function(){
   Route::get('index', [\App\Http\Controllers\AdminController::class, 'index']);

   Route::get('user', [\App\Http\Controllers\AdminController::class, 'listUser']);
   Route::get('user/detail/{id}', [\App\Http\Controllers\UserController::class, 'getUserDetail'])->name('user-detail');
   Route::post('user/detail/edit/{id}', [\App\Http\Controllers\UserController::class, 'editUser']);

   Route::get('product', [\App\Http\Controllers\AdminController::class, 'listProduct']);
   Route::get('product/detail/{id}', [\App\Http\Controllers\ProductController::class, 'getProductDetail'])->name('product-detail');
   Route::post('product/detail/edit/{id}', [\App\Http\Controllers\ProductController::class, 'editProduct']);

    Route::get('category', [\App\Http\Controllers\AdminController::class, 'listCategory']);
    Route::get('category/detail/{id}', [\App\Http\Controllers\CategoryController::class, 'getCategoryDetail'])->name('category-detail');
    Route::post('category/detail/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'editCategory']);

    Route::get('invoice', [\App\Http\Controllers\AdminController::class, 'listInvoice']);

    Route::get('order', [\App\Http\Controllers\AdminController::class, 'listOrder']);
    Route::get('order/detail/{id}', [\App\Http\Controllers\OrderController::class, 'getOrderDetail'])->name('order-detail');
    Route::post('order/detail/edit/{id}', [\App\Http\Controllers\OrderController::class, 'editOrder']);

    Route::get('comment', [\App\Http\Controllers\AdminController::class, 'listComment']);
});






