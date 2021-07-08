<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function list_user()
    {
        $list_user = DB::table('users')->paginate(10);
        return view('admins.users.list_user', compact('list_user'));
    }
    public function add_user()
    {
        return view('admins.users.add_user');
    }
    public function delete_user(Request $request, $id)
    {
        User::where('id', $id)->delete();
        // $list_user = DB::table('users')->paginate(10);
        return redirect()->route('listUser');
    }
}