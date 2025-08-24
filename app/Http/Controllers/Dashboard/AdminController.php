<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;

class AdminController extends Controller
{
    public function index()
    {
        // ambil data dari database
        $kandidatCount = Candidate::count(); 
        $akunCount     = User::count();
        // $voteCount     = Vote::count();
        // $totalPemilih  = User::count();
        // $golputCount   = $totalPemilih - $voteCount;

        // data untuk chart
        $chartLabels = Candidate::pluck('cdt_name'); 
        // $chartData   = Candidate::withCount('votes')->pluck('votes_count'); 

        // lempar ke view
        return view('dashboard.admin.home', compact(
            'kandidatCount',
            'akunCount',
            // 'voteCount',
            // 'golputCount',
            'chartLabels',
            // 'chartData'
        ));
    }
}
