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
        //
        return view('/supplier.index', [
            'title' => 'Inventory | Supplier',
            'supplier' => Supplier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('/supplier.create', [
            'title' => 'Inventory | Supplier',
            'supplier' => Supplier::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $validasi = $request->validate([
            'nama_supplier' => 'required|max:100',
            'no_telp' => 'required|min:12|max:12',
            'email' => 'required|unique:suppliers',
            'alamat' => 'required|max:100'
        ]);
        Supplier::create($validasi);
        return redirect('/supplier')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
        return view('/supplier.edit', [
            'title' => 'Inventory | Edit',
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
        $validasi = $request->validate([
            'nama_supplier' => 'required|max:100',
            'no_telp' => 'required|min:12|max:12',
            'email' => 'required',
            'alamat' => 'required|max:100'
        ]);
        Supplier::where('id', $supplier->id)
            ->update($validasi);
        return redirect('/supplier')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
        Supplier::destroy($supplier->id);
        return redirect('/supplier')->with('success', 'Data Berhasil Di Hapus');
    }
}
