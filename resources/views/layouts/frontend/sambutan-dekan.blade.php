@extends('layouts.frontend.template')

@section('title', 'Sambutan Dekan — Fakultas Ilmu Kesehatan (FIKES UIS)')
@section('meta_description', 'Sambutan resmi Dekan Fakultas Ilmu Kesehatan (FIKES) Universitas Ibnu Sina.')
@section('meta_keywords', 'sambutan dekan fikes, dekan fikes uis, pimpinan fakultas ilmu kesehatan')

@push('styles')
<style>
  .dekan-hero {
    position: relative;
    background: var(--obsidian-dark);
    padding: 70px 0 50px;
    border-bottom: 2px solid var(--fikes-purple);
  }
  .dekan-hero-title {
    font-size: 38px;
    font-weight: 800;
    color: var(--white);
    margin-bottom: 8px;
  }
  .dekan-hero-title em {
    font-style: normal;
    color: var(--fikes-orange);
  }
  .breadcrumb-custom {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 13.5px;
    color: rgba(255, 255, 255, 0.6);
  }
  .breadcrumb-custom a { color: rgba(255, 255, 255, 0.85); text-decoration: none; }
  .breadcrumb-custom a:hover { color: var(--fikes-orange); }
  .breadcrumb-custom .active { color: var(--fikes-orange); font-weight: 600; }

  /* Dekan Card */
  .dekan-portrait-box {
    background: var(--white);
    border: 1px solid var(--border-light);
    border-radius: 24px;
    padding: 28px;
    box-shadow: var(--shadow-md);
    text-align: center;
    position: sticky;
    top: 90px;
  }
  .dekan-portrait-img {
    width: 100%;
    max-width: 280px;
    height: 340px;
    object-fit: cover;
    border-radius: 18px;
    margin-bottom: 20px;
    box-shadow: var(--shadow-sm);
    border: 3px solid var(--fikes-purple-light);
  }
  .dekan-avatar-fallback {
    width: 100%;
    max-width: 280px;
    height: 340px;
    margin: 0 auto 20px;
    background: linear-gradient(135deg, var(--fikes-purple) 0%, #47175d 100%);
    color: #ffffff;
    border-radius: 18px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-size: 80px;
  }
  .dekan-name-title {
    font-size: 20px;
    font-weight: 800;
    color: var(--text-main);
    line-height: 1.3;
    margin-bottom: 6px;
  }
  .dekan-role-badge {
    display: inline-block;
    background: var(--fikes-purple-light);
    color: var(--fikes-purple);
    font-size: 13px;
    font-weight: 700;
    padding: 5px 16px;
    border-radius: 50px;
    margin-bottom: 15px;
  }
  .dekan-quote-callout {
    background: var(--fikes-purple-light);
    border-left: 4px solid var(--fikes-purple);
    border-radius: 0 16px 16px 0;
    padding: 20px 24px;
    font-style: italic;
    color: #3b284c;
    font-size: 15.5px;
    line-height: 1.8;
    margin-bottom: 28px;
  }
  .sambutan-content-body {
    font-size: 15.5px;
    line-height: 1.9;
    color: #334155;
    text-align: justify;
  }
  .sambutan-content-body p {
    margin-bottom: 18px;
  }
</style>
@endpush

@section('content')

<!-- ═══════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════ -->
<div class="dekan-hero">
  <div class="container">
    <div data-aos="fade-up">
      <h1 class="dekan-hero-title">
        Sambutan <em>Dekan</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}"><i class="bi bi-house-fill me-1"></i>Beranda</a>
        <span>/</span>
        <a href="{{ route('homepage.tentang') }}">Profil</a>
        <span>/</span>
        <span class="active">Sambutan Dekan</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     SAMBUTAN DEKAN CONTENT
