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
        Banner::truncate();

        $banners = [
            [
                'judul'  => 'Mewujudkan Tenaga Kesehatan Unggul, Profesional & Berintegritas',
                'url'    => '',
                'urutan' => 1,
                'aktif'  => true,
            ],
            [
                'judul'  => 'Fasilitas Laboratorium Modern & Kerjasama Rumah Sakit Terpadu',
                'url'    => '',
                'urutan' => 2,
                'aktif'  => true,
            ],
        ];

        foreach ($banners as $b) {
            Banner::create($b);
        }
    }
}
