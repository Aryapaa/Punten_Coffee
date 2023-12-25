<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
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
Route::post('/payment-process', [OrderController::class, 'paymentProcess'])->name('pages.paymentprocess');

Route::get('/qris/{totalAmount}', [OrderController::class, 'qris']);
Route::get('/payment-success', [OrderController::class, 'paymentSuccess']);

Route::get('/login', [AdminController:: class, 'login'])->name('login');
Route::post('/login-proses', [AdminController:: class, 'login_proses'])->name('login-proses');

Route::get('/admin/menu', [AdminController:: class, 'showItems'])->name('admin.menu_admin'); 
Route::get('/admin/user', [AdminController:: class, 'showUser'])->name('admin.user_admin');
Route::get('/admin/reserve_adm', [AdminController:: class, 'showReservations'])->name('admin.reserv.reserve_adm');

Route::get('/admin/menu/create', [AdminController:: class, 'create_menu'])->name('admin.menu.create');
Route::post('/admin/menu/store', [AdminController::class, 'store_menu'])->name('admin.menu.store');
Route::get('/admin/menu/{id}/edit', [AdminController:: class, 'edit_menu'])->name('admin.menu.edit');
Route::put('/admin/menu/{id}/update', [AdminController::class, 'update_menu'])->name('admin.menu.update');
Route::delete('/admin/menu/{id}/delete', [AdminController:: class, 'destroy_menu'])->name('admin.menu.delete');

Route::get('/admin/user/create', [AdminController:: class, 'create_user'])->name('admin.user.create');
Route::post('/admin/user/store', [AdminController::class, 'store_user'])->name('admin.user.store');
Route::get('/admin/user/{id}/edit', [AdminController:: class, 'edit_user'])->name('admin.user.edit');
Route::put('/admin/user/{id}/update', [AdminController:: class, 'update_user'])->name('admin.user.update');
Route::delete('/admin/user/{id}/delete', [AdminController:: class, 'destroy_user'])->name('admin.user.delete');

Route::get('/reservation', [GuestController:: class, 'create_reservations'])->name('pages.reservation');
Route::post('/reservation/store', [GuestController::class, 'store_reservation'])->name('pages.store_reservation');
Route::get('/admin/{id}/edit_reservation', [AdminController:: class, 'edit_reservation'])->name('admin.reserv.edit_reservation');
Route::put('/admin/{id}/update_reservation', [AdminController::class, 'update_reservations'])->name('admin.reserv.update_reservation');
Route::delete('/admin/{id}/delete_reservation', [AdminController:: class, 'delete_reservation'])->name('admin.reserv.delete_reservation');


Route::get('/dashboard', function () {
    return view('admin.home_dashboard');
});

Route::get('/order-masuk/{id}/detail', [OrderController::class, 'orderMasukDetail']);
Route::get('/order-masuk', [OrderController::class, 'orderMasuk']);

Route::get('/order-masuk/{id}/edit', [OrderController::class, 'editOrder']);
Route::put('/order-masuk/{id}/update', [OrderController::class, 'updateOrder']);

Route::get('/order-masuk/{id}/delete', [OrderController::class, 'deleteOrder'])->name('admin.order.index');

Route::put('/order-masuk/{id}/update-detail', [OrderController::class, 'updateOrderDetail']);

Route::post('/order-masuk/add-item', [OrderController::class, 'addItem'])->name('addItem');

Route::get('/order-masuk/{id}/delete-detail', [OrderController::class, 'deleteOrderDetail'])->name('admin.order.edit');
