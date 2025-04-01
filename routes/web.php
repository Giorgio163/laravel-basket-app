<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


