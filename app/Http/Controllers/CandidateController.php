<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Halaman daftar kandidat
     */
    public function index()
    {
        $candidates = Candidate::all();
        return view('manage.candidate', compact('candidates'));
    }

    /**
     * Halaman tambah kandidat
     */
    public function create()
    {
        return view('candidate.create'); 
    }

    /**
     * Simpan kandidat baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:candidates,cdt_email',
            'phone'  => 'required|string|max:20',
            'desc'   => 'nullable|string',
            'photo'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->hasFile('photo')
            ? $request->file('photo')->store('candidates', 'public')
            : null;

        Candidate::create([
            'cdt_name'     => $request->name,
            'cdt_password' => Hash::make('default123'), // password default
            'cdt_email'    => $request->email,
            'cdt_phone'    => $request->phone,
            'cdt_desc'     => $request->desc,
            'cdt_photo'    => $path,
        ]);

        return redirect()->route('candidate.index')
            ->with('success', 'Kandidat berhasil ditambahkan.');
    }

    /**
     * Halaman edit kandidat
     */
    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('candidate.edit', compact('candidate'));
    }

    /**
     * Update kandidat
     */
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

        if ($request->hasFile('photo')) {
            // hapus foto lama kalau ada
            if ($candidate->cdt_photo && Storage::disk('public')->exists($candidate->cdt_photo)) {
                Storage::disk('public')->delete($candidate->cdt_photo);
            }
            $path = $request->file('photo')->store('candidates', 'public');
        } else {
            $path = $candidate->cdt_photo;
        }

        $candidate->update([
            'cdt_name'  => $request->name,
            'cdt_email' => $request->email,
            'cdt_phone' => $request->phone,
            'cdt_desc'  => $request->desc,
            'cdt_photo' => $path,
        ]);

        return redirect()->route('candidate.index')
            ->with('success', 'Kandidat berhasil diperbarui.');
    }

    /**
     * Halaman konfirmasi hapus kandidat
     */
    public function remove($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('candidate.remove', compact('candidate'));
    }

    /**
     * Proses hapus kandidat
     */
    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);

        // hapus foto kalau ada
        if ($candidate->cdt_photo && Storage::disk('public')->exists($candidate->cdt_photo)) {
            Storage::disk('public')->delete($candidate->cdt_photo);
        }

        $candidate->delete();

        return redirect()->route('candidate.index')
            ->with('success', 'Kandidat berhasil dihapus.');
    }
}
