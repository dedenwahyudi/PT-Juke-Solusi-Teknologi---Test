<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_user(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/administrator');
        }

        return redirect('login');
    }

    public function administrator()
    {
        return view('administrator.main');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_user(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);

        return redirect('/login')->with('toast_success', 'Your account has been created. Please Login!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function dashboard()
    {
        return view('administrator.dashboard');
    }
}
