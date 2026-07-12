<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiPerusahaan extends Model
{
    protected $table = 'nilai_perusahaans';

    protected $fillable = [
        'icon',
        'judul',
        'deskripsi',
        'urutan',
    ];
}
