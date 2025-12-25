<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini adalah tempat mendaftarkan rute web untuk aplikasi kamu.
| Karena kamu fokus di Front-End, kita buat rute simulasi agar
| tampilan bisa di-klik dan berpindah halaman.
|
*/

// 1. Redirect Halaman Awal (/) langsung ke Halaman Login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Rute HALAMAN LOGIN
Route::get('/login', function () {
    return view('auth.login'); // Pastikan file ada di resources/views/auth/login.blade.php
})->name('login');

// Simulasi Proses Login (POST) - Nanti diganti logika Back-End
Route::post('/login', function () {
    // Ceritanya login sukses, langsung arahkan ke Dashboard Funding
    return redirect()->route('funding.dashboard');
});

// 3. Rute HALAMAN REGISTER
Route::get('/register', function () {
    return view('auth.register'); // Pastikan file ada di resources/views/auth/register.blade.php
})->name('register');

// Simulasi Proses Register (POST)
Route::post('/register', function () {
    return "Simulasi: Akun berhasil dibuat! Silakan minta Back-End untuk cek database.";
})->name('register.submit'); // Nama rute opsional untuk form action

// 4. Rute DASHBOARD (Halaman Utama setelah Login)
// Kita kelompokkan dengan middleware 'auth' nanti, tapi sekarang kita buka dulu
Route::get('/funding/dashboard', function () {
    // Nanti di sini return view('funding.dashboard');
    return "<h1>Halo! Ini Halaman Dashboard Funding</h1><p>Silakan buat view-nya di resources/views/funding/dashboard.blade.php</p>";
})->name('funding.dashboard');

// Catatan: Baris 'require auth.php' kita hapus dulu karena kamu belum install Laravel Breeze