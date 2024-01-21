<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    protected $guarded = ['id_satuan'];

    public function barang()
    {
        return $this->hasMany(barang::class, 'id_satuan');
    }
}
