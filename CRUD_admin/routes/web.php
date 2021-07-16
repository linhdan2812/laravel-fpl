<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Productscontroller;
use App\Http\Controllers\UserController;
use App\Models\Product;
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

Route::get('/', [HomeController::class, 'count_record'])->name('dashboard');
// DÀNH CHO USER
// hiển thị
Route::get('users', [UserController::class, 'list_user'])->name('user.index');
// trang thêm mới
Route::get('user/create', [UserController::class, 'create_user'])->name('user.create');
// thêm mới lên data
Route::get('user/insert', [UserController::class, 'insert_user'])->name('user.insert');
// xoá
Route::get('user/delete/{id}', [UserController::class, 'delete_user'])->name('user.delete');
// trang sửa
Route::get('user/edit/{id}', [UserController::class, 'edit_user'])->name('user.edit');
// update lên data
Route::get('user/update/{id}', [UserController::class, 'update_user'])->name('user.update');
// chi tiết user
Route::get('user/detail/{id}', [UserController::class, 'detail_user'])->name('user.detail');


// DÀNH CHO PRODUCT
Route::get('pro', [Productscontroller::class, 'list_prod'])->name('prod.list');
Route::get('pro/create', [Productscontroller::class, 'getCreate_prod'])->name('prod.getCreate');
Route::post('pro/create', [Productscontroller::class, 'postCreate_prod'])->name('prod.postCreate');