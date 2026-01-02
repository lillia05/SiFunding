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
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // 1. Dashboard Admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard', [
                'totalNasabah'   => Nasabah::count(),
                'pendingCount'   => PengajuanRek::whereIn('status', ['draft', 'process'])->count(),
                'readyCount'     => PengajuanRek::where('status', 'ready')->count(),
                'doneCount'      => PengajuanRek::where('status', 'done')->count(),
                'antreanTerbaru' => PengajuanRek::with('nasabah.user')->latest()->take(5)->get()
            ]); 
        })->name('dashboard');

        // 2. Manajemen Akun (List User)
        Route::get('/users', function () {
            $users = \App\Models\User::all();
            return view('admin.users.index', compact('users'));
        })->name('users.index');

        // [BARU] 3. Halaman Tambah User (Create)
        Route::get('/users/create', function () {
            return view('admin.users.create');
        })->name('users.create'); // <--- INI YANG TADI HILANG

        // [BARU] 4. Proses Simpan User (Store) - Dummy
        Route::post('/users', function () {
            // Nanti di sini logika simpan ke database
            return redirect()->route('admin.users.index');
        })->name('users.store'); 

        // [BARU] 5. Halaman Lihat Detail User (Show)
        Route::get('/users/{id}', function ($id) {
            // Mengambil data user berdasarkan ID
            // Jika data tidak ketemu (misal untuk demo), kita buat data dummy
            $user = \App\Models\User::find($id) ?? new \App\Models\User([
                'id' => $id,
                'name' => 'Contoh User Admin',
                'username' => 'admin_demo',
                'email' => 'admin@sifunding.com',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            return view('admin.users.show', compact('user'));
        })->name('users.show');

        // [BARU] 6. Halaman Edit User
        Route::get('/users/{id}/edit', function ($id) {
            // Cari user atau pakai dummy jika tidak ada di DB (untuk preview)
            $user = \App\Models\User::find($id) ?? new \App\Models\User([
                'id' => $id,
                'name' => 'User Demo',
                'username' => 'user_demo',
                'email' => 'demo@bsi.co.id',
                'role' => 'funding_officer',
                'created_at' => now(),
            ]);
            return view('admin.users.edit', compact('user'));
        })->name('users.edit');

        // [BARU] 7. Proses Update User (Update)
        Route::put('/users/{id}', function ($id) {
            // Logika update ke database nanti disini
            return redirect()->route('admin.users.index');
        })->name('users.update');

        // 5. Data Nasabah (Versi Admin)
        Route::get('/nasabah', [NasabahController::class, 'index'])->name('nasabah.index');

        // 6. Tracking / Distribusi (Versi Admin)
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


    // ================= DASHBOARD NASABAH =================
    // URL: http://127.0.0.1:8000/nasabah
    Route::prefix('nasabah')->name('nasabah.')->group(function () {
        
        // Menggunakan '/' agar bisa diakses langsung via /nasabah
        Route::get('/', function () {
            return view('nasabah.dashboard');
        })->name('dashboard');

    });

});

// 3. Memuat route autentikasi bawaan
require __DIR__.'/auth.php';