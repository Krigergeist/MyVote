<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function show($id)
    {
        // Ambil kandidat dari DB
        $candidate = (object)[
            'name' => 'Contoh Kandidat',
            'vision' => 'Visi Kandidat',
            'mission' => 'Misi Kandidat'
        ];

        return view('vote.show', compact('candidate'));
    }

    public function vote(Request $request, $id)
    {
        // Simpan vote
        return redirect('/vote/'.$id)->with('success', 'Vote berhasil disimpan');
    }

    public function create($id)
    {
        return view('vote.add', compact('id'));
    }

    public function store(Request $request, $id)
    {
        return redirect('/vote/'.$id.'/add')->with('success', 'Kandidat berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('vote.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect('/vote/'.$id.'/edit')->with('success', 'Kandidat berhasil diupdate');
    }

    public function destroy($id)
    {
        return redirect('/vote/'.$id)->with('success', 'Kandidat berhasil dihapus');
    }
}
