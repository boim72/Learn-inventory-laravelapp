<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deskripsibarang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $primarykey = 'id';

    public function bahanbaku()
    {
        return $this->belongsTo(bahanbaku::class, 'id_bahanbaku');
    }
    public function barang()
    {
        return $this->belongsTo(barang::class, 'kode_barang');
    }
}
