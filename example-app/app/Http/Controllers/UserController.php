<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        // truy vấn hết các phần tử trong bảng users, có bao nhiêu kết quả gán hết cho $users
        $users= User::all();
        return view('user.index', compact('users'));
    }
}