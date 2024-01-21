<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id_kategori'];
    // protected $with = ['barang'];

    public function barang()
    {
        return $this->hasMany(barang::class, 'id_kategori');
    }
}
