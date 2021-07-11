<?php

use App\Http\Controllers\AdminCommentController;
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
// post lên database
Route::post('admin/user/edit/{id}', [AdminUserController::class, 'postEdit_user'])->name('admin.user.postEdit');
// trỏ đến trang chi tiết người dùng
Route::get('admin/user/detail/{id}', [AdminUserController::class, 'getDetail_user'])->name('admin.user.getDetail');




// CHUYÊN MỤC DÀNH CHO BÌNH LUẬN
// danh sách bình luận
Route::get('admin/comments', [AdminCommentController::class, 'getList_comments'])->name('admin.cmts.list');
Route::get('admin/comment/edit/{id}', [AdminCommentController::class, 'getEdit_comment'])->name('admin.cmt.getEdit');
Route::post('admin/comment/edit/{id}', [AdminCommentController::class, 'postEdit_comment'])->name('admin.cmt.postEdit');
Route::get('admin/comment/delete/{id}', [AdminCommentController::class, 'delete_comment'])->name('admin.cmt.delete');