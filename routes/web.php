<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('store.user');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard/user', [DashboardUserController::class, 'index'])->name('user.dashboard');
    Route::get('/dashboard/orders', [DashboardUserController::class, 'orders'])->name('user.orders');

    Route::get('/dashboard/user/cart', [DashboardUserController::class, 'cart'])->name('user.carts');
    Route::post('order-detail/update', [OrderDetailController::class, 'update'])->name('order-detail.update');


    Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('checkout', [OrderController::class, 'checkout'])->name('checkout');

    Route::get('dashboard/profile/{user:name}', [DashboardUserController::class, 'edit'])->name('user.profile.edit');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard/admin', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/dashboard/admin/customers', [DashboardAdminController::class, 'customers'])->name('admin.customers');

    Route::get('/dashboard/admin/categories', [DashboardAdminController::class, 'categories'])->name('admin.categories');
    Route::post('/dashboard/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/dashboard/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/dashboard/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('/dashboard/admin/products', [DashboardAdminController::class, 'products'])->name('admin.products');
    Route::post('/dashboard/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::put('/dashboard/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/dashboard/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    Route::get('/dashboard/admin/orders', [DashboardAdminController::class, 'orders'])->name('admin.orders');

    Route::get('/dashboard/admin/{user:name}', [DashboardAdminController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/dashboard/admin/update/{user}', [UserController::class, 'update'])->name('admin.profile.update');

});
