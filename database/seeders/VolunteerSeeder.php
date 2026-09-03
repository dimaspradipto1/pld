<?php

namespace Database\Seeders;

use App\Models\Volunteer;
use Illuminate\Database\Seeder;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $volunteers = [
            [
                'nama_lengkap'     => 'Ahmad Rizky Pratama',
                'nim'              => '220101045',
                'jurusan_prodi'    => 'Teknik Informatika',
                'no_hp_wa'         => '081234567890',
                'email'            => 'ahmad.rizky@student.uis.ac.id',
                'keahlian'         => 'Bahasa Isyarat BISINDO Tingkat Menengah & Notetaker Cepat',
                'alasan_bergabung' => 'Ingin berkontribusi nyata menciptakan kampus yang inklusif dan ramah bagi teman Tuli di lingkungan universitas.',
                'status'           => 'Diterima',
            ],
            [
                'nama_lengkap'     => 'Siti Nur Aisyah',
                'nim'              => '230202018',
                'jurusan_prodi'    => 'Psikologi',
                'no_hp_wa'         => '082198765432',
                'email'            => 'siti.aisyah@student.uis.ac.id',
                'keahlian'         => 'Peer Counseling & Pendampingan Mobilitas Tunanetra',
                'alasan_bergabung' => 'Memiliki ketertarikan mendalam pada psikologi disabilitas dan ingin membantu mahasiswa disabilitas beradaptasi dengan nyaman di dunia perkuliahan.',
                'status'           => 'Diterima',
            ],
            [
                'nama_lengkap'     => 'Budi Santoso',
                'nim'              => '240301012',
                'jurusan_prodi'    => 'Sistem Informasi',
                'no_hp_wa'         => '085711223344',
                'email'            => 'budi.santoso@student.uis.ac.id',
                'keahlian'         => 'Audio Reader, Konversi Braille & Aksesibilitas Web',
                'alasan_bergabung' => 'Senang membantu pembuatan modul dan audio book untuk teman netra.',
                'status'           => 'Menunggu Review',
            ],
        ];

        foreach ($volunteers as $v) {
            Volunteer::updateOrCreate(['email' => $v['email']], $v);
        }
    }
}
