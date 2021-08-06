<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginForm()
    {
        // $user = Auth::user();
        return view('auth.login');
    }
    public function Postlogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'bạn chưa nhập email',
                'email.email' => 'bạn nhập chưa đúng định dạng mail',
                'password.required' => 'bạn chưa nhập mật khẩu',
            ]
        );
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('listBrand');
        } else {
            return redirect()->back()->with('msg', 'Tài khoản/mật khẩu không chính xác');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('listBrand');
    }

    public function getRegForm()
    {
        return view('auth.reg');
    }

    public function postReg(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
            ],
            [
                'name.required' => 'bạn chưa nhập tên người dùng',
                'email.required' => 'bạn chưa nhập email',
                'email.email' => 'email nhập chưa đúng định dạng',
                'password.required' => 'bạn chưa nhập mật khẩu',
                'password.min' => 'mật khẩu ít nhất phải 6 ký tự',
            ]
        );
        $model = new User();
        // gán gtri cho các thuộc tính của object sử dụng massassign ($fillable trong model)
        $model->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '0', //trạng thái người dùng
        ]);
        $model->save();
        return redirect(route('loginForm'));
    }
    public function detailUser()
    {
        // $user = Auth::user();
        return view('auth.detail');
    }

    public function editUser()
    {
        return view('auth.edit');
    }
}