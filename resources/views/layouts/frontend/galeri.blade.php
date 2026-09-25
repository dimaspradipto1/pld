@extends('layouts.frontend.template')

@section('title', 'Galeri & Dokumentasi — Pelayanan Disabilitas (PLD)')
@section('meta_description', 'Galeri foto kegiatan akademik, praktikum laboratorium, pengabdian masyarakat, dan wisuda Pusat Layanan Disabilitas (PLD).')
@section('meta_keywords', 'galeri pld, dokumentasi pld, foto praktikum kesehatan, kegiatan mahasiswa pld')


@section('content')

<!-- ═══════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════ -->
<div class="galeri-hero">
  <div class="container">
    <div class="galeri-hero-content" data-aos="fade-up" data-aos-duration="800">
      <h1 class="galeri-hero-title">
        Galeri & <em>Dokumentasi</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}" class="text-white-50"><i class="bi bi-house-fill me-1"></i>Beranda</a>
        <span class="mx-2 text-white-50">/</span>
        <span style="color: var(--pld-orange); font-weight: 600;">Galeri Kegiatan</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     GALLERY GRID
═══════════════════════════════════════════════ -->
<section class="section-bg-white">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Dokumentasi Kampus</div>
      <h2 class="section-title">Aktivitas & <em>Kegiatan Mahasiswa</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Kumpulan dokumentasi praktikum laboratorium, pengabdian masyarakat, seminar kesehatan, dan momen prestasi civitas akademika PLD.
      </p>
    </div>

    @if($galleries->isEmpty())
      <div class="col-12 text-center py-5">
        <i class="bi bi-images fs-1 text-muted d-block mb-3"></i>
        <p class="text-muted">Belum ada foto dokumentasi yang diunggah.</p>
        <a href="{{ route('homepage') }}" class="btn-primary-hero mt-3">
          <i class="bi bi-house"></i> Kembali ke Beranda
        </a>
      </div>
    @else
      <div class="row g-4">
        @foreach($galleries as $item)
          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <a href="{{ route('homepage.galeri.detail', $item->slug ?? $item->id) }}" class="text-decoration-none d-block">
              <div class="galeri-item-card">
                @if(!empty($item->url))
                  <img src="{{ asset('storage/' . $item->url) }}" alt="{{ $item->judul ?? 'Dokumentasi PLD' }}" class="galeri-img-wrap">
                @else
                  <div class="d-flex align-items-center justify-content-center text-white" style="height: 220px; background: linear-gradient(135deg, #1b2b13 0%, #56823D 100%);">
                    <i class="bi bi-camera-fill fs-1 text-white-50"></i>
                  </div>
                @endif
                @if(!empty($item->judul))
                  <div class="galeri-caption">
                    <h6 class="text-dark mb-1 fw-bold" style="font-size: 15px; color: #1e293b !important;">{{ $item->judul }}</h6>
                    @if(!empty($item->deskripsi))
                      <small class="text-muted d-block" style="font-size: 13px; line-height: 1.5; color: #64748b !important;">{!! Str::limit(strip_tags($item->deskripsi), 90) !!}</small>
                    @endif
                    <div class="mt-2 text-primary fw-bold small d-flex align-items-center gap-1" style="font-size: 12.5px; color: var(--pld-purple) !important;">
                      <span>Lihat Detail</span>
                      <i class="bi bi-arrow-right"></i>
                    </div>
                  </div>
                @endif
              </div>
            </a>
          </div>
        @endforeach
      </div>

      @if(method_exists($galleries, 'links'))
        <div class="d-flex justify-content-center mt-5">
          {{ $galleries->links() }}
        </div>
      @endif
    @endif
  </div>
</section>

@endsection
