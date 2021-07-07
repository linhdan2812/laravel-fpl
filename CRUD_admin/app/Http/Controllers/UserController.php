<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function list_user()
    {
        $list_user = User::all();
        return view('user.list_user', compact('list_user'));
    }
}