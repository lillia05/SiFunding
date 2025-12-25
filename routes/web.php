<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini adalah tempat mendaftarkan rute web untuk aplikasi.
| Karena kamu fokus di Front-End, kita buat rute simulasi agar
| tampilan bisa di-klik dan berpindah halaman dengan lancar.
|
*/

// 1. Redirect Halaman Awal (/) langsung ke Halaman Login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. RUTE LOGIN
Route::get('/login', function () {
    return view('auth.login'); // Memanggil file resources/views/auth/login.blade.php
})->name('login');

// Simulasi Proses Login (POST)
Route::post('/login', function () {
    // Nanti logika Back-End ada di sini.
    // Sekarang kita langsung lempar ke Dashboard seolah login sukses.
    return redirect()->route('funding.dashboard');
});

// 3. RUTE REGISTER
Route::get('/register', function () {
    return view('auth.register'); // Memanggil file resources/views/auth/register.blade.php
})->name('register');

// Simulasi Proses Register (POST)
Route::post('/register', function () {
    return "Simulasi: Pendaftaran Berhasil! Silakan kembali ke login.";
})->name('register.submit');

// 4. RUTE SYARAT & KETENTUAN (TERMS)
Route::get('/terms', function () {
    return view('terms');
})->name('terms');

// 5. RUTE DASHBOARD FUNDING
// Ini halaman tujuan setelah login berhasil
Route::get('/funding/dashboard', function () {
    // Jika nanti file view dashboard sudah dibuat, ganti baris bawah ini dengan:
    // return view('funding.dashboard');
    return "<h1 style='text-align:center; margin-top:50px; font-family:sans-serif;'>Selamat Datang di Dashboard Funding BSI!</h1><p style='text-align:center;'>File view belum dibuat. Silakan buat resources/views/funding/dashboard.blade.php</p>";
})->name('funding.dashboard');

// Catatan: Baris require auth.php dihapus dulu karena kamu mengerjakan Front-End manual