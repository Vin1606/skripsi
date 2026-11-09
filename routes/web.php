<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// =========================================================================
// PENGATURAN ALAMAT URL WEBSITE (ROUTES)
// Mengatur alamat link yang dibuka di browser dan halaman apa yang tampil.
// =========================================================================

// 1. Halaman Utama Profil Perusahaan (Company Profile)
Route::get('/profile', [CompanyController::class, 'index'])->name('company.index');

// 2. Halaman Login Sistem Inventory (resources/views/auth/login.blade.php)
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'LoginProcess'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. Halaman Register Sistem Inventory (resources/views/auth/register.blade.php)
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::resource('/user', UserController::class);
