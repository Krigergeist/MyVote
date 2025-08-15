<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function interim()
    {
        $results = [
            (object)['candidate_name' => 'Kandidat A', 'total_votes' => 10],
            (object)['candidate_name' => 'Kandidat B', 'total_votes' => 5],
        ];

        return view('vote.interim_result', compact('results'));
    }
}
