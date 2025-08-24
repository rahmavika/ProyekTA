<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Pelanggan;   
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahProduk = Produk::count();
        $jumlahKategori = Kategori::count();
        $jumlahPelanggan = User::where('role', 'pelanggan')->count();
        $jumlahPesananMasuk = Checkout::where('status', 'menunggu_konfirmasi')->count();
        $totalPenjualan = Checkout::where('status', 'selesai')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total_harga');
        $pesananPerHari = Checkout::selectRaw('DATE(created_at) as tanggal, COUNT(*) as total')
            ->where('status', 'selesai')
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->take(7)
            ->get();

        return view('dashboard', compact(
            'jumlahProduk',
            'jumlahKategori',
            'jumlahPelanggan',
            'jumlahPesananMasuk',
            'totalPenjualan',
            'pesananPerHari'
        ));
    }
}