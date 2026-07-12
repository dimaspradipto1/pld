<?php

namespace Database\Seeders;

use App\Models\NilaiPerusahaan;
use Illuminate\Database\Seeder;

class NilaiPerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'icon'      => 'bi-shield-fill-check',
                'judul'     => 'Safety',
                'deskripsi' => 'Mengutamakan keselamatan dan kesehatan kerja serta pelestarian lingkungan hidup dalam setiap kegiatan operasional.',
                'urutan'    => 1,
            ],
            [
                'icon'      => 'bi-award-fill',
                'judul'     => 'Integrity',
                'deskripsi' => 'Mengutamakan tanggung jawab, kepercayaan, dan tidak berpihak.',
                'urutan'    => 2,
            ],
            [
                'icon'      => 'bi-person-badge-fill',
                'judul'     => 'Profesional',
                'deskripsi' => 'Memberikan pelayanan prima dengan didukung oleh ahli yang berkompeten.',
                'urutan'    => 3,
            ],
            [
                'icon'      => 'bi-people-fill',
                'judul'     => 'Sinergi',
                'deskripsi' => 'Membangun kerjasama yang produktif ditandai oleh rasa saling percaya dan terbuka.',
                'urutan'    => 4,
            ],
        ];

        foreach ($data as $item) {
            NilaiPerusahaan::create($item);
        }
    }
}
