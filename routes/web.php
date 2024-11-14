<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\ReviewController;
use Illuminate\Support\Facades\Route;


Route::get('/login', function(){
    return view('auth.login');
})->name('login')->middleware('guest');
Route::post('validation', [LoginController::class, 'validation']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', function(){
    return view('auth.register');
})->middleware('guest');
Route::post('regist', [RegisterController::class, 'store']);

Route::get('profil', function(){
    return view('profil');
});

Route::resource('contact', ContactController::class);
Route::resource('my-order', OrderController::class)->middleware('auth');
Route::get('admin/dashboard', function(){
    return view('admin.dashboard');
})->middleware('auth');
Route::get('/', [HomeController::class, 'index']);
Route::resource('product',  UserProductController::class, ['as' => 'user'])->middleware('auth');
Route::resource('my-cart', CartController::class)->middleware('auth');
Route::get('checkout', [CheckoutController::class, 'index']);
Route::post('create-order', [CheckoutController::class, 'order'])->name('create.order')->middleware('auth');
Route::put('payment-order/{id}', [CheckoutController::class, 'payment'])->name('payment.order')->middleware('auth');
Route::prefix('admin')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', AdminOrderController::class);
    Route::resource('contacts', AdminContactController::class);
    Route::resource('user', UserController::class);
})->middleware('auth');

Route::resource('review', ReviewController::class)->middleware('auth');