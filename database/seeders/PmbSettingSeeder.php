<?php

namespace Database\Seeders;

use App\Models\PmbSetting;
use Illuminate\Database\Seeder;

class PmbSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $year = (int) date('Y');

        PmbSetting::updateOrCreate(
            ['id' => 1],
            [
                'badge_text'    => 'PENERIMAAN MAHASISWA BARU (PMB) T.A. ' . $year . '/' . ($year + 1),
                'judul'         => 'Daftar Sekarang & Raih Masa Depan Inklusif Bersama Universitas Ibnu Sina!',
                'deskripsi'     => 'Penerimaan Mahasiswa Baru Universitas Ibnu Sina terbuka lebar untuk seluruh calon mahasiswa, termasuk penyandang disabilitas dengan dukungan akomodasi dan fasilitas pendampingan penuh dari PLD UIS.',
                'tombol_text_1' => 'Daftar PMB Online',
                'tombol_link_1' => 'https://pmb.uis.ac.id/',
                'tombol_text_2' => 'Konsultasi WhatsApp PMB',
                'tombol_link_2' => '',
                'gelombang_1'   => 'Gelombang 1: Jan - Apr',
                'gelombang_2'   => 'Gelombang 2: Mei - Jul',
                'gelombang_3'   => 'Gelombang 3: Agu - Sep',
                'is_active'     => true,
            ]
        );
    }
}
