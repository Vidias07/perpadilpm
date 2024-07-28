<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lpm extends Model
{
    use HasFactory;
protected $table='lpm';
    protected $fillable = [
        'nama_lumbung',
        'alamat',
        'tahun',
        'bulan',
        'minggu_ke',
        'komoditas',
        'stok_awal',
        'pengadaan',
        'penyaluran',
        'akhir',
    ];
}
