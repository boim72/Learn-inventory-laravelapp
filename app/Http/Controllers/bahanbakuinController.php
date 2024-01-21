<?php

namespace App\Http\Controllers;

use App\Models\bahanbaku;
use App\Models\bahanbakuin;
use App\Models\Supplier;
use Illuminate\Http\Request;

class bahanbakuinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('/bahanbakuin.index', [
            'title' => 'Inventory | Bahan Masuk',
            'bahanbakuin' => bahanbakuin::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('/bahanbakuin.create', [
            'title' => 'Inventory | Tamabah Data',
            // 'bahanbakuin' => bahanbakuin::all(),
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
        $validasi = $request->validate([
            'tanggal_masuk' => 'required',
            'id_bahanbaku' => 'required',
            'jumlah_masuk' => 'required',
            'harga_masuk' => 'required'
        ]);
        bahanbakuin::create($validasi);
        // update stok bahan baku 
        $bahanbaku = bahanbaku::find($request->id_bahanbaku);
        $bahanbaku->stok += $request->jumlah_masuk;
        $bahanbaku->save();

        return redirect('/bahanbakuin')->with('success', 'Data berhasil di tambahkan');
    }
    // untuk autofill 
    public function getNamaBahan($id)
    {
        // Ambil data bahanbaku berdasarkan nama barang
        $bahan = bahanbaku::where('id', $id)->first();

        // Jika barang ditemukan, ambil juga data supplier
        if ($bahan) {
            $supplier = Supplier::find($bahan->id_supplier);

            // Mengembalikan data dalam format JSON
            return response()->json([
                'nama_bahan' => $bahan->nama_bahan,
                'nama_supplier' => $supplier->nama_supplier
            ]);
        } else {
            // Mengembalikan respons jika barang tidak ditemukan
            return response()->json(['error' => 'Barang tidak ditemukan'], 404);
        }
    }
    // public function getNamaBahan($id)
    // {
    //     // Ambil data barang berdasarkan kode_barang
    //     $bahan = bahanbaku::where('id', $id)->first();

    //     // Tambahkan log untuk melihat data
    //     \Log::info('Data Bahan: ' . print_r($bahan, true));

    //     // Jika barang ditemukan, ambil juga data supplier
    //     if ($bahan) {
    //         $supplier = Supplier::find($bahan->id_supplier);

    //         // Tambahkan log untuk melihat data supplier
    //         \Log::info('Data Supplier: ' . print_r($supplier, true));

    //         // Mengembalikan data dalam format JSON
    //         return response()->json([
    //             'nama_bahan' => $bahan->nama_bahan,
    //             'nama_supplier' => $supplier->nama_supplier
    //         ]);
    //     } else {
    //         // Mengembalikan respons jika barang tidak ditemukan
    //         return response()->json(['error' => 'Barang tidak ditemukan'], 404);
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(bahanbakuin $bahanbakuin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bahanbakuin $bahanbakuin)
    {
        //
        return view('/bahanbakuin.edit', [
            'title' => 'Inventory | Edit data',
            'bahanbakuin' => $bahanbakuin,
            'bahanbaku' => bahanbaku::all(),
            'supplier' => Supplier::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bahanbakuin $bahanbakuin)
    {
        //
        $validasi = $request->validate([
            'tanggal_masuk' => 'required',
            'id_bahanbaku' => 'required',
            'jumlah_masuk' => 'required',
            'harga_masuk' => 'required'
        ]);
        bahanbakuin::where('id', $bahanbakuin->id)
            ->update($validasi);
        $bahanbaku = bahanbaku::find($request->id_bahanbaku);
        $bahanbaku->stok += ($request->jumlah_masuk - $bahanbakuin->jumlah_masuk);
        $bahanbaku->save();

        return redirect('/bahanbakuin')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bahanbakuin $bahanbakuin)
    {
        //
        bahanbakuin::destroy($bahanbakuin->id);
        $bahanbaku = bahanbaku::find($bahanbakuin->id_bahanbaku);
        $bahanbaku->stok -= $bahanbakuin->jumlah_masuk;
        $bahanbaku->save();

        return redirect('/bahanbakuin')->with('success', 'Data Berhasil di Hapus');
    }
}
