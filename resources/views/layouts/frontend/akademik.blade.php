@extends('layouts.frontend.template')

@section('title', $item->judul . ' — Fakultas Ilmu Kesehatan Universitas Ibnu Sina')
@section('meta_description', Str::limit(strip_tags($item->subjudul ?? $item->deskripsi), 160))

@push('styles')
<style>
  .akademik-hero {
    background: linear-gradient(135deg, #141b39 0%, #3b124d 100%);
    padding: 70px 0 60px;
    color: #ffffff;
    position: relative;
    overflow: hidden;
  }
  .akademik-hero::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 14px;
    background: linear-gradient(90deg, var(--pld-orange) 0%, #ffd000 100%);
  }
  .akademik-card {
    background: #ffffff;
    border-radius: 20px;
    border: 1px solid var(--border-light);
    box-shadow: var(--shadow-sm);
    padding: 40px;
    margin-bottom: 30px;
  }
  .doc-download-box {
    background: linear-gradient(135deg, #faf6fd 0%, #f3ebf9 100%);
    border: 1.5px solid #e1c7f4;
    border-radius: 16px;
    padding: 24px 28px;
    margin-bottom: 32px;
  }
  .nav-akademik-sidebar {
    background: #ffffff;
    border: 1px solid var(--border-light);
    border-radius: 18px;
    padding: 20px;
    box-shadow: var(--shadow-sm);
  }
  .nav-akademik-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 14px;
    color: var(--text-main);
    text-decoration: none;
    transition: all 0.2s ease;
    margin-bottom: 6px;
    background: #f8fafc;
  }
  .nav-akademik-link:hover,
  .nav-akademik-link.active {
    background: var(--pld-purple);
    color: #ffffff;
    transform: translateX(4px);
  }
  .nav-akademik-link i {
    font-size: 18px;
    color: var(--pld-orange);
  }
  .nav-akademik-link.active i,
  .nav-akademik-link:hover i {
    color: #ffffff;
  }
</style>
@endpush

@section('content')
<!-- ═══════════════════════════════════════════════
     HERO HEADER
═══════════════════════════════════════════════ -->
<section class="akademik-hero">
  <div class="container position-relative" data-aos="fade-up">
    <nav aria-label="breadcrumb" class="mb-3">
      <ol class="breadcrumb mb-0" style="font-size: 13px;">
        <li class="breadcrumb-item"><a href="{{ route('homepage') }}" class="text-white-50 text-decoration-none">Beranda</a></li>
        <li class="breadcrumb-item text-white-50">Akademik</li>
        <li class="breadcrumb-item text-white active" aria-current="page">{{ $pageTitle }}</li>
      </ol>
    </nav>
    <div class="badge px-3 py-2 rounded-pill mb-3" style="background: var(--pld-orange); color: #141b39; font-weight: 800; font-size: 11.5px; letter-spacing: 0.8px;">
      LAYANAN AKADEMIK PLD UIS
    </div>
    <h1 class="display-6 fw-bold text-white mb-2">{{ $item->judul }}</h1>
    @if($item->subjudul)
      <p class="lead text-white-50 mb-0" style="max-width: 760px; font-size: 16px;">
        {{ $item->subjudul }}
      </p>
    @endif
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     MAIN CONTENT
═══════════════════════════════════════════════ -->
<section class="section-bg-sand py-5">
  <div class="container">
    <div class="row g-4">
      
      {{-- Kolom Konten Utama --}}
      <div class="col-lg-8" data-aos="fade-up">
        <div class="akademik-card">
          
          {{-- Banner Gambar jika ada --}}
          @if($item->gambar)
            <div class="mb-4 rounded-4 overflow-hidden shadow-sm">
              <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-100 img-fluid" style="max-height: 420px; object-fit: cover;">
            </div>
          @endif

          {{-- Dokumen Unduhan (PDF dll) --}}
          @if($item->file_dokumen)
            <div class="doc-download-box d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3">
              <div class="d-flex align-items-center gap-3">
                <div class="p-3 rounded-circle bg-white shadow-sm text-danger fs-3">
                  <i class="bi bi-file-earmark-pdf-fill"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-1">{{ $item->file_nama ?: 'Dokumen ' . $pageTitle }}</h6>
                  <div class="small text-muted">Klik tombol di samping untuk mengunduh dokumen resmi (PDF).</div>
                </div>
              </div>
              <a href="{{ asset('storage/' . $item->file_dokumen) }}" target="_blank" class="btn-primary-hero" style="font-size: 13.5px; padding: 10px 22px; white-space: nowrap;">
                <i class="bi bi-download"></i> Unduh File PDF
              </a>
            </div>
          @endif

          {{-- Portal Link Eksternal (SIAKAD dll) --}}
          @if(!empty($item->link_url))
            <div class="p-4 rounded-4 mb-4 text-white d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3" style="background: linear-gradient(135deg, #141b39 0%, #521c6b 100%);">
              <div>
                <h5 class="fw-bold text-white mb-1"><i class="bi bi-laptop text-warning me-2"></i>Akses Langsung Sistem Online</h5>
                <p class="text-white-50 small mb-0">Klik tombol untuk masuk ke portal sistem resmi PLD UIS.</p>
              </div>
              <a href="{{ $item->link_url }}" target="_blank" class="btn-primary-hero" style="font-size: 13.5px; padding: 10px 24px; white-space: nowrap;">
                Buka Portal <i class="bi bi-box-arrow-up-right ms-1"></i>
              </a>
            </div>
          @endif

          {{-- Isi Teks Deskripsi --}}
          <div class="article-content" style="font-size: 15.5px; line-height: 1.8; color: #2d3748;">
            {!! $item->deskripsi !!}
          </div>

        </div>
      </div>

      {{-- Kolom Sidebar Navigasi Akademik --}}
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
        
        {{-- Widget Menu Akademik Lainnya --}}
        <div class="nav-akademik-sidebar mb-4">
          <h6 class="fw-bold text-dark mb-3 pb-2 border-bottom">
            <i class="bi bi-mortarboard-fill text-primary me-2"></i>Menu Akademik
          </h6>
          <nav class="d-flex flex-column">
            <a href="{{ route('homepage.kurikulum') }}" class="nav-akademik-link {{ request()->routeIs('homepage.kurikulum') ? 'active' : '' }}">
              <i class="bi bi-journal-text"></i> Kurikulum
            </a>
            <a href="{{ route('homepage.kalender-akademik') }}" class="nav-akademik-link {{ request()->routeIs('homepage.kalender-akademik') ? 'active' : '' }}">
              <i class="bi bi-calendar-check"></i> Kalender Akademik
            </a>
            <a href="{{ route('homepage.pedoman-akademik') }}" class="nav-akademik-link {{ request()->routeIs('homepage.pedoman-akademik') ? 'active' : '' }}">
              <i class="bi bi-book"></i> Pedoman Akademik
            </a>
            <a href="{{ route('homepage.sistem-akademik') }}" class="nav-akademik-link {{ request()->routeIs('homepage.sistem-akademik') ? 'active' : '' }}">
              <i class="bi bi-laptop"></i> Sistem Akademik
            </a>
          </nav>
        </div>

        {{-- Widget Kontak / PMB --}}
        <div class="p-4 rounded-4 text-white" style="background: linear-gradient(135deg, #2d0f3d 0%, #141b39 100%); border: 1px solid rgba(255, 255, 255, 0.1);">
          <div class="badge px-3 py-1 rounded-pill mb-2" style="background: var(--pld-orange); color: #141b39; font-weight: 800; font-size: 11px;">
            INFORMASI PMB
          </div>
          <h5 class="fw-bold text-white mb-2">Butuh Bantuan Akademik?</h5>
          <p class="text-white-50 small mb-3">
            Hubungi Bagian Tata Usaha & Layanan Akademik PLD UIS untuk informasi lebih lanjut.
          </p>
          <a href="{{ route('homepage.kontak') }}" class="btn btn-outline-light w-100 rounded-3 fw-bold py-2" style="font-size: 13.5px;">
            <i class="bi bi-telephone me-1"></i> Hubungi Kami
          </a>
        </div>

      </div>

    </div>
  </div>
</section>
@endsection
