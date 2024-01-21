<?php

namespace App\Http\Controllers;

use App\Models\barangout;
use App\Models\barang;
use App\Models\deskripsibarang;
use App\Models\bahanbaku;
use Illuminate\Http\Request;

class barangoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('/barangout.index', [
            'title' => 'Inventory | Barang Keluar',
            'barang' => barang::all(),
            'barangout' => barangout::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('/barangout.create', [
            'title' => 'Inventory | Tambah Data',
            'barang' => barang::all(),
            'deskripsi' => deskripsibarang::all()
        ]);
    }


    // untuk autofill 
    public function getNamaBarang($kode_barang)
    {
        // Ambil data barang berdasarkan kode_barang
        $barang = Barang::where('kode_barang', $kode_barang)->first();

        // Jika barang ditemukan, ambil juga data supplier
        if ($barang) {
            $deskripsi = deskripsibarang::where('kode_barang', $barang->kode_barang)->get();

            // Mengembalikan data dalam format JSON
            return response()->json([
                'nama_barang' => $barang->nama_barang,
                'nama_bahanbaku' => $deskripsi
            ]);
        } else {
            // Mengembalikan respons jika barang tidak ditemukan
            return response()->json(['error' => 'Barang tidak ditemukan'], 404);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $Validasi = $request->validate([
            'tanggal_keluar' => 'required',
            'kode_barang' => 'required',
            'jumlah_keluar' => 'required',
            'harga_keluar' => 'required',
        ]);
        barangout::create($Validasi);


        $barang = barang::where('kode_barang', $request->kode_barang)->first();
        $barang->stok -= $request->jumlah_keluar;
        $barang->save();

        return redirect('/barangout')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(barangout $barangout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(barangout $barangout)
    {
        //
        return view('/barangout.edit', [
            'title' => 'Inventory | Edit data',
            'barangout' => $barangout,
            'barang' => barang::all(),
            'deskripsi' => deskripsibarang::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, barangout $barangout)
    {
        //
        $Validasi = $request->validate([
            'tanggal_keluar' => 'required',
            'kode_barang' => 'required',
            'jumlah_keluar' => 'required',
            'harga_keluar' => 'required',
        ]);

        barangout::where('id', $barangout->id)
            ->update($Validasi);

        $barang = barang::where('kode_barang', $request->kode_barang)->first();
        $barang->stok -= ($request->jumlah_keluar - $barangout->jumlah_keluar);
        $barang->save();

        return redirect('/barangout')->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(barangout $barangout)
    {
        //
        barangout::destroy($barangout->id);

        $barang = barang::where('kode_barang', $barangout->id_barang)->first();
        $barang->stok += $barangout->jumlah_keluar;
        $barang->save();
        return redirect('/barangout')->with('success', 'Data berhasil di hapus');
    }
}
