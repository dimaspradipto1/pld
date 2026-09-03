<?php

namespace Database\Seeders;

use App\Models\Sarana;
use Illuminate\Database\Seeder;

class SaranaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sarana::truncate();

        $saranas = [
            [
                'icon'      => 'bi-laptop',
                'nama'      => 'Resource Center & Komputer Asistif',
                'deskripsi' => 'Perangkat komputer khusus yang dilengkapi pembaca layar (NVDA/JAWS), software pembesar teks, scanner buku otomatis, dan keyboard ramah netra.',
                'urutan'    => 1,
                'is_active' => true,
            ],
            [
                'icon'      => 'bi-shield-check',
                'nama'      => 'Ruang Konseling & Asesmen Psikologis',
                'deskripsi' => 'Ruang konsultasi privat dan nyaman berstandar konfidensial untuk asesmen kemampuan belajar, pemetaan kebutuhan, dan pendampingan kesehatan mental.',
                'urutan'    => 2,
                'is_active' => true,
            ],
            [
                'icon'      => 'bi-book-half',
                'nama'      => 'Pojok Baca Audio & Literatur Braille',
                'deskripsi' => 'Koleksi materi ajar digital bersuara (audiobook), modul kuliah teks berhuruf Braille, serta alat perekam materi kuliah portabel.',
                'urutan'    => 3,
                'is_active' => true,
            ],
            [
                'icon'      => 'bi-camera-video-fill',
                'nama'      => 'Studio Juru Bahasa Isyarat & Media',
                'deskripsi' => 'Fasilitas rekam video materi perkuliahan dengan sisipan Juru Bahasa Isyarat (JBI) serta takarir (captioning) otomatis bagi Teman Tuli.',
                'urutan'    => 4,
                'is_active' => true,
            ],
            [
                'icon'      => 'bi-heart-fill',
                'nama'      => 'Ruang Tenang Sensori (Calm Room)',
                'deskripsi' => 'Ruang deeskalasi sensori bernuansa tenang dengan pencahayaan lembut bagi mahasiswa neurodivergen atau autisme saat mengalami kejenuhan sensorik.',
                'urutan'    => 5,
                'is_active' => true,
            ],
            [
                'icon'      => 'bi-universal-access-circle',
                'nama'      => 'Aksesibilitas Fisik & Guiding Block',
                'deskripsi' => 'Jalur pemandu tunanetra terpadu di area gedung, ramp landai kursi roda, toilet ramah disabilitas, dan tombol lift bersuara serta berhuruf Braille.',
                'urutan'    => 6,
                'is_active' => true,
            ],
        ];

        foreach ($saranas as $s) {
            Sarana::create($s);
        }
    }
}
