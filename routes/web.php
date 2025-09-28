<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route Halaman Utama / Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route Dashboard Umum (butuh login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup Route untuk Pengguna yang Sudah Login
Route::middleware('auth')->group(function () {
    // Halaman Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Nanti route /monitoring dan /pakan ditaruh di sini
});

// Grup Route Khusus Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

// Route autentikasi yang dibuat oleh Breeze
// Biarkan ini di paling bawah
require __DIR__.'/auth.php';