<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPenggilingan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'data_penggilingans';

    protected $fillable = [
        'uuid',
        'nama_penggilingan',
        'pemilik',
        'lokasi',
        'no_telepon',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function perpadi()
    {
        return $this->hasMany(Perpadi::class, 'penggilingan_id');
    }
}
