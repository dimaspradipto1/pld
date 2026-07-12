@extends('layouts.frontend.template')

@section('title', $news->title . ' — PT Berkarya Jasa Inspeksi')
@section('meta_description', Str::limit($news->description, 160))

@section('content')

<!-- ═══════════════════════════════════════════════
     ARTICLE HERO
═══════════════════════════════════════════════ -->
<div class="article-hero">
  <div class="article-hero-bg">
    @if($news->thumbnail)
      <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}">
    @endif
    <div class="article-hero-overlay"></div>
  </div>
  <div class="container">
    <div class="article-hero-content" data-aos="fade-up" data-aos-duration="700">
      <div class="article-meta-top">
        <span class="article-category-chip"><i class="bi bi-tag-fill me-1"></i>K3 & Inspeksi</span>
        <span class="article-date"><i class="bi bi-calendar3 me-1"></i>{{ $news->created_at->translatedFormat('d F Y') }}</span>
        <span class="article-read-time">
          <i class="bi bi-clock me-1"></i>
          {{ ceil(str_word_count(strip_tags($news->content ?? '')) / 200) }} menit baca
        </span>
      </div>
      <h1 class="article-hero-title">{{ $news->title }}</h1>
      @if($news->description)
        <p class="article-hero-desc">{{ $news->description }}</p>
      @endif
      <div class="d-flex align-items-center gap-3 flex-wrap mt-4">
        @if($news->user)
          <div class="article-author">
            <div class="article-author-avatar">{{ strtoupper(substr($news->user->name, 0, 1)) }}</div>
            <div>
              <div class="article-author-name">{{ $news->user->name }}</div>
              <div class="article-author-role">Tim Redaksi BJI</div>
            </div>
          </div>
        @endif
        <div class="breadcrumb-custom ms-auto">
          <a href="{{ route('homepage') }}">Beranda</a>
          <span class="sep">/</span>
          <a href="{{ route('homepage.news') }}">Berita</a>
          <span class="sep">/</span>
          <span class="active">{{ Str::limit($news->title, 30) }}</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     ARTICLE CONTENT
