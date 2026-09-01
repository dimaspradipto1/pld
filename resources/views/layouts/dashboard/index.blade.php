@extends('layouts.dashboard.template')

@push('styles')
<style>
  :root {
    --fikes-purple: #823ca2;
    --fikes-purple-dark: #591e73;
    --fikes-orange: #ff9c00;
  }

  /* Welcome Banner */
  .dash-hero-banner {
    background: linear-gradient(135deg, #190a24 0%, #3d1257 55%, #823ca2 100%);
    border-radius: 20px;
    padding: 28px 32px;
    color: #ffffff;
    position: relative;
    overflow: hidden;
    margin-bottom: 25px;
    box-shadow: 0 10px 25px rgba(130, 60, 162, 0.2);
  }
  .dash-hero-banner::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 350px;
    height: 350px;
    background: radial-gradient(circle, rgba(255, 156, 0, 0.2) 0%, rgba(255, 255, 255, 0) 70%);
    border-radius: 50%;
    pointer-events: none;
  }

  /* Modern Stat Card */
  .stat-card-modern {
    background: #ffffff;
    border-radius: 16px;
    padding: 22px;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
    border: 1px solid #ede4f2;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 100%;
  }
  .stat-card-modern:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(130, 60, 162, 0.12);
    border-color: #c9a4dc;
  }
  .stat-icon-wrap {
    width: 54px;
    height: 54px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
  }

  .stat-num {
    font-size: 28px;
    font-weight: 800;
    color: #1a0528;
    line-height: 1.1;
    margin-bottom: 4px;
  }
  .stat-label {
    font-size: 13px;
    color: #717171;
    font-weight: 600;
    margin-bottom: 0;
  }

  /* Section Box */
  .dash-card {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #ede4f2;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
    padding: 24px;
    margin-bottom: 24px;
  }
  .dash-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-bottom: 16px;
    border-bottom: 1px solid #f2e9f7;
    margin-bottom: 18px;
  }
  .dash-card-title {
    font-size: 16px;
    font-weight: 700;
    color: #1a0528;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  /* Shortcut pill */
  .shortcut-btn {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 18px;
    border-radius: 12px;
    background: #faf7fc;
    border: 1px solid #eddff5;
    text-decoration: none;
    color: #333333;
    font-weight: 600;
    font-size: 13.5px;
    transition: all 0.2s ease;
  }
  .shortcut-btn:hover {
    background: var(--fikes-purple);
    border-color: var(--fikes-purple);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(130, 60, 162, 0.25);
  }
  .shortcut-btn:hover .shortcut-icon {
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff;
  }
  .shortcut-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background: rgba(130, 60, 162, 0.1);
    color: var(--fikes-purple);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    transition: all 0.2s ease;
  }
</style>
@endpush

@section('content')
<!-- BREADCRUMB -->
<div class="pagetitle mb-3">
    <h1>Dashboard Portal FIKES UIS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<!-- ═══════════════════════════════════════════════
     WELCOME HERO BANNER
