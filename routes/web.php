<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\MonitoringController;
use Illuminate\Support\Facades\Route;
// Import Models agar bisa dipakai di route closure (Dashboard Admin)
use App\Models\Nasabah;
use App\Models\PengajuanRek;

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

    // --- LOGIKA REDIRECT DASHBOARD ---
    // Route ini menangani jika ada link yang mengarah ke "/dashboard" biasa
    Route::get('/dashboard', function () {
        if (auth()->user()->username === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('funding.dashboard');
    })->name('dashboard');


    // ================= DASHBOARD ADMIN =================
    
    // 1. Halaman Utama Dashboard Admin
    // ================= DASHBOARD ADMIN =================
    
    // Group khusus Admin agar semua URL depannya '/admin'
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // 1. Dashboard Admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard', [
                // Mengirim data statistik yang sama
                'totalNasabah'   => Nasabah::count(),
                'pendingCount'   => PengajuanRek::whereIn('status', ['draft', 'process'])->count(),
                'readyCount'     => PengajuanRek::where('status', 'ready')->count(),
                'doneCount'      => PengajuanRek::where('status', 'done')->count(),
                'antreanTerbaru' => PengajuanRek::with('nasabah.user')->latest()->take(5)->get()
            ]); 
        })->name('dashboard'); // Jadi: route('admin.dashboard')

        // 2. Manajemen Akun (Yang sudah kita buat)
        Route::get('/users', function () {
            $users = \App\Models\User::all(); // Ambil data user asli
            return view('admin.users.index', compact('users'));
        })->name('users.index'); // Jadi: route('admin.users.index')

        // 3. Data Nasabah (Versi Admin)
        // Kita arahkan ke Controller yang sama, tapi URL-nya beda
        Route::get('/nasabah', [NasabahController::class, 'index'])->name('nasabah.index');

        // 4. Tracking / Distribusi (Versi Admin)
        Route::get('/tracking', [MonitoringController::class, 'trackingPage'])->name('tracking.index');
    });


    // ================= DASHBOARD FUNDING =================
    // Ini halaman khusus Funding Officer
    Route::get('/funding/dashboard', [MonitoringController::class, 'index'])->name('funding.dashboard');


    // ================= DATA NASABAH =================

    // 1. Menampilkan Tabel (Index)
    Route::get('/funding/nasabah', [NasabahController::class, 'index'])->name('nasabah.index');

    // Export Excel
    Route::get('/funding/nasabah/export-excel', [NasabahController::class, 'export'])->name('nasabah.export');

    // Import Excel
    Route::post('/funding/nasabah/import', [NasabahController::class, 'import'])->name('nasabah.import');

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
    
    // Route Cetak SATUAN
    Route::get('/funding/tracking/cetak-tanda-terima/{id}', [MonitoringController::class, 'cetakPdfDetail'])->name('tracking.print.detail');


    // ================= PROFILE =================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// 3. Memuat route autentikasi bawaan
require __DIR__.'/auth.php';