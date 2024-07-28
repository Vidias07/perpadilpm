<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpadi extends Model
{
    use HasFactory;
    protected $table = 'perpadi';
    protected $fillable = [
        'penggilingan_id',
        'uuid',
        'harga_gabah', // Menambahkan kolom Harga Gabah (IDR)
        'stok_gabah',  // Menambahkan kolom Stok Gabah (ton)
        'harga_beras', // Menambahkan kolom Harga Beras  (IDR)
        'stok_beras',  // Menambahkan kolom Stok Beras (ton)
    ];

    public function penggilingan()
    {
        return $this->belongsTo(DataPenggilingan::class, 'penggilingan_id');
    }
}
