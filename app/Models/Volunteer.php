<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $table = 'volunteers';

    protected $fillable = [
        'nama_lengkap',
        'nim',
        'jurusan_prodi',
        'no_hp_wa',
        'email',
        'keahlian',
        'alasan_bergabung',
        'status',
    ];
}
