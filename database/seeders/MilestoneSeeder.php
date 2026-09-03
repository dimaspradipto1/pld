<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Milestone;

class MilestoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Milestone::truncate();

        $milestones = [
            [
                'tahun'     => 2020,
                'judul'     => 'Inisiasi Pokja Kampus Inklusif',
                'deskripsi' => 'Pembentukan Kelompok Kerja (Pokja) Pendidikan Inklusif Universitas Ibnu Sina sebagai respon komitmen terhadap UU No. 8 Tahun 2016 tentang Penyandang Disabilitas.',
            ],
            [
                'tahun'     => 2022,
                'judul'     => 'Peresmian Resmi PLD UIS',
                'deskripsi' => 'Penerbitan Surat Keputusan Rektorat mengenai Pendirian Pusat Layanan Disabilitas (PLD) UIS sebagai unit penunjang utama aksesibilitas mahasiswa disabilitas.',
            ],
            [
                'tahun'     => 2024,
                'judul'     => 'Program Relawan & Divisi JBI BISINDO',
                'deskripsi' => 'Peluncuran perdana perekrutan Relawan Mahasiswa Inklusif dan penyediaan Juru Bahasa Isyarat (JBI) resmi untuk mendampingi kegiatan belajar mengajar.',
            ],
            [
                'tahun'     => 2026,
                'judul'     => 'Ekosistem Digital & Sinergi Intelek Tuli',
                'deskripsi' => 'Pengembangan portal layanan mandiri aksesibel, fasilitas Resource Center cerdas, dan kemitraan advokasi bersama komunitas Intelek Tuli serta dunia industri.',
            ],
        ];

        foreach ($milestones as $item) {
            Milestone::create($item);
        }
    }
}
