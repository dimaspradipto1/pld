<!DOCTYPE html>
<html lang="id">
@php
  $cleanWa = '';
  if (!empty($contact->no_wa)) {
      $cleanWa = preg_replace('/[^0-9]/', '', $contact->no_wa);
      if (strpos($cleanWa, '08') === 0) {
          $cleanWa = '628' . substr($cleanWa, 2);
      }
  }
  $isHome = request()->routeIs('homepage') || request()->routeIs('homepage.galeri');
@endphp
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'FIKES — Fakultas Ilmu Kesehatan | Roster & Fasilitas')</title>
  <meta name="description" content="@yield('meta_description', 'Portal Resmi Fakultas Ilmu Kesehatan (FIKES) — Penyedia Roster Dinding, Fasilitas, Laboratorium, dan Informasi Akademik Berkualitas.')">
  <meta name="keywords" content="@yield('meta_keywords', 'fikes, fakultas ilmu kesehatan, roster dinding, ventilasi, fasilitas kesehatan, bata ventilasi')">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- AOS Animation -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  @stack('styles')

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      /* FIKES Official Primary Solid Colors */
      --fikes-purple:       #823ca2;
      --fikes-purple-dark:  #682985;
      --fikes-purple-deep:  #47175d;
      --fikes-purple-light: #f5eefb;
      --fikes-purple-subtle:#ecdcf7;
      
      --fikes-orange:       #ff9c00;
      --fikes-orange-hover: #e88d00;
      --fikes-orange-dark:  #cc7c00;
      --fikes-orange-light: #fff8eb;
      --fikes-orange-subtle:#ffeecd;
      
      /* Neutral & Obsidian Faculty Dark Tones */
      --obsidian-dark:      #190a24;
      --obsidian-card:      #241033;
      --obsidian-surface:   #321746;
      
      --white:              #ffffff;
      --page-bg:            #fcfaff;
      --surface-light:      #f6effb;
      --text-main:          #190a24;
      --text-muted:         #655672;
      --text-light:         #9586a2;
      --border-light:       #ebdff2;
      --border-focus:       #823ca2;
      
      /* Semantic fallback mapping */
      --terracotta:         #823ca2;
      --terracotta-dk:      #682985;
      --terracotta-lt:      #ff9c00;
      --clay:               #ff9c00;
      --sand:               #f5eefb;
      --charcoal:           #190a24;
      --dark-brown:         #241033;
      --muted:              #655672;
      --border:             #ebdff2;
      --cream:              #fcfaff;
      
      /* Crisp Elevation Shadows (Zero Gradients, Premium Depth) */
      --shadow-xs:          0 2px 4px rgba(25, 10, 36, 0.04);
      --shadow-sm:          0 4px 12px rgba(130, 60, 162, 0.08);
      --shadow-md:          0 8px 24px rgba(130, 60, 162, 0.12);
      --shadow-lg:          0 16px 36px rgba(130, 60, 162, 0.15);
      --shadow-orange:      0 8px 24px rgba(255, 156, 0, 0.28);
      --shadow-purple:      0 8px 24px rgba(130, 60, 162, 0.28);
    }

    .text-terracotta, .text-fikes-purple { color: var(--fikes-purple) !important; }
    .text-fikes-orange { color: var(--fikes-orange) !important; }
    .bg-fikes-purple { background-color: var(--fikes-purple) !important; }
    .bg-fikes-orange { background-color: var(--fikes-orange) !important; }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: var(--page-bg);
      color: var(--text-main);
      overflow-x: hidden;
      line-height: 1.6;
    }

    /* ═══════════════════════════════════════════════
       CLEAN GEOMETRIC PATTERN (Solid SVG overlay)
    ═══════════════════════════════════════════════ */
    .roster-pattern {
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23823ca2' fill-opacity='0.035'%3E%3Crect x='5' y='5' width='22' height='22' rx='3'/%3E%3Crect x='33' y='5' width='22' height='22' rx='3'/%3E%3Crect x='5' y='33' width='22' height='22' rx='3'/%3E%3Crect x='33' y='33' width='22' height='22' rx='3'/%3E%3Crect x='13' y='13' width='6' height='6' fill='%23ff9c00' fill-opacity='0.08' rx='1'/%3E%3Crect x='41' y='13' width='6' height='6' fill='%23ff9c00' fill-opacity='0.08' rx='1'/%3E%3Crect x='13' y='41' width='6' height='6' fill='%23ff9c00' fill-opacity='0.08' rx='1'/%3E%3Crect x='41' y='41' width='6' height='6' fill='%23ff9c00' fill-opacity='0.08' rx='1'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    /* ═══════════════════════════════════════════════
       TOPBAR
    ═══════════════════════════════════════════════ */
    .topbar {
      background: var(--obsidian-dark);
      padding: 10px 0;
      font-size: 13px;
      color: rgba(255, 255, 255, 0.7);
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    .topbar a { color: rgba(255, 255, 255, 0.75); text-decoration: none; transition: color 0.2s ease; }
    .topbar a:hover { color: var(--fikes-orange); }
    .topbar .sep { color: rgba(255, 255, 255, 0.2); margin: 0 12px; }
    .topbar .social-link {
      display: inline-flex; align-items: center; justify-content: center;
      width: 28px; height: 28px;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.08);
      color: rgba(255, 255, 255, 0.75);
      font-size: 12px;
      text-decoration: none;
      transition: all 0.25s ease;
      margin-left: 6px;
    }
    .topbar .social-link:hover { 
      background: var(--fikes-orange); 
      color: var(--obsidian-dark);
      transform: translateY(-2px);
    }

    /* ═══════════════════════════════════════════════
       NAVBAR
    ═══════════════════════════════════════════════ */
    .navbar-main {
      background: var(--white);
      border-bottom: 1px solid var(--border-light);
      padding: 0;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 16px rgba(25, 10, 36, 0.05);
      transition: box-shadow 0.3s ease;
    }
    .navbar-main .container { padding: 0 20px; }
    .navbar-main .navbar { padding: 12px 0; }

    .brand-wrap {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
    }
    .brand-text .name {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 19px;
      font-weight: 800;
      color: var(--fikes-purple);
      letter-spacing: -0.5px;
      line-height: 1.1;
    }
    .brand-text .sub {
      font-size: 11px;
      color: var(--text-muted);
      font-weight: 500;
      letter-spacing: 0.3px;
    }

    .nav-link-custom {
      font-size: 14px;
      font-weight: 600;
      color: var(--text-muted) !important;
      padding: 8px 16px !important;
      border-radius: 10px;
      transition: all 0.2s ease;
      font-family: 'Plus Jakarta Sans', sans-serif;
      margin: 0 2px;
    }
    .nav-link-custom:hover {
      color: var(--fikes-purple) !important;
      background: var(--fikes-purple-light);
    }
    .nav-link-custom.active {
      color: var(--white) !important;
      background: var(--fikes-purple);
    }

    .btn-login-nav {
      display: inline-flex; 
      align-items: center; 
      gap: 8px;
      background: var(--fikes-orange);
      color: #190a24;
      font-size: 14px;
      font-weight: 700;
      font-family: 'Plus Jakarta Sans', sans-serif;
      padding: 10px 22px;
      border-radius: 10px;
      text-decoration: none;
      transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: var(--shadow-orange);
    }
    .btn-login-nav:hover {
      background: var(--fikes-orange-hover);
      color: #190a24;
      transform: translateY(-2px);
      box-shadow: 0 10px 28px rgba(255, 156, 0, 0.4);
    }

    /* ═══════════════════════════════════════════════
       HERO & SUBPAGE BANNERS (Solid High-Contrast)
    ═══════════════════════════════════════════════ */
    .hero {
      position: relative;
      min-height: 90vh;
      background: var(--obsidian-dark);
      overflow: hidden;
      display: flex;
      align-items: center;
    }
    .hero-bg {
      position: absolute;
      inset: 0;
      background: url('{{ asset("assets/img/login-bg.png") }}') center/cover no-repeat;
      z-index: 0;
      opacity: 0.25;
    }
    .hero-overlay {
      position: absolute;
      inset: 0;
      background: rgba(25, 10, 36, 0.88);
      z-index: 1;
    }
    .hero-content {
      position: relative;
      z-index: 3;
      padding: 100px 0;
    }
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(130, 60, 162, 0.25);
      border: 1px solid rgba(255, 156, 0, 0.4);
      border-radius: 50px;
      padding: 6px 18px;
      margin-bottom: 24px;
      backdrop-filter: blur(10px);
    }
    .hero-badge-dot {
      width: 8px; height: 8px;
      background: var(--fikes-orange);
      border-radius: 50%;
      box-shadow: 0 0 10px var(--fikes-orange);
      animation: pulse-dot 2s infinite;
    }
    @keyframes pulse-dot {
      0%, 100% { transform: scale(1); opacity: 1; }
      50% { transform: scale(1.3); opacity: 0.7; }
    }
    .hero-badge span {
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: var(--fikes-orange);
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .hero-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(38px, 5.5vw, 64px);
      font-weight: 800;
      color: var(--white);
      line-height: 1.12;
      letter-spacing: -1.5px;
      margin-bottom: 22px;
    }
    .hero-title em {
      font-style: normal;
      color: var(--fikes-orange);
    }
    .hero-desc {
      font-size: 17px;
      color: rgba(255, 255, 255, 0.75);
      line-height: 1.8;
      margin-bottom: 38px;
      max-width: 580px;
    }
    .hero-cta {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      margin-bottom: 50px;
    }
    .btn-primary-hero {
      display: inline-flex; align-items: center; gap: 10px;
      background: var(--fikes-orange);
      color: #190a24;
      font-size: 15px;
      font-weight: 700;
      font-family: 'Plus Jakarta Sans', sans-serif;
      padding: 15px 32px;
      border-radius: 12px;
      text-decoration: none;
      transition: all 0.25s ease;
      box-shadow: var(--shadow-orange);
    }
    .btn-primary-hero:hover {
      background: var(--fikes-orange-hover);
      color: #190a24;
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(255, 156, 0, 0.45);
    }
    .btn-outline-hero {
      display: inline-flex; align-items: center; gap: 10px;
      background: transparent;
      border: 2px solid rgba(255, 255, 255, 0.35);
      color: var(--white);
      font-size: 15px;
      font-weight: 600;
      font-family: 'Plus Jakarta Sans', sans-serif;
      padding: 14px 30px;
      border-radius: 12px;
      text-decoration: none;
      transition: all 0.25s ease;
    }
    .btn-outline-hero:hover {
      background: var(--fikes-purple);
      border-color: var(--fikes-purple);
      color: var(--white);
      transform: translateY(-3px);
    }

    /* Subpages Hero Banner */
    .about-hero, .testi-hero, .faq-hero, .contact-hero, .product-hero {
      position: relative;
      background: var(--obsidian-dark);
      padding: 80px 0 65px;
      overflow: hidden;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    .about-hero-bg, .testi-hero-bg, .faq-hero-bg, .contact-hero-bg, .product-hero-bg {
      position: absolute;
      inset: 0;
      background: url('{{ asset("assets/img/login-bg.png") }}') center/cover no-repeat;
      z-index: 0;
      opacity: 0.18;
    }
    .about-hero-overlay, .testi-hero-overlay, .faq-hero-overlay, .contact-hero-overlay, .product-hero-overlay {
      position: absolute;
      inset: 0;
      background: rgba(25, 10, 36, 0.9);
      z-index: 1;
    }
    .about-hero-content, .testi-hero-content, .faq-hero-content, .contact-hero-content, .product-hero-content {
      position: relative;
      z-index: 3;
      text-align: center;
    }
    .about-hero-title, .testi-hero-title, .faq-hero-title, .contact-hero-title, .product-hero-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(32px, 4.5vw, 50px);
      font-weight: 800;
      color: var(--white);
      letter-spacing: -1px;
      margin-bottom: 15px;
    }
    .about-hero-title em, .testi-hero-title em, .faq-hero-title em, .contact-hero-title em, .product-hero-title em {
      font-style: normal;
      color: var(--fikes-orange);
    }

    .breadcrumb-custom {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.14);
      padding: 6px 18px;
      border-radius: 50px;
      font-size: 13px;
      backdrop-filter: blur(8px);
    }
    .breadcrumb-custom a { color: rgba(255, 255, 255, 0.7); text-decoration: none; transition: color 0.2s; }
    .breadcrumb-custom a:hover { color: var(--fikes-orange); }
    .breadcrumb-custom span.sep { color: rgba(255, 255, 255, 0.3); }
    .breadcrumb-custom span.active { color: var(--white); font-weight: 600; }

    /* Product strip */
    .hero-product-strip {
      background: var(--white);
      border-top: 3px solid var(--fikes-purple);
      box-shadow: 0 4px 24px rgba(25, 10, 36, 0.06);
    }
    .product-strip-item {
      display: flex; align-items: center; gap: 14px;
      padding: 24px 12px;
      border-right: 1px solid var(--border-light);
    }
    .product-strip-item:last-child { border-right: none; }
    .strip-icon {
      width: 50px; height: 50px;
      background: var(--fikes-purple-light);
      border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
      transition: all 0.3s ease;
    }
    .strip-icon i { font-size: 24px; color: var(--fikes-purple); }
    .product-strip-item:hover .strip-icon {
      background: var(--fikes-purple);
      transform: scale(1.08);
    }
    .product-strip-item:hover .strip-icon i { color: var(--white); }
    .strip-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 15px;
      font-weight: 700;
      color: var(--text-main);
      margin-bottom: 2px;
    }
    .strip-sub { font-size: 12.5px; color: var(--text-muted); }

    /* ═══════════════════════════════════════════════
       SECTION COMMON
    ═══════════════════════════════════════════════ */
    section { padding: 85px 0; }
    .section-bg-cream { background: var(--page-bg); }
    .section-bg-sand { background: var(--surface-light); }
    .section-bg-white { background: var(--white); }
    .section-bg-dark {
      background: var(--obsidian-dark);
      color: white;
      position: relative;
    }

    .section-label {
      display: inline-flex; align-items: center; gap: 8px;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: var(--fikes-purple);
      background: var(--fikes-purple-light);
      padding: 6px 14px;
      border-radius: 50px;
      border: 1px solid var(--fikes-purple-subtle);
      font-family: 'Plus Jakarta Sans', sans-serif;
      margin-bottom: 16px;
    }

    .section-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(28px, 3.5vw, 40px);
      font-weight: 800;
      color: var(--text-main);
      line-height: 1.2;
      letter-spacing: -0.8px;
      margin-bottom: 16px;
    }
    .section-title.light { color: var(--white); }
    .section-title em { font-style: normal; color: var(--fikes-orange); }

    .section-desc {
      font-size: 16px;
      color: var(--text-muted);
      line-height: 1.8;
      max-width: 600px;
    }
    .section-desc.light { color: rgba(255, 255, 255, 0.7); }

    .divider-line {
      width: 50px; height: 4px;
      background: var(--fikes-orange);
      border-radius: 4px;
      margin: 16px 0 24px;
    }
    .divider-line.centered { margin-left: auto; margin-right: auto; }

    /* ═══════════════════════════════════════════════
       FEATURE CARDS (Modern Elevate)
    ═══════════════════════════════════════════════ */
    .feature-card {
      background: var(--white);
      border-radius: 20px;
      padding: 34px 28px;
      border: 1px solid var(--border-light);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
      height: 100%;
    }
    .feature-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 4px;
      background: var(--fikes-purple);
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.3s ease;
    }
    .feature-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-lg);
      border-color: var(--fikes-purple-subtle);
    }
    .feature-card:hover::before { transform: scaleX(1); }

    .feature-icon-wrap {
      width: 60px; height: 60px;
      background: var(--fikes-purple-light);
      border-radius: 16px;
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 22px;
      transition: all 0.3s ease;
    }
    .feature-icon-wrap i {
      font-size: 28px;
      color: var(--fikes-purple);
      transition: color 0.3s;
    }
    .feature-card:hover .feature-icon-wrap {
      background: var(--fikes-purple);
      transform: scale(1.05);
    }
    .feature-card:hover .feature-icon-wrap i { color: var(--white); }

    .feature-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 18px;
      font-weight: 700;
      color: var(--text-main);
      margin-bottom: 10px;
    }
    .feature-desc {
      font-size: 14px;
      color: var(--text-muted);
      line-height: 1.7;
    }

    /* ═══════════════════════════════════════════════
       PRODUCT CARDS (Katalog)
    ═══════════════════════════════════════════════ */
    .product-card {
      background: var(--white);
      border-radius: 20px;
      overflow: hidden;
      border: 1px solid var(--border-light);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    .product-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-lg);
      border-color: var(--fikes-purple-subtle);
    }
    .product-card-img {
      height: 210px;
      background: var(--fikes-purple-light);
      display: flex; align-items: center; justify-content: center;
      position: relative;
      overflow: hidden;
    }
    .product-card-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    .product-card:hover .product-card-img img {
      transform: scale(1.06);
    }
    .product-placeholder-bg {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 6px;
      color: var(--fikes-purple);
    }
    .product-placeholder-icon {
      font-size: 38px;
      opacity: 0.6;
    }
    .product-placeholder-text {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 0.5px;
      opacity: 0.8;
    }
    .product-card-body { 
      padding: 22px; 
      display: flex; 
      flex-direction: column; 
      flex-grow: 1; 
    }
    .product-card-cat {
      font-size: 11px;
      font-weight: 700;
      color: var(--fikes-purple);
      background: var(--fikes-purple-light);
      padding: 3px 10px;
      border-radius: 50px;
      display: inline-block;
      width: fit-content;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      margin-bottom: 8px;
    }
    .product-card-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 17px;
      font-weight: 700;
      color: var(--text-main);
      margin-bottom: 10px;
      line-height: 1.35;
    }
    .product-card-desc { 
      font-size: 13.5px; 
      color: var(--text-muted); 
      line-height: 1.6; 
      margin-bottom: 18px; 
    }
    .product-card-footer {
      display: flex; align-items: center; justify-content: space-between;
      padding-top: 14px;
      border-top: 1px solid var(--border-light);
      margin-top: auto;
    }
    .btn-card {
      display: inline-flex; align-items: center; gap: 6px;
      background: var(--fikes-purple);
      color: white;
      font-size: 13px;
      font-weight: 700;
      font-family: 'Plus Jakarta Sans', sans-serif;
      padding: 8px 18px;
      border-radius: 8px;
      text-decoration: none;
      transition: all 0.25s ease;
    }
    .btn-card:hover { 
      background: var(--fikes-purple-dark); 
      color: white; 
      transform: translateX(2px); 
    }

    /* ═══════════════════════════════════════════════
       ABOUT VISUALS & STATS
    ═══════════════════════════════════════════════ */
    .about-visual { position: relative; }
    .about-img-main {
      border-radius: 24px;
      overflow: hidden;
      box-shadow: var(--shadow-lg);
      background: var(--fikes-purple-light);
      border: 1px solid var(--border-light);
      height: 420px;
      display: flex; align-items: center; justify-content: center;
      position: relative;
    }
    .about-roster-grid {
      display: grid;
      grid-template-columns: repeat(6, 56px);
      grid-template-rows: repeat(5, 56px);
      gap: 8px;
    }
    .about-roster-grid .r {
      background: rgba(130, 60, 162, 0.12);
      border: 2px solid rgba(130, 60, 162, 0.25);
      border-radius: 8px;
      transition: all 0.3s ease;
    }
    .about-roster-grid .r.filled {
      background: var(--fikes-purple);
      border-color: var(--fikes-purple-dark);
    }
    .about-roster-grid .r.hole {
      background: var(--white);
      border-color: var(--fikes-orange);
    }

    /* Visi Misi Values */
    .value-card {
      background: var(--white);
      border-radius: 20px;
      padding: 36px 30px;
      border: 1px solid var(--border-light);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
      height: 100%;
    }
    .value-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-lg);
      border-color: var(--fikes-purple-subtle);
    }
    .value-icon-wrap {
      width: 60px; height: 60px;
      background: var(--fikes-purple-light);
      border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 22px;
      transition: all 0.3s ease;
    }
    .value-card:hover .value-icon-wrap {
      background: var(--fikes-purple);
      color: white;
    }
    .value-icon-wrap i { font-size: 24px; color: var(--fikes-purple); transition: color 0.3s; }
    .value-card:hover .value-icon-wrap i { color: white; }
    .value-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 18px;
      font-weight: 700;
      color: var(--text-main);
      margin-bottom: 12px;
    }
    .value-desc { font-size: 14px; color: var(--text-muted); line-height: 1.75; }

    /* Timeline */
    .timeline { position: relative; max-width: 900px; margin: 0 auto; }
    .timeline::after {
      content: '';
      position: absolute;
      width: 3px;
      background-color: var(--border-light);
      top: 0; bottom: 0; left: 50%;
      margin-left: -1.5px;
    }
    .timeline-container {
      padding: 10px 40px;
      position: relative;
      width: 50%;
    }
    .timeline-container::after {
      content: '';
      position: absolute;
      width: 18px;
      height: 18px;
      right: -9px;
      background-color: var(--fikes-orange);
      border: 3px solid var(--white);
      top: 25px;
      border-radius: 50%;
      z-index: 1;
      box-shadow: 0 0 0 3px rgba(255, 156, 0, 0.25);
      transition: all 0.3s ease;
    }
    .left { left: 0; }
    .right { left: 50%; }
    .right::after { left: -9px; }
    .timeline-content {
      padding: 24px;
      background-color: var(--white);
      border-radius: 16px;
      border: 1px solid var(--border-light);
      box-shadow: var(--shadow-sm);
      transition: all 0.3s ease;
    }
    .timeline-container:hover .timeline-content {
      transform: translateY(-3px);
      box-shadow: var(--shadow-md);
      border-color: var(--fikes-purple-subtle);
    }
    .timeline-year {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 19px;
      font-weight: 800;
      color: var(--fikes-purple);
      margin-bottom: 6px;
    }
    .timeline-title {
      font-size: 15px;
      font-weight: 700;
      color: var(--text-main);
      margin-bottom: 8px;
    }
    .timeline-text { font-size: 13.5px; color: var(--text-muted); line-height: 1.6; }

    /* ═══════════════════════════════════════════════
       COUNTER SECTION (Solid Purple Anchor)
    ═══════════════════════════════════════════════ */
    .counter-section {
      background: var(--fikes-purple);
      padding: 70px 0;
      position: relative;
      overflow: hidden;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .counter-item { text-align: center; position: relative; }
    .counter-item::after {
      content: '';
      position: absolute;
      right: 0; top: 50%;
      transform: translateY(-50%);
      width: 1px; height: 50px;
      background: rgba(255, 255, 255, 0.2);
    }
    .counter-item:last-child::after { display: none; }
    .counter-num {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 46px;
      font-weight: 800;
      color: white;
      line-height: 1;
    }
    .counter-num sup { font-size: 20px; color: var(--fikes-orange); }
    .counter-label {
      font-size: 13.5px;
      color: rgba(255, 255, 255, 0.85);
      font-weight: 500;
      margin-top: 8px;
    }
    .counter-icon {
      font-size: 28px;
      color: var(--fikes-orange);
      margin-bottom: 10px;
    }

    /* ═══════════════════════════════════════════════
       TESTIMONIALS & FILTERS
    ═══════════════════════════════════════════════ */
    .filter-tags {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 40px;
    }
    .filter-tag {
      background: var(--white);
      border: 1px solid var(--border-light);
      padding: 8px 22px;
      border-radius: 50px;
      font-size: 13.5px;
      font-weight: 600;
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: var(--text-muted);
      cursor: pointer;
      transition: all 0.25s ease;
    }
    .filter-tag:hover, .filter-tag.active {
      background: var(--fikes-purple);
      border-color: var(--fikes-purple);
      color: white;
      box-shadow: var(--shadow-purple);
    }

    .testimonial-card {
      background: var(--white);
      border-radius: 20px;
      padding: 32px;
      border: 1px solid var(--border-light);
      height: 100%;
      position: relative;
      transition: all 0.3s ease;
    }
    .testimonial-card:hover {
      box-shadow: var(--shadow-lg);
      transform: translateY(-5px);
      border-color: var(--fikes-purple-subtle);
    }
    .testimonial-card::before {
      content: '\201C';
      font-size: 70px;
      color: var(--fikes-purple-light);
      font-family: Georgia, serif;
      line-height: 0.8;
      position: absolute;
      top: 24px; right: 24px;
    }
    .stars { display: flex; gap: 3px; margin-bottom: 16px; }
    .stars i { font-size: 14px; color: var(--fikes-orange); }
    .testimonial-text { 
      font-size: 14.5px; 
      color: var(--text-muted); 
      line-height: 1.8; 
      margin-bottom: 22px; 
      font-style: italic; 
    }
    .testimonial-author { display: flex; align-items: center; gap: 12px; }
    .author-avatar {
      width: 44px; height: 44px;
      background: var(--fikes-purple);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 800; font-size: 15px;
      color: white; flex-shrink: 0;
    }
    .author-name { 
      font-family: 'Plus Jakarta Sans', sans-serif; 
      font-size: 15px; 
      font-weight: 700; 
      color: var(--text-main); 
    }
    .author-badge {
      display: inline-block;
      font-size: 10.5px;
      font-weight: 700;
      background: var(--fikes-orange-light);
      color: var(--fikes-orange-dark);
      padding: 2px 9px;
      border-radius: 4px;
      margin-top: 3px;
      text-transform: uppercase;
      letter-spacing: 0.4px;
    }

    /* ═══════════════════════════════════════════════
       FAQ & SEARCH
    ═══════════════════════════════════════════════ */
    .search-box-wrap {
      max-width: 600px;
      margin: 0 auto 40px;
      position: relative;
    }
    .search-input-custom {
      width: 100%;
      background: var(--white);
      border: 1.5px solid var(--border-light);
      padding: 15px 22px 15px 52px;
      border-radius: 14px;
      font-size: 15px;
      color: var(--text-main);
      outline: none;
      transition: all 0.25s ease;
      box-shadow: var(--shadow-xs);
    }
    .search-input-custom:focus {
      border-color: var(--fikes-purple);
      box-shadow: 0 0 0 3px rgba(130, 60, 162, 0.12);
    }
    .search-box-wrap i {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 18px;
      color: var(--fikes-purple);
      pointer-events: none;
    }

    .faq-cat-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 19px;
      font-weight: 700;
      color: var(--text-main);
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
      border-left: 4px solid var(--fikes-purple);
      padding-left: 12px;
    }

    .faq-item {
      background: var(--white);
      border-radius: 14px;
      border: 1px solid var(--border-light);
      margin-bottom: 12px;
      overflow: hidden;
      transition: all 0.25s ease;
    }
    .faq-item:hover { border-color: var(--fikes-purple-subtle); }
    .faq-question {
      padding: 18px 22px;
      cursor: pointer;
      display: flex; align-items: center; justify-content: space-between; gap: 16px;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 15.5px;
      font-weight: 600;
      color: var(--text-main);
      user-select: none;
    }
    .faq-icon {
      width: 32px; height: 32px;
      background: var(--fikes-purple-light);
      border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
      transition: all 0.3s ease;
    }
    .faq-icon i { font-size: 14px; color: var(--fikes-purple); transition: transform 0.3s; }
    .faq-item.open .faq-icon { background: var(--fikes-purple); }
    .faq-item.open .faq-icon i { color: white; transform: rotate(45deg); }
    .faq-answer {
      padding: 0 22px 18px;
      font-size: 14.5px;
      color: var(--text-muted);
      line-height: 1.8;
      display: none;
      border-top: 1px solid var(--border-light);
      padding-top: 14px;
    }
    .faq-item.open .faq-answer { display: block; }

    /* ═══════════════════════════════════════════════
       CONTACT & FORMS
    ═══════════════════════════════════════════════ */
    .contact-card-custom {
      background: var(--white);
      border: 1px solid var(--border-light);
      border-radius: 20px;
      padding: 30px;
      height: 100%;
      transition: all 0.3s ease;
    }
    .contact-card-custom:hover {
      box-shadow: var(--shadow-lg);
      transform: translateY(-4px);
      border-color: var(--fikes-purple-subtle);
    }
    .contact-card-icon {
      width: 54px; height: 54px;
      background: var(--fikes-purple-light);
      border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 18px;
      color: var(--fikes-purple);
      font-size: 24px;
      transition: all 0.3s ease;
    }
    .contact-card-custom:hover .contact-card-icon {
      background: var(--fikes-purple);
      color: white;
    }
    .contact-card-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 16px;
      font-weight: 700;
      color: var(--text-main);
      margin-bottom: 8px;
    }
    .contact-card-text {
      font-size: 14px;
      color: var(--text-muted);
      line-height: 1.6;
    }
    .contact-card-text a {
      color: var(--text-muted);
      text-decoration: none;
      transition: color 0.2s;
    }
    .contact-card-text a:hover { color: var(--fikes-purple); }

    .form-wrap-custom {
      background: var(--white);
      border: 1px solid var(--border-light);
      border-radius: 24px;
      padding: 40px;
      box-shadow: var(--shadow-md);
    }
    .form-label-custom {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 13.5px;
      font-weight: 700;
      color: var(--text-main);
      margin-bottom: 8px;
    }
    .form-control-custom {
      width: 100%;
      background: var(--surface-light);
      border: 1.5px solid transparent;
      border-radius: 12px;
      padding: 12px 18px;
      font-size: 14.5px;
      color: var(--text-main);
      outline: none;
      transition: all 0.25s;
    }
    .form-control-custom:focus {
      background: var(--white);
      border-color: var(--fikes-purple);
      box-shadow: 0 0 0 3px rgba(130, 60, 162, 0.1);
    }
    .btn-submit-form {
      display: inline-flex; align-items: center; justify-content: center; gap: 8px;
      background: var(--fikes-purple);
      color: white;
      border: none;
      width: 100%;
      font-size: 15px;
      font-weight: 700;
      font-family: 'Plus Jakarta Sans', sans-serif;
      padding: 14px;
      border-radius: 12px;
      transition: all 0.25s ease;
      box-shadow: var(--shadow-purple);
    }
    .btn-submit-form:hover {
      background: var(--fikes-purple-dark);
      transform: translateY(-2px);
      box-shadow: 0 10px 24px rgba(130, 60, 162, 0.35);
    }

    /* ═══════════════════════════════════════════════
       CTA SECTION (Solid Obsidian Contrast)
    ═══════════════════════════════════════════════ */
    .cta-section {
      background: var(--obsidian-dark);
      padding: 85px 0;
      position: relative;
      overflow: hidden;
      border-top: 1px solid rgba(255, 255, 255, 0.08);
    }
    .cta-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(30px, 4vw, 46px);
      font-weight: 800;
      color: white;
      letter-spacing: -1px;
      line-height: 1.2;
      margin-bottom: 16px;
    }
    .cta-title em { font-style: normal; color: var(--fikes-orange); }
    .cta-desc { font-size: 16px; color: rgba(255, 255, 255, 0.7); line-height: 1.8; margin-bottom: 32px; }

    /* ═══════════════════════════════════════════════
       FOOTER (Solid Obsidian Design)
    ═══════════════════════════════════════════════ */
    .footer-main {
      background: var(--obsidian-dark);
      padding: 70px 0 35px;
      color: rgba(255, 255, 255, 0.7);
      border-top: 1px solid rgba(255, 255, 255, 0.08);
    }
    .footer-logo { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; text-decoration: none; }
    .footer-brand-name {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 18px; font-weight: 800;
      color: white; letter-spacing: -0.3px; line-height: 1.1;
    }
    .footer-brand-sub { font-size: 11px; color: rgba(255, 255, 255, 0.5); }
    .footer-desc { font-size: 13.5px; line-height: 1.75; color: rgba(255, 255, 255, 0.55); margin-bottom: 22px; }

    .footer-social { display: flex; gap: 8px; }
    .footer-social a {
      width: 36px; height: 36px;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.08);
      display: flex; align-items: center; justify-content: center;
      color: rgba(255, 255, 255, 0.75);
      font-size: 15px;
      text-decoration: none;
      transition: all 0.25s ease;
    }
    .footer-social a:hover { 
      background: var(--fikes-orange); 
      color: var(--obsidian-dark);
      transform: translateY(-2px);
    }

    .footer-heading { 
      font-family: 'Plus Jakarta Sans', sans-serif; 
      font-size: 13.5px; 
      font-weight: 700; 
      color: white; 
      letter-spacing: 0.6px; 
      text-transform: uppercase; 
      margin-bottom: 18px; 
    }
    .footer-links { list-style: none; padding: 0; margin: 0; }
    .footer-links li { margin-bottom: 10px; }
    .footer-links a {
      font-size: 13.5px;
      color: rgba(255, 255, 255, 0.6);
      text-decoration: none;
      transition: color 0.2s;
      display: flex; align-items: center; gap: 8px;
    }
    .footer-links a:hover { color: var(--fikes-orange); }
    .footer-links a i { font-size: 11px; color: var(--fikes-orange); }

    .footer-contact-item { display: flex; align-items: flex-start; gap: 12px; margin-bottom: 14px; }
    .footer-contact-icon {
      width: 34px; height: 34px;
      background: rgba(130, 60, 162, 0.35);
      border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }
    .footer-contact-icon i { font-size: 14px; color: var(--fikes-orange); }
    .footer-contact-text { font-size: 13px; color: rgba(255, 255, 255, 0.6); line-height: 1.5; }
    .footer-contact-text strong { display: block; color: rgba(255, 255, 255, 0.85); font-weight: 600; margin-bottom: 2px; }

    .footer-divider {
      border-top: 1px solid rgba(255, 255, 255, 0.08);
      margin: 36px 0 24px;
    }
    .footer-bottom { font-size: 12.5px; color: rgba(255, 255, 255, 0.45); }
    .footer-bottom a { color: rgba(255, 255, 255, 0.6); text-decoration: none; }
    .footer-bottom a:hover { color: var(--fikes-orange); }

    /* ═══════════════════════════════════════════════
       BACK TO TOP & TOGGLER
    ═══════════════════════════════════════════════ */
    .back-to-top {
      position: fixed;
      bottom: 28px; right: 28px;
      width: 44px; height: 44px;
      background: var(--fikes-purple);
      border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      color: white;
      font-size: 17px;
      text-decoration: none;
      box-shadow: var(--shadow-purple);
      opacity: 0;
      transform: translateY(10px);
      transition: all 0.3s ease;
      z-index: 999;
    }
    .back-to-top.show { opacity: 1; transform: translateY(0); }
    .back-to-top:hover { 
      background: var(--fikes-purple-dark); 
      color: white; 
      transform: translateY(-3px); 
      box-shadow: 0 10px 28px rgba(130, 60, 162, 0.45); 
    }

    .navbar-toggler { border: 1.5px solid var(--border-light); border-radius: 8px; padding: 6px 10px; }
    .navbar-toggler:focus { box-shadow: none; outline: 2px solid var(--fikes-purple); }

    /* ═══════════════════════════════════════════════
       RESPONSIVENESS
    ═══════════════════════════════════════════════ */
    @media (max-width: 768px) {
      section { padding: 50px 0; }
      .section-title { font-size: 26px; }
      .section-desc { font-size: 14px; line-height: 1.6; }

      .navbar-collapse {
        background: var(--white);
        border: 1px solid var(--border-light);
        border-radius: 16px;
        padding: 18px;
        margin-top: 12px;
        box-shadow: var(--shadow-md);
      }
      .nav-link-custom {
        padding: 10px 14px !important;
        font-size: 14px;
        margin-bottom: 4px;
      }
      .btn-login-nav {
        display: flex;
        justify-content: center;
        width: 100%;
        margin-top: 8px;
      }

      .product-strip-item { 
        border-right: none; 
        border-bottom: 1px solid var(--border-light); 
        padding: 16px 0; 
      }
      .row > div:last-child .product-strip-item { 
        border-bottom: none !important; 
      }
    }
  </style>
