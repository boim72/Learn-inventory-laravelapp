<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $primarykey = 'id';

    public function barang()
    {
        return $this->belongsTo(barang::class, 'kode_barang');
    }
    // public function Supplier()
    // {
    //     return $this->belongsTo(Supplier::class, 'id_supplier');
    // }
}