═══════════════════════════════════════════════ -->
<div class="dash-hero-banner">
    <div class="row align-items-center">
        <div class="col-lg-8">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge" style="background:#ff9c00; color:#1a0528; font-weight:700;">
                    <i class="bi bi-person-check-fill me-1"></i>
                    @if($isAdmin)
                        Super Administrator
                    @elseif($isOrganisasi && $isPenulis)
                        Pengelola Organisasi & Penulis Berita
                    @elseif($isOrganisasi)
                        Pengelola Organisasi Mahasiswa
                    @elseif($isPenulis)
                        Penulis Berita & Konten
                    @else
                        Pengguna Portal
                    @endif
                </span>
                <span class="text-white-50 small">| {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
            </div>
            <h2 class="fw-bold text-white mb-2" style="font-size: 26px;">
                Selamat Datang, {{ $user->name }}! 👋
            </h2>
            <p class="text-white-50 mb-0" style="font-size: 14.5px; max-width: 680px;">
                @if($isAdmin)
                    Kelola seluruh informasi fakultas, program studi, tenaga pengajar, kemahasiswaan, dan publikasi portal web FIKES Universitas Ibnu Sina secara terpusat.
                @elseif($isOrganisasi)
                    Kelola profil lembaga kemahasiswaan, kegiatan, susunan pengurus, dan tautan pendaftaran anggota baru organisasi Anda.
                @elseif($isPenulis)
                    Tulis dan terbitkan berita, pengumuman resmi fakultas, artikel kesehatan, dan liputan kegiatan akademik.
                @else
                    Selamat datang di sistem manajemen portal web FIKES UIS.
                @endif
            </p>
        </div>
        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
            <a href="{{ url('/') }}" target="_blank" class="btn btn-warning text-dark fw-bold px-3 py-2 shadow-sm rounded-3">
                <i class="bi bi-globe me-1"></i> Buka Website Utama
            </a>
        </div>
    </div>
</div>

<section class="section dashboard">

    {{-- ══════════════════════════════════════════════════════════════
         ROLE 1: KHUSUS PENGELOLA ORGANISASI (NON-ADMIN)
    ══════════════════════════════════════════════════════════════ --}}
    @if($isOrganisasi && !$isAdmin)
        <div class="row g-3 mb-4">
            <!-- Total Ormawa -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num">{{ $totalOrganisasi }}</div>
                        <p class="stat-label">Total Organisasi</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(130, 60, 162, 0.1); color: #823ca2;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </div>

            <!-- Ormawa Aktif -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num text-success">{{ $totalOrganisasiActive }}</div>
                        <p class="stat-label">Organisasi Aktif</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(25, 135, 84, 0.1); color: #198754;">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                </div>
            </div>

            <!-- Rekrutmen Terbuka -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num text-warning">{{ $totalOrganisasiOprec }}</div>
                        <p class="stat-label">Oprec / Pendaftaran Buka</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(255, 156, 0, 0.12); color: #ff9c00;">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                </div>
            </div>

            <!-- Kategori Terdaftar -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num text-primary">{{ count($ormawaCategories) }}</div>
                        <p class="stat-label">Kategori Lembaga</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(13, 110, 253, 0.1); color: #0d6efd;">
                        <i class="bi bi-diagram-3-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <!-- Chart Distribusi Kategori -->
            <div class="col-lg-6">
                <div class="dash-card h-100">
                    <div class="dash-card-header">
                        <h3 class="dash-card-title">
                            <i class="bi bi-pie-chart-fill text-primary"></i> Distribusi Kategori Lembaga
                        </h3>
                    </div>
                    <div id="ormawaCategoryChart" style="min-height: 280px;"></div>
                </div>
            </div>

            <!-- Action Quick Box -->
            <div class="col-lg-6">
                <div class="dash-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="dash-card-header">
                            <h3 class="dash-card-title">
                                <i class="bi bi-lightning-charge-fill text-warning"></i> Aksi Cepat Pengurus
                            </h3>
                        </div>
                        <p class="text-muted small">
                            Kelola profil lembaga Anda agar informasi visi-misi, susunan pengurus, dan link pendaftaran anggota baru selalu diperbarui untuk mahasiswa.
                        </p>
                        <div class="d-flex flex-column gap-2 mb-3">
                            <a href="{{ route('organisasi-mahasiswa.create') }}" class="shortcut-btn">
                                <div class="shortcut-icon"><i class="bi bi-plus-circle-fill"></i></div>
                                <span>Tambah Organisasi / UKM Baru</span>
                            </a>
                            <a href="{{ route('organisasi-mahasiswa.index') }}" class="shortcut-btn">
                                <div class="shortcut-icon"><i class="bi bi-list-task"></i></div>
                                <span>Lihat & Kelola Seluruh Data Organisasi</span>
                            </a>
                            <a href="{{ route('homepage.organisasi') }}" target="_blank" class="shortcut-btn">
                                <div class="shortcut-icon"><i class="bi bi-eye-fill"></i></div>
                                <span>Pratinjau Halaman Organisasi di Frontend</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Organisasi Terbaru -->
        <div class="dash-card">
            <div class="dash-card-header">
                <h3 class="dash-card-title">
                    <i class="bi bi-people-fill" style="color: #823ca2;"></i> Daftar Lembaga & Organisasi Mahasiswa
                </h3>
                <a href="{{ route('organisasi-mahasiswa.index') }}" class="btn btn-sm btn-outline-primary" style="color:#823ca2; border-color:#823ca2;">
                    Kelola Semua
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Organisasi</th>
                            <th>Kategori</th>
                            <th>Ketua</th>
                            <th>Periode</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($latestOrganisasis as $index => $orm)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $orm->nama_organisasi }}</div>
                                    @if($orm->singkatan)
                                        <small class="text-muted">{{ $orm->singkatan }}</small>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge" style="background:#823ca2;">{{ $orm->kategori }}</span>
                                </td>
                                <td>{{ $orm->nama_ketua ?: '-' }}</td>
                                <td>{{ $orm->periode ?: '-' }}</td>
                                <td class="text-center">
                                    @if($orm->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('organisasi-mahasiswa.edit', $orm->id) }}" class="btn btn-sm btn-warning text-white" title="Edit">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-3">Belum ada data organisasi mahasiswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    {{-- ══════════════════════════════════════════════════════════════
         ROLE 2: KHUSUS PENULIS BERITA (NON-ADMIN)
    ══════════════════════════════════════════════════════════════ --}}
    @elseif($isPenulis && !$isAdmin)
        <div class="row g-3 mb-4">
            <!-- Total Berita Saya -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num text-primary">{{ $totalNews }}</div>
                        <p class="stat-label">Total Tulisan Anda</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(13, 110, 253, 0.1); color: #0d6efd;">
                        <i class="bi bi-newspaper"></i>
                    </div>
                </div>
            </div>

            <!-- Berita Terpublikasi -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num text-success">{{ $myNewsPublished }}</div>
                        <p class="stat-label">Artikel Terpublikasi</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(25, 135, 84, 0.1); color: #198754;">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                </div>
            </div>

            <!-- Berita Draft -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num text-warning">{{ $myNewsDraft }}</div>
                        <p class="stat-label">Draft / Menunggu</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(255, 156, 0, 0.12); color: #ff9c00;">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                </div>
            </div>

            <!-- Galeri Terkait -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num" style="color: #823ca2;">{{ $totalGalleries }}</div>
                        <p class="stat-label">Foto Dokumentasi</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(130, 60, 162, 0.1); color: #823ca2;">
                        <i class="bi bi-images"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <!-- Chart Tren Publikasi Anda -->
            <div class="col-lg-8">
                <div class="dash-card h-100">
                    <div class="dash-card-header">
                        <h3 class="dash-card-title">
                            <i class="bi bi-graph-up-arrow text-primary"></i> Tren Publikasi Artikel Anda (6 Bulan Terakhir)
                        </h3>
                    </div>
                    <div id="newsMonthlyChart" style="min-height: 280px;"></div>
                </div>
            </div>

            <!-- Aksi Cepat Penulis -->
            <div class="col-lg-4">
                <div class="dash-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="dash-card-header">
                            <h3 class="dash-card-title">
                                <i class="bi bi-pencil-fill text-warning"></i> Menu Penulis
                            </h3>
                        </div>
                        <p class="text-muted small">
                            Terbitkan informasi terkini, kegiatan akademik, dan pencapaian civitas FIKES UIS.
                        </p>
                        <div class="d-flex flex-column gap-2 mb-3">
                            <a href="{{ route('news.create') }}" class="shortcut-btn">
                                <div class="shortcut-icon"><i class="bi bi-plus-circle-fill"></i></div>
                                <span>Tulis Berita Baru</span>
                            </a>
                            <a href="{{ route('news.index') }}" class="shortcut-btn">
                                <div class="shortcut-icon"><i class="bi bi-journal-text"></i></div>
                                <span>Semua Berita Saya</span>
                            </a>
                            <a href="{{ route('homepage.news') }}" target="_blank" class="shortcut-btn">
                                <div class="shortcut-icon"><i class="bi bi-globe"></i></div>
                                <span>Lihat Portal Berita</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Berita Anda -->
        <div class="dash-card">
            <div class="dash-card-header">
                <h3 class="dash-card-title">
                    <i class="bi bi-newspaper" style="color: #823ca2;"></i> Berita Terbaru yang Anda Tulis
                </h3>
                <a href="{{ route('news.index') }}" class="btn btn-sm btn-outline-primary" style="color:#823ca2; border-color:#823ca2;">
                    Kelola Semua
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Judul Berita</th>
                            <th>Kategori</th>
                            <th>Tanggal Buat</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($latestNews as $n)
                            <tr>
                                <td class="fw-semibold">{{ Str::limit($n->title ?? $n->judul, 60) }}</td>
                                <td><span class="badge bg-light text-dark border">{{ $n->category ?? 'Berita' }}</span></td>
                                <td class="text-muted small">{{ $n->created_at ? $n->created_at->format('d M Y') : '-' }}</td>
                                <td class="text-center">
                                    @if($n->status === 'published')
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Draft</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('news.edit', $n->id) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">Anda belum menulis berita apapun.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    {{-- ══════════════════════════════════════════════════════════════
         ROLE 3: SUPER ADMINISTRATOR / ADMIN LENGKAP
    ══════════════════════════════════════════════════════════════ --}}
    @else
        <!-- TOP 8 KPI METRIC CARDS -->
        <div class="row g-3 mb-4">
            <!-- 1. Berita -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num text-primary">{{ $totalNews }}</div>
                        <p class="stat-label">Berita & Informasi</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(13, 110, 253, 0.1); color: #0d6efd;">
                        <i class="bi bi-newspaper"></i>
                    </div>
                </div>
            </div>

            <!-- 2. Dosen -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num" style="color: #823ca2;">{{ $totalDosen }}</div>
                        <p class="stat-label">Dosen & Pengajar</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(130, 60, 162, 0.1); color: #823ca2;">
                        <i class="bi bi-person-workspace"></i>
                    </div>
                </div>
            </div>

            <!-- 3. Program Studi -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num text-warning">{{ $totalLayanan }}</div>
                        <p class="stat-label">Program Studi</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(255, 156, 0, 0.12); color: #ff9c00;">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                </div>
            </div>

            <!-- 4. Organisasi Mahasiswa -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num text-success">{{ $totalOrganisasi }}</div>
                        <p class="stat-label">Organisasi Mahasiswa</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(25, 135, 84, 0.1); color: #198754;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </div>

            <!-- 5. Prestasi -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num text-warning">{{ $totalPrestasi }}</div>
                        <p class="stat-label">Prestasi Mahasiswa</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(255, 193, 7, 0.15); color: #e5a823;">
                        <i class="bi bi-trophy-fill"></i>
                    </div>
                </div>
            </div>

            <!-- 6. Galeri Dokumentasi -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num text-info">{{ $totalGalleries }}</div>
                        <p class="stat-label">Dokumentasi Galeri</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(13, 202, 240, 0.1); color: #0dcaf0;">
                        <i class="bi bi-images"></i>
                    </div>
                </div>
            </div>

            <!-- 7. Testimoni -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num text-danger">{{ $totalTestimonials }}</div>
                        <p class="stat-label">Testimoni Civitas</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(220, 53, 69, 0.1); color: #dc3545;">
                        <i class="bi bi-chat-heart-fill"></i>
                    </div>
                </div>
            </div>

            <!-- 8. Total Pengguna -->
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card-modern">
                    <div>
                        <div class="stat-num text-secondary">{{ $totalUsers }}</div>
                        <p class="stat-label">Pengguna Sistem</p>
                    </div>
                    <div class="stat-icon-wrap" style="background: rgba(108, 117, 125, 0.1); color: #6c757d;">
                        <i class="bi bi-person-gear"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2 CHARTS ROW -->
        <div class="row g-4 mb-4">
            <!-- Area Chart: Tren Publikasi Berita -->
            <div class="col-lg-7">
                <div class="dash-card h-100">
                    <div class="dash-card-header">
                        <h3 class="dash-card-title">
                            <i class="bi bi-graph-up text-primary"></i> Tren Publikasi Berita & Agenda (6 Bulan)
                        </h3>
                        <span class="badge bg-light text-dark border">Data Bulanan</span>
                    </div>
                    <div id="adminNewsChart" style="min-height: 280px;"></div>
                </div>
            </div>

            <!-- Donut Chart: Komposisi Organisasi & Testimoni -->
            <div class="col-lg-5">
                <div class="dash-card h-100">
                    <div class="dash-card-header">
                        <h3 class="dash-card-title">
                            <i class="bi bi-pie-chart-fill" style="color:#823ca2;"></i> Distribusi Ormawa & Kegiatan
                        </h3>
                        <a href="{{ route('organisasi-mahasiswa.index') }}" class="btn btn-sm btn-outline-primary" style="font-size: 11px;">Kelola</a>
                    </div>
                    <div id="adminOrmawaChart" style="min-height: 280px;"></div>
                </div>
            </div>
        </div>

        <!-- 2 RECENT DATA TABLES ROW -->
        <div class="row g-4 mb-4">
            <!-- Recent News -->
            <div class="col-lg-7">
                <div class="dash-card h-100">
                    <div class="dash-card-header">
                        <h3 class="dash-card-title">
                            <i class="bi bi-newspaper" style="color:#823ca2;"></i> Berita & Informasi Terkini
                        </h3>
                        <a href="{{ route('news.index') }}" class="btn btn-sm btn-outline-primary" style="color:#823ca2; border-color:#823ca2;">Lihat Semua</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Judul Berita</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestNews as $news)
                                    <tr>
                                        <td>
                                            <div class="fw-semibold text-dark">{{ Str::limit($news->title ?? $news->judul, 45) }}</div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border">{{ $news->category ?? 'Berita' }}</span>
                                        </td>
                                        <td class="text-muted small">{{ $news->created_at ? $news->created_at->format('d M Y') : '-' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('news.edit', $news->id) }}" class="btn btn-sm btn-outline-secondary" title="Edit Berita">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-3">Belum ada berita terpublikasi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recent Testimonials -->
            <div class="col-lg-5">
                <div class="dash-card h-100">
                    <div class="dash-card-header">
                        <h3 class="dash-card-title">
                            <i class="bi bi-chat-heart-fill text-warning"></i> Testimoni Masuk Terbaru
                        </h3>
                        <a href="{{ route('testimonial.index') }}" class="btn btn-sm btn-outline-warning" style="color:#cc7c00; border-color:#ff9c00;">Kelola</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Pengirim</th>
                                    <th class="text-center">Rating</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestTestimonials as $testi)
                                    <tr>
                                        <td>
                                            <div class="fw-semibold text-dark">{{ $testi->nama }}</div>
                                            <small class="text-muted d-block text-truncate" style="max-width: 170px;">{{ $testi->pesan }}</small>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-warning fw-bold">★ {{ $testi->bintang }}</span>
                                        </td>
                                        <td class="text-center">
                                            @if($testi->aktif)
                                                <span class="badge bg-success">Tayang</span>
                                            @else
                                                <span class="badge bg-secondary">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-3">Belum ada testimoni masuk.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- QUICK ACCESS MANAGEMENT SHORTCUTS -->
        <div class="dash-card">
            <div class="dash-card-header">
                <h3 class="dash-card-title">
                    <i class="bi bi-grid-fill text-primary"></i> Pintasan Akses Cepat Administrator
                </h3>
            </div>
            <div class="row g-3">
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <a href="{{ route('news.create') }}" class="shortcut-btn">
                        <div class="shortcut-icon"><i class="bi bi-pencil-square"></i></div>
                        <span>Tulis Berita</span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <a href="{{ route('dosen.index') }}" class="shortcut-btn">
                        <div class="shortcut-icon"><i class="bi bi-person-workspace"></i></div>
                        <span>Kelola Dosen</span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <a href="{{ route('organisasi-mahasiswa.index') }}" class="shortcut-btn">
                        <div class="shortcut-icon"><i class="bi bi-people-fill"></i></div>
                        <span>Organisasi</span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <a href="{{ route('kurikulum.index') }}" class="shortcut-btn">
                        <div class="shortcut-icon"><i class="bi bi-journal-bookmark-fill"></i></div>
                        <span>Kurikulum</span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <a href="{{ route('topbar.index') }}" class="shortcut-btn">
                        <div class="shortcut-icon"><i class="bi bi-sliders"></i></div>
                        <span>Topbar</span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <a href="{{ route('user.index') }}" class="shortcut-btn">
                        <div class="shortcut-icon"><i class="bi bi-person-gear"></i></div>
                        <span>Pengguna</span>
                    </a>
                </div>
            </div>
        </div>
    @endif

