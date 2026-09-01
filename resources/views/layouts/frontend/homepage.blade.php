@extends('layouts.frontend.template')

@section('title', 'FIKES UIS — Fakultas Ilmu Kesehatan Universitas Ibnu Sina | Unggul, Profesional & Berkarakter')
@section('meta_description', 'Portal Resmi Fakultas Ilmu Kesehatan Universitas Ibnu Sina (FIKES UIS) — Program Studi Unggulan S1 Kesehatan & Keselamatan Kerja (K3) dan S1 Kesehatan Lingkungan.')

@push('styles')
<style>
  /* ═══════════════════════════════════════════════
     HERO BANNER
  ═══════════════════════════════════════════════ */
  .hero-slider-section {
    position: relative;
    background: #190a24;
    overflow: hidden;
    width: 100%;
  }
  .hero-banner-img {
    width: 100%;
    display: block;
    object-fit: cover;
    object-position: center;
  }
  @media (min-width: 992px) {
    .hero-banner-img {
      height: 480px;
      max-height: 520px;
      object-fit: cover;
    }
  }
  @media (min-width: 768px) and (max-width: 991.98px) {
    .hero-slider-section {
      background: #190a24;
    }
    .hero-banner-img {
      height: 320px;
      object-fit: contain;
      background: #190a24;
    }
  }
  @media (max-width: 767.98px) {
    .hero-slider-section {
      background: #190a24;
      min-height: 250px;
    }
    .hero-slider-section .carousel-item {
      min-height: 250px;
      background: #190a24;
    }
    .hero-banner-img {
      width: 100% !important;
      height: 250px !important;
      min-height: 250px !important;
      object-fit: contain !important;
      object-position: center !important;
      background: #190a24 !important;
      margin: 0 auto;
    }
  }
  .hero-slider-section .carousel-control-prev,
  .hero-slider-section .carousel-control-next {
    width: 48px;
    height: 48px;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(25, 10, 36, 0.6);
    border-radius: 50%;
    opacity: 0.75;
    margin: 0 20px;
    transition: all 0.25s ease;
    border: 1px solid rgba(255, 255, 255, 0.2);
  }
  @media (max-width: 768px) {
    .hero-slider-section .carousel-control-prev,
    .hero-slider-section .carousel-control-next {
      width: 32px;
      height: 32px;
      margin: 0 8px;
      font-size: 12px;
      opacity: 0.6;
    }
  }
  .hero-slider-section .carousel-control-prev:hover,
  .hero-slider-section .carousel-control-next:hover {
    background: var(--fikes-purple);
    opacity: 1;
    transform: translateY(-50%) scale(1.08);
  }
  .hero-slider-section .carousel-indicators [data-bs-target] {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin: 0 5px;
    background-color: var(--white);
    opacity: 0.5;
    border: none;
    transition: all 0.3s ease;
  }
  .hero-slider-section .carousel-indicators .active {
    width: 28px;
    border-radius: 20px;
    background-color: var(--fikes-orange);
    opacity: 1;
  }

  /* ═══════════════════════════════════════════════
     2. STATISTIK STRIP
  ═══════════════════════════════════════════════ */
  .stats-strip {
    background: var(--white);
    border-bottom: 1px solid var(--border-light);
    box-shadow: var(--shadow-sm);
  }
  .stat-col-box {
    padding: 26px 16px;
    text-align: center;
    border-right: 1px solid var(--border-light);
    transition: all 0.25s ease;
  }
  .stat-col-box:last-child { border-right: none; }
  .stat-col-box:hover {
    background: var(--fikes-purple-light);
  }
  .stat-num-val {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 30px;
    font-weight: 800;
    color: var(--fikes-purple);
    line-height: 1;
    margin-bottom: 6px;
  }
  .stat-num-val sup {
    color: var(--fikes-orange);
    font-size: 18px;
  }
  .stat-num-label {
    font-size: 12.5px;
    font-weight: 600;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  /* ═══════════════════════════════════════════════
     CARDS & SECTIONS
  ═══════════════════════════════════════════════ */
  .prodi-card {
    background: var(--white);
    border: 1px solid var(--border-light);
    border-radius: 24px;
    padding: 36px 32px;
    box-shadow: var(--shadow-sm);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
  }
  .prodi-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 6px;
    background: var(--fikes-purple);
  }
  .prodi-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: var(--border-purple);
  }
  .prodi-badge {
    display: inline-block;
    background: var(--fikes-orange-light);
    color: var(--fikes-orange-dark);
    font-size: 11px;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 50px;
    border: 1px solid var(--border-orange);
    margin-bottom: 14px;
  }
  .prodi-title {
    font-size: 22px;
    font-weight: 800;
    color: var(--text-main);
    margin-bottom: 12px;
  }
  .prodi-subhead {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px;
    font-weight: 700;
    color: var(--fikes-purple);
    margin-top: 16px;
    margin-bottom: 8px;
  }
  .prodi-list {
    list-style: none;
    padding: 0;
    margin: 0 0 16px 0;
  }
  .prodi-list li {
    font-size: 13px;
    color: var(--text-main);
    display: flex;
    align-items: flex-start;
    gap: 8px;
    margin-bottom: 6px;
  }
  .prodi-list li i {
    color: var(--fikes-purple);
    font-size: 14px;
    margin-top: 2px;
    flex-shrink: 0;
  }

  /* Facility Card */
  .fasilitas-box {
    background: var(--white);
    border: 1px solid var(--border-light);
    border-radius: 20px;
    padding: 28px 24px;
    box-shadow: var(--shadow-sm);
    transition: all 0.25s ease;
    height: 100%;
  }
  .fasilitas-box:hover {
    transform: translateY(-6px);
    border-color: var(--border-purple);
    box-shadow: var(--shadow-md);
  }
  .fasilitas-icon {
    width: 56px;
    height: 56px;
    background: var(--fikes-purple-light);
    color: var(--fikes-purple);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    margin-bottom: 18px;
  }

  /* Dosen Card */
  .dosen-card {
    background: var(--white);
    border: 1px solid var(--border-light);
    border-radius: 20px;
    padding: 24px;
    text-align: center;
    box-shadow: var(--shadow-sm);
    transition: all 0.25s ease;
    height: 100%;
  }
  .dosen-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-md);
    border-color: var(--border-purple);
  }
  .dosen-avatar {
    width: 84px;
    height: 84px;
    border-radius: 50%;
    background: var(--fikes-purple-light);
    color: var(--fikes-purple);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    margin: 0 auto 16px;
    border: 2px solid var(--border-purple);
  }
  .dosen-name {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15.5px;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 4px;
  }
  .dosen-bidang {
    font-size: 12.5px;
    color: var(--fikes-orange-dark);
    font-weight: 600;
    margin-bottom: 8px;
  }
  .dosen-pub {
    font-size: 11.5px;
    color: var(--text-muted);
    line-height: 1.5;
  }

  /* ═══════════════════════════════════════════════
     BERITA, PENGUMUMAN & AGENDA (SPLIT LAYOUT)
  ═══════════════════════════════════════════════ */
  .section-heading-fikes {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 27px;
    font-weight: 800;
    color: var(--fikes-purple, #823ca2);
    letter-spacing: -0.5px;
    line-height: 1.2;
  }
  
  /* Search Pill */
  .news-search-pill {
    position: relative;
    display: flex;
    align-items: center;
    background: #ffffff;
    border: 1.5px solid var(--border-light, #e2e5e9);
    border-radius: 50px;
    padding: 6px 18px;
    width: 250px;
    max-width: 100%;
    box-shadow: var(--shadow-sm);
    transition: all 0.25s ease;
  }
  .news-search-pill:focus-within {
    border-color: var(--fikes-purple, #823ca2);
    box-shadow: 0 0 0 3px rgba(130, 60, 162, 0.14);
  }
  .news-search-pill input {
    border: none;
    outline: none;
    background: transparent;
    font-size: 13px;
    color: #374151;
    width: 100%;
    padding-right: 8px;
  }
  .news-search-pill input::placeholder {
    color: #9ca3af;
  }
  .news-search-pill button {
    border: none;
    background: transparent;
    color: var(--fikes-purple, #823ca2);
    font-size: 15px;
    cursor: pointer;
    padding: 0;
    display: flex;
    align-items: center;
  }

  /* News Mini Item Grid */
  .news-mini-item {
    display: flex;
    gap: 12px;
    align-items: flex-start;
    text-decoration: none !important;
    padding: 8px;
    border-radius: 12px;
    transition: all 0.2s ease;
    height: 100%;
  }
  .news-mini-item:hover {
    background: var(--fikes-purple-light, #f5eefb);
    transform: translateY(-2px);
  }
  .news-mini-item:hover .news-mini-title {
    color: var(--fikes-purple, #823ca2);
  }
  .news-mini-img-wrap {
    width: 112px;
    height: 72px;
    flex-shrink: 0;
    border-radius: 10px;
    overflow: hidden;
    background: #f3f4f6;
    border: 1px solid rgba(0,0,0,0.06);
  }
  .news-mini-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }
  .news-mini-item:hover .news-mini-img {
    transform: scale(1.06);
  }
  .news-mini-fallback {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--fikes-purple-light, #f5eefb);
    color: var(--fikes-purple, #823ca2);
    font-size: 24px;
  }
  .news-mini-content {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
  }
  .news-mini-title {
    font-size: 13.5px;
    font-weight: 700;
    color: #1f2937;
    line-height: 1.35;
    margin-bottom: 4px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color 0.2s ease;
  }
  .news-mini-meta {
    font-size: 11px;
    color: #8c93a0;
    font-weight: 500;
  }

  /* Button FIKES Pill */
  .btn-fikes-pill {
    display: inline-block;
    background: var(--fikes-purple, #823ca2);
    color: #ffffff !important;
    font-size: 13.5px;
    font-weight: 700;
    padding: 10px 26px;
    border-radius: 50px;
    text-decoration: none !important;
    transition: all 0.25s ease;
    box-shadow: 0 4px 14px rgba(130, 60, 162, 0.25);
  }
  .btn-fikes-pill:hover {
    background: var(--fikes-purple-dark, #682985);
    color: var(--fikes-orange, #ff9c00) !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(130, 60, 162, 0.35);
  }

  /* Announcement Card */
  .announcement-card-box {
    display: block;
    background: #fbf9fd;
    border-radius: 10px;
    padding: 13px 16px;
    margin-bottom: 10px;
    text-decoration: none !important;
    transition: all 0.2s ease;
    border: 1px solid #eedef8;
  }
  .announcement-card-box:hover {
    background: var(--fikes-purple-light, #f5eefb);
    border-color: var(--fikes-purple, #823ca2);
    transform: translateX(4px);
  }
  .announcement-card-title {
    font-size: 13px;
    font-weight: 700;
    color: #1f2937;
    line-height: 1.35;
    margin-bottom: 4px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .announcement-card-date {
    font-size: 11.5px;
    color: #8c739e;
    font-weight: 600;
  }

  /* Agenda Card */
  .agenda-time-text {
    font-size: 14.5px;
    font-weight: 800;
    color: #111827;
    margin-bottom: 5px;
  }
  .agenda-badge-card {
    background: var(--fikes-orange, #ff9c00);
    color: #190a24;
    font-size: 13.5px;
    font-weight: 800;
    border-radius: 10px;
    padding: 10px 16px;
    box-shadow: 0 2px 6px rgba(255, 156, 0, 0.25);
    line-height: 1.35;
  }
  .btn-agenda-pill {
    display: block;
    width: 100%;
    text-align: center;
    background: var(--fikes-purple-light, #f5eefb);
    border: 1px solid var(--fikes-purple-subtle, #ecdcf7);
    color: var(--fikes-purple, #823ca2) !important;
    font-size: 13px;
    font-weight: 700;
    padding: 9px 16px;
    border-radius: 50px;
    text-decoration: none !important;
    transition: all 0.2s ease;
  }
  .btn-agenda-pill:hover {
    background: var(--fikes-purple, #823ca2);
    color: #ffffff !important;
  }

  /* PMB Banner Box */
  .pmb-cta-box {
    background: var(--obsidian-dark);
    border-radius: 28px;
    padding: 56px 44px;
    color: var(--white);
    position: relative;
    overflow: hidden;
    border: 2px solid var(--fikes-purple);
  }

  /* Partner Logo Box */
  .partner-logo-box {
    background: var(--white);
    border: 1px solid var(--border-light);
    border-radius: 14px;
    padding: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 84px;
    box-shadow: var(--shadow-sm);
    transition: all 0.2s ease;
  }
  .partner-logo-box:hover {
    transform: translateY(-3px);
    border-color: var(--border-purple);
  }
  .partner-logo-img {
    max-height: 44px;
    max-width: 120px;
    object-fit: contain;
  }
</style>
@endpush

@section('content')
@php
  $cleanWa = $cleanWa ?? '';
  if (empty($cleanWa) && !empty($contact?->no_wa)) {
      $cleanWa = preg_replace('/[^0-9]/', '', $contact->no_wa);
      if (strpos($cleanWa, '08') === 0) {
          $cleanWa = '628' . substr($cleanWa, 2);
      }
  }
@endphp

<!-- ═══════════════════════════════════════════════
     1. HERO BANNER (FULL IMAGE PROMOTION)
═══════════════════════════════════════════════ -->
<section class="hero-slider-section p-0">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
    
    @php
      $activeBanners = isset($banners) ? $banners->filter(fn($b) => !empty($b->url) || !empty($b->gambar)) : collect();
    @endphp

    @if($activeBanners->count() > 1)
      <div class="carousel-indicators">
        @foreach($activeBanners as $index => $banner)
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $loop->iteration }}"></button>
        @endforeach
      </div>
    @endif

    <div class="carousel-inner">
      @if($activeBanners->count() > 0)
        @foreach($activeBanners as $index => $banner)
          @php $imgPath = $banner->url ?? $banner->gambar; @endphp
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('storage/' . $imgPath) }}" alt="{{ $banner->judul ?? 'Banner Promosi FIKES UIS' }}" class="hero-banner-img">
          </div>
        @endforeach
      @else
        <div class="carousel-item active">
          <div class="hero-banner-img d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #190a24 0%, #47175d 100%); min-height: 360px; color: #ffffff;">
            <div class="text-center p-4">
              <div class="mb-3">
                <i class="bi bi-megaphone fs-1" style="color: var(--fikes-orange);"></i>
              </div>
              <h2 class="fw-bold mb-2" style="color: #ffffff; letter-spacing: -0.5px;">FAKULTAS ILMU KESEHATAN — FIKES UIS</h2>
              <p class="text-white-50 small mb-0" style="max-width: 540px; margin: 0 auto;">
                Banner Promosi & Iklan Fakultas dapat diunggah melalui menu Admin (<strong>Profil & Konten FIKES ➔ Banner Hero</strong>).
              </p>
            </div>
          </div>
        </div>
      @endif
    </div>

    @if($activeBanners->count() > 1)
      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Sebelumnya</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Selanjutnya</span>
      </button>
    @endif

  </div>
</section>



<!-- ═══════════════════════════════════════════════
     3. PROFIL SINGKAT FIKES UIS & SAMBUTAN DEKAN
═══════════════════════════════════════════════ -->
<section class="section-bg-white py-5" id="profil-singkat">
  <div class="container py-2">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6" data-aos="fade-right">
        <div class="section-label">Profil Fakultas</div>
        <h2 class="section-title">
          {{ $about->judul_profil ?? 'Dedikasi Mencetak Pemimpin di Bidang Kesehatan' }}
        </h2>
        <div class="divider-line"></div>
        <p class="section-desc mb-4" style="text-align: justify; line-height: 1.8;">
          {{ $about->deskripsi_profil_1 ?? 'Fakultas Ilmu Kesehatan Universitas Ibnu Sina (FIKES UIS) merupakan pelopor pendidikan tinggi di bidang Magister Kesehatan Masyarakat (S2), Keselamatan & Kesehatan Kerja (S1 K3), serta Kesehatan Lingkungan (S1 Kesling) di kawasan Kepulauan Riau dan nasional.' }}
        </p>

        @if(!empty($about?->deskripsi_profil_2))
          <p class="section-desc mb-4" style="text-align: justify; line-height: 1.8;">
            {{ $about->deskripsi_profil_2 }}
          </p>
        @endif

        <ul class="check-list mb-4">
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Kurikulum terintegrasi dengan standar sertifikasi kompetensi industri dan Kemnaker</span>
          </li>
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Fasilitas laboratorium pengujian lingkungan & higiene industri terakreditasi</span>
          </li>
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Dosen bergelar Magister dan Doktor dengan pengalaman praktisi industri & rumah sakit</span>
          </li>
        </ul>

        <a href="{{ route('homepage.tentang') }}" class="btn-primary-hero">
          <i class="bi bi-info-circle"></i>
          Profil Lengkap FIKES UIS
        </a>
      </div>

      <!-- Sambutan Dekan Card -->
      <div class="col-lg-6" data-aos="fade-left">
        <div class="p-4 p-md-5 rounded-4 shadow-sm" style="background: var(--surface-light); border: 1.5px solid var(--border-light);">
          <div class="d-flex align-items-center gap-3 mb-4">
            @if(!empty($sambutanDekan?->foto_dekan))
              <img src="{{ asset('storage/' . $sambutanDekan->foto_dekan) }}" alt="{{ $sambutanDekan->nama_dekan ?? 'Dekan FIKES UIS' }}" class="rounded-circle shadow-sm" style="width: 72px; height: 72px; object-fit: cover; border: 3px solid var(--fikes-purple); flex-shrink:0;">
            @else
              <div style="width: 68px; height: 68px; border-radius: 50%; background: linear-gradient(135deg, var(--fikes-purple) 0%, #47175d 100%); color: white; display:flex; align-items:center; justify-content:center; font-size:28px; flex-shrink:0; border: 3px solid var(--fikes-orange);">
                <i class="bi bi-person-badge-fill"></i>
              </div>
            @endif
            <div>
              <h5 class="fw-bold mb-1 text-dark">{{ $sambutanDekan->nama_dekan ?? 'Sambutan Dekan' }}</h5>
              <span class="text-muted small fw-semibold">{{ $sambutanDekan->jabatan_dekan ?? 'Dekan Fakultas Ilmu Kesehatan UIS' }}</span>
            </div>
          </div>

          <blockquote class="text-muted mb-4" style="font-style: italic; line-height: 1.8; text-align: justify; font-size: 14.5px;">
            "{{ $sambutanDekan->kutipan_singkat ?? ($sambutanDekan->sambutan_dekan ?? 'Selamat datang di Fakultas Ilmu Kesehatan Universitas Ibnu Sina. Kami bertekad membentuk generasi tenaga kesehatan yang tidak hanya unggul secara akademis dan terampil dalam praktik industri, namun juga memiliki integritas moral dan etika luhur dalam mengabdi kepada bangsa.') }}"
          </blockquote>

          <div class="d-flex align-items-center justify-content-between pt-3 border-top">
            <span class="fw-bold" style="color: var(--fikes-purple);">{{ $sambutanDekan->nama_dekan ?? 'Dekanat FIKES UIS' }}</span>
            <a href="{{ route('homepage.sambutan-dekan') }}" class="badge text-decoration-none" style="background: var(--fikes-orange); color: #190a24; font-weight: 800; padding: 6px 12px;">
              Baca Sambutan <i class="bi bi-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     4. PROGRAM STUDI UNGGULAN
═══════════════════════════════════════════════ -->
<section class="section-bg-sand" id="prodi">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Program Studi</div>
      <h2 class="section-title">Program Studi <em>Unggulan</em> FIKES UIS</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Program pascasarjana dan sarjana yang dirancang khusus untuk menjawab kebutuhan dunia industri modern, perminyakan, manufaktur, dan sistem pelayanan kesehatan publik.
      </p>
    </div>

    <div class="row g-4">
      <!-- Prodi 1: S2 Kesmas -->
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="prodi-card">
          <div>
            <span class="prodi-badge">Pascasarjana (S2) • M.Kes</span>
            <h3 class="prodi-title" style="font-size:20px;">S2 Kesehatan Masyarakat</h3>
            <p class="text-muted small mb-3" style="line-height: 1.65; text-align: justify;">
              Fokus pada kepemimpinan strategis kesehatan publik, epidemiologi lanjutan, evaluasi kebijakan kesehatan, dan manajemen K3 tingkat lanjut bagi para profesional.
            </p>

            <div class="prodi-subhead"><i class="bi bi-award-fill me-1"></i> Kompetensi Utama:</div>
            <ul class="prodi-list">
              <li><i class="bi bi-check-circle-fill"></i> Analisis Kebijakan & Manajemen Pelayanan Kesehatan</li>
              <li><i class="bi bi-check-circle-fill"></i> Epidemiologi Terapan & Perancangan Program Kesehatan</li>
              <li><i class="bi bi-check-circle-fill"></i> Kepemimpinan Strategis & Riset Publikasi Internasional</li>
            </ul>

            <div class="prodi-subhead"><i class="bi bi-briefcase-fill me-1"></i> Prospek Karir:</div>
            <p class="text-muted small mb-0">Direktur/Manajer RS, Peneliti, Konsultan Kebijakan, Akademisi/Dosen, Kepala Dinas Kesehatan.</p>
          </div>

          <div class="mt-4 pt-3 border-top">
            <a href="{{ route('homepage.layanan') }}" class="btn-primary-hero w-100 justify-content-center" style="font-size:13px; padding:10px 16px;">
              Detail S2 Kesmas <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Prodi 2: S1 K3 -->
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="prodi-card">
          <div>
            <span class="prodi-badge">Sarjana (S1) • Terakreditasi</span>
            <h3 class="prodi-title" style="font-size:20px;">S1 Kesehatan dan Keselamatan Kerja</h3>
            <p class="text-muted small mb-3" style="line-height: 1.65; text-align: justify;">
              Membekali keahlian identifikasi bahaya, penilaian risiko, audit SMK3 (ISO 45001), ergonomi industri, dan proteksi keselamatan kerja di sektor industri migas, maritim, dan manufaktur.
            </p>

            <div class="prodi-subhead"><i class="bi bi-award-fill me-1"></i> Kompetensi Utama:</div>
            <ul class="prodi-list">
              <li><i class="bi bi-check-circle-fill"></i> Analisis Higiene Industri, Ergonomi & Toksikologi Kerja</li>
              <li><i class="bi bi-check-circle-fill"></i> Audit Sistem Manajemen K3 (SMK3 PP 50/2012 & ISO 45001)</li>
              <li><i class="bi bi-check-circle-fill"></i> Investigasi Kecelakaan, Fire Safety & Tanggap Darurat</li>
            </ul>

            <div class="prodi-subhead"><i class="bi bi-briefcase-fill me-1"></i> Prospek Karir:</div>
            <p class="text-muted small mb-0">HSE Officer/Manager, Safety Inspector, Auditor K3 Industri, Konsultan K3 Migas/Konstruksi.</p>
          </div>

          <div class="mt-4 pt-3 border-top">
            <a href="{{ route('homepage.layanan') }}" class="btn-primary-hero w-100 justify-content-center" style="font-size:13px; padding:10px 16px;">
              Detail S1 K3 <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Prodi 3: S1 Kesling -->
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="prodi-card">
          <div>
            <span class="prodi-badge">Sarjana (S1) • Terakreditasi</span>
            <h3 class="prodi-title" style="font-size:20px;">S1 Kesehatan Lingkungan</h3>
            <p class="text-muted small mb-3" style="line-height: 1.65; text-align: justify;">
              Fokus pada analisis dampak lingkungan (AMDAL), pengelolaan limbah B3 industri, pengolahan air bersih dan limbah cair, serta sanitasi rumah sakit dan kawasan perkotaan.
            </p>

            <div class="prodi-subhead"><i class="bi bi-award-fill me-1"></i> Kompetensi Utama:</div>
            <ul class="prodi-list">
              <li><i class="bi bi-check-circle-fill"></i> Penyusunan & Evaluasi Dokumen AMDAL & Audit Lingkungan</li>
              <li><i class="bi bi-check-circle-fill"></i> Pengelolaan Limbah Padat, Cair, Gas & Limbah B3 Medis</li>
              <li><i class="bi bi-check-circle-fill"></i> Pengendalian Vektor Penyakit & Sanitasi Rumah Sakit</li>
            </ul>

            <div class="prodi-subhead"><i class="bi bi-briefcase-fill me-1"></i> Prospek Karir:</div>
            <p class="text-muted small mb-0">Sanitarian RS/Puskesmas, Environmental Specialist Industri, Konsultan AMDAL, Pegawai KLHK/Dinkes.</p>
          </div>

          <div class="mt-4 pt-3 border-top">
            <a href="{{ route('homepage.layanan') }}" class="btn-primary-hero w-100 justify-content-center" style="font-size:13px; padding:10px 16px;">
              Detail S1 Kesling <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     5. MENGAPA MEMILIH FIKES UIS
═══════════════════════════════════════════════ -->
<section class="section-bg-white">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Keunggulan Kami</div>
      <h2 class="section-title">Mengapa Memilih <em>FIKES UIS</em>?</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Kami memberikan ekosistem belajar yang menyeluruh antara pemahaman teoritis berstandar mutakhir dan pelatihan praktikal di lapangan.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="value-card">
          <div class="value-icon-wrap"><i class="bi bi-book-half"></i></div>
          <div class="value-title">Kurikulum Berbasis Industri</div>
          <p class="value-desc">Materi kuliah diselaraskan dengan kebutuhan kompetensi industri modern, Permenaker, dan standar sertifikasi internasional.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="value-card">
          <div class="value-icon-wrap"><i class="bi bi-person-video3"></i></div>
          <div class="value-title">Dosen Ahli & Praktisi</div>
          <p class="value-desc">Diajar langsung oleh akademisi bergelar doktor dan praktisi berpengalaman di industri migas, manufaktur, dan RS.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="value-card">
          <div class="value-icon-wrap"><i class="bi bi-microscope"></i></div>
          <div class="value-title">Laboratorium Terpadu</div>
          <p class="value-desc">Peralatan pengujian kualitas udara, kebisingan, ergonomi, mikrobiologi air, dan sanitasi yang lengkap.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
        <div class="value-card">
          <div class="value-icon-wrap"><i class="bi bi-buildings-fill"></i></div>
          <div class="value-title">50+ Mitra Industri & RS</div>
          <p class="value-desc">Kerjasama magang dan penempatan kerja luas di galangan kapal, kawasan industri Batam, RSUD, dan dinas pemerintah.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
        <div class="value-card">
          <div class="value-icon-wrap"><i class="bi bi-stars"></i></div>
          <div class="value-title">Karakter Islami & Humanis</div>
          <p class="value-desc">Pembinaan karakter tenaga kesehatan yang jujur, amanah, beretika profesional, dan berdedikasi tinggi bagi masyarakat.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
        <div class="value-card">
          <div class="value-icon-wrap"><i class="bi bi-award-fill"></i></div>
          <div class="value-title">Sertifikasi Pendamping</div>
          <p class="value-desc">Kesempatan memperoleh Surat Keterangan Pendamping Ijazah (SKPI) dan sertifikasi kompetensi K3 BNSP/Kemnaker.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     6. FASILITAS & LABORATORIUM
═══════════════════════════════════════════════ -->
<section class="section-bg-sand" id="fasilitas">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Sarana Kampus</div>
      <h2 class="section-title">Fasilitas & <em>Laboratorium Modern</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Menunjang proses riset dan praktikum mahasiswa dengan sarana pengujian berteknologi mutakhir.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="fasilitas-box">
          <div class="fasilitas-icon"><i class="bi bi-shield-check"></i></div>
          <h4 class="fw-bold mb-2">Lab K3 & Higiene Industri</h4>
          <p class="text-muted small mb-0">Alat uji intensitas cahaya (Lux meter), kebisingan (Sound Level Meter), gas detektor, dan pengukuran getaran kerja.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="fasilitas-box">
          <div class="fasilitas-icon"><i class="bi bi-droplet-half"></i></div>
          <h4 class="fw-bold mb-2">Lab Kesehatan Lingkungan</h4>
          <p class="text-muted small mb-0">Uji parameter kualitas air bersih, spektrofotometer, inkubator BOD/COD, dan pengujian mikrobiologi bakteri E. coli.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="fasilitas-box">
          <div class="fasilitas-icon"><i class="bi bi-heart-pulse"></i></div>
          <h4 class="fw-bold mb-2">Ruang Simulasi & Praktikum</h4>
          <p class="text-muted small mb-0">Fasilitas simulasi tanggap darurat pertolongan pertama (P3K), penanganan kecelakaan kerja, dan evakuasi.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
        <div class="fasilitas-box">
          <div class="fasilitas-icon"><i class="bi bi-journal-bookmark-fill"></i></div>
          <h4 class="fw-bold mb-2">Perpustakaan & Ruang Riset</h4>
          <p class="text-muted small mb-0">Ribuan koleksi buku teks kesehatan, jurnal internasional terindeks Scopus/SINTA, dan akses e-library 24 jam.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
        <div class="fasilitas-box">
          <div class="fasilitas-icon"><i class="bi bi-display"></i></div>
          <h4 class="fw-bold mb-2">Smart Classroom</h4>
          <p class="text-muted small mb-0">Ruang kuliah ber-AC dilengkapi multimedia proyektor interaktif dan koneksi internet serat optik kecepatan tinggi.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
        <div class="fasilitas-box">
          <div class="fasilitas-icon"><i class="bi bi-people-fill"></i></div>
          <h4 class="fw-bold mb-2">Auditorium & Ruang Seminar</h4>
          <p class="text-muted small mb-0">Gedung pertemuan representatif untuk penyelenggaraan seminar nasional, kuliah umum pakar, dan wisuda.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     7. AKADEMIK, PENELITIAN & PENGABDIAN
═══════════════════════════════════════════════ -->
<section class="section-bg-white">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6" data-aos="fade-right">
        <div class="section-label">Tri Dharma Perguruan Tinggi</div>
        <h2 class="section-title">Inovasi Riset & <em>Pengabdian Masyarakat</em></h2>
        <div class="divider-line"></div>
        <p class="section-desc mb-4" style="text-align: justify;">
          Dosen dan mahasiswa FIKES UIS aktif menghasilkan riset terapan yang dipublikasikan pada jurnal ilmiah bereputasi, serta melaksanakan program pengabdian masyarakat untuk memecahkan persoalan sanitasi dan keselamatan kerja.
        </p>

        <div class="row g-3">
          <div class="col-sm-6">
            <div class="p-3 rounded-3 bg-light border">
              <div class="fw-bold text-dark mb-1"><i class="bi bi-journal-check text-primary me-2" style="color:var(--fikes-purple) !important;"></i>Riset Terapan</div>
              <p class="text-muted small mb-0">Fokus riset ergonomi industri maritim dan sanitasi pesisir.</p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="p-3 rounded-3 bg-light border">
              <div class="fw-bold text-dark mb-1"><i class="bi bi-globe-americas text-warning me-2" style="color:var(--fikes-orange) !important;"></i>Publikasi SINTA</div>
              <p class="text-muted small mb-0">Publikasi rutin di jurnal nasional terakreditasi dan prosiding.</p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="p-3 rounded-3 bg-light border">
              <div class="fw-bold text-dark mb-1"><i class="bi bi-heart-pulse-fill text-danger me-2"></i>Pengmas Berkelanjutan</div>
              <p class="text-muted small mb-0">Edukasi K3 bagi pekerja UMKM dan pemeriksaan sanitasi warga.</p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="p-3 rounded-3 bg-light border">
              <div class="fw-bold text-dark mb-1"><i class="bi bi-handshake-fill text-success me-2"></i>Kerja Sama Riset</div>
              <p class="text-muted small mb-0">Kolaborasi penelitian bersama instansi pemerintah & swasta.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left">
        <div class="p-4 p-md-5 rounded-4 shadow-sm" style="background: var(--obsidian-dark); color: white;">
          <h4 class="fw-bold text-white mb-3"><i class="bi bi-lightbulb-fill text-warning me-2"></i>Agenda Ilmiah & Seminar</h4>
          <p class="text-white-50 small mb-4" style="line-height: 1.7;">
            FIKES UIS secara berkala menyelenggarakan Konferensi Nasional K3 dan Lingkungan Hidup, mengundang narasumber pakar dari Kemnaker, Kementerian Kesehatan, dan praktisi industri global.
          </p>
          <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('homepage.news') }}" class="btn-primary-hero" style="font-size: 13px; padding: 10px 20px;">
              <i class="bi bi-newspaper"></i> Lihat Publikasi & Berita
            </a>
            <a href="{{ route('homepage.galeri') }}" class="btn-outline-hero" style="font-size: 13px; padding: 10px 20px;">
              <i class="bi bi-images"></i> Galeri Kegiatan
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     8. DOSEN & TENAGA PENGAJAR
═══════════════════════════════════════════════ -->
<section class="section-bg-sand" id="dosen">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Tenaga Pendidik</div>
      <h2 class="section-title">Dosen & <em>Pakar Akademik</em> FIKES UIS</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Dibimbing langsung oleh para pakar berpengalaman yang memiliki sertifikasi keahlian nasional dan publikasi ilmiah terkemuka.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <div class="dosen-card">
          <div class="dosen-avatar"><i class="bi bi-person-fill"></i></div>
          <div class="dosen-name">Dosen Bidang K3</div>
          <div class="dosen-bidang">Spesialis Ergonomi & SMK3</div>
          <p class="dosen-pub">Ahli K3 Umum & Auditor ISO 45001 Kemnaker RI.</p>
        </div>
      </div>

      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
        <div class="dosen-card">
          <div class="dosen-avatar"><i class="bi bi-person-fill"></i></div>
          <div class="dosen-name">Dosen Higiene Industri</div>
          <div class="dosen-bidang">Toksikologi & Bahaya Fisik</div>
          <p class="dosen-pub">Pengalaman 15+ tahun di industri manufaktur & galangan.</p>
        </div>
      </div>

      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="dosen-card">
          <div class="dosen-avatar"><i class="bi bi-person-fill"></i></div>
          <div class="dosen-name">Dosen Kesehatan Lingkungan</div>
          <div class="dosen-bidang">AMDAL & Pengolahan Limbah B3</div>
          <p class="dosen-pub">Konsultan AMDAL bersertifikasi & Penilai KLHK.</p>
        </div>
      </div>

      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
        <div class="dosen-card">
          <div class="dosen-avatar"><i class="bi bi-person-fill"></i></div>
          <div class="dosen-name">Dosen Sanitasi Industri</div>
          <div class="dosen-bidang">Kualitas Air & Vektor Penyakit</div>
          <p class="dosen-pub">Peneliti mikrobiologi lingkungan & epidemiologi terapan.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     9. STUDENT LIFE & PRESTASI
═══════════════════════════════════════════════ -->
<section class="section-bg-white">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Aktivitas Mahasiswa</div>
      <h2 class="section-title">Student Life & <em>Prestasi Civitas</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Wadah pengembangan bakat, kepemimpinan, dan kreativitas mahasiswa melalui beragam organisasi dan kompetisi.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="p-4 rounded-4 bg-light border text-center h-100">
          <div class="feature-icon-wrap mx-auto"><i class="bi bi-diagram-3-fill"></i></div>
          <h4 class="fw-bold mb-2">Organisasi Mahasiswa</h4>
          <p class="text-muted small">Badan Eksekutif Mahasiswa (BEM) FIKES, HIMA K3, HIMA Kesling, dan berbagai Unit Kegiatan Mahasiswa (UKM).</p>
        </div>
      </div>

      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="p-4 rounded-4 bg-light border text-center h-100">
          <div class="feature-icon-wrap mx-auto"><i class="bi bi-trophy-fill"></i></div>
          <h4 class="fw-bold mb-2">Prestasi & Kompetisi</h4>
          <p class="text-muted small">Juara lomba karya tulis ilmiah nasional bidang keselamatan kerja, poster kesehatan, dan debat mahasiswa.</p>
        </div>
      </div>

      <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="p-4 rounded-4 bg-light border text-center h-100">
          <div class="feature-icon-wrap mx-auto"><i class="bi bi-calendar-check-fill"></i></div>
          <h4 class="fw-bold mb-2">Field Trip & Kunjungan Industri</h4>
          <p class="text-muted small">Kunjungan studi langsung ke fasilitas kilang migas, pelabuhan internasional, dan instalasi pengolahan limbah.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     10. ALUMNI & KARIER
═══════════════════════════════════════════════ -->
<section class="section-bg-sand" id="alumni">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Kisah Sukses Alumni</div>
      <h2 class="section-title">Jejak Karir <em>Alumni FIKES UIS</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Lulusan FIKES UIS telah berkarier di berbagai perusahaan multinasional, BUMN, rumah sakit, dan lembaga pemerintahan.
      </p>
    </div>

    <div class="row g-4">
      @if(isset($testimonials) && $testimonials->count() > 0)
        @foreach($testimonials->take(3) as $index => $testi)
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
            <div class="testi-card">
              <div>
                <div class="testi-stars">
                  @for($s = 1; $s <= 5; $s++)
                    <i class="bi bi-star{{ $s <= $testi->bintang ? '-fill' : '' }}"></i>
                  @endfor
                </div>
                <p class="testi-text">"{{ $testi->pesan }}"</p>
              </div>
              <div class="testi-author">
                <div class="testi-avatar">{{ strtoupper(substr($testi->nama, 0, 1)) }}</div>
                <div>
                  <div class="testi-name">{{ $testi->nama }}</div>
                  <div class="testi-role">{{ $testi->pekerjaan ?? 'Alumni FIKES UIS' }}</div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>

    <div class="text-center mt-4">
      <a href="{{ route('homepage.testimoni') }}" class="btn-outline-hero" style="color: var(--fikes-purple); border-color: var(--fikes-purple);">
        <i class="bi bi-chat-heart"></i> Lihat Semua Ulasan Alumni
      </a>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     11. BERITA, PENGUMUMAN & AGENDA (LAYOUT BARU)
═══════════════════════════════════════════════ -->
<section class="section-bg-white py-5" id="berita">
  <div class="container py-3">
    <div class="row g-4 g-lg-5">
      
      {{-- KOLOM KIRI (BERITA): 2-KOLOM GRID --}}
      <div class="col-lg-8" data-aos="fade-right">
        {{-- Header Berita + Search Bar --}}
        <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-newspaper fs-2" style="color: var(--fikes-purple, #823ca2);"></i>
            <h2 class="section-heading-fikes mb-0">Berita</h2>
          </div>
          <form action="{{ route('homepage.news') }}" method="GET" class="news-search-pill">
            <input type="text" name="q" placeholder="Cari Berita Lainnya.." autocomplete="off">
            <button type="submit" aria-label="Cari Berita">
              <i class="bi bi-search"></i>
            </button>
          </form>
        </div>

        {{-- Grid Daftar Berita (2 Kolom) --}}
        <div class="row g-3">
          @if(isset($latestNews) && $latestNews->count() > 0)
            @foreach($latestNews as $news)
              <div class="col-sm-6">
                <a href="{{ route('homepage.news.detail', $news->id) }}" class="news-mini-item">
                  <div class="news-mini-img-wrap">
                    @if(!empty($news->thumbnail))
                      <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="news-mini-img">
                    @else
                      <div class="news-mini-fallback">
                        <i class="bi bi-newspaper"></i>
                      </div>
                    @endif
                  </div>
                  <div class="news-mini-content">
                    <h6 class="news-mini-title">{{ $news->title }}</h6>
                    <div class="news-mini-meta">
                      {{ $news->created_at ? $news->created_at->format('d F Y // H:i') : '-' }}
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          @else
            <div class="col-12 text-muted py-4 text-center">
              <p>Belum ada berita yang diterbitkan.</p>
            </div>
          @endif
        </div>

        {{-- Tombol Lihat Berita Lainnya --}}
        <div class="text-center mt-4 pt-2">
          <a href="{{ route('homepage.news') }}" class="btn-fikes-pill">
            Lihat Berita Lainnya
          </a>
        </div>
      </div>

      {{-- KOLOM KANAN (PENGUMUMAN & AGENDA) --}}
      <div class="col-lg-4" data-aos="fade-left">
        
        {{-- SECTION PENGUMUMAN --}}
        <div class="mb-4">
          <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bi bi-megaphone-fill fs-3" style="color: var(--fikes-purple, #823ca2);"></i>
            <h3 class="section-heading-fikes mb-0" style="font-size: 24px;">Pengumuman</h3>
          </div>

          <div class="announcement-list">
            @if(isset($announcements) && $announcements->count() > 0)
              @foreach($announcements as $ann)
                <a href="{{ route('homepage.news.detail', $ann->id) }}" class="announcement-card-box">
                  <div class="announcement-card-title">{{ $ann->title }}</div>
                  <div class="announcement-card-date">{{ $ann->created_at ? $ann->created_at->format('d F Y') : '-' }}</div>
                </a>
              @endforeach
            @else
              {{-- Default Item Pengumuman Fakultas --}}
              <div class="announcement-card-box">
                <div class="announcement-card-title">Pengumuman Pengisian KRS dan validasi KRS Tahun Akademik 2026/2027 Gasal</div>
                <div class="announcement-card-date">15 August 2026</div>
              </div>
              <div class="announcement-card-box">
                <div class="announcement-card-title">Pengumuman Semester Antara TA. 2025-2026</div>
                <div class="announcement-card-date">1 August 2026</div>
              </div>
            @endif
          </div>
        </div>

        {{-- SECTION AGENDA --}}
        <div class="mt-4 pt-3 border-top">
          <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bi bi-calendar4-week fs-3" style="color: var(--fikes-purple, #823ca2);"></i>
            <h3 class="section-heading-fikes mb-0" style="font-size: 24px;">Agenda</h3>
          </div>

          <div class="agenda-list">
            <div class="agenda-row mb-3">
              <div class="agenda-time-text">20 - 31 Juli 2026:</div>
              <div class="agenda-badge-card">
                Pendaftaran Semester Antara
              </div>
            </div>

            <div class="agenda-row mb-3">
              <div class="agenda-time-text">03 - 28 Agustus 2026:</div>
              <div class="agenda-badge-card">
                Perkuliahan Semester Antara
              </div>
            </div>

            <div class="agenda-row mb-3">
              <div class="agenda-time-text">31 Agustus - 05 September 2026:</div>
              <div class="agenda-badge-card">
                Penyerahan Nilai Semester Antara
              </div>
            </div>

            <div class="mt-3">
              <a href="{{ route('homepage.news', ['category' => 'Pengumuman & Agenda']) }}" class="btn-agenda-pill">
                Lihat Seluruh Agenda
              </a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     12. PMB BANNER (PENERIMAAN MAHASISWA BARU)
═══════════════════════════════════════════════ -->
@if(!isset($pmbSetting) || $pmbSetting->is_active)
<section class="section-bg-sand" id="pmb">
  <div class="container" data-aos="fade-up">
    <div class="pmb-cta-box">
      <div class="row align-items-center g-4">
        <div class="col-lg-8">
          <div class="badge px-3 py-2 rounded-pill mb-3" style="background: var(--fikes-orange); color: #190a24; font-weight: 800; font-size: 12px; letter-spacing: 1px;">
            {{ $pmbSetting->badge_text ?? 'PENERIMAAN MAHASISWA BARU (PMB) T.A. 2026/2027' }}
          </div>
          <h2 class="text-white fw-bold mb-3" style="font-size: 34px;">
            {{ $pmbSetting->judul ?? 'Daftar Sekarang & Raih Masa Depan Cerah Bersama FIKES UIS!' }}
          </h2>
          <p class="text-white-50 mb-4" style="line-height: 1.7; max-width: 620px;">
            {{ $pmbSetting->deskripsi ?? 'Tersedia berbagai jalur seleksi: Jalur Bebas Tes / Prestasi, Jalur Reguler, Jalur KIP-Kuliah, dan Jalur Alih Jenjang Karyawan.' }}
          </p>
          <div class="d-flex flex-wrap gap-3">
            @php
              $link1 = $pmbSetting->tombol_link_1 ?? route('homepage.kontak');
              if (!str_starts_with($link1, 'http') && !str_starts_with($link1, '/')) {
                  $link1 = '/' . $link1;
              }
            @endphp
            <a href="{{ $link1 }}" target="{{ str_starts_with($link1, 'http') ? '_blank' : '_self' }}" class="btn-primary-hero">
              <i class="bi bi-pencil-square"></i> {{ $pmbSetting->tombol_text_1 ?? 'Daftar PMB Sekarang' }}
            </a>

            @php
              $link2 = $pmbSetting->tombol_link_2 ?? '';
              if (empty($link2) && !empty($cleanWa)) {
                  $link2 = "https://wa.me/{$cleanWa}?text=" . urlencode("Halo Admin PMB FIKES UIS, saya ingin konsultasi pendaftaran mahasiswa baru");
              }
            @endphp
            @if(!empty($link2))
              <a href="{{ $link2 }}" target="_blank" class="btn-outline-hero">
                <i class="bi bi-whatsapp"></i> {{ $pmbSetting->tombol_text_2 ?? 'Konsultasi WhatsApp PMB' }}
              </a>
            @endif
          </div>
        </div>

        <div class="col-lg-4">
          <div class="p-4 rounded-4" style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15);">
            <h5 class="text-white fw-bold mb-3"><i class="bi bi-calendar-event text-warning me-2"></i>Jadwal Gelombang:</h5>
            <ul class="text-white-50 small list-unstyled mb-0" style="line-height: 2;">
              @php
                $waveList = $pmbSetting->waves ?? ['Gelombang 1: Jan - Apr', 'Gelombang 2: Mei - Jul', 'Gelombang 3: Agu - Sep'];
              @endphp
              @foreach($waveList as $waveItem)
                <li><i class="bi bi-check2 text-warning me-1"></i> {{ $waveItem }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<!-- ═══════════════════════════════════════════════
     13. PARTNER & KERJA SAMA
═══════════════════════════════════════════════ -->
@if(isset($partners) && $partners->count() > 0)
<section class="section-bg-white" id="mitra">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Jejaring Mitra</div>
      <h2 class="section-title">Mitra Kerjasama <em>Industri & Rumah Sakit</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        FIKES UIS bermitra dengan berbagai sektor industri terkemuka dalam penempatan magang klinis, riset, dan rekrutmen lulusan.
      </p>
    </div>

    <div class="row g-3 justify-content-center">
      @foreach($partners as $partner)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="fade-up">
          <div class="partner-logo-box">
            @if($partner->logo)
              <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->nama }}" class="partner-logo-img">
            @else
              <span class="fw-bold text-muted small text-center" style="font-size: 11.5px;">{{ $partner->nama }}</span>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- ═══════════════════════════════════════════════
     14. FAQ (FREQUENTLY ASKED QUESTIONS)
═══════════════════════════════════════════════ -->
<section class="section-bg-sand" id="faq">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Tanya Jawab</div>
      <h2 class="section-title">Pertanyaan yang Sering <em>Diajukan</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Jawaban seputar program studi, biaya perkuliahan, fasilitas laboratorium, dan prospek karir di FIKES UIS.
      </p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-9" data-aos="fade-up">
        <div class="accordion" id="homeFaqAccordion">
          @if(isset($faqs) && $faqs->count() > 0)
            @foreach($faqs->take(5) as $index => $faq)
              <div class="accordion-item shadow-sm">
                <h2 class="accordion-header" id="headingH{{ $faq->id ?? $index }}">
                  <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseH{{ $faq->id ?? $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                    <i class="bi bi-question-circle-fill me-2" style="color: var(--fikes-purple);"></i>
                    {{ $faq->question ?? $faq->pertanyaan }}
                  </button>
                </h2>
                <div id="collapseH{{ $faq->id ?? $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#homeFaqAccordion">
                  <div class="accordion-body">
                    {{ $faq->answer ?? $faq->jawaban }}
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>

        <div class="text-center mt-4">
          <a href="{{ route('homepage.faq') }}" class="btn-outline-hero" style="color: var(--fikes-purple); border-color: var(--fikes-purple);">
            <i class="bi bi-question-circle"></i> Lihat Semua FAQ & Bantuan
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
