<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori;
use App\Models\Satuan;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('/barang.index', [
            'title' => 'Inventory | Barang',
            'barang' => barang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $nextID = barang::max('id') + 1;
        $kode_barang = 'BRG' . now()->format('Ymd') . $nextID;
        return view('/barang.create', [
            'title' => 'Inventory | Tambah Data',
            'barang' => barang::all(),
            'kategori' => kategori::all(),
            'kode' => $kode_barang
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
            'kode_barang' => 'required',
            'nama_barang' => 'required', 'max:100',
            'id_kategori' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'stok_aman' => 'required',
            'harga' => 'required',
            'images' => 'image|file|max:1024'
        ]);
        // jika gambar tidak ada 
        if ($request->file('images')) {
            $validasi['images'] = $request->file('images')->store('barang-images');
        }
        barang::create($validasi);
        return redirect('/barang')->with('success', 'Data Barang Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(barang $barang)
    {
        //
        return view('/barang.edit', [
            'title' => 'Inventory | Edit Barang',
            'barang' => $barang,
            'kategori' => kategori::all(),
            // 'kode' => $kode_barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, barang $barang)
    {
        //
        $validasi = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required', 'max:100',
            'id_kategori' => 'required',
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
        barang::where('id', $barang->id)
            ->update($validasi);
        return redirect('/barang')->with('success', 'Data Berhasil Di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(barang $barang)
    {
        //
        if ($barang->images) {
            Storage::delete($barang->images);
        }
        barang::destroy($barang->id);
        return redirect('/barang')->with('success', 'Data Berhasil di hapus');
    }
}
