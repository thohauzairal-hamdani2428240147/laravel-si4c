<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\DashboarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('fakultas', FakultasController::class)->parameters(['fakultas' => 'fakultas'])->middleware(['auth', 'verified']);

Route::resource('periode', PeriodeController::class)->middleware(['auth', 'verified']);

Route::resource('berita', BeritaController::class)->middleware(['auth', 'verified']);

Route::resource('prodi', ProdiController::class)->middleware(['auth', 'verified']);

Route::resource('mahasiswa', MahasiswaController::class)->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboarController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard-adminlte');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
