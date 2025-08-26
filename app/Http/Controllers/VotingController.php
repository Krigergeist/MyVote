<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VotingController extends Controller
{
    // Tampilkan daftar kandidat
    public function index()
    {
        $candidates = Candidate::all();
        $hasVoted = Result::where('usr_id', Auth::id())->exists();
        $userHasVoted = Result::where('usr_id', Auth::id())->exists();

        return view('vote.index', compact('candidates', 'userHasVoted', 'hasVoted'));
    }

    // Simpan vote user
    public function vote($id)
    {
        $userId = Auth::id();

        // Cek apakah user sudah vote
        $alreadyVoted = Result::where('usr_id', $userId)->exists();
        if ($alreadyVoted) {
            return back()->with('error', 'Kamu sudah memilih kandidat!');
        }

        Log::info('VotingController User ID: ' . $userId); // Log the user ID for debugging
        Result::create([
            'rcd_id' => 1, // Use the default record ID
            'cdt_id' => $id,
            'usr_id' => $userId,
        ]);

        return redirect()->route('vote.index')->with('success', 'Vote berhasil disimpan');
    }
}
