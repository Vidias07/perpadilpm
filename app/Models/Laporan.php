<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Laporan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'tanggal',
        'sumber',
        'note',
        'status',
        'single_date',
        'start_date',
        'end_date',
        'preview',
    ];

    // Model Event untuk membuat UUID sebelum menyimpan
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }
}
