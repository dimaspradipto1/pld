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
  <title>@yield('title', 'PLD — Pusat Layanan Disabilitas UIS | Unggul & Inklusif')</title>
  <meta name="description" content="@yield('meta_description', 'Portal Resmi Pusat Layanan Disabilitas Universitas Ibnu Sina (PLD UIS) — Mewujudkan Kampus Inklusif, Ramah Disabilitas, Unggul & Berintegritas.')">
  <meta name="keywords" content="@yield('meta_keywords', 'pld uis, pusat layanan disabilitas, universitas ibnu sina, kampus inklusif, disabilitas batam, layanan disabilitas, beasiswa disabilitas')">
  <meta name="author" content="@yield('meta_author', 'Pusat Layanan Disabilitas UIS')">

  <!-- Open Graph / Facebook / WhatsApp / Telegram Preview -->
  <meta property="og:type" content="@yield('og_type', 'website')">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:title" content="@yield('og_title', View::yieldContent('title', 'PLD — Pusat Layanan Disabilitas UIS | Unggul & Inklusif'))">
  <meta property="og:description" content="@yield('og_description', View::yieldContent('meta_description', 'Portal Resmi Pusat Layanan Disabilitas Universitas Ibnu Sina (PLD UIS) — Mewujudkan Kampus Inklusif, Ramah Disabilitas, Unggul & Berintegritas.'))">
  <meta property="og:image" content="@yield('og_image', asset('assets/img/logouis.png'))">
  <meta property="og:image:secure_url" content="@yield('og_image', asset('assets/img/logouis.png'))">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:site_name" content="Pusat Layanan Disabilitas UIS">
  <meta property="og:locale" content="id_ID">
  @stack('extra_meta')

  <!-- Twitter / X Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ url()->current() }}">
  <meta name="twitter:title" content="@yield('og_title', View::yieldContent('title', 'PLD — Pusat Layanan Disabilitas UIS | Unggul & Inklusif'))">
  <meta name="twitter:description" content="@yield('og_description', View::yieldContent('meta_description', 'Portal Resmi Pusat Layanan Disabilitas Universitas Ibnu Sina (PLD UIS) — Mewujudkan Kampus Inklusif, Ramah Disabilitas, Unggul & Berintegritas.'))">
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

  <!-- Swiper Slider CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

  <!-- Main Unified Frontend Style CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

  @stack('styles')
</head>

<body>

<header class="header-sticky-wrapper" id="headerStickyWrapper">

  @include('layouts.frontend.topbar')

  @include('layouts.frontend.header')
</header>
<div class="header-spacer" id="headerSpacer"></div>

@yield('content')

@include('layouts.frontend.footer')

<!-- Back to Top -->
<a href="#" class="back-to-top" id="backToTop">
  <i class="bi bi-chevron-up"></i>
</a>

<!-- Accessibility Voice Assistant (Hover, Select & Focus Reader) -->
@include('layouts.frontend.voice-assistant')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<!-- Swiper Slider JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  AOS.init({
    once: true,
    duration: 400,
    offset: 20,
    delay: 0,
    disable: function() {
      return window.innerWidth < 768;
    }
  });

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

  // Sinkronisasi tinggi spacer dengan fixed header secara dinamis
  function syncHeaderSpacer() {
    const header = document.getElementById('headerStickyWrapper');
    const spacer = document.getElementById('headerSpacer');
    if (header && spacer) {
      spacer.style.height = header.offsetHeight + 'px';
    }
  }
  window.addEventListener('resize', syncHeaderSpacer);
  window.addEventListener('load', syncHeaderSpacer);
  document.addEventListener('DOMContentLoaded', syncHeaderSpacer);
  syncHeaderSpacer();
</script>

@stack('scripts')

</body>
</html>
