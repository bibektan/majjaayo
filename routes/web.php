<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/order', [HomeController::class, 'order'])->name('order');
Route::post('/order/submit', [HomeController::class, 'orderSubmit'])->name('order_submit');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
