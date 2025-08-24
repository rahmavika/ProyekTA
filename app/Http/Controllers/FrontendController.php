<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $kategoriId = $request->get('kategori');
        $search = $request->get('search'); 
        $produks = Produk::with('stok');

        if ($kategoriId) {
            $produks->where('kategori_id', $kategoriId);
        }

        if ($search) {
            $produks->where('nama_produk', 'like', "%{$search}%")
                    ->orWhere('harga', 'like', "%{$search}%");
        }

        return view('landingpage.page.semuaproduk', [
            'produks' => $produks->get(),
            'kategoris' => Kategori::all(),
        ]);
    }

    public function terbaru(Request $request)
    {
        $produks = Produk::with('stok')
                        ->orderBy('created_at', 'desc')
                        ->take(10)
                        ->get();

        return view('landingpage.page.terbaru', [
            'produks' => $produks,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $produk = Produk::when($search, function ($query, $search) {
            return $query->where('nama_produk', 'like', "%{$search}%")
                        ->orWhere('harga', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10);

        return view('landingpage.page.semuaproduk', [
            'produks' => $produk,
            'kategoris' => Kategori::all(),
        ]);
    }
}