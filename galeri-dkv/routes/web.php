<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Rute Halaman Utama Publik
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index']);

// Ini Rute Rahasia Admin Lu! (Bebas kalau mau ganti nama URL-nya)
Route::get('/portal-rahasia', [AuthController::class, 'tampilLogin'])->name('login');
Route::post('/portal-rahasia', [AuthController::class, 'prosesLogin']);

// Rute Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/galeri', [PublicController::class, 'galeri']);
Route::get('/karya/{id}', [PublicController::class, 'detail']);

use App\Http\Controllers\AdminController;

// Rute yang dilindungi oleh 'satpam' (middleware auth)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    // Nanti rute untuk memproses simpan karya kita taruh di sini juga

    Route::get('/upload-karya', [AdminController::class, 'tampilUpload']);
    Route::post('/upload-karya', [AdminController::class, 'prosesUpload']);

    Route::get('/kelola-karya', [AdminController::class, 'kelolaKarya']);

    Route::delete('/hapus-karya/{id}', [AdminController::class, 'hapusKarya']);

    Route::get('/edit-karya/{id}', [AdminController::class, 'tampilEdit']);
    Route::put('/edit-karya/{id}', [AdminController::class, 'prosesEdit']); // Pakai PUT untuk update data
    Route::get('/pengaturan', [AdminController::class, 'pengaturan']);
    Route::put('/pengaturan', [AdminController::class, 'updatePengaturan']);

    
});