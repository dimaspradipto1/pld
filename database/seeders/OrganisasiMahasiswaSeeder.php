<?php

namespace Database\Seeders;

use App\Models\OrganisasiMahasiswa;
use Illuminate\Database\Seeder;

class OrganisasiMahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        OrganisasiMahasiswa::truncate();

        $ormawas = [
            [
                'nama_organisasi' => 'Badan Eksekutif Mahasiswa PLD',
                'singkatan'       => 'BEM PLD',
                'slug'            => 'bem-pld',
                'kategori'        => 'BEM / DPM',
                'deskripsi'       => '<p>Badan Eksekutif Mahasiswa PLD (BEM PLD) Universitas Ibnu Sina merupakan lembaga eksekutif tertinggi yang mewadahi, mengadvokasi, dan menyalurkan aspirasi mahasiswa serta menyelenggarakan program kerja di bidang akademik, sosial, dan pengembangan karakter kepemimpinan inklusif.</p>',
                'visi'            => 'Mewujudkan BEM PLD UIS yang berintegritas, adaptif, solutif, dan aktif berkontribusi dalam memajukan lingkungan kampus inklusif.',
                'misi'            => '1. Mempererat soliditas antar lembaga mahasiswa di lingkungan PLD.\n2. Mewadahi pengembangan minat, bakat, serta riset kemahasiswaan.\n3. Mengabdi secara nyata kepada masyarakat melalui edukasi inklusi berkelanjutan.',
                'nama_ketua'      => 'Muhammad Rizky Pratama',
                'nama_wakil'      => 'Annisa Nurul Fadilah',
                'pembina'         => 'Dr. Hengky Oktarizal, S.KM., M.KM',
                'periode'         => '2025/2026',
                'instagram'       => 'https://instagram.com/bempld_uis',
                'email'           => 'bem.pld@uis.ac.id',
                'link_pendaftaran'=> 'https://bit.ly/OpenRecruitmentBEMPLD',
                'urutan'          => 1,
                'is_active'       => true,
            ],
            [
                'nama_organisasi' => 'Himpunan Mahasiswa Keselamatan dan Kesehatan Kerja',
                'singkatan'       => 'HIMA K3',
                'slug'            => 'hima-k3',
                'kategori'        => 'Himpunan Mahasiswa (HIMA)',
                'deskripsi'       => '<p>HIMA K3 adalah himpunan mahasiswa program studi S1 Keselamatan dan Kesehatan Kerja yang berfokus pada peningkatan kompetensi keilmuan K3, sertifikasi profesi, pelatihan tanggap darurat, dan seminar nasional di bidang industri dan maritim.</p>',
                'visi'            => 'Menjadi himpunan mahasiswa K3 yang unggul, profesional, berdaya saing industri, serta berlandaskan nilai-nilai keselamatan kerja prima.',
                'misi'            => '1. Menyelenggarakan pelatihan praktis K3 dan simulasi tanggap darurat.\n2. Mengadakan webinar serta studi ekskursi industri.\n3. Membangun jaringan alumni dan kemitraan praktisi K3 nasional.',
                'nama_ketua'      => 'Dimas Wahyu Saputra',
                'nama_wakil'      => 'Siti Rahmawati',
                'pembina'         => 'Rina Marlina, S.KM., M.Kes (K3)',
                'periode'         => '2025/2026',
                'instagram'       => 'https://instagram.com/himak3_uis',
                'email'           => 'hima.k3@uis.ac.id',
                'link_pendaftaran'=> 'https://bit.ly/PendaftaranHimaK3',
                'urutan'          => 2,
                'is_active'       => true,
            ],
            [
                'nama_organisasi' => 'Himpunan Mahasiswa Kesehatan Lingkungan',
                'singkatan'       => 'HIMA KESLING',
                'slug'            => 'hima-kesling',
                'kategori'        => 'Himpunan Mahasiswa (HIMA)',
                'deskripsi'       => '<p>HIMA Kesling merupakan wadah kreativitas mahasiswa program studi S1 Kesehatan Lingkungan yang berdedikasi dalam mitigasi sanitasi, pelestarian lingkungan, pengelolaan limbah medis, dan audit kualitas udara & air bersih.</p>',
                'visi'            => 'Menjadi pelopor generasi sanitasi dan kelestarian lingkungan yang responsif terhadap tantangan kesehatan global.',
                'misi'            => '1. Melaksanakan program aksi bersih lingkungan dan konservasi pesisir.\n2. Melakukan uji kualitas sanitasi pemukiman dan tempat-tempat umum.\n3. Mengedukasi masyarakat tentang pengelolaan limbah rumah tangga ramah lingkungan.',
                'nama_ketua'      => 'Fajar Nugraha',
                'nama_wakil'      => 'Dewi Lestari',
                'pembina'         => 'Dr. Ir. Hendra Saputra, M.Si., M.Kes',
                'periode'         => '2025/2026',
                'instagram'       => 'https://instagram.com/himakesling_uis',
                'email'           => 'hima.kesling@uis.ac.id',
                'link_pendaftaran'=> null,
                'urutan'          => 3,
                'is_active'       => true,
            ],
            [
                'nama_organisasi' => 'Korps Sukarela Palang Merah Indonesia Unit PLD',
                'singkatan'       => 'KSR PMI PLD',
                'slug'            => 'ksr-pmi-pld',
                'kategori'        => 'Unit Kegiatan Mahasiswa (UKM)',
                'deskripsi'       => '<p>KSR PMI Unit PLD adalah unit kegiatan kemahasiswaan berbasis kemanusiaan yang aktif menyelenggarakan donor darah rutin, pertolongan pertama pada gawat darurat (PPGD), dan kesiapsiagaan bencana.</p>',
                'visi'            => 'Menjadi korps sukarela yang cekatan, tanggap, dan terdepan dalam aksi kemanusiaan serta pelayanan medis darurat.',
                'misi'            => '1. Mengadakan kegiatan donor darah teratur di lingkungan kampus.\n2. Memberikan pertolongan pertama pada kegiatan akademik dan olahraga.\n3. Melatih keterampilan relawan muda dalam manajemen kebencanaan.',
                'nama_ketua'      => 'Bayu Anggara',
                'nama_wakil'      => 'Lestari Wulandari',
                'pembina'         => 'Dr. Ns. Ahmad Fauzi, M.Kep., Sp.Kep.Kom',
                'periode'         => '2025/2026',
                'instagram'       => 'https://instagram.com/ksr_plduis',
                'email'           => 'ksr.pmi@uis.ac.id',
                'link_pendaftaran'=> 'https://bit.ly/DaftarKSRPLD',
                'urutan'          => 4,
                'is_active'       => true,
            ],
            [
                'nama_organisasi' => 'Pusat Informasi & Konseling Remaja (PIK-R) PLD',
                'singkatan'       => 'PIK-R SEHAT',
                'slug'            => 'pik-r-sehat',
                'kategori'        => 'Komunitas Minat Bakat',
                'deskripsi'       => '<p>PIK-R PLD UIS merupakan komunitas mahasiswa konselor sebaya yang memberikan edukasi kesehatan reproduksi remaja, kesetaraan akses, kesehatan mental, dan gaya hidup sehat generasi muda.</p>',
                'visi'            => 'Menciptakan generasi remaja yang cerdas, berkarakter, peduli kesehatan mental dan reproduksi.',
                'misi'            => '1. Menyediakan ruang konsultasi dan konseling teman sebaya.\n2. Menggelar seminar literasi kesehatan mental di sekolah-sekolah binaan.\n3. Mendorong gaya hidup aktif dan bebas NAPZA.',
                'nama_ketua'      => 'Nadya Permata',
                'nama_wakil'      => 'Indra Kusuma',
                'pembina'         => 'Dr. Ratna Juwita, S.KM., M.Epid',
                'periode'         => '2025/2026',
                'instagram'       => 'https://instagram.com/pikr_plduis',
                'email'           => 'pikr@uis.ac.id',
                'link_pendaftaran'=> null,
                'urutan'          => 5,
                'is_active'       => true,
            ]
        ];

        foreach ($ormawas as $item) {
            OrganisasiMahasiswa::create($item);
        }
    }
}
