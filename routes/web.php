<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\VotingController;

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Authentication
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration
Route::get('/register/add', [RegisterController::class, 'create'])->name('register.add');
Route::post('/register/add', [RegisterController::class, 'store'])->name('register.store');

// Candidate management
Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');
Route::get('/candidates/add', [CandidateController::class, 'create'])->name('candidates.create');
Route::post('/candidates/add', [CandidateController::class, 'store'])->name('candidates.store');
Route::get('/candidates/edit/{id}', [CandidateController::class, 'edit'])->name('candidates.edit');
Route::post('/candidates/edit/{id}', [CandidateController::class, 'update'])->name('candidates.update');
Route::delete('/candidates/remove/{id}', [CandidateController::class, 'destroy'])->name('candidates.destroy');

// Voting
Route::get('/vote/{id}', [VotingController::class, 'show'])->name('vote.show');
Route::post('/vote/{id}/vote', [VotingController::class, 'vote'])->name('vote.vote');

// Results
Route::get('/results', [ResultController::class, 'index'])->name('results.index');
    Route::get('/register/edit/{id}', 'RegisterController@edit');
    Route::post('/register/edit/{id}', 'RegisterController@update');
    Route::delete('/register/remove/{id}', 'RegisterController@destroy');


// ================== JADWAL PEMILIHAN ==================
Route::middleware(['auth', 'role:kesiswaan'])->group(function () {
    Route::get('/vote/schedule/add', 'VoteScheduleController@create');
    Route::post('/vote/schedule/add', 'VoteScheduleController@store');
    Route::get('/vote/schedule/edit/{id}', 'VoteScheduleController@edit');
    Route::post('/vote/schedule/edit/{id}', 'VoteScheduleController@update');
    Route::delete('/vote/schedule/remove/{id}', 'VoteScheduleController@destroy');
});

// ================== PEMILIHAN ==================
Route::middleware(['auth'])->group(function () {
    Route::get('/vote/{id}', 'VoteController@show');
    Route::post('/vote/{id}/vote', 'VoteController@vote'); 

    // khusus kesiswaan
    Route::middleware('role:kesiswaan')->group(function () {
        Route::get('/vote/{id}/add', 'VoteController@create');
        Route::post('/vote/{id}/add', 'VoteController@store');
        Route::get('/vote/{id}/edit', 'VoteController@edit');
        Route::post('/vote/{id}/edit', 'VoteController@update');
        Route::delete('/vote/{id}/remove', 'VoteController@destroy');
    });
});

// ================== KELOLA DATA HASIL ==================
Route::middleware(['auth', 'role:kesiswaan'])->get('/vote/interim-result', 'ResultController@interim');

// ================== LAPORAN ==================
Route::middleware(['auth', 'role:kesiswaan|osis'])->group(function () {
    Route::get('/vote/report-result', 'ReportController@finalResult');
});
Route::middleware(['auth', 'role:kesiswaan'])->get('/vote/absention-result', 'ReportController@absention');
