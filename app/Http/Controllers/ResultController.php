<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ResultController extends Controller
{
    /**
     * Tampilkan halaman vote
     */
    public function index()
    {
        $candidates = Candidate::all();
        $userId = Auth::id();

        // Cek apakah user sudah vote
        $userHasVoted = Result::where('usr_id', $userId)->exists();

        return view('vote.show', compact('candidates', 'userHasVoted'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cdt_id' => 'required|exists:candidates,cdt_id',
        ]);

        $userId = Auth::id();

        // Cek apakah user sudah vote
        $alreadyVoted = Result::where('usr_id', $userId)->exists();
        if ($alreadyVoted) {
            return back()->with('error', 'Anda sudah memilih kandidat, tidak bisa memilih lagi.');
        }

        Log::info('User ID: ' . $userId); // Log the user ID for debugging
        Result::create([
            'rcd_id' => 1, // Use the default record ID
            'cdt_id' => $request->cdt_id,
            'usr_id' => Auth::id(), // gunakan ID, bukan email
        ]);


        return redirect()->route('vote.index')->with('success', 'Suara berhasil disimpan.');
    }

}