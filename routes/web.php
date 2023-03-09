<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

// FRONT ROUTES

Route::get('/', [FrontController::class, 'index'])->name('index');
// home
Route::get('/home', [FrontController::class, 'home'])->name('home')->middleware('roles:guest|customer');
// providers
Route::get('/providers', [FrontController::class, 'providers'])->name('providers-index')->middleware('roles:guest|customer');
// products
Route::get('/products', [FrontController::class, 'products'])->name('products-index')->middleware('roles:guest|customer');
// product
Route::get('/products/{product}', [FrontController::class, 'singleProduct'])->name('single-product')->middleware('roles:guest|customer');
// checkout
Route::get('/checkout/{product}', [FrontController::class, 'checkout'])->name('checkout')->middleware('roles:customer');
// make order
Route::post('/make-order/{product}', [FrontController::class, 'makeOrder'])->name('make-order')->middleware('roles:customer');
// success order
Route::get('/order-success', [FrontController::class, 'orderSuccess'])->name('order-success')->middleware('roles:customer');
// reviews
Route::post('/make-review/{product}', [FrontController::class,  'makeReview'])->name('make-review')->middleware('roles:guest|customer');
// orders
Route::get('/orders', [FrontController::class, 'userOrders'])->name('user-orders')->middleware('roles:customer');

// BACK ROUTES

Route::middleware('roles:admin')->prefix('admin')->name('admin-')->group(function () {

    // dashboard
    Route::get('/dashboard', [BackController::class, 'dashboard'])->name('dashboard');

    // providers
    Route::get('/providers', [ProviderController::class, 'index'])->name('providers-index');
    Route::get('/providers/create', [ProviderController::class, 'create'])->name('providers-create');
    Route::post('/providers/create', [ProviderController::class, 'store'])->name('providers-store');
    Route::get('/providers/edit/{provider}', [ProviderController::class, 'edit'])->name('providers-edit');
    Route::put('/providers/edit/{provider}', [ProviderController::class, 'update'])->name('providers-update');
    Route::delete('/providers/delete/{provider}', [ProviderController::class, 'delete'])->name('providers-delete');

    // products
    Route::get('/products', [ProductController::class, 'index'])->name('products-index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products-create');
    Route::post('/products/create', [ProductController::class, 'store'])->name('products-store');
    Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products-edit');
    Route::put('/products-edit/{product}', [ProductController::class, 'update'])->name('products-update');
    Route::delete('/products/delete/{product}', [ProductController::class, 'delete'])->name('products-delete');

    // reviews
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews-index');
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews-create');
    Route::post('/reviews/create', [ReviewController::class, 'store'])->name('reviews-store');
    Route::get('/reviews/edit/{review}', [ReviewController::class, 'edit'])->name('reviews-edit');
    Route::put('/reviews-edit/{review}', [ReviewController::class, 'update'])->name('reviews-update');
    Route::delete('/reviews/delete/{review}', [ReviewController::class, 'delete'])->name('reviews-delete');

    // users
    Route::get('/users', [UserController::class, 'index'])->name('users-index');
    Route::delete('/users/delete/{user}', [UserController::class, 'delete'])->name('users-delete');

    // orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders-index');
    Route::put('/orders/{order}/confirm', [OrderController::class, 'orderConfirm'])->name('orders-confirm');
    Route::put('/orders/{order}/cancel', [OrderController::class, 'orderCancel'])->name('orders-cancel');
    Route::delete('/orders/{order}', [OrderController::class, 'orderDelete'])->name('orders-delete');
});

// profile
Route::middleware('roles:admin|customer')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
