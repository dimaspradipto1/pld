@extends('layouts.frontend.template')

@section('title', 'Sambutan Kepala — Pusat Layanan Disabilitas (PLD UIS)')
@section('meta_description', 'Sambutan resmi Kepala Pusat Layanan Disabilitas (PLD) Universitas Ibnu Sina.')
@section('meta_keywords', 'sambutan pld, kepala pld uis, pimpinan pusat layanan disabilitas')


@section('content')

<!-- ═══════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════ -->
<div class="dekan-hero">
  <div class="container">
    <div data-aos="fade-up">
      <h1 class="dekan-hero-title">
        Sambutan <em>Kepala PLD</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}"><i class="bi bi-house-fill me-1"></i>Beranda</a>
        <span>/</span>
        <a href="{{ route('homepage.sejarah') }}">Profil</a>
        <span>/</span>
        <span class="active">Sambutan Kepala PLD</span>
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
            <img src="{{ asset('storage/' . $sambutanDekan->foto_dekan) }}" alt="{{ $sambutanDekan->nama_dekan ?? 'Kepala PLD UIS' }}" class="dekan-portrait-img">
          @else
            <div class="dekan-avatar-fallback">
              <i class="bi bi-person-circle"></i>
              <span style="font-size: 14px; font-weight: 600; margin-top: 10px;">Foto Pimpinan</span>
            </div>
          @endif

          <h3 class="dekan-name-title">{{ $sambutanDekan->nama_dekan ?? 'Dr. H. Ahmad Syafi\'i, M.Ed.' }}</h3>
          <span class="dekan-role-badge">
            <i class="bi bi-award-fill me-1"></i> {{ $sambutanDekan->jabatan_dekan ?? 'Kepala Pusat Layanan Disabilitas' }}
          </span>

          <div class="pt-3 border-top mt-3 text-muted small text-start">
            <div class="mb-2"><i class="bi bi-mortarboard me-2 text-primary"></i> Universitas Ibnu Sina (UIS) Batam</div>
            <div><i class="bi bi-geo-alt me-2 text-danger"></i> Gedung Rektorat Lt. 2, PLD UIS</div>
          </div>
        </div>
      </div>

      {{-- Right Column: Full Message --}}
      <div class="col-lg-8" data-aos="fade-left">
        <div class="section-label">Amanat &amp; Sambutan Resmi</div>
        <h2 class="section-title mb-4">
          Mewujudkan Kampus Ramah Disabilitas, <em>Inklusif &amp; Berkeadilan</em>
        </h2>

        {{-- Kutipan Singkat --}}
        <div class="dekan-quote-callout">
          <i class="bi bi-quote fs-3 d-block mb-1" style="color: var(--pld-purple);"></i>
          "{{ strip_tags($sambutanDekan->kutipan_singkat ?? ($sambutanDekan->sambutan_dekan ?? 'Selamat datang di Pusat Layanan Disabilitas Universitas Ibnu Sina. Kami percaya bahwa setiap insan berhak mendapatkan akses pendidikan tinggi yang bermutu, adil, dan berkesetaraan. Bersama-sama, mari kita ciptakan kampus ramah disabilitas yang menginspirasi.')) }}"
        </div>

        {{-- Isi Lengkap Sambutan --}}
        <div class="sambutan-content-body" style="line-height: 1.85; font-size: 15.5px; color: #334155;">
          @if(!empty($sambutanDekan?->sambutan_dekan))
            {!! $sambutanDekan->sambutan_dekan !!}
          @else
            <p>
              <em>Assalamu’alaikum Warahmatullahi Wabarakatuh, Salam Sejahtera untuk kita semua.</em>
            </p>
            <p>
              Selamat datang di portal resmi <strong>Pusat Layanan Disabilitas (PLD) Universitas Ibnu Sina</strong>. Keberadaan unit ini merupakan perwujudan nyata dari komitmen universitas dalam menjamin hak pendidikan inklusif sebagaimana diamanatkan oleh regulasi nasional dan nilai kemanusiaan.
            </p>
            <p>
              Di PLD UIS, kami menyediakan layanan terpadu mulai dari pendampingan notetaker, juru bahasa isyarat (BISINDO), akomodasi ujian, hingga konseling psikososial bagi mahasiswa berkebutuhan khusus agar memiliki kesempatan yang setara untuk meraih prestasi dan kemandirian masa depan.
            </p>
            <p class="fw-bold mt-4 mb-1">
              <em>Wassalamu’alaikum Warahmatullahi Wabarakatuh.</em>
            </p>
            <p class="text-muted">
              <strong>{{ $sambutanDekan->nama_dekan ?? 'Dr. H. Ahmad Syafi\'i, M.Ed.' }}</strong><br>
              <small>{{ $sambutanDekan->jabatan_dekan ?? 'Kepala Pusat Layanan Disabilitas Universitas Ibnu Sina' }}</small>
            </p>
          @endif
        </div>

        {{-- Link Navigasi Cepat --}}
        <div class="d-flex flex-wrap gap-3 mt-5 pt-4 border-top">
          <a href="{{ route('homepage.layanan') }}" class="btn-primary-hero" style="font-size: 13.5px; padding: 10px 22px;">
            <i class="bi bi-grid-fill me-1"></i> Pelajari Layanan PLD
          </a>
          <a href="{{ route('homepage.kontak') }}" class="btn-outline-hero" style="font-size: 13.5px; padding: 10px 22px; color: var(--pld-purple); border-color: var(--pld-purple);">
            <i class="bi bi-envelope me-1"></i> Hubungi Sekretariat PLD
          </a>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection
