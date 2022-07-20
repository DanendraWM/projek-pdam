<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\userController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\VoucerController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/berita', beritaController::class);
    Route::get('/berita/detail/{id}', [beritaController::class, 'confirmAdmin']);
    Route::post('/berita/detail/{id}', [beritaController::class, 'confirmAdminPost']);
    Route::get('berita/{id}/set-status', [beritaController::class, 'setStatus'])->name('berita.status');
    Route::post('/berita/revisi/{id}', [beritaController::class, 'revisiPost']);
    Route::resource('/invoice', InvoiceController::class);
    Route::get('/invoice/create/{id}', [InvoiceController::class, 'createInv']);
    Route::get('/invoice/{id}/set-status', [invoiceController::class, 'setStatus'])->name('invoice.status');
    Route::resource('/nota', NotaController::class);
    Route::resource('/voucer', VoucerController::class);

});
route::group(['middleware' => ['auth', 'cekLevel:admin']], function () {
    Route::resource('/user', userController::class);
});

Route::post('/login', [authController::class, 'authLogin']);
Route::post('/logout', [authController::class, 'logout']);
Route::post('/register', [authController::class, 'registerPost']);

route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [authController::class, 'login'])->name('login');
    Route::get('/register', [authController::class, 'register'])->name('register');

});
