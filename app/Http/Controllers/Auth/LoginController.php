<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'usr_email'    => $request->usr_email,
            'usr_password' => $request->usr_password,
        ];

        if (\Auth::attempt([
            'usr_email' => $credentials['usr_email'],
            'password'  => $credentials['usr_password']
        ])) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'usr_email' => 'Email atau password salah.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
