<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = User::all();
        return view('manage.account', compact('accounts'));
    }

    public function create()
    {
        return view('account.add');
    }

    public function store(Request $request)
{
    $request->validate([
        'usr_name'     => 'required|string|max:255',
        'usr_email'    => 'required|email|unique:users,usr_email',
        'usr_password' => 'required|min:6',
        'usr_role'     => 'required|in:student,student_affairs',
    ], [
        'usr_id.required'       => 'ID wajib diisi.',
        'usr_name.required'     => 'Nama wajib diisi.',
        'usr_email.required'    => 'Email wajib diisi.',
        'usr_email.email'       => 'Format email tidak valid.',
        'usr_email.unique'      => 'Email sudah digunakan, silakan pilih email lain.',
        'usr_password.required' => 'Password wajib diisi.',
        'usr_password.min'      => 'Password minimal 6 karakter.',
        'usr_role.required'     => 'Role wajib dipilih.',
        'usr_role.in'           => 'Role tidak valid.',
    ]);

    User::create([
        'usr_id'       => $request->usr_id,
        'usr_name'     => $request->usr_name,
        'usr_email'    => $request->usr_email,
        'usr_password' => Hash::make($request->usr_password),
        'usr_role'     => $request->usr_role,
    ]);

    return redirect()->route('account.manage')->with('success', 'Akun berhasil ditambahkan.');
}

    public function edit($id)
    {
        $account = User::findOrFail($id); // ✅ tetap pakai usr_id
        return view('account.edit', compact('account'));
    }

    public function update(Request $request, $id)
{
    $account = User::findOrFail($id);

    $request->validate([
        'usr_name'  => 'required|string|max:255',
        'usr_email' => 'required|email|unique:users,usr_email,'.$account->usr_id.',usr_id',
        'usr_role'  => 'required|in:student,student_affairs',
    ], [
        'usr_name.required'  => 'Nama wajib diisi.',
        'usr_email.required' => 'Email wajib diisi.',
        'usr_email.email'    => 'Format email tidak valid.',
        'usr_email.unique'   => 'Email sudah digunakan, silakan pilih email lain.',
        'usr_role.required'  => 'Role wajib dipilih.',
        'usr_role.in'        => 'Role tidak valid.',
    ]);

    $account->usr_name  = $request->usr_name;
    $account->usr_email = $request->usr_email;
    $account->usr_role  = $request->usr_role;

    if ($request->filled('usr_password')) {
        $account->usr_password = Hash::make($request->usr_password);
    }

    $account->save();

    return redirect()->route('account.manage')->with('success', 'Akun berhasil diperbarui.');
}

    public function destroy($id)
    {
        $account = User::findOrFail($id);
        $account->delete();
        return redirect()->route('account.manage')->with('success', 'Akun berhasil dihapus.');
    }
    
}
