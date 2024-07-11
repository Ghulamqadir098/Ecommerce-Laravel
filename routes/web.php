<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/redirect',[HomeController::class, 'redirect'])->name('redirect');


//category routes
Route::get('view_categories',[AdminController::class, 'view_categories']);

Route::post('add_category',[AdminController::class,'add_category'])->name('add_category');

Route::get('/category_delete/{id}',[AdminController::class, 'category_delete'])->name('category_delete');


//Product routes

Route::get('view_products',[AdminController::class, 'view_products'])->name('view_products');

Route::post('add_product',[AdminController::class, 'add_product'])->name('add_product');

Route::get('show_products',[AdminController::class, 'show_products'])->name('show_products');

Route::get('product_delete/{id}',[AdminController::class, 'product_delete'])->name('product_delete');

Route::get('product_edit/{id}',[AdminController::class, 'product_edit'])->name('product_edit');

Route::post('update_product/{id}',[AdminController::class, 'update_product'])->name('update_product');

Route::get('product_details/{id}',[AdminController::class,'product_details'])->name('product_details');