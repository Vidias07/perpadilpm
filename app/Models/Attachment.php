<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{

    use HasFactory;
    protected $table = 'attachment';

    protected $fillable = [
        'user_id',
        'signature',
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'user_id', 'id');
    }
}
