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
        $testimonials = [
            [
                'nama'      => 'Ahmad Fadillah',
                'pekerjaan' => 'HSE Manager, PT Kilang Migas Batam',
                'kategori'  => 'manajemen-k3',
                'bintang'   => 5,
                'pesan'     => 'Proses Riksa Uji pesawat angkat di fasilitas kami berjalan sangat profesional. Tim BJI teliti dalam pemeriksaan dan laporan hasilnya lengkap sesuai standar Permenaker yang berlaku.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Ratna Kusuma',
                'pekerjaan' => 'Direktur Operasional, PT Manufaktur Kepri',
                'kategori'  => 'direksi',
                'bintang'   => 5,
                'pesan'     => 'Kami sudah beberapa kali menggunakan jasa kalibrasi dan sertifikasi BJI untuk peralatan produksi. Prosesnya cepat, hasilnya diakui secara hukum, dan tim selalu responsif saat dihubungi.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Budi Santoso',
                'pekerjaan' => 'Kepala Teknik, RS Swasta Batam',
                'kategori'  => 'klien-industri',
                'bintang'   => 5,
                'pesan'     => 'Riksa Uji instalasi listrik dan proteksi kebakaran di rumah sakit kami ditangani dengan sangat detail. Tim BJI memahami betul standar keselamatan untuk fasilitas kesehatan.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Yusuf Pratama',
                'pekerjaan' => 'HSE Supervisor, PT Perkebunan Kepri',
                'kategori'  => 'manajemen-k3',
                'bintang'   => 5,
                'pesan'     => 'Sudah menjadi mitra Riksa Uji bejana tekan dan tangki timbun kami selama lebih dari 2 tahun. Tidak pernah ada keterlambatan jadwal, dan laporan hasil pengujian selalu tepat waktu.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Amelia Mahendra',
                'pekerjaan' => 'Direktur Utama, PT Konstruksi Kepri Jaya',
                'kategori'  => 'direksi',
                'bintang'   => 5,
                'pesan'     => 'Sebagai perusahaan konstruksi, kepatuhan K3 adalah prioritas kami. BJI membantu memastikan seluruh peralatan angkat dan angkut proyek kami memenuhi standar keselamatan sebelum digunakan.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Hendra Wijaya',
                'pekerjaan' => 'Plant Manager, Pabrik Pengolahan Kepri',
                'kategori'  => 'klien-industri',
                'bintang'   => 5,
                'pesan'     => 'Konsultasi awal sebelum Riksa Uji sangat membantu kami menentukan jenis pemeriksaan yang tepat untuk pesawat tenaga produksi di pabrik. Sangat puas dengan pelayanan BJI.',
                'aktif'     => true,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }
    }
}
