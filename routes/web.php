<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Auth - Login
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Auth - Google
|--------------------------------------------------------------------------
*/
Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

/*--------------------------------------------------------------------------
| Account - Profile
|--------------------------------------------------------------------------*/
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/account', [AccountController::class, 'profile'])->name('account.profile');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
});

Route::post('/cart/add', [CartController::class, 'add']);
Route::get('/cart/count', [CartController::class, 'count']);
