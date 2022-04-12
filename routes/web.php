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

Route::get('/', [IndexController::class, 'index'])->name('index');

//login
Route::get('/login', function () {
    return view('login');
});
Route::post('/login/login', [\App\Http\Controllers\UserController::class, 'login']);

//sign up
Route::get('/sign-up', function () {
    return view('signUp');
});
Route::post('/sign-up/create', [\App\Http\Controllers\UserController::class, 'create']);

//log out
Route::get('/log-out', [\App\Http\Controllers\UserController::class, 'logOut']);

//dashboard
Route::get('/dash-board', function() {
    return view('dashboard');
});

Route::get('/shop-sidebar', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop');

Route::get('product-single', function() {
    return view('product-single');
});
Route::get('/product-single/{id}', [\App\Http\Controllers\ProductController::class, 'index'])->name('product-single');

Route::get('/add-cart/{id}', [\App\Http\Controllers\ShopController::class, 'addCart']);

Route::get('/remove-cart/{id}', [\App\Http\Controllers\ShopController::class, 'removeCart']);

Route::get('/cart', [\App\Http\Controllers\ShopController::class, 'getCart']);

Route::get('/checkout', [\App\Http\Controllers\ShopController::class, 'checkout']);

Route::post('/confirm', [\App\Http\Controllers\ShopController::class, 'confirm']);

Route::get('/purchase-confirmation', function () {
    return view ('purchase-confirmation');
});

Route::get('admin/index', function () {
    return view('admin.index');
});



