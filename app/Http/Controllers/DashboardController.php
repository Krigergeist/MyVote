<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class DashboardController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        return view('dashboard.admin.home', compact('dashboard.admin'));
    }
}
