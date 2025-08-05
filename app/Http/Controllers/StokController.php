<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Stok;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stoks = DB::table('produks')
            ->leftJoin('stoks', 'produks.id', '=', 'stoks.produk_id')
            ->select(
                'produks.id as produk_id',
                'produks.nama_produk',
                DB::raw('COALESCE(stoks.jumlah_stok, 0) as jumlah_stok')
            )
            ->paginate(10);

        return view('stoks.index', compact('stoks'));
    }
    public function simpanTambah(Request $request, $produkId)
    {
        $request->validate([
            'jumlah_tambah' => 'required|integer|min:1',
        ]);

        $stok = Stok::firstOrNew(['produk_id' => $produkId]);
        $stok->jumlah_stok += $request->jumlah_tambah;
        $stok->save();

        return redirect('/dashboard-stok')->with('pesan', 'Stok berhasil ditambahkan.');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stoks.create',['produks' =>Produk::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah_stok' => 'required|integer|min:1',
        ]);

        Stok::create($validated);
        return redirect('/dashboard-stok')->with('pesan', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stok $stok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok)
    {
        //
    }
}