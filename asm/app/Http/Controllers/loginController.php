<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function getlogin()
    {
        $brands = DB::table('brands')->get();
        return view('client.auth.login', compact('brands'));
    }
    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'bạn chưa nhập email',
            'email.email' => 'email của bạn không đúng định dạng',
            'password.required' => 'bạn chưa nhập mật khẩu'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('msg', 'Tài khoản/mật khẩu không chính xác');
        }
    }
    public function getRegister()
    {
        $brands = DB::table('brands')->get();
        return view('client.auth.regis', compact('brands'));
    }
    public function postRegister(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|min:5',
                'email' => 'required|email',
                'phone' => 'required|regex:/^(\0)[0-9]{9}$/',
                'password' => 'required',
            ],
            [
                'username.required' => 'bạn chưa nhập tên người dùng',
                'username.min' => 'Username ít nhất 5 ký tự',
                'email.email' => 'email không đúng định dạng',
                'email.required' => 'bạn chưa nhập email',
                'phone.required' => 'bạn chưa nhập số điện thoại',
                'phone.regex' => 'số điện thoại không đúng định dạng',
                'password.required' => 'bạn chưa nhập password',
            ]
        );
        $model = new User();
        // gán gtri cho các thuộc tính của object sử dụng massassign ($fillable trong model)
        $model->fill([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'active' => '1', //trạng thái người dùng
        ]);
        $model->save();
        return redirect(route('client.getlogin'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}