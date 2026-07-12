@extends('layouts.frontend.template')

@section('title', 'Testimoni Klien — PT Berkarya Jasa Inspeksi')
@section('meta_description', 'Baca ulasan dan testimoni langsung dari manajemen K3, direksi, dan klien industri yang telah mempercayakan kebutuhan Riksa Uji dan sertifikasi K3 mereka kepada kami.')
@section('meta_keywords', 'testimoni riksa uji, ulasan klien k3, review sertifikasi k3, jasa inspeksi terpercaya')

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
<div class="testi-hero">
  <div class="testi-hero-bg"></div>
  <div class="testi-hero-overlay"></div>
  <div class="testi-hero-pattern"></div>

  <div class="container">
    <div class="testi-hero-content" data-aos="fade-up" data-aos-duration="800">
      <h1 class="testi-hero-title">
        Testimoni <em>Pelanggan</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}">Beranda</a>
        <span class="sep">/</span>
        <span class="active">Testimoni</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     TESTIMONIAL SECTION
═══════════════════════════════════════════════ -->
<section class="section-bg-white tech-grid-pattern">
  <div class="container">
    <div class="text-center mb-4" data-aos="fade-up">
      <div class="section-label mx-auto">Ulasan Pengguna</div>
      <h2 class="section-title">Apa Kata <em>Mitra & Pelanggan</em> Kami?</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto mb-4">
        Kepuasan klien adalah tolok ukur kesuksesan kami. Berikut adalah pengalaman mereka yang telah menggunakan layanan Riksa Uji dan sertifikasi K3 kami.
      </p>
    </div>

    <!-- Filter Buttons (Dynamic via JS toggles) -->
    <div class="filter-tags" data-aos="fade-up" data-aos-delay="100">
      <span class="filter-tag active" onclick="filterReviews('all')">Semua</span>
      <span class="filter-tag" onclick="filterReviews('manajemen-k3')">Manajemen K3</span>
      <span class="filter-tag" onclick="filterReviews('direksi')">Direksi</span>
      <span class="filter-tag" onclick="filterReviews('klien-industri')">Klien Industri</span>
    </div>

    <!-- Review Grid -->
    <div class="row g-4">
      @foreach($testimonials as $index => $testi)
        @php
          $initials = '';
          $words = explode(' ', $testi->nama);
          foreach ($words as $w) {
              $initials .= strtoupper(substr($w, 0, 1));
          }
          $initials = substr($initials, 0, 2);

          $badgeLabel = 'Klien Industri';
          if ($testi->kategori === 'manajemen-k3') {
              $badgeLabel = 'Manajemen K3';
          } elseif ($testi->kategori === 'direksi') {
              $badgeLabel = 'Direksi';
          }
        @endphp
        <div class="col-md-6 col-lg-4 review-item" data-category="{{ $testi->kategori }}" data-aos="fade-up" data-aos-delay="{{ (($index % 3) + 1) * 100 }}">
          <div class="testimonial-card">
            <div class="stars">
              @for($i = 1; $i <= 5; $i++)
                @if($i <= $testi->bintang)
                  <i class="bi bi-star-fill"></i>
                @else
                  <i class="bi bi-star"></i>
                @endif
              @endfor
            </div>
            <p class="testimonial-text">"{{ $testi->pesan }}"</p>
            <div class="testimonial-author">
              <div class="author-avatar">{{ $initials }}</div>
              <div>
                <div class="author-name">{{ $testi->nama }}</div>
                <div class="author-role">{{ $testi->pekerjaan }}</div>
                <span class="author-badge">{{ $badgeLabel }}</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     CTA SECTION & FORM
