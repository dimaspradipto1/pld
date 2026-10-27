<?php

namespace Database\Seeders;

use App\Models\StatistikMahasiswa;
use Illuminate\Database\Seeder;

class StatistikMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatistikMahasiswa::truncate();

        $sampleData = [
            [
                'nim'               => '22011018',
                'nama'              => 'Maya Ramadhan',
                'jenis_kelamin'     => 'P',
                'jenis_disabilitas' => 'Tunanetra',
                'fakultas'          => 'FAKULTAS SAINS DAN TEKNOLOGI (FST)',
                'prodi'             => 'S1-TEKNIK INFORMATIKA',
                'angkatan'          => 2022,
                'status'            => 'Aktif',
                'keterangan'        => 'Pendampingan reguler PLD UIS',
            ],
            [
                'nim'               => '23011025',
                'nama'              => 'Ahmad Pratama',
                'jenis_kelamin'     => 'L',
                'jenis_disabilitas' => 'Tunarungu',
                'fakultas'          => 'FAKULTAS EKONOMI DAN BISNIS (FEB)',
                'prodi'             => 'S1-MANAJEMEN',
                'angkatan'          => 2023,
                'status'            => 'Aktif',
                'keterangan'        => 'Pendampingan reguler PLD UIS',
            ],
        ];

        foreach ($sampleData as $item) {
            StatistikMahasiswa::create($item);
        }
    }
}
