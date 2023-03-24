<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\PolicyController;
use App\Http\Controllers\frontend\PropertyController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/danh-sach-dat', [PropertyController::class, 'index'])->name('property');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-message', [ContactController::class, 'message'])->name('contact.message');

Route::get('/policy-return', [PolicyController::class, 'return'])->name('policy.return');
Route::get('/policy-transport', [PolicyController::class, 'transport'])->name('policy.transport');


