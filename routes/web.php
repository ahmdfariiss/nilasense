<?php
use Illuminate\Support\Facades\Route;

// 1. Route untuk Halaman Utama (Landing Page)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 2. Grup Route Khusus Admin (Petambak)
// Dilindungi oleh middleware 'auth' (harus login) & 'role:admin' (harus admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Nanti kita buat view ini
    })->name('dashboard');
    
});

// 3. Grup Route untuk Pengguna yang Sudah Login (Customer & Admin)
Route::middleware(['auth'])->group(function () {
    // Route untuk dashboard umum yang dibuat Breeze
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Nanti route /monitoring dan /pakan ditaruh di sini
});


// 4. Route Autentikasi dari Breeze (login, register, logout, dll)
require __DIR__.'/auth.php';