</head>

<body>

<!-- ═══════════════════════════════════════════════
     TOPBAR
═══════════════════════════════════════════════ -->
<div class="topbar d-none d-lg-block">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center gap-2 flex-wrap">
        <a href="mailto:{{ $contact->email ?? 'info@fikes.ac.id' }}"><i class="bi bi-envelope me-1"></i> {{ $contact->email ?? 'info@fikes.ac.id' }}</a>
        <span class="sep">|</span>
        <a href="https://wa.me/{{ $cleanWa ?? '6281234567890' }}" target="_blank"><i class="bi bi-telephone me-1"></i> {{ $contact->no_wa ?? '+62 812 3456 7890' }}</a>
        <span class="sep">|</span>
        <span><i class="bi bi-geo-alt me-1"></i> {{ $contact->alamat ? Str::limit($contact->alamat, 60) : 'Fakultas Ilmu Kesehatan (FIKES)' }}</span>
      </div>
      <div class="d-flex align-items-center">
        <span class="me-2" style="font-size:11px; letter-spacing:.5px;">Ikuti Kami:</span>
        <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
        <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
        <a href="#" class="social-link"><i class="bi bi-whatsapp"></i></a>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     NAVBAR
═══════════════════════════════════════════════ -->
<nav class="navbar-main">
  <div class="container">
    <nav class="navbar navbar-expand-lg w-100">
      <a href="{{ route('homepage') }}" class="brand-wrap me-4">
        <img src="{{ asset('frontend/img/logofikes.png') }}" alt="Logo Fikes" style="height: 42px; width: auto; object-fit: contain;">
        <div class="brand-text">
          <div class="name">FIKES</div>
          <div class="sub">Fakultas Ilmu Kesehatan</div>
        </div>
      </a>

      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav mx-auto gap-1">
          <li class="nav-item"><a href="{{ route('homepage') }}" class="nav-link nav-link-custom">Beranda</a></li>
          <li class="nav-item"><a href="{{ route('homepage.tentang') }}" class="nav-link nav-link-custom">Tentang</a></li>
          <li class="nav-item"><a href="{{ route('homepage.testimoni') }}" class="nav-link nav-link-custom">Testimoni</a></li>
          <li class="nav-item"><a href="{{ route('homepage.faq') }}" class="nav-link nav-link-custom">FAQ</a></li>
          <li class="nav-item"><a href="{{ route('homepage.kontak') }}" class="nav-link nav-link-custom">Kontak</a></li>
        </ul>
        <div class="mt-3 mt-lg-0">
          <a href="{{ route('login') }}" class="btn-login-nav">
            <i class="bi bi-box-arrow-in-right"></i>
            Masuk Portal
          </a>
        </div>
      </div>
    </nav>
  </div>
