<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'judul'  => 'PT Berkarya Jasa Inspeksi — Riksa Uji, Kalibrasi & Sertifikasi K3',
                'url'    => 'banners/8TQ5LbuGe2Pf7GephifdMKcU0khIGR1cBjKRCBBG.png',
                'urutan' => 1,
                'aktif'  => true,
            ],
            [
                'judul'  => 'Bersertifikat & Sesuai Standar Kemnaker',
                'url'    => 'banners/QaGJ6EHVifosK4MqfLaEM8fHtzwqmErcGR8xUDWe.png',
                'urutan' => 2,
                'aktif'  => true,
            ],
        ];

        foreach ($banners as $b) {
            Banner::create($b);
        }
    }
}
