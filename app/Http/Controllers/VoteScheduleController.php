<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoteScheduleController extends Controller
{
    public function create()
    {
        return view('vote.schedule_add');
    }

    public function store(Request $request)
    {
        // Simpan ke DB (contoh)
        return redirect('/vote/schedule/add')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('vote.schedule_edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect('/vote/schedule/edit/'.$id)->with('success', 'Jadwal berhasil diupdate');
    }

    public function destroy($id)
    {
        return redirect('/vote/schedule/add')->with('success', 'Jadwal berhasil dihapus');
    }
}
