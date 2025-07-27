<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\ProdukController;
use App\Models\Satuan;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
// Route::get('/dashboard-pengguna', function () {
//     return view('users.index');
// });
Route::resource('/dashboard-pengguna', UserController::class);
Route::resource('/dashboard-supplier', SupplierController::class);
Route::resource('/dashboard-kategori', KategoriController::class);
Route::resource('/dashboard-satuan', SatuanController::class);
Route::resource('/dashboard-produk', ProdukController::class);