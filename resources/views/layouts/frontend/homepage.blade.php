@extends('layouts.frontend.template')

@section('title', 'Pusat Layanan Disabilitas (PLD UIS) — Kampus Inklusif, Ramah & Berkeadilan | Universitas Ibnu Sina')
@section('meta_description', 'Portal Resmi Pusat Layanan Disabilitas Universitas Ibnu Sina (PLD UIS) — Pendampingan Akademik, Konseling Psikologis, Akomodasi Ujian, Bahasa Isyarat BISINDO, dan Relawan Inklusif.')

@push('styles')
<style>
  /* ═══════════════════════════════════════════════
     HERO BANNER (FULLWIDTH & NATURAL ASPECT RATIO)
  ═══════════════════════════════════════════════ */
  .hero-slider-section {
    position: relative;
    background: transparent;
    overflow: hidden;
    width: 100%;
    margin: 0;
    padding: 0;
  }
  #heroCarousel,
  #heroCarousel .carousel-inner,
  #heroCarousel .carousel-item {
    width: 100%;
    height: auto;
  }
  .hero-banner-img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: contain;
  }
  .hero-slider-section .carousel-control-prev,
  .hero-slider-section .carousel-control-next {
    width: 48px;
    height: 48px;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(20, 27, 57, 0.6);
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
    background: var(--pld-purple);
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
    background-color: var(--pld-orange);
    opacity: 1;
  }

  /* ═══════════════════════════════════════════════
     LAYANAN TERKAIT (DIGITAL SERVICES CARDS)
  ═══════════════════════════════════════════════ */
  .layanan-terkait-section {
    background-color: #ffffff;
    position: relative;
    padding: 50px 0 35px 0;
  }
  .layanan-terkait-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 26px;
    font-weight: 800;
    color: var(--pld-purple, #283759);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 12px;
  }
  .layanan-terkait-desc {
    font-size: 15px;
    color: #444444;
    line-height: 1.65;
    max-width: 820px;
    margin: 0 auto;
  }
  .layanan-terkait-card {
    background: #283759;
    border: 1.5px solid rgba(255, 255, 255, 0.18);
    border-radius: 14px;
    padding: 18px 20px;
    min-height: 110px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-decoration: none !important;
    box-shadow: 0 6px 18px rgba(40, 55, 89, 0.35);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    overflow: hidden;
    height: 100%;
  }
  .layanan-terkait-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 0%;
    background: var(--pld-orange, #79a8e2);
    transition: height 0.3s ease;
  }
  .layanan-terkait-card:hover {
    transform: translateY(-5px);
    background: #1e2a45;
    border-color: #79a8e2;
    box-shadow: 0 14px 30px -4px rgba(40, 55, 89, 0.5), 0 0 0 2px #79a8e2;
  }
  .layanan-terkait-card:hover::before {
    height: 100%;
  }
  .layanan-terkait-logo-wrap {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    height: 38px;
    margin-bottom: 14px;
  }
  .layanan-terkait-logo {
    max-height: 36px;
    max-width: 65px;
    object-fit: contain;
    transition: transform 0.3s ease;
  }
  .layanan-terkait-card:hover .layanan-terkait-logo {
    transform: scale(1.1);
  }
  .layanan-terkait-icon {
    font-size: 26px;
    color: var(--pld-orange, #79a8e2);
    transition: transform 0.3s ease;
  }
  .layanan-terkait-card:hover .layanan-terkait-icon {
    transform: scale(1.15);
  }
  .layanan-terkait-name {
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: #ffffff;
    font-size: 13.5px;
    font-weight: 800;
    letter-spacing: 0.4px;
    text-transform: uppercase;
    margin: 0;
    line-height: 1.35;
    transition: color 0.25s ease;
  }
  .layanan-terkait-card:hover .layanan-terkait-name {
    color: var(--pld-orange, #79a8e2);
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
    background: var(--pld-purple-light);
  }
  .stat-num-val {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 30px;
    font-weight: 800;
    color: var(--pld-purple);
    line-height: 1;
    margin-bottom: 6px;
  }
  .stat-num-val sup {
    color: var(--pld-orange);
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
    background: var(--pld-purple);
  }
  .prodi-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: var(--border-purple);
  }
  .prodi-badge {
    display: inline-block;
    background: var(--pld-orange-light);
    color: var(--pld-orange-dark);
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
    color: var(--pld-purple);
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
    color: var(--pld-purple);
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
    background: var(--pld-purple-light);
    color: var(--pld-purple);
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
    background: var(--pld-purple-light);
    color: var(--pld-purple);
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
    color: var(--pld-orange-dark);
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
  .section-heading-pld {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 27px;
    font-weight: 800;
    color: var(--pld-purple, #283759);
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
    border-color: var(--pld-purple, #283759);
    box-shadow: 0 0 0 3px rgba(40, 55, 89, 0.14);
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
    color: var(--pld-purple, #283759);
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
    background: var(--pld-purple-light, #eef4fc);
    transform: translateY(-2px);
  }
  .news-mini-item:hover .news-mini-title {
    color: var(--pld-purple, #283759);
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
    background: var(--pld-purple-light, #eef4fc);
    color: var(--pld-purple, #283759);
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

  /* Button PLD Pill */
  .btn-pld-pill {
    display: inline-block;
    background: var(--pld-purple, #283759);
    color: #ffffff !important;
    font-size: 13.5px;
    font-weight: 700;
    padding: 10px 26px;
    border-radius: 50px;
    text-decoration: none !important;
    transition: all 0.25s ease;
    box-shadow: 0 4px 14px rgba(40, 55, 89, 0.25);
  }
  .btn-pld-pill:hover {
    background: var(--pld-purple-dark, #1e2a45);
    color: var(--pld-orange, #79a8e2) !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(40, 55, 89, 0.35);
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
    background: var(--pld-purple-light, #eef4fc);
    border-color: var(--pld-purple, #283759);
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
    background: var(--pld-orange, #79a8e2);
    color: #141b39;
    font-size: 13.5px;
    font-weight: 800;
    border-radius: 10px;
    padding: 10px 16px;
    box-shadow: 0 2px 6px rgba(121, 168, 226, 0.25);
    line-height: 1.35;
  }
  .btn-agenda-pill {
    display: block;
    width: 100%;
    text-align: center;
    background: var(--pld-purple-light, #eef4fc);
    border: 1px solid var(--pld-purple-subtle, #dbe7f7);
    color: var(--pld-purple, #283759) !important;
    font-size: 13px;
    font-weight: 700;
    padding: 9px 16px;
    border-radius: 50px;
    text-decoration: none !important;
    transition: all 0.2s ease;
  }
  .btn-agenda-pill:hover {
    background: var(--pld-purple, #283759);
    color: #ffffff !important;
  }

  /* PMB Banner Box */
  .pmb-cta-box {
    background: #283759;
    background: linear-gradient(135deg, #283759 0%, #60237c 100%);
    border-radius: 28px;
    padding: 56px 44px;
    color: var(--white);
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 0 20px 45px -12px rgba(40, 55, 89, 0.5);
  }

  /* BuildWithAngga Style 2-Row Infinite Marquee */
  .marquee-wrapper {
    position: relative;
    overflow: hidden;
    padding: 15px 0;
    mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);
    -webkit-mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);
  }
  .marquee-track-container {
    overflow: hidden;
    display: flex;
    width: 100%;
  }
  .marquee-track {
    display: flex;
    gap: 20px;
    width: max-content;
    will-change: transform;
  }
  .marquee-left {
    animation: scrollMarqueeLeft 40s linear infinite;
  }
  .marquee-right {
    animation: scrollMarqueeRight 40s linear infinite;
  }
  .marquee-wrapper:hover .marquee-track {
    animation-play-state: paused;
  }
  @keyframes scrollMarqueeLeft {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }
  @keyframes scrollMarqueeRight {
    0% { transform: translateX(-50%); }
    100% { transform: translateX(0); }
  }

  .partner-marquee-card {
    background: var(--white);
    border: 1.5px solid var(--border-light);
    border-radius: 18px;
    padding: 14px 26px;
    height: 84px;
    min-width: 220px;
    max-width: 260px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.03);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    flex-shrink: 0;
  }
  .partner-marquee-card:hover {
    transform: translateY(-4px);
    border-color: var(--pld-purple, #283759);
    box-shadow: 0 12px 25px -8px rgba(40, 55, 89, 0.25);
  }
  .partner-marquee-img {
    max-height: 48px;
    max-width: 170px;
    object-fit: contain;
    filter: grayscale(15%);
    transition: all 0.3s ease;
  }
  .partner-marquee-card:hover .partner-marquee-img {
    filter: grayscale(0%);
    transform: scale(1.06);
  }
  .partner-marquee-text {
    font-weight: 700;
    color: var(--obsidian-dark, #141b39);
    font-size: 13.5px;
    text-align: center;
    line-height: 1.35;
  }

  /* Prestasi Cards */
  .prestasi-card {
    background: var(--white);
    border: 1px solid var(--border-light);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    display: flex;
    flex-direction: column;
    height: 100%;
  }
  .prestasi-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 35px -10px rgba(40, 55, 89, 0.15);
    border-color: rgba(40, 55, 89, 0.3);
  }
  .prestasi-img-wrap {
    width: 100%;
    height: 240px;
    position: relative;
    background: #141b39;
    overflow: hidden;
    display: block;
  }
  @media (max-width: 575.98px) {
    .prestasi-img-wrap {
      height: 210px;
    }
  }
  .prestasi-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    display: block;
    transition: transform 0.4s ease;
  }
  .prestasi-card:hover .prestasi-img {
    transform: scale(1.05);
  }
  .prestasi-tingkat-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 4px 10px;
    font-size: 11px;
    font-weight: 700;
    border-radius: 20px;
    letter-spacing: 0.5px;
    backdrop-filter: blur(6px);
  }
  .prestasi-rank-badge {
    position: absolute;
    bottom: 12px;
    right: 12px;
    background: #e5a823;
    color: #141b39;
    padding: 4px 10px;
    font-size: 11px;
    font-weight: 800;
    border-radius: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  }

  /* Gallery Showcase Cards */
  .gallery-card-item {
    border-radius: 20px;
    overflow: hidden;
    background: var(--white);
    border: 1px solid var(--border-light);
    box-shadow: var(--shadow-sm);
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    height: 100%;
  }
  .gallery-card-item:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 35px -10px rgba(40, 55, 89, 0.25);
    border-color: rgba(40, 55, 89, 0.35);
  }
  .gallery-img-container {
    height: 240px;
    position: relative;
    overflow: hidden;
    background: #141b39;
  }
  .gallery-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }
  .gallery-card-item:hover .gallery-card-img {
    transform: scale(1.08);
  }
  .gallery-fallback-box {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #283759 0%, #141b39 100%);
  }
  .gallery-card-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 24px 20px 18px;
    background: linear-gradient(180deg, rgba(19, 10, 36, 0) 0%, rgba(19, 10, 36, 0.92) 55%, #130a24 100%);
    color: #ffffff;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
  }
  .gallery-tag {
    align-self: flex-start;
    background: rgba(229, 168, 35, 0.95);
    color: #141b39;
    font-weight: 800;
    font-size: 10px;
    letter-spacing: 0.5px;
    padding: 3px 8px;
    border-radius: 20px;
    margin-bottom: 6px;
    text-transform: uppercase;
  }
  .gallery-card-title {
    font-size: 15.5px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 4px;
    line-height: 1.35;
  }
  .gallery-card-desc {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.5;
  }

  /* Custom Pagination */
  .pagination {
    gap: 5px;
    margin-bottom: 0;
  }
  .page-item .page-link {
    border-radius: 10px !important;
    border: 1px solid var(--border-light);
    color: var(--text-dark);
    font-size: 13px;
    font-weight: 600;
    padding: 6px 14px;
    transition: all 0.2s ease;
  }
  .page-item.active .page-link {
    background-color: var(--pld-purple, #283759) !important;
    border-color: var(--pld-purple, #283759) !important;
    color: #ffffff !important;
    box-shadow: 0 4px 12px rgba(40, 55, 89, 0.35);
  }
  .page-item .page-link:hover {
    background-color: #f3e8f8;
    color: var(--pld-purple, #283759);
    border-color: var(--pld-purple, #283759);
  }

  /* PMB WhatsApp Outline Button */
  .btn-pmb-wa {
    background: rgba(255, 255, 255, 0.12);
    color: #ffffff;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    font-size: 15px;
    padding: 14px 28px;
    border-radius: 12px;
    border: 1.5px solid rgba(255, 255, 255, 0.45);
    display: inline-flex;
    align-items: center;
    gap: 9px;
    transition: all 0.25s ease;
    text-decoration: none;
  }
  .btn-pmb-wa i {
    color: #25D366; /* WhatsApp Green */
    font-size: 18px;
    transition: transform 0.25s ease;
  }
  .btn-pmb-wa:hover {
    background: #ffffff !important;
    color: #283759 !important;
    border-color: #ffffff !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  }
  .btn-pmb-wa:hover i {
    color: #25D366 !important;
    transform: scale(1.15);
  }

  /* Mobile Fullwidth Buttons & Overflow Fix */
  @media (max-width: 767.98px) {
    .pmb-btn-group,
    .cta-btn-group {
      flex-direction: column !important;
      width: 100% !important;
    }
    .pmb-btn-group .btn-primary-hero,
    .pmb-btn-group .btn-pmb-wa,
    .cta-btn-group .btn-primary-hero,
    .cta-btn-group .btn-outline-hero,
    .cta-btn-group a {
      width: 100% !important;
      justify-content: center !important;
      text-align: center !important;
    }
    .pmb-cta-box {
      padding: 30px 18px !important;
      border-radius: 20px !important;
    }
    .pmb-badge-wrap {
      white-space: normal !important;
      word-break: break-word !important;
      line-height: 1.4 !important;
      display: inline-block !important;
      max-width: 100% !important;
    }
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
            <img src="{{ asset('storage/' . $imgPath) }}" alt="{{ $banner->judul ?? 'Banner Promosi PLD UIS' }}" class="hero-banner-img">
          </div>
        @endforeach
      @else
        <div class="carousel-item active">
          <div class="hero-banner-img d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #141b39 0%, #141b39 100%); min-height: 360px; color: #ffffff;">
            <div class="text-center p-4">
              <div class="mb-3">
                <i class="bi bi-megaphone fs-1" style="color: var(--pld-orange);"></i>
              </div>
              <h2 class="fw-bold mb-2" style="color: #ffffff; letter-spacing: -0.5px;">PUSAT LAYANAN DISABILITAS — PLD UIS</h2>
              <p class="text-white-50 small mb-0" style="max-width: 540px; margin: 0 auto;">
                Mewujudkan ekosistem pendidikan tinggi yang setara, aksesibel, dan berkeadilan bagi seluruh mahasiswa berkebutuhan khusus di Universitas Ibnu Sina.
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
     2. LAYANAN TERKAIT (PORTAL & DIGITAL SERVICES)
═══════════════════════════════════════════════ -->
@if(isset($layananTerkaits) && $layananTerkaits->count() > 0)
<section class="layanan-terkait-section" id="layanan-terkait">
  <div class="container">
    {{-- Header Title & Subtitle --}}
    <div class="text-center mb-4" data-aos="fade-up">
      <h2 class="layanan-terkait-title">
        {{ $layananTerkaitSetting->judul_seksi ?? 'SISTEM & LAYANAN AKSESIBILITAS' }}
      </h2>
      @if(!empty($layananTerkaitSetting?->subjudul_seksi))
        <p class="layanan-terkait-desc">
          “{{ $layananTerkaitSetting->subjudul_seksi }}”
        </p>
      @endif
    </div>

    {{-- Grid 4 Columns of Dark Cards --}}
    <div class="row g-3 g-lg-4 justify-content-center">
      @foreach($layananTerkaits as $item)
        <div class="col-xl-3 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="{{ min(400, 50 * ($loop->index + 1)) }}">
          <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="layanan-terkait-card" title="{{ $item->deskripsi ?? $item->nama }}">
            {{-- Top Right Logo / Icon --}}
            <div class="layanan-terkait-logo-wrap">
              @if($item->logo_url)
                <img src="{{ $item->logo_url }}" alt="{{ $item->nama }}" class="layanan-terkait-logo">
              @else
                <i class="bi {{ $item->icon ?: 'bi-box-arrow-up-right' }} layanan-terkait-icon"></i>
              @endif
            </div>

            {{-- Bottom Left Service Name --}}
            <h3 class="layanan-terkait-name">
              {{ $item->nama }}
            </h3>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif



<!-- ═══════════════════════════════════════════════
     3. PROFIL SINGKAT PLD UIS & SAMBUTAN DEKAN
═══════════════════════════════════════════════ -->
<section class="section-bg-white py-5" id="profil-singkat">
  <div class="container py-2">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6" data-aos="fade-right">
        <div class="section-label">Profil PLD UIS</div>
        <h2 class="section-title">
          {{ $about->judul_profil ?? 'Mewujudkan Kampus Inklusif, Ramah & Berkeadilan' }}
        </h2>
        <div class="divider-line"></div>
        <div class="section-desc mb-4" style="text-align: justify; line-height: 1.8;">
          {!! $about->deskripsi_profil_1 ?? 'Pusat Layanan Disabilitas (PLD) Universitas Ibnu Sina adalah unit kerja yang berkomitmen mewujudkan lingkungan perguruan tinggi yang inklusif, adaptif, ramah, dan setara bagi seluruh mahasiswa berkebutuhan khusus.' !!}
        </div>

        @if(!empty($about?->deskripsi_profil_2))
          <div class="section-desc mb-4" style="text-align: justify; line-height: 1.8;">
            {!! $about->deskripsi_profil_2 !!}
          </div>
        @endif

        <ul class="check-list mb-4">
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Pendampingan akademik, notetaker, dan juru bahasa isyarat (BISINDO) bersertifikasi</span>
          </li>
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Resource Center inklusif & fasilitas teknologi asistif mutakhir bagi mahasiswa</span>
          </li>
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Konseling psikologis terpadu & pembinaan relawan mahasiswa berkepedulian tinggi</span>
          </li>
        </ul>

        <a href="{{ route('homepage.sejarah') }}" class="btn-primary-hero">
          <i class="bi bi-info-circle"></i>
          Profil Lengkap PLD UIS
        </a>
      </div>

      <!-- Sambutan Dekan Card -->
      <div class="col-lg-6" data-aos="fade-left">
        <div class="p-4 p-md-5 rounded-4 shadow-sm" style="background: var(--surface-light); border: 1.5px solid var(--border-light);">
          <div class="d-flex align-items-center gap-3 mb-4">
            @if(!empty($sambutanDekan?->foto_dekan))
              <img src="{{ asset('storage/' . $sambutanDekan->foto_dekan) }}" alt="{{ $sambutanDekan->nama_dekan ?? 'Dekan PLD UIS' }}" class="rounded-circle shadow-sm" style="width: 72px; height: 72px; object-fit: cover; border: 3px solid var(--pld-purple); flex-shrink:0;">
            @else
              <div style="width: 68px; height: 68px; border-radius: 50%; background: linear-gradient(135deg, var(--pld-purple) 0%, #141b39 100%); color: white; display:flex; align-items:center; justify-content:center; font-size:28px; flex-shrink:0; border: 3px solid var(--pld-orange);">
                <i class="bi bi-person-badge-fill"></i>
              </div>
            @endif
            <div>
              <h5 class="fw-bold mb-1 text-dark">{{ $sambutanDekan->nama_dekan ?? 'Dr. H. Ahmad Syafi\'i, M.Ed.' }}</h5>
              <span class="text-muted small fw-semibold">{{ $sambutanDekan->jabatan_dekan ?? 'Kepala Pusat Layanan Disabilitas UIS' }}</span>
            </div>
          </div>

          <blockquote class="text-muted mb-4" style="font-style: italic; line-height: 1.8; text-align: justify; font-size: 14.5px;">
            "{{ strip_tags($sambutanDekan->kutipan_singkat ?? ($sambutanDekan->sambutan_dekan ?? 'Selamat datang di Pusat Layanan Disabilitas Universitas Ibnu Sina. Kami percaya bahwa setiap insan berhak mendapatkan akses pendidikan tinggi yang bermutu, adil, dan berkesetaraan. Bersama-sama, mari kita ciptakan kampus ramah disabilitas yang menginspirasi.')) }}"
          </blockquote>

          <div class="d-flex align-items-center justify-content-between pt-3 border-top">
            <span class="fw-bold" style="color: var(--pld-purple);">{{ $sambutanDekan->nama_dekan ?? 'Pimpinan PLD UIS' }}</span>
            <a href="{{ route('homepage.sambutan-dekan') }}" class="badge text-decoration-none" style="background: var(--pld-orange); color: #141b39; font-weight: 800; padding: 6px 12px;">
              Baca Sambutan <i class="bi bi-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     3b. STATISTIK FAKULTAS — "PLD DALAM ANGKA"
═══════════════════════════════════════════════ -->
@if(isset($facultyStat) && $facultyStat)
<section id="statistik-fakultas" style="background: linear-gradient(135deg, #5a2870 0%, #283759 40%, #141b39 100%); padding: 40px 0; overflow: hidden; position: relative;">

  {{-- Decorative blur shapes --}}
  <div style="position:absolute;top:-60px;left:-60px;width:220px;height:220px;border-radius:50%;background:rgba(255,255,255,0.05);pointer-events:none;"></div>
  <div style="position:absolute;bottom:-80px;right:5%;width:300px;height:300px;border-radius:50%;background:rgba(255,255,255,0.04);pointer-events:none;"></div>

  <div class="container" style="position:relative;z-index:1;">
    <div class="row align-items-center g-4">

      {{-- Kiri: Teks + Angka --}}
      <div class="col-lg-7" data-aos="fade-right">
        <h2 style="color:#fff;font-size:clamp(1.35rem,3vw,1.95rem);font-weight:700;margin-bottom:22px;line-height:1.25;text-shadow:0 2px 6px rgba(0,0,0,0.3);">
          {{ $facultyStat->title }}
        </h2>

        <div class="row g-2 g-sm-3">
          {{-- Layanan Utama --}}
          <div class="col-6 col-sm-3">
            <div style="text-align:center;padding:14px 8px;background:rgba(255,255,255,0.1);border-radius:16px;border:1px solid rgba(255,255,255,0.18);backdrop-filter:blur(8px);height:100%;display:flex;flex-direction:column;justify-content:center;">
              <div class="stat-count" data-target="{{ $facultyStat->jumlah_prodi }}"
                   style="font-size:clamp(1.7rem,4vw,2.4rem);font-weight:800;color:#79a8e2;line-height:1;font-family:'Plus Jakarta Sans',sans-serif;letter-spacing:-0.5px;">
                {{ $facultyStat->jumlah_prodi }}
              </div>
              <div style="color:rgba(255,255,255,0.9);font-size:0.75rem;margin-top:6px;font-weight:600;letter-spacing:0.3px;text-transform:uppercase;">
                Layanan Utama
              </div>
            </div>
          </div>

          {{-- Total Mahasiswa Didampingi --}}
          <div class="col-6 col-sm-3">
            <div style="text-align:center;padding:14px 8px;background:rgba(255,255,255,0.1);border-radius:16px;border:1px solid rgba(255,255,255,0.18);backdrop-filter:blur(8px);height:100%;display:flex;flex-direction:column;justify-content:center;">
              <div class="stat-count" data-target="{{ $facultyStat->total_mahasiswa }}"
                   style="font-size:clamp(1.7rem,4vw,2.4rem);font-weight:800;color:#79a8e2;line-height:1;font-family:'Plus Jakarta Sans',sans-serif;letter-spacing:-0.5px;">
                {{ number_format($facultyStat->total_mahasiswa, 0, ',', '.') }}
              </div>
              <div style="color:rgba(255,255,255,0.9);font-size:0.75rem;margin-top:6px;font-weight:600;letter-spacing:0.3px;text-transform:uppercase;">
                Mahasiswa Didampingi
              </div>
            </div>
          </div>

          {{-- Relawan Inklusif --}}
          <div class="col-6 col-sm-3">
            <div style="text-align:center;padding:14px 8px;background:rgba(255,255,255,0.1);border-radius:16px;border:1px solid rgba(255,255,255,0.18);backdrop-filter:blur(8px);height:100%;display:flex;flex-direction:column;justify-content:center;">
              <div class="stat-count" data-target="{{ $facultyStat->total_dosen }}"
                   style="font-size:clamp(1.7rem,4vw,2.4rem);font-weight:800;color:#79a8e2;line-height:1;font-family:'Plus Jakarta Sans',sans-serif;letter-spacing:-0.5px;">
                {{ $facultyStat->total_dosen }}
              </div>
              <div style="color:rgba(255,255,255,0.9);font-size:0.75rem;margin-top:6px;font-weight:600;letter-spacing:0.3px;text-transform:uppercase;">
                Relawan Inklusif
              </div>
            </div>
          </div>

          {{-- Sesi Pendampingan --}}
          <div class="col-6 col-sm-3">
            <div style="text-align:center;padding:14px 8px;background:rgba(255,255,255,0.1);border-radius:16px;border:1px solid rgba(255,255,255,0.18);backdrop-filter:blur(8px);height:100%;display:flex;flex-direction:column;justify-content:center;">
              <div class="stat-count" data-target="{{ $facultyStat->total_alumni }}"
                   style="font-size:clamp(1.7rem,4vw,2.4rem);font-weight:800;color:#79a8e2;line-height:1;font-family:'Plus Jakarta Sans',sans-serif;letter-spacing:-0.5px;">
                {{ number_format($facultyStat->total_alumni, 0, ',', '.') }}
              </div>
              <div style="color:rgba(255,255,255,0.9);font-size:0.75rem;margin-top:6px;font-weight:600;letter-spacing:0.3px;text-transform:uppercase;">
                Sesi Pendampingan
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Kanan: Gambar --}}
      @if($facultyStat->image)
      <div class="col-lg-5 d-flex justify-content-center justify-content-lg-end" data-aos="fade-left">
        <div class="w-100 position-relative" style="max-width:440px;border-radius:18px;overflow:hidden;box-shadow:0 12px 35px rgba(0,0,0,0.35);border:2.5px solid rgba(255,255,255,0.25);">
          <img src="{{ asset('storage/' . $facultyStat->image) }}"
               alt="{{ $facultyStat->title }}"
               loading="lazy"
               style="width:100%;height:210px;object-fit:cover;display:block;">
          {{-- Overlay label --}}
          <div style="position:absolute;bottom:10px;left:10px;background:rgba(0,0,0,0.65);color:#fff;padding:4px 12px;border-radius:20px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(6px);letter-spacing:0.3px;">
            📍 PLD — Universitas Ibnu Sina
          </div>
        </div>
      </div>
      @endif

    </div>
  </div>
</section>

{{-- Counter animation script --}}
@push('scripts')
<script>
(function () {
  function formatNum(n) {
    return n.toLocaleString('id-ID'); // ribuan: 1.814
  }

  function animateCounters() {
    document.querySelectorAll('.stat-count').forEach(function (el) {
      const target = parseInt(el.getAttribute('data-target'), 10);
      if (!target || el.dataset.animated) return;
      el.dataset.animated = '1';
      const duration = 1800;
      const step = 16;
      const steps = Math.floor(duration / step);
      let current = 0;
      const increment = target / steps;
      const timer = setInterval(function () {
        current += increment;
        if (current >= target) {
          current = target;
          clearInterval(timer);
        }
        el.textContent = formatNum(Math.floor(current));
      }, step);
    });
  }

  // Trigger on scroll into view
  const section = document.getElementById('statistik-fakultas');
  if (section && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          animateCounters();
          observer.disconnect();
        }
      });
    }, { threshold: 0.3 });
    observer.observe(section);
  } else if (section) {
    animateCounters();
  }
})();
</script>
@endpush

@endif

<!-- ═══════════════════════════════════════════════
     4. LAYANAN PENDAMPINGAN & KONSELING
═══════════════════════════════════════════════ -->
<section class="section-bg-sand" id="prodi">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Layanan Unggulan</div>
      <h2 class="section-title">Layanan Pendampingan &amp; <em>Konseling</em> PLD UIS</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Layanan terpadu yang dirancang untuk menjamin hak belajar, akomodasi ujian, kesehatan mental, serta aksesibilitas penuh bagi seluruh mahasiswa disabilitas.
      </p>
    </div>

    <div class="row g-4">
      @if(isset($layanans) && $layanans->count() > 0)
        @foreach($layanans as $index => $l)
          @php
            $rincianItems = $l->rincian ? array_filter(array_map('trim', explode("\n", $l->rincian))) : [];
            $prodiUrl = !empty($l->link) ? $l->link : route('homepage.layanan.detail', $l->id);
            $isExternal = !empty($l->link) && (str_starts_with($l->link, 'http://') || str_starts_with($l->link, 'https://'));
          @endphp
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
            <div class="prodi-card h-100 d-flex flex-column justify-content-between">
              <div>
                @if($l->dasar_hukum)
                  <span class="prodi-badge">{{ $l->dasar_hukum }}</span>
                @endif
                <h3 class="prodi-title" style="font-size:20px;">{{ $l->judul }}</h3>
                <div class="text-muted small mb-3 prodi-desc" style="line-height: 1.65; text-align: justify;">
                  {!! $l->deskripsi !!}
                </div>

                @if(!empty($l->rincian))
                  <div class="prodi-subhead mb-2"><i class="bi bi-award-fill me-1"></i> Kompetensi / Keunggulan:</div>
                  @if(str_contains($l->rincian, '<') && str_contains($l->rincian, '>'))
                    <div class="prodi-rich-rincian small mb-0">
                      {!! $l->rincian !!}
                    </div>
                  @else
                    <ul class="prodi-list">
                      @foreach(array_slice($rincianItems, 0, 4) as $point)
                        <li><i class="bi bi-check-circle-fill"></i> {{ $point }}</li>
                      @endforeach
                    </ul>
                  @endif
                @endif
              </div>

              <div class="mt-4 pt-3 border-top">
                <a href="{{ $prodiUrl }}" @if($isExternal) target="_blank" rel="noopener noreferrer" @endif class="btn-primary-hero w-100 justify-content-center" style="font-size:13px; padding:10px 16px;">
                  Detail {{ $l->judul }} @if($isExternal)<i class="bi bi-box-arrow-up-right ms-1"></i>@else<i class="bi bi-arrow-right"></i>@endif
                </a>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     5. KEUNGGULAN LAYANAN INKLUSIF PLD UIS
═══════════════════════════════════════════════ -->
<section class="section-bg-white">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Keunggulan Kami</div>
      <h2 class="section-title">Mengapa Memilih Layanan <em>PLD UIS</em>?</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Kami menghadirkan ekosistem pendampingan yang adaptif, manusiawi, dan berorientasi pada pencapaian prestasi akademik serta kemandirian mahasiswa.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="value-card">
          <div class="value-icon-wrap"><i class="bi bi-universal-access"></i></div>
          <div class="value-title">Akomodasi Ujian &amp; Kelas</div>
          <p class="value-desc">Penyesuaian durasi waktu ujian, pendamping pembaca soal, serta ruang ujian adaptif sesuai kebutuhan khusus mahasiswa.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="value-card">
          <div class="value-icon-wrap"><i class="bi bi-translate"></i></div>
          <div class="value-title">Juru Bahasa Isyarat (BISINDO)</div>
          <p class="value-desc">Penerjemah isyarat profesional yang siap mendampingi perkuliahan tatap muka, seminar daring, dan proses wisuda.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="value-card">
          <div class="value-icon-wrap"><i class="bi bi-pencil-square"></i></div>
          <div class="value-title">Relawan Notetaker Sebaya</div>
          <p class="value-desc">Pendampingan pencatatan materi perkuliahan secara sistematis untuk memastikan tidak ada materi ajar yang terlewat.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
        <div class="value-card">
          <div class="value-icon-wrap"><i class="bi bi-heart-pulse-fill"></i></div>
          <div class="value-title">Konseling Psikologis Ramah</div>
          <p class="value-desc">Dukungan kesehatan mental, motivasi akademik, dan pemulihan psikologis bersama psikolog berlisensi dengan kerahasiaan penuh.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
        <div class="value-card">
          <div class="value-icon-wrap"><i class="bi bi-laptop"></i></div>
          <div class="value-title">Resource Center &amp; Asistif</div>
          <p class="value-desc">Akses komputer ber-screen reader (NVDA/JAWS), scanner konversi teks ke audio, serta materi literatur berhuruf Braille.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
        <div class="value-card">
          <div class="value-icon-wrap"><i class="bi bi-stars"></i></div>
          <div class="value-title">Budaya Kampus Inklusif</div>
          <p class="value-desc">Sosialisasi etika interaksi disabilitas berkelanjutan guna membangun lingkungan kampus UIS yang saling menghargai tanpa stigma.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     6. FASILITAS & RESOURCE CENTER INKLUSIF
═══════════════════════════════════════════════ -->
<section class="section-bg-sand" id="fasilitas">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Sarana Aksesibel</div>
      <h2 class="section-title">Fasilitas &amp; <em>Resource Center Ramah Disabilitas</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Menunjang kemandirian proses belajar dan mobilitas sivitas akademika dengan fasilitas aksesibilitas dan teknologi asistif berstandar nasional.
      </p>
    </div>

    <div class="row g-4">
      @if(isset($saranas) && $saranas->count())
        @foreach($saranas as $index => $sarana)
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
            <div class="fasilitas-box">
              <div class="fasilitas-icon"><i class="bi {{ $sarana->icon ?? 'bi-universal-access-circle' }}"></i></div>
              <h4 class="fw-bold mb-2">{{ $sarana->nama }}</h4>
              <p class="text-muted small mb-0">{{ $sarana->deskripsi ?: 'Fasilitas ramah disabilitas yang mendukung kenyamanan dan proses belajar mahasiswa.' }}</p>
            </div>
          </div>
        @endforeach
      @else
        <div class="col-12 text-center text-muted py-4">
          Belum ada data sarana yang dipublikasikan.
        </div>
      @endif
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     7. PROGRAM KERJA STRATEGIS PLD UIS
═══════════════════════════════════════════════ -->
<section class="section-bg-white py-5" id="program-kerja">
  <div class="container py-2">
    <div class="d-flex align-items-end justify-content-between mb-5 flex-wrap gap-3" data-aos="fade-up">
      <div>
        <div class="section-label mb-2">Agenda Aksi</div>
        <h2 class="section-title mb-0">Program Kerja <em>PLD UIS</em></h2>
      </div>
      <a href="{{ route('homepage.program-kerja') }}" class="btn-outline-hero" style="color: var(--pld-purple); border-color: var(--pld-purple); font-size: 13.5px; padding: 10px 22px;">
        <i class="bi bi-grid-fill me-1"></i> Lihat Semua Program
      </a>
    </div>

    <div class="row g-4">
      @if(isset($homeProgramKerjas) && $homeProgramKerjas->count() > 0)
        @foreach($homeProgramKerjas as $pk)
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
            <div class="p-4 rounded-4 bg-white h-100 d-flex flex-column justify-content-between shadow-sm" style="border: 1px solid var(--border-light, #e2e8f0); transition: all 0.3s ease;">
              <div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <span class="badge px-3 py-1" style="background: var(--pld-purple-light, #eef2ff); color: var(--pld-purple, #283759); font-size: 11px; font-weight: 700; border-radius: 6px;">{{ $pk->kategori }}</span>
                  <span class="badge bg-light text-dark border small" style="font-size: 11px;">{{ $pk->status }}</span>
                </div>
                <h4 class="fw-bold text-dark fs-6 mb-2">{{ $pk->judul }}</h4>
                <p class="text-secondary small mb-3" style="line-height: 1.6;">{{ Str::limit($pk->deskripsi, 120) }}</p>
              </div>
              <div class="pt-3 border-top mt-auto small text-muted">
                @if($pk->target_waktu)
                  <div><i class="bi bi-calendar3 me-1 text-primary"></i> {{ $pk->target_waktu }}</div>
                @endif
                @if($pk->sasaran)
                  <div><i class="bi bi-people-fill me-1 text-success"></i> {{ $pk->sasaran }}</div>
                @endif
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     8. PROGRAM VOLUNTEER & RELAWAN INKLUSIF
═══════════════════════════════════════════════ -->
<section class="py-5" style="background: linear-gradient(135deg, #141b39 0%, #283759 100%); color: #ffffff;" id="volunteer-cta">
  <div class="container py-3">
    <div class="row align-items-center g-5">
      <div class="col-lg-7" data-aos="fade-right">
        <span class="badge px-3 py-2 rounded-pill mb-3" style="background: rgba(121, 168, 226, 0.25); color: #79a8e2; font-weight: 800; font-size: 12px; letter-spacing: 0.5px;">
          <i class="bi bi-heart-fill text-danger me-1"></i> OPEN RECRUITMENT VOLUNTEER
        </span>
        <h2 class="display-6 fw-bold text-white mb-3">Jadilah Sahabat Belajar &amp; <em>Relawan Inklusif</em></h2>
        <p class="text-white-50 mb-4" style="line-height: 1.8; font-size: 15px;">
          Bergabunglah bersama keluarga besar Pusat Layanan Disabilitas Universitas Ibnu Sina sebagai relawan pendamping akademik (notetaker, reader, mobilitas) dan juru bahasa isyarat. Raih pengalaman sosial nyata, pelatihan BISINDO bersertifikat, dan poin SKPI resmi Rektorat.
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="{{ route('homepage.volunteer') }}" class="btn btn-warning px-4 py-3 fw-bold rounded-pill shadow" style="background: #ffd166; color: #141b39; border: none;">
            <i class="bi bi-send-fill me-1"></i> Daftar Relawan Sekarang
          </a>
          <a href="{{ route('homepage.layanan') }}" class="btn btn-outline-light px-4 py-3 rounded-pill fw-semibold">
            <i class="bi bi-info-circle me-1"></i> Pelajari Layanan PLD
          </a>
        </div>
      </div>
      <div class="col-lg-5" data-aos="fade-left">
        <div class="p-4 rounded-4" style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px);">
          <h5 class="fw-bold text-white mb-3"><i class="bi bi-stars text-warning me-2"></i>Manfaat Menjadi Relawan:</h5>
          <ul class="text-white-50 small list-unstyled mb-0 d-flex flex-column gap-2" style="line-height: 1.7;">
            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Pelatihan Intensif Bahasa Isyarat (BISINDO) &amp; Etika Disabilitas</li>
            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Sertifikat Resmi Rektorat &amp; Konversi Poin SKPI</li>
            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Penyesuaian Jadwal Fleksibel Mengikuti Jam Kuliah</li>
            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Jejaring Sosial Lintas Fakultas &amp; Portofolio Pengabdian</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     9. PRESTASI MAHASISWA & STUDENT LIFE
═══════════════════════════════════════════════ -->
<section class="section-bg-white" id="prestasi">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Kebanggaan Kampus</div>
      <h2 class="section-title">Prestasi Gemilang <em>Mahasiswa PLD</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Bukti dedikasi, keunggulan riset, dan daya saing mahasiswa Pelayanan Disabilitas di berbagai kompetisi ilmiah dan kejuaraan.
      </p>
    </div>

    @if(isset($prestasis) && $prestasis->count() > 0)
      <div class="row g-4 mb-5">
        @foreach($prestasis as $index => $prestasi)
          @php
            $tingkatBadge = match($prestasi->tingkat) {
                'Internasional' => 'bg-danger text-white',
                'Nasional'      => 'bg-success text-white',
                'Provinsi / Wilayah' => 'bg-primary text-white',
                default         => 'bg-secondary text-white',
            };
          @endphp
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
            <div class="prestasi-card">
              <div class="prestasi-img-wrap">
                @if(!empty($prestasi->foto))
                  <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="{{ $prestasi->judul_prestasi }}" class="prestasi-img">
                @else
                  <div class="d-flex align-items-center justify-content-center h-100 text-white flex-column gap-2" style="background: linear-gradient(135deg, #283759 0%, #4a1563 100%);">
                    <i class="bi bi-trophy-fill" style="font-size: 44px; color: #ffd166;"></i>
                    <span class="small fw-semibold text-white-50">PLD UIS Achievement</span>
                  </div>
                @endif
                <span class="prestasi-tingkat-badge badge {{ $tingkatBadge }}">
                  <i class="bi bi-globe me-1"></i>{{ $prestasi->tingkat }}
                </span>
                @if(!empty($prestasi->peringkat))
                  <span class="prestasi-rank-badge">
                    <i class="bi bi-award-fill me-1"></i>{{ $prestasi->peringkat }}
                  </span>
                @endif
              </div>

              <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                <div>
                  <h4 class="fw-bold mb-2 text-dark" style="font-size: 16.5px; line-height: 1.45;">
                    <a href="{{ route('homepage.prestasi.detail', $prestasi->slug ?? $prestasi->id) }}" class="text-dark text-decoration-none">
                      {{ $prestasi->judul_prestasi }}
                    </a>
                  </h4>

                  <div class="d-flex align-items-center gap-2 mb-3 mt-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white flex-shrink-0" style="width: 32px; height: 32px; background: #283759; font-size: 13px;">
                      <i class="bi bi-person-fill"></i>
                    </div>
                    <div>
                      <div class="fw-semibold text-dark small" style="font-size: 13px;">{{ $prestasi->nama_mahasiswa }}</div>
                      @if($prestasi->prodi)
                        <div class="text-muted" style="font-size: 11px;">{{ $prestasi->prodi }}</div>
                      @endif
                    </div>
                  </div>

                  @if(!empty($prestasi->penyelenggara) || !empty($prestasi->tahun))
                    <div class="d-flex align-items-center justify-content-between text-muted small py-2 px-3 rounded-3 mb-3" style="background: #f8f9fa; font-size: 11.5px;">
                      <span class="text-truncate me-2"><i class="bi bi-building me-1 text-primary"></i>{{ $prestasi->penyelenggara ?? 'Penyelenggara Nasional' }}</span>
                      <span class="fw-bold text-dark flex-shrink-0">{{ $prestasi->tahun ?? '' }}</span>
                    </div>
                  @endif

                  @if(!empty($prestasi->deskripsi))
                    <div class="text-muted small" style="font-size: 12.5px; line-height: 1.6;">
                      {!! Str::limit(strip_tags($prestasi->deskripsi), 110) !!}
                    </div>
                  @endif
                </div>

                <div class="pt-3 border-top mt-3">
                  <a href="{{ route('homepage.prestasi.detail', $prestasi->slug ?? $prestasi->id) }}" class="fw-bold text-decoration-none d-flex align-items-center justify-content-between" style="color: var(--pld-purple); font-size: 13px;">
                    <span>Lihat Selengkapnya</span>
                    <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      {{-- Tombol Lihat Semua Prestasi --}}
      <div class="text-center mt-2 mb-5">
        <a href="{{ route('homepage.prestasi') }}" class="btn-pld-pill">
          <i class="bi bi-trophy-fill me-1 text-warning"></i> Lihat Semua Prestasi Mahasiswa
        </a>
      </div>
    @endif


  </div>
</section>

<!-- ═══════════════════════════════════════════════
     9.3 ORGANISASI & KEGIATAN MAHASISWA (ORMAWA)
═══════════════════════════════════════════════ -->
<section class="section-bg-white py-5" id="organisasi-mahasiswa" style="border-top: 1px solid var(--border-light);">
  <div class="container py-3">
    <div class="d-flex align-items-end justify-content-between mb-5 flex-wrap gap-3" data-aos="fade-up">
      <div>
        <div class="section-label mb-2">Lembaga Kemahasiswaan</div>
        <h2 class="section-title mb-0">Organisasi & <em>Kegiatan Mahasiswa</em></h2>
      </div>
      <a href="{{ route('homepage.organisasi') }}" class="btn-outline-hero" style="color: var(--pld-purple); border-color: var(--pld-purple); font-size: 13.5px; padding: 10px 22px;">
        <i class="bi bi-people-fill me-1"></i> Lihat Semua Organisasi
      </a>
    </div>

    @if(isset($organisasis) && $organisasis->count() > 0)
      <div class="row g-4">
        @foreach($organisasis->take(4) as $index => $ormawa)
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
            <div class="p-4 rounded-4 bg-white border text-center h-100 shadow-sm d-flex flex-column justify-content-between" style="transition: all 0.3s ease; border-color: #ede4f2 !important;">
              <div>
                <div style="width: 70px; height: 70px; border-radius: 50%; background: #ffffff; border: 2px solid #ecd8f5; box-shadow: 0 4px 12px rgba(0,0,0,0.06); display: inline-flex; align-items: center; justify-content: center; margin-bottom: 14px; padding: 5px;">
                  @if(!empty($ormawa->logo))
                    <img src="{{ asset('storage/' . $ormawa->logo) }}" alt="{{ $ormawa->nama_organisasi }}" style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 50%;">
                  @else
                    <span class="fw-bold" style="color: #283759; font-size: 16px;">{{ strtoupper(substr($ormawa->singkatan ?: $ormawa->nama_organisasi, 0, 2)) }}</span>
                  @endif
                </div>

                <div class="mb-2">
                  <span class="badge" style="background: rgba(40, 55, 89, 0.1); color: #283759; font-size: 11px; font-weight: 700; border-radius: 20px; padding: 4px 10px;">
                    {{ $ormawa->kategori }}
                  </span>
                </div>

                <h5 class="fw-bold text-dark mb-1" style="font-size: 16px; line-height: 1.35;">
                  <a href="{{ route('homepage.organisasi.detail', $ormawa->slug) }}" class="text-dark text-decoration-none">
                    {{ $ormawa->singkatan ?: $ormawa->nama_organisasi }}
                  </a>
                </h5>
                @if(!empty($ormawa->singkatan) && $ormawa->singkatan !== $ormawa->nama_organisasi)
                  <div class="text-muted small mb-2 text-truncate" style="font-size: 12px;">{{ $ormawa->nama_organisasi }}</div>
                @endif

                <p class="text-muted small mb-3" style="font-size: 12.5px; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                  {{ strip_tags($ormawa->deskripsi ?: ($ormawa->visi ?: 'Lembaga kemahasiswaan aktif di lingkungan Pelayanan Disabilitas Universitas Ibnu Sina.')) }}
                </p>
              </div>

              <div class="pt-3 border-top mt-auto d-flex align-items-center justify-content-between">
                <small class="text-muted"><i class="bi bi-person-fill text-primary me-1"></i>{{ Str::limit($ormawa->nama_ketua ?: 'Ketua Ormawa', 14) }}</small>
                <a href="{{ route('homepage.organisasi.detail', $ormawa->slug) }}" class="fw-bold text-decoration-none" style="color: var(--pld-purple); font-size: 12.5px;">
                  Detail <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     9.5 GALERI DOKUMENTASI & KEGIATAN KAMPUS
═══════════════════════════════════════════════ -->
<section class="section-bg-sand py-5" id="galeri">
  <div class="container py-3">
    <div class="d-flex align-items-end justify-content-between mb-5 flex-wrap gap-3" data-aos="fade-up">
      <div>
        <div class="section-label mb-2">Dokumentasi Visual</div>
        <h2 class="section-title mb-0">Galeri & <em>Kegiatan PLD UIS</em></h2>
      </div>
      <a href="{{ route('homepage.galeri') }}" class="btn-outline-hero" style="color: var(--pld-purple); border-color: var(--pld-purple); font-size: 13.5px; padding: 10px 22px;">
        <i class="bi bi-images me-1"></i> Lihat Semua Galeri
      </a>
    </div>

    @if(isset($galleries) && $galleries->count() > 0)
      <div class="row g-4">
        @foreach($galleries->take(6) as $index => $gal)
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
            <a href="{{ route('homepage.galeri.detail', $gal->slug ?? $gal->id) }}" class="gallery-card-item d-block text-decoration-none">
              <div class="gallery-img-container">
                @if(!empty($gal->url))
                  <img src="{{ asset('storage/' . $gal->url) }}" alt="{{ $gal->judul }}" class="gallery-card-img" loading="lazy">
                @else
                  <div class="gallery-fallback-box">
                    <i class="bi bi-camera-fill fs-1 text-white-50"></i>
                  </div>
                @endif
                <div class="gallery-card-overlay">
                  <span class="gallery-tag"><i class="bi bi-tag-fill me-1"></i>Dokumentasi</span>
                  <h5 class="gallery-card-title">{{ $gal->judul }}</h5>
                  @if(!empty($gal->deskripsi))
                    <p class="gallery-card-desc mb-0">{!! Str::limit(strip_tags($gal->deskripsi), 90) !!}</p>
                  @endif
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    @else
      <div class="text-center py-5 bg-white rounded-4 border">
        <i class="bi bi-images fs-1 text-muted d-block mb-2"></i>
        <p class="text-muted mb-0">Belum ada dokumentasi foto yang diunggah.</p>
      </div>
    @endif
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     10. TESTIMONI MAHASISWA & RELAWAN
═══════════════════════════════════════════════ -->
<section class="section-bg-white py-5" id="alumni">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Suara Civitas Inklusif</div>
      <h2 class="section-title">Pengalaman &amp; <em>Testimoni</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Cerita nyata dari mahasiswa disabilitas, relawan inklusif, dosen, dan mitra yang merasakan dampak positif layanan Pusat Layanan Disabilitas UIS.
      </p>
    </div>

    <!-- Swiper Testimonial Slider -->
    <div class="position-relative px-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper alumniSwiper pb-5">
        <div class="swiper-wrapper">
          @if(isset($testimonials) && $testimonials->count() > 0)
            @foreach($testimonials as $index => $testi)
              @php
                $initials = '';
                $words = explode(' ', $testi->nama);
                foreach ($words as $w) {
                    $initials .= strtoupper(substr($w, 0, 1));
                }
                $initials = substr($initials, 0, 2);
              @endphp
              <div class="swiper-slide h-auto">
                <div class="testi-card h-100 shadow-sm" style="background: #ffffff; border: 1.5px solid #f0e6f5; border-radius: 20px; padding: 28px 24px; display: flex; flex-direction: column; justify-content: space-between; transition: all 0.3s ease;">
                  <div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <div class="testi-stars m-0" style="color: #79a8e2; font-size: 15px; display: flex; gap: 3px;">
                        @for($s = 1; $s <= 5; $s++)
                          <i class="bi bi-star{{ $s <= $testi->bintang ? '-fill' : '' }}"></i>
                        @endfor
                      </div>
                      <span class="badge" style="background: #f5edf8; color: #283759; font-size: 11px; font-weight: 600; padding: 5px 10px; border-radius: 8px;">
                        {{ $testi->kategori ?? 'Alumni' }}
                      </span>
                    </div>
                    <p class="testi-text mb-4" style="font-size: 14px; line-height: 1.6; color: #333333; font-style: italic;">"{{ $testi->pesan }}"</p>
                  </div>
                  <div class="testi-author pt-3 border-top d-flex align-items-center gap-3" style="border-color: #f7effa !important;">
                    <div class="testi-avatar flex-shrink-0" style="width: 44px; height: 44px; border-radius: 50%; background: #283759; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px;">{{ $initials ?: 'AL' }}</div>
                    <div>
                      <div class="testi-name text-dark fw-bold" style="font-size: 14px; line-height: 1.3;">{{ $testi->nama }}</div>
                      <div class="testi-role text-muted small" style="font-size: 12px;">{{ $testi->pekerjaan ?? 'Alumni PLD UIS' }}</div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>

        <!-- Pagination Dots -->
        <div class="swiper-pagination"></div>
      </div>

      <!-- Navigation Arrows -->
      <div class="swiper-button-prev alumni-prev" style="color: #283759;"></div>
      <div class="swiper-button-next alumni-next" style="color: #283759;"></div>
    </div>

    <div class="text-center mt-3" data-aos="fade-up">
      <a href="{{ route('homepage.testimoni') }}" class="btn-outline-hero px-4 py-2" style="color: var(--pld-purple); border-color: var(--pld-purple); border-radius: 25px; font-weight: 600;">
        <i class="bi bi-chat-heart me-1"></i> Lihat Semua Testimoni
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
            <i class="bi bi-newspaper fs-2" style="color: var(--pld-purple, #283759);"></i>
            <h2 class="section-heading-pld mb-0">Berita</h2>
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
                <a href="{{ route('homepage.news.detail', $news->slug ?? $news->id) }}" class="news-mini-item">
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

        {{-- Pagination Berita --}}
        @if(isset($latestNews) && method_exists($latestNews, 'hasPages') && $latestNews->hasPages())
          <div class="d-flex justify-content-center mt-4 pt-2">
            {{ $latestNews->fragment('berita')->links('pagination::bootstrap-5') }}
          </div>
        @endif

        {{-- Tombol Lihat Berita Lainnya --}}
        <div class="text-center mt-3 pt-2">
          <a href="{{ route('homepage.news') }}" class="btn-pld-pill">
            Lihat Berita Lainnya
          </a>
        </div>
      </div>

      {{-- KOLOM KANAN (PENGUMUMAN & AGENDA) --}}
      <div class="col-lg-4" data-aos="fade-left">
        
        {{-- SECTION PENGUMUMAN --}}
        <div class="mb-4">
          <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bi bi-megaphone-fill fs-3" style="color: var(--pld-purple, #283759);"></i>
            <h3 class="section-heading-pld mb-0" style="font-size: 24px;">Pengumuman</h3>
          </div>

          <div class="announcement-list">
            @if(isset($announcements) && $announcements->count() > 0)
              @foreach($announcements as $ann)
                <a href="{{ route('homepage.news.detail', $ann->slug ?? $ann->id) }}" class="announcement-card-box">
                  <div class="announcement-card-title">{{ $ann->title }}</div>
                  <div class="announcement-card-date">{{ $ann->created_at ? $ann->created_at->format('d F Y') : '-' }}</div>
                </a>
              @endforeach
            @else
              {{-- Default Item Pengumuman PLD --}}
              <div class="announcement-card-box">
                <div class="announcement-card-title">Pendaftaran Relawan Mahasiswa Inklusif & Notetaker Semester Ganjil</div>
                <div class="announcement-card-date">15 August 2026</div>
              </div>
              <div class="announcement-card-box">
                <div class="announcement-card-title">Sosialisasi Pengajuan Akomodasi Ujian & Pendampingan Perkuliahan</div>
                <div class="announcement-card-date">1 August 2026</div>
              </div>
            @endif
          </div>
        </div>

        {{-- SECTION AGENDA --}}
        <div class="mt-4 pt-3 border-top">
          <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bi bi-calendar4-week fs-3" style="color: var(--pld-purple, #283759);"></i>
            <h3 class="section-heading-pld mb-0" style="font-size: 24px;">Agenda</h3>
          </div>

          <div class="agenda-list">
            <div class="agenda-row mb-3">
              <div class="agenda-time-text">15 - 20 September 2026:</div>
              <div class="agenda-badge-card">
                Workshop Bahasa Isyarat (BISINDO) Tingkat Dasar
              </div>
            </div>

            <div class="agenda-row mb-3">
              <div class="agenda-time-text">25 September 2026:</div>
              <div class="agenda-badge-card">
                Pelatihan Etika Interaksi & Pendampingan Mahasiswa Inklusif
              </div>
            </div>

            <div class="agenda-row mb-3">
              <div class="agenda-time-text">05 Oktober 2026:</div>
              <div class="agenda-badge-card">
                FGD Aksesibilitas Fasilitas Kampus Bersama Rektorat
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
          <div class="badge pmb-badge-wrap px-3 py-2 rounded-pill mb-3" style="background: var(--pld-orange); color: #141b39; font-weight: 800; font-size: 12px; letter-spacing: 1px;">
            {{ $pmbSetting->badge_text ?? 'LAYANAN & PENDAMPINGAN MAHASISWA INKLUSIF' }}
          </div>
          <h2 class="text-white fw-bold mb-3" style="font-size: clamp(1.5rem, 3.5vw, 2.1rem); line-height: 1.3;">
            {{ $pmbSetting->judul ?? 'Konsultasikan Kebutuhan Belajar & Dapatkan Pendampingan Penuh di PLD UIS!' }}
          </h2>
          <p class="text-white mb-4" style="line-height: 1.7; max-width: 620px; opacity: 0.92; font-size: 14.5px;">
            {{ $pmbSetting->deskripsi ?? 'Pusat Layanan Disabilitas Universitas Ibnu Sina siap mendampingi kebutuhan akademik, akomodasi ujian, notetaker, juru bahasa isyarat, dan konseling psikologis.' }}
          </p>
          <div class="d-flex flex-wrap gap-3 pmb-btn-group">
            @php
              $link1 = $pmbSetting->tombol_link_1 ?? route('homepage.layanan');
              if (!str_starts_with($link1, 'http') && !str_starts_with($link1, '/')) {
                  $link1 = '/' . $link1;
              }
            @endphp
            <a href="{{ $link1 }}" target="{{ str_starts_with($link1, 'http') ? '_blank' : '_self' }}" class="btn-primary-hero">
              <i class="bi bi-info-circle"></i> {{ $pmbSetting->tombol_text_1 ?? 'Pelajari Layanan PLD' }}
            </a>

            @php
              $link2 = $pmbSetting->tombol_link_2 ?? '';
              if (empty($link2) && !empty($cleanWa)) {
                  $link2 = "https://wa.me/{$cleanWa}?text=" . urlencode("Halo Pusat Layanan Disabilitas UIS, saya ingin konsultasi mengenai layanan pendampingan.");
              }
            @endphp
            @if(!empty($link2))
              <a href="{{ $link2 }}" target="_blank" class="btn-pmb-wa">
                <i class="bi bi-whatsapp"></i> {{ $pmbSetting->tombol_text_2 ?? 'Konsultasi WhatsApp PLD' }}
              </a>
            @endif
          </div>
        </div>

        <div class="col-lg-4">
          <div class="p-4 rounded-4" style="background: rgba(0, 0, 0, 0.22); border: 1px solid rgba(255, 255, 255, 0.22); backdrop-filter: blur(8px);">
            <h5 class="text-white fw-bold mb-3"><i class="bi bi-calendar-event text-warning me-2"></i>Jadwal Gelombang:</h5>
            <ul class="text-white small list-unstyled mb-0" style="line-height: 2; opacity: 0.95;">
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
     13. PARTNER & KERJA SAMA (2-ROW INFINITE SLIDER)
═══════════════════════════════════════════════ -->
@if(isset($partners) && $partners->count() > 0)
<section class="section-bg-white py-5" id="mitra">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Jejaring Mitra</div>
      <h2 class="section-title">Mitra Kerjasama <em>Inklusi, Industri &amp; Komunitas</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Kolaborasi aktif bersama organisasi disabilitas, komunitas Intelek Tuli, instansi pemerintah, dan dunia usaha untuk memperluas kesempatan karier serta inklusi.
      </p>
    </div>
  </div>

  @php
    $totalPartners = $partners->count();
    $half = ceil($totalPartners / 2);
    $rawRow1 = $partners->slice(0, $half);
    $rawRow2 = $partners->slice($half);

    if ($rawRow2->isEmpty()) {
        $rawRow2 = $rawRow1;
    }

    // Perbanyak item agar loop slider terasa panjang dan mulus di layar lebar
    $row1 = collect();
    while ($row1->count() < 8) {
        $row1 = $row1->concat($rawRow1);
    }
    $row2 = collect();
    while ($row2->count() < 8) {
        $row2 = $row2->concat($rawRow2);
    }
  @endphp

  <div class="marquee-wrapper" data-aos="fade-up">
    <!-- Baris 1: Bergerak ke Kiri -->
    <div class="marquee-track-container mb-3">
      <div class="marquee-track marquee-left">
        @foreach($row1 as $p)
          <div class="partner-marquee-card">
            @if($p->logo)
              <img src="{{ asset('storage/' . $p->logo) }}" alt="{{ $p->nama }}" class="partner-marquee-img" loading="lazy">
            @else
              <span class="partner-marquee-text">{{ $p->nama }}</span>
            @endif
          </div>
        @endforeach
        {{-- Duplicate Set for Continuous Loop --}}
        @foreach($row1 as $p)
          <div class="partner-marquee-card" aria-hidden="true">
            @if($p->logo)
              <img src="{{ asset('storage/' . $p->logo) }}" alt="{{ $p->nama }}" class="partner-marquee-img" loading="lazy">
            @else
              <span class="partner-marquee-text">{{ $p->nama }}</span>
            @endif
          </div>
        @endforeach
      </div>
    </div>

    <!-- Baris 2: Bergerak ke Kanan -->
    <div class="marquee-track-container">
      <div class="marquee-track marquee-right">
        @foreach($row2 as $p)
          <div class="partner-marquee-card">
            @if($p->logo)
              <img src="{{ asset('storage/' . $p->logo) }}" alt="{{ $p->nama }}" class="partner-marquee-img" loading="lazy">
            @else
              <span class="partner-marquee-text">{{ $p->nama }}</span>
            @endif
          </div>
        @endforeach
        {{-- Duplicate Set for Continuous Loop --}}
        @foreach($row2 as $p)
          <div class="partner-marquee-card" aria-hidden="true">
            @if($p->logo)
              <img src="{{ asset('storage/' . $p->logo) }}" alt="{{ $p->nama }}" class="partner-marquee-img" loading="lazy">
            @else
              <span class="partner-marquee-text">{{ $p->nama }}</span>
            @endif
          </div>
        @endforeach
      </div>
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
        Jawaban seputar program studi, biaya perkuliahan, fasilitas laboratorium, dan prospek karir di PLD UIS.
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
                    <i class="bi bi-question-circle-fill me-2" style="color: var(--pld-purple);"></i>
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
          <a href="{{ route('homepage.faq') }}" class="btn-outline-hero" style="color: var(--pld-purple); border-color: var(--pld-purple);">
            <i class="bi bi-question-circle"></i> Lihat Semua FAQ & Bantuan
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.alumniSwiper')) {
      new Swiper('.alumniSwiper', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: {
          delay: 3800,
          disableOnInteraction: false,
          pauseOnMouseEnter: true
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
          dynamicBullets: true
        },
        navigation: {
          nextEl: '.alumni-next',
          prevEl: '.alumni-prev'
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 26
          }
        }
      });
    }
  });
</script>
@endpush
