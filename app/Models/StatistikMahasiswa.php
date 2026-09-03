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
     * Struktur hierarki Fakultas dan Program Studi di UIS
     */
    public static function listFakultasProdi(): array
    {
        return [
            'FAKULTAS EKONOMI DAN BISNIS (FEB)' => [
                'S2-MAGISTER MANAJEMEN',
                'S1-AKUNTANSI',
                'S1-MANAJEMEN',
            ],
            'FAKULTAS SAINS DAN TEKNOLOGI (FST)' => [
                'S1-TEKNIK INDUSTRI',
                'S1-TEKNIK INFORMATIKA',
                'S1-TEKNIK LOGISTIK',
                'S1-SISTEM INFORMASI',
                'S1-TEKNIK PERKAPALAN',
            ],
            'FAKULTAS ILMU KESEHATAN (FIKes)' => [
                'S2-KESEHATAN MASYARAKAT',
                'S1-KESEHATAN DAN KESELAMATAN KERJA',
                'S1-KESEHATAN LINGKUNGAN',
            ],
        ];
    }

    /**
     * Opsi standar Fakultas di UIS
     */
    public static function listFakultas(): array
    {
        return array_keys(self::listFakultasProdi());
    }

    /**
     * Daftar seluruh Program Studi di UIS
     */
    public static function listProdi(): array
    {
        $all = [];
        foreach (self::listFakultasProdi() as $prodis) {
            $all = array_merge($all, $prodis);
        }
        return $all;
    }

    /**
     * Accessor untuk mendapatkan teks keterangan bersih tanpa tag HTML
     */
    public function getCleanKeteranganAttribute(): string
    {
        return trim(strip_tags(html_entity_decode($this->keterangan ?? '')));
    }
}
