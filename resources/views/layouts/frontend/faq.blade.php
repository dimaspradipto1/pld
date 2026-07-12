@extends('layouts.frontend.template')

@section('title', 'Frequently Asked Questions (FAQ) — PT Berkarya Jasa Inspeksi')
@section('meta_description', 'Temukan jawaban cepat atas pertanyaan seputar layanan Riksa Uji K3, kalibrasi, sertifikasi, legalitas, dan jadwal layanan PT Berkarya Jasa Inspeksi.')
@section('meta_keywords', 'faq riksa uji, tanya jawab k3, sertifikasi k3, jadwal riksa uji, ndt, pjk3')

@section('content')
@php
  $cleanWa = '';
  if (!empty($contact->no_wa)) {
      $cleanWa = preg_replace('/[^0-9]/', '', $contact->no_wa);
      if (strpos($cleanWa, '08') === 0) {
          $cleanWa = '628' . substr($cleanWa, 2);
      }
  }
@endphp

<!-- ═══════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════ -->
<div class="faq-hero">
  <div class="faq-hero-bg"></div>
  <div class="faq-hero-overlay"></div>
  <div class="faq-hero-pattern"></div>

  <div class="container">
    <div class="faq-hero-content" data-aos="fade-up" data-aos-duration="800">
      <h1 class="faq-hero-title">
        Tanya Jawab <em>(FAQ)</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}">Beranda</a>
        <span class="sep">/</span>
        <span class="active">FAQ</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     FAQ ACCORDION SECTION
═══════════════════════════════════════════════ -->
<section class="section-bg-white tech-grid-pattern">
  <div class="container">
    
    <!-- Search Bar -->
    <div class="search-box-wrap" data-aos="fade-up">
      <i class="bi bi-search"></i>
      <input type="text" id="faqSearchInput" class="search-input-custom" placeholder="Ketik kata kunci pertanyaan... (misal: pengiriman, custom, harga)" onkeyup="searchFaq()">
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-10">
        
        <!-- Category 1: Layanan & Ruang Lingkup -->
        <div class="faq-category-group mb-5" data-aos="fade-up">
          <h3 class="faq-cat-title">
            <i class="bi bi-clipboard2-check text-terracotta"></i>
            Layanan & Ruang Lingkup
          </h3>

          @forelse($faqs->where('category', 'layanan') as $index => $faq)
            <div class="faq-item {{ $index === 0 ? 'open' : '' }}" id="faq-{{ $faq->id }}">
              <div class="faq-question" onclick="toggleFaq('faq-{{ $faq->id }}')">
                <span>{{ $faq->question }}</span>
                <div class="faq-icon"><i class="bi bi-plus"></i></div>
              </div>
              <div class="faq-answer">
                {{ $faq->answer }}
              </div>
            </div>
          @empty
            <div class="text-muted text-center py-3">Belum ada FAQ untuk kategori ini.</div>
          @endforelse
        </div>

        <!-- Category 2: Sertifikasi & Legalitas -->
        <div class="faq-category-group mb-5" data-aos="fade-up">
          <h3 class="faq-cat-title">
            <i class="bi bi-patch-check-fill text-terracotta"></i>
            Sertifikasi & Legalitas
          </h3>

          @forelse($faqs->where('category', 'sertifikasi') as $index => $faq)
            <div class="faq-item {{ $index === 0 ? 'open' : '' }}" id="faq-{{ $faq->id }}">
              <div class="faq-question" onclick="toggleFaq('faq-{{ $faq->id }}')">
                <span>{{ $faq->question }}</span>
                <div class="faq-icon"><i class="bi bi-plus"></i></div>
              </div>
              <div class="faq-answer">
                {{ $faq->answer }}
              </div>
            </div>
          @empty
            <div class="text-muted text-center py-3">Belum ada FAQ untuk kategori ini.</div>
          @endforelse
        </div>

        <!-- Category 3: Jadwal & Area Kerja -->
        <div class="faq-category-group mb-4" data-aos="fade-up">
          <h3 class="faq-cat-title">
            <i class="bi bi-calendar-check text-terracotta"></i>
            Jadwal & Area Kerja
          </h3>

          @forelse($faqs->where('category', 'jadwal') as $index => $faq)
            <div class="faq-item {{ $index === 0 ? 'open' : '' }}" id="faq-{{ $faq->id }}">
              <div class="faq-question" onclick="toggleFaq('faq-{{ $faq->id }}')">
                <span>{{ $faq->question }}</span>
                <div class="faq-icon"><i class="bi bi-plus"></i></div>
              </div>
              <div class="faq-answer">
                {{ $faq->answer }}
              </div>
            </div>
          @empty
            <div class="text-muted text-center py-3">Belum ada FAQ untuk kategori ini.</div>
          @endforelse
        </div>

      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════
     CTA SECTION
═══════════════════════════════════════════════ -->
<div class="cta-section">
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center g-5">
      <div class="col-xl-7" data-aos="fade-right">
        <div class="section-label" style="color: var(--clay);">Hubungi Kami</div>
        <h2 class="cta-title">Masih Memiliki<br><em>Pertanyaan Lain</em> yang Belum Terjawab?</h2>
        <p class="cta-desc">
          Jangan ragu untuk berkonsultasi langsung dengan tim ahli K3 kami. Kami siap membantu menjelaskan ruang lingkup Riksa Uji, dasar hukum, hingga jadwal pemeriksaan yang sesuai kebutuhan Anda.
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="https://wa.me/{{ $cleanWa ?? '6282280312127' }}" class="btn-primary-hero" target="_blank">
            <i class="bi bi-whatsapp"></i>
            Hubungi Lewat WhatsApp
          </a>
          <a href="{{ route('homepage.kontak') }}" class="btn-outline-hero">
            Lihat Informasi Kontak
          </a>
        </div>
      </div>
      <div class="col-xl-5" data-aos="fade-left">
        <!-- Operational Hours Box -->
        <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:24px; padding:32px;">
          <h4 style="font-family:'Plus Jakarta Sans',sans-serif; color:white; font-size:18px; font-weight:700; margin-bottom:18px; border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:10px;">
            <i class="bi bi-clock-fill text-clay me-2"></i> Jam Operasional Konsultasi
          </h4>
          <div class="d-flex justify-content-between mb-3" style="font-size:14px;">
            <span style="color:rgba(255,255,255,0.6);">Senin – Jumat</span>
            <span style="color:white; font-weight:600;">08:00 – 17:00 WIB</span>
          </div>
          <div class="d-flex justify-content-between mb-3" style="font-size:14px;">
            <span style="color:rgba(255,255,255,0.6);">Sabtu</span>
            <span style="color:white; font-weight:600;">08:00 – 15:00 WIB</span>
          </div>
          <div class="d-flex justify-content-between" style="font-size:14px;">
            <span style="color:rgba(255,255,255,0.6);">Minggu / Hari Besar</span>
            <span class="badge bg-danger" style="font-size:11px; padding:4px 8px; font-weight:600;">Tutup</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  // FAQ Live Search
  function searchFaq() {
    const query = document.getElementById('faqSearchInput').value.toLowerCase();
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
      const question = item.querySelector('.faq-question span').textContent.toLowerCase();
      const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
      
      if (question.includes(query) || answer.includes(query)) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });

    // Automatically open the first matching item if searching
    if (query.length > 1) {
      let firstVisible = false;
      faqItems.forEach(item => {
        if (item.style.display === 'block' && !firstVisible) {
          item.classList.add('open');
          firstVisible = true;
        } else {
          item.classList.remove('open');
        }
      });
    }
  }
</script>
@endpush
