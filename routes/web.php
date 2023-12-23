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

Route::get('/', [GuestController::class, 'index'])->name('home');
// Route::get('/', [GuestController:: class, 'menu']);

// Route::get('/menu/beverages', [GuestController:: class, 'beverages'])->name('pages.menu_beverages');
// Route::get('/menu/{id}', [GuestController:: class, 'menu'])->name('pages.menu');
Route::get('/menu/{category}', [GuestController:: class, 'menu'])->name('menu');
Route::get('/reservation', [GuestController:: class, 'reservation'])->name('pages.reservation');
// Route::post('/cart', [OrderController:: class, 'cart'])->name('pages.cart');

Route::get('/checkout', [OrderController::class, 'checkout']);
Route::post('/midtrans-callback', [OrderController::class, 'callback']);

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
Route::get('/admin/menu', [AdminController:: class, 'showItems'])->name('admin.menu_admin'); 
Route::get('/admin/user', [AdminController:: class, 'showUser'])->name('admin.user_admin');

Route::get('/admin/create', [AdminController:: class, 'create_menu'])->name('admin.menu.create');
Route::get('/admin/user/create', [AdminController:: class, 'create_user'])->name('admin.user.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/update', [AdminController:: class, ''])->name('admin.update');
Route::get('/admin/delete', [AdminController:: class, ''])->name('admin.delete');


Route::get('/dashboard', function () {
    return view('admin.home_dashboard');
});
