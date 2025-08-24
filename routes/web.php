<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\LogstokController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RiwayatBelanjaController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DashboardController;
use App\Models\Supplier;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage.page.homepage');
});
Route::get('/tentang', function () {
    return view('landingpage.page.tentang');
});
Route::get('/semuaproduk', [FrontendController::class, 'index'])->name('semuaproduk');
Route::get('/semuaproduk/search', [FrontendController::class, 'search'])->name('frontend.search');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/contactus', [ContactUsController::class, 'contactUs'])->name('contact_us.contactUs');
Route::post('/contactus', [ContactUsController::class, 'store'])->name('contact_us.store');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


// Role Pelanggan
Route::middleware(['auth','role:pelanggan'])->group(function () {
    Route::resource('keranjangs', KeranjangController::class);
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah']);
    Route::get('/keranjang', [KeranjangController::class, 'show'])->name('keranjang.show');
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/{id}/detail', [CheckoutController::class, 'detail'])->name('checkout.detail');
    Route::post('/riwayat-belanja/{id}/ulasan', [RiwayatBelanjaController::class, 'simpanUlasan'])->name('riwayatBelanja.simpanUlasan');
    Route::get('/riwayat-belanja', [RiwayatBelanjaController::class, 'index'])->name('riwayat-belanja');
    Route::post('/upload-bukti/{id}', [RiwayatBelanjaController::class, 'uploadBukti'])->name('upload.bukti');
    Route::get('/detailpelanggan', function () {
        return view('landingpage.pelanggan.detailpelanggan');
    });
    Route::get('/editprofile', function () {
        return view('landingpage.pelanggan.editprofile');
    });
    Route::get('/edit-profile', [UserController::class, 'editUser'])->name('edit-profile');
    Route::put('/edit-profile', [UserController::class, 'updateUser'])->name('update-profile');
});

Route::middleware(['auth', 'role:admin,super_admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Produk
    Route::resource('/dashboard-produk', ProdukController::class);
    // Stok
    Route::resource('/dashboard-stok', StokController::class);
    Route::post('/stok/tambah/{produk_id}', [StokController::class, 'tambah'])->name('stok.tambah');
    Route::post('/stok/kurangi/{produk_id}', [StokController::class, 'kurangi'])->name('stok.kurangi');
    // Contact Us
    Route::get('/contact-us', [ContactusController::class, 'index'])->name('contactuses.index');
    Route::get('/contact-us/cetak/pdf', [ContactusController::class, 'cetakPDF'])->name('contactuses.cetak_pdf');
    Route::get('/contact-us/{id}/edit', [ContactusController::class, 'edit'])->name('contactuses.edit');
    Route::get('/contact-us/{id}', [ContactusController::class, 'show'])->name('contactuses.show');
    Route::put('/contact-us/{id}', [ContactusController::class, 'update'])->name('contactuses.update');
    Route::delete('/contact-us/{id}', [ContactusController::class, 'destroy'])->name('contactuses.destroy');
    // Pesanan
    Route::get('/dashboard-pesanan', [CheckoutController::class, 'showPesanan'])->name('checkouts.pesanan');
    Route::get('/dashboard-pesanan/{id}', [CheckoutController::class, 'show'])->name('checkouts.show');
    Route::post('/dashboard-pesanan/{id}/confirm', [CheckoutController::class, 'confirm'])->name('checkouts.confirm');
    Route::put('/checkouts/{id}/update-status', [CheckoutController::class, 'updateStatus'])->name('checkouts.updateStatus');
    Route::put('/checkouts/{id}/update-pembayaran', [CheckoutController::class, 'updatePembayaran'])->name('checkouts.updatePembayaran');
    // Mutasi Stok
    Route::get('/dashboard-mutasi', [LogstokController::class, 'index'])->name('logstoks.index');
    Route::get('/dashboard-mutasi/cetak', [LogstokController::class, 'cetak'])->name('logstoks.cetak');
    Route::get('/dashboard-mutasi/{bulan}/{tahun}', [LogstokController::class, 'show'])->name('logstoks.show');
    // Penjualan
    Route::resource('/dashboard-penjualan', PenjualanController::class);
    Route::get('/cetak-pdf/penjualan', [PenjualanController::class, 'cetakPdf'])->name('penjualan.cetak_pdf');
    Route::resource('/dashboard-pengguna', UserController::class);
});

// Route Super Admin
Route::middleware(['role:super_admin'])->group(function () {
    Route::resource('/dashboard-supplier', SupplierController::class);
    Route::resource('/dashboard-kategori', KategoriController::class);
    Route::resource('/dashboard-satuan', SatuanController::class);
    Route::get('/cetak/pengguna', [UserController::class, 'cetakPdf']);
    Route::get('/cetak/supplier', [SupplierController::class, 'cetakPdf']);
    Route::get('/cetak/produk', [ProdukController::class, 'cetakPdf']);
});