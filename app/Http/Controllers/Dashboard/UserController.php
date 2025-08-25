<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Ambil user yang login
        $user = Auth::user();

        // Cek apakah user sudah voting
        // misalnya kita pakai kolom `voted` di tabel users (boolean: 0/1)
        $statusVoting = $user->voted ? "Sudah voting" : "Belum voting";

        // Ambil jadwal voting (bisa disimpan di config atau tabel settings)
        $jadwalMulai   = "01 Sep 2025";
        $jadwalSelesai = "03 Sep 2025";

        // Ambil semua kandidat
        $kandidats = Candidate::all();

        return view('dashboard.user.home', compact(
            'user',
            'statusVoting',
            'jadwalMulai',
            'jadwalSelesai',
            'kandidats'
        ));
    }
}
