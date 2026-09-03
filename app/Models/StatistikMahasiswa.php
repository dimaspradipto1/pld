<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'statistik_mahasiswas';

    protected $fillable = [
        'nim',
        'nama',
        'jenis_kelamin',
        'jenis_disabilitas',
        'fakultas',
        'prodi',
        'angkatan',
        'status',
        'keterangan',
    ];

    /**
     * Opsi standar jenis disabilitas
     */
    public static function listJenisDisabilitas(): array
    {
        return [
            'Tunanetra',
            'Tunadaksa',
            'Tunarungu',
            'Tunagrahita',
            'Kesulitan Belajar',
            'Tunawicara',
            'Autisme',
            'Lainnya',
        ];
    }

    /**
     * Opsi standar fakultas di UIS
     */
    public static function listFakultas(): array
    {
        return [
            'Fakultas Ilmu Komputer',
            'Fakultas Teknik',
            'Fakultas Ekonomi & Bisnis',
            'Fakultas Agama Islam',
            'Fakultas Hukum',
            'Fakultas Ilmu Kesehatan',
        ];
    }
}
