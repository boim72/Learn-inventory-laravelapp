<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $guarded = ['id_supplier'];

    public function barang()
    {
        return $this->hasMany(barang::class, 'id_supplier');
    }
    public function bahanbaku()
    {
        return $this->hasMany(bahanbaku::class, 'id_supplier');
    }
    // public function barangmasuk()
    // {
    //     return $this->hasMany(BarangMasuk::class, 'id_supplier');
    // }
    // public function barangin()
    // {
    //     return $this->hasMany(barangin::class, 'id_supplier');
    // }
    public function barangout()
    {
        return $this->hasMany(barangout::class, 'id_supplier');
    }
}
