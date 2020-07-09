<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function Login(LoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with(['error' => 'بيانات تسجيل الدخول غير صحيحة الرجاء المحاولة مرة اخرى']);
    }
}