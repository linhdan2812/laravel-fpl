<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
Route::get('users', [UserController::class, 'index']);
// phương thức get
// users là đường dẫn
// ::class là để trỏ đến đường dẫn usercontroller
// index là hàm xử lý (là function index)
Route::get('info',[HomeController::class, 'inforform']);
Route::get('save-infor', [HomeController::class, 'saveInfor'])->name('user.inforform');