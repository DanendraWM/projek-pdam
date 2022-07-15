<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\userController;

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
    Route::get('/berita/detail', [beritaController::class, 'detail'])->name('berita.detail');
    Route::resource('/berita', beritaController::class);
    Route::get('/berita/detail/{id}', [beritaController::class, 'confirmAdmin']);
    Route::post('/berita/detail/{id}', [beritaController::class, 'confirmAdminPost']);
    Route::get('berita/{id}/set-status', [beritaController::class,'setStatus'])->name('berita.status');
    Route::post('/berita/revisi/{id}', [beritaController::class, 'revisiPost']);


    Route::get('/user/detail', [userController::class, 'detailUser'])->name('user.detail');
    Route::resource('/user', userController::class);


});

Route::post('/login', [authController::class, 'authLogin']);
Route::post('/logout', [authController::class, 'logout']);
Route::post('/register', [authController::class, 'registerPost']);

route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [authController::class, 'login'])->name('login');
    Route::get('/register', [authController::class, 'register'])->name('register');

});
