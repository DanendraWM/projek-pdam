<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
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
    Route::get('/', [authController::class, 'welcome']);
});


Route::post('/login', [authController::class, 'authLogin']);
Route::post('/logout', [authController::class, 'logout']);
Route::post('/register', [authController::class, 'registerPost']);

route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [authController::class, 'login'])->name('login');
    Route::get('/register', [authController::class, 'register'])->name('register');

});
