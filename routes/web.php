<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;

// Halaman utama menampilkan tampilan default Laravel
Route::get('/', function () {
    return view('welcome'); // view resources/views/welcome.blade.php
})->name('home');

// Halaman anggaran
Route::get('/anggaran', [AnggaranController::class, 'index'])->name('anggaran.index');

// CRUD Kategori
Route::resource('kategori', KategoriController::class);

// CRUD Transaksi
Route::resource('transaksi', TransaksiController::class);
