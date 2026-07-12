<?php

namespace Database\Seeders;

use App\Models\VisiMisi;
use Illuminate\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tipe'   => 'visi',
                'isi'    => 'Menjadi mitra bisnis terpercaya untuk layanan inspeksi, pengujian dan sertifikasi di bidang keselamatan dan kesehatan kerja.',
                'urutan' => 1,
            ],
            [
                'tipe'   => 'misi',
                'isi'    => 'Meningkatkan kualitas SDM di bidang K3.',
                'urutan' => 1,
            ],
            [
                'tipe'   => 'misi',
                'isi'    => 'Meningkatkan pengujian, pelayanan teknis, dan informasi di bidang K3.',
                'urutan' => 2,
            ],
            [
                'tipe'   => 'misi',
                'isi'    => 'Meningkatkan kualitas pelaksanaan, pembinaan, dan pengawasan Keselamatan dan Kesehatan Kerja dalam mewujudkan upaya kinerja K3 yang optimal.',
                'urutan' => 3,
            ],
            [
                'tipe'   => 'misi',
                'isi'    => 'Menjadi mitra terpercaya bagi klien dan instansi pemerintahan untuk meningkatkan efisiensi dan produktivitas.',
                'urutan' => 4,
            ],
        ];

        foreach ($data as $item) {
            VisiMisi::create($item);
        }
    }
}
