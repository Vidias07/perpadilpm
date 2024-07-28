<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpadi extends Model
{
    use HasFactory;

    protected $table = 'perpadi';

    protected $fillable = [
        'nama_penggilingan',
        'pemilik',
        'lokasi',
        'no_telepon',
        'harga_gabah', // Menambahkan kolom Harga Gabah (IDR)
        'stok_gabah',  // Menambahkan kolom Stok Gabah (ton)
        'harga_beras', // Menambahkan kolom Harga Beras  (IDR)
        'stok_beras',  // Menambahkan kolom Stok Beras (ton)
        'tanggal',
    ];
}
