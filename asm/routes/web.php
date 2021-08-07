<?php

use App\Http\Controllers\AdminBrandsController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ClientProductsController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Hash;
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



// ===============================ADMIN========================================
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


// CHUYÊN MỤC DÀNH CHO BRANDS
// danh sách
Route::get('admin/brands', [AdminBrandsController::class, 'getList_brands'])->name('admin.brand.list');
// thêm
Route::get('admin/brand/create', [AdminBrandsController::class, 'getCreate_brand'])->name('admin.brand.getCreate');
Route::post('admin/brand/create', [AdminBrandsController::class, 'postCreate_brand'])->name('admin.brand.postCreate');
// xoá
Route::get('admin/brand/delete/{id}', [AdminBrandsController::class, 'delete_brand'])->name('admin.brand.delete');
// sửa
Route::get('admin/deatail/{id}', [AdminBrandsController::class, 'getEdit_brand'])->name('admin.brand.edit');
Route::post('admin/deatail/{id}', [AdminBrandsController::class, 'postEdit_brand'])->name('admin.brand.postEdit');

// CHUYÊN MỤC DÀNH CHO CATEGORIES
// danh sách category
Route::get('admin/categories', [AdminCategoriesController::class, 'getList_cate'])->name('admin.cate.list');
Route::post('admin/categories', [AdminCategoriesController::class, 'find_cate'])->name('admin.cate.find');
// trỏ đến trang thêm
Route::get('admin/create-category', [AdminCategoriesController::class, 'getCreate_cate'])->name('admin.cate.getCreate');
// post thêm cate
Route::post('admin/category/create', [AdminCategoriesController::class, 'postCreate_cate'])->name('admin.cate.postCreate');
// xoá
Route::get('admin/category/delete/{id}', [AdminCategoriesController::class, 'delete_cate'])->name('admin.cate.delete');
// sửa cate
Route::get('admin/category/edit/{id}', [AdminCategoriesController::class, 'getEdit_cate'])->name('admin.cate.getEdit');
Route::post('admin/category/edit/{id}', [AdminCategoriesController::class, 'postEdit_cate'])->name('admin.cate.postEdit');
// chi tiết
// Route::get('admin/category/detail/{id}', [AdminCategoriesController::class, 'detail_cate'])->name('admin.cate.detail');


// CHUYÊN MỤC DÀNH CHO PRODUCTS
// danh sách product
Route::get('admin/products', [AdminProductsController::class, 'getList_prod'])->name('admin.prod.list');
// truy vấn
Route::post('admin/products', [AdminProductsController::class, 'postList_prod'])->name('admin.prod.postlist');
// xoá
Route::post('admin/product/delete/{id}', [AdminProductsController::class, 'delete_product'])->name('admin.prod.delete');

Route::get('admin/product/create', [AdminProductsController::class, 'getCreate_product'])->name('admin.prod.getCreate');
Route::post('admin/product/create', [AdminProductsController::class, 'postCreate_product'])->name('admin.prod.postCreate');
Route::get('admin/product/edit/{id}', [AdminProductsController::class, 'getEdit_product'])->name('admin.prod.getEdit');
Route::post('admin/product/edit/{id}', [AdminProductsController::class, 'postEdit_product'])->name('admin.prod.postEdit');
Route::get('admin/product/detail/{id}', [AdminProductsController::class, 'getDetail_product'])->name('admin.prod.detail');


// ==========================================CLIENT====================================================
// đăng nhập
Route::get('login', [loginController::class, 'getlogin'])->name('client.getlogin');
Route::post('login', [loginController::class, 'postlogin'])->name('client.postlogin');
Route::get('demo-name/{id}', function ($id) {
    return $id;
})->middleware(['auth'])->name('demo_route');
Route::get('fake-password/{mk?}', function ($mk = '123456') {
    return Hash::make($mk);
});
// Đăng ký
Route::get('register', [loginController::class, 'getRegister'])->name('getRegister');
Route::post('register', [loginController::class, 'postRegister'])->name('postRegister');
// đăng xuất
Route::get('logout', [loginController::class, 'logout'])->name('logout');

// Sản phẩm mới
Route::get('/', [ClientProductsController::class, 'newproduct', 'checklogin'])->name('home');