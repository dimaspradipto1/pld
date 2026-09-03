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
            // Profil PLD
            'judul_profil'       => 'Pusat Layanan Disabilitas Universitas Ibnu Sina',
            'deskripsi_profil_1' => '<p>Pusat Layanan Disabilitas (PLD) Universitas Ibnu Sina adalah unit kerja yang berkomitmen mewujudkan lingkungan perguruan tinggi yang inklusif, adaptif, ramah, dan setara bagi seluruh mahasiswa berkebutuhan khusus.</p>',
            'deskripsi_profil_2' => '<p>Melalui layanan pendampingan akademik, konseling psikologis, fasilitasi akomodasi ujian, penyediaan juru bahasa isyarat (BISINDO), dan penguatan relawan mahasiswa inklusif, PLD UIS memastikan setiap mahasiswa disabilitas memiliki kesempatan yang setara untuk meraih prestasi dan kemandirian masa depan.</p>',

            // Visi
            'visi_judul' => 'Visi Kami',
            'visi_icon'  => 'bi-eye',
            'visi'       => 'Menjadi Pusat Layanan Disabilitas yang unggul, adaptif, dan berdaya saing nasional dalam mewujudkan ekosistem pendidikan tinggi inklusif berlandaskan nilai kemanusiaan, kesetaraan, dan integritas moral.',

            // Misi
            'misi_judul' => 'Misi Kami',
            'misi_icon'  => 'bi-rocket-takeoff',
            'misi'       => "Menyelenggarakan layanan pendampingan akademik, advokasi, dan konseling psikososial yang profesional bagi mahasiswa disabilitas.\nMengembangkan sarana aksesibilitas fisik, teknologi asistif digital, dan akomodasi kurikulum ramah disabilitas.\nMembangun budaya kampus yang inklusif melalui pelatihan Bahasa Isyarat Indonesia (BISINDO) dan pembinaan relawan mahasiswa.\nMenjalin kemitraan strategis dengan komunitas disabilitas, pegiat Intelek Tuli, dunia usaha, dan pemerintah guna memperluas kesempatan karier alumni.",

            // Nilai Budaya Civitas
            'judul_nilai'     => 'Nilai Budaya Civitas PLD',
            'deskripsi_nilai' => 'Prinsip dasar yang melandasi seluruh pelayanan, pendampingan, dan advokasi inklusif di lingkungan Universitas Ibnu Sina.',

            // Nilai 1 — Inklusivitas
            'nilai_1_judul'     => 'Inklusivitas',
            'nilai_1_deskripsi' => 'Menerima dan merangkul keberagaman kemampuan dengan perlakuan setara, bermartabat, serta tanpa diskriminasi.',
            'nilai_1_icon'      => 'bi-universal-access',

            // Nilai 2 — Aksesibilitas
            'nilai_2_judul'     => 'Aksesibilitas',
            'nilai_2_deskripsi' => 'Menyediakan fasilitas fisik, teknologi bantu, dan materi pembelajaran yang mudah dijangkau serta dimanfaatkan.',
            'nilai_2_icon'      => 'bi-key-fill',

            // Nilai 3 — Empati & Humanis
            'nilai_3_judul'     => 'Empati & Humanis',
            'nilai_3_deskripsi' => 'Mengedepankan ketulusan, kepedulian mendalam, serta keterbukaan dalam mendengarkan setiap aspirasi mahasiswa.',
            'nilai_3_icon'      => 'bi-heart-fill',

            // Nilai 4 — Kemandirian
            'nilai_4_judul'     => 'Kemandirian',
            'nilai_4_deskripsi' => 'Mendorong rasa percaya diri, penguasaan keterampilan hidup, dan daya saing profesional bagi seluruh mahasiswa binaan.',
            'nilai_4_icon'      => 'bi-stars',
        ]);
    }
}
