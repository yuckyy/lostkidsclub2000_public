<?php
// AdminAuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller

{
    public function showLoginForm()
    {

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors(['email' => 'Неверные учетные данные']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
