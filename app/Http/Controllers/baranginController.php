<?php

namespace App\Http\Controllers;

use App\Models\bahanbaku;
use App\Models\barangin;
use App\Models\barang;
use App\Models\deskripsibarang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class baranginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        return view('/barangin.index', [
            'title' => 'Inventory | Barang Masuk',
            'barangin' => barangin::all(),
            'barang' => barang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('/barangin.create', [
            'title' => 'Inventory | Tambah Data',
            'barang' => barang::all(),
            'deskripsi' => deskripsibarang::all(),
            // 'supplier' => Supplier::all(),
            'kode' => barang::find('kode_barang')

        ]);
    }
    // untuk autofill 
    public function getNamaBarang($kode_barang)
    {
        // Ambil data barang berdasarkan kode_barang
        $barang = Barang::where('kode_barang', $kode_barang)->first();
        // dd($barang);
        // Jika barang ditemukan, ambil juga data supplier
        if ($barang) {
            // $supplier = Supplier::find($barang->id_supplier);
            $deskripsi = deskripsibarang::where('kode_barang', $barang->kode_barang)->get();
            // foreach ($deskripsi as $b) {
            //     # code...
            //     $b = $deskripsi->jumlah;
            // };
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
        // dd($request);


        $Validasi = $request->validate([
            'tanggal_masuk' => 'required',
            'kode_barang' => 'required|string',
            // 'id_supplier' => '',
            'jumlah_masuk' => 'required',
            'harga_masuk' => 'required|numeric',
            // 'nama_barang' => 'nullable'
        ]);
        barangin::create($Validasi);

        // UPDATE STOK BAHAN BAKU
        $deskripsiBarang = deskripsibarang::where('kode_barang', $request->kode_barang)->get();
        $totals = [];

        foreach ($deskripsiBarang as $deskripsi) {
            // Memastikan bahwa $deskripsi->id_bahanbaku adalah array sebelum mengakses elemennya
            if (is_array($deskripsi->id_bahanbaku)) {
                // Jika id_bahanbaku adalah array, ambil elemen pertama
                $idBahanBaku = $deskripsi->id_bahanbaku[0];
            } else {
                $idBahanBaku = $deskripsi->id_bahanbaku;
            }

            $total = $deskripsi->jumlah * $request->jumlah_masuk;
            $totals[] = [
                'id_bahanbaku' => $idBahanBaku,
                'total' => $total,
            ];
            // Kurangi stok pada tabel bahanbaku berdasarkan id_bahanbaku
            $bahanBaku = bahanbaku::find($idBahanBaku);
            $bahanBaku->stok -= $total;
            $bahanBaku->save();
        }

        // update stok barang 
        $barang = barang::where('kode_barang', $request->kode_barang)->first();
        $barang->stok += $request->jumlah_masuk;
        $barang->save();

        return redirect('/barangin')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(barangin $barangin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(barangin $barangin)
    {
        //
        return view('/barangin.edit', [
            'title' => 'Inventory | Edit data',
            'barangin' => $barangin,
            'barang' => barang::all(),
            'deskripsi' => deskripsibarang::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, barangin $barangin)
    {
        //
        // dd($request);
        $Validasi = $request->validate([
            'tanggal_masuk' => 'required',
            'kode_barang' => 'required',
            // 'id_supplier' => 'required',
            'jumlah_masuk' => 'required',
            'harga_masuk' => 'required',
            // 'nama_barang' => 'nullable'
        ]);

        barangin::where('id', $barangin->id)
            ->update($Validasi);

        // UPDATE STOK BAHAN BAKU
        $deskripsiBarang = deskripsibarang::where('kode_barang', $request->kode_barang)->get();
        $totals = [];

        foreach ($deskripsiBarang as $deskripsi) {
            // Memastikan bahwa $deskripsi->id_bahanbaku adalah array sebelum mengakses elemennya
            if (is_array($deskripsi->id_bahanbaku)) {
                // Jika id_bahanbaku adalah array, ambil elemen pertama
                $idBahanBaku = $deskripsi->id_bahanbaku[0];
            } else {
                $idBahanBaku = $deskripsi->id_bahanbaku;
            }
            $totalsementara = $deskripsi->jumlah * $barangin->jumlah_masuk;
            $total = $totalsementara - ($deskripsi->jumlah * $request->jumlah_masuk);
            $totals[] = [
                'id_bahanbaku' => $idBahanBaku,
                'total' => $total,
            ];
            // Kurangi stok pada tabel bahanbaku berdasarkan id_bahanbaku
            $bahanBaku = bahanbaku::find($idBahanBaku);
            $bahanBaku->stok += $total;
            $bahanBaku->save();
        }

        $barang = barang::where('kode_barang', $request->kode_barang)->first();
        $barang->stok += ($request->jumlah_masuk - $barangin->jumlah_masuk);
        $barang->save();


        return redirect('/barangin')->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(barangin $barangin)
    {

        barangin::destroy($barangin->id);

        // UPDATE STOK BAHAN BAKU
        $deskripsiBarang = deskripsibarang::where('kode_barang', $barangin->kode_barang)->get();
        $totals = [];

        foreach ($deskripsiBarang as $deskripsi) {
            // Memastikan bahwa $deskripsi->id_bahanbaku adalah array sebelum mengakses elemennya
            if (is_array($deskripsi->id_bahanbaku)) {
                // Jika id_bahanbaku adalah array, ambil elemen pertama
                $idBahanBaku = $deskripsi->id_bahanbaku[0];
            } else {
                $idBahanBaku = $deskripsi->id_bahanbaku;
            }

            $total = $deskripsi->jumlah * $barangin->jumlah_masuk;
            $totals[] = [
                'id_bahanbaku' => $idBahanBaku,
                'total' => $total,
            ];
            // Kurangi stok pada tabel bahanbaku berdasarkan id_bahanbaku
            $bahanBaku = bahanbaku::find($idBahanBaku);
            $bahanBaku->stok += $total;
            $bahanBaku->save();
        }

        $barang = barang::where('kode_barang', $barangin->kode_barang)->first();
        $barang->stok -= $barangin->jumlah_masuk;
        $barang->save();

        return redirect('/barangin')->with('success', 'Data berhasil di hapus');
    }
}
