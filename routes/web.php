<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\VoteScheduleController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;


// ================== Home ==================


Route::get('/', function () {
    return view('home'); // halaman depan
});

Route::get('/home', [HomeController::class, 'index'])->name('home'); // halaman setelah login

// ================== Home ==================

Route::get('/home', [HomeController::class, 'index'])->name('home');

// ================== DASHBOARD ==================
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



// ================== AUTHENTICATION ==================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// ================== REGISTRATION ==================
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/register/add', [RegisterController::class, 'create'])->name('register.add');
Route::post('/register/add', [RegisterController::class, 'store'])->name('register.store');
Route::get('/verify', [RegisterController::class, 'verify'])->name('verify');
Route::post('/verify', [RegisterController::class, 'processVerify'])->name('verify.process');

Route::get('/register/edit/{id}', [RegisterController::class, 'edit'])->name('register.edit');
Route::post('/register/edit/{id}', [RegisterController::class, 'update'])->name('register.update');
Route::delete('/register/remove/{id}', [RegisterController::class, 'destroy'])->name('register.destroy');

// ================== ACCOUNT ==================

Route::middleware(['auth'])->group(function () {
    Route::middleware('role:student_affairs')->group(function () {
        Route::get('/manage/account', [AccountController::class, 'index'])->name('account.manage');
        Route::get('/account/add', [AccountController::class, 'create'])->name('account.add');
        Route::post('/account/store', [AccountController::class, 'store'])->name('account.store');

        Route::get('/account/edit/{id}', [AccountController::class, 'edit'])->name('account.edit');
        Route::put('/account/update/{id}', [AccountController::class, 'update'])->name('account.update');
        Route::delete('/account/remove/{id}', [AccountController::class, 'destroy'])->name('account.remove');

    });
});

// ================== CANDIDATES ==================
Route::get('/candidates/add', [CandidateController::class, 'create'])->name('candidates.create');
Route::post('/candidates/add', [CandidateController::class, 'store'])->name('candidates.store');

// ================== VOTING ==================
Route::middleware(['auth'])->group(function () {
    // siswa bisa melihat halaman voting dan mengirim suara
    Route::get('/vote/{id}/show', [VotingController::class, 'show'])->name('vote.show');   // GET
    Route::get('/vote/{id}/vote', [VotingController::class, 'vote'])->name('vote.vote'); // GET (atau POST kalau pakai form)

    // khusus student_affair
    Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');

    Route::get('vote/{id}/add', [CandidateController::class, 'create'])->name('vote.add');
    Route::post('vote/{id}/add', [CandidateController::class, 'store'])->name('vote.store');

    Route::get('vote/{id}/edit', [CandidateController::class, 'edit'])->name('vote.edit');
    Route::put('vote/{id}/edit', [CandidateController::class, 'update'])->name('vote.update');

    Route::get('vote/{id}/remove', [CandidateController::class, 'remove'])->name('vote.remove');
    Route::delete('vote/{id}/remove', [CandidateController::class, 'destroy'])->name('vote.destroy');
});


// ================== JADWAL PEMILIHAN ==================
Route::middleware(['auth', 'role:student_affairs'])->group(function () {
    Route::get('/vote/schedule/add', [VoteScheduleController::class, 'create'])->name('schedule.create');
    Route::post('/vote/schedule/add', [VoteScheduleController::class, 'store'])->name('schedule.store');
    Route::get('/vote/schedule/edit/{id}', [VoteScheduleController::class, 'edit'])->name('schedule.edit');
    Route::post('/vote/schedule/edit/{id}', [VoteScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/vote/schedule/remove/{id}', [VoteScheduleController::class, 'destroy'])->name('schedule.destroy');
});


// ================== KELOLA DATA HASIL ==================
Route::middleware(['auth', 'role:student_affair'])->get(
    '/vote/interim-result',
    [ResultController::class, 'interim']
)->name('results.interim');


// ================== LAPORAN ==================
Route::middleware(['auth', 'role:student_affair,osis'])->group(function () {
    Route::get('/vote/report-result', [ReportController::class, 'finalResult'])->name('report.final');
});
Route::middleware(['auth', 'role:student_affair'])->get(
    '/vote/absention-result',
    [ReportController::class, 'absention']
)->name('report.absention');
