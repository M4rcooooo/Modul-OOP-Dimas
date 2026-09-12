<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;   

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', [ProdukController::class, 'index']);


Route::get('/produk/tersedia', [ProdukController::class, 'tersedia']);
Route::get('/produk/jumlah', [ProdukController::class, 'jumlah']);
Route::get('/produk/stok-terbanyak', [ProdukController::class, 'stokTerbanyak']);
Route::get('/produk/kategori/{kategori}', [ProdukController::class, 'byKategori']);
Route::get('/produk/harga/{harga}', [ProdukController::class, 'hargaDiAtas']);