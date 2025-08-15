<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function finalResult()
    {
        $results = [
            (object)['candidate_name' => 'Kandidat A', 'total_votes' => 100],
            (object)['candidate_name' => 'Kandidat B', 'total_votes' => 50],
        ];

        return view('vote.report_result', compact('results'));
    }

    public function absention()
    {
        $absentions = [
            (object)['name' => 'Siswa 1', 'reason' => 'Tidak hadir'],
            (object)['name' => 'Siswa 2', 'reason' => 'Sakit'],
        ];

        return view('vote.absention_result', compact('absentions'));
    }
}
