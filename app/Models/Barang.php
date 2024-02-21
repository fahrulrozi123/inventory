<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'id_barang',
        'nama_barang',
        'deskripsi',
        'stok',
        's_stok',
        'satuan',
        's_satuan',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // public function katagori()
    // {
    //     return $this->belongsTo(Kategori::class);
    // }
}
