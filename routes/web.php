<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;

Route::get('/',[HomeController::class,'index'])->name('/');

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


//Cart routes


Route::post('add_cart/{id}',[HomeController::class, 'add_cart'])->name('add_cart');

Route::get('view_cart',[HomeController::class, 'view_cart'])->name('view_cart');

Route::get('remove_item/{id}',[HomeController::class, 'remove_item'])->name('remove_item');

Route::get('cash_order',[HomeController::class, 'cash_order'])->name('cash_order');

Route::get('stripe/{total}',[HomeController::class, 'stripe'])->name('stripe');

Route::post('stripe_payment/{total}',[HomeController::class,'stripePost'])->name('stripe.post');


// -------------------------------------------Order routes----------------------------------------------------------------

Route::get('view_orders',[AdminController::class, 'view_orders'])->name('view_orders');

// Route::get('order_details/{id}',[AdminController::class, 'order_details'])->name('order_details');

// Route::get('order_status/{id}',[AdminController::class, 'order_status'])->name('order_status');

Route::get('delivered/{id}',[AdminController::class, 'delivered'])->name('delivered');
Route::get('processing/{id}',[AdminController::class, 'processing'])->name('processing');

Route::get('print_pdf/{id}',[PdfController::class, 'download'])->name('print_pdf')->middleware('auth');