<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class PldNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::query()->first();
        $adminId = $admin ? $admin->id : 1;

        // Update existing news
        News::query()->where('category', 'Berita Fakultas')->update(['category' => 'Berita']);

        $sampleNews = [
            [
                'user_id'     => $adminId,
                'thumbnail'   => 'news/default.jpg',
                'title'       => 'Pusat Layanan Disabilitas UIS Resmi Buka Rekrutmen Volunteer Pendamping Angkatan 2026',
                'description' => 'PLD Universitas Ibnu Sina mengajak seluruh mahasiswa aktif untuk bergabung menjadi relawan inklusif pendamping mahasiswa disabilitas perkuliahan semester baru.',
                'content'     => '<p>Pusat Layanan Disabilitas (PLD) Universitas Ibnu Sina membuka kesempatan berharga bagi seluruh mahasiswa untuk bergabung sebagai relawan inklusif. Volunteer akan mendapatkan pembekalan intensif mengenai bahasa isyarat, teknik pendampingan, sertifikat resmi universitas, serta konversi SKS kegiatan pengabdian.</p>',
                'status'      => 'published',
                'category'    => 'Pengumuman',
                'is_featured' => true,
            ],
            [
                'user_id'     => $adminId,
                'thumbnail'   => 'news/default.jpg',
                'title'       => 'Seminar & Workshop Intelek Tuli: Mengenal Linguistik Isyarat dan Budaya Tuli di Era Digital',
                'description' => 'Forum diskusi ilmiah membahas pentingnya kesetaraan literasi, pemahaman mendalam tentang Intelek Tuli, dan hak aksesibilitas informasi di perguruan tinggi.',
                'content'     => '<p>Intelek Tuli merupakan representasi kekuatan berpikir kritis, literasi, dan perspektif unik komunitas Tuli dalam pengembangan ilmu pengetahuan. Workshop ini menghadirkan akademisi dan pegiat disabilitas untuk mengupas tuntas kekayaan bahasa isyarat serta bagaimana universitas dapat menciptakan ruang riset yang inklusif bagi seluruh insan Tuli.</p>',
                'status'      => 'published',
                'category'    => 'Intelek Tuli',
                'is_featured' => false,
            ],
            [
                'user_id'     => $adminId,
                'thumbnail'   => 'news/default.jpg',
                'title'       => 'Agenda: Pelatihan Intensif Bahasa Isyarat Indonesia (BISINDO) Tingkat Dasar untuk Dosen dan Staf',
                'description' => 'Pelatihan bertahap bagi tenaga pengajar dan tenaga kependidikan untuk memperkuat komunikasi langsung dan ramah disabilitas di lingkungan kampus.',
                'content'     => '<p>Guna mewujudkan layanan kampus yang ramah dan inklusif, PLD menyelenggarakan Pelatihan BISINDO Dasar yang akan dilaksanakan setiap hari Jumat sore di Ruang Komunal Inklusi Gedung Rektorat Lt. 2.</p>',
                'status'      => 'published',
                'category'    => 'Agenda',
                'is_featured' => false,
            ],
            [
                'user_id'     => $adminId,
                'thumbnail'   => 'news/default.jpg',
                'title'       => 'Artikel: Mengapa Kampus Inklusif Menjadi Pondasi Kemajuan Pendidikan Tinggi Modern',
                'description' => 'Ulasan mendalam tentang prinsip Universal Design for Learning (UDL) dan bagaimana akomodasi yang layak mengoptimalkan potensi seluruh mahasiswa.',
                'content'     => '<p>Pendidikan inklusif di tingkat universitas bukan sekadar memenuhi regulasi perundangan, melainkan komitmen moral dan intelektual dalam memastikan bahwa setiap individu, tanpa memandang ragam kemampuan fisik maupun sensorik, memiliki hak setara untuk meraih prestasi akademik tertinggi.</p>',
                'status'      => 'published',
                'category'    => 'Artikel',
                'is_featured' => false,
            ],
        ];

        foreach ($sampleNews as $n) {
            News::updateOrCreate(['title' => $n['title']], $n);
        }
    }
}
