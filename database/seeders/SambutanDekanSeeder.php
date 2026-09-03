<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SambutanDekan;

class SambutanDekanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SambutanDekan::truncate();

        SambutanDekan::create([
            'nama_dekan'      => 'Dr. H. Ahmad Syafi\'i, M.Ed.',
            'jabatan_dekan'   => 'Kepala Pusat Layanan Disabilitas UIS',
            'foto_dekan'      => null,
            'kutipan_singkat' => 'Selamat datang di Pusat Layanan Disabilitas Universitas Ibnu Sina. Kami percaya bahwa setiap insan berhak mendapatkan akses pendidikan tinggi yang bermutu, adil, dan berkesetaraan. Bersama-sama, mari kita ciptakan kampus ramah disabilitas yang menginspirasi.',
            'sambutan_dekan'  => '<p><em>Assalamu’alaikum Warahmatullahi Wabarakatuh, Salam Sejahtera, Om Swastiastu, Namo Buddhaya, Salam Kebajikan.</em></p>
<p>Selamat datang di portal resmi <strong>Pusat Layanan Disabilitas (PLD) Universitas Ibnu Sina</strong>. Keberadaan unit ini merupakan perwujudan nyata dari komitmen universitas dalam menjamin hak pendidikan inklusif sebagaimana diamanatkan oleh regulasi nasional dan nilai-nilai kemanusiaan luhur.</p>
<p>Di PLD UIS, kami tidak hanya menyediakan bantuan teknis dan akomodasi pembelajaran seperti pendampingan notetaker, juru bahasa isyarat (BISINDO), dan konseling psikologis, tetapi kami juga membangun ekosistem sosial kampus yang saling menghargai dan menguatkan. Mahasiswa disabilitas adalah bagian tak terpisahkan dari generasi penerus bangsa yang memiliki potensi luar biasa untuk berprestasi dan berkontribusi.</p>
<p>Kami mengajak seluruh sivitas akademika, dosen, tenaga kependidikan, relawan mahasiswa, serta mitra komunitas dan industri untuk terus bersinergi meruntuhkan hambatan aksesibilitas. Semoga portal ini bermanfaat sebagai sarana informasi, layanan terpadu, dan wadah kolaborasi inklusi yang membawa berkah bagi kita semua.</p>
<p><em>Wassalamu’alaikum Warahmatullahi Wabarakatuh.</em></p>',
        ]);
    }
}
