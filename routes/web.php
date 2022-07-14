<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
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
    Route::get('/berita/detail', [BeritaController::class, 'detail'])->name('berita.detail');
    Route::resource('/berita', BeritaController::class);
    // Route::get('/', [authController::class, 'welcome']);
    // Route::get('/berita/add', [beritaController::class, 'beritaAdd']);
    // Route::get('/berita/read', [beritaController::class, 'beritaRead']);
    // Route::get('/berita/delete/{id}', [beritaController::class, 'beritaDelete']);
    // Route::get('/berita/edit/{id}', [beritaController::class, 'beritaEdit']);
    Route::get('/berita/detail/{id}', [beritaController::class, 'confirmAdmin']);
    Route::post('/berita/detail/{id}', [beritaController::class, 'confirmAdminPost']);
    Route::post('/berita/edit/{id}', [beritaController::class, 'beritaEditPost']);
    // Route::post('/berita/add', [beritaController::class, 'beritaPost']);
});

Route::post('/login', [authController::class, 'authLogin']);
Route::post('/logout', [authController::class, 'logout']);
Route::post('/register', [authController::class, 'registerPost']);

route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [authController::class, 'login'])->name('login');
    Route::get('/register', [authController::class, 'register'])->name('register');

});
