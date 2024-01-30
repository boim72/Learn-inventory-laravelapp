<?php

namespace App\Http\Controllers;

use App\Models\bahanbakuin;
use App\Models\barang;
use Illuminate\Http\Request;
use App\Models\barangin;
use App\Models\barangout;

class laporanController extends Controller
{
    // 
    public function cetakbahanin(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        //query filter tanggal 
        $bahanin = bahanbakuin::whereBetween('tanggal_masuk', [$start_date, $end_date])->get();
        return view('laporan.cetakbahanin', [
            'title' => 'Laporan Bahanin',
            'bahanin' => $bahanin,
            'start_date' => $start_date,
            'end_date' => $end_date

        ]);
    }
    public function cetakbahaninpdf($start_date, $end_date)
    {
        $bahanin = bahanbakuin::whereBetween('tanggal_masuk', [$start_date, $end_date])->get();

        return view('laporan.cetakbahaninpdf', [
            'bahanin' => $bahanin,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);
    }
    public function cetakin(Request $request)
    {
        $tglawal = $request->input('tglawal');
        $tglakhir = $request->input('tglakhir');
        //query filter tanggal 
        $cetakin = barangin::whereBetween('tanggal_masuk', [$tglawal, $tglakhir])->get();
        return view('laporan.cetakin', [
            'title' => 'Inventory | Laporan ',
            'cetakin' => $cetakin,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir,
            'barang' => barang::all()

        ]);
    }
    public function cetakinpdf($tglawal, $tglakhir)
    {
        // dd("tanggal awal : " . $tglawal, "tanggal akhir :" . $tglakhir);

        $cetakin = barangin::all()->whereBetween('tanggal_masuk', [$tglawal, $tglakhir]);
        return view('laporan.cetakinpdf', [
            'title' => 'Inventory | LaporanPdf',
            'barang' => barang::all(),
            'cetakin' => $cetakin,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir,
        ], compact('cetakin'));
    }

    public function cetakout(Request $request)
    {
        $tglawal = $request->input('tglawal');
        $tglakhir = $request->input('tglakhir');
        //query filter tanggal 
        $cetakout = barangout::whereBetween('tanggal_keluar', [$tglawal, $tglakhir])->get();
        return view('laporan.cetakout', [
            'title' => 'Inventory | Laporan ',
            'barang' => barang::all(),
            'cetakout' => $cetakout,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir
        ]);
    }
    public function cetakoutpdf($tglawal, $tglakhir)
    {
        $cetakout = barangout::all()->whereBetween('tanggal_keluar', [$tglawal, $tglakhir]);
        return view('laporan.cetakoutpdf', [
            'title' => 'Inventory | LaporanPdf',
            'barang' => barang::all(),
            'cetakout' => $cetakout,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir
        ], compact('cetakout'));
    }
}
