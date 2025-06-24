<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('index');
});

Route::resource('barang', BarangController::class);


Route::resource('kategori', KategoriController::class);


Route::resource('lokasi', LokasiController::class);


Route::resource('barang_masuk', BarangMasukController::class);


Route::resource('barang_keluar', BarangKeluarController::class);

Route::get('/', [DashboardController::class, 'index'])->name('index');





