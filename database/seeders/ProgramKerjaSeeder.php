<?php

namespace Database\Seeders;

use App\Models\ProgramKerja;
use Illuminate\Database\Seeder;

class ProgramKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'judul'            => 'Rekrutmen & Pelatihan Volunteer Pendamping Kampus Inklusif',
                'kategori'         => 'Bidang Pengembangan Relawan',
                'deskripsi'        => 'Program pelatihan intensif bagi mahasiswa volunteer PLD meliputi etika pendampingan disabilitas, pengenalan Bahasa Isyarat Indonesia (BISINDO), teknik notetaking perkuliahan, dan pemanduan mobilitas tunanetra.',
                'sasaran'          => 'Mahasiswa Universitas Ibnu Sina & Komunitas Relawan',
                'target_waktu'     => 'Awal Semester Ganjil & Genap',
                'penanggung_jawab' => 'Divisi Relawan & Kemahasiswaan PLD',
                'status'           => 'Sedang Berjalan',
                'urutan'           => 1,
                'is_active'        => true,
            ],
            [
                'judul'            => 'Layanan Pendampingan Ujian & Akademik Terjadwal',
                'kategori'         => 'Bidang Pendampingan & Inklusi',
                'deskripsi'        => 'Penyediaan pendamping ujian (reader/writer), penyesuaian durasi waktu pengerjaan tugas/ujian (akomodasi yang layak), serta pembagian notetaker untuk setiap kelas mahasiswa disabilitas.',
                'sasaran'          => 'Seluruh Mahasiswa Disabilitas Terdaftar di PLD',
                'target_waktu'     => 'Sepanjang Semester Perkuliahan',
                'penanggung_jawab' => 'Divisi Layanan Akademik PLD',
                'status'           => 'Sedang Berjalan',
                'urutan'           => 2,
                'is_active'        => true,
            ],
            [
                'judul'            => 'Konseling Psikologis & Bimbingan Adaptasi Kampus',
                'kategori'         => 'Bidang Konseling & Advokasi',
                'deskripsi'        => 'Layanan konseling privat tatap muka maupun daring bersama konselor profesional untuk mendukung kesehatan mental, pengembangan kepercayaan diri, dan adaptasi sosial mahasiswa berkebutuhan khusus.',
                'sasaran'          => 'Mahasiswa Disabilitas & Mahasiswa Umum',
                'target_waktu'     => 'Setiap Hari Kerja (Senin - Jumat)',
                'penanggung_jawab' => 'Konselor & Unit Psikologi PLD',
                'status'           => 'Sedang Berjalan',
                'urutan'           => 3,
                'is_active'        => true,
            ],
            [
                'judul'            => 'Workshop Literasi Intelek Tuli & Budaya Tuli',
                'kategori'         => 'Bidang Edukasi & Intelek Tuli',
                'deskripsi'        => 'Seminar dan workshop berkala yang menghadirkan narasumber Tuli berprestasi untuk membedah konsep linguistik isyarat, hak aksesibilitas informasi, dan memperkuat pemberdayaan intelektual teman Tuli.',
                'sasaran'          => 'Civitas Academica & Masyarakat Umum',
                'target_waktu'     => 'Triwulan I & III',
                'penanggung_jawab' => 'Divisi Riset & Edukasi Inklusif',
                'status'           => 'Direncanakan',
                'urutan'           => 4,
                'is_active'        => true,
            ],
            [
                'judul'            => 'Audit Aksesibilitas Fasilitas Fisik & Digital Kampus',
                'kategori'         => 'Bidang Advokasi & Fasilitas',
                'deskripsi'        => 'Pemeriksaan dan evaluasi rutin jalur guiding block, ramp kursi roda, toilet ramah disabilitas, lift bersuara, serta standar aksesibilitas website dan materi e-learning universitas.',
                'sasaran'          => 'Seluruh Gedung & Portal Digital Universitas Ibnu Sina',
                'target_waktu'     => 'Semester Genap',
                'penanggung_jawab' => 'Tim Advokasi Infrastruktur PLD',
                'status'           => 'Direncanakan',
                'urutan'           => 5,
                'is_active'        => true,
            ],
            [
                'judul'            => 'Penyusunan Modul & Buku Saku Kampus Ramah Disabilitas',
                'kategori'         => 'Bidang Advokasi & Sosialisasi',
                'deskripsi'        => 'Penerbitan pedoman resmi panduan interaksi dan metode pengajaran inklusif bagi para dosen, tenaga kependidikan, serta pengurus organisasi mahasiswa di lingkungan universitas.',
                'sasaran'          => 'Dosen, Tendik, & Ormawa UIS',
                'target_waktu'     => 'Tahun Ajaran 2026/2027',
                'penanggung_jawab' => 'Pimpinan PLD UIS',
                'status'           => 'Terlaksana',
                'urutan'           => 6,
                'is_active'        => true,
            ],
        ];

        foreach ($programs as $prog) {
            ProgramKerja::updateOrCreate(['judul' => $prog['judul']], $prog);
        }
    }
}
