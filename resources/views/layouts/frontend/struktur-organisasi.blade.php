@extends('layouts.frontend.template')

@section('title', 'Struktur Organisasi — PT Berkarya Jasa Inspeksi (BJI)')
@section('meta_description', 'Lihat susunan struktur organisasi PT Berkarya Jasa Inspeksi (BJI) — tim manajemen dan jajaran kepemimpinan yang berpengalaman di bidang K3.')
@section('meta_keywords', 'struktur organisasi bji, manajemen pt berkarya jasa inspeksi, jajaran direksi k3')

@section('content')

<!-- ═══════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════ -->
<div class="about-hero">
  <div class="about-hero-bg"></div>
  <div class="about-hero-overlay"></div>
  <div class="about-hero-pattern"></div>

  <div class="container">
    <div class="about-hero-content" data-aos="fade-up" data-aos-duration="800">
      <h1 class="about-hero-title">
        Struktur <em>Organisasi</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}"><i class="bi bi-house-fill me-1"></i>Beranda</a>
        <span class="sep">/</span>
        <span class="active">Struktur Organisasi</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     STRUKTUR ORGANISASI SECTION
═══════════════════════════════════════════════ -->
<section class="section-bg-sand" style="padding: 80px 0 100px;">
  <div class="container">

    <!-- Section Header -->
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Struktur Organisasi</div>
      <h2 class="section-title">Susunan <em>Organisasi</em> Kami</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto mt-3" style="max-width: 600px;">
        Struktur organisasi yang solid adalah fondasi dari layanan K3 berkualitas tinggi yang kami berikan kepada klien.
      </p>
    </div>

    <!-- Organizational Chart Image or Empty State -->
    <div data-aos="zoom-in" data-aos-delay="100">
      @if(isset($struktur) && $struktur->url_struktur)
        <div class="text-center">
          <div class="struktur-page-img-wrap mx-auto">
            <img
              src="{{ asset($struktur->url_struktur) }}"
              alt="Struktur Organisasi PT Berkarya Jasa Inspeksi"
              class="img-fluid rounded-4 shadow"
              style="max-width: 900px; width: 100%;"
            >
          </div>
        </div>
      @else
        <div class="text-center py-5">
          <div class="empty-state-icon mx-auto mb-4">
            <i class="bi bi-diagram-3"></i>
          </div>
          <h4 class="fw-bold" style="color: var(--charcoal);">Sedang Diperbarui</h4>
          <p class="text-muted" style="max-width: 420px; margin: 12px auto 0;">
            Struktur organisasi kami sedang dalam proses pembaruan. Silakan kunjungi kembali atau hubungi kami untuk informasi lebih lanjut.
          </p>
          <a href="{{ route('homepage.kontak') }}" class="btn mt-4" style="background: var(--terracotta); color: white; border-radius: 10px; padding: 12px 28px; font-weight: 600;">
            <i class="bi bi-envelope me-2"></i>Hubungi Kami
          </a>
        </div>
      @endif
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════
     CTA SECTION
═══════════════════════════════════════════════ -->
<section style="background: linear-gradient(135deg, var(--charcoal) 0%, #001540 100%); padding: 70px 0;">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-8" data-aos="fade-right">
        <div class="section-label" style="justify-content: flex-start; color: var(--clay);">
          <span class="label-line" style="background: var(--clay);"></span>
          Bergabung Bersama Kami
        </div>
        <h2 class="section-title mt-2" style="color: white;">
          Ingin Menjadi Bagian dari <em style="color: var(--clay);">Tim BJI</em>?
        </h2>
        <p style="color: rgba(255,255,255,0.6); font-size: 15px; line-height: 1.75; max-width: 520px; margin-top: 14px;">
          PT Berkarya Jasa Inspeksi selalu mencari profesional K3 yang berdedikasi untuk bergabung dalam tim kami yang terus berkembang.
        </p>
      </div>
      <div class="col-lg-4 text-lg-end" data-aos="fade-left">
        <a href="{{ route('homepage.kontak') }}" class="btn" style="background: var(--terracotta); color: white; border-radius: 12px; padding: 14px 32px; font-weight: 700; font-size: 15px; display: inline-flex; align-items: center; gap: 10px; text-decoration: none;">
          <i class="bi bi-people-fill"></i>
          Hubungi HR Kami
        </a>
      </div>
    </div>
  </div>
</section>

@endsection

@push('styles')
<style>
  /* ─── Hero Reuse ─── */
  .about-hero {
    position: relative;
    min-height: 300px;
    display: flex;
    align-items: center;
    overflow: hidden;
    padding: 80px 0 60px;
  }
  .about-hero-bg {
    position: absolute; inset: 0;
    background: linear-gradient(135deg, var(--charcoal) 0%, #001540 60%, #003080 100%);
    z-index: 0;
  }
  .about-hero-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.15) 0%, rgba(0,0,0,0) 100%);
    z-index: 1;
  }
  .about-hero-pattern {
    display: none;
  }
  .about-hero-content {
    position: relative;
    z-index: 10;
  }
  .about-hero-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: clamp(34px, 5vw, 56px);
    font-weight: 900;
    color: white;
    letter-spacing: -1.5px;
    line-height: 1.1;
    margin-bottom: 20px;
  }
  .about-hero-title em {
    font-style: normal;
    color: var(--clay);
  }
  .breadcrumb-custom {
    display: flex; align-items: center; gap: 10px;
    font-size: 13.5px; color: rgba(255,255,255,0.45);
  }
  .breadcrumb-custom a { color: rgba(255,255,255,0.55); text-decoration: none; transition: color 0.2s; }
  .breadcrumb-custom a:hover { color: var(--clay); }
  .breadcrumb-custom .sep { color: rgba(255,255,255,0.2); }
  .breadcrumb-custom .active { color: var(--clay); }

  /* ─── Struktur Section ─── */
  .section-bg-sand { background: var(--sand); }

  .struktur-page-img-wrap {
    background: white;
    border-radius: 20px;
    padding: 28px;
    box-shadow: 0 12px 48px rgba(0, 32, 96, 0.12);
    display: inline-block;
  }

  /* ─── Empty State ─── */
  .empty-state-icon {
    width: 100px; height: 100px;
    background: rgba(0, 144, 223, 0.08);
    border-radius: 24px;
    display: flex; align-items: center; justify-content: center;
  }
  .empty-state-icon i {
    font-size: 44px;
    color: var(--clay);
  }

  /* ─── Section utilities reused ─── */
  .section-label {
    display: inline-flex; align-items: center; gap: 10px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 11px; font-weight: 700;
    letter-spacing: 2px; text-transform: uppercase;
    color: var(--terracotta);
    margin-bottom: 10px;
  }
  .label-line {
    width: 28px; height: 2px;
    background: var(--terracotta);
    border-radius: 2px;
    flex-shrink: 0;
  }
  .section-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: clamp(26px, 3.5vw, 40px);
    font-weight: 800;
    color: var(--charcoal);
    letter-spacing: -1px;
    line-height: 1.15;
  }
  .section-title em {
    font-style: normal;
    color: var(--terracotta);
  }
  .section-desc {
    color: var(--muted);
    font-size: 15.5px;
    line-height: 1.75;
  }
  .divider-line {
    height: 3px; width: 40px;
    background: var(--terracotta);
    border-radius: 2px;
    margin-top: 12px;
  }
  .divider-line.centered { margin-left: auto; margin-right: auto; }
</style>
@endpush
