<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            // Layanan & Ruang Lingkup
            [
                'question' => 'Apa saja jenis Riksa Uji yang dilayani oleh PT Berkarya Jasa Inspeksi?',
                'answer' => 'Kami melayani 6 kategori Riksa Uji: K3 umum (Permenaker No. 8 Tahun 2020), Pesawat Angkat & Angkut, Pesawat Tenaga Produksi (Permenaker No. 38 Tahun 2016), Bejana Tekan & Tangki Timbun serta Pesawat Uap/Ketel Uap (Permenaker No. 37 Tahun 2016 & UU Uap 1930), Instalasi Listrik & Penyalur Petir (Permenaker No. 12 & 31 Tahun 2015), serta Instalasi Proteksi Kebakaran (Permenaker No. 04 Tahun 1980 & No. 02 Tahun 1983).',
                'category' => 'layanan',
            ],
            [
                'question' => 'Apakah BJI melayani konsultasi sebelum proses Riksa Uji dilakukan?',
                'answer' => 'Ya, tim ahli K3 kami menyediakan konsultasi gratis untuk membantu menentukan jenis pemeriksaan yang sesuai dengan kebutuhan peralatan dan instalasi Anda sebelum proses Riksa Uji dimulai.',
                'category' => 'layanan',
            ],
            [
                'question' => 'Berapa lama proses pemeriksaan dan pengujian hingga laporan selesai?',
                'answer' => 'Durasi bervariasi tergantung jenis dan skala peralatan yang diperiksa. Kami berkomitmen menyusun laporan akhir kegiatan pemeriksaan dan pengujian — lengkap dengan kesimpulan dan saran — secara tepat waktu.',
                'category' => 'layanan',
            ],

            // Sertifikasi & Legalitas
            [
                'question' => 'Apakah hasil Riksa Uji BJI diakui secara hukum?',
                'answer' => 'Ya. Seluruh proses pemeriksaan dan pengujian kami dilaksanakan sesuai Permenaker yang berlaku, dan hasilnya diterbitkan oleh tenaga ahli K3 yang kompeten serta dapat digunakan untuk keperluan legalitas operasional peralatan.',
                'category' => 'sertifikasi',
            ],
            [
                'question' => 'Apa yang dimaksud dengan metode Non Destructive Test (NDT)?',
                'answer' => 'NDT adalah metode pengujian peralatan tanpa merusak material atau mengurangi umur pakainya. Metode ini digunakan terutama saat pemeriksaan pertama kali pemakaian maupun saat proses instalasi alat baru.',
                'category' => 'sertifikasi',
            ],
            [
                'question' => 'Bagaimana proses perpanjangan lisensi peralatan yang sudah kedaluwarsa?',
                'answer' => 'Kami membantu proses perpanjangan lisensi peralatan melalui pemeriksaan dan pengujian ulang sesuai jadwal berkala yang dipersyaratkan, sehingga peralatan Anda tetap laik dan legal untuk dioperasikan.',
                'category' => 'sertifikasi',
            ],

            // Jadwal & Area Kerja
            [
                'question' => 'Apakah BJI melayani Riksa Uji di luar Kepulauan Riau?',
                'answer' => 'Kantor utama kami berada di Batam, Kepulauan Riau, namun kami siap melayani kebutuhan Riksa Uji, kalibrasi, dan sertifikasi di berbagai wilayah sesuai kebutuhan klien industri.',
                'category' => 'jadwal',
            ],
            [
                'question' => 'Seberapa sering Riksa Uji berkala harus dilakukan?',
                'answer' => 'Jadwal pemeriksaan berkala berbeda-beda tergantung jenis peralatan dan ketentuan Permenaker yang berlaku. Tim kami dapat membantu menyusun jadwal Riksa Uji berkala yang sesuai untuk seluruh peralatan Anda.',
                'category' => 'jadwal',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