═══════════════════════════════════════════════ -->
<section class="section-bg-white py-5">
  <div class="container py-3">
    <div class="row g-5">

      {{-- Left Column: Dekan Portrait --}}
      <div class="col-lg-4" data-aos="fade-right">
        <div class="dekan-portrait-box">
          @if(!empty($sambutanDekan?->foto_dekan))
            <img src="{{ asset('storage/' . $sambutanDekan->foto_dekan) }}" alt="{{ $sambutanDekan->nama_dekan ?? 'Dekan FIKES UIS' }}" class="dekan-portrait-img">
          @else
            <div class="dekan-avatar-fallback">
              <i class="bi bi-person-circle"></i>
              <span style="font-size: 14px; font-weight: 600; margin-top: 10px;">Foto Dekan</span>
            </div>
          @endif

          <h3 class="dekan-name-title">{{ $sambutanDekan->nama_dekan ?? 'Pimpinan Dekanat FIKES UIS' }}</h3>
          <span class="dekan-role-badge">
            <i class="bi bi-award-fill me-1"></i> {{ $sambutanDekan->jabatan_dekan ?? 'Dekan Fakultas Ilmu Kesehatan' }}
          </span>

          <div class="pt-3 border-top mt-3 text-muted small text-start">
            <div class="mb-2"><i class="bi bi-mortarboard me-2 text-primary"></i> Universitas Ibnu Sina (UIS) Batam</div>
            <div><i class="bi bi-geo-alt me-2 text-danger"></i> Kampus Utama FIKES UIS</div>
          </div>
        </div>
      </div>

      {{-- Right Column: Full Message --}}
      <div class="col-lg-8" data-aos="fade-left">
        <div class="section-label">Amanat & Sambutan Resmi</div>
        <h2 class="section-title mb-4">
          Membangun Generasi Kesehatan <em>Profesional, Humanis & Berintegritas</em>
        </h2>

        {{-- Kutipan Singkat --}}
        <div class="dekan-quote-callout">
          <i class="bi bi-quote fs-3 d-block mb-1" style="color: var(--fikes-purple);"></i>
          "{{ strip_tags($sambutanDekan->kutipan_singkat ?? ($sambutanDekan->sambutan_dekan ?? 'Selamat datang di Fakultas Ilmu Kesehatan Universitas Ibnu Sina. Kami bertekad membentuk generasi tenaga kesehatan yang tidak hanya unggul secara akademis dan terampil dalam praktik industri, namun juga memiliki integritas moral dan etika luhur dalam mengabdi kepada bangsa.')) }}"
        </div>

        {{-- Isi Lengkap Sambutan --}}
        <div class="sambutan-content-body" style="line-height: 1.85; font-size: 15.5px; color: #334155;">
          @if(!empty($sambutanDekan?->sambutan_dekan))
            {!! $sambutanDekan->sambutan_dekan !!}
          @else
            <p>
              <em>Assalamu’alaikum Warahmatullahi Wabarakatuh,</em><br>
              Salam sejahtera untuk kita semua.
            </p>
            <p>
              Puji dan syukur senantiasa kita panjatkan ke hadirat Allah SWT, Tuhan Yang Maha Esa, atas limpahan rahmat dan karunia-Nya sehingga Fakultas Ilmu Kesehatan (FIKES) Universitas Ibnu Sina terus tumbuh dan berkembang menjadi salah satu pusat pendidikan tinggi kesehatan terkemuka di kawasan Kepulauan Riau dan Indonesia.
            </p>
            <p>
              Tantangan dunia kesehatan saat ini menuntut kesiapan tenaga profesional yang tidak hanya menguasai teori, namun juga adaptif terhadap kemajuan teknologi kesehatan industri, keselamatan kerja (K3), kesehatan lingkungan, dan epidemiologi terapan. Oleh karena itu, kurikulum FIKES UIS dirancang secara komprehensif dengan memadukan penguasaan sains, praktikum laboratorium modern, serta magang di rumah sakit dan sektor industri terkemuka.
            </p>
            <p>
              Kepada seluruh civitas akademika, para mahasiswa, alumni, dan calon mahasiswa baru, mari bersama-sama kita wujudkan komitmen Tri Dharma Perguruan Tinggi dengan dedikasi terbaik demi kesehatan dan kesejahteraan masyarakat.
            </p>
            <p class="fw-bold mt-4 mb-1">
              <em>Wassalamu’alaikum Warahmatullahi Wabarakatuh.</em>
            </p>
            <p class="text-muted">
              <strong>{{ $sambutanDekan->nama_dekan ?? 'Dekanat FIKES UIS' }}</strong><br>
              <small>{{ $sambutanDekan->jabatan_dekan ?? 'Dekan Fakultas Ilmu Kesehatan Universitas Ibnu Sina' }}</small>
            </p>
          @endif
        </div>

        {{-- Link Navigasi Cepat --}}
        <div class="d-flex flex-wrap gap-3 mt-5 pt-4 border-top">
          <a href="{{ route('homepage.layanan') }}" class="btn-primary-hero" style="font-size: 13.5px; padding: 10px 22px;">
            <i class="bi bi-grid-fill me-1"></i> Program Studi Kami
          </a>
          <a href="{{ route('homepage.kontak') }}" class="btn-outline-hero" style="font-size: 13.5px; padding: 10px 22px; color: var(--fikes-purple); border-color: var(--fikes-purple);">
            <i class="bi bi-envelope me-1"></i> Hubungi Dekanat
          </a>
        </div>

      </div>

    </div>
  </div>
</section>

@endsection
