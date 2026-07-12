@extends('layouts.frontend.template')

@section('title', 'Berita & Artikel Terbaru — PT Berkarya Jasa Inspeksi')
@section('meta_description', 'Ikuti berita dan artikel terbaru seputar K3, riksa uji, kalibrasi, dan dunia keselamatan kerja dari PT Berkarya Jasa Inspeksi (BJI).')
@section('meta_keywords', 'berita k3, artikel riksa uji, info kalibrasi, keselamatan kerja, BJI news')

@section('content')

<!-- ═══════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════ -->
<div class="news-hero">
  <div class="news-hero-bg"></div>
  <div class="container">
    <div class="news-hero-content" data-aos="fade-up" data-aos-duration="800">
      <div class="news-hero-badge">
        <span class="news-hero-badge-dot"></span>
        <span>Update Terkini</span>
      </div>
      <h1 class="news-hero-title">Berita & <em>Artikel</em> K3</h1>
      <p class="news-hero-desc">Informasi terkini seputar keselamatan kerja, riksa uji, kalibrasi, dan regulasi K3 terbaru dari PT Berkarya Jasa Inspeksi.</p>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}">Beranda</a>
        <span class="sep">/</span>
        <span class="active">Berita</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     NEWS GRID
═══════════════════════════════════════════════ -->
<section class="section-bg-cream py-5">
  <div class="container">

    <!-- Section Header -->
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Artikel & Berita</div>
      <h2 class="section-title">Wawasan <em>K3 Terkini</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Tetap update dengan perkembangan regulasi, teknologi, dan praktik terbaik di bidang keselamatan kerja dan inspeksi teknis.
      </p>
    </div>

    @php $hasAnyNews = $featured || $newsList->count(); @endphp

    @if(!$hasAnyNews)
    <!-- ── EMPTY STATE ── -->
    <div class="news-empty" data-aos="fade-up">
      <div class="news-empty-icon"><i class="bi bi-newspaper"></i></div>
      <h3>Belum Ada Artikel</h3>
      <p>Berita dan artikel terbaru akan segera hadir. Pantau terus halaman ini!</p>
      <a href="{{ route('homepage') }}" class="btn-primary-hero mt-3 d-inline-flex">
        <i class="bi bi-house"></i> Kembali ke Beranda
      </a>
    </div>
    @else

    {{-- Gabungkan featured + newsList untuk ditampilkan dalam satu grid --}}
    @php
      $allNews = collect();
      if ($featured) $allNews->push($featured);
      foreach ($newsList as $n) $allNews->push($n);
    @endphp

    <!-- ── GRID 4 KOLOM ── -->
    <div class="row g-4">
      @foreach($allNews as $i => $article)
        <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 70 }}">
          <a href="{{ route('homepage.news.detail', $article->id) }}" class="ncard-link">
            <article class="ncard">

              <!-- Gambar -->
              <div class="ncard-img">
                @if($article->thumbnail)
                  <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}">
                @else
                  <div class="ncard-img-placeholder">
                    <i class="bi bi-newspaper"></i>
                  </div>
                @endif
                @if($article->is_featured)
                  <div class="ncard-badge-featured">
                    <i class="bi bi-star-fill me-1"></i>Unggulan
                  </div>
                @endif
              </div>

              <!-- Body -->
              <div class="ncard-body">

                <!-- Kategori kecil -->
                <div class="ncard-category">{{ strtoupper($article->category) }}</div>

                <!-- Judul -->
                <h3 class="ncard-title">{{ Str::limit($article->title, 60) }}</h3>

                <!-- Info Rows -->
                <div class="ncard-info-table">
                  <div class="ncard-info-row">
                    <span class="ncard-info-label">Tanggal</span>
                    <span class="ncard-info-value">{{ $article->created_at->format('d/m/Y') }}</span>
                  </div>
                  <div class="ncard-info-row">
                    <span class="ncard-info-label">Penulis</span>
                    <span class="ncard-info-value">{{ $article->user?->name ?? 'Admin' }}</span>
                  </div>
                  <div class="ncard-info-row">
                    <span class="ncard-info-label">Est. Baca</span>
                    <span class="ncard-info-value">{{ ceil(str_word_count(strip_tags($article->content ?? '')) / 200) ?: 1 }} menit</span>
                  </div>
                </div>

                <!-- Status badge -->
                <div class="ncard-status-row">
                  @if($article->status === 'published')
                    <span class="ncard-status-badge published">
                      <i class="bi bi-circle-fill me-1" style="font-size:7px"></i>Terbit
                    </span>
                  @else
                    <span class="ncard-status-badge draft">Draft</span>
                  @endif
                </div>

              </div>

              <!-- Tombol Penuh Bawah -->
              <div class="ncard-action">
                <span class="ncard-btn">
                  <i class="bi bi-book-open me-2"></i>Baca Artikel
                  <i class="bi bi-arrow-right ms-auto"></i>
                </span>
              </div>

            </article>
          </a>
        </div>
      @endforeach
    </div>

    <!-- Pagination -->
    @if($newsList->hasPages())
      <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
        <div class="news-pagination">
          {{ $newsList->links('pagination::bootstrap-5') }}
        </div>
      </div>
    @endif

    @endif

  </div>
