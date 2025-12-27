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
    Route::get('/funding/dashboard', [MonitoringController::class, 'index'])->name('funding.dashboard');


    // --- DATA NASABAH ---
    Route::get('/funding/nasabah', [NasabahController::class, 'index'])->name('nasabah.index');

    // --- TRACKING BERKAS ---
    Route::get('/funding/tracking', function () {
        // Memanggil file resources/views/funding/tracking/index.blade.php
        return view('funding.tracking.index');
    })->name('tracking.index');
    // untuk halaman Detail:
    Route::get('/funding/tracking/detail', function () {
        return view('funding.tracking.show');
    })->name('tracking.show');

    // --- PROFILE ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// 3. Memuat route autentikasi bawaan (Login, Register, Logout)
require __DIR__.'/auth.php';