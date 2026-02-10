<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlatController; // Sesuaikan dengan lokasi Controller kamu
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return view ('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::middleware(['auth'])->group(function () {
    // Jalur untuk Admin mengelola peminjaman (Approval)
    Route::get('/admin/peminjaman', [PeminjamanController::class, 'adminIndex'])->name('admin.peminjaman.index');
    Route::patch('/admin/peminjaman/{id}', [PeminjamanController::class, 'updateStatus'])->name('admin.peminjaman.update');
    // Jalur untuk Siswa melihat daftar alat
    Route::get('/pinjam-alat', [PeminjamanController::class, 'index'])->name('peminjaman.index');
});
});

// --- GABUNGAN KODE ROUTE ALAT ---
Route::middleware(['auth', 'verified'])->group(function () {
    // Jalur khusus admin untuk mengelola alat
    Route::resource('admin/alat', AlatController::class)->names([
        'index'   => 'alat.index',
        'create'  => 'alat.create',
        'store'   => 'alat.store',
        'show'    => 'alat.show',
        'edit'    => 'alat.edit',
        'update'  => 'alat.update',
        'destroy' => 'alat.destroy',
    ]);
});

require __DIR__.'/auth.php';