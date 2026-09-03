<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;

    protected $table = 'program_kerjas';

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'sasaran',
        'target_waktu',
        'penanggung_jawab',
        'status',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan'    => 'integer',
    ];
}
