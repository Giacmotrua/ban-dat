<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\PropertyController;

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
Route::redirect('/admin', 'admin/login');
Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/handle-login',[LoginController::class, 'handleLogin'])->name('handle-login');
        Route::post('/logout',[LoginController::class, 'logout'])->name('logout');
});

Route::prefix('admin')
    ->middleware(['check.admin.login'])
    ->as('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/property', [PropertyController::class, 'index'])->name('property')->middleware('permission:view_product');
        Route::get('/add-property', [PropertyController::class, 'add'])->name('add.property')->middleware('permission:create_product');
        Route::post('/add-property', [PropertyController::class, 'store'])->name('store.property')->middleware('permission:store_product');

        Route::get('/product', [ProductController::class, 'index'])->name('product')->middleware('permission:view_product');
        Route::get('/add-product', [ProductController::class, 'add'])->name('add.product')->middleware('permission:create_product');
        Route::post('/store-product', [ProductController::class, 'store'])->name('store.product')->middleware('permission:store_product');
        Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit.product')->middleware('permission:edit_product');
        Route::patch('/update-product/{id}', [ProductController::class, 'update'])->name('update.product')->middleware('permission:update_product');
        Route::delete('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete.product')->middleware('permission:delete_product');

        Route::get('/category', [CategoryController::class, 'index'])->name('category')->middleware('permission:view_category');
        Route::get('/add-category', [CategoryController::class, 'add'])->name('add.category')->middleware('permission:create_category');
        Route::post('/store-category', [CategoryController::class, 'store'])->name('store.category')->middleware('permission:store_category');
        Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit.category')->middleware('permission:edit_category');
        Route::patch('/update-category/{id}', [CategoryController::class, 'update'])->name('update.category')->middleware('permission:update_category');
        Route::delete('/delete-category/{id}', [CategoryController::class, 'delete'])->name('delete.category')->middleware('permission:delete_category');

        Route::get('/order', [OrderController::class, 'index'])->name('order')->middleware('permission:view_order');
        Route::get('/order/{id}', [OrderController::class, 'detail'])->name('order.detail')->middleware('permission:show_order');
        Route::patch('/delivery/{id}', [OrderController::class, 'delivery'])->name('order.delivery')->middleware('permission:update_order');
        Route::delete('delete-order/{id}', [OrderController::class, 'delete'])->name('order.delete')->middleware('permission:delete_order');

        Route::get('/contact', [ContactController::class, 'index'])->name('contact')->middleware('permission:view_contact');
        Route::delete('/contact-delete/{id}', [ContactController::class, 'delete'])->name('contact.delete')->middleware('permission:delete_contact');

        Route::get('/role', [RoleController::class, 'index'])->name('role')->middleware('permission:view_role');
        Route::get('/add-role', [RoleController::class, 'create'])->name('role.add')->middleware('permission:create_role');
        Route::post('/store-role', [RoleController::class, 'store'])->name('role.store')->middleware('permission:store_role');
        Route::get('/edit-role/{id}', [RoleController::class, 'edit'])->name('role.edit')->middleware('permission:edit_role');
        Route::patch('/update-role/{id}', [RoleController::class, 'update'])->name('role.update')->middleware('permission:update_role');
        Route::delete('/delete-role/{id}', [RoleController::class, 'delete'])->name('role.delete')->middleware('permission:delete_role');

        Route::get('/list-user', [UserController::class, 'index'])->name('user')->middleware('permission:view_user');
        Route::get('/create-user', [UserController::class, 'create'])->name('user.create')->middleware('permission:create_user');
        Route::post('/store-user', [UserController::class, 'store'])->name('user.store')->middleware('permission:store_user');
        Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('permission:edit_user');
        Route::patch('/update-user/{id}', [UserController::class, 'update'])->name('user.update')->middleware('permission:update_user');
        Route::delete('/delete-user/{id}', [UserController::class, 'delete'])->name('user.delete')->middleware('permission:delete_user');
});
