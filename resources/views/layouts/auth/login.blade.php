<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>Login Portal — Pusat Layanan Disabilitas Universitas Ibnu Sina</title>
  <meta name="description" content="Portal Login Resmi PLD - Pelayanan Disabilitas Universitas Ibnu Sina">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('assets/img/logouis.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('assets/img/logouis.png') }}">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --pld-green-deep:   #15230f;
      --pld-green-dark:   #1e3215;
      --pld-green-base:   #2b461f;
      --pld-green-brand:  #56823D;
      --pld-green-light:  #A8D27D;
      --pld-green-subtle: #eef8e6;

      --pld-gold-brand:   #D99032;
      --pld-gold-hover:   #c27e26;
      --pld-gold-light:   #fef6eb;

      --surface-cream:    #FAF8EE;
      --surface-cream-alt:#f3efdf;
      --text-dark:        #1f2937;
      --text-muted:       #4b5563;
      --text-light:       #6b7280;
      --border-cream:     #e5e0cc;
      --white:            #ffffff;
    }

    html, body {
      height: 100vh;
      max-height: 100vh;
      width: 100vw;
      max-width: 100vw;
      margin: 0;
      padding: 0;
      overflow: hidden !important;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: var(--surface-cream);
      color: var(--text-dark);
      -webkit-font-smoothing: antialiased;
    }

    .login-container {
      display: flex;
      height: 100vh;
      max-height: 100vh;
      width: 100vw;
      max-width: 100vw;
      overflow: hidden !important;
    }

    /* ══════════════════════════════════════════════════
       LEFT HERO BRAND PANEL
    ══════════════════════════════════════════════════ */
    .panel-brand {
      flex: 1.28;
      position: relative;
      height: 100vh;
      max-height: 100vh;
      background: linear-gradient(155deg, #14220e 0%, #1e3316 45%, #2a471e 100%);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: clamp(24px, 3.5vh, 42px) clamp(32px, 4.5vw, 64px);
      overflow: hidden !important;
      color: var(--white);
    }

    /* Modern Texture & Ambient Glows */
    .brand-grid-pattern {
      position: absolute;
      inset: 0;
      background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1.2px, transparent 1.2px);
      background-size: 26px 26px;
      pointer-events: none;
      z-index: 1;
    }

    .brand-glow-1 {
      position: absolute;
      top: -120px;
      left: -80px;
      width: 440px;
      height: 440px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(168, 210, 125, 0.22) 0%, transparent 68%);
      filter: blur(40px);
      pointer-events: none;
      z-index: 1;
    }

    .brand-glow-2 {
      position: absolute;
      bottom: -100px;
      right: -80px;
      width: 480px;
      height: 480px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(217, 144, 50, 0.18) 0%, transparent 70%);
      filter: blur(50px);
      pointer-events: none;
      z-index: 1;
    }

    .brand-glow-3 {
      position: absolute;
      top: 45%;
      left: 60%;
      width: 320px;
      height: 320px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(86, 130, 61, 0.25) 0%, transparent 65%);
      filter: blur(60px);
      pointer-events: none;
      z-index: 1;
    }

    /* TOP BAR */
    .brand-top-bar {
      position: relative;
      z-index: 2;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
    }

    .brand-logo-link {
      display: inline-flex;
      align-items: center;
      text-decoration: none;
      transition: transform 0.25s ease, opacity 0.25s ease;
    }
    .brand-logo-link:hover {
      transform: translateY(-2px);
      opacity: 0.95;
    }

    .brand-logo-img {
      height: clamp(44px, 5.2vh, 56px);
      width: auto;
      object-fit: contain;
      filter: drop-shadow(0 4px 14px rgba(0, 0, 0, 0.35));
    }

    .brand-status-pill {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      padding: 6px 14px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.16);
      backdrop-filter: blur(10px);
      border-radius: 50px;
      font-size: 11.5px;
      font-weight: 600;
      color: rgba(255, 255, 255, 0.9);
      letter-spacing: 0.3px;
    }
    .brand-status-pill .status-dot {
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #4ade80;
      box-shadow: 0 0 10px #4ade80;
      animation: pulse-dot 2s infinite;
    }
    @keyframes pulse-dot {
      0%, 100% { transform: scale(1); opacity: 1; }
      50% { transform: scale(1.3); opacity: 0.7; }
    }

    /* MIDDLE CONTENT */
    .brand-body {
      position: relative;
      z-index: 2;
      width: 100%;
      max-width: 660px;
      margin: auto 0;
      padding: clamp(8px, 1.8vh, 20px) 0;
    }

    .brand-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(217, 144, 50, 0.15);
      border: 1px solid rgba(217, 144, 50, 0.35);
      backdrop-filter: blur(8px);
      border-radius: 50px;
      padding: 4px 13px;
      margin-bottom: 14px;
    }
    .brand-eyebrow i {
      color: var(--pld-gold-brand);
      font-size: 13px;
    }
    .brand-eyebrow span {
      font-size: 11px;
      font-weight: 800;
      letter-spacing: 0.8px;
      text-transform: uppercase;
      color: #ffd699;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .brand-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(26px, 3.2vh, 34px);
      font-weight: 800;
      line-height: 1.22;
      letter-spacing: -0.6px;
      color: var(--white);
      margin-bottom: 12px;
      text-shadow: 0 4px 16px rgba(0, 0, 0, 0.35);
    }
    .brand-title span.highlight {
      display: inline;
      background: linear-gradient(135deg, #fcd38a 0%, #D99032 60%, #ffc067 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .brand-desc {
      font-size: clamp(12.5px, 1.45vh, 14px);
      color: rgba(255, 255, 255, 0.84);
      line-height: 1.6;
      margin-bottom: clamp(16px, 2.2vh, 24px);
      max-width: 610px;
    }

    /* 4-Pillar Grid */
    .pillar-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: clamp(8px, 1.3vh, 12px);
      margin-bottom: clamp(16px, 2.2vh, 22px);
    }

    .pillar-card {
      background: rgba(255, 255, 255, 0.055);
      border: 1px solid rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(12px);
      border-radius: 14px;
      padding: clamp(10px, 1.3vh, 14px) 14px;
      display: flex;
      align-items: flex-start;
      gap: 12px;
      transition: all 0.25s ease;
    }
    .pillar-card:hover {
      background: rgba(255, 255, 255, 0.095);
      border-color: rgba(217, 144, 50, 0.45);
      transform: translateY(-2px);
    }

    .pillar-icon-box {
      width: clamp(34px, 4.2vh, 40px);
      height: clamp(34px, 4.2vh, 40px);
      border-radius: 10px;
      background: linear-gradient(135deg, rgba(86, 130, 61, 0.4) 0%, rgba(217, 144, 50, 0.25) 100%);
      border: 1px solid rgba(255, 255, 255, 0.15);
      color: #f7ce86;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: clamp(16px, 1.9vh, 18px);
      flex-shrink: 0;
    }

    .pillar-info {
      flex: 1;
      min-width: 0;
    }
    .pillar-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 700;
      font-size: clamp(12px, 1.4vh, 13px);
      color: #ffffff;
      margin-bottom: 2px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .pillar-text {
      font-size: clamp(10.5px, 1.25vh, 11.5px);
      color: rgba(255, 255, 255, 0.68);
      line-height: 1.35;
    }

    /* KPI / STAT METRICS ROW */
    .brand-stats-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      background: rgba(0, 0, 0, 0.22);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 12px;
      padding: clamp(8px, 1.2vh, 12px) 16px;
    }

    .stat-box {
      display: flex;
      flex-direction: column;
      gap: 2px;
    }
    .stat-number {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(14px, 1.7vh, 17px);
      font-weight: 800;
      color: #A8D27D;
      display: flex;
      align-items: center;
      gap: 5px;
      line-height: 1.1;
    }
    .stat-number i {
      color: var(--pld-gold-brand);
      font-size: 13px;
    }
    .stat-label {
      font-size: clamp(10px, 1.15vh, 11px);
      color: rgba(255, 255, 255, 0.65);
      font-weight: 500;
    }

    .stat-divider {
      width: 1px;
      height: 26px;
      background: rgba(255, 255, 255, 0.12);
    }

    /* BOTTOM BAR */
    .brand-bottom-bar {
      position: relative;
      z-index: 2;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      padding-top: clamp(8px, 1.4vh, 14px);
      border-top: 1px solid rgba(255, 255, 255, 0.12);
      font-size: clamp(10.5px, 1.2vh, 11.5px);
      color: rgba(255, 255, 255, 0.6);
    }

    .brand-ssl-note {
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .brand-ssl-note i {
      color: #4ade80;
      font-size: 12px;
    }

    .brand-help-link {
      color: rgba(255, 255, 255, 0.85);
      text-decoration: none;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 4px;
      transition: color 0.2s ease;
    }
    .brand-help-link:hover {
      color: var(--pld-green-light);
    }

    /* ══════════════════════════════════════════════════
       RIGHT FORM PANEL
    ══════════════════════════════════════════════════ */
    .panel-form {
      flex: 1;
      position: relative;
      height: 100vh;
      max-height: 100vh;
      background: linear-gradient(145deg, #FAF8EE 0%, #F5F1DF 100%);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: center;
      padding: clamp(20px, 3vh, 36px) clamp(20px, 3.5vw, 48px);
      overflow: hidden !important;
    }

    .panel-form-ambient {
      position: absolute;
      top: -100px;
      right: -80px;
      width: 320px;
      height: 320px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(86, 130, 61, 0.08) 0%, transparent 70%);
      pointer-events: none;
    }

    .form-top-aux {
      width: 100%;
      max-width: 440px;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      z-index: 2;
    }
    .btn-aux-back {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 12px;
      font-weight: 600;
      color: var(--text-muted);
      text-decoration: none;
      padding: 6px 14px;
      border-radius: 50px;
      background: rgba(86, 130, 61, 0.07);
      border: 1px solid rgba(86, 130, 61, 0.15);
      transition: all 0.2s ease;
    }
    .btn-aux-back:hover {
      background: rgba(86, 130, 61, 0.14);
      color: var(--pld-green-brand);
      transform: translateX(-2px);
    }

    .form-card-wrapper {
      width: 100%;
      max-width: 440px;
      z-index: 2;
      margin: auto 0;
    }

    .auth-card {
      background: var(--white);
      border-radius: 20px;
      padding: clamp(22px, 3vh, 32px) clamp(24px, 2.5vw, 32px);
      border: 1px solid var(--border-cream);
      box-shadow: 0 16px 40px -10px rgba(31, 41, 55, 0.1), 0 0 0 1px rgba(86, 130, 61, 0.06);
    }

    /* Card Header */
    .card-header-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: clamp(14px, 1.8vh, 18px);
      padding-bottom: clamp(10px, 1.4vh, 14px);
      border-bottom: 1px solid #f0ecdb;
    }
    .card-brand-badge {
      display: inline-flex;
      align-items: center;
      gap: 10px;
    }
    .card-logo-img {
      height: 38px;
      width: auto;
      object-fit: contain;
    }
    .card-brand-text .title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 13.5px;
      font-weight: 800;
      color: var(--pld-green-brand);
      line-height: 1.15;
    }
    .card-brand-text .sub {
      font-size: 10.5px;
      font-weight: 600;
      color: var(--text-light);
      letter-spacing: 0.2px;
    }
    .portal-tag {
      background: var(--pld-green-subtle);
      color: var(--pld-green-brand);
      font-size: 10px;
      font-weight: 800;
      padding: 3px 9px;
      border-radius: 20px;
      border: 1px solid rgba(86, 130, 61, 0.2);
      letter-spacing: 0.6px;
      text-transform: uppercase;
    }

    .auth-card-title {
      margin-bottom: clamp(12px, 1.8vh, 16px);
    }
    .auth-card-title h2 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(19px, 2.4vh, 22px);
      font-weight: 800;
      color: var(--text-dark);
      letter-spacing: -0.3px;
      margin-bottom: 4px;
    }
    .auth-card-title p {
      font-size: 12.5px;
      color: var(--text-muted);
      line-height: 1.4;
    }

    /* Alerts */
    .alert-box {
      border-radius: 10px;
      padding: 10px 13px;
      font-size: 12.5px;
      font-weight: 500;
      display: flex;
      align-items: flex-start;
      gap: 9px;
      margin-bottom: 14px;
    }
    .alert-err {
      background: #fef2f2;
      border: 1px solid #fecaca;
      color: #991b1b;
    }
    .alert-ok {
      background: #f0fdf4;
      border: 1px solid #bbf7d0;
      color: #166534;
    }

    /* Form Fields */
    .form-field {
      margin-bottom: clamp(10px, 1.4vh, 14px);
    }
    .field-label {
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 12.5px;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 5px;
    }

    .input-wrapper {
      position: relative;
    }
    .input-icon-left {
      position: absolute;
      left: 13px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-light);
      font-size: 15px;
      pointer-events: none;
    }
    .input-control {
      width: 100%;
      background: #faf9f4;
      border: 1.5px solid var(--border-cream);
      border-radius: 10px;
      padding: clamp(9px, 1.2vh, 11px) 40px;
      font-size: 13px;
      color: var(--text-dark);
      font-family: 'Inter', sans-serif;
      outline: none;
      transition: all 0.2s ease;
    }
    .input-control:focus {
      border-color: var(--pld-green-brand);
      background: var(--white);
      box-shadow: 0 0 0 3px rgba(86, 130, 61, 0.16);
    }

    .btn-toggle-eye {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      color: var(--text-light);
      font-size: 15px;
      padding: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: color 0.2s ease;
    }
    .btn-toggle-eye:hover {
      color: var(--text-dark);
    }

    .field-error-text {
      font-size: 11px;
      color: #dc2626;
      margin-top: 4px;
      display: flex;
      align-items: center;
      gap: 4px;
    }

    /* Submit Button */
    .btn-submit-login {
      width: 100%;
      padding: clamp(10px, 1.35vh, 12px);
      background: linear-gradient(135deg, #e59d3b 0%, #D99032 100%);
      border: none;
      border-radius: 10px;
      color: var(--white);
      font-size: 13.5px;
      font-weight: 700;
      font-family: 'Plus Jakarta Sans', sans-serif;
      cursor: pointer;
      transition: all 0.25s ease;
      box-shadow: 0 4px 14px rgba(217, 144, 50, 0.35);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      margin-top: 4px;
    }
    .btn-submit-login:hover {
      background: linear-gradient(135deg, #d38c2b 0%, #c47e26 100%);
      box-shadow: 0 6px 18px rgba(217, 144, 50, 0.45);
      transform: translateY(-1px);
    }

    /* Alumni & Testimonial Box */
    .alumni-card-prompt {
      margin-top: clamp(12px, 1.6vh, 16px);
      padding: 9px 12px;
      background: rgba(86, 130, 61, 0.04);
      border: 1px dashed rgba(86, 130, 61, 0.28);
      border-radius: 12px;
      text-align: center;
    }
    .alumni-card-prompt p {
      font-size: 11px;
      color: var(--text-muted);
      margin-bottom: 5px;
    }
    .alumni-card-link {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      font-size: 11.5px;
      font-weight: 700;
      color: var(--pld-green-brand);
      text-decoration: none;
      padding: 4px 10px;
      border-radius: 6px;
      background: rgba(86, 130, 61, 0.1);
      transition: all 0.2s ease;
    }
    .alumni-card-link:hover {
      background: var(--pld-green-brand);
      color: var(--white);
    }

    /* Form Footer Copyright */
    .form-panel-copyright {
      z-index: 2;
      text-align: center;
      font-size: 11px;
      color: var(--text-light);
    }

    /* ══════════════════════════════════════════════════
       RESPONSIVE ADAPTATIONS
    ══════════════════════════════════════════════════ */
    @media (max-width: 992px) {
      .login-container {
        flex-direction: column;
      }
      .panel-brand {
        display: none;
      }
      .panel-form {
        flex: 1;
        width: 100%;
        padding: 24px 20px;
      }
    }
  </style>
</head>

<body>

<div class="login-container">

  <!-- ══════════════════════════════════════════════════════════
       LEFT PANEL: BRAND STORY, FEATURES MATRIX & METRICS
  ══════════════════════════════════════════════════════════ -->
  <div class="panel-brand">
    <div class="brand-grid-pattern"></div>
    <div class="brand-glow-1"></div>
    <div class="brand-glow-2"></div>
    <div class="brand-glow-3"></div>

    <!-- TOP HEADER -->
    <div class="brand-top-bar">
      <a href="{{ route('homepage') }}" class="brand-logo-link" title="Kembali ke Beranda PLD UIS">
        <img src="{{ asset('frontend/img/logopld.png') }}?v={{ filemtime(public_path('frontend/img/logopld.png')) }}" alt="Logo PLD Universitas Ibnu Sina" class="brand-logo-img">
      </a>
      <div class="brand-status-pill">
        <span class="status-dot"></span>
        <span>Portal Resmi PLD UIS</span>
      </div>
    </div>

    <!-- MIDDLE HERO & FEATURES -->
    <div class="brand-body">
      <div class="brand-eyebrow">
        <i class="bi bi-shield-check"></i>
        <span>Pusat Layanan Disabilitas UIS</span>
      </div>

      <h1 class="brand-title">
        Wujudkan Kampus Ramah<br>
        <span class="highlight">Inklusif &amp; Berkeadilan</span>
      </h1>

      <p class="brand-desc">
        Sistem informasi terpadu pengelolaan layanan disabilitas, pendampingan akademik, akomodasi perkuliahan, konseling, dan advokasi sivitas akademika Universitas Ibnu Sina.
      </p>

      <!-- 4 Pillars Interactive Matrix -->
      <div class="pillar-grid">
        <div class="pillar-card">
          <div class="pillar-icon-box">
            <i class="bi bi-person-wheelchair"></i>
          </div>
          <div class="pillar-info">
            <div class="pillar-title">Aksesibilitas &amp; Fasilitas</div>
            <div class="pillar-text">Sarana ramah disabilitas & teknologi asistif modern</div>
          </div>
        </div>

        <div class="pillar-card">
          <div class="pillar-icon-box">
            <i class="bi bi-translate"></i>
          </div>
          <div class="pillar-info">
            <div class="pillar-title">Pendampingan JBI &amp; Relawan</div>
            <div class="pillar-text">Notetaker, Reader, dan JBI BISINDO terakreditasi</div>
          </div>
        </div>

        <div class="pillar-card">
          <div class="pillar-icon-box">
            <i class="bi bi-heart-pulse-fill"></i>
          </div>
          <div class="pillar-info">
            <div class="pillar-title">Konseling &amp; Advokasi</div>
            <div class="pillar-text">Bimbingan psikologis, adaptasi, dan perlindungan hak</div>
          </div>
        </div>

        <div class="pillar-card">
          <div class="pillar-icon-box">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
          <div class="pillar-info">
            <div class="pillar-title">Akomodasi Perkuliahan</div>
            <div class="pillar-text">Penyesuaian kurikulum dan evaluasi ujian yang adil</div>
          </div>
        </div>
      </div>

      <!-- KPI Metrics Strip -->
      <div class="brand-stats-row">
        <div class="stat-box">
          <div class="stat-number"><i class="bi bi-check2-circle"></i> 100%</div>
          <div class="stat-label">Hak Kesetaraan Akses</div>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-box">
          <div class="stat-number"><i class="bi bi-buildings"></i> 3 Fakultas</div>
          <div class="stat-label">Terintegrasi di UIS</div>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-box">
          <div class="stat-number"><i class="bi bi-shield-lock"></i> SSL 256-Bit</div>
          <div class="stat-label">Enkripsi Data Kredensial</div>
        </div>
      </div>
    </div>

    <!-- BOTTOM FOOTER -->
    <div class="brand-bottom-bar">
      <div class="brand-ssl-note">
        <i class="bi bi-lock-fill"></i>
        <span>Sistem Terverifikasi &bull; Universitas Ibnu Sina &copy; {{ date('Y') }}</span>
      </div>
      <a href="{{ route('homepage') }}" class="brand-help-link">
        <span>Kunjungi Beranda</span>
        <i class="bi bi-arrow-up-right"></i>
      </a>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       RIGHT PANEL: AUTH FORM & CARD
  ══════════════════════════════════════════════════════════ -->
  <div class="panel-form">
    <div class="panel-form-ambient"></div>

    <!-- AUXILIARY TOP BAR -->
    <div class="form-top-aux">
      <a href="{{ route('homepage') }}" class="btn-aux-back">
        <i class="bi bi-arrow-left"></i>
        <span>Kembali ke Beranda</span>
      </a>
    </div>

    <!-- AUTH CARD -->
    <div class="form-card-wrapper">
      <div class="auth-card">
        <!-- Card Brand Header -->
        <div class="card-header-bar">
          <div class="card-brand-badge">
            <img src="{{ asset('assets/img/logouis.png') }}" alt="Logo UIS" class="card-logo-img">
            <div class="card-brand-text">
              <div class="title">Pusat Layanan Disabilitas</div>
              <div class="sub">Universitas Ibnu Sina</div>
            </div>
          </div>
          <span class="portal-tag">PORTAL</span>
        </div>

        <div class="auth-card-title">
          <h2>Masuk ke Akun Anda</h2>
          <p>Silakan masukkan kredensial untuk mengakses dashboard</p>
        </div>

        @if (session('success'))
          <div class="alert-box alert-ok">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
          </div>
        @endif

        @if ($errors->has('email') && str_contains($errors->first('email'), 'salah'))
          <div class="alert-box alert-err">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <span>{{ $errors->first('email') }}</span>
          </div>
        @endif

        <form id="formLogin" action="{{ route('loginproses') }}" method="POST" novalidate>
          @csrf

          <div class="form-field">
            <label class="field-label" for="email">
              <span>Email Resmi</span>
            </label>
            <div class="input-wrapper">
              <input type="email" id="email" name="email" class="input-control" placeholder="admin@pld.ac.id" value="{{ old('email') }}" required autocomplete="email">
              <i class="bi bi-envelope input-icon-left"></i>
            </div>
            @error('email')
              @if (!str_contains($message, 'salah'))
                <div class="field-error-text"><i class="bi bi-x-circle-fill"></i> {{ $message }}</div>
              @endif
            @enderror
          </div>

          <div class="form-field">
            <label class="field-label" for="password">
              <span>Password</span>
            </label>
            <div class="input-wrapper">
              <input type="password" id="password" name="password" class="input-control" placeholder="Masukkan password Anda" required autocomplete="current-password">
              <i class="bi bi-lock input-icon-left"></i>
              <button type="button" id="togglePw" class="btn-toggle-eye" aria-label="Lihat password">
                <i class="bi bi-eye" id="eyeIcon"></i>
              </button>
            </div>
            @error('password')
              <div class="field-error-text"><i class="bi bi-x-circle-fill"></i> {{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn-submit-login" id="btnMasuk">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Masuk Portal</span>
          </button>
        </form>

        <!-- Testimonial / Feedback Section for Alumni -->
        <div class="alumni-card-prompt">
          <p>🎓 <strong>Alumni atau Mitra PLD UIS?</strong></p>
          <a href="{{ route('homepage.alumni.create') }}" class="alumni-card-link">
            <i class="bi bi-chat-quote-fill"></i>
            <span>Isi Ulasan &amp; Testimoni Alumni</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- FOOTER COPYRIGHT -->
    <div class="form-panel-copyright">
      &copy; {{ date('Y') }} PLD — Pelayanan Disabilitas Universitas Ibnu Sina. All rights reserved.
    </div>
  </div>

</div>

<script>
  document.getElementById('togglePw').addEventListener('click', function () {
    const inp  = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');
    const show = inp.type === 'password';
    inp.type = show ? 'text' : 'password';
    icon.className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
  });
</script>

</body>
</html>
