<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::truncate();

        $testimonials = [
            [
                'nama'      => 'Muhammad Rizky Saputra',
                'pekerjaan' => 'Mahasiswa Tuli — Prodi Sistem Informasi UIS',
                'kategori'  => 'Mahasiswa',
                'bintang'   => 5,
                'pesan'     => 'Adanya pendampingan Juru Bahasa Isyarat (JBI) dan relawan notetaker dari PLD UIS membuat saya dapat menyerap materi kuliah dengan optimal dan berprestasi setara.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Aisyah Nurul Fathia',
                'pekerjaan' => 'Relawan Pendamping Mahasiswa Inklusif',
                'kategori'  => 'Volunteer',
                'bintang'   => 5,
                'pesan'     => 'Menjadi relawan PLD UIS mengajarkan saya makna empati nyata. Pelatihan bahasa isyarat BISINDO dan etika interaksi disabilitas yang diberikan sangat berharga untuk kehidupan sosial saya.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Dimas Arya Pratama',
                'pekerjaan' => 'Mahasiswa Tunanetra — Prodi Manajemen UIS',
                'kategori'  => 'Mahasiswa',
                'bintang'   => 5,
                'pesan'     => 'Resource Center PLD sangat responsif dalam mengonversi buku dan materi kuliah ke format audio dan digital ramah screen reader. Kampus UIS sungguh nyaman dan inklusif.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Dr. Ir. Hendra Gunawan, M.T.',
                'pekerjaan' => 'Dosen Pengajar Universitas Ibnu Sina',
                'kategori'  => 'Dosen',
                'bintang'   => 5,
                'pesan'     => 'PLD UIS sangat kooperatif dalam memberikan panduan akomodasi pembelajaran di kelas. Kami para dosen sangat terbantu dalam menerapkan metode kuliah yang adaptif bagi semua mahasiswa.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Nabila Putri Khairunnisa',
                'pekerjaan' => 'Alumni UIS / Penggerak Intelek Tuli Kepri',
                'kategori'  => 'Alumni',
                'bintang'   => 5,
                'pesan'     => 'Dukungan penuh dari Pusat Layanan Disabilitas UIS selama masa perkuliahan hingga sidang skripsi menjadi bekal utama saya percaya diri meniti karier di dunia profesional saat ini.',
                'aktif'     => true,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }
    }
}
