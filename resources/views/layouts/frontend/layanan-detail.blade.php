@extends('layouts.frontend.template')

@section('title', $layanan->judul . ' — PT Berkarya Jasa Inspeksi (BJI)')
@section('meta_description', $layanan->deskripsi)
@section('meta_keywords', 'riksa uji k3, ' . strtolower($layanan->judul) . ', berkarya jasa inspeksi, PJK3')

@section('content')
@php
  $rincianItems = $layanan->rincian
    ? array_filter(array_map('trim', explode("\n", $layanan->rincian)))
    : [];
  $colors = ['#0090DF', '#DA251D', '#76C143', '#002060', '#E86A1F', '#9B59B6'];
@endphp

<!-- ═══════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════ -->
<div class="layanan-hero">
  <div class="layanan-hero-bg"></div>
  <div class="layanan-hero-overlay"></div>
  <div class="layanan-hero-pattern"></div>
  <div class="container">
    <div class="layanan-hero-content" data-aos="fade-up" data-aos-duration="700">
      <h1 class="layanan-hero-title">{{ $layanan->judul }}</h1>
      <div class="breadcrumb-custom" style="justify-content: center;">
        <a href="{{ route('homepage') }}"><i class="bi bi-house-fill me-1"></i>Beranda</a>
        <span class="sep">/</span>
        <a href="{{ route('homepage.layanan') }}">Layanan</a>
        <span class="sep">/</span>
        <span class="active">{{ $layanan->judul }}</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     MAIN CONTENT
═══════════════════════════════════════════════ -->
<section style="padding: 70px 0 90px; background: var(--cream);">
  <div class="container">
    <div class="row g-5">

      <!-- LEFT: Sidebar Navigation -->
      <div class="col-lg-3" data-aos="fade-right">
        <div class="ld-sidebar">
          <div class="ld-sidebar-title">
            <i class="bi bi-list-task me-2"></i>Layanan Kami
          </div>
          <ul class="ld-sidebar-list">
            @foreach($layanans as $item)
              <li>
                <a href="{{ route('homepage.layanan.detail', $item->id) }}"
                   class="ld-sidebar-link {{ $item->id === $layanan->id ? 'active' : '' }}">
                  <i class="bi {{ $item->icon }} me-2"></i>
                  {{ $item->judul }}
                  @if($item->id === $layanan->id)
                    <i class="bi bi-chevron-right ms-auto"></i>
                  @endif
                </a>
              </li>
            @endforeach
          </ul>
          <div class="ld-sidebar-cta">
            <p class="ld-cta-label">Butuh Konsultasi?</p>
            <a href="{{ route('homepage.kontak') }}" class="ld-cta-btn">
              <i class="bi bi-telephone-fill me-2"></i>Hubungi Kami
            </a>
          </div>
        </div>
      </div>

      <!-- RIGHT: Detail Content -->
      <div class="col-lg-9">

        <!-- Header Card -->
        <div class="ld-header-card" data-aos="fade-left">
          <div class="ld-header-icon">
            <i class="bi {{ $layanan->icon }}"></i>
          </div>
          <div>
            <h2 class="ld-title">{{ $layanan->judul }}</h2>
            @if($layanan->dasar_hukum)
              <div class="ld-badges">
                @foreach(array_filter(array_map('trim', explode('&', $layanan->dasar_hukum))) as $hukum)
                  <span class="ld-badge">{{ $hukum }}</span>
                @endforeach
              </div>
            @endif
          </div>
        </div>

        <!-- Description -->
        <div class="ld-desc-card" data-aos="fade-up" data-aos-delay="100">
          <p class="ld-desc-text">{{ $layanan->deskripsi }}</p>
        </div>

        <!-- Rincian Items -->
        @if(count($rincianItems))
          <div data-aos="fade-up" data-aos-delay="150">
            <div class="ld-section-label">
              <i class="bi bi-card-checklist me-2"></i>Ruang Lingkup Layanan
            </div>
            <div class="ld-rincian-grid">
              @foreach($rincianItems as $i => $item)
                @php $color = $colors[$i % count($colors)]; @endphp
                <div class="ld-rincian-item">
                  <div class="ld-rincian-marker" style="background: {{ $color }};"></div>
                  <p class="ld-rincian-text">{{ $item }}</p>
                </div>
              @endforeach
            </div>
          </div>
        @endif

        <!-- Why Choose Us -->
        <div class="ld-why-section" data-aos="fade-up" data-aos-delay="200">
          <div class="ld-section-label"><i class="bi bi-patch-check me-2"></i>Keunggulan BJI</div>
          <div class="row g-3 mt-1">
            <div class="col-sm-6 col-md-4">
              <div class="ld-why-card">
                <div class="ld-why-icon" style="background: rgba(0,144,223,0.1); color: #0090DF;">
                  <i class="bi bi-award-fill"></i>
                </div>
                <div class="ld-why-text">Terakreditasi & bersertifikat sesuai standar Kemnaker</div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="ld-why-card">
                <div class="ld-why-icon" style="background: rgba(118,193,67,0.1); color: #76C143;">
                  <i class="bi bi-people-fill"></i>
                </div>
                <div class="ld-why-text">Tenaga ahli K3 berpengalaman dan tersertifikasi</div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="ld-why-card">
                <div class="ld-why-icon" style="background: rgba(218,37,29,0.1); color: #DA251D;">
                  <i class="bi bi-file-earmark-check-fill"></i>
                </div>
                <div class="ld-why-text">Laporan resmi & dokumen teknis lengkap</div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="ld-why-card">
                <div class="ld-why-icon" style="background: rgba(0,32,96,0.08); color: #002060;">
                  <i class="bi bi-clock-fill"></i>
                </div>
                <div class="ld-why-text">Proses cepat & tepat waktu sesuai jadwal</div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="ld-why-card">
                <div class="ld-why-icon" style="background: rgba(232,106,31,0.1); color: #E86A1F;">
                  <i class="bi bi-tools"></i>
                </div>
                <div class="ld-why-text">Peralatan uji modern dan terkalibrasi</div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="ld-why-card">
                <div class="ld-why-icon" style="background: rgba(155,89,182,0.1); color: #9B59B6;">
                  <i class="bi bi-headset"></i>
                </div>
                <div class="ld-why-text">Konsultasi & dukungan purna layanan</div>
              </div>
            </div>
          </div>
        </div>

        <!-- CTA -->
        <div class="ld-cta-full" data-aos="fade-up" data-aos-delay="250">
          <div class="row align-items-center g-3">
            <div class="col-md-7">
              <h4 class="ld-cta-title">Siap Menggunakan Layanan Ini?</h4>
              <p class="ld-cta-sub">Hubungi tim kami untuk konsultasi gratis dan penawaran terbaik sesuai kebutuhan Anda.</p>
            </div>
            <div class="col-md-5 text-md-end">
              <a href="{{ route('homepage.kontak') }}" class="ld-cta-main-btn">
                <i class="bi bi-envelope-fill me-2"></i>Minta Penawaran
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection

