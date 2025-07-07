<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\SessionController;
use App\Models\Donatur;
use App\Http\Middleware\cekAdmin;
use App\Http\Middleware\CekUser; // tambahkan jika belum
use App\Http\Middleware\cekLogin; // masih bisa dipakai kalau butuh

// Home
Route::get('/', function () {
    return view('index');
});

// Halaman Donasi Publik
Route::get('/donasi', [DonaturController::class, 'donasi']);

// Halaman Daftar Donatur Publik (dengan pagination)
Route::get('/donatur', function () {
    $donaturs = Donatur::latest()->paginate(5);
    return view('donaturs.donaturPublic', compact('donaturs'));
})->name('donatur.public');

// Halaman Pembayaran (Hanya USER, bukan admin)
Route::middleware(['auth', 'cek.user'])->group(function () {
    Route::get('/pembayaran', [DonaturController::class, 'create']);
});

// Dashboard Admin (Hanya untuk admin)
Route::middleware(['auth', 'cek.admin'])->group(function () {
    Route::get('/dashboard', [DonaturController::class, 'index']);
});

// CRUD Donatur (bisa kamu atur lagi middleware-nya kalau perlu)
Route::resource('donaturs', DonaturController::class);

// Login & Register
Route::get('/session', [SessionController::class, 'index']);
Route::post('/session/login', [SessionController::class, 'login']);

Route::get('/session/register', [SessionController::class, 'register']);
Route::post('/session/create', [SessionController::class, 'create']);
Route::get('/session/logout', [SessionController::class, 'logout']);

// Gabung - Akses hanya setelah login
Route::get('/gabung-cek', function () {
    if (!Auth::check()) {
        return redirect('/session/register')->with('info', 'Silakan login atau daftar untuk bergabung.');
    }
    return redirect()->route('gabung.status');
})->name('gabung.cek');

Route::get('/gabung-status', function () {
    return view('gabung-status');
})->middleware('auth')->name('gabung.status');
