<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('products', ProductController::class);
Route::get('/pdf', [ProductController::class, 'printPDF'])->name('products.pdf');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout.get');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');