═══════════════════════════════════════════════ -->
<section class="section-bg-cream" style="padding: 70px 0 100px;">
  <div class="container">
    <div class="row justify-content-center g-5">

      <!-- Main Article -->
      <div class="col-lg-8">
        <article class="article-body" data-aos="fade-up">
          @if($news->thumbnail)
            <div class="article-thumbnail mb-5">
              <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}">
            </div>
          @endif

          <div class="article-content">
            {!! nl2br(e($news->content)) !!}
          </div>

          <!-- Share & Tags -->
          <div class="article-footer">
            <div class="article-tags">
              <span class="article-tag"><i class="bi bi-hash"></i>K3</span>
              <span class="article-tag"><i class="bi bi-hash"></i>RiksaUji</span>
              <span class="article-tag"><i class="bi bi-hash"></i>Kalibrasi</span>
              <span class="article-tag"><i class="bi bi-hash"></i>Inspeksi</span>
            </div>
            <div class="article-share">
              <span class="article-share-label">Bagikan:</span>
              <a href="https://wa.me/?text={{ urlencode($news->title . ' - ' . url()->current()) }}" target="_blank" class="article-share-btn whatsapp" title="Share via WhatsApp">
                <i class="bi bi-whatsapp"></i>
              </a>
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="article-share-btn facebook" title="Share to Facebook">
                <i class="bi bi-facebook"></i>
              </a>
              <button class="article-share-btn copy-link" onclick="copyLink()" title="Salin tautan" id="copyLinkBtn">
                <i class="bi bi-link-45deg"></i>
              </button>
            </div>
          </div>
        </article>

        <!-- Author Card -->
        @if($news->user)
          <div class="author-card" data-aos="fade-up">
            <div class="author-card-avatar">{{ strtoupper(substr($news->user->name, 0, 1)) }}</div>
            <div class="author-card-info">
              <div class="author-card-label">Ditulis oleh</div>
              <div class="author-card-name">{{ $news->user->name }}</div>
              <div class="author-card-role">Tim Redaksi PT Berkarya Jasa Inspeksi</div>
            </div>
          </div>
        @endif

        <!-- Navigation -->
        <div class="article-nav" data-aos="fade-up">
          <a href="{{ route('homepage.news') }}" class="article-nav-back">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
          </a>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <!-- Table of Contents / Summary -->
        <div class="sidebar-widget" data-aos="fade-up" data-aos-delay="100">
          <div class="sidebar-widget-head">
            <i class="bi bi-list-ul"></i> Ringkasan Artikel
          </div>
          <div class="sidebar-widget-body">
            <p style="font-size:14px;color:var(--muted);line-height:1.7;margin:0;">
              {{ $news->description ?? Str::limit(strip_tags($news->content), 200) }}
            </p>
          </div>
        </div>

        <!-- Related News -->
        @if($relatedNews->count())
          <div class="sidebar-widget" data-aos="fade-up" data-aos-delay="150">
            <div class="sidebar-widget-head">
              <i class="bi bi-newspaper"></i> Artikel Terkait
            </div>
            <div class="sidebar-widget-body p-0">
              @foreach($relatedNews as $related)
                <a href="{{ route('homepage.news.detail', $related->id) }}" class="related-news-item">
                  <div class="related-news-img">
                    @if($related->thumbnail)
                      <img src="{{ asset('storage/' . $related->thumbnail) }}" alt="{{ $related->title }}">
                    @else
                      <div class="related-news-img-placeholder"><i class="bi bi-newspaper"></i></div>
                    @endif
                  </div>
                  <div class="related-news-info">
                    <div class="related-news-title">{{ Str::limit($related->title, 55) }}</div>
                    <div class="related-news-date">
                      <i class="bi bi-calendar3"></i>
                      {{ $related->created_at->translatedFormat('d M Y') }}
                    </div>
                  </div>
                </a>
              @endforeach
            </div>
          </div>
        @endif

        <!-- CTA Widget -->
        <div class="sidebar-cta" data-aos="fade-up" data-aos-delay="200">
          <div class="sidebar-cta-icon"><i class="bi bi-shield-check"></i></div>
          <h4>Butuh Riksa Uji K3?</h4>
          <p>Kami siap membantu perusahaan Anda memenuhi standar K3 yang berlaku.</p>
          <a href="{{ route('homepage.kontak') }}" class="btn-primary-hero w-100 justify-content-center">
            <i class="bi bi-chat-dots-fill"></i> Konsultasi Gratis
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection

