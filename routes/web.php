<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// HOME ROUTE
Route::get('/home', [HomeController::class, 'index'])->name('home');

// CATALOGUE ROUTE
Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');

// CART ROUTES
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// CHECKOUT ROUTES
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

// ORDER ROUTE
Route::get('/order/confirmation/{order}', [CheckoutController::class, 'orderConfirmation'])->name('order.confirmation');