</nav>

<!-- ═══════════════════════════════════════════════
     MAIN CONTENT
═══════════════════════════════════════════════ -->
@yield('content')

<!-- ═══════════════════════════════════════════════
     FOOTER
═══════════════════════════════════════════════ -->
<footer class="footer-main">
  <div class="container">
    <div class="row g-5">
      <!-- Brand -->
      <div class="col-lg-4">
        <a href="{{ route('homepage') }}" class="footer-logo">
          <img src="{{ asset('frontend/img/logofikes.png') }}" alt="Logo Fikes" style="height: 42px; width: auto; object-fit: contain; margin-right: 10px;">
          <div>
            <div class="footer-brand-name">FIKES</div>
            <div class="footer-brand-sub">Fakultas Ilmu Kesehatan</div>
          </div>
        </a>
        <p class="footer-desc">
          Fakultas Ilmu Kesehatan terdepan dalam inovasi, layanan fasilitas kesehatan, dan penyediaan produk berkualitas standar nasional.
        </p>
        <div class="footer-social">
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-whatsapp"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      <!-- Links -->
      <div class="col-6 col-lg-2">
        <div class="footer-heading">Navigasi</div>
        <ul class="footer-links">
          <li><a href="{{ route('homepage') }}"><i class="bi bi-chevron-right"></i> Beranda</a></li>
          <li><a href="{{ route('homepage.tentang') }}"><i class="bi bi-chevron-right"></i> Tentang Kami</a></li>
          <li><a href="{{ route('homepage.testimoni') }}"><i class="bi bi-chevron-right"></i> Testimoni</a></li>
          <li><a href="{{ route('homepage.faq') }}"><i class="bi bi-chevron-right"></i> FAQ</a></li>
          <li><a href="{{ route('homepage.kontak') }}"><i class="bi bi-chevron-right"></i> Kontak</a></li>
        </ul>
      </div>

      <!-- Layanan & Informasi -->
      <div class="col-6 col-lg-2">
        <div class="footer-heading">Fakultas</div>
        <ul class="footer-links">
          <li><a href="{{ route('homepage.tentang') }}"><i class="bi bi-chevron-right"></i> Visi & Misi</a></li>
          <li><a href="{{ route('homepage.tentang') }}"><i class="bi bi-chevron-right"></i> Profil FIKES</a></li>
          <li><a href="{{ route('homepage.testimoni') }}"><i class="bi bi-chevron-right"></i> Ulasan Civitas</a></li>
          <li><a href="{{ route('homepage.faq') }}"><i class="bi bi-chevron-right"></i> Informasi FAQ</a></li>
          <li><a href="{{ route('homepage.kontak') }}"><i class="bi bi-chevron-right"></i> Layanan Kontak</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-lg-4">
        <div class="footer-heading">Hubungi Kami</div>
        <div class="footer-contact-item">
          <div class="footer-contact-icon"><i class="bi bi-geo-alt"></i></div>
          <div class="footer-contact-text">
            <strong>Alamat</strong>
            {{ $contact->alamat ?? 'Fakultas Ilmu Kesehatan, Kampus Terpadu' }}
          </div>
        </div>
        <div class="footer-contact-item">
          <div class="footer-contact-icon"><i class="bi bi-telephone"></i></div>
          <div class="footer-contact-text">
            <strong>Telepon / WhatsApp</strong>
            {{ $contact->no_wa ?? '+62 812 3456 7890' }}
          </div>
        </div>
        <div class="footer-contact-item">
          <div class="footer-contact-icon"><i class="bi bi-envelope"></i></div>
          <div class="footer-contact-text">
            <strong>Email</strong>
            {{ $contact->email ?? 'info@fikes.ac.id' }}
          </div>
        </div>
        <div class="footer-contact-item">
          <div class="footer-contact-icon"><i class="bi bi-clock"></i></div>
          <div class="footer-contact-text">
            <strong>Jam Operasional</strong>
            Senin – Sabtu: 08.00 – 17.00 WIB
          </div>
        </div>
      </div>
    </div>

    <div class="footer-divider"></div>

    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 footer-bottom">
      <span>© {{ date('Y') }} FIKES — Fakultas Ilmu Kesehatan. All rights reserved.</span>
      <div class="d-flex gap-3">
        <a href="#">Kebijakan Privasi</a>
        <a href="#">Syarat & Ketentuan</a>
        <a href="{{ route('login') }}" style="color:var(--fikes-orange);">Portal Admin</a>
      </div>
    </div>
  </div>
