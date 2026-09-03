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
        Faq::truncate();

        $faqs = [
            // Akademik & Program Studi
            [
                'question' => 'Apa saja program layanan yang tersedia di Pusat Layanan Disabilitas (PLD)?',
                'answer'   => 'PLD menyelenggarakan berbagai program layanan unggulan seperti pendampingan akademik, konseling, advokasi, pelatihan aksesibilitas, serta penyediaan fasilitas ramah disabilitas.',
                'category' => 'akademik',
            ],
            [
                'question' => 'Bagaimana status akreditasi dan standar program di PLD?',
                'answer'   => 'Seluruh program dan layanan di PLD telah memenuhi standar mutu pendidikan tinggi inklusif nasional dan regulasi kementerian terkait.',
                'category' => 'akademik',
            ],
            [
                'question' => 'Apakah mahasiswa binaan PLD mendapatkan pendampingan penuh?',
                'answer'   => 'Ya, PLD menyediakan relawan pendamping, materi kuliah ramah akses, serta sarana penunjang ujian untuk memastikan kesetaraan proses belajar.',
                'category' => 'akademik',
            ],

            // Pendaftaran & Penerimaan Mahasiswa Baru
            [
                'question' => 'Bagaimana alur pendaftaran layanan di PLD?',
                'answer'   => 'Pendaftaran dapat dilakukan secara online melalui portal resmi atau datang langsung ke sekretariat PLD dengan membawa berkas profil dan kebutuhan pendampingan.',
                'category' => 'pendaftaran',
            ],
            [
                'question' => 'Apakah ada asesmen kebutuhan khusus dalam seleksi masuk PLD?',
                'answer'   => 'Ya, calon mahasiswa akan melalui asesmen pemetaan kebutuhan untuk menentukan jenis dukungan dan fasilitas yang sesuai.',
                'category' => 'pendaftaran',
            ],
            [
                'question' => 'Apakah tersedia program beasiswa di PLD?',
                'answer'   => 'Tersedia berbagai pilihan beasiswa, antara lain KIP-Kuliah, Beasiswa Afirmasi, Beasiswa Prestasi, Beasiswa Yayasan, dan Beasiswa Kemitraan.',
                'category' => 'pendaftaran',
            ],

            // Fasilitas & Praktek Kerja
            [
                'question' => 'Di mana saja mahasiswa PLD melaksanakan program / magang?',
                'answer'   => 'Mahasiswa dapat melaksanakan program magang dan pelatihan di lembaga mitra inklusif, instansi pemerintah, organisasi sosial, dan perusahaan mitra resmi PLD.',
                'category' => 'fasilitas',
            ],
            [
                'question' => 'Fasilitas pendukung apa saja yang disediakan di kampus PLD?',
                'answer'   => 'Kampus menyediakan Resource Center inklusif, perangkat lunak pembaca layar (screen reader), jalur pemandu (guiding block), ruang istirahat ramah disabilitas, dan alat bantu mobilitas.',
                'category' => 'fasilitas',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