═══════════════════════════════════════════════ -->
<div class="cta-section">
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center g-5">
      <div class="col-xl-7" data-aos="fade-right">
        <div class="section-label" style="color: var(--clay);">Kirim Masukan</div>
        <h2 class="cta-title">Punya Pengalaman Baik<br><em>Bekerja Sama</em> dengan Kami?</h2>
        <p class="cta-desc">
          Bagikan pengalaman Anda menggunakan layanan Riksa Uji, kalibrasi, atau sertifikasi K3 dari PT Berkarya Jasa Inspeksi. Ulasan Anda sangat berharga bagi peningkatan layanan kami.
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="https://wa.me/{{ $cleanWa ?? '6282280312127' }}" class="btn-primary-hero" target="_blank">
            <i class="bi bi-chat-left-heart-fill"></i>
            Kirim Testimoni via WhatsApp
          </a>
          <a href="{{ route('homepage.kontak') }}" class="btn-outline-hero">
            Hubungi Customer Care
          </a>
        </div>
      </div>
      <div class="col-xl-5" data-aos="fade-left" id="form-testimoni">
        <div class="testimonial-form-card">
          <h4 class="form-title">Tulis Ulasan Anda</h4>
          <p class="form-subtitle">Masukan Anda membantu kami menjadi lebih baik.</p>
          
          <form action="{{ route('homepage.testimoni.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
              <label class="form-label-custom">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control-custom @error('nama') is-invalid @enderror" placeholder="Contoh: Budi Nugraha" value="{{ old('nama') }}" required>
              @error('nama')
                <div class="invalid-feedback-custom">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label-custom">Jabatan & Perusahaan</label>
              <input type="text" name="pekerjaan" class="form-control-custom @error('pekerjaan') is-invalid @enderror" placeholder="Contoh: HSE Manager, PT Industri Batam" value="{{ old('pekerjaan') }}" required>
              @error('pekerjaan')
                <div class="invalid-feedback-custom">{{ $message }}</div>
              @enderror
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label-custom">Kategori Profil</label>
                <select name="kategori" class="form-select-custom @error('kategori') is-invalid @enderror" required>
                  <option value="" disabled selected>Pilih Kategori</option>
                  <option value="manajemen-k3" {{ old('kategori') == 'manajemen-k3' ? 'selected' : '' }}>Manajemen K3</option>
                  <option value="direksi" {{ old('kategori') == 'direksi' ? 'selected' : '' }}>Direksi</option>
                  <option value="klien-industri" {{ old('kategori') == 'klien-industri' ? 'selected' : '' }}>Klien Industri</option>
                </select>
                @error('kategori')
                  <div class="invalid-feedback-custom">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="col-md-6">
                <label class="form-label-custom">Rating Kepuasan</label>
                <div class="star-rating-wrapper">
                  <div class="star-rating">
                    <input type="radio" id="star5" name="bintang" value="5" {{ old('bintang', 5) == 5 ? 'checked' : '' }} required/><label for="star5" title="5 bintang"><i class="bi bi-star-fill"></i></label>
                    <input type="radio" id="star4" name="bintang" value="4" {{ old('bintang') == 4 ? 'checked' : '' }}/><label for="star4" title="4 bintang"><i class="bi bi-star-fill"></i></label>
                    <input type="radio" id="star3" name="bintang" value="3" {{ old('bintang') == 3 ? 'checked' : '' }}/><label for="star3" title="3 bintang"><i class="bi bi-star-fill"></i></label>
                    <input type="radio" id="star2" name="bintang" value="2" {{ old('bintang') == 2 ? 'checked' : '' }}/><label for="star2" title="2 bintang"><i class="bi bi-star-fill"></i></label>
                    <input type="radio" id="star1" name="bintang" value="1" {{ old('bintang') == 1 ? 'checked' : '' }}/><label for="star1" title="1 bintang"><i class="bi bi-star-fill"></i></label>
                  </div>
                </div>
                @error('bintang')
                  <div class="invalid-feedback-custom d-block">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label-custom">Tulis Ulasan Anda</label>
              <textarea name="pesan" rows="4" class="form-control-custom @error('pesan') is-invalid @enderror" placeholder="Bagikan detail pengalaman Anda menggunakan layanan kami..." required>{{ old('pesan') }}</textarea>
              @error('pesan')
                <div class="invalid-feedback-custom">{{ $message }}</div>
              @enderror
            </div>

            <button type="submit" class="btn-submit-testi w-100">
              <i class="bi bi-send-fill me-2"></i> Kirim Ulasan
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  // Testimonial Category Filter
  function filterReviews(category) {
    // Toggle active class on buttons
    document.querySelectorAll('.filter-tag').forEach(tag => {
      tag.classList.remove('active');
    });
    event.currentTarget.classList.add('active');

    // Show/Hide items
    const items = document.querySelectorAll('.review-item');
    items.forEach(item => {
      if (category === 'all' || item.getAttribute('data-category') === category) {
        item.style.display = 'block';
        item.style.opacity = '1';
        item.style.transform = 'scale(1)';
      } else {
        item.style.display = 'none';
      }
    });
  }
