<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;


// ================== Home ==================


Route::get('/', function () {
    return view('landing'); 
});

Route::get('/landing', [HomeController::class, 'index'])->name('home'); 

// ================== landing ==================

Route::get('/landing', [HomeController::class, 'index'])->name('landing');

// ================== DASHBOARD ==================
Route::middleware(['auth'])->group(function () {
    Route::middleware('role:student_affairs')->group(function () {
        Route::get('/dashboard/admin/home', [AdminController::class, 'index'])->name('dashboard.admin');

    });
    Route::middleware('role:student,student_affairs')->group(function () {
        Route::get('/dashboard/user/home', [UserController::class, 'index'])->name('dashboard.user');
    });
});

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
Route::middleware(['auth', 'role:student_affairs'])->group(function (): void {
    Route::get('/manage/candidate', [CandidateController::class, 'index'])->name('candidate.index');
    Route::get('/candidate/create', [CandidateController::class, 'create'])->name('candidate.create');
    Route::post('/candidate/store', [CandidateController::class, 'store'])->name('candidate.store');

    Route::get('/candidate/{id}/edit', [CandidateController::class, 'edit'])->name('candidate.edit');
    Route::put('/candidate/{id}', [CandidateController::class, 'update'])->name('candidate.update');
    Route::delete('/candidate/{id}', [CandidateController::class, 'destroy'])->name('candidate.destroy');
});

// ================== SCHEDULE ==================

Route::middleware(['auth'])->group(function () {
    Route::middleware('role:student_affairs')->group(function () {
        Route::get('/manage/schedule', [ScheduleController::class, 'index'])->name('schedule.manage');

        Route::get('/schedule/add', [ScheduleController::class, 'create'])->name('schedule.create');
        Route::post('/schedule/add', [ScheduleController::class, 'store'])->name('schedule.store');

        Route::get('/schedule/edit/{id}', [ScheduleController::class, 'edit'])->name('schedule.edit');
        Route::put('/schedule/update/{id}', [ScheduleController::class, 'update'])->name('schedule.update');

        Route::delete('/schedule/remove/{id}', [ScheduleController::class, 'destroy'])->name('schedule.remove');
    });
});

// ================== RESULT ==================

Route::prefix('result')->group(function () {
    Route::post('/vote', [ResultController::class, 'store'])->name('result.store');
});


// ================== VOTE ==================
Route::middleware(['auth', 'role:student,student_affairs'])->group(function () {
    Route::get('/vote', [VotingController::class, 'index'])->name('vote.index');
    Route::post('/vote/{id}/vote', [VotingController::class, 'vote'])->name('vote.vote');
});



// ================== KELOLA DATA HASIL ==================
Route::middleware(['auth', 'role:student_affairs'])->get(
    '/vote/interim-result',
    [ResultController::class, 'interim']
)->name('results.interim');


// ================== LAPORAN ==================
Route::middleware(['auth', 'role:student_affairs,osis'])->group(function () {
    Route::get('/vote/report-result', [ReportController::class, 'finalResult'])->name('report.final');
});
Route::middleware(['auth', 'role:student_affairs'])->get(
    '/vote/absention-result',
    [ReportController::class, 'absention']
)->name('report.absention');
