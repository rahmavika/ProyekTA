<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create', ['suppliers' => Supplier::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_supplier' => 'required|min:3',
            'telepon' => 'required|digits_between:12,16',
            'email' => 'required|email|unique:suppliers',
            'alamat' => 'required',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        Supplier::create($validated);
        return redirect('/dashboard-supplier')->with('pesan', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        $supplier = Supplier::findOrFail($supplier->id);
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.update', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);

        {
            $validated = $request->validate([
                'nama_supplier' => 'required|min:3',
                'telepon' => 'required|digits_between:12,16',
                'email' => 'required|email|unique:suppliers,email,' . $supplier->id,
                'alamat' => 'required',
                'status' => 'required|in:aktif,nonaktif',
            ]);

            Supplier::where('id', $id)->update($validated);
            return redirect('/dashboard-supplier')->with('pesan', 'Data berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Supplier::destroy($id);
        return redirect('/dashboard-supplier')->with('pesan', 'Data berhasil dihapus');
    }
}