<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use App\Models\barangin;
use App\Models\barangout;

class laporanController extends Controller
{
    // 
    public function cetakin()
    {
        return view('laporan.cetakin', [
            'title' => 'Inventory | Laporan '
        ]);
    }
    public function cetakinpdf($tglawal, $tglakhir)
    {
        // dd("tanggal awal : " . $tglawal, "tanggal akhir :" . $tglakhir);

        $cetakin = barangin::all()->whereBetween('tanggal_masuk', [$tglawal, $tglakhir]);
        return view('laporan.cetakinpdf', [
            'title' => 'Inventory | LaporanPdf',
            'barang' => barang::all()
        ], compact('cetakin'));
    }
    public function cetakout()
    {
        return view('laporan.cetakout', [
            'title' => 'Inventory | Laporan '
        ]);
    }
    public function cetakoutpdf($tglawal, $tglakhir)
    {
        $cetakout = barangout::all()->whereBetween('tanggal_keluar', [$tglawal, $tglakhir]);
        return view('laporan.cetakoutpdf', [
            'title' => 'Inventory | LaporanPdf',
            'barang' => barang::all()
        ], compact('cetakout'));
    }
}
