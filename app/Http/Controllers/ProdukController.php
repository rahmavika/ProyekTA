<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::paginate(10);
        return view('produks.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produks.create',['kategoris' =>Kategori::all(), 'suppliers' => Supplier::all(), 'satuans' => Satuan::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|min:3',
            'kategori_id' => 'required|exists:kategoris,id',
            'satuan_id' => 'required|exists:satuans,id',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        Produk::create($validated);
        return redirect('/dashboard-produk')->with('pesan', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        $produk = Produk::findOrFail($produk->id);
        return view('produks.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        $kategoris = Kategori::all();
        $satuans = Satuan::all();
        $suppliers = Supplier::all();
        return view('produks.update', compact('produk', 'kategoris', 'satuans', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil data produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'nama_produk' => 'required|min:3',
            'kategori_id' => 'required|exists:kategoris,id',
            'satuan_id' => 'required|exists:satuans,id',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);
        if ($request->hasFile('gambar')) {
            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $produk->update($validated);
        return redirect('/dashboard-produk')->with('pesan', 'Data berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }

        // Hapus produk dari database
        $produk->delete();

        return redirect('/dashboard-produk')->with('pesan', 'Data berhasil dihapus');
    }

}