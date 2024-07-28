<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lpm extends Model
{
    use HasFactory;
    protected $table = 'lpm';
    protected $fillable = [
        'lumbung_id',
        'uuid',
        'harga_gabah',
        'stok_gabah',
        'harga_beras',
        'stok_beras',
    ];

    protected static function boot()
    {
        parent::boot();

        // Automatically generate UUID for new records
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function lumbung()
    {
        return $this->belongsTo(DataLumbung::class, 'lumbung_id');
    }
}
