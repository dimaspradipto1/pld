<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul'     => 'Praktikum Uji Higiene Industri & Deteksi Kebisingan',
                'deskripsi' => 'Mahasiswa Program Studi S1 K3 melakukan pengukuran intensitas kebisingan dan lux meter di laboratorium terpadu.',
                'url'       => null,
            ],
            [
                'judul'     => 'Studi Lapangan & Pengambilan Sampel Air Limbah Pesisir',
                'deskripsi' => 'Kegiatan lapangan mahasiswa S1 Kesehatan Lingkungan dalam analisis parameter BOD/COD di perairan industri Batam.',
                'url'       => null,
            ],
            [
                'judul'     => 'Seminar Nasional Kebijakan Kesehatan Masyarakat & Epidemiologi',
                'deskripsi' => 'Kuliah pakar dan diseminasi riset mahasiswa Magister (S2) Kesehatan Masyarakat bersama narasumber Kemenkes.',
                'url'       => null,
            ],
            [
                'judul'     => 'Pelatihan Tanggap Darurat & Simulasi Pemadam Kebakaran',
                'deskripsi' => 'Workshop simulasi keselamatan kerja dan evakuasi kebakaran bersertifikasi bagi mahasiswa FIKES UIS.',
                'url'       => null,
            ],
            [
                'judul'     => 'Bakti Sosial & Pemeriksaan Kesehatan Gratis Masyarakat',
                'deskripsi' => 'Pengabdian kepada masyarakat oleh BEM dan HIMA FIKES di kawasan pemukiman nelayan Pulau Batam.',
                'url'       => null,
            ],
            [
                'judul'     => 'Kunjungan Industri & Audit K3 di Galangan Kapal Terkemuka',
                'deskripsi' => 'Field trip terpadu mahasiswa K3 dalam mengobservasi implementasi SMK3 dan inspeksi keselamatan kerja galangan.',
                'url'       => null,
            ],
        ];

        foreach ($data as $item) {
            Gallery::updateOrCreate(
                ['judul' => $item['judul']],
                $item
            );
        }
    }
}