@push('styles')
<style>
  /* ── ARTICLE HERO ────────────────────────────────── */
  .article-hero {
    position: relative;
    min-height: 480px;
    display: flex;
    align-items: flex-end;
    padding: 90px 0 60px;
    overflow: hidden;
    background: var(--charcoal);
  }
  .article-hero-bg {
    position: absolute; inset: 0;
    z-index: 0;
    overflow: hidden;
  }
  .article-hero-bg img {
    width: 100%; height: 100%;
    object-fit: cover;
    filter: brightness(0.3) saturate(0.8);
  }
  .article-hero-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(
      135deg,
      rgba(0,16,48,0.92) 0%,
      rgba(0,32,96,0.78) 50%,
      rgba(218,37,29,0.25) 100%
    );
    z-index: 1;
  }
  .article-hero-content {
    position: relative;
    z-index: 3;
    max-width: 820px;
  }
  .article-meta-top {
    display: flex;
    align-items: center;
    gap: 14px;
    flex-wrap: wrap;
    margin-bottom: 18px;
  }
  .article-category-chip {
    display: inline-flex; align-items: center;
    background: rgba(0,144,223,0.2);
    border: 1px solid rgba(0,144,223,0.4);
    color: rgba(140,210,255,0.9);
    font-size: 12px;
    font-weight: 700;
    font-family: 'Plus Jakarta Sans', sans-serif;
    padding: 4px 14px;
    border-radius: 50px;
  }
  .article-date, .article-read-time {
    font-size: 12.5px;
    color: rgba(255,255,255,0.45);
    display: flex; align-items: center; gap: 5px;
  }
  .article-hero-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: clamp(26px, 4vw, 48px);
    font-weight: 800;
    color: var(--white);
    line-height: 1.15;
    letter-spacing: -1px;
    margin-bottom: 14px;
  }
  .article-hero-desc {
    font-size: 16px;
    color: rgba(255,255,255,0.55);
    line-height: 1.75;
    max-width: 680px;
  }
  .article-author {
    display: flex; align-items: center; gap: 12px;
  }
  .article-author-avatar {
    width: 40px; height: 40px;
    background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: white; font-size: 16px; font-weight: 700;
    font-family: 'Plus Jakarta Sans', sans-serif;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(218,37,29,0.35);
  }
  .article-author-name {
    font-size: 14px; font-weight: 700; color: rgba(255,255,255,0.85);
    font-family: 'Plus Jakarta Sans', sans-serif;
  }
  .article-author-role { font-size: 12px; color: rgba(255,255,255,0.4); }

  /* ── ARTICLE BODY ────────────────────────────────── */
  .article-body {
    background: var(--white);
    border-radius: 24px;
    border: 1px solid var(--border);
    overflow: hidden;
    box-shadow: 0 8px 40px rgba(13,27,61,0.06);
  }
  .article-thumbnail {
    margin: 0;
    border-radius: 0;
    overflow: hidden;
    max-height: 450px;
  }
  .article-thumbnail img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
  }
  .article-content {
    padding: 40px;
    font-size: 16px;
    line-height: 1.9;
    color: #2d3748;
  }
  .article-content p { margin-bottom: 20px; }
  .article-content h2, .article-content h3 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    color: var(--charcoal);
    margin: 32px 0 14px;
  }
  .article-content h2 { font-size: 22px; }
  .article-content h3 { font-size: 18px; }
  .article-content ul, .article-content ol {
    padding-left: 20px; margin-bottom: 20px;
  }
  .article-content li { margin-bottom: 8px; }
  .article-content strong { color: var(--charcoal); }
  .article-content a { color: var(--clay); text-decoration: underline; }
  .article-content blockquote {
    border-left: 4px solid var(--terracotta);
    padding: 16px 24px;
    background: rgba(218,37,29,0.05);
    border-radius: 0 12px 12px 0;
    margin: 24px 0;
    font-style: italic;
    color: var(--muted);
  }

  /* Article Footer */
  .article-footer {
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 14px;
    padding: 24px 40px;
    border-top: 1px solid var(--border);
    background: var(--cream);
  }
  .article-tags {
    display: flex; flex-wrap: wrap; gap: 8px;
  }
  .article-tag {
    display: inline-flex; align-items: center; gap: 3px;
    background: rgba(0,32,96,0.07);
    color: var(--charcoal);
    font-size: 12px; font-weight: 600;
    font-family: 'Plus Jakarta Sans', sans-serif;
    padding: 4px 12px;
    border-radius: 50px;
    border: 1px solid var(--border);
  }
  .article-share {
    display: flex; align-items: center; gap: 8px;
  }
  .article-share-label {
    font-size: 12.5px; font-weight: 600; color: var(--muted);
    font-family: 'Plus Jakarta Sans', sans-serif;
  }
  .article-share-btn {
    width: 34px; height: 34px;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 15px;
    text-decoration: none;
    transition: all 0.2s;
    border: none; cursor: pointer;
  }
  .article-share-btn.whatsapp { background: #25D366; color: white; }
  .article-share-btn.facebook { background: #1877F2; color: white; }
  .article-share-btn.copy-link { background: rgba(0,32,96,0.08); color: var(--charcoal); border: 1px solid var(--border); }
  .article-share-btn:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }

  /* Author Card */
  .author-card {
    display: flex; align-items: center; gap: 16px;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 24px;
    margin-top: 24px;
    box-shadow: 0 4px 20px rgba(13,27,61,0.04);
  }
  .author-card-avatar {
    width: 56px; height: 56px;
    background: linear-gradient(135deg, var(--charcoal), #001a4a);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: white; font-size: 22px; font-weight: 700;
    font-family: 'Plus Jakarta Sans', sans-serif;
    flex-shrink: 0;
  }
  .author-card-label { font-size: 11px; color: var(--concrete); text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 3px; }
  .author-card-name { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 17px; font-weight: 700; color: var(--charcoal); }
  .author-card-role { font-size: 13px; color: var(--muted); }

  /* Navigation */
  .article-nav {
    margin-top: 24px;
  }
  .article-nav-back {
    display: inline-flex; align-items: center; gap: 8px;
    font-size: 14px; font-weight: 600;
    color: var(--charcoal);
    background: var(--white);
    border: 1.5px solid var(--border);
    padding: 10px 20px;
    border-radius: 10px;
    text-decoration: none;
    transition: all 0.2s;
    font-family: 'Plus Jakarta Sans', sans-serif;
  }
  .article-nav-back:hover {
    border-color: var(--terracotta);
    color: var(--terracotta);
    transform: translateX(-3px);
  }

  /* ── SIDEBAR ─────────────────────────────────────── */
  .sidebar-widget {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 24px;
    box-shadow: 0 4px 20px rgba(13,27,61,0.04);
  }
  .sidebar-widget-head {
    display: flex; align-items: center; gap: 8px;
    padding: 16px 20px;
    background: linear-gradient(135deg, var(--charcoal), #001a4a);
    color: white;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px; font-weight: 700;
    border-bottom: 3px solid var(--terracotta);
  }
  .sidebar-widget-head i { font-size: 15px; color: var(--clay); }
  .sidebar-widget-body { padding: 20px; }

  /* Related News */
  .related-news-item {
    display: flex; align-items: center; gap: 14px;
    padding: 16px 20px;
    border-bottom: 1px solid var(--border);
    text-decoration: none;
    transition: all 0.2s;
  }
  .related-news-item:last-child { border-bottom: none; }
  .related-news-item:hover { background: var(--cream); }
  .related-news-img {
    width: 70px; height: 58px;
    border-radius: 10px;
    overflow: hidden;
    flex-shrink: 0;
    background: var(--charcoal);
    position: relative;
  }
  .related-news-img img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform 0.3s;
  }
  .related-news-item:hover .related-news-img img { transform: scale(1.08); }
  .related-news-img-placeholder {
    position: absolute; inset: 0;
    display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, var(--charcoal), #001a4a);
  }
  .related-news-img-placeholder i { font-size: 22px; color: rgba(255,255,255,0.15); }
  .related-news-title {
    font-size: 13.5px; font-weight: 600;
    color: var(--charcoal);
    line-height: 1.4;
    margin-bottom: 5px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    transition: color 0.2s;
  }
  .related-news-item:hover .related-news-title { color: var(--terracotta); }
  .related-news-date {
    font-size: 11.5px;
    color: var(--concrete-lt);
    display: flex; align-items: center; gap: 4px;
  }

  /* Sidebar CTA */
  .sidebar-cta {
    background: linear-gradient(135deg, var(--charcoal) 0%, #001a4a 100%);
    border-radius: 20px;
    padding: 30px 24px;
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  .sidebar-cta::before {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(ellipse at 70% 20%, rgba(218,37,29,0.25) 0%, transparent 60%);
  }
  .sidebar-cta > * { position: relative; z-index: 1; }
  .sidebar-cta-icon {
    width: 54px; height: 54px;
    background: var(--terracotta);
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px;
    box-shadow: 0 6px 20px rgba(218,37,29,0.4);
  }
  .sidebar-cta-icon i { font-size: 24px; color: white; }
  .sidebar-cta h4 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 17px; font-weight: 700; color: white; margin-bottom: 8px;
  }
  .sidebar-cta p { font-size: 13.5px; color: rgba(255,255,255,0.5); line-height: 1.6; margin-bottom: 20px; }
  .sidebar-cta .btn-primary-hero { font-size: 14px; padding: 12px 20px; }

  @media (max-width: 768px) {
    .article-content { padding: 24px 20px; }
    .article-footer { padding: 18px 20px; }
    .article-hero { min-height: 360px; padding: 70px 0 40px; }
    .article-hero-title { font-size: 24px; letter-spacing: -0.5px; }
  }
</style>
@endpush

@push('scripts')
<script>
  function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(() => {
      const btn = document.getElementById('copyLinkBtn');
      btn.innerHTML = '<i class="bi bi-check2"></i>';
      btn.style.background = '#76C143';
      btn.style.color = 'white';
      setTimeout(() => {
        btn.innerHTML = '<i class="bi bi-link-45deg"></i>';
        btn.style.background = '';
        btn.style.color = '';
      }, 2000);
    });
  }
</script>
@endpush