</footer>

<!-- Back to Top -->
<a href="#" class="back-to-top" id="backToTop">
  <i class="bi bi-chevron-up"></i>
</a>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script>
  // AOS Init
  AOS.init({ once: true, offset: 60 });

  // Back to top
  const btn = document.getElementById('backToTop');
  window.addEventListener('scroll', () => {
    btn.classList.toggle('show', window.scrollY > 400);
  });
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  // FAQ Toggle
  function toggleFaq(id) {
    const item = document.getElementById(id);
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(f => f.classList.remove('open'));
    if (!isOpen) item.classList.add('open');
  }

  // Smooth scroll for nav links
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  @if($isHome)
  // Active nav on scroll (Only run on homepage context)
  const sections = document.querySelectorAll('section[id], div[id]');
  const navLinks = document.querySelectorAll('.nav-link-custom');
  window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => {
      if (window.scrollY >= s.offsetTop - 120) current = s.getAttribute('id');
    });
    navLinks.forEach(l => {
      l.classList.remove('active');
      if (l.getAttribute('href') === '#' + current) l.classList.add('active');
    });
  });
  @endif

  // Navbar scroll shadow
  const navbar = document.querySelector('.navbar-main');
  window.addEventListener('scroll', () => {
    navbar.style.boxShadow = window.scrollY > 20
      ? '0 4px 24px rgba(25, 10, 36, 0.12)'
      : '0 2px 16px rgba(25, 10, 36, 0.05)';
  });
</script>

@stack('scripts')

</body>
</html>
