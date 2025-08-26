<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Result;
use App\Models\Scedule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Ambil user yang login
        $user = Auth::user();

        // Cek apakah user sudah voting dengan query ke results table
        $hasVoted = Result::where('usr_id', $user->usr_id)->exists();
        $statusVoting = $hasVoted ? "Sudah voting" : "Belum voting";

        // Ambil jadwal voting dari database
        $schedule = Scedule::first(); // Ambil jadwal pertama
        $jadwalMulai = $schedule ? date('d M Y', strtotime($schedule->scd_tanggal_mulai)) : 'Belum ditentukan';
        $jadwalSelesai = $schedule ? date('d M Y', strtotime($schedule->scd_tanggal_selesai)) : 'Belum ditentukan';

        // Ambil semua kandidat
        $kandidats = Candidate::all();

        return view('dashboard.user.home', compact(
            'user',
            'hasVoted',
            'statusVoting',
            'jadwalMulai',
            'jadwalSelesai',
            'kandidats'
        ));
    }
}
