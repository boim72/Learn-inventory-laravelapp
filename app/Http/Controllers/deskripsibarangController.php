<?php

namespace App\Http\Controllers;

use App\Models\bahanbaku;
use App\Models\barang;
use App\Models\deskripsibarang;
use Illuminate\Http\Request;

class deskripsibarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $barang = barang::all();

        // Buat array untuk menampung hasil query deskripsibarang
        $deskripsiBarangArray = [];

        // Loop through each barang
        foreach ($barang as $item) {
            // Ambil satu baris data deskripsibarang berdasarkan kode_barang
            $deskripsi = deskripsibarang::where('kode_barang', $item->kode_barang)->get();

            // Jika data deskripsibarang ditemukan, tambahkan ke array

            $deskripsiBarangArray[$item->kode_barang] = $deskripsi;
        }

        return view('/deskripsibarang.index', [
            'title' => 'Inventori | Deskripsi Barang',
            'deskripsi' => deskripsibarang::all(),
            'bahanbaku' => bahanbaku::all(),
            'barang' => barang::all(),
            'desk' => $deskripsiBarangArray
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //

    //     return view('/deskripsibarang.create', [
    //         'title' => 'Inventory | Tambah Data',
    //         'deskripsi' => deskripsibarang::all(),
    //         'bahanbaku' => bahanbaku::all(),
    //         'barang' => barang::all()
    //     ]);
    // }

    public function add($kode_barang)
    {
        //
        // $barang = barang::find($kode_barang);
        $barang = barang::where('kode_barang', $kode_barang)->first();
        // dd($barang);
        return view('/deskripsibarang.add', [
            'title' => 'Inventory | Tambah Deskripsi',
            'deskripsi' => $barang,
            // 'deskripsi' => deskripsibarang::all(),
            'deskripsibarang' => deskripsibarang::all(),
            'bahanbaku' => bahanbaku::all(),
            'barang' => barang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'kode_barang' => 'required',
            'id_bahanbaku' => 'required',
            'jumlah' => 'required|array|min:1', // Memastikan jumlah adalah array dan memiliki setidaknya satu elemen
            'jumlah.*' => 'required|numeric|min:1', // Setiap elemen dalam array jumlah harus numerik dan minimal 1
        ]);
        // 
        $kode_barang = $request->input('kode_barang');
        $id_bahanbaku = $request->input('id_bahanbaku');
        $jumlah = $request->input('jumlah');
        // loop untuk menyimpan data 
        for ($i = 0; $i < count($jumlah); $i++) {
            deskripsibarang::create([
                'kode_barang' => $kode_barang,
                // 'nama_barang' => $nama_barang,
                'id_bahanbaku' => $id_bahanbaku[$i],
                'jumlah' => $jumlah[$i]
            ]);
        }

        return redirect('/deskripsibarang')->with('success', 'Data Berhasil di tambahkan');
    }

    public function getDeskripsi($kode_barang)
    {
        // Ambil data barang berdasarkan kode_barang
        $barang = Barang::where('kode_barang', $kode_barang)->first();
        // Jika barang ditemukan, ambil juga data supplier
        if ($barang) {

            // Mengembalikan data dalam format JSON
            return response()->json([
                'nama_barang' => $barang->nama_barang,
            ]);
        } else {
            // Mengembalikan respons jika barang tidak ditemukan
            return response()->json(['error' => 'Barang tidak ditemukan'], 404);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(deskripsibarang $deskripsibarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(deskripsibarang $deskripsibarang)
    {
        //
        return view('/deskripsibarang.edit', [
            'title' => 'Inventory | Edit Deskripsi',
            'deskripsi' => $deskripsibarang,
            'deskripsibarang' => deskripsibarang::all(),
            'bahanbaku' => bahanbaku::all(),
            'barang' => barang::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, deskripsibarang $deskripsibarang)
    {
        //
        // dd($deskripsibarang->kode_barang);
        $request->validate([
            'kode_barang' => 'required',
            'id_bahanbaku' => 'required',
            'jumlah' => 'required|array|min:1', // Memastikan jumlah adalah array dan memiliki setidaknya satu elemen
            'jumlah.*' => 'required|numeric|min:1', // Setiap elemen dalam array jumlah harus numerik dan minimal 1
        ]);

        $deskripsibarang->update([
            'kode_barang' => $request->input('kode_barang'),
        ]);
        // Iterasi melalui data baru dan perbarui atau tambahkan ke database
        foreach ($request->input('id_bahanbaku') as $i => $id_bahanbaku) {
            deskripsibarang::updateOrCreate(
                [
                    'kode_barang' => $request->input('kode_barang'),
                    'id_bahanbaku' => $id_bahanbaku,
                ],
                [
                    'jumlah' => $request->input('jumlah')[$i],
                ]
            );
        }
        return redirect('/deskripsibarang')->with('succeess', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(deskripsibarang $deskripsibarang)
    {
        //
        // dd(
        //     $deskripsibarang->kode_barang
        // );

        deskripsibarang::where('kode_barang', $deskripsibarang->kode_barang)->delete();

        return redirect('/deskripsibarang')->with('success', 'Data Berhasil di hapus');
    }
}
