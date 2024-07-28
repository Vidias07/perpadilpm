<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataLumbung extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'data_lumbungs';

    protected $fillable = [
        'uuid',
        'nama_lumbung',
        'alamat',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function lpms()
    {
        return $this->hasMany(Lpm::class, 'lumbung_id');
    }
}
