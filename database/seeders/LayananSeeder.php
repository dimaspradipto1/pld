<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Layanan::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $layanans = [
            [
                'icon'        => 'bi-person-raised-hand',
                'judul'       => 'Layanan Pendampingan Akademik Disabilitas',
                'dasar_hukum' => 'Permendikbudristek No. 48 Tahun 2023 & SK Rektor UIS',
                'link'        => null,
                'deskripsi'   => 'Penyediaan relawan pendamping perkuliahan tatap muka maupun daring, mencakup pencatatan kuliah (notetaker), pembacaan buku/soal (reader), dan pemanduan navigasi mobilitas kampus.',
                'rincian'     => "Pendamping notetaker bagi mahasiswa Tuli / Kurang Dengar\nPendamping reader audio bagi mahasiswa Tunanetra / Low Vision\nPemanduan mobilitas fisik antargedung dan laboratorium\nPenyesuaian media belajar dan modul digital aksesibel",
                'urutan'      => 1,
                'aktif'       => true,
            ],
            [
                'icon'        => 'bi-chat-heart-fill',
                'judul'       => 'Layanan Konseling Psikologis & Bimbingan Mahasiswa',
                'dasar_hukum' => 'Panduan Layanan Bimbingan & Konseling Kampus Inklusif',
                'link'        => null,
                'deskripsi'   => 'Layanan konseling privat tatap muka maupun daring bersama konselor profesional untuk mendukung kesehatan mental, pengembangan kepercayaan diri, dan adaptasi sosial mahasiswa berkebutuhan khusus.',
                'rincian'     => "Sesi konseling personal dengan jaminan kerahasiaan penuh\nBimbingan adaptasi sosial & pengembangan kepercayaan diri\nKonseling karir dan persiapan dunia kerja inklusif\nSesi peer-counseling bersama relawan pendamping",
                'urutan'      => 2,
                'aktif'       => true,
            ],
            [
                'icon'        => 'bi-file-earmark-check-fill',
                'judul'       => 'Layanan Akomodasi & Penyesuaian Ujian',
                'dasar_hukum' => 'Standar Operasional Prosedur Asesmen & Ujian Inklusif PLD',
                'link'        => null,
                'deskripsi'   => 'Penyediaan akomodasi yang layak selama pelaksanaan UTS dan UAS, termasuk penyesuaian format soal (large print/audio/braille), penambahan durasi waktu pengerjaan, dan pendamping ujian.',
                'rincian'     => "Penyesuaian format soal sesuai ragam disabilitas mahasiswa\nAlokasi tambahan waktu pengerjaan ujian (extra time accommodation)\nRuang ujian khusus bebas hambatan arsitektural\nPengawas pendamping pencatat jawaban (writer) saat ujian",
                'urutan'      => 3,
                'aktif'       => true,
            ],
            [
                'icon'        => 'bi-translate',
                'judul'       => 'Layanan Juru Bahasa Isyarat (JBI) & Literasi Inklusif',
                'dasar_hukum' => 'Pedoman Aksesibilitas Informasi & Komunikasi Disabilitas',
                'link'        => null,
                'deskripsi'   => 'Fasilitasi Juru Bahasa Isyarat (JBI) untuk perkuliahan, seminar, webinar, sidang akademik, serta pengubahan materi literatur kuliah ke dalam format teks/audio aksesibel.',
                'rincian'     => "JBI perkuliahan reguler, responsi, dan sidang tugas akhir\nJBI acara resmi wisuda, seminar, dan workshop universitas\nPengalihan dokumen perkuliahan ke format digital aksesibel\nKelas pengenalan Bahasa Isyarat Indonesia (BISINDO) bagi civitas",
                'urutan'      => 4,
                'aktif'       => true,
            ],
        ];

        foreach ($layanans as $l) {
            Layanan::create($l);
        }
    }
}
