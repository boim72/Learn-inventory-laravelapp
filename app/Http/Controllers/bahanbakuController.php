<?php

namespace App\Http\Controllers;

use App\Models\bahanbaku;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class bahanbakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('/bahanbaku.index', [
            'title' => 'Inventory | Bahan Baku',
            'sidebar' => 'bahanbaku',
            'bahanbaku' => bahanbaku::all(),
            'supplier' => Supplier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('/bahanbaku.create', [
            'title' => 'Inventory | Tambah data',
            'sidebar' => 'bahanbaku',
            'bahanbaku' => bahanbaku::all(),
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
            'nama_bahan' => 'required',
            'id_supplier' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'stok_aman' => 'required',
            'harga' => 'required',
            'images' => 'image|file|max:1024|required'
        ]);
        // jika gambar tidak ada 
        if ($request->file('images')) {
            $validasi['images'] = $request->file('images')->store('barang-images');
        }
        bahanbaku::create($validasi);
        return redirect('/bahanbaku')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(bahanbaku $bahanbaku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bahanbaku $bahanbaku)
    {
        //
        return view('/bahanbaku.edit', [
            'title' => 'Inventori | Edit Data',
            'sidebar' => 'bahanbaku',
            'bahanbaku' => $bahanbaku,
            'supplier' => Supplier::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bahanbaku $bahanbaku)
    {
        //
        // dd($request);
        $validasi = $request->validate([
            'nama_bahan' => 'required',
            'id_supplier' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'stok_aman' => 'required',
            'harga' => 'required',
            'images' => 'image|file|max:1024'
        ]);
        if ($request->file('images')) {
            if ($request->oldImages) {
                Storage::delete($request->oldImages);
            }
            $validasi['images'] = $request->file('images')->store('barang-images');
        }
        bahanbaku::where('id', $bahanbaku->id)
            ->update($validasi);
        return redirect('/bahanbaku')->with('success', 'Data Berhasil Di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bahanbaku $bahanbaku)
    {
        //
        if ($bahanbaku->images) {
            Storage::delete($bahanbaku->images);
        }
        bahanbaku::destroy($bahanbaku->id);
        return redirect('/bahanbaku')->with('success', 'Data Berhasil di hapus');
    }
}
