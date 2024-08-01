<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // code buoi 10
    public function login()
    {
        return view('login');
    }

    // login
    public function postLogin(Request $request)
    {
        $data = $request->only(['email', 'password']);
        //Kiểm tra tài khoản có trong CSDL không
        if (Auth::attempt($data)) {
          
            return redirect()->route('post.index');
        } else {
            return redirect()->back()->with('errorLogin', 'Login không thành công');
          
        }
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('register');
    }

    // register
    public function postRegister(Request $request)
    {
        $data = $request->all();
        User::query()->create($data);
        return redirect()->route('login')->with(
            'message',
            'Đăng kí tài khoản thành công '
        );
    }
}
