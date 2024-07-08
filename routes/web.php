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

Route::get('view_categories',[AdminController::class, 'view_categories']);