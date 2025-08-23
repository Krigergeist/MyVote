<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingControlller extends Controller
{
    public function __construct()
    {
        // Hapus middleware auth biar bisa diakses tanpa login
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('landing');
    }
}
