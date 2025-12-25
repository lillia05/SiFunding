<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// 1. Redirect halaman awal langsung ke Login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Rute untuk menampilkan Halaman Login (View yang kamu buat tadi)
Route::get('/login', function () {
    // Pastikan file view kamu ada di folder: resources/views/auth/login.blade.php
    return view('auth.login'); 
})->name('login');

// 3. Rute simulasi post login (Biar kalau tombol diklik tidak error 404)
Route::post('/login', function () {
    return "Ini simulasi submit login. Nanti Backend yang urus fungsi aslinya.";
});
