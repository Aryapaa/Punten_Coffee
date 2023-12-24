<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
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


// Handle Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::match(['get', 'post'], 'logout', [AuthController::class, 'logout'])->name('logout');


// halaman Admin
Route::group(['middleware' => 'auth'],function(){

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('/item', ItemController::class);

Route::get('/order-masuk/{id}/detail', [OrderController::class, 'orderMasukDetail']);
Route::get('/order-masuk', [OrderController::class, 'orderMasuk']);

Route::get('/order-masuk/{id}/edit', [OrderController::class, 'editOrder']);
Route::put('/order-masuk/{id}/update', [OrderController::class, 'updateOrder']);

Route::get('/order-masuk/{id}/delete', [OrderController::class, 'deleteOrder'])->name('admin.order.index');

Route::put('/order-masuk/{id}/update-detail', [OrderController::class, 'updateOrderDetail']);

Route::post('/order-masuk/add-item', [OrderController::class, 'addItem'])->name('addItem');

Route::get('/order-masuk/{id}/delete-detail', [OrderController::class, 'deleteOrderDetail'])->name('admin.order.edit');

Route::get('/user/{id}/setting', [AuthController::class, 'setting']);
Route::patch('/user/{id}/setting', [AuthController::class, 'ubah_password']);

Route::get('/user/{id}/profile', [AuthController::class, 'profile']);
Route::put('/user/{id}/profile', [AuthController::class, 'ubah_profile']);   

});