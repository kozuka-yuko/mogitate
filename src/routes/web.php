<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class,'index'])->name('index');
Route::get('/products/search', [ProductController::class, 'search'])->name('search');
Route::get('/products/register', [ProductController::class, 'register'])->name('register');
Route::post('/products/register', [ProductController::class, 'store'])->name('store');
Route::get('/products/{productID}', [ProductController::class, 'detail'])->name('detail');
Route::patch('/products/{productID}/update', [ProductController::class, 'update'])->name('update');
Route::delete('/products/{productID}/delete', [ProductController::class, 'delete'])->name('delete');