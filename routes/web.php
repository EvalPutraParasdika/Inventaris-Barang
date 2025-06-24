<?php

use App\Http\Controllers\DetailTransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('index');
});

Route::resource('barang', BarangController::class);


Route::resource('kategori', KategoriController::class);


Route::resource('lokasi', LokasiController::class);


Route::resource('barang_masuk', BarangMasukController::class);


Route::resource('barang_keluar', BarangKeluarController::class);






