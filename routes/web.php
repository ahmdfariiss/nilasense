<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Utama (Bisa diakses Guest dan User yang sudah login)
// Ini akan menjadi halaman "rumah" bagi semua orang.
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 2. Grup Route yang Membutuhkan Login (untuk semua peran)
Route::middleware('auth')->group(function () {
    // Halaman Profil (wajib ada untuk Breeze agar logout, dll. berfungsi)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. Grup Route Khusus Admin (dilindungi middleware)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

// 4. Route Autentikasi dari Breeze (Biarkan ini di paling bawah)
require __DIR__.'/auth.php';