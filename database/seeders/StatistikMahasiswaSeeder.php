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

        $disabilitasData = [
            'Tunanetra'         => 42,
            'Tunadaksa'         => 34,
            'Tunarungu'         => 26,
            'Tunagrahita'       => 14,
            'Kesulitan Belajar' => 8,
            'Tunawicara'        => 4,
        ];

        $fakultasProdi = StatistikMahasiswa::listFakultasProdi();

        $currentYear = (int) date('Y');
        $angkatanList = [$currentYear - 4, $currentYear - 3, $currentYear - 2, $currentYear - 1, $currentYear];
        $namaDepanL = ['Ahmad', 'Budi', 'Dimas', 'Fajar', 'Hendra', 'Iqbal', 'Rizky', 'Wahyu', 'Bayu', 'Fikri', 'Satria', 'Bambang', 'Danang', 'Eko', 'Gilang', 'Ilham'];
        $namaDepanP = ['Anisa', 'Citra', 'Dian', 'Fatimah', 'Gita', 'Indah', 'Lestari', 'Maya', 'Nabila', 'Putri', 'Rani', 'Siti', 'Tri', 'Wulandari', 'Yuliana', 'Zahra'];
        $namaBelakang = ['Pratama', 'Saputra', 'Hidayat', 'Kurniawan', 'Ramadhan', 'Wijaya', 'Nugroho', 'Pangestu', 'Kusuma', 'Santoso', 'Utama', 'Siregar', 'Wibowo', 'Firmansyah'];

        $fakultasKeys = array_keys($fakultasProdi);
        $nimCounter = 1001;

        foreach ($disabilitasData as $jenis => $count) {
            for ($i = 1; $i <= $count; $i++) {
                $jk = ($i % 2 === 0) ? 'P' : 'L';
                $depan = ($jk === 'L') ? $namaDepanL[array_rand($namaDepanL)] : $namaDepanP[array_rand($namaDepanP)];
                $belakang = $namaBelakang[array_rand($namaBelakang)];
                $nama = $depan . ' ' . $belakang;

                $fakultas = $fakultasKeys[array_rand($fakultasKeys)];
                $prodiList = $fakultasProdi[$fakultas];
                $prodi = $prodiList[array_rand($prodiList)];
                $angkatan = $angkatanList[array_rand($angkatanList)];
                $nim = substr((string)$angkatan, 2, 2) . '01' . str_pad((string)$nimCounter++, 4, '0', STR_PAD_LEFT);

                $status = ($angkatan <= 2021 && $i % 3 === 0) ? 'Lulus' : 'Aktif';

                StatistikMahasiswa::create([
                    'nim'               => $nim,
                    'nama'              => $nama,
                    'jenis_kelamin'     => $jk,
                    'jenis_disabilitas' => $jenis,
                    'fakultas'          => $fakultas,
                    'prodi'             => $prodi,
                    'angkatan'          => $angkatan,
                    'status'            => $status,
                    'keterangan'        => 'Pendampingan reguler PLD UIS',
                ]);
            }
        }
    }
}