</section>
@endsection

@push('scripts')
<!-- ApexCharts JS -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    @php
        $chartCategories = array_keys($ormawaCategories);
        $chartCategoryCounts = array_values($ormawaCategories);
    @endphp

    // 1. Chart untuk Role Organisasi
    @if($isOrganisasi && !$isAdmin)
        const ormawaCatEl = document.querySelector("#ormawaCategoryChart");
        if (ormawaCatEl) {
            new ApexCharts(ormawaCatEl, {
                series: {!! json_encode(!empty($chartCategoryCounts) ? $chartCategoryCounts : [1, 2, 1, 1]) !!},
                chart: {
                    type: 'donut',
                    height: 280,
                    fontFamily: 'Inter, sans-serif'
                },
                labels: {!! json_encode(!empty($chartCategories) ? $chartCategories : ['BEM / DPM', 'HIMA', 'UKM', 'Komunitas']) !!},
                colors: ['#823ca2', '#ff9c00', '#0d6efd', '#20c997'],
                legend: { position: 'bottom' },
                dataLabels: { enabled: true },
                stroke: { width: 2, colors: ['#ffffff'] },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total Ormawa',
                                    formatter: function () {
                                        return '{{ $totalOrganisasi }}';
                                    }
                                }
                            }
                        }
                    }
                }
            }).render();
        }
    @endif

    // 2. Chart untuk Role Penulis
    @if($isPenulis && !$isAdmin)
        const newsMonthEl = document.querySelector("#newsMonthlyChart");
        if (newsMonthEl) {
            new ApexCharts(newsMonthEl, {
                series: [{
                    name: 'Artikel Diterbitkan',
                    data: {!! json_encode($newsMonthlyCounts) !!}
                }],
                chart: {
                    type: 'area',
                    height: 280,
                    toolbar: { show: false },
                    fontFamily: 'Inter, sans-serif'
                },
                colors: ['#823ca2'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.55,
                        opacityTo: 0.05,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth', width: 3 },
                xaxis: {
                    categories: {!! json_encode($months) !!}
                },
                yaxis: {
                    labels: {
                        formatter: function (val) {
                            return Math.floor(val);
                        }
                    }
                }
            }).render();
        }
    @endif

    // 3. Charts untuk Role Admin
    @if($isAdmin)
        // Admin Area Chart Berita
        const adminNewsEl = document.querySelector("#adminNewsChart");
        if (adminNewsEl) {
            new ApexCharts(adminNewsEl, {
                series: [{
                    name: 'Publikasi Berita',
                    data: {!! json_encode($newsMonthlyCounts) !!}
                }],
                chart: {
                    type: 'area',
                    height: 280,
                    toolbar: { show: false },
                    fontFamily: 'Inter, sans-serif'
                },
                colors: ['#823ca2'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.55,
                        opacityTo: 0.05,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth', width: 3 },
                xaxis: {
                    categories: {!! json_encode($months) !!}
                },
                yaxis: {
                    labels: {
                        formatter: function (val) {
                            return Math.floor(val);
                        }
                    }
                }
            }).render();
        }

        // Admin Donut Chart Ormawa
        const adminOrmawaEl = document.querySelector("#adminOrmawaChart");
        if (adminOrmawaEl) {
            new ApexCharts(adminOrmawaEl, {
                series: {!! json_encode(!empty($chartCategoryCounts) ? $chartCategoryCounts : [1, 2, 1, 1]) !!},
                chart: {
                    type: 'donut',
                    height: 280,
                    fontFamily: 'Inter, sans-serif'
                },
                labels: {!! json_encode(!empty($chartCategories) ? $chartCategories : ['BEM / DPM', 'HIMA', 'UKM', 'Komunitas']) !!},
                colors: ['#823ca2', '#ff9c00', '#0d6efd', '#20c997'],
                legend: { position: 'bottom' },
                stroke: { width: 2, colors: ['#ffffff'] },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total Ormawa',
                                    formatter: function () {
                                        return '{{ $totalOrganisasi }}';
                                    }
                                }
                            }
                        }
                    }
                }
            }).render();
        }
    @endif
});
</script>
@endpush