@push('styles')
<style>
  /* ── Sidebar ── */
  .ld-sidebar {
    background: var(--white);
    border-radius: 20px;
    border: 1px solid var(--border);
    overflow: hidden;
    position: sticky;
    top: 90px;
    box-shadow: 0 4px 24px rgba(0,32,96,0.06);
  }
  .ld-sidebar-title {
    background: linear-gradient(135deg, var(--charcoal), #001a4e);
    color: white;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12.5px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    padding: 16px 20px;
  }
  .ld-sidebar-list {
    list-style: none;
    margin: 0;
    padding: 8px 0;
  }
  .ld-sidebar-link {
    display: flex;
    align-items: center;
    padding: 10px 20px;
    font-size: 13px;
    font-weight: 500;
    color: var(--muted);
    text-decoration: none;
    transition: all 0.2s;
    border-left: 3px solid transparent;
  }
  .ld-sidebar-link:hover {
    background: var(--sand);
    color: var(--charcoal);
    border-left-color: var(--clay);
  }
  .ld-sidebar-link.active {
    background: rgba(218,37,29,0.06);
    color: var(--terracotta);
    font-weight: 700;
    border-left-color: var(--terracotta);
  }
  .ld-sidebar-cta {
    border-top: 1px solid var(--border);
    padding: 18px 20px;
    background: var(--cream);
  }
  .ld-cta-label {
    font-size: 12px;
    color: var(--muted);
    margin-bottom: 10px;
  }
  .ld-cta-btn {
    display: block;
    text-align: center;
    background: var(--terracotta);
    color: white;
    border-radius: 10px;
    padding: 10px 16px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.2s;
  }
  .ld-cta-btn:hover {
    background: var(--terracotta-dk);
    color: white;
    transform: translateY(-2px);
  }

  /* ── Header Card ── */
  .ld-header-card {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    background: var(--white);
    border-radius: 20px;
    padding: 28px 30px;
    border: 1px solid var(--border);
    margin-bottom: 20px;
    box-shadow: 0 4px 20px rgba(0,32,96,0.05);
  }
  .ld-header-icon {
    width: 64px;
    height: 64px;
    flex-shrink: 0;
    border-radius: 16px;
    background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 30px;
    box-shadow: 0 6px 18px rgba(218,37,29,0.3);
  }
  .ld-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: clamp(20px, 2.8vw, 28px);
    font-weight: 800;
    color: var(--charcoal);
    letter-spacing: -0.5px;
    margin: 0 0 12px;
    line-height: 1.2;
  }
  .ld-badges { display: flex; flex-wrap: wrap; gap: 8px; }
  .ld-badge {
    display: inline-block;
    font-size: 11.5px;
    font-weight: 600;
    background: rgba(0,144,223,0.1);
    color: var(--clay);
    border: 1px solid rgba(0,144,223,0.25);
    border-radius: 50px;
    padding: 4px 12px;
  }

  /* ── Description ── */
  .ld-desc-card {
    background: linear-gradient(135deg, rgba(0,32,96,0.03), rgba(0,144,223,0.04));
    border-left: 4px solid var(--clay);
    border-radius: 12px;
    padding: 20px 24px;
    margin-bottom: 28px;
  }
  .ld-desc-text {
    font-size: 15px;
    line-height: 1.8;
    color: var(--charcoal);
    margin: 0;
  }

  /* ── Section Label ── */
  .ld-section-label {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    color: var(--charcoal);
    margin-bottom: 16px;
    display: flex;
    align-items: center;
  }
  .ld-section-label i { color: var(--terracotta); }

  /* ── Rincian Grid ── */
  .ld-rincian-grid {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 32px;
  }
  .ld-rincian-item {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 14px 18px;
    transition: all 0.2s;
  }
  .ld-rincian-item:hover {
    transform: translateX(4px);
    box-shadow: 0 4px 16px rgba(0,32,96,0.07);
  }
  .ld-rincian-marker {
    width: 6px;
    min-width: 6px;
    border-radius: 3px;
    align-self: stretch;
    margin-top: 2px;
  }
  .ld-rincian-text {
    font-size: 14px;
    color: var(--charcoal);
    line-height: 1.65;
    margin: 0;
  }

  /* ── Why Section ── */
  .ld-why-section { margin-bottom: 32px; }
  .ld-why-card {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 16px;
    height: 100%;
    transition: all 0.2s;
  }
  .ld-why-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,32,96,0.08);
  }
  .ld-why-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
  }
  .ld-why-text {
    font-size: 13px;
    line-height: 1.6;
    color: var(--charcoal);
    margin: 0;
    font-weight: 500;
  }

  /* ── CTA Full ── */
  .ld-cta-full {
    background: linear-gradient(135deg, var(--charcoal) 0%, #001a50 100%);
    border-radius: 20px;
    padding: 32px 36px;
    color: white;
  }
  .ld-cta-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 20px;
    font-weight: 800;
    color: white;
    margin-bottom: 8px;
    letter-spacing: -0.3px;
  }
  .ld-cta-sub {
    font-size: 14px;
    color: rgba(255,255,255,0.6);
    margin: 0;
    line-height: 1.6;
  }
  .ld-cta-main-btn {
    display: inline-flex;
    align-items: center;
    background: var(--terracotta);
    color: white;
    border-radius: 12px;
    padding: 14px 28px;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.2s;
    white-space: nowrap;
  }
  .ld-cta-main-btn:hover {
    background: var(--terracotta-lt);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(218,37,29,0.35);
  }

  /* ── Hero reuse ── */
  .layanan-hero {
    position: relative;
    min-height: 260px;
    display: flex;
    align-items: center;
    overflow: hidden;
    padding: 70px 0 50px;
  }

  @media (max-width: 768px) {
    .ld-header-card { flex-direction: column; }
    .ld-cta-full { padding: 24px 20px; }
    .ld-sidebar { position: static; margin-bottom: 30px; }
  }
</style>
@endpush
