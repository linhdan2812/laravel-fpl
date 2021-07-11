<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin', [AdminController::class, 'analytic'])->name('admin.analytic');
// hiển thị danh sách người dùng
Route::get('admin/user', [AdminUserController::class, 'user_list'])->name('admin.user.list');
// trỏ đến trang sửa
Route::get('admin/user/edit/{id}', [AdminUserController::class, 'getedit_user'])->name('admin.user.getedit');

Route::post('admin/user/edit/{id}', [AdminUserController::class, 'postEdit_user'])->name('admin.user.postEdit');

// update sửa lên database

// Route::get('admin/update/{id}', [AdminUserController::class, 'update_user'])->name('admin.user.update');