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
    public function create_user()
    {
        return view('admins.users.add_user');
    }
    public function delete_user(Request $request, $id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('user.index');
    }
    public function insert_user(Request $request, User $user)
    {
        $user_data = $request->all();
        $user->fill($user_data);
        $user->save();
        return redirect()->route('user.index');
    }
    public function edit_user(Request $request, $id)
    {
        $user = DB::table('users')->find($id);
        return view('admins.users.edit_user', compact('user'));
    }
    public function update_user(Request $request, $id)
    {
        $user_data_update = User::find($id);
        $user_data_update->name = $request->name;
        $user_data_update->gender = $request->gender;
        $user_data_update->date_of_birth = $request->date_of_birth;
        $user_data_update->email = $request->email;
        $user_data_update->phone = $request->phone;
        $user_data_update->save();
        return redirect()->route('user.index');
    }

    public function detail_user(Request $request, $id)
    {
        $detail_user = DB::table('users')->find($id);
        return view('admins.users.detail_user', compact('detail_user'));
    }
}