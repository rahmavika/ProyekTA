<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuans = Satuan::paginate(10);
        return view('satuans.index', compact('satuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('satuans.create', ['satuans' => Satuan::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'satuan' => 'required',
        ]);
        Satuan::create($validated);
        return redirect('/dashboard-satuan')->with('pesan', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('satuans.update', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'satuan' => 'required',
        ]);
        Satuan::where('id', $id)->update($validated);
        return redirect('/dashboard-satuan')->with('pesan', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Satuan::destroy($id);
        return redirect('/dashboard-satuan')->with('pesan', 'Data berhasil dihapus');
    }
}