<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserRegisterController;
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

Route::get('/', function () {
    return view('user.login');
});

Auth::routes();

/** Admin Auth */
Route::get('/admin/login', [LoginController::class, 'showlogin']);
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/register', [RegisterController::class, 'showregister']);
Route::post('/admin/register', [RegisterController::class, 'adminregister'])->name('admin.register');
Route::post('/admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');

/** User Auth */
Route::get('/user/login', [UserLoginController::class, 'showlogin'])->name('userlogin');
Route::post('/user/login', [UserLoginController::class, 'userlogin'])->name('user.login');
Route::get('/user/register', [UserRegisterController::class, 'showregister']);
Route::post('/user/register', [UserRegisterController::class, 'userregister'])->name('user.register');
Route::post('/user/logout', [UserLoginController::class, 'userLogout'])->name('user.logout');

/** Manage Product */
Route::get('/admin/create/product', [ProductController::class, 'index'])->name('product');
Route::post('/admin/create/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/admin/products', [ProductController::class, 'list'])->name('product.list');
Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/admin/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::any('/admin/products/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

/** Admin Dash board , OrderList and top selling product */
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/orderlist', [AdminController::class, 'orderList'])->name('orderlist');
Route::get('/admin/selling/product', [AdminController::class, 'sellingProduct'])->name('admin.selling.product');


/* user product route */
Route::get('/user/product', [UserProductController::class, 'productList'])->name('user.product');

// Add to cart and order route
Route::get('/user/product/addtocart/{id}', [UserProductController::class, 'addToCart'])->name('product.addtocart');
Route::get('/user/product/cart', [UserProductController::class, 'cartList'])->name('product.cartlist');
Route::any('/user/product/order', [UserProductController::class, 'addOrder'])->name('product.addorder');



