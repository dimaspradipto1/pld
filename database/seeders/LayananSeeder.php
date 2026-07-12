<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layanans = [
            [
                'icon'        => 'bi-clipboard2-check',
                'judul'       => 'Riksa Uji K3',
                'dasar_hukum' => 'Permenaker No. 8 Tahun 2020',
                'deskripsi'   => 'Pemeriksaan dan pengujian kelayakan peralatan kerja pertama kali saat pemakaian, instalasi alat baru, atau secara berkala, menggunakan metode Non Destructive Test (NDT) serta penyusunan laporan akhir lengkap dengan kesimpulan dan saran.',
                'rincian'     => "Pemeriksaan dan pengujian pertama kali saat pemakaian dan penggunaan\nPemeriksaan dan pengujian pertama kali saat proses instalasi alat baru\nMenggunakan metode Non Destructive Test (NDT)\nPenyusunan laporan akhir kegiatan pemeriksaan dan pengujian",
                'urutan'      => 1,
                'aktif'       => true,
            ],
            [
                'icon'        => 'bi-truck-front',
                'judul'       => 'Riksa Uji Pesawat Angkat dan Angkut',
                'dasar_hukum' => 'Permenaker No. 8 Tahun 2020',
                'deskripsi'   => 'Pemeriksaan dan pengujian pesawat angkat, pita transport, pesawat angkut, alat angkutan, hingga alat bantu angkat agar tetap laik dan aman dioperasikan.',
                'rincian'     => "Pesawat Angkat: Lier, Takel, Peralatan Angkat Listrik, Pesawat Pneumatic, Gondola, Keran Angkat, Keran Magnit, Keran Lokomotif, Keran Dinding, Keran Sumbu Putar\nPita Transport: Escalator dan Travelator, Ban Berjalan, Lantai Berjalan\nPesawat Angkut: Truk, Truk Derek, Traktor, Gerobak, Forklift, Kereta Gantung\nAlat Angkutan: Lokomotif, Gerbong, dan Lori\nAlat Bantu Angkat: Sling Wirerope, Rantai, Tali Serat, Spreder Bar, Shakel, Klem, O-Ring, dll.",
                'urutan'      => 2,
                'aktif'       => true,
            ],
            [
                'icon'        => 'bi-gear-wide-connected',
                'judul'       => 'Riksa Uji Pesawat Tenaga Produksi',
                'dasar_hukum' => 'Permenaker No. 38 Tahun 2016',
                'deskripsi'   => 'Pemeriksaan dan pengujian penggerak mula, pita transport produksi, transmisi tenaga mekanik, hingga tanur agar sesuai standar keselamatan kerja.',
                'rincian'     => "Penggerak Mula: Motor Bakar, Turbin, Kincir Angin, atau motor penggerak lainnya\nPita Transport: Mesin Asah, Mesin Poles dan Pelicin, Mesin Tuang dan Cetak, Mesin Tempa dan Pres, Mesin Pon, Mesin Penghancur, Mesin Penggiling dan Penumbuk, serta mesin lain yang sejenis\nTransmisi Tenaga Mekanik: Transmisi Sabuk, Transmisi Rantai, dan Transmisi Roda Gigi\nTanur: Blast Furnace, Basic Oxygen Furnace, Electric Arc Furnace, Refractory Furnace, Tanur Pemanas (Reheating Furnace), Klin, Oven, dan Furnace lainnya",
                'urutan'      => 3,
                'aktif'       => true,
            ],
            [
                'icon'        => 'bi-droplet-half',
                'judul'       => 'Riksa Uji Bejana Tekan, Tangki Timbun & Pesawat Uap',
                'dasar_hukum' => 'Permenaker No. 37 Tahun 2016 & UU Uap Tahun 1930',
                'deskripsi'   => 'Pemeriksaan dan pengujian bejana tekan, tangki timbun, ketel uap, dan pesawat penghasil uap untuk memastikan kelayakan operasional sesuai tekanan dan kapasitas yang dipersyaratkan.',
                'rincian'     => "Bejana Tekan: Bejana Penyimpanan Gas, Campuran Gas, Bejana Penyimpanan Bahan Bakar Gas, Bejana Transport, Bejana Proses, Pesawat Pendingin, Bejana Tekanan yang memiliki tekanan lebih dari 1 kg/cm² dan volume lebih dari 2,25 liter\nTangki Timbun & Tanur: Tangki Penimbun Cairan bahan mudah terbakar, Tangki Penimbun Cairan minimal kapasitas 200 liter, Tangki Timbun minimal volume 450 liter dan/atau temperatur lebih dari 99º C\nKetel Uap: Suatu ketel uap dan setiap pesawat lainnya yang dipertunjukkan guna bekerja di bawah tekanan lebih tinggi dari tekanan udara biasa\nPesawat Penghasil Uap: Suatu pesawat yang dibangun untuk menghasilkan uap yang dipergunakan di luar pesawat tersebut",
                'urutan'      => 4,
                'aktif'       => true,
            ],
            [
                'icon'        => 'bi-lightning-charge-fill',
                'judul'       => 'Riksa Uji Instalasi Listrik dan Penyalur Petir',
                'dasar_hukum' => 'Permenaker No. 12 Tahun 2015 & No. 31 Tahun 2015',
                'deskripsi'   => 'Pemeriksaan dan pengujian berkala instalasi listrik serta instalasi penyalur petir pada berbagai jenis bangunan sesuai fungsi dan tingkat risikonya.',
                'rincian'     => "Riksa Uji Instalasi Listrik: Distribusi Listrik, Pembangkit Listrik, Transmisi Listrik, dan Pemanfaatan Listrik yang beroperasi dengan tegangan lebih dari 50 Volt\nRiksa Uji Instalasi Penyalur Petir: Bangunan terpencil atau tinggi, bangunan kepentingan umum seperti hotel/pasar/stasiun, bangunan bahan mudah meledak dan terbakar, museum, perpustakaan, penyimpanan arsip, serta area terbuka seperti perkebunan, padang golf, dan stadion olahraga",
                'urutan'      => 5,
                'aktif'       => true,
            ],
            [
                'icon'        => 'bi-fire',
                'judul'       => 'Riksa Uji Instalasi Proteksi Kebakaran',
                'dasar_hukum' => 'Permenaker No. 04 Tahun 1980 & No. 02 Tahun 1983',
                'deskripsi'   => 'Pemeriksaan dan pengujian instalasi hydrant, springkler, alarm system, smoke and heat detector, hingga Alat Pemadam Api Ringan (APAR) agar berfungsi optimal saat dibutuhkan.',
                'rincian'     => "Instalasi hydrant\nSpringkler\nAlarm system\nSmoke and heat detector\nAPAR (Alat Pemadam Api Ringan)",
                'urutan'      => 6,
                'aktif'       => true,
            ],
        ];

        foreach ($layanans as $l) {
            Layanan::create($l);
        }
    }
}
