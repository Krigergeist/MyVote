<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Form register
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Proses register user baru
     */
    public function register(Request $request)
    {
        $request->validate([
            'usr_name'     => 'required|string|max:255',
            'usr_email'    => 'required|email|unique:users,usr_email',
            'usr_password' => 'required|string|min:6|confirmed',
            'role'         => 'required|in:user,admin,kesiswaan,osis',
        ]);

        $user = User::create([
            'usr_name'     => $request->usr_name,
            'usr_email'    => $request->usr_email,
            'usr_password' => Hash::make($request->usr_password),
            'role'         => $request->role,
        ]);

        auth()->login($user);

        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil!');
    }

    /**
     * Edit data user (khusus kesiswaan)
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('auth.edit', compact('user'));
    }

    /**
     * Update data user
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'usr_name'  => 'required|string|max:255',
            'usr_email' => 'required|email|unique:users,usr_email,'.$id.',usr_id',
            'role'      => 'required|in:user,admin,kesiswaan,osis',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'usr_name'  => $request->usr_name,
            'usr_email' => $request->usr_email,
            'role'      => $request->role,
        ]);

        if ($request->filled('usr_password')) {
            $user->update(['usr_password' => Hash::make($request->usr_password)]);
        }

        return redirect('/register/edit/'.$id)->with('success', 'Pengguna berhasil diupdate');
    }

    /**
     * Hapus user
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/register/add')->with('success', 'Pengguna berhasil dihapus');
    }

    // Show registration form
    public function create()
    {
        return view('auth.register');
    }

    // Handle registration
    public function store(Request $request)
    {
        $request->validate([
            'usr_name'     => 'required|string|max:255',
            'usr_email'    => 'required|email|unique:users,usr_email',
            'usr_password' => 'required|string|min:6',
        ], [
            'usr_email.unique' => 'Email telah digunakan, silakan gunakan email lain.'
        ]);

        $siswa = Siswa::create([
            'usr_name'     => $request->usr_name,
            'usr_email'    => $request->usr_email,
            'usr_password' => Hash::make($request->usr_password),
            'usr_role'     => 'student', // default role
        ]);

        // Simulasi proses verifikasi, arahkan ke halaman verifikasi
        return redirect()->route('verify')->with('email', $siswa->usr_email);
    }

    // Tambahkan method untuk menampilkan halaman verifikasi
    public function verify()
    {
        return view('auth.verify');
    }

    // Tambahkan method untuk proses verifikasi (misal tombol di verify.blade)
    public function processVerify(Request $request)
    {
        // Simulasi verifikasi berhasil, arahkan ke login
        return redirect()->route('login')->with('success', 'Verifikasi berhasil, silakan login.');
    }
}
