<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanesController;
use App\Http\Controllers\UserController;
use App\Models\Brands;
use App\Models\Planes;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('users', [UserController::class, 'index']);
// phương thức get
// users là đường dẫn
// ::class là để trỏ đến đường dẫn usercontroller
// index là hàm xử lý (là function index)
// Route::get('info',[HomeController::class, 'inforform']);
// Route::get('save-infor', [HomeController::class, 'saveInfor'])->name('user.inforform');
Route::get('/', [BrandsController::class, 'listBrands'])->name('listBrand');
Route::get('planes', [PlanesController::class, 'listPlanes'])->name('listPlane');

// thêm mới
Route::get('brand/create', [BrandsController::class, 'getCreate_brand'])->name('getCreateBrand');
Route::post('brand/create', [BrandsController::class, 'postCreate_brand'])->name('postCreateBrand');
Route::get('plane/create', [PlanesController::class, 'getCreate_plane'])->name('getCreatePlane');
Route::post('plane/create', [PlanesController::class, 'postCreate_plane'])->name('postCreatePlane');


// xoá
Route::get('brand/delete/{id}', [BrandsController::class, 'deleteBrand'])->name('deleteBrand');
Route::get('plane/delete/{id}', [PlanesController::class, 'deletePlane'])->name('deletePlane');

// sửa
Route::get('brand/edit/{id}', [BrandsController::class, 'getEditBrand'])->name('getEditBrand');
Route::post('brand/edit/{id}', [BrandsController::class, 'postEditBrand'])->name('postEditBrand');
Route::get('plane/edit/{id}', [PlanesController::class, 'getEditPlane'])->name('getEditPlane');
Route::post('plane/edit/{id}', [PlanesController::class, 'postEditPlane'])->name('postEditPlane');