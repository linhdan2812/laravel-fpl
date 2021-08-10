<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule as ValidationRule;

class loginController extends Controller
{
    public function getlogin()
    {
        $cates = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        return view('client.auth.login', compact('brands', 'cates'));
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
        $cates = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        return view('client.auth.regis', compact('brands', 'cates'));
    }
    public function postRegister(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|min:5',
                'email' => 'required|email|',
                // "email" => ValidationRule::unique('users')->ignore($this->id),
                'phone' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'bạn chưa nhập tên người dùng',
                'username.min' => 'Username ít nhất 5 ký tự',
                'email.email' => 'email không đúng định dạng',
                'email.required' => 'bạn chưa nhập email',
                // 'email.unique' => 'trùng email',
                'phone.required' => 'bạn chưa nhập số điện thoại',
                // 'phone.regex' => 'số điện thoại không đúng định dạng',
                'password.required' => 'bạn chưa nhập password',
            ]
        );
        $users = User::all();
        foreach ($users as $users) {
            if ($users->email == $request->email) {
                return redirect()->back()->with('msg', 'Username này đã được sử dụng');
            } else {
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
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
    public function userInfor()
    {
        $cates = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        return view('client.auth.infor', compact('brands', 'cates'));
    }
    public function getChange()
    {
        $cates = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        return view('client.auth.change_info', compact('cates', 'brands'));
    }
    public function postChange(Request $request)
    {
        $request->validate(
            [
                'password' => 'required',
                'new_password' => 'required|min:6|different:password',
            ],
            [
                'password.required' => 'bạn chưa nhập mật khẩu cũ',
                'new_password.required' => 'bạn chưa nhập mật khẩu mới',
                'new_password.different' => 'mật khẩu mới trùng mật khẩu cũ',
                'new_password.min' => 'mật khẩu có ít nhất 6 ký tự',
            ]
        );
        $id = $request->id;
        $detailUser = User::where('id', $id)->first();
        if (Hash::check($request->password, $detailUser->password)) {
            $detailUser->fill([
                'password' => Hash::make($request->new_password)
            ])->save();
            return redirect()->route('userinfor');
        } else {
            return redirect()->back()->with('msg', 'mật khẩu cũ không đúng');
        }
    }
}