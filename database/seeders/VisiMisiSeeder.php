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
        VisiMisi::truncate();

        $data = [
            [
                'tipe'   => 'visi',
                'isi'    => 'Menjadi Pusat Layanan Disabilitas yang unggul, adaptif, dan berdaya saing nasional dalam mewujudkan ekosistem pendidikan tinggi inklusif berlandaskan nilai kemanusiaan, kesetaraan, dan integritas moral.',
                'urutan' => 1,
            ],
            [
                'tipe'   => 'misi',
                'isi'    => 'Menyelenggarakan layanan pendampingan akademik, advokasi hak belajar, serta konseling psikososial yang profesional bagi mahasiswa disabilitas.',
                'urutan' => 1,
            ],
            [
                'tipe'   => 'misi',
                'isi'    => 'Mengembangkan sarana aksesibilitas fisik, teknologi asistif digital, dan akomodasi kurikulum ramah disabilitas.',
                'urutan' => 2,
            ],
            [
                'tipe'   => 'misi',
                'isi'    => 'Membangun budaya kampus inklusif melalui pelatihan Bahasa Isyarat Indonesia (BISINDO) dan penguatan relawan mahasiswa.',
                'urutan' => 3,
            ],
            [
                'tipe'   => 'misi',
                'isi'    => 'Menjalin kemitraan kolaboratif dengan komunitas disabilitas, pegiat Intelek Tuli, dunia usaha, dan instansi pemerintah guna memperluas kesempatan karier alumni.',
                'urutan' => 4,
            ],
        ];

        foreach ($data as $item) {
            VisiMisi::create($item);
        }
    }
}
