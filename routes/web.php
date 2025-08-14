<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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

// ================== AUTHENTICATION ==================


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// ================== REGISTER (akses kesiswaan) ==================
Route::middleware(['auth', 'role:kesiswaan'])->group(function () {
    Route::get('/register/add', 'RegisterController@create');
    Route::post('/register/add', 'RegisterController@store');
    Route::get('/register/edit/{id}', 'RegisterController@edit');
    Route::post('/register/edit/{id}', 'RegisterController@update');
    Route::delete('/register/remove/{id}', 'RegisterController@destroy');
});

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
    Route::get('/vote/{id}', 'VoteController@show'); // profil + visi misi
    Route::post('/vote/{id}/vote', 'VoteController@vote'); // memilih kandidat

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
