<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\MonitoringController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Halaman Awal langsung lempar ke Login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Group Route yang butuh Login
Route::middleware(['auth', 'verified'])->group(function () {

    // --- DASHBOARD FUNDING ---
    // Nama route ini 'funding.dashboard' HARUS SAMA dengan yang ada di sidebar.blade.php
    Route::get('/funding/dashboard', function () {
        return view('funding.dashboard'); 
    })->name('funding.dashboard');


    // --- DATA NASABAH ---
    // Saya arahkan ke view sementara jika controller belum siap, 
    // tapi kalau NasabahController sudah ada method index-nya, pakai baris kedua.
    Route::get('/funding/nasabah', function() {
        return "Halaman Data Nasabah (Belum dibuat view-nya)";
    })->name('nasabah.index');
    // Route::get('/funding/nasabah', [NasabahController::class, 'index'])->name('nasabah.index');


    // --- TRACKING BERKAS ---
    Route::get('/funding/tracking', function() {
        return "Halaman Tracking Berkas (Belum dibuat view-nya)";
    })->name('tracking.index');
    // Route::get('/funding/tracking', [MonitoringController::class, 'index'])->name('tracking.index');


    // --- PROFILE ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// 3. Memuat route autentikasi bawaan (Login, Register, Logout)
require __DIR__.'/auth.php';