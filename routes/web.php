<?php

use App\Http\Controllers\anggotaController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\karyawanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pinjamController;
use App\Http\Controllers\simpanController;
use App\Http\Controllers\transaksiController;
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

Route::middleware(['auth','posisi:admin'])->group(function () {
    Route::resource('anggota', anggotaController::class);
    Route::resource('karyawan', karyawanController::class);
    Route::get('/anggota/hapus/{id}', [anggotaController::class, 'delete']);
    Route::get('/karyawan/hapus/{id}', [karyawanController::class, 'delete']);
});

Route::middleware(['auth','posisi:admin,pegawai'])->group(function () {
    Route::get('/', [homeController::class, 'index'])->name('home');
    Route::resource('pinjaman', pinjamController::class);
    Route::resource('simpanan', simpanController::class);
    Route::resource('transaksi', transaksiController::class);
    Route::post('logout', [loginController::class, 'destroy'])->name('logout');
    Route::get('/transaksi/search', [transaksiController::class, 'search'])->name('transaksi.search');
    Route::get('/login/show', [loginController::class, 'show']);
    Route::get('/login/ganti', [loginController::class,'ganti'])->name('login.ganti');
    Route::post('/login/simpan', [loginController::class,'simpan'])->name('login.simpan');
});
Route::post('login', [loginController::class,'store'])->name('login.store');
Route::get('login', [loginController::class, 'index'])->name('login');
