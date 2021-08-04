<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function getlogin()
    {
        return view('client.auth.login');
    }
    public function postlogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('msg', 'Tài khoản/mật khẩu không chính xác');
        }
    }
    // public function checklogin()
    // {
    //     $user = Auth::user();
    //     // dump($user);
    //     return view('client.auth.checkUser', compact('user'));
    // }
}