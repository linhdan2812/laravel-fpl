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

Route::get('/', [HomeController::class, 'count_record'])->name('dashboard');
Route::get('list-user', [UserController::class, 'list_user'])->name('listUser');
Route::get('add-user', [UserController::class, 'add_user'])->name('addUser');
Route::get('user/delete/{id}', [UserController::class, 'delete_user'])->name('deleteUsser');