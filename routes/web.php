<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GuestController:: class, 'index'])->name('home');
// Route::get('/', [GuestController:: class, 'menu']);

Route::get('/menu/beverages', [GuestController:: class, 'beverages'])->name('pages.menu_beverages');
Route::get('/menu/foods', [GuestController:: class, 'foods'])->name('pages.menu_foods');
Route::get('/reservation', [GuestController:: class, 'reservation'])->name('pages.reservation');

// Route::get('/order', [OrderController:: class, 'order'])->name('pages.ordermenu');
// Route::get('/suborder/{id_sub_cat}', [OrderController::class, 'order'])->name('pages.ordermenu');

Route::get('/order', [OrderController::class, 'order'])->name('pages.ordermenu');
Route::get('/order/{id_sub_cat}', [OrderController::class, 'order'])->name('pages.ordermenubysub');

Route::get('/cart', [OrderController::class, 'cart'])->name('pages.cart');
Route::get('/payment', [OrderController::class, 'payment'])->name('pages.payment');
Route::post('/payment-process', [OrderController::class, 'paymentProcess']);

Route::get('/qris/{totalAmount}', [OrderController::class, 'qris']);
Route::get('/payment-success', [OrderController::class, 'paymentSuccess']);

Route::get('/login', [AdminController:: class, 'login'])->name('login');
Route::post('/login-proses', [AdminController:: class, 'login_proses'])->name('login-proses');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
