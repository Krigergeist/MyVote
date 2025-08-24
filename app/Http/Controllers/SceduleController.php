<?php

namespace App\Http\Controllers;

use App\Models\Scedule;
use Illuminate\Http\Request;

class SceduleController extends Controller
{
    // Halaman utama
    public function index()
    {
        $scedules = Scedule::orderBy('scd_tanggal_mulai', 'desc')->get();
        return view('manage.schedules', compact('scedules'));
    }
    // Form tambah schedule
    public function create()
    {
        return view('schedule.add');
    }

    // Form edit schedule
    public function edit($id)
    {
        $scedule = Scedule::findOrFail($id);
        return view('schedule.edit', compact('scedule'));
    }

    // Simpan scedule baru
    public function store(Request $request)
    {
        $request->validate([
            'scd_name' => 'required|string|max:255',
            'scd_deskripsi' => 'nullable|string',
            'scd_tanggal_mulai' => 'required|date',
            'scd_tanggal_selesai' => 'required|date|after:scd_tanggal_mulai',
        ]);

        Scedule::create([
            'scd_name' => $request->scd_name,
            'scd_deskripsi' => $request->scd_deskripsi,
            'scd_tanggal_mulai' => $request->scd_tanggal_mulai,
            'scd_tanggal_selesai' => $request->scd_tanggal_selesai,
            'scd_created_at' => time(),
            'scd_updated_at' => time(),
        ]);

        return redirect()->route('schedule.manage')->with('success', 'Schedule berhasil ditambahkan.');
    }

    // Update scedule
    public function update(Request $request, $id)
    {
        $scedule = Scedule::findOrFail($id);

        $request->validate([
            'scd_name' => 'required|string|max:255',
            'scd_deskripsi' => 'nullable|string',
            'scd_tanggal_mulai' => 'required|date',
            'scd_tanggal_selesai' => 'required|date|after:scd_tanggal_mulai',
        ]);

        $scedule->update([
            'scd_name' => $request->scd_name,
            'scd_deskripsi' => $request->scd_deskripsi,
            'scd_tanggal_mulai' => $request->scd_tanggal_mulai,
            'scd_tanggal_selesai' => $request->scd_tanggal_selesai,
            'scd_updated_at' => time(),
        ]);

        return redirect()->route('schedule.manage')->with('success', 'Scedule berhasil diperbarui.');
    }

    // Hapus scedule
    public function destroy($id)
    {
        $scedule = Scedule::findOrFail($id);
        $scedule->delete();

        return redirect()->route('schedule.manage')->with('success', 'Scedule berhasil dihapus.');
    }
}
