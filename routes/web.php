<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

// FRONT ROUTES

Route::get('/', [FrontController::class, 'index'])->name('index');
// home
Route::get('/home', [FrontController::class, 'home'])->name('home')->middleware('roles:guest|customer');
// restaurants
Route::get('/restaurants', [FrontController::class, 'restaurants'])->name('restaurants-index')->middleware('roles:guest|customer');
// meals
Route::get('/meals', [FrontController::class, 'meals'])->name('meals-index')->middleware('roles:guest|customer');
// meal
Route::get('/meals/{meal}', [FrontController::class, 'singlemeal'])->name('single-meal')->middleware('roles:guest|customer');
// checkout
Route::get('/checkout/{meal}', [FrontController::class, 'checkout'])->name('checkout')->middleware('roles:customer');
// make order
Route::post('/make-order/{meal}', [FrontController::class, 'makeOrder'])->name('make-order')->middleware('roles:customer');
// success order
Route::get('/order-success', [FrontController::class, 'orderSuccess'])->name('order-success')->middleware('roles:customer');
// orders
Route::get('/orders', [FrontController::class, 'userOrders'])->name('user-orders')->middleware('roles:customer');
// orders
Route::post('/home', [FrontController::class, 'sendEmail'])->name('send-email')->middleware('roles:guest|customer');

// BACK ROUTES

Route::middleware('roles:admin')->prefix('admin')->name('admin-')->group(function () {

    // dashboard
    Route::get('/dashboard', [BackController::class, 'dashboard'])->name('dashboard');

    // restaurants
    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants-index');
    Route::get('/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants-create');
    Route::post('/restaurants/create', [RestaurantController::class, 'store'])->name('restaurants-store');
    Route::get('/restaurants/edit/{restaurant}', [RestaurantController::class, 'edit'])->name('restaurants-edit');
    Route::put('/restaurants/edit/{restaurant}', [RestaurantController::class, 'update'])->name('restaurants-update');
    Route::delete('/restaurants/delete/{restaurant}', [RestaurantController::class, 'delete'])->name('restaurants-delete');

    // meals
    Route::get('/meals', [MealController::class, 'index'])->name('meals-index');
    Route::get('/meals/create', [MealController::class, 'create'])->name('meals-create');
    Route::post('/meals/create', [MealController::class, 'store'])->name('meals-store');
    Route::get('/meals/edit/{meal}', [MealController::class, 'edit'])->name('meals-edit');
    Route::put('/meals-edit/{meal}', [MealController::class, 'update'])->name('meals-update');
    Route::delete('/meals/delete/{meal}', [MealController::class, 'delete'])->name('meals-delete');

    // menus
    Route::get('/menus', [MenuController::class, 'index'])->name('menus-index');
    Route::get('/menus/create', [MenuController::class, 'create'])->name('menus-create');
    Route::post('/menus/create', [MenuController::class, 'store'])->name('menus-store');
    Route::get('/menus/edit/{menu}', [MenuController::class, 'edit'])->name('menus-edit');
    Route::put('/menus-edit/{menu}', [MenuController::class, 'update'])->name('menus-update');
    Route::delete('/menus/delete/{menu}', [MenuController::class, 'delete'])->name('menus-delete');

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
