<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Candidates
Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.manage');
Route::get('/candidates/add', [CandidateController::class, 'create'])->name('candidates.add');
Route::post('/candidates/store', [CandidateController::class, 'store'])->name('candidates.store');

// Voting
Route::get('/voting', [VotingController::class, 'index'])->name('voting');

// Result
Route::get('/results', [ResultController::class, 'index'])->name('results');

// Notification
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

Route::get('/', function () {
    return view('welcome');
});
