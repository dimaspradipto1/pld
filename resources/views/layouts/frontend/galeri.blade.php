@extends('layouts.frontend.template')

@section('title', 'Galeri — PT Berkarya Jasa Inspeksi (BJI)')
@section('meta_description', 'Galeri foto kegiatan dan dokumentasi kerja PT Berkarya Jasa Inspeksi dalam bidang Riksa Uji, Kalibrasi, dan Keselamatan Kerja.')
@section('meta_keywords', 'galeri bji, foto riksa uji, dokumentasi k3, kegiatan inspeksi')

@section('content')

<!-- ═══════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════ -->
<div class="galeri-hero">
  <div class="galeri-hero-bg"></div>
  <div class="container">
    <div class="galeri-hero-content" data-aos="fade-up" data-aos-duration="800">
      <div class="galeri-hero-badge">
        <i class="bi bi-images me-2"></i>
        <span>Dokumentasi Kegiatan</span>
      </div>
      <h1 class="galeri-hero-title">Galeri <em>Foto</em> BJI</h1>
      <p class="galeri-hero-desc">Dokumentasi kegiatan riksa uji, kalibrasi, sertifikasi K3, dan berbagai layanan teknis PT Berkarya Jasa Inspeksi di lapangan.</p>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}">Beranda</a>
        <span class="sep">/</span>
        <span class="active">Galeri</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     GALLERY GRID
═══════════════════════════════════════════════ -->
<section class="section-bg-cream py-5">
  <div class="container">

    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Foto & Dokumentasi</div>
      <h2 class="section-title">Aktivitas <em>di Lapangan</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Kumpulan foto dokumentasi kegiatan inspeksi teknis, riksa uji peralatan, dan layanan K3 kami di berbagai lokasi.
      </p>
    </div>

    @if($galleries->isEmpty())
      <!-- Empty State -->
      <div class="galeri-empty" data-aos="fade-up">
        <div class="galeri-empty-icon"><i class="bi bi-images"></i></div>
        <h3>Belum Ada Foto</h3>
        <p>Dokumentasi kegiatan akan segera ditampilkan di sini.</p>
        <a href="{{ route('homepage') }}" class="btn-primary-hero mt-3 d-inline-flex">
          <i class="bi bi-house"></i> Kembali ke Beranda
        </a>
      </div>
    @else

      <!-- Masonry/Grid Gallery -->
      <div class="galeri-grid" data-aos="fade-up">
        @foreach($galleries as $i => $item)
          <div class="galeri-item" data-aos="zoom-in" data-aos-delay="{{ ($i % 4) * 60 }}"
               onclick="openLightbox('{{ $item->url ? asset('storage/' . $item->url) : '' }}', '{{ addslashes($item->judul ?? '') }}', '{{ addslashes($item->deskripsi ?? '') }}')">
            <div class="galeri-img-wrap">
              @if($item->url)
                <img src="{{ asset('storage/' . $item->url) }}" alt="{{ $item->judul ?? 'Galeri BJI' }}" loading="lazy">
              @else
                <div class="galeri-placeholder">
                  <i class="bi bi-image"></i>
                </div>
              @endif
              <!-- Overlay hover -->
              <div class="galeri-overlay">
                <div class="galeri-overlay-inner">
                  <div class="galeri-zoom-icon">
                    <i class="bi bi-zoom-in"></i>
                  </div>
                  @if($item->judul)
                    <h4 class="galeri-img-title">{{ $item->judul }}</h4>
                  @endif
                  @if($item->deskripsi)
                    <p class="galeri-img-desc">{{ Str::limit($item->deskripsi, 80) }}</p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

    @endif

  </div>
</section>

<!-- ═══════════════════════════════════════════════
     LIGHTBOX MODAL
═══════════════════════════════════════════════ -->
<div class="galeri-lightbox" id="galeriLightbox" onclick="closeLightbox(event)">
  <div class="galeri-lightbox-inner">
    <button class="galeri-lightbox-close" onclick="closeLightbox()">
      <i class="bi bi-x-lg"></i>
    </button>
    <img src="" alt="" id="lightboxImg" class="galeri-lightbox-img">
    <div class="galeri-lightbox-info" id="lightboxInfo"></div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     CTA STRIP
