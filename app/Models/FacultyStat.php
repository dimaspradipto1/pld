<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyStat extends Model
{
    protected $table = 'faculty_stats';

    protected $fillable = [
        'title',
        'image',
        'jumlah_prodi',
        'total_mahasiswa',
        'total_dosen',
        'total_alumni',
        'is_active',
    ];

    protected $casts = [
        'is_active'       => 'boolean',
        'jumlah_prodi'    => 'integer',
        'total_mahasiswa' => 'integer',
        'total_dosen'     => 'integer',
        'total_alumni'    => 'integer',
    ];
}
