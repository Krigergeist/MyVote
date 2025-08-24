<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Hash;

class CandidateController extends Controller
{
    // Halaman daftar kandidat
    public function index()
{
    $candidates = Candidate::all();   // ambil semua kandidat
    return view('manage.candidate', compact('candidates'));
}

    // Halaman tambah kandidat
    public function create($id)
    {
        return view('vote.add', compact('id'));
    }

    // Simpan kandidat baru
    public function store(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:candidates,cdt_email',
            'phone'  => 'required|string|max:20',
            'desc'   => 'nullable|string',
            'photo'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('candidates', 'public');
        }

        Candidate::create([
            'cdt_name'     => $request->name,
            'cdt_password' => Hash::make('default123'),
            'cdt_email'    => $request->email,
            'cdt_phone'    => $request->phone,
            'cdt_desc'     => $request->desc,
            'cdt_photo'    => $path,
        ]);

        return redirect()->route('candidates.index')->with('success', 'Candidate added successfully.');
    }

    // Halaman edit kandidat
    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('vote.edit', compact('candidate'));
    }

    // Update kandidat
    public function update(Request $request, $id)
    {
        $candidate = Candidate::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:candidates,cdt_email,' . $candidate->cdt_id . ',cdt_id',
            'phone'  => 'required|string|max:20',
            'desc'   => 'nullable|string',
            'photo'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $candidate->cdt_photo;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('candidates', 'public');
        }

        $candidate->update([
            'cdt_name'  => $request->name,
            'cdt_email' => $request->email,
            'cdt_phone' => $request->phone,
            'cdt_desc'  => $request->desc,
            'cdt_photo' => $path,
        ]);

        return redirect()->route('candidates.index')->with('success', 'Candidate updated successfully.');
    }

    // Halaman hapus kandidat
    public function remove($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('vote.remove', compact('candidate'));
    }

    // Proses hapus kandidat
    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();

        return redirect()->route('candidates.index')->with('success', 'Candidate deleted successfully.');
    }
}
