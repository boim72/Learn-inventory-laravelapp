<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahanbaku extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['supplier', 'bahanbakuin'];

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }
    public function bahanbakuin()
    {
        return $this->hasMany(bahanbakuin::class, 'id_bahanbaku');
    }
    public function deskripsibarang()
    {
        return $this->hasMany(deskripsibarang::class, 'id_bahanbaku');
    }
}
