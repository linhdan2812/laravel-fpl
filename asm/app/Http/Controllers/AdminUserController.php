<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    public function user_list()
    {
        $list_user = DB::table('users')->paginate(10);
        return view('admins.users.list_user', compact('list_user'));
    }

    public function getCreate_user()
    {
        # code...
        // tra ve view
    }

    public function postCreate_user(Request $request)
    {
        # code...
        // luu du lieu len db
        try {
            // dump($request->all());
            // $name = $request->name;
            // $create = User::create([
            //     'name' => $name,
            //     'name' => $name,
            //     'name' => $name,
            //     'name12121213' => $name,
            // ]);
            // if ($create) {
            //     return redirect()->route();
            // }
        } catch (\Exception $th) {
            //throw $th;
            dump($th->getMessage());
        }
    }

    public function getedit_user(Request $request, $id)
    {
        $user = DB::table('users')->find($id);

        // $detaiUser = User::where('id', $request->id)->first();
        return view('admins.users.edit_user', compact('user'));
    }

    public function postEdit_user(Request $request)
    {
        # code...
        // try {
        $id = $request->id;
        $active = $request->active;
        $update = User::where('id', $id)->update([
            'active' => $active,
        ]);
        if ($update) {
            return redirect()->route('admin.user.list');
        }
        // } catch (\Exception $th) {
        //     //throw $th;
        //     dump($th->getMessage());
        // }
    }
}