</section>

<!-- ═══════════════════════════════════════════════
     CTA STRIP
═══════════════════════════════════════════════ -->
<section class="news-cta-strip">
  <div class="container">
    <div class="news-cta-inner" data-aos="fade-up">
      <div class="row align-items-center g-4">
        <div class="col-lg-8">
          <div class="section-label" style="color: rgba(255,255,255,0.6);">Konsultasi Gratis</div>
          <h2 class="section-title light mb-0">Punya pertanyaan seputar <em>K3 & Riksa Uji?</em></h2>
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
  /* ── NEWS HERO ──────────────────────────────────── */
  .news-hero {
    position: relative;
    background: linear-gradient(135deg, #001030 0%, #002060 55%, #001a4a 100%);
    padding: 90px 0 70px;
    overflow: hidden;
  }
  .news-hero-bg {
    position: absolute; inset: 0;
    background:
      radial-gradient(ellipse at 15% 50%, rgba(0,144,223,0.20) 0%, transparent 60%),
      radial-gradient(ellipse at 85% 20%, rgba(218,37,29,0.14) 0%, transparent 50%);
    z-index: 0;
  }
  .news-hero-content { position: relative; z-index: 3; text-align: center; }
  .news-hero-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(0,144,223,0.15);
    border: 1px solid rgba(0,144,223,0.35);
    border-radius: 50px; padding: 6px 18px; margin-bottom: 22px;
    backdrop-filter: blur(8px);
  }
  .news-hero-badge-dot {
    width: 8px; height: 8px;
    background: var(--clay); border-radius: 50%;
    animation: pulse-dot 2s ease-in-out infinite;
  }
  .news-hero-badge span {
    font-size: 12px; font-weight: 600; letter-spacing: 1px;
    text-transform: uppercase; color: rgba(180,225,255,0.85);
    font-family: 'Plus Jakarta Sans', sans-serif;
  }
  .news-hero-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: clamp(34px, 5vw, 60px); font-weight: 800;
    color: var(--white); line-height: 1.1;
    letter-spacing: -1.5px; margin-bottom: 16px;
  }
  .news-hero-title em { font-style: normal; color: var(--terracotta-lt); }
  .news-hero-desc {
    font-size: 16px; color: rgba(255,255,255,0.55);
    max-width: 560px; margin: 0 auto 24px; line-height: 1.75;
  }

  /* ── NCARD (News Card) ──────────────────────────── */
  .ncard-link {
    display: block; height: 100%;
    text-decoration: none; color: inherit;
  }
  .ncard {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #e8eaf0;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 2px 12px rgba(13,27,61,0.05);
    transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
  }
  .ncard:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 44px rgba(13,27,61,0.13);
    border-color: rgba(218,37,29,0.18);
  }

  /* Gambar */
  .ncard-img {
    position: relative;
    width: 100%;
    padding-top: 68%; /* ~4:2.7 ratio, mirip produk card */
    background: linear-gradient(135deg, #001a4a, #003080);
    overflow: hidden;
    flex-shrink: 0;
  }
  .ncard-img img {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
    display: block;
  }
  .ncard:hover .ncard-img img { transform: scale(1.06); }
  .ncard-img-placeholder {
    position: absolute; inset: 0;
    display: flex; align-items: center; justify-content: center;
  }
  .ncard-img-placeholder i { font-size: 44px; color: rgba(255,255,255,0.1); }

  /* Badge Unggulan */
  .ncard-badge-featured {
    position: absolute; top: 12px; left: 12px;
    background: var(--terracotta);
    color: #fff;
    font-size: 10.5px; font-weight: 700;
    font-family: 'Plus Jakarta Sans', sans-serif;
    padding: 4px 12px; border-radius: 50px;
    box-shadow: 0 3px 10px rgba(218,37,29,0.4);
    display: flex; align-items: center;
  }

  /* Body */
  .ncard-body {
    padding: 14px 16px 10px;
    display: flex; flex-direction: column;
    flex-grow: 1;
  }

  /* Kategori kecil (seperti "ROSTER BETON") */
  .ncard-category {
    font-size: 10px;
    font-weight: 700;
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: var(--terracotta);
    letter-spacing: 0.8px;
    margin-bottom: 6px;
    text-transform: uppercase;
  }

  /* Judul */
  .ncard-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px;
    font-weight: 700;
    color: #1a1a2e;
    line-height: 1.4;
    margin-bottom: 12px;
    min-height: 40px; /* 2 baris */
    transition: color 0.2s;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .ncard:hover .ncard-title { color: var(--terracotta); }

  /* Info Rows (mirip tabel produk) */
  .ncard-info-table {
    border-top: 1px solid #f0f2f5;
    padding-top: 10px;
    display: flex;
    flex-direction: column;
    gap: 5px;
    margin-bottom: 10px;
  }
  .ncard-info-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
  }
  .ncard-info-label {
    font-size: 11px;
    color: #8a93a8;
    font-weight: 500;
    flex-shrink: 0;
    width: 52px;
  }
  .ncard-info-value {
    font-size: 11px;
    color: #3a3f5c;
    font-weight: 600;
    text-align: right;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 100px;
  }

  /* Status Badge */
  .ncard-status-row {
    display: flex;
    align-items: center;
    margin-bottom: 4px;
  }
  .ncard-status-badge {
    font-size: 10.5px;
    font-weight: 700;
    font-family: 'Plus Jakarta Sans', sans-serif;
    padding: 3px 10px;
    border-radius: 50px;
    display: inline-flex; align-items: center;
  }
  .ncard-status-badge.published {
    background: rgba(16,185,129,0.1);
    color: #059669;
    border: 1px solid rgba(16,185,129,0.25);
  }
  .ncard-status-badge.draft {
    background: rgba(100,116,139,0.1);
    color: #64748b;
    border: 1px solid rgba(100,116,139,0.2);
  }

  /* Tombol penuh bawah */
  .ncard-action {
    padding: 0 14px 14px;
    flex-shrink: 0;
  }
  .ncard-btn {
    display: flex;
    align-items: center;
    width: 100%;
    background: var(--terracotta);
    color: #fff;
    font-size: 12.5px;
    font-weight: 700;
    font-family: 'Plus Jakarta Sans', sans-serif;
    padding: 10px 14px;
    border-radius: 10px;
    transition: all 0.25s;
    box-shadow: 0 3px 10px rgba(218,37,29,0.25);
    letter-spacing: 0.2px;
    cursor: pointer;
  }
  .ncard:hover .ncard-btn {
    background: var(--terracotta-dk);
    box-shadow: 0 6px 18px rgba(218,37,29,0.4);
  }
  .ncard-btn .bi-arrow-right {
    margin-left: auto;
    font-size: 13px;
    transition: transform 0.2s;
  }
  .ncard:hover .ncard-btn .bi-arrow-right { transform: translateX(3px); }

  /* ── EMPTY STATE ────────────────────────────────── */
  .news-empty {
    text-align: center;
    padding: 80px 20px;
    background: #fff;
    border-radius: 24px;
    border: 1px dashed var(--border);
  }
  .news-empty-icon {
    width: 80px; height: 80px;
    background: linear-gradient(135deg, rgba(218,37,29,0.08), rgba(0,144,223,0.08));
    border-radius: 20px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px;
  }
  .news-empty-icon i { font-size: 36px; color: var(--concrete-lt); }
  .news-empty h3 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px; font-weight: 700; color: var(--charcoal); margin-bottom: 8px;
  }
  .news-empty p { font-size: 15px; color: var(--muted); }

  /* ── CTA STRIP ──────────────────────────────────── */
  .news-cta-strip {
    background: linear-gradient(135deg, var(--charcoal) 0%, #001a4a 60%, rgba(218,37,29,0.25) 100%);
    padding: 70px 0; position: relative; overflow: hidden;
  }
  .news-cta-strip::before {
    content: ''; position: absolute; inset: 0;
    background: radial-gradient(ellipse at 80% 50%, rgba(218,37,29,0.2) 0%, transparent 60%);
  }
  .news-cta-inner { position: relative; z-index: 1; }

  /* ── PAGINATION ─────────────────────────────────── */
  .news-pagination .pagination { gap: 6px; }
  .news-pagination .page-link {
    border-radius: 10px !important; border: 1px solid var(--border);
    color: var(--charcoal); font-weight: 600;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px; padding: 8px 16px; transition: all 0.2s;
  }
  .news-pagination .page-link:hover { background: var(--terracotta); border-color: var(--terracotta); color: #fff; }
  .news-pagination .page-item.active .page-link {
    background: var(--terracotta); border-color: var(--terracotta);
    color: #fff; box-shadow: 0 4px 12px rgba(218,37,29,0.3);
  }
  .news-pagination .page-item.disabled .page-link { color: var(--concrete-lt); background: var(--cream); }

  /* ── RESPONSIVE ─────────────────────────────────── */
  @media (max-width: 576px) {
    .ncard-title { font-size: 13px; }
    .ncard-body { padding: 12px 12px 8px; }
    .ncard-action { padding: 0 12px 12px; }
    .ncard-btn { font-size: 12px; padding: 9px 12px; }
    .news-hero { padding: 70px 0 50px; }
  }
  @media (min-width: 577px) and (max-width: 991px) {
    /* col-6 sudah aktif — card ok */
  }
</style>
@endpush
