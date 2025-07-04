<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\SessionController;
use App\Models\Donatur;
use App\Http\Middleware\cekAdmin;
use App\Http\Middleware\cekLogin;

// Home
Route::get('/', function () {
    return view('index');
});

// Donasi
Route::get('/donasi', [DonaturController::class, 'donasi']);

// Donatur (dengan pagination langsung)
Route::get('/donatur', function () {
    $donaturs = Donatur::latest()->paginate(5);
    return view('donaturs.donaturPublic', compact('donaturs'));
});

// Pembayaran (hanya bisa diakses setelah login)
Route::middleware([cekLogin::class])->group(function () {
    Route::get('/pembayaran', [DonaturController::class, 'create']);
});

// CRUD Donatur
Route::resource('donaturs', DonaturController::class);

// Dashboard Admin
Route::middleware([cekAdmin::class])->group(function () {
    Route::get('/dashboard', [DonaturController::class, 'index']);
});

// Login & Register
Route::get('/session', [SessionController::class, 'index']);
Route::post('/session/login', [SessionController::class, 'login']);

Route::get('/session/register', [SessionController::class, 'register']);
Route::post('/session/create', [SessionController::class, 'create']);
Route::get('/session/logout', [SessionController::class, 'logout']);

// Cek Gabung
Route::get('/gabung-cek', function () {
    if (!Auth::check()) {
        return redirect('/session/register')->with('info', 'Silakan login atau daftar untuk bergabung.');
    }
    return redirect()->route('gabung.status');
})->name('gabung.cek');

Route::get('/gabung-status', function () {
    return view('gabung-status');
})->middleware('auth')->name('gabung.status');
