<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

// =========================================================================
// PENGATURAN ALAMAT URL WEBSITE (ROUTES)
// Mengatur alamat link yang dibuka di browser dan halaman apa yang tampil.
// =========================================================================

// Saat pengunjung membuka "/profile", tampilkan halaman utama profil perusahaan
Route::get('/profile', [CompanyController::class, 'index'])->name('company.index');
