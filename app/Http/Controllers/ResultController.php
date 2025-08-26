<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; // Import DB facade
use App\Models\User; // Import User model

class ResultController extends Controller
{
    public function votingData()
    {
        // Get votes per candidate with candidate names
        $votes = Result::join('candidates', 'results.cdt_id', '=', 'candidates.cdt_id')
            ->select('candidates.cdt_name', DB::raw('count(*) as total_votes'))
            ->groupBy('candidates.cdt_id', 'candidates.cdt_name')
            ->get();

        $totalVotes = Result::count();
        $totalUsers = User::count();
        $golputCount = $totalUsers - $totalVotes;

        // Prepare data for the chart
        $chartLabels = $votes->pluck('cdt_name')->toArray();
        $chartData = $votes->pluck('total_votes')->toArray();

        // Add golput to the chart data if there are abstentions
        if ($golputCount > 0) {
            $chartLabels[] = 'Golput';
            $chartData[] = $golputCount;
        }

        return view('dashboard.admin.home', [
            'votes' => $votes,
            'golputCount' => $golputCount,
            'kandidatCount' => Candidate::count(),
            'akunCount' => $totalUsers,
            'chartLabels' => $chartLabels,
            'chartData' => $chartData,
        ]);
    }
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

    /**
     * Tampilkan hasil voting
     */
    public function result()
    {
        $candidates = Candidate::all();
        $results = Result::selectRaw('cdt_id, count(*) as total_votes')
            ->groupBy('cdt_id')
            ->get();

        $voteData = [];
        foreach ($candidates as $candidate) {
            $voteCount = $results->where('cdt_id', $candidate->cdt_id)->first();
            $voteData[$candidate->cdt_name] = $voteCount ? $voteCount->total_votes : 0;
        }

        return view('result', compact('candidates', 'voteData'));
    }

}
