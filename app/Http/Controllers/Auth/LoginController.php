<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // pastikan model User sudah sesuai

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Tentukan kolom untuk login
    public function username()
    {
        return 'usr_email';
    }

    public function login(Request $request)
    {
        // Validasi input dulu
        $request->validate([
            'usr_email' => 'required|email',
            'usr_password' => 'required|min:6',
        ]);

        // Cari user berdasarkan email
        $user = User::where('usr_email', $request->usr_email)->first();

        if (!$user) {
            // Jika akun tidak ditemukan
            return back()->with('error', 'Akun tidak ditemukan, silakan register terlebih dahulu.')
                         ->withInput();
        }

        // Cek autentikasi dengan Auth::attempt
        if (Auth::attempt(['usr_email' => $request->usr_email, 'password' => $request->usr_password])) {
            $user = Auth::user();

            // Redirect berdasarkan role
            if ($user->usr_role === 'student') {
                return redirect()->route('vote.show', ['id' => 1]);
            } elseif ($user->usr_role === 'student_affairs') {
                return redirect()->route('dashboard');
            }

            // Default kalau role tidak dikenali
            return redirect()->route('home');
        }

        // Kalau password salah
        return back()->with('error', 'Password salah, coba lagi.')
                     ->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
