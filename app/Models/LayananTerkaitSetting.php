<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananTerkaitSetting extends Model
{
    use HasFactory;

    protected $table = 'layanan_terkait_settings';

    protected $fillable = [
        'judul_seksi',
        'subjudul_seksi',
    ];
}
