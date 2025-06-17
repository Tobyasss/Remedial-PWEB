<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

// Halaman utama menampilkan data mahasiswa
Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

// CRUD Mahasiswa
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::post('/mahasiswa/update/{mahasiswa}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/delete/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
