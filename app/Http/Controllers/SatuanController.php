<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return View('/satuan.index', [
            'title' => 'Inventory | Satuan',
            'satuan' => Satuan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('/satuan.create', [
            'title' => 'Inventori | create',
            'satuan' => satuan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $ValidasiData = $request->validate([
            'nama_satuan' => 'required | max:255',
        ]);
        satuan::create($ValidasiData);
        return redirect('/satuan')->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        //
        dd($satuan);
        return view('/satuan.edit', compact('satuan'), [
            'title' => 'Inventori | Edit',
            'satuan' => $satuan

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satuan $satuan)
    {
        //
        $ValidasiData = $request->validate([
            'nama_satuan' => 'required | max:255'
        ]);
        satuan::where('id', $satuan->id)
            ->update($ValidasiData);
        return redirect('/satuan')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {
        //
        satuan::destroy($satuan->id_satuan);
        return redirect('/satuan')->with('success', 'data berhasil di hapus');
    }
}
