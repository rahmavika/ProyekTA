<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage.page.homepage');
});
Route::get('/tentang', function () {
    return view('landingpage.page.tentang');
});
// Route::get('/contactus', function () {
//     return view('landingpage.contactus.create');
// });
// Route::resource('/contactus', ContactusController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
});
// Route::get('/dashboard-pengguna', function () {
//     return view('users.index');
// });
Route::get('/semuaproduk', [FrontendController::class, 'index'])->name('semuaproduk');
Route::get('/semuaproduk/search', [FrontendController::class, 'search'])->name('frontend.search');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/dashboard-pengguna', UserController::class);
Route::resource('/dashboard-supplier', SupplierController::class);
Route::resource('/dashboard-kategori', KategoriController::class);
Route::resource('/dashboard-satuan', SatuanController::class);
Route::resource('/dashboard-produk', ProdukController::class);
Route::resource('/dashboard-stok', StokController::class);
Route::post('/dashboard-stok/{produk}/tambah', [StokController::class, 'simpanTambah']);

// Halaman pengguna
Route::get('/contactus', [ContactUsController::class, 'contactUs'])->name('contact_us.contactUs');
Route::post('/contactus', [ContactUsController::class, 'store'])->name('contact_us.store');


        Route::get('/contact-us', [ContactusController::class, 'index'])->name('contactuses.index');
        Route::get('/contact-us/cetak/pdf', [ContactusController::class, 'cetakPDF'])->name('contactuses.cetak_pdf');
        Route::get('/contact-us/{id}/edit', [ContactusController::class, 'edit'])->name('contactuses.edit');
        Route::get('/contact-us/{id}', [ContactusController::class, 'show'])->name('contactuses.show');
        Route::put('/contact-us/{id}', [ContactusController::class, 'update'])->name('contactuses.update');
        Route::delete('/contact-us/{id}', [ContactusController::class, 'destroy'])->name('contactuses.destroy');
    // Route::get('/contact-us/cetak/pdf', [ContactusController::class, 'cetakPDF'])->name('dashboard-contact_us.cetak_pdf');