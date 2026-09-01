<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanans';

    protected $fillable = [
        'icon',
        'judul',
        'dasar_hukum',
        'link',
        'deskripsi',
        'rincian',
        'urutan',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];
}
