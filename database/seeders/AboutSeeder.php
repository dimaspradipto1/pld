<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            // Profil Perusahaan
            'judul_profil'      => 'Perusahaan Jasa <em>Keselamatan dan Kesehatan Kerja</em>',
            'deskripsi_profil_1' => 'PT Berkarya Jasa Inspeksi adalah perusahaan jasa keselamatan dan kesehatan kerja. Bergerak di bidang pemeriksaan uji kelayakan peralatan, konsultasi, sertifikasi, kalibrasi, dan perpanjangan lisensi peralatan. Kegiatan kami adalah memastikan bahwa peralatan sudah benar dan sesuai dengan standar K3 yang berlaku sesuai dengan peraturan perundang-undangan.',
            'deskripsi_profil_2' => 'Layanan kami mencakup Riksa Uji Pesawat Angkat dan Angkut, Pesawat Tenaga Produksi, Bejana Tekan dan Tangki Timbun, Pesawat Uap/Ketel Uap, Instalasi Listrik dan Penyalur Petir, hingga Instalasi Proteksi Kebakaran — seluruhnya ditangani oleh tenaga ahli K3 yang kompeten.',

            // Visi
            'visi_judul' => 'Visi Kami',
            'visi_icon'  => 'bi-eye',
            'visi'       => 'Menjadi mitra bisnis terpercaya untuk layanan inspeksi, pengujian, dan sertifikasi di bidang keselamatan dan kesehatan kerja.',

            // Misi (setiap poin dipisah dengan \n)
            'misi_judul' => 'Misi Kami',
            'misi_icon'  => 'bi-rocket-takeoff',
            'misi'       => "Meningkatkan kualitas SDM di bidang K3.\nMeningkatkan pengujian, pelayanan teknis, dan informasi di bidang K3.\nMeningkatkan kualitas pelaksanaan, pembinaan, dan pengawasan Keselamatan dan Kesehatan Kerja dalam mewujudkan upaya kinerja K3 yang optimal.\nMenjadi mitra terpercaya bagi klien dan instansi pemerintahan untuk meningkatkan efisiensi dan produktivitas.",

            // Nilai Perusahaan — Section Header
            'judul_nilai'     => 'Nilai yang Kami',
            'deskripsi_nilai' => 'Kualitas dan kepercayaan bukanlah sebuah kebetulan, melainkan hasil dari komitmen terhadap nilai-nilai yang kami terapkan setiap hari.',

            // Nilai 1 — Safety
            'nilai_1_judul'     => 'Safety',
            'nilai_1_deskripsi' => 'Mengutamakan keselamatan dan kesehatan kerja serta pelestarian lingkungan hidup dalam setiap kegiatan operasional.',
            'nilai_1_icon'      => 'bi-shield-fill-check',

            // Nilai 2 — Integrity
            'nilai_2_judul'     => 'Integrity',
            'nilai_2_deskripsi' => 'Mengutamakan tanggung jawab, kepercayaan, dan tidak berpihak.',
            'nilai_2_icon'      => 'bi-award-fill',

            // Nilai 3 — Profesional
            'nilai_3_judul'     => 'Profesional',
            'nilai_3_deskripsi' => 'Memberikan pelayanan prima dengan didukung oleh ahli yang berkompeten.',
            'nilai_3_icon'      => 'bi-person-badge-fill',

            // Nilai 4 — Sinergi
            'nilai_4_judul'     => 'Sinergi',
            'nilai_4_deskripsi' => 'Membangun kerjasama yang produktif ditandai oleh rasa saling percaya dan terbuka.',
            'nilai_4_icon'      => 'bi-people-fill',
        ]);
    }
}