═══════════════════════════════════════════════ -->
<section class="galeri-cta-strip">
  <div class="container">
    <div class="galeri-cta-inner" data-aos="fade-up">
      <div class="row align-items-center g-4">
        <div class="col-lg-8">
          <div class="section-label" style="color: rgba(255,255,255,0.6);">Butuh Layanan Kami?</div>
          <h2 class="section-title light mb-0">Konsultasikan kebutuhan <em>K3 & Riksa Uji</em> Anda</h2>
        </div>
        <div class="col-lg-4 text-lg-end">
          <a href="{{ route('homepage.kontak') }}" class="btn-primary-hero">
            <i class="bi bi-chat-dots-fill"></i> Hubungi Kami
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@push('styles')
<style>
  /* ── HERO ───────────────────────────────────────── */
  .galeri-hero {
    position: relative;
    background: linear-gradient(135deg, #001030 0%, #002060 55%, #001a4a 100%);
    padding: 90px 0 70px;
    overflow: hidden;
  }
  .galeri-hero-bg {
    position: absolute; inset: 0;
    background:
      radial-gradient(ellipse at 20% 50%, rgba(0,144,223,0.18) 0%, transparent 60%),
      radial-gradient(ellipse at 80% 20%, rgba(218,37,29,0.12) 0%, transparent 50%);
    z-index: 0;
  }
  .galeri-hero-content { position: relative; z-index: 3; text-align: center; }
  .galeri-hero-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(0,144,223,0.15);
    border: 1px solid rgba(0,144,223,0.35);
    border-radius: 50px; padding: 6px 20px; margin-bottom: 22px;
    backdrop-filter: blur(8px);
    font-size: 12px; font-weight: 600; letter-spacing: 1px;
    text-transform: uppercase; color: rgba(180,225,255,0.85);
    font-family: 'Plus Jakarta Sans', sans-serif;
  }
  .galeri-hero-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: clamp(34px, 5vw, 60px); font-weight: 800;
    color: #fff; line-height: 1.1; letter-spacing: -1.5px; margin-bottom: 16px;
  }
  .galeri-hero-title em { font-style: normal; color: var(--terracotta-lt); }
  .galeri-hero-desc {
    font-size: 16px; color: rgba(255,255,255,0.55);
    max-width: 560px; margin: 0 auto 24px; line-height: 1.75;
  }

  /* ── GALLERY GRID (CSS Masonry-like 4 kolom) ────── */
  .galeri-grid {
    columns: 4;
    column-gap: 16px;
  }
  .galeri-item {
    break-inside: avoid;
    margin-bottom: 16px;
    cursor: pointer;
  }
  .galeri-img-wrap {
    position: relative;
    border-radius: 14px;
    overflow: hidden;
    background: #001a4a;
    box-shadow: 0 3px 14px rgba(13,27,61,0.08);
    transition: box-shadow 0.3s;
  }
  .galeri-img-wrap:hover { box-shadow: 0 10px 36px rgba(13,27,61,0.18); }
  .galeri-img-wrap img {
    width: 100%; height: auto;
    display: block;
    transition: transform 0.5s ease;
  }
  .galeri-item:hover .galeri-img-wrap img { transform: scale(1.05); }

  /* Placeholder jika tidak ada gambar */
  .galeri-placeholder {
    width: 100%; padding-top: 70%;
    display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, #001a4a, #003080);
    position: relative;
  }
  .galeri-placeholder i {
    position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);
    font-size: 40px; color: rgba(255,255,255,0.1);
  }

  /* Overlay hover */
  .galeri-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(0,16,48,0.85) 0%, rgba(0,16,48,0.3) 50%, transparent 100%);
    opacity: 0;
    transition: opacity 0.35s ease;
    display: flex; align-items: flex-end;
  }
  .galeri-item:hover .galeri-overlay { opacity: 1; }
  .galeri-overlay-inner {
    padding: 18px; width: 100%;
    transform: translateY(10px);
    transition: transform 0.35s ease;
  }
  .galeri-item:hover .galeri-overlay-inner { transform: translateY(0); }
  .galeri-zoom-icon {
    width: 40px; height: 40px;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(6px);
    border-radius: 50%; border: 1px solid rgba(255,255,255,0.3);
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 10px;
    color: #fff; font-size: 16px;
  }
  .galeri-img-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px; font-weight: 700; color: #fff;
    margin-bottom: 4px; line-height: 1.3;
  }
  .galeri-img-desc {
    font-size: 12px; color: rgba(255,255,255,0.75);
    line-height: 1.5; margin: 0;
  }

  /* ── LIGHTBOX ───────────────────────────────────── */
  .galeri-lightbox {
    position: fixed; inset: 0; z-index: 9999;
    background: rgba(0,8,24,0.92);
    backdrop-filter: blur(12px);
    display: none;
    align-items: center; justify-content: center;
    padding: 24px;
    cursor: zoom-out;
  }
  .galeri-lightbox.active { display: flex; }
  .galeri-lightbox-inner {
    position: relative;
    max-width: 90vw; max-height: 90vh;
    text-align: center;
    cursor: default;
  }
  .galeri-lightbox-close {
    position: absolute; top: -48px; right: -8px;
    width: 40px; height: 40px;
    background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2);
    border-radius: 50%; color: #fff; font-size: 16px;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; transition: background 0.2s;
    z-index: 10;
  }
  .galeri-lightbox-close:hover { background: var(--terracotta); }
  .galeri-lightbox-img {
    max-width: 100%; max-height: 80vh;
    border-radius: 16px;
    object-fit: contain;
    box-shadow: 0 20px 80px rgba(0,0,0,0.5);
    display: block;
  }
  .galeri-lightbox-info {
    margin-top: 16px;
    color: rgba(255,255,255,0.85);
    font-family: 'Plus Jakarta Sans', sans-serif;
  }
  .galeri-lightbox-info h4 { font-size: 16px; font-weight: 700; margin-bottom: 6px; }
  .galeri-lightbox-info p { font-size: 13px; color: rgba(255,255,255,0.6); margin: 0; }

  /* ── EMPTY STATE ────────────────────────────────── */
  .galeri-empty {
    text-align: center; padding: 80px 20px;
    background: #fff; border-radius: 24px; border: 1px dashed var(--border);
  }
  .galeri-empty-icon {
    width: 80px; height: 80px;
    background: linear-gradient(135deg, rgba(218,37,29,0.08), rgba(0,144,223,0.08));
    border-radius: 20px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px;
  }
  .galeri-empty-icon i { font-size: 36px; color: var(--concrete-lt); }
  .galeri-empty h3 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px; font-weight: 700; color: var(--charcoal); margin-bottom: 8px;
  }
  .galeri-empty p { font-size: 15px; color: var(--muted); }

  /* ── CTA STRIP ──────────────────────────────────── */
  .galeri-cta-strip {
    background: linear-gradient(135deg, var(--charcoal) 0%, #001a4a 60%, rgba(218,37,29,0.25) 100%);
    padding: 70px 0; position: relative; overflow: hidden;
  }
  .galeri-cta-strip::before {
    content: ''; position: absolute; inset: 0;
    background: radial-gradient(ellipse at 80% 50%, rgba(218,37,29,0.2) 0%, transparent 60%);
  }
  .galeri-cta-inner { position: relative; z-index: 1; }

  /* ── RESPONSIVE ─────────────────────────────────── */
  @media (max-width: 991px) {
    .galeri-grid { columns: 3; }
    .galeri-hero { padding: 70px 0 50px; }
  }
  @media (max-width: 767px) {
    .galeri-grid { columns: 2; column-gap: 10px; }
    .galeri-item { margin-bottom: 10px; }
  }
  @media (max-width: 479px) {
    .galeri-grid { columns: 1; }
  }
</style>
@endpush

@push('scripts')
<script>
  // Lightbox
  function openLightbox(src, title, desc) {
    if (!src) return;
    document.getElementById('lightboxImg').src = src;
    const info = document.getElementById('lightboxInfo');
    info.innerHTML = (title ? `<h4>${title}</h4>` : '') + (desc ? `<p>${desc}</p>` : '');
    document.getElementById('galeriLightbox').classList.add('active');
    document.body.style.overflow = 'hidden';
  }
  function closeLightbox(e) {
    if (e && e.target !== document.getElementById('galeriLightbox') && !e.target.closest('.galeri-lightbox-close')) return;
    document.getElementById('galeriLightbox').classList.remove('active');
    document.body.style.overflow = '';
  }
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      document.getElementById('galeriLightbox').classList.remove('active');
      document.body.style.overflow = '';
    }
  });
</script>
@endpush
