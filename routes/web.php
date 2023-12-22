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
Route::get('/menu/{id}', [GuestController:: class, 'menu'])->name('pages.menu');
Route::get('/reservation', [GuestController:: class, 'reservation'])->name('pages.reservation');
Route::get('/order', [OrderController:: class, 'order'])->name('pages.ordermenu');
Route::post('/cart', [OrderController:: class, 'cart'])->name('pages.cart');
Route::get('/login', [AdminController:: class, 'login'])->name('login');
Route::post('/login-proses', [AdminController:: class, 'login_proses'])->name('login-proses');
Route::get('/admin/menu', [AdminController:: class, 'showItems'])->name('admin.menu_admin'); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
