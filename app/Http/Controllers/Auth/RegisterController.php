<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.add');
    }

    public function store(Request $request)
    {
        User::create([
            'usr_name' => $request->usr_name,
            'usr_email' => $request->usr_email,
            'usr_password' => Hash::make($request->password),
        ]);

        return redirect('/register/add')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('register.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'usr_name' => $request->usr_name,
            'usr_email' => $request->usr_email,
        ]);

        return redirect('/register/edit/'.$id)->with('success', 'Pengguna berhasil diupdate');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/register/add')->with('success', 'Pengguna berhasil dihapus');
    }
}
