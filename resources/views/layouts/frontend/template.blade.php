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
  <title>@yield('title', 'FIKES — Fakultas Ilmu Kesehatan | Unggul & Berintegritas')</title>
  <meta name="description" content="@yield('meta_description', 'Portal Resmi Fakultas Ilmu Kesehatan (FIKES) — Pusat Pendidikan Kesehatan, Layanan Laboratorium, Informasi Akademik, dan Riset Terpadu.')">
  <meta name="keywords" content="@yield('meta_keywords', 'fikes, fakultas ilmu kesehatan, keperawatan, kebidanan, farmasi, gizi, kesehatan masyarakat, laboratorium kesehatan, pendidikan tinggi')">
  <meta name="author" content="@yield('meta_author', 'Fakultas Ilmu Kesehatan')">

  <!-- Open Graph / Facebook / WhatsApp / Telegram Preview -->
  <meta property="og:type" content="@yield('og_type', 'website')">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:title" content="@yield('og_title', View::yieldContent('title', 'FIKES — Fakultas Ilmu Kesehatan | Unggul & Berintegritas'))">
  <meta property="og:description" content="@yield('og_description', View::yieldContent('meta_description', 'Portal Resmi Fakultas Ilmu Kesehatan (FIKES) — Pusat Pendidikan Kesehatan, Layanan Laboratorium, Informasi Akademik, dan Riset Terpadu.'))">
  <meta property="og:image" content="@yield('og_image', asset('assets/img/logouis.png'))">
  <meta property="og:image:secure_url" content="@yield('og_image', asset('assets/img/logouis.png'))">
  <meta property="og:site_name" content="FIKES — Fakultas Ilmu Kesehatan">

  <!-- Twitter / X Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ url()->current() }}">
  <meta name="twitter:title" content="@yield('og_title', View::yieldContent('title', 'FIKES — Fakultas Ilmu Kesehatan | Unggul & Berintegritas'))">
  <meta name="twitter:description" content="@yield('og_description', View::yieldContent('meta_description', 'Portal Resmi Fakultas Ilmu Kesehatan (FIKES) — Pusat Pendidikan Kesehatan, Layanan Laboratorium, Informasi Akademik, dan Riset Terpadu.'))">
  <meta name="twitter:image" content="@yield('og_image', asset('assets/img/logouis.png'))">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('assets/img/logouis.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('assets/img/logouis.png') }}">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- AOS Animation CSS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style>
    /* ═══════════════════════════════════════════════
       DESIGN TOKENS — FIKES (SOLID PALETTE, ZERO GRADIENTS)
       Purple: #823ca2 | Orange: #ff9c00
    ═══════════════════════════════════════════════ */
    :root {
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
      
      --obsidian-dark:      #190a24;
      --obsidian-card:      #241033;
      
      --white:              #ffffff;
      --page-bg:            #fcfaff;
      --surface-light:      #f6effb;
      --surface-muted:      #f0e5f7;
      
      --text-main:          #190a24;
      --text-muted:         #655672;
      --text-light:         #9586a2;
      
      --border-light:       #ebdff2;
      --border-purple:      #cfb5db;
      --border-orange:      #ffd79a;
      
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
      background-color: var(--page-bg);
      color: var(--text-main);
      overflow-x: hidden;
      line-height: 1.65;
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 700;
      color: var(--text-main);
    }

    a { text-decoration: none; transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1); }

    /* ═══════════════════════════════════════════════
       TOPBAR — Solid Obsidian Theme
    ═══════════════════════════════════════════════ */
    .topbar-main {
      background: var(--obsidian-dark);
      padding: 9px 0;
      border-bottom: 1px solid rgba(130, 60, 162, 0.3);
      font-size: 13px;
      color: rgba(255, 255, 255, 0.8);
    }

    .topbar-main a {
      color: rgba(255, 255, 255, 0.85);
    }
    .topbar-main a:hover {
      color: var(--fikes-orange);
    }

    .topbar-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: var(--fikes-purple);
      color: var(--white);
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.5px;
      padding: 3px 10px;
      border-radius: 50px;
      text-transform: uppercase;
    }

    /* ═══════════════════════════════════════════════
       NAVBAR — Solid FIKES Purple (#823ca2) with Orange (#ff9c00) Font & Dropdowns
    ═══════════════════════════════════════════════ */
    .navbar-main {
      background: var(--fikes-purple, #823ca2);
      padding: 10px 0;
      position: sticky;
      top: 0;
      z-index: 1050;
      border-bottom: 2.5px solid var(--fikes-orange, #ff9c00);
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.16);
    }

    .navbar-brand-custom {
      display: flex;
      align-items: center;
      text-decoration: none;
    }

    .brand-logo-img {
      height: 48px;
      max-height: 48px;
      width: auto;
      object-fit: contain;
    }

    .nav-link-custom {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 13px;
      font-weight: 700;
      color: #ffffff !important;
      padding: 7px 10px !important;
      border-radius: 8px;
      transition: all 0.2s ease;
      white-space: nowrap;
      display: inline-flex;
      align-items: center;
      gap: 4px;
    }

    .nav-link-custom:hover,
    .nav-link-custom.active,
    .show > .nav-link-custom {
      color: var(--fikes-orange, #ff9c00) !important;
      background: rgba(255, 255, 255, 0.15);
    }

    /* Hide bootstrap default dropdown caret (prevent double arrow) */
    .navbar-main .dropdown-toggle::after {
      display: none !important;
    }

    /* Modern Dropdown Menus */
    .dropdown-menu-custom {
      background: var(--white);
      border: 1px solid var(--border-light);
      border-top: 3px solid var(--fikes-purple);
      border-radius: 14px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
      padding: 10px 8px;
      min-width: 220px;
      animation: fadeInDown 0.2s ease forwards;
    }

    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-8px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .dropdown-item-custom {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 13px;
      font-weight: 600;
      color: var(--text-main);
      padding: 8px 14px;
      border-radius: 8px;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .dropdown-item-custom:hover {
      background: var(--fikes-purple-light);
      color: var(--fikes-purple);
      padding-left: 18px;
    }

    .dropdown-item-custom i {
      font-size: 14px;
      color: var(--fikes-orange);
    }

    .navbar-toggler {
      border: 1.5px solid var(--fikes-orange, #ff9c00) !important;
      padding: 6px 10px;
      border-radius: 8px;
      outline: none !important;
    }
    .navbar-toggler-icon {
      filter: invert(1);
    }

    /* ═══════════════════════════════════════════════
       MOBILE NAVBAR DRAWER & STYLING (< 1200px)
    ═══════════════════════════════════════════════ */
    @media (max-width: 1199.98px) {
      .navbar-collapse {
        background: #1e092b !important;
        border: 1px solid rgba(255, 255, 255, 0.12) !important;
        border-radius: 20px !important;
        padding: 20px 16px !important;
        margin-top: 14px !important;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.45) !important;
      }
      .navbar-nav {
        align-items: stretch !important;
        text-align: left !important;
        gap: 5px !important;
        width: 100% !important;
      }
      .nav-item {
        width: 100% !important;
      }
      .nav-link-custom {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        padding: 11px 16px !important;
        font-size: 14px !important;
        font-weight: 700 !important;
        color: rgba(255, 255, 255, 0.9) !important;
        background: rgba(255, 255, 255, 0.04) !important;
        border-radius: 12px !important;
        margin-bottom: 2px !important;
        transition: all 0.2s ease !important;
        width: 100% !important;
      }
      .nav-link-custom:hover,
      .nav-link-custom.active,
      .show > .nav-link-custom {
        background: var(--fikes-purple, #823ca2) !important;
        color: #ffffff !important;
      }
      .dropdown-menu-custom {
        background: rgba(0, 0, 0, 0.3) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-left: 3px solid var(--fikes-orange) !important;
        border-radius: 12px !important;
        margin: 6px 0 10px 10px !important;
        padding: 8px !important;
        box-shadow: none !important;
        animation: none !important;
      }
      .dropdown-item-custom {
        color: rgba(255, 255, 255, 0.85) !important;
        padding: 9px 14px !important;
        font-size: 13px !important;
        border-radius: 8px !important;
      }
      .dropdown-item-custom:hover,
      .dropdown-item-custom.active {
        background: rgba(255, 156, 0, 0.18) !important;
        color: var(--fikes-orange, #ff9c00) !important;
      }
      .navbar-main .d-flex.align-items-center.gap-2.mt-3.mt-xl-0 {
        display: grid !important;
        grid-template-columns: 1fr 1fr;
        gap: 10px !important;
        margin-top: 18px !important;
        padding-top: 14px !important;
        border-top: 1px solid rgba(255, 255, 255, 0.12) !important;
      }
      .btn-pmb-nav,
      .btn-portal-nav {
        width: 100% !important;
        justify-content: center !important;
        padding: 11px 14px !important;
        font-size: 13px !important;
        border-radius: 10px !important;
        text-align: center !important;
      }
    }

    /* CTA Buttons */
    .btn-pmb-nav {
      background: var(--fikes-orange, #ff9c00);
      color: #190a24 !important;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 800;
      font-size: 12.5px;
      padding: 8px 15px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(255, 156, 0, 0.35);
      display: inline-flex;
      align-items: center;
      gap: 6px;
      border: 1px solid var(--fikes-orange, #ff9c00);
      transition: all 0.25s ease;
      white-space: nowrap;
    }
    .btn-pmb-nav:hover {
      background: #e68c00;
      color: #ffffff !important;
      transform: translateY(-2px);
    }

    .btn-portal-nav {
      background: rgba(255, 255, 255, 0.12);
      color: #ffffff !important;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 700;
      font-size: 12.5px;
      padding: 8px 14px;
      border-radius: 8px;
      border: 1px solid rgba(255, 255, 255, 0.35);
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: all 0.25s ease;
      white-space: nowrap;
    }
    .btn-portal-nav:hover {
      background: rgba(255, 255, 255, 0.25);
      border-color: var(--fikes-orange);
      color: var(--fikes-orange) !important;
      transform: translateY(-2px);
    }

    .btn-primary-hero {
      background: var(--fikes-orange);
      color: var(--white);
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 700;
      font-size: 15px;
      padding: 14px 28px;
      border-radius: 12px;
      border: none;
      box-shadow: var(--shadow-orange);
      display: inline-flex;
      align-items: center;
      gap: 9px;
    }
    .btn-primary-hero:hover {
      background: var(--fikes-orange-hover);
      color: var(--white);
      transform: translateY(-2px);
    }

    .btn-outline-hero {
      background: rgba(255, 255, 255, 0.1);
      color: var(--white);
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 700;
      font-size: 15px;
      padding: 14px 28px;
      border-radius: 12px;
      border: 1.5px solid rgba(255, 255, 255, 0.35);
      display: inline-flex;
      align-items: center;
      gap: 9px;
    }
    .btn-outline-hero:hover {
      background: var(--white);
      color: var(--obsidian-dark);
      border-color: var(--white);
      transform: translateY(-2px);
    }

    /* ═══════════════════════════════════════════════
       SECTION GENERAL STYLING
    ═══════════════════════════════════════════════ */
    section { padding: 80px 0; position: relative; }
    .section-bg-white { background: var(--white); }
    .section-bg-sand { background: var(--page-bg); }
    .section-bg-cream { background: var(--surface-light); }

    .section-label {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--fikes-purple-light);
      color: var(--fikes-purple);
      border: 1px solid var(--border-purple);
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1.2px;
      padding: 6px 16px;
      border-radius: 50px;
      margin-bottom: 16px;
    }

    .section-title {
      font-size: 36px;
      font-weight: 800;
      letter-spacing: -0.8px;
      line-height: 1.25;
      margin-bottom: 16px;
    }
    .section-title em {
      font-style: normal;
      color: var(--fikes-purple);
    }

    .section-desc {
      font-size: 16px;
      color: var(--text-muted);
      max-width: 680px;
      line-height: 1.7;
    }

    .divider-line {
      width: 60px;
      height: 4px;
      background: var(--fikes-orange);
      border-radius: 2px;
      margin-bottom: 24px;
    }
    .divider-line.centered { margin-left: auto; margin-right: auto; }

    /* ═══════════════════════════════════════════════
       CARDS & INTERACTIVE ELEMENTS
    ═══════════════════════════════════════════════ */
    .feature-card, .value-card, .service-card {
      background: var(--white);
      border: 1px solid var(--border-light);
      border-radius: 20px;
      padding: 36px 30px;
      box-shadow: var(--shadow-sm);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      height: 100%;
    }
    .feature-card:hover, .value-card:hover, .service-card:hover {
      transform: translateY(-6px);
      border-color: var(--border-purple);
      box-shadow: var(--shadow-lg);
    }

    .feature-icon-wrap, .value-icon-wrap {
      width: 64px;
      height: 64px;
      background: var(--fikes-purple-light);
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--fikes-purple);
      font-size: 28px;
      margin-bottom: 24px;
      border: 1px solid var(--fikes-purple-subtle);
    }

    .feature-title, .value-title {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 12px;
    }

    .feature-desc, .value-desc {
      font-size: 14.5px;
      color: var(--text-muted);
      line-height: 1.65;
    }

    /* Counter Section */
    .counter-section {
      background: var(--obsidian-dark);
      padding: 60px 0;
      color: var(--white);
      border-top: 1px solid rgba(130, 60, 162, 0.3);
      border-bottom: 1px solid rgba(130, 60, 162, 0.3);
    }
    .counter-item { text-align: center; }
    .counter-icon { font-size: 32px; color: var(--fikes-orange); margin-bottom: 10px; }
    .counter-num {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 42px;
      font-weight: 800;
      color: var(--white);
      line-height: 1;
      margin-bottom: 6px;
    }
    .counter-num sup { font-size: 22px; color: var(--fikes-orange); }
    .counter-label { font-size: 14px; color: rgba(255, 255, 255, 0.7); font-weight: 500; }

    /* Testimonials */
    .testi-card {
      background: var(--white);
      border: 1px solid var(--border-light);
      border-radius: 20px;
      padding: 32px;
      box-shadow: var(--shadow-sm);
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: all 0.3s ease;
    }
    .testi-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-lg);
      border-color: var(--border-purple);
    }
    .testi-stars { color: var(--fikes-orange); font-size: 16px; margin-bottom: 14px; }
    .testi-text { font-size: 14.5px; color: var(--text-main); line-height: 1.7; margin-bottom: 24px; font-style: italic; }
    .testi-author { display: flex; align-items: center; gap: 14px; }
    .testi-avatar {
      width: 46px; height: 46px;
      background: var(--fikes-purple);
      color: var(--white);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-weight: 700; font-size: 16px;
    }
    .testi-name { font-weight: 700; font-size: 15px; }
    .testi-role { font-size: 12.5px; color: var(--text-muted); }

    /* FAQ */
    .faq-item {
      background: var(--white);
      border: 1px solid var(--border-light);
      border-radius: 16px;
      margin-bottom: 14px;
      overflow: hidden;
      transition: all 0.25s ease;
    }
    .faq-header {
      padding: 20px 24px;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 700;
      font-size: 16px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: space-between;
      color: var(--text-main);
      user-select: none;
    }
    .faq-header:hover { color: var(--fikes-purple); }
    .faq-icon {
      width: 28px; height: 28px;
      background: var(--fikes-purple-light);
      color: var(--fikes-purple);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 13px;
      transition: transform 0.25s ease;
    }
    .faq-body {
      padding: 0 24px 22px;
      font-size: 14.5px;
      color: var(--text-muted);
      line-height: 1.75;
      display: none;
    }
    .faq-item.open .faq-body { display: block; }
    .faq-item.open .faq-icon { transform: rotate(180deg); background: var(--fikes-purple); color: var(--white); }

    /* ═══════════════════════════════════════════════
       FOOTER — Solid Dark Obsidian
    ═══════════════════════════════════════════════ */
    .footer-main {
      background: var(--obsidian-dark);
      color: rgba(255, 255, 255, 0.7);
      padding: 70px 0 28px;
      border-top: 2px solid var(--fikes-purple);
    }
    .footer-logo {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
      margin-bottom: 18px;
    }
    .footer-brand-name {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 22px;
      font-weight: 800;
      color: var(--white);
    }
    .footer-brand-sub {
      font-size: 12px;
      color: rgba(255, 255, 255, 0.6);
    }
    .footer-desc {
      font-size: 14px;
      line-height: 1.75;
      margin-bottom: 24px;
    }
    .footer-social { display: flex; gap: 10px; }
    .footer-social a {
      width: 38px; height: 38px;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      color: var(--white);
      font-size: 16px;
      border: 1px solid rgba(255, 255, 255, 0.12);
    }
    .footer-social a:hover {
      background: var(--fikes-purple);
      border-color: var(--fikes-purple);
      color: var(--white);
    }
    .footer-heading {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 16px;
      font-weight: 700;
      color: var(--white);
      margin-bottom: 20px;
    }
    .footer-links { list-style: none; padding: 0; margin: 0; }
    .footer-links li { margin-bottom: 10px; }
    .footer-links a {
      color: rgba(255, 255, 255, 0.7);
      font-size: 13.5px;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .footer-links a:hover { color: var(--fikes-orange); transform: translateX(3px); }
    .footer-contact-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      margin-bottom: 14px;
      font-size: 13.5px;
    }
    .footer-contact-icon {
      color: var(--fikes-orange);
      font-size: 18px;
      flex-shrink: 0;
      margin-top: 2px;
    }
    .footer-contact-text strong { display: block; color: var(--white); margin-bottom: 2px; }
    .footer-divider {
      height: 1px;
      background: rgba(255, 255, 255, 0.1);
      margin: 48px 0 24px;
    }
    .footer-bottom { font-size: 13px; }
    .footer-bottom a { color: rgba(255, 255, 255, 0.6); }
    .footer-bottom a:hover { color: var(--white); }

    /* Back to Top */
    .back-to-top {
      position: fixed;
      bottom: 24px;
      right: 24px;
      width: 44px;
      height: 44px;
      background: var(--fikes-purple);
      color: var(--white);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      z-index: 999;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
      box-shadow: var(--shadow-purple);
    }
    .back-to-top.show { opacity: 1; visibility: visible; }
    .back-to-top:hover {
      background: var(--fikes-purple-dark);
      transform: translateY(-3px);
      color: var(--white);
    }

    /* Check list */
    .check-list { list-style: none; padding: 0; margin: 0; }
    .check-list li {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      margin-bottom: 12px;
      font-size: 15px;
    }
    .check-icon {
      width: 22px; height: 22px;
      background: var(--fikes-purple-light);
      color: var(--fikes-purple);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 12px;
      flex-shrink: 0;
      margin-top: 3px;
    }

    /* Responsive Map Embed */
    .map-responsive-container iframe,
    .map-wrapper iframe,
    .contact-map-card iframe {
      width: 100% !important;
      height: 100% !important;
      min-height: 440px !important;
      border: 0 !important;
      display: block !important;
    }
  </style>

  @stack('styles')
</head>

<body>

<!-- ═══════════════════════════════════════════════
     TOPBAR
═══════════════════════════════════════════════ -->
<div class="topbar-main d-none d-lg-block">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center gap-4">
        <span class="topbar-badge"><i class="bi bi-shield-check"></i> FIKES UIS</span>
        <span><i class="bi bi-geo-alt me-1" style="color:var(--fikes-orange);"></i> {{ $contact->alamat ?? 'Fakultas Ilmu Kesehatan UIS, Kampus Terpadu' }}</span>
        <span><i class="bi bi-clock me-1" style="color:var(--fikes-orange);"></i> Senin - Sabtu: 08.00 - 17.00 WIB</span>
      </div>
      <div class="d-flex align-items-center gap-3">
        <!-- Social Media -->
        <a href="https://instagram.com" target="_blank" title="Instagram" class="text-white-50"><i class="bi bi-instagram"></i></a>
        <a href="https://youtube.com" target="_blank" title="YouTube" class="text-white-50"><i class="bi bi-youtube"></i></a>
        <a href="https://linkedin.com" target="_blank" title="LinkedIn" class="text-white-50"><i class="bi bi-linkedin"></i></a>
        <span style="opacity:0.25; color:white;">|</span>
        @if(!empty($contact->no_wa))
          <a href="https://wa.me/{{ $cleanWa }}" target="_blank"><i class="bi bi-whatsapp me-1 text-success"></i> {{ $contact->no_wa }}</a>
        @endif
        @if(!empty($contact->email))
          <a href="mailto:{{ $contact->email }}"><i class="bi bi-envelope me-1" style="color:var(--fikes-orange);"></i> {{ $contact->email }}</a>
        @endif
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     NAVBAR — FIKES UIS
═══════════════════════════════════════════════ -->
<nav class="navbar navbar-expand-xl navbar-main">
  <div class="container-fluid px-lg-4 px-xl-5">
    <!-- Logo FIKES UIS -->
    <a class="navbar-brand navbar-brand-custom me-2 me-xl-4" href="{{ route('homepage') }}">
      <img src="{{ asset('frontend/img/logofikes.png') }}" alt="Logo FIKES UIS" class="brand-logo-img">
    </a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav mx-auto gap-1 align-items-center">
        <!-- Beranda -->
        <li class="nav-item">
          <a href="{{ route('homepage') }}" class="nav-link nav-link-custom {{ request()->routeIs('homepage') ? 'active' : '' }}">Beranda</a>
        </li>

        <!-- Profil Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('homepage.tentang') || request()->routeIs('homepage.sambutan-dekan') || request()->routeIs('homepage.visi-misi') || request()->routeIs('homepage.struktur-organisasi') || request()->routeIs('homepage.sejarah') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profil <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-custom">
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.tentang') ? 'active' : '' }}" href="{{ route('homepage.tentang') }}"><i class="bi bi-building"></i> Tentang FIKES</a></li>
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.visi-misi') ? 'active' : '' }}" href="{{ route('homepage.visi-misi') }}"><i class="bi bi-bullseye"></i> Visi & Misi</a></li>
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.sambutan-dekan') ? 'active' : '' }}" href="{{ route('homepage.sambutan-dekan') }}"><i class="bi bi-person-badge"></i> Sambutan Dekan</a></li>
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.struktur-organisasi') ? 'active' : '' }}" href="{{ route('homepage.struktur-organisasi') }}"><i class="bi bi-diagram-3"></i> Struktur Organisasi</a></li>
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.sejarah') ? 'active' : '' }}" href="{{ route('homepage.sejarah') }}"><i class="bi bi-hourglass-split"></i> Sejarah Fakultas</a></li>
          </ul>
        </li>

        <!-- Akademik Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('homepage.kurikulum') || request()->routeIs('homepage.kalender-akademik') || request()->routeIs('homepage.pedoman-akademik') || request()->routeIs('homepage.sistem-akademik') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Akademik <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-custom">
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.kurikulum') ? 'active' : '' }}" href="{{ route('homepage.kurikulum') }}"><i class="bi bi-journal-text"></i> Kurikulum</a></li>
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.kalender-akademik') ? 'active' : '' }}" href="{{ route('homepage.kalender-akademik') }}"><i class="bi bi-calendar-check"></i> Kalender Akademik</a></li>
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.pedoman-akademik') ? 'active' : '' }}" href="{{ route('homepage.pedoman-akademik') }}"><i class="bi bi-book"></i> Pedoman Akademik</a></li>
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.sistem-akademik') ? 'active' : '' }}" href="{{ route('homepage.sistem-akademik') }}"><i class="bi bi-laptop"></i> Sistem Akademik</a></li>
          </ul>
        </li>

        <!-- Program Studi Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('homepage.layanan*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Program Studi <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-custom">
            @if(isset($navProdis) && $navProdis->count() > 0)
              @foreach($navProdis as $navProdi)
                @php
                  $rawLink = trim($navProdi->link ?? '');
                  if (!empty($rawLink) && !str_starts_with($rawLink, 'http://') && !str_starts_with($rawLink, 'https://') && !str_starts_with($rawLink, '/') && !str_starts_with($rawLink, '#')) {
                      $rawLink = 'https://' . $rawLink;
                  }
                  $hasLink = !empty($rawLink);
                  $prodiHref = $hasLink ? $rawLink : route('homepage.layanan.detail', $navProdi->id);
                  $isExternal = $hasLink && (str_starts_with($rawLink, 'http://') || str_starts_with($rawLink, 'https://'));
                @endphp
                <li>
                  <a class="dropdown-item dropdown-item-custom"
                     href="{{ $prodiHref }}"
                     @if($isExternal) target="_blank" rel="noopener noreferrer" @endif>
                    <i class="bi {{ $navProdi->icon ?: 'bi-mortarboard-fill' }}"></i>
                    <span>{{ $navProdi->judul }}</span>
                    @if($isExternal)
                      <i class="bi bi-box-arrow-up-right ms-auto text-muted" style="font-size: 10px;" title="Buka website prodi"></i>
                    @endif
                  </a>
                </li>
              @endforeach
              <li><hr class="dropdown-divider my-1"></li>
              <li>
                <a class="dropdown-item dropdown-item-custom fw-semibold" href="{{ route('homepage.layanan') }}" style="color: var(--fikes-purple);">
                  <i class="bi bi-grid-fill" style="color: var(--fikes-purple);"></i>
                  <span>Semua Program & Fasilitas</span>
                  <i class="bi bi-arrow-right ms-auto" style="font-size: 11px;"></i>
                </a>
              </li>
            @else
              <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.layanan') }}"><i class="bi bi-mortarboard-fill"></i> S2 Kesehatan Masyarakat</a></li>
              <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.layanan') }}"><i class="bi bi-shield-plus"></i> S1 Kesehatan dan Keselamatan Kerja</a></li>
              <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.layanan') }}"><i class="bi bi-tree-fill"></i> S1 Kesehatan Lingkungan</a></li>
            @endif
          </ul>
        </li>

        <!-- Kemahasiswaan Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-custom dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kemahasiswaan <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-custom">
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.prestasi') }}"><i class="bi bi-trophy-fill text-warning"></i> Prestasi Mahasiswa</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.galeri') }}"><i class="bi bi-people"></i> Organisasi & Kegiatan</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.galeri') }}"><i class="bi bi-camera"></i> Galeri Dokumentasi</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.testimoni') }}"><i class="bi bi-mortarboard"></i> Alumni & Testimoni</a></li>
          </ul>
        </li>

        <!-- Penelitian & Pengabdian Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-custom dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Penelitian & Pengabdian <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-custom">
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.news') }}"><i class="bi bi-file-earmark-medical"></i> Penelitian Dosen</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.news') }}"><i class="bi bi-journal-richtext"></i> Publikasi Ilmiah</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.galeri') }}"><i class="bi bi-heart-pulse"></i> Pengabdian Masyarakat</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.layanan') }}"><i class="bi bi-handshake"></i> Kerja Sama Riset</a></li>
          </ul>
        </li>

        <!-- Informasi Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('homepage.news*') || request()->routeIs('homepage.faq') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Informasi <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-custom">
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.news', ['category' => 'Berita Fakultas']) }}"><i class="bi bi-newspaper"></i> Berita</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.news', ['category' => 'Pengumuman & Agenda']) }}"><i class="bi bi-megaphone"></i> Pengumuman</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.news', ['category' => 'Pengumuman & Agenda']) }}"><i class="bi bi-calendar-event"></i> Agenda</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.news') }}"><i class="bi bi-card-text"></i> Artikel</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.faq') }}"><i class="bi bi-question-circle"></i> FAQ Informasi</a></li>
          </ul>
        </li>

        <!-- Kontak -->
        <li class="nav-item">
          <a href="{{ route('homepage.kontak') }}" class="nav-link nav-link-custom {{ request()->routeIs('homepage.kontak') ? 'active' : '' }}">Kontak</a>
        </li>
      </ul>

      <!-- CTA Buttons -->
      <div class="d-flex align-items-center gap-2 mt-3 mt-xl-0">
        @php
          $pmbNavUrl = $pmbSetting->tombol_link_1 ?? route('homepage.kontak');
          if (!str_starts_with($pmbNavUrl, 'http') && !str_starts_with($pmbNavUrl, '/')) {
              $pmbNavUrl = '/' . $pmbNavUrl;
          }
          $pmbNavTarget = str_starts_with($pmbNavUrl, 'http') ? '_blank' : '_self';
        @endphp
        <a href="{{ $pmbNavUrl }}" target="{{ $pmbNavTarget }}" class="btn-pmb-nav" title="Penerimaan Mahasiswa Baru">
          <i class="bi bi-pencil-square"></i>
          <span>PMB / Daftar</span>
        </a>
        <a href="{{ route('login') }}" class="btn-portal-nav" title="Login">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </div>
    </div>
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
        <a href="{{ route('homepage') }}" class="footer-logo mb-3 d-inline-block">
          <img src="{{ asset('frontend/img/logofikes.png') }}" alt="Logo FIKES UIS" style="height: 48px; width: auto; object-fit: contain;">
        </a>
        <p class="footer-desc">
          Pusat keunggulan pendidikan, riset, serta pelayanan kesehatan terintegrasi yang berdedikasi melahirkan lulusan profesional, beretika, dan berkompeten.
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
          <li><a href="{{ route('homepage.layanan') }}"><i class="bi bi-chevron-right"></i> Layanan</a></li>
          <li><a href="{{ route('homepage.galeri') }}"><i class="bi bi-chevron-right"></i> Galeri</a></li>
          <li><a href="{{ route('homepage.news') }}"><i class="bi bi-chevron-right"></i> Berita</a></li>
          <li><a href="{{ route('homepage.tentang') }}"><i class="bi bi-chevron-right"></i> Tentang Kami</a></li>
          <li><a href="{{ route('homepage.kontak') }}"><i class="bi bi-chevron-right"></i> Kontak</a></li>
        </ul>
      </div>

      <!-- Fakultas Info -->
      <div class="col-6 col-lg-2">
        <div class="footer-heading">Akademik</div>
        <ul class="footer-links">
          <li><a href="{{ route('homepage.visi-misi') }}"><i class="bi bi-chevron-right"></i> Visi & Misi</a></li>
          <li><a href="{{ route('homepage.sambutan-dekan') }}"><i class="bi bi-chevron-right"></i> Sambutan Dekan</a></li>
          <li><a href="{{ route('homepage.struktur-organisasi') }}"><i class="bi bi-chevron-right"></i> Struktur Organisasi</a></li>
          <li><a href="{{ route('homepage.testimoni') }}"><i class="bi bi-chevron-right"></i> Testimoni</a></li>
          <li><a href="{{ route('homepage.faq') }}"><i class="bi bi-chevron-right"></i> FAQ Informasi</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-lg-4">
        <div class="footer-heading">Hubungi Kami</div>
        <div class="footer-contact-item">
          <div class="footer-contact-icon"><i class="bi bi-geo-alt"></i></div>
          <div class="footer-contact-text">
            <strong>Alamat Kampus</strong>
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
            <strong>Email Resmi</strong>
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
  AOS.init({ once: true, offset: 60 });

  const btn = document.getElementById('backToTop');
  window.addEventListener('scroll', () => {
    btn.classList.toggle('show', window.scrollY > 400);
  });
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  function toggleFaq(id) {
    const item = document.getElementById(id);
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(f => f.classList.remove('open'));
    if (!isOpen) item.classList.add('open');
  }
</script>

@stack('scripts')

</body>
</html>
