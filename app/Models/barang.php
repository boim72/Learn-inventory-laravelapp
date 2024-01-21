<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['kategori', 'Satuan', 'Supplier', 'barangin', 'deskripsibarang'];

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori');
    }
    public function Satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }
    public function supplier()
    {
        return $this->belongsTo(supplier::class, 'id_supplier');
    }
    // public function barang_masuks()
    // {
    //     return $this->hasMany(BarangMasuk::class, 'id_barang');
    // }
    public function barangin()
    {
        return $this->hasMany(barangin::class, 'kode_barang');
    }
    public function barangout()
    {
        return $this->hasMany(barangout::class, 'kode_barang');
    }
    public function deskripsibarang()
    {
        return $this->hasMany(deskripsibarang::class, 'kode_barang');
    }
}
