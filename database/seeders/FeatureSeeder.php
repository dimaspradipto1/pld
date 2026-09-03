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
        Feature::truncate();

        $features = [
            [
                'icon'      => 'bi-universal-access',
                'judul'     => 'Akomodasi Pembelajaran Fleksibel',
                'deskripsi' => 'Penyesuaian format materi ajar, perpanjangan waktu ujian, serta ruang ujian adaptif sesuai kebutuhan khusus mahasiswa.',
                'urutan'    => 1,
            ],
            [
                'icon'      => 'bi-translate',
                'judul'     => 'Juru Bahasa Isyarat (BISINDO)',
                'deskripsi' => 'Fasilitasi penerjemah bahasa isyarat profesional untuk perkuliahan, seminar akademik, wisuda, dan kegiatan kampus.',
                'urutan'    => 2,
            ],
            [
                'icon'      => 'bi-heart-pulse-fill',
                'judul'     => 'Konseling & Pendampingan Psikologis',
                'deskripsi' => 'Layanan konseling privat, aman, dan konfidensial bersama psikolog profesional serta dukungan peer counselor mahasiswa.',
                'urutan'    => 3,
            ],
            [
                'icon'      => 'bi-people-fill',
                'judul'     => 'Komunitas Relawan Inklusif',
                'deskripsi' => 'Jejaring relawan mahasiswa terlatih yang siap mendampingi pencatatan materi (notetaker), mobilitas fisik, dan adaptasi kampus.',
                'urutan'    => 4,
            ],
        ];

        foreach ($features as $f) {
            Feature::create($f);
        }
    }
}
