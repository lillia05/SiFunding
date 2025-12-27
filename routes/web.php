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
    Route::get('/funding/dashboard', [MonitoringController::class, 'index'])->name('funding.dashboard');


    // ================= DATA NASABAH =================

    // 1. Menampilkan Tabel (Index)
    Route::get('/funding/nasabah', [NasabahController::class, 'index'])->name('nasabah.index');

    // Export Excel
    Route::get('/funding/nasabah/export-excel', [NasabahController::class, 'export'])->name('nasabah.export');

    // 2. Form Input (Create) & Simpan (Store)
    Route::get('/funding/nasabah/create', [NasabahController::class, 'create'])->name('nasabah.create');
    Route::post('/funding/nasabah', [NasabahController::class, 'store'])->name('nasabah.store');

    // 3. Form Edit 
    Route::get('/funding/nasabah/{id}/edit', [NasabahController::class, 'edit'])->name('nasabah.edit');

    // 4. Proses Update 
    Route::put('/funding/nasabah/{id}', [NasabahController::class, 'update'])->name('nasabah.update');

    // 5. Hapus Data (Destroy)
    Route::delete('/funding/nasabah/{id}', [NasabahController::class, 'destroy'])->name('nasabah.destroy');

    // 6. Lihat Detail 
    Route::get('/funding/nasabah/{id}', [NasabahController::class, 'show'])->name('nasabah.show');


    // ================= TRACKING BERKAS =================
    Route::get('/funding/tracking', [MonitoringController::class, 'trackingPage'])->name('tracking.index');
    Route::get('/funding/tracking/detail', [MonitoringController::class, 'doTracking'])->name('tracking.show');
    Route::post('/funding/update-status/{id}', [MonitoringController::class, 'updateStatus'])->name('funding.updateStatus');

    // --- (Route Cetak PDF) ---
    Route::get('/funding/tracking/cetak-tanda-terima', [MonitoringController::class, 'cetakPdf'])->name('tracking.print');


    // ================= PROFILE =================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// 3. Memuat route autentikasi bawaan
require __DIR__.'/auth.php';