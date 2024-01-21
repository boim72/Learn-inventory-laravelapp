<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use PhpParser\Node\Stmt\Return_;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('/kategori.index', [
            'title' => 'Inventory | Kategory',
            'kategori' => kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('/kategori.create', [
            'title' => 'Inventori | create',
            'kategori' => kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $ValidasiData = $request->validate([
            'nama_kategori' => 'required | max:255',
        ]);
        kategori::create($ValidasiData);
        return redirect('/kategori')->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        //
        return view('/kategori.edit', compact('kategori'), [
            'title' => 'Inventori | Edit',
            'kategori' => $kategori

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
        //
        $ValidasiData = $request->validate([
            'nama_kategori' => 'required | max:255'
        ]);
        kategori::where('id', $kategori->id)
            ->update($ValidasiData);
        return redirect('/kategori')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        //
        // dd($kategori);
        kategori::destroy($kategori->id);
        return redirect('/kategori')->with('success', 'data berhasil di hapus');
    }
}