</script>
@endpush

@push('styles')
<style>
  .testimonial-form-card {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 24px;
    padding: 36px;
    backdrop-filter: blur(10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
  }
  .form-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: white;
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 6px;
  }
  .form-subtitle {
    font-size: 13.5px;
    color: rgba(255, 255, 255, 0.5);
    margin-bottom: 24px;
  }
  .cta-section label.form-label-custom {
    font-size: 13.5px !important;
    font-weight: 600 !important;
    color: #ffffff !important;
    margin-bottom: 8px !important;
    display: block !important;
  }
  .cta-section .form-control-custom, 
  .cta-section .form-select-custom {
    background: rgba(255, 255, 255, 0.08) !important;
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
    color: #ffffff !important;
    border-radius: 12px !important;
    padding: 12px 16px !important;
    font-size: 14.5px !important;
    transition: all 0.3s ease !important;
    width: 100% !important;
    outline: none !important;
  }
  .cta-section .form-control-custom::placeholder {
    color: rgba(255, 255, 255, 0.45) !important;
  }
  .cta-section .form-control-custom:focus, 
  .cta-section .form-select-custom:focus {
    background: rgba(255, 255, 255, 0.12) !important;
    border-color: var(--clay) !important;
    box-shadow: 0 0 0 4px rgba(79, 168, 232, 0.25) !important;
  }

  .form-select-custom {
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 16px center;
    background-size: 12px 12px;
    cursor: pointer;
  }
  .form-select-custom option {
    background: var(--charcoal);
    color: white;
  }
  .invalid-feedback-custom {
    color: #f87171;
    font-size: 12px;
    margin-top: 5px;
    font-weight: 500;
  }
  .form-control-custom.is-invalid, .form-select-custom.is-invalid {
    border-color: #ef4444;
  }
  
  /* Star Rating */
  .star-rating-wrapper {
    height: 48px;
    display: flex;
    align-items: center;
  }
  .star-rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
  }
  .star-rating input {
    display: none;
  }
  .star-rating label {
    font-size: 24px;
    color: rgba(255, 255, 255, 0.15);
    cursor: pointer;
    transition: all 0.2s ease;
    margin-right: 6px;
  }
  .star-rating label:hover,
  .star-rating label:hover ~ label,
  .star-rating input:checked ~ label {
    color: #f59e0b;
  }
  .star-rating label:active {
    transform: scale(0.9);
  }

  .btn-submit-testi {
    background: var(--terracotta);
    border: 1px solid var(--terracotta);
    color: white;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    font-size: 15px;
    border-radius: 12px;
    padding: 14px 20px;
    transition: all 0.25s ease;
    cursor: pointer;
  }
  .btn-submit-testi:hover {
    background: var(--terracotta-lt);
    border-color: var(--terracotta-lt);
    box-shadow: 0 6px 20px rgba(228, 3, 46, 0.3);
    transform: translateY(-2px);
  }
  .btn-submit-testi:active {
    transform: translateY(0);
  }
</style>
@endpush
