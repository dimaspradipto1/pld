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
        About::truncate();

        About::create([
            // Profil Fakultas
            'judul_profil'       => 'Pusat Keunggulan Pendidikan & Pelayanan',
            'deskripsi_profil_1' => 'Pusat Layanan Disabilitas (PLD) berdedikasi menyelenggarakan pendidikan tinggi inklusif berkualitas dengan kurikulum modern yang berorientasi pada capaian kompetensi, riset inovatif, dan pelayanan masyarakat.',
            'deskripsi_profil_2' => 'PLD didukung oleh tenaga pendidik berkualifikasi magister dan doktor, sarana terpadu berstandar nasional, serta jejaring kemitraan terkemuka.',

            // Visi
            'visi_judul' => 'Visi Kami',
            'visi_icon'  => 'bi-eye',
            'visi'       => 'Menjadi PLD yang unggul, terkemuka, dan berdaya saing global dalam penyelenggaraan Tri Dharma Perguruan Tinggi yang berlandaskan nilai integritas dan kemanusiaan.',

            // Misi
            'misi_judul' => 'Misi Kami',
            'misi_icon'  => 'bi-rocket-takeoff',
            'misi'       => "Menyelenggarakan pendidikan akademik dan layanan yang berkualitas dan berstandar nasional/internasional.\nMengembangkan penelitian terapan dan inovatif yang bermanfaat bagi masyarakat.\nMelaksanakan pengabdian kepada masyarakat secara berkelanjutan demi meningkatkan derajat layanan publik.\nMenjalin kerjasama strategis dengan institusi pelayanan, mitra industri, dan global.",

            // Nilai Budaya Civitas
            'judul_nilai'     => 'Nilai Budaya Civitas',
            'deskripsi_nilai' => 'Prinsip dasar yang melandasi seluruh proses pembelajaran, riset, dan pelayanan di lingkungan PLD.',

            // Nilai 1 — Integritas
            'nilai_1_judul'     => 'Integritas',
            'nilai_1_deskripsi' => 'Menjunjung tinggi etika profesi, moralitas luhur, dan kejujuran akademik dalam setiap pengajaran dan riset.',
            'nilai_1_icon'      => 'bi-shield-fill-check',

            // Nilai 2 — Keunggulan
            'nilai_2_judul'     => 'Keunggulan',
            'nilai_2_deskripsi' => 'Senantiasa meningkatkan standar mutu akademik demi mencetak lulusan tenaga kesehatan berkualifikasi unggul.',
            'nilai_2_icon'      => 'bi-award-fill',

            // Nilai 3 — Humanis
            'nilai_3_judul'     => 'Humanis',
            'nilai_3_deskripsi' => 'Mengedepankan rasa empati, kasih sayang, dan kepedulian tulus terhadap pasien dan masyarakat.',
            'nilai_3_icon'      => 'bi-heart-fill',

            // Nilai 4 — Inovatif
            'nilai_4_judul'     => 'Inovatif',
            'nilai_4_deskripsi' => 'Adaptif terhadap perkembangan sains dan teknologi kesehatan terkini dalam pendidikan dan riset terapan.',
            'nilai_4_icon'      => 'bi-lightning-charge-fill',
        ]);
    }
}
