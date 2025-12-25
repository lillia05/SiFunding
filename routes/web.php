<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NasabahController; 
use App\Http\Controllers\MonitoringController; 
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Rute umum 
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // --- FITUR KHUSUS ADMIN ---
    Route::middleware('role:Admin')->group(function () {
        Route::get('/admin/users', function() {
            return "Halaman Kelola Pengguna (Hanya Admin)";
        })->name('admin.users');
    });

    // --- FITUR PETUGAS FUNDING & ADMIN ---
    Route::middleware('role:Admin,Funding')->group(function () {
        Route::get('/funding/monitoring', [MonitoringController::class, 'index'])->name('funding.index');
        Route::get('/funding/tracking', [MonitoringController::class, 'tracking'])->name('funding.tracking');
    });

    // --- FITUR NASABAH ---
    Route::middleware('role:Nasabah')->group(function () {
        Route::get('/pendaftaran', [NasabahController::class, 'create'])->name('nasabah.daftar');
        Route::post('/pendaftaran', [NasabahController::class, 'store'])->name('nasabah.simpan');
    });
});

require __DIR__.'/auth.php';