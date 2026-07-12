<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'icon'      => 'bi-patch-check-fill',
                'judul'     => 'Bersertifikat & Terpercaya',
                'deskripsi' => 'Seluruh hasil Riksa Uji kami diakui secara hukum sesuai Permenaker yang berlaku dan diterbitkan oleh ahli K3 berkompeten.',
                'urutan'    => 1,
            ],
            [
                'icon'      => 'bi-tools',
                'judul'     => 'Metode Pengujian Standar',
                'deskripsi' => 'Menggunakan metode Non Destructive Test (NDT) dan prosedur pemeriksaan sesuai standar nasional yang berlaku.',
                'urutan'    => 2,
            ],
            [
                'icon'      => 'bi-file-earmark-check',
                'judul'     => 'Laporan Lengkap & Tepat Waktu',
                'deskripsi' => 'Laporan hasil pemeriksaan dan pengujian disusun lengkap beserta kesimpulan dan saran, diserahkan tepat waktu.',
                'urutan'    => 3,
            ],
            [
                'icon'      => 'bi-people-fill',
                'judul'     => 'Tim Ahli K3 Berkompeten',
                'deskripsi' => 'Didukung tenaga ahli K3 berpengalaman yang siap membantu konsultasi kebutuhan inspeksi dan sertifikasi Anda.',
                'urutan'    => 4,
            ],
        ];

        foreach ($features as $f) {
            Feature::create($f);
        }
    }
}
