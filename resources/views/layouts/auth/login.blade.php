<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — FIKES (Fakultas Ilmu Kesehatan)</title>
  <meta name="description" content="Portal Login Resmi FIKES - Fakultas Ilmu Kesehatan">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      /* FIKES Official Primary Solid Palette */
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
      --text-main:          #190a24;
      --text-muted:         #655672;
      --text-light:         #9586a2;
      --border-light:       #ebdff2;
      
      --shadow-sm:          0 4px 12px rgba(130, 60, 162, 0.08);
      --shadow-md:          0 8px 24px rgba(130, 60, 162, 0.12);
      --shadow-lg:          0 16px 36px rgba(130, 60, 162, 0.15);
      --shadow-purple:      0 8px 24px rgba(130, 60, 162, 0.28);
    }

    html, body { height: 100%; }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: var(--surface-light);
      color: var(--text-main);
      overflow: hidden;
    }

    /* ═══════════════════════════════════════════════
       LAYOUT — Full Split Screen
    ═══════════════════════════════════════════════ */
    .login-wrapper {
      display: flex;
      height: 100vh;
      width: 100vw;
    }

    /* ── LEFT PANEL — Branding & Visuals ──────── */
    .panel-left {
      flex: 1.15;
      position: relative;
      background: var(--obsidian-dark);
      overflow: hidden;
    }

    .panel-left .bg-photo {
      position: absolute;
      inset: 0;
      background: url('{{ asset("assets/img/login-bg.png") }}') center/cover no-repeat;
      z-index: 0;
      opacity: 0.2;
    }

    .panel-left .overlay {
      position: absolute;
      inset: 0;
      background: rgba(25, 10, 36, 0.9);
      z-index: 1;
    }

    .panel-left .pattern-overlay {
      position: absolute;
      inset: 0;
      z-index: 2;
      opacity: 0.05;
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff'%3E%3Crect x='5' y='5' width='22' height='22' rx='3'/%3E%3Crect x='33' y='5' width='22' height='22' rx='3'/%3E%3Crect x='5' y='33' width='22' height='22' rx='3'/%3E%3Crect x='33' y='33' width='22' height='22' rx='3'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .panel-left-content {
      position: relative;
      z-index: 3;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 52px 56px;
    }

    .brand-top {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .brand-title .name {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 22px;
      font-weight: 800;
      color: var(--white);
      letter-spacing: -0.5px;
      line-height: 1.1;
    }
    .brand-title .sub {
      font-size: 11.5px;
      color: rgba(255, 255, 255, 0.65);
      letter-spacing: 0.4px;
      margin-top: 2px;
    }

    /* Konten tengah */
    .brand-middle { max-width: 480px; }

    .badge-kategori {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(130, 60, 162, 0.3);
      border: 1px solid rgba(255, 156, 0, 0.4);
      border-radius: 50px;
      padding: 6px 16px;
      margin-bottom: 24px;
      backdrop-filter: blur(8px);
    }
    .badge-kategori span {
      font-size: 11.5px;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: var(--fikes-orange);
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .badge-dot {
      width: 7px; height: 7px;
      background: var(--fikes-orange);
      border-radius: 50%;
      animation: blink 2s infinite;
    }
    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.3; }
    }

    .brand-middle h1 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 42px;
      font-weight: 800;
      color: var(--white);
      line-height: 1.15;
      letter-spacing: -1.2px;
      margin-bottom: 18px;
    }
    .brand-middle h1 em {
      font-style: normal;
      color: var(--fikes-orange);
    }

    .brand-middle p {
      font-size: 15px;
      color: rgba(255, 255, 255, 0.7);
      line-height: 1.75;
      margin-bottom: 32px;
    }

    /* Chips */
    .product-chips {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 36px;
    }
    .chip {
      display: flex;
      align-items: center;
      gap: 7px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 50px;
      padding: 7px 16px;
      backdrop-filter: blur(8px);
      transition: all 0.2s ease;
    }
    .chip:hover {
      background: var(--fikes-purple);
      border-color: var(--fikes-purple);
    }
    .chip i { font-size: 14px; color: var(--fikes-orange); }
    .chip span { font-size: 12.5px; color: rgba(255, 255, 255, 0.9); font-weight: 500; }

    /* Stats baris bawah */
    .stats-row {
      display: flex;
      align-items: center;
      gap: 32px;
    }
    .stat { text-align: left; }
    .stat-num {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 26px;
      font-weight: 800;
      color: var(--white);
      line-height: 1;
    }
    .stat-num sup { font-size: 14px; color: var(--fikes-orange); vertical-align: super; }
    .stat-txt {
      font-size: 11.5px;
      color: rgba(255, 255, 255, 0.5);
      margin-top: 4px;
    }
    .stat-sep {
      width: 1px;
      height: 36px;
      background: rgba(255, 255, 255, 0.15);
    }

    .panel-divider {
      position: absolute;
      right: 0; top: 0; bottom: 0;
      width: 1px;
      background: rgba(255, 255, 255, 0.1);
      z-index: 4;
    }

    /* ── RIGHT PANEL — Form Login ──────────────── */
    .panel-right {
      flex: 0.85;
      background: var(--page-bg);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 48px 44px;
      overflow-y: auto;
      position: relative;
    }

    .form-container {
      width: 100%;
      max-width: 420px;
      position: relative;
      z-index: 1;
      animation: slideIn 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes slideIn {
      from { opacity: 0; transform: translateY(15px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .form-card {
      background: var(--white);
      border-radius: 24px;
      padding: 42px 38px;
      border: 1px solid var(--border-light);
      box-shadow: var(--shadow-lg);
    }

    .form-logo-sm {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 26px;
    }
    .form-logo-sm .txt {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 17px;
      font-weight: 800;
      color: var(--fikes-purple);
    }

    .form-heading { margin-bottom: 28px; }
    .form-heading h2 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 24px;
      font-weight: 800;
      color: var(--text-main);
      letter-spacing: -0.5px;
      margin-bottom: 6px;
    }
    .form-heading p {
      font-size: 13.5px;
      color: var(--text-muted);
      line-height: 1.5;
    }

    /* Alert */
    .alert-box {
      border-radius: 12px;
      padding: 12px 15px;
      font-size: 13px;
      font-weight: 500;
      display: flex;
      align-items: flex-start;
      gap: 10px;
      margin-bottom: 20px;
    }
    .alert-box i { margin-top: 1px; flex-shrink: 0; }
    .alert-err {
      background: #fff5f5;
      border: 1px solid #fed7d7;
      color: #c53030;
    }
    .alert-ok {
      background: #f0fff4;
      border: 1px solid #c6f6d5;
      color: #276749;
    }

    /* Input fields */
    .field { margin-bottom: 18px; }
    .field-label {
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 13.5px;
      font-weight: 600;
      color: var(--text-main);
      margin-bottom: 8px;
    }

    .input-wrap { position: relative; }

    .input-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-light);
      font-size: 16px;
      pointer-events: none;
      transition: color 0.2s;
    }

    .form-input {
      width: 100%;
      background: var(--surface-light);
      border: 1.5px solid var(--border-light);
      border-radius: 12px;
      padding: 13px 44px 13px 44px;
      font-size: 14px;
      color: var(--text-main);
      font-family: 'Inter', sans-serif;
      outline: none;
      transition: all 0.25s ease;
      -webkit-appearance: none;
    }
    .form-input::placeholder { color: var(--text-light); }

    .form-input:focus {
      border-color: var(--fikes-purple);
      background: var(--white);
      box-shadow: 0 0 0 3px rgba(130, 60, 162, 0.12);
    }
    .form-input:focus ~ .input-icon { color: var(--fikes-purple); }
    .form-input.err {
      border-color: #e53e3e;
      background: #fff5f5;
    }

    .field-err-msg {
      font-size: 12px;
      color: #c53030;
      margin-top: 6px;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .btn-show-pw {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      color: var(--text-light);
      font-size: 16px;
      padding: 4px 6px;
      border-radius: 6px;
      transition: all 0.2s;
    }
    .btn-show-pw:hover {
      color: var(--fikes-purple);
      background: var(--fikes-purple-light);
    }

    /* Remember row */
    .remember-row {
      display: flex;
      align-items: center;
      gap: 9px;
      margin-bottom: 24px;
    }
    .remember-row input[type=checkbox] {
      width: 16px;
      height: 16px;
      accent-color: var(--fikes-purple);
      cursor: pointer;
    }
    .remember-row label {
      font-size: 13px;
      color: var(--text-muted);
      cursor: pointer;
    }

    /* Tombol login (Solid Purple + Hover Deep) */
    .btn-masuk {
      width: 100%;
      padding: 14px;
      background: var(--fikes-purple);
      border: none;
      border-radius: 12px;
      color: var(--white);
      font-size: 15px;
      font-weight: 700;
      font-family: 'Plus Jakarta Sans', sans-serif;
      cursor: pointer;
      transition: all 0.25s ease;
      box-shadow: var(--shadow-purple);
      position: relative;
      overflow: hidden;
      letter-spacing: 0.2px;
    }
    .btn-masuk:hover {
      background: var(--fikes-purple-dark);
      transform: translateY(-2px);
      box-shadow: 0 10px 28px rgba(130, 60, 162, 0.4);
    }
    .btn-masuk:active { transform: translateY(0); }
    .btn-masuk:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }

    .btn-inner-flex {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      position: relative;
      z-index: 1;
    }
    .spinner-ring {
      display: none;
      width: 18px; height: 18px;
      border: 2px solid rgba(255,255,255,0.3);
      border-top-color: white;
      border-radius: 50%;
      animation: spin 0.7s linear infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    /* Divider */
    .divider {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 22px 0;
    }
    .divider::before, .divider::after {
      content: ''; flex: 1;
      height: 1px;
      background: var(--border-light);
    }
    .divider span {
      font-size: 11.5px;
      color: var(--text-light);
      white-space: nowrap;
      letter-spacing: 0.5px;
    }

    /* Footer info */
    .form-footer {
      text-align: center;
      padding-top: 14px;
    }
    .form-footer p {
      font-size: 13px;
      color: var(--text-muted);
    }
    .form-footer a {
      color: var(--fikes-purple);
      font-weight: 600;
      text-decoration: none;
    }
    .form-footer a:hover { text-decoration: underline; }
    .back-to-home-link {
      color: var(--text-muted) !important;
      font-weight: 500 !important;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-top: 8px;
      transition: color 0.2s;
    }
    .back-to-home-link:hover {
      color: var(--fikes-purple) !important;
      text-decoration: none !important;
    }

    .copyright {
      text-align: center;
      margin-top: 22px;
      font-size: 11.5px;
      color: var(--text-light);
    }

    /* ── Responsive ───────────────────────── */
    @media (max-width: 900px) {
      .panel-left { display: none; }
      .panel-right { flex: 1; }
    }
    @media (max-width: 480px) {
      .panel-right { padding: 24px 16px; }
      .form-card { padding: 28px 22px; }
    }
  </style>
</head>

<body>

<div class="login-wrapper">

  {{-- ══════════════════════════════════════════
       LEFT — Branding & Visuals (FIKES)
  ══════════════════════════════════════════ --}}
  <div class="panel-left">
    <div class="bg-photo"></div>
    <div class="overlay"></div>
    <div class="pattern-overlay"></div>
    <div class="panel-divider"></div>

    <div class="panel-left-content">

      {{-- Logo Atas --}}
      <div class="brand-top">
        <img src="{{ asset('frontend/img/logofikes.png') }}" alt="Logo Fikes" style="height: 50px; width: auto; object-fit: contain;">
        <div class="brand-title">
          <div class="name">FIKES</div>
          <div class="sub">Fakultas Ilmu Kesehatan</div>
        </div>
      </div>

      {{-- Konten Tengah --}}
      <div class="brand-middle">
        <div class="badge-kategori">
          <div class="badge-dot"></div>
          <span>Portal Resmi Akademik & Fasilitas</span>
        </div>

        <h1>Fakultas Ilmu Kesehatan<br><em>Unggul & Berintegritas</em></h1>

        <p>
          Sistem informasi terpadu pengelolaan katalog fasilitas, produk roster ventilasi, dan administrasi akademik FIKES.
        </p>

        {{-- Chips kategori produk --}}
        <div class="product-chips">
          <div class="chip">
            <i class="bi bi-grid-3x3-gap"></i>
            <span>Roster Beton</span>
          </div>
          <div class="chip">
            <i class="bi bi-square-half"></i>
            <span>Roster Tanah Liat</span>
          </div>
          <div class="chip">
            <i class="bi bi-diamond"></i>
            <span>Roster Minimalis</span>
          </div>
          <div class="chip">
            <i class="bi bi-shield-check"></i>
            <span>Standar Mutu SNI</span>
          </div>
        </div>
      </div>

      {{-- Statistik Bawah --}}
      <div class="stats-row">
        <div class="stat">
          <div class="stat-num">50<sup>+</sup></div>
          <div class="stat-txt">Motif Tersedia</div>
        </div>
        <div class="stat-sep"></div>
        <div class="stat">
          <div class="stat-num">10<sup>rb+</sup></div>
          <div class="stat-txt">Produk Terdistribusi</div>
        </div>
        <div class="stat-sep"></div>
        <div class="stat">
          <div class="stat-num">100<sup>%</sup></div>
          <div class="stat-txt">Kualitas Terjamin</div>
        </div>
      </div>

    </div>
  </div>

  {{-- ══════════════════════════════════════════
       RIGHT — Form Login
  ══════════════════════════════════════════ --}}
  <div class="panel-right">
    <div class="form-container">

      <div class="form-card">

        {{-- Logo kecil di dalam card --}}
        <div class="form-logo-sm">
          <img src="{{ asset('frontend/img/logofikes.png') }}" alt="Logo Fikes" style="height: 38px; width: auto; object-fit: contain;">
          <div class="txt">Portal FIKES</div>
        </div>

        <div class="form-heading">
          <h2>Masuk ke Akun Anda</h2>
          <p>Silakan masukkan kredensial untuk mengakses dashboard</p>
        </div>

        {{-- Alert sukses --}}
        @if (session('success'))
          <div class="alert-box alert-ok">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
          </div>
        @endif

        {{-- Alert error login --}}
        @if ($errors->has('email') && str_contains($errors->first('email'), 'salah'))
          <div class="alert-box alert-err">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <span>{{ $errors->first('email') }}</span>
          </div>
        @endif

        <form id="formLogin"
              action="{{ route('loginproses') }}"
              method="POST"
              novalidate>
          @csrf

          {{-- Email --}}
          <div class="field">
            <label class="field-label" for="email">
              <span>Email</span>
            </label>
            <div class="input-wrap">
              <input type="email"
                     id="email"
                     name="email"
                     class="form-input {{ $errors->has('email') && !str_contains($errors->first('email'), 'salah') ? 'err' : '' }}"
                     placeholder="admin@fikes.ac.id"
                     value="{{ old('email') }}"
                     autocomplete="email"
                     required>
              <i class="bi bi-envelope input-icon"></i>
            </div>
            @error('email')
              @if (!str_contains($message, 'salah'))
                <div class="field-err-msg">
                  <i class="bi bi-x-circle-fill" style="font-size:11px"></i>
                  {{ $message }}
                </div>
              @endif
            @enderror
          </div>

          {{-- Password --}}
          <div class="field">
            <label class="field-label" for="password">
              <span>Password</span>
            </label>
            <div class="input-wrap">
              <input type="password"
                     id="password"
                     name="password"
                     class="form-input {{ $errors->has('password') ? 'err' : '' }}"
                     placeholder="Masukkan password Anda"
                     autocomplete="current-password"
                     required>
              <i class="bi bi-lock input-icon"></i>
              <button type="button" id="togglePw" class="btn-show-pw" title="Tampilkan password">
                <i class="bi bi-eye" id="eyeIcon"></i>
              </button>
            </div>
            @error('password')
              <div class="field-err-msg">
                <i class="bi bi-x-circle-fill" style="font-size:11px"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          {{-- Remember Me --}}
          <div class="remember-row">
            <input type="checkbox"
                   id="rememberMe"
                   name="remember"
                   value="1"
                   {{ old('remember') ? 'checked' : '' }}>
            <label for="rememberMe">Ingat saya di perangkat ini</label>
          </div>

          {{-- Tombol Masuk --}}
          <button type="submit" class="btn-masuk" id="btnMasuk">
            <div class="btn-inner-flex" id="btnText">
              <i class="bi bi-box-arrow-in-right"></i>
              Masuk Portal
            </div>
            <div class="btn-inner-flex" id="btnLoading" style="display:none">
              <div class="spinner-ring" style="display:block"></div>
              Memverifikasi...
            </div>
          </button>

        </form>

        {{-- Divider --}}
        <div class="divider">
          <span>atau</span>
        </div>

        {{-- Footer --}}
        <div class="form-footer">
          <p style="margin-bottom: 10px;">Butuh bantuan akses? <a href="https://wa.me/6281234567890" target="_blank">Hubungi Administrator</a></p>
          <p><a href="{{ route('homepage') }}" class="back-to-home-link"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a></p>
        </div>

      </div>{{-- .form-card --}}

      <div class="copyright">
        <i class="bi bi-shield-check me-1"></i>
        &copy; {{ date('Y') }} FIKES — Fakultas Ilmu Kesehatan. Hak Cipta Dilindungi.
      </div>

    </div>
  </div>

</div>

<script>
  // Toggle show/hide password
  document.getElementById('togglePw').addEventListener('click', function () {
    const inp  = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');
    const show = inp.type === 'password';
    inp.type       = show ? 'text' : 'password';
    icon.className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
  });

  // Focus style on icon
  document.querySelectorAll('.form-input').forEach(function (inp) {
    const wrap = inp.closest('.input-wrap');
    inp.addEventListener('focus', function () {
      if (wrap) wrap.querySelector('.input-icon').style.color = '#823ca2';
    });
    inp.addEventListener('blur', function () {
      if (wrap) wrap.querySelector('.input-icon').style.color = '#9586a2';
    });
  });

  // Loading state
  document.getElementById('formLogin').addEventListener('submit', function () {
    const email = document.getElementById('email').value.trim();
    const pw    = document.getElementById('password').value;
    if (!email || !pw) return;
    document.getElementById('btnText').style.display    = 'none';
    document.getElementById('btnLoading').style.display = 'flex';
    document.getElementById('btnMasuk').disabled        = true;
  });
</script>

</body>
</html>
