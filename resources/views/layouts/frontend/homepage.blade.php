@extends('layouts.frontend.template')

@section('title', 'PT Berkarya Jasa Inspeksi (BJI) — Riksa Uji, Kalibrasi & Sertifikasi K3')
@section('meta_description', 'PT Berkarya Jasa Inspeksi (BJI) — perusahaan jasa keselamatan dan kesehatan kerja: Riksa Uji peralatan, kalibrasi, konsultasi, dan sertifikasi teknis sesuai standar K3 Kemnaker.')
@section('meta_keywords', 'riksa uji k3, kalibrasi, sertifikasi teknis, PJK3, ahli k3, riksa uji pesawat angkat angkut, bejana tekan, instalasi listrik, proteksi kebakaran')

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
     HERO SLIDER — PURE IMAGE BANNER
═══════════════════════════════════════════════ -->
<div class="banner-slider" id="bannerSlider">

  <!-- Slides -->
  @if(isset($banners) && $banners->count() > 0)
    @foreach($banners as $index => $banner)
      <div class="bs-slide {{ $index === 0 ? 'bs-active' : '' }}">
        <img src="{{ asset('storage/' . $banner->url) }}" alt="{{ $banner->judul ?? 'PT Berkarya Jasa Inspeksi' }}" class="bs-img">
      </div>
    @endforeach
  @else
    <div class="bs-slide bs-active">
      <img src="{{ asset('frontend/img/banner-1.png') }}" alt="PT Berkarya Jasa Inspeksi — Riksa Uji, Kalibrasi & Sertifikasi K3" class="bs-img">
    </div>
    <div class="bs-slide">
      <img src="{{ asset('frontend/img/banner-2.png') }}" alt="Bersertifikat & Sesuai Standar Kemnaker" class="bs-img">
    </div>
    <div class="bs-slide">
      <img src="{{ asset('frontend/img/banner-3.png') }}" alt="Tim Ahli K3 Berkompeten" class="bs-img">
    </div>
  @endif

  <!-- Trust badge overlay -->
  <div class="bs-trust-badge">
    <span class="bs-trust-icon"><i class="bi bi-patch-check-fill"></i></span>
    <span>PJK3 Terdaftar Kemnaker</span>
  </div>

  <!-- Arrow Prev -->
  <button class="bs-arrow bs-prev" id="bsPrev" aria-label="Sebelumnya">
    <i class="bi bi-chevron-left"></i>
  </button>

  <!-- Arrow Next -->
  <button class="bs-arrow bs-next" id="bsNext" aria-label="Berikutnya">
    <i class="bi bi-chevron-right"></i>
  </button>

  <!-- Dots -->
  <div class="bs-dots">
    @if(isset($banners) && $banners->count() > 0)
      @foreach($banners as $index => $banner)
        <button class="bs-dot {{ $index === 0 ? 'bs-dot-active' : '' }}" data-idx="{{ $index }}" aria-label="Slide {{ $index + 1 }}"></button>
      @endforeach
    @else
      <button class="bs-dot bs-dot-active" data-idx="0" aria-label="Slide 1"></button>
      <button class="bs-dot" data-idx="1" aria-label="Slide 2"></button>
      <button class="bs-dot" data-idx="2" aria-label="Slide 3"></button>
    @endif
  </div>

  <!-- Progress bar -->
  <div class="bs-progress"><div class="bs-progress-fill" id="bsProgress"></div></div>

</div>

@push('styles')
<style>
/* ═══════════════════════════════════════════
   PURE IMAGE BANNER SLIDER
═══════════════════════════════════════════ */
.banner-slider {
  position: relative;
  width: 100%;
  overflow: hidden;
  background: #111;
  user-select: none;
}

/* Each slide */
.bs-slide {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  transition: opacity 0.9s cubic-bezier(0.4, 0, 0.2, 1);
  pointer-events: none;
  z-index: 1;
}
.bs-slide.bs-active {
  position: relative;
  opacity: 1;
  pointer-events: auto;
  z-index: 2;
  height: auto;
}

/* The banner image — natural scale, no crop */
.bs-img {
  width: 100%;
  height: auto;
  display: block;
  transform: none;
}

/* Arrows */
.bs-arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 20;
  width: 52px;
  height: 52px;
  border-radius: 50%;
  background: rgba(0,0,0,0.35);
  border: 1.5px solid rgba(255,255,255,0.22);
  color: #fff;
  font-size: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  backdrop-filter: blur(10px);
  transition: background 0.2s, transform 0.2s;
  outline: none;
}
.bs-arrow:hover {
  background: rgba(228,3,46,0.7);
  border-color: rgba(228,3,46,0.8);
  transform: translateY(-50%) scale(1.1);
}
.bs-prev { left: 24px; }
.bs-next { right: 24px; }

/* Dots */
.bs-dots {
  position: absolute;
  bottom: 22px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 20;
  display: flex;
  gap: 8px;
  align-items: center;
}
.bs-dot {
  width: 9px;
  height: 9px;
  border-radius: 50%;
  background: rgba(255,255,255,0.35);
  border: none;
  cursor: pointer;
  transition: all 0.3s;
  padding: 0;
  outline: none;
}
.bs-dot.bs-dot-active {
  width: 28px;
  border-radius: 5px;
  background: var(--terracotta-lt);
}

/* Progress bar */
.bs-progress {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: rgba(255,255,255,0.12);
  z-index: 20;
}
.bs-progress-fill {
  height: 100%;
  width: 0%;
  background: linear-gradient(90deg, var(--terracotta), var(--terracotta-lt));
  border-radius: 2px;
  transition: width 0.08s linear;
}

/* Trust badge overlay */
.bs-trust-badge {
  position: absolute;
  top: 24px;
  left: 24px;
  z-index: 21;
  display: inline-flex;
  align-items: center;
  gap: 9px;
  background: rgba(21,43,92,0.85);
  border: 1px solid rgba(255,255,255,0.15);
  backdrop-filter: blur(8px);
  border-radius: 8px;
  padding: 10px 18px 10px 10px;
  color: white;
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 13px;
  font-weight: 700;
  letter-spacing: 0.3px;
}
.bs-trust-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 26px; height: 26px;
  background: var(--terracotta);
  border-radius: 6px;
  font-size: 14px;
}
@media (max-width: 767px) {
  .bs-trust-badge { top: 14px; left: 14px; font-size: 11px; padding: 7px 14px 7px 7px; gap: 6px; }
  .bs-trust-icon { width: 20px; height: 20px; font-size: 11px; }
}

/* Responsive */
@media (max-width: 767px) {
  .bs-arrow { width: 38px; height: 38px; font-size: 15px; }
  .bs-prev { left: 10px; }
  .bs-next { right: 10px; }
}
</style>
@endpush

@push('scripts')
<script>
(function () {
  var DELAY = 5000;
  var slides = document.querySelectorAll('.bs-slide');
  var dots   = document.querySelectorAll('.bs-dot');
  var fill   = document.getElementById('bsProgress');
  var prev   = document.getElementById('bsPrev');
  var next   = document.getElementById('bsNext');

  if (slides.length <= 1) {
    if (prev) prev.style.display = 'none';
    if (next) next.style.display = 'none';
    if (fill) fill.parentNode.style.display = 'none';
    var dotsContainer = document.querySelector('.bs-dots');
    if (dotsContainer) dotsContainer.style.display = 'none';
    return;
  }

  var cur    = 0;
  var raf    = null;
  var start  = null;
  var paused = false;

  function show(idx) {
    slides[cur].classList.remove('bs-active');
    dots[cur].classList.remove('bs-dot-active');
    cur = (idx + slides.length) % slides.length;
    slides[cur].classList.add('bs-active');
    dots[cur].classList.add('bs-dot-active');
    resetProgress();
  }

  function resetProgress() {
    cancelAnimationFrame(raf);
    if (fill) fill.style.width = '0%';
    if (!paused) runProgress();
  }

  function runProgress() {
    start = performance.now();
    function tick(now) {
      var pct = Math.min(((now - start) / DELAY) * 100, 100);
      if (fill) fill.style.width = pct + '%';
      if (pct >= 100) { show(cur + 1); }
      else { raf = requestAnimationFrame(tick); }
    }
    raf = requestAnimationFrame(tick);
  }

  if (prev) prev.addEventListener('click', function () { show(cur - 1); });
  if (next) next.addEventListener('click', function () { show(cur + 1); });

  dots.forEach(function (d) {
    d.addEventListener('click', function () { show(parseInt(d.dataset.idx)); });
  });

  // Pause on hover
  var slider = document.getElementById('bannerSlider');
  if (slider) {
    slider.addEventListener('mouseenter', function () {
      paused = true;
      cancelAnimationFrame(raf);
    });
    slider.addEventListener('mouseleave', function () {
      paused = false;
      start = performance.now() - ((parseFloat(fill ? fill.style.width : 0) / 100) * DELAY);
      runProgress();
    });
  }

  // Touch swipe
  var tx = 0;
  if (slider) {
    slider.addEventListener('touchstart', function (e) { tx = e.touches[0].clientX; }, { passive: true });
    slider.addEventListener('touchend', function (e) {
      var diff = tx - e.changedTouches[0].clientX;
      if (Math.abs(diff) > 40) { diff > 0 ? show(cur + 1) : show(cur - 1); }
    }, { passive: true });
  }

  // Keyboard
  document.addEventListener('keydown', function (e) {
    if (e.key === 'ArrowRight') show(cur + 1);
    if (e.key === 'ArrowLeft')  show(cur - 1);
  });

  runProgress();
})();
</script>
@endpush

<!-- ═══════════════════════════════════════════════
     PRODUCT STRIP
═══════════════════════════════════════════════ -->
<div class="hero-product-strip">
  <div class="container">
    <div class="row g-0">
      <div class="col-sm-6 col-lg-3">
        <div class="product-strip-item" data-aos="fade-up" data-aos-delay="100">
          <div class="strip-icon"><i class="bi bi-patch-check-fill"></i></div>
          <div>
            <div class="strip-title">Bersertifikat Kemnaker</div>
            <div class="strip-sub">Diakui secara hukum</div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="product-strip-item" data-aos="fade-up" data-aos-delay="200">
          <div class="strip-icon"><i class="bi bi-clipboard2-check"></i></div>
          <div>
            <div class="strip-title">Riksa Uji Berkala</div>
            <div class="strip-sub">Sesuai jadwal K3</div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="product-strip-item" data-aos="fade-up" data-aos-delay="300">
          <div class="strip-icon"><i class="bi bi-speedometer2"></i></div>
          <div>
            <div class="strip-title">Kalibrasi Presisi</div>
            <div class="strip-sub">Metode NDT standar</div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="product-strip-item" data-aos="fade-up" data-aos-delay="400">
          <div class="strip-icon"><i class="bi bi-headset"></i></div>
          <div>
            <div class="strip-title">Konsultasi Gratis</div>
            <div class="strip-sub">Tim ahli K3 siap bantu</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     FITUR UNGGULAN
═══════════════════════════════════════════════ -->
<section class="section-bg-cream tech-grid-pattern" id="fitur">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Keunggulan Kami</div>
      <h2 class="section-title">Mengapa Memilih <em>BJI</em>?</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Kami memastikan setiap peralatan kerja Anda sesuai standar Keselamatan dan Kesehatan Kerja (K3),
        ditangani oleh tim ahli yang kompeten dan bersertifikat.
      </p>
    </div>

    <div class="row g-4">
      @if(isset($features) && $features->count() > 0)
        @foreach($features as $index => $feature)
          <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
            <div class="feature-card">
              <div class="feature-icon-wrap">
                <i class="bi {{ $feature->icon }}"></i>
              </div>
              <div class="feature-title">{{ $feature->judul }}</div>
              <p class="feature-desc">{{ $feature->deskripsi }}</p>
            </div>
          </div>
        @endforeach
      @else
        <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-card">
            <div class="feature-icon-wrap">
              <i class="bi bi-patch-check-fill"></i>
            </div>
            <div class="feature-title">Bersertifikat & Terpercaya</div>
            <p class="feature-desc">Seluruh hasil Riksa Uji kami diakui secara hukum sesuai Permenaker yang berlaku dan diterbitkan oleh ahli K3 berkompeten.</p>
          </div>
        </div>
        <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-card">
            <div class="feature-icon-wrap">
              <i class="bi bi-tools"></i>
            </div>
            <div class="feature-title">Metode Pengujian Standar</div>
            <p class="feature-desc">Menggunakan metode Non Destructive Test (NDT) dan prosedur pemeriksaan sesuai standar nasional yang berlaku.</p>
          </div>
        </div>
        <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-card">
            <div class="feature-icon-wrap">
              <i class="bi bi-file-earmark-check"></i>
            </div>
            <div class="feature-title">Laporan Lengkap & Tepat Waktu</div>
            <p class="feature-desc">Laporan hasil pemeriksaan dan pengujian disusun lengkap beserta kesimpulan dan saran, diserahkan tepat waktu.</p>
          </div>
        </div>
        <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="400">
          <div class="feature-card">
            <div class="feature-icon-wrap">
              <i class="bi bi-people-fill"></i>
            </div>
            <div class="feature-title">Tim Ahli K3 Berkompeten</div>
            <p class="feature-desc">Didukung tenaga ahli K3 berpengalaman yang siap membantu konsultasi kebutuhan inspeksi dan sertifikasi Anda.</p>
          </div>
        </div>
      @endif
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     COUNTER SECTION
═══════════════════════════════════════════════ -->
<div class="counter-section">
  <div class="container position-relative" style="z-index:1;">
    <div class="row g-4">
      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <div class="counter-item">
          <div class="counter-icon"><i class="bi bi-clipboard2-check"></i></div>
          <div class="counter-num">500<sup>+</sup></div>
          <div class="counter-label">Peralatan Diinspeksi</div>
        </div>
      </div>
      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
        <div class="counter-item">
          <div class="counter-icon"><i class="bi bi-building"></i></div>
          <div class="counter-num">50<sup>+</sup></div>
          <div class="counter-label">Klien Industri</div>
        </div>
      </div>
      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="counter-item">
          <div class="counter-icon"><i class="bi bi-patch-check"></i></div>
          <div class="counter-num">100<sup>%</sup></div>
          <div class="counter-label">Sesuai Permenaker</div>
        </div>
      </div>
      <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
        <div class="counter-item">
          <div class="counter-icon"><i class="bi bi-calendar-check"></i></div>
          <div class="counter-num">8<sup>th+</sup></div>
          <div class="counter-label">Tahun Pengalaman</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     LAYANAN KAMI
═══════════════════════════════════════════════ -->
<section class="section-bg-white" id="layanan">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Jasa Layanan</div>
      <h2 class="section-title">Layanan <em>Riksa Uji</em> Kami</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Pemeriksaan uji kelayakan peralatan, konsultasi, sertifikasi, dan kalibrasi
        sesuai standar Keselamatan dan Kesehatan Kerja (K3) yang berlaku.
      </p>
    </div>

    <div class="row g-4">
      @forelse($layanans as $layanan)
        <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{ 100 * (($loop->index % 3) + 1) }}">
          <a href="{{ route('homepage.layanan.detail', $layanan->id) }}" class="product-card product-card-link">
            <div class="product-card-img">
              <div class="product-icon"><i class="bi {{ $layanan->icon }}"></i></div>
              @if($layanan->dasar_hukum)
                <span class="product-badge">{{ $layanan->dasar_hukum }}</span>
              @endif
            </div>
            <div class="product-card-body">
              <div class="product-card-title">{{ $layanan->judul }}</div>
              <p class="product-card-desc">{{ \Illuminate\Support\Str::limit($layanan->deskripsi, 110) }}</p>
              <div class="product-card-footer">
                <span class="btn-card">Selengkapnya <i class="bi bi-arrow-right"></i></span>
              </div>
            </div>
          </a>
        </div>
      @empty
        <div class="col-12 text-center py-4">
          <div class="text-muted">Belum ada layanan yang ditambahkan.</div>
        </div>
      @endforelse
    </div>

    <div class="text-center mt-5" data-aos="fade-up">
      <a href="{{ route('homepage.layanan') }}" class="btn-primary-hero" style="display:inline-flex;">
        <i class="bi bi-collection"></i>
        Lihat Semua Layanan
      </a>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     OUR PARTNER
═══════════════════════════════════════════════ -->
@if($partners->count() > 0)
<section class="section-bg-sand">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Dipercaya Oleh</div>
      <h2 class="section-title">Klien & <em>Partner</em> Kami</h2>
      <div class="divider-line centered"></div>
    </div>

    <div class="row g-4 justify-content-center align-items-center">
      @foreach($partners as $partner)
        <div class="col-6 col-md-3 col-lg-2 text-center" data-aos="fade-up" data-aos-delay="{{ 50 * (($loop->index % 6) + 1) }}">
          @if($partner->logo)
            <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->nama }}"
                 style="max-width:100%; max-height:60px; object-fit:contain; filter:grayscale(100%); opacity:0.75; transition:all .25s;"
                 onmouseover="this.style.filter='grayscale(0%)'; this.style.opacity='1';"
                 onmouseout="this.style.filter='grayscale(100%)'; this.style.opacity='0.75';">
          @else
            <div style="border:1px dashed var(--border); border-radius:10px; padding:12px 8px; font-size:11.5px; font-weight:600; color:var(--muted);">
              {{ $partner->nama }}
            </div>
          @endif
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- ═══════════════════════════════════════════════
     TENTANG KAMI
═══════════════════════════════════════════════ -->
<section class="section-bg-sand" id="tentang">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-xl-6" data-aos="fade-right" data-aos-duration="800">
        <div class="about-visual">
          <div class="about-img-main">
            <span class="tech-corner tl"></span>
            <span class="tech-corner tr"></span>
            <span class="tech-corner bl"></span>
            <span class="tech-corner br"></span>
            <div class="tech-panel-content">
              <div class="tech-panel-icon"><i class="bi bi-patch-check-fill"></i></div>
              <div class="tech-panel-title">PJK3 Terdaftar Kemnaker</div>
              <div class="tech-panel-sub">Riksa Uji &middot; Kalibrasi &middot; Sertifikasi</div>
            </div>
          </div>

          <!-- Stat Card 1 -->
          <div class="about-stat-card card-1" data-aos="fade-up" data-aos-delay="300">
            <div class="stat-num-big">8<sup>th+</sup></div>
            <div class="stat-label-sm">Tahun Berpengalaman</div>
          </div>

          <!-- Stat Card 2 -->
          <div class="about-stat-card card-2" data-aos="fade-up" data-aos-delay="400">
            <div class="d-flex align-items-center gap-3">
              <div style="font-size:28px; color:#f59e0b;">★★★★★</div>
              <div>
                <div class="stat-num-big" style="font-size:24px;">4.9</div>
                <div class="stat-label-sm">Rating Pelanggan</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6" data-aos="fade-left" data-aos-duration="800">
        <div class="section-label">Tentang Kami</div>
        <h2 class="section-title">Mitra <em>Terpercaya</em> Jasa K3 Anda</h2>
        <div class="divider-line"></div>
        <p class="section-desc mb-4">
          PT Berkarya Jasa Inspeksi adalah perusahaan jasa keselamatan dan kesehatan kerja yang bergerak di bidang pemeriksaan uji kelayakan peralatan, konsultasi, sertifikasi, kalibrasi, dan perpanjangan lisensi peralatan sesuai standar K3 yang berlaku.
        </p>

        <ul class="check-list mb-4">
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Bersertifikat dan diakui sesuai peraturan Kemnaker</span>
          </li>
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Mencakup 6 kategori layanan Riksa Uji K3</span>
          </li>
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Melayani klien industri di berbagai sektor</span>
          </li>
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Tim ahli K3 siap membantu konsultasi kebutuhan Anda</span>
          </li>
          <li>
            <div class="check-icon"><i class="bi bi-check2"></i></div>
            <span>Laporan hasil pemeriksaan lengkap dan tepat waktu</span>
          </li>
        </ul>

        <!-- Stats mini bar -->
        <div class="d-flex flex-wrap gap-3 mb-4">
          <div style="background:rgba(228,3,46,0.08); border:1px solid rgba(228,3,46,0.2); border-radius:12px; padding:12px 20px; text-align:center; min-width:100px;">
            <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:22px; font-weight:900; color:var(--terracotta); line-height:1;">500<sup style="font-size:12px;">+</sup></div>
            <div style="font-size:11px; color:var(--muted); margin-top:2px; font-weight:500;">Peralatan Diinspeksi</div>
          </div>
          <div style="background:rgba(228,3,46,0.08); border:1px solid rgba(228,3,46,0.2); border-radius:12px; padding:12px 20px; text-align:center; min-width:100px;">
            <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:22px; font-weight:900; color:var(--terracotta); line-height:1;">50<sup style="font-size:12px;">+</sup></div>
            <div style="font-size:11px; color:var(--muted); margin-top:2px; font-weight:500;">Klien Industri</div>
          </div>
          <div style="background:rgba(228,3,46,0.08); border:1px solid rgba(228,3,46,0.2); border-radius:12px; padding:12px 20px; text-align:center; min-width:100px;">
            <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:22px; font-weight:900; color:var(--terracotta); line-height:1;">K3</div>
            <div style="font-size:11px; color:var(--muted); margin-top:2px; font-weight:500;">Bersertifikat</div>
          </div>
        </div>

        <div class="d-flex flex-wrap gap-3">
          <a href="#kontak" class="btn-primary-hero" style="display:inline-flex;">
            <i class="bi bi-chat-dots"></i>
            Konsultasi Gratis Sekarang
          </a>
          <a href="{{ route('homepage.tentang') }}" class="btn-outline-hero" style="display:inline-flex; background:rgba(228,3,46,0.1); border-color:rgba(228,3,46,0.3); color:var(--terracotta);">
            <i class="bi bi-arrow-right-circle"></i>
            Profil Perusahaan
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     VISI & MISI
═══════════════════════════════════════════════ -->
@php
  $homeVisi = ($visiMisis['visi'] ?? collect());
  $homeMisi = ($visiMisis['misi'] ?? collect())->pluck('isi');
@endphp
@if($homeVisi->count() || $homeMisi->count())
<section class="section-bg-sand tech-grid-pattern">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Visi & Misi</div>
      <h2 class="section-title">Arah & <em>Komitmen</em> Kami</h2>
      <div class="divider-line centered"></div>
    </div>

    <div class="row g-4 justify-content-center">
      @if($homeVisi->count())
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="value-card" style="height: 100%;">
            <div class="value-icon-wrap"><i class="bi bi-eye"></i></div>
            <div class="value-title" style="font-size:20px;">Visi Kami</div>
            @foreach($homeVisi as $v)
              <p class="value-desc" style="font-size:14.5px; line-height:1.8; text-align: justify;">{{ $v->isi }}</p>
            @endforeach
          </div>
        </div>
      @endif

      @if($homeMisi->count())
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="value-card" style="height: 100%;">
            <div class="value-icon-wrap"><i class="bi bi-rocket-takeoff"></i></div>
            <div class="value-title" style="font-size:20px;">Misi Kami</div>
            <ul class="value-desc" style="font-size:13.5px; line-height:1.75; padding-left: 20px; text-align: justify; margin: 0;">
              @foreach($homeMisi as $poin)
                <li class="mb-2">{{ $poin }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      @endif
    </div>
  </div>
</section>
@endif

<!-- ═══════════════════════════════════════════════
     NILAI PERUSAHAAN
═══════════════════════════════════════════════ -->
@if($nilaiPerusahaans->count() > 0)
<section class="section-bg-white nilai-interactive-section position-relative overflow-hidden">
  
  <!-- Wave Backgrounds (Desktop Only) -->
  <div class="nilai-waves-bg d-none d-lg-block">
    <svg viewBox="0 0 1440 600" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
      <!-- Left Red Wave (extends to the center-right to overlap) -->
      <path d="M 0,220 C 350,150 500,450 780,420 C 950,400 1150,250 1440,300 L 1440,600 L 0,600 Z" fill="url(#red-grad)" opacity="0.9" />
      
      <!-- Right Blue Wave (extends to the center-left to overlap) -->
      <path d="M 1440,250 C 1100,180 950,450 680,430 C 500,410 300,220 0,350 L 0,600 L 1440,600 Z" fill="url(#blue-grad)" opacity="0.92" />
      
      <defs>
        <linearGradient id="red-grad" x1="0%" y1="0%" x2="100%" y2="100%">
          <stop offset="0%" stop-color="#DA251D" />
          <stop offset="100%" stop-color="#EA4C44" />
        </linearGradient>
        <linearGradient id="blue-grad" x1="100%" y1="0%" x2="0%" y2="100%">
          <stop offset="0%" stop-color="#002060" />
          <stop offset="100%" stop-color="#0090DF" />
        </linearGradient>
      </defs>
    </svg>
  </div>

  <div class="container position-relative" style="z-index: 10;">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="nilai-label-wrap">
        <span class="nilai-label-text">NILAI PERUSAHAAN</span>
        <div class="nilai-label-line"></div>
      </div>
      <h2 class="nilai-title-text">Nilai yang Kami <span class="text-red">Pegang Teguh</span></h2>
      <div class="nilai-title-line"></div>
    </div>

    @php
      $safety = $nilaiPerusahaans->where('urutan', 1)->first() ?? $nilaiPerusahaans->first();
      $integrity = $nilaiPerusahaans->where('urutan', 2)->first() ?? $nilaiPerusahaans->skip(1)->first();
      $profesional = $nilaiPerusahaans->where('urutan', 3)->first() ?? $nilaiPerusahaans->skip(2)->first();
      $sinergi = $nilaiPerusahaans->where('urutan', 4)->first() ?? $nilaiPerusahaans->skip(3)->first();
    @endphp

    <!-- Interactive Grid Layout for Desktop -->
    <div class="nilai-interactive-grid d-none d-lg-grid">
      <!-- SVG Lines Overlay -->
      <svg class="nilai-grid-curves" viewBox="0 0 1140 620" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <!-- Safety to Left Shoulder -->
        @if($safety)
        <path d="M 330,110 Q 430,110 500,230" stroke="#76C143" stroke-width="2.5" stroke-dasharray="5,5" fill="none" />
        <circle cx="330" cy="110" r="5" fill="#76C143" />
        @endif

        <!-- Integrity to Right Shoulder -->
        @if($integrity)
        <path d="M 810,110 Q 710,110 640,230" stroke="#0090DF" stroke-width="2.5" stroke-dasharray="5,5" fill="none" />
        <circle cx="810" cy="110" r="5" fill="#0090DF" />
        @endif

        <!-- Profesional to Bottom Left -->
        @if($profesional)
        <path d="M 330,470 Q 430,470 500,340" stroke="#DA251D" stroke-width="2.5" stroke-dasharray="5,5" fill="none" />
        <circle cx="330" cy="470" r="5" fill="#DA251D" />
        @endif

        <!-- Sinergi to Bottom Right -->
        @if($sinergi)
        <path d="M 810,470 Q 710,470 640,340" stroke="#002060" stroke-width="2.5" stroke-dasharray="5,5" fill="none" />
        <circle cx="810" cy="470" r="5" fill="#002060" />
        @endif
      </svg>

      <!-- Left Column -->
      <div class="nilai-col nilai-col-left">
        <!-- Safety -->
        @if($safety)
        <div class="nilai-card-interactive" data-aos="fade-right" data-aos-delay="100">
          <h3 class="nilai-card-title text-lg-end text-start">{{ $safety->judul }}</h3>
          <p class="nilai-card-desc text-lg-end text-start">{{ $safety->deskripsi }}</p>
        </div>
        @endif

        <!-- Profesional -->
        @if($profesional)
        <div class="nilai-card-interactive" data-aos="fade-right" data-aos-delay="300">
          <h3 class="nilai-card-title text-lg-end text-start">{{ $profesional->judul }}</h3>
          <p class="nilai-card-desc text-lg-end text-start">{{ $profesional->deskripsi }}</p>
        </div>
        @endif
      </div>

      <!-- Center Column -->
      <div class="nilai-col nilai-col-center">
        @php
          $teamPhotoPath = 'frontend/img/nilai-tim.png';
          $teamPhotoExists = file_exists(public_path($teamPhotoPath));
        @endphp
        <div class="nilai-center-image-wrap" data-aos="zoom-in" data-aos-delay="200">
          @if($teamPhotoExists)
            <img src="{{ asset($teamPhotoPath) }}" alt="Tim K3 PT Berkarya Jasa Inspeksi" class="nilai-center-img">
          @else
            <div class="nilai-center-placeholder">
              <i class="bi bi-people-fill"></i>
              <span>Tim K3 BJI</span>
            </div>
          @endif
        </div>
      </div>

      <!-- Right Column -->
      <div class="nilai-col nilai-col-right">
        <!-- Integrity -->
        @if($integrity)
        <div class="nilai-card-interactive" data-aos="fade-left" data-aos-delay="100">
          <h3 class="nilai-card-title text-lg-start text-start">{{ $integrity->judul }}</h3>
          <p class="nilai-card-desc text-lg-start text-start">{{ $integrity->deskripsi }}</p>
        </div>
        @endif

        <!-- Sinergi -->
        @if($sinergi)
        <div class="nilai-card-interactive" data-aos="fade-left" data-aos-delay="300">
          <h3 class="nilai-card-title text-lg-start text-start">{{ $sinergi->judul }}</h3>
          <p class="nilai-card-desc text-lg-start text-start">{{ $sinergi->deskripsi }}</p>
        </div>
        @endif
      </div>
    </div>

    <!-- Mobile Stack Layout (for screens < 992px) -->
    <div class="d-block d-lg-none">
      <div class="row g-4 justify-content-center">
        <!-- Center Image on top for Mobile -->
        <div class="col-md-8 text-center mb-4">
          @php
            $teamPhotoPath = 'frontend/img/nilai-tim.png';
            $teamPhotoExists = file_exists(public_path($teamPhotoPath));
          @endphp
          <div class="nilai-center-image-wrap-mobile" data-aos="zoom-in">
            @if($teamPhotoExists)
              <img src="{{ asset($teamPhotoPath) }}" alt="Tim K3 PT Berkarya Jasa Inspeksi" class="img-fluid rounded-4 shadow-sm" style="max-width: 450px;">
            @else
              <div class="nilai-center-placeholder-mobile py-5">
                <i class="bi bi-people-fill fs-1"></i>
                <div>Tim K3 BJI</div>
              </div>
            @endif
          </div>
        </div>
        
        <!-- Cards List for Mobile -->
        <div class="col-12">
          <div class="row g-3">
            @foreach($nilaiPerusahaans as $index => $nilai)
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                <div class="nilai-mobile-card p-4">
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="nilai-mobile-icon">
                      <i class="bi {{ $nilai->icon }}"></i>
                    </div>
                    <h4 class="nilai-mobile-title mb-0">{{ $nilai->judul }}</h4>
                  </div>
                  <p class="nilai-mobile-desc mb-0">{{ $nilai->deskripsi }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif



<!-- ═══════════════════════════════════════════════
     TESTIMONIAL
 ═══════════════════════════════════════════════ -->
<section class="section-bg-white" id="testimoni">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Testimoni</div>
      <h2 class="section-title">Apa Kata <em>Pelanggan</em> Kami</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Kepercayaan dan kepuasan pelanggan adalah prioritas utama kami dalam setiap transaksi.
      </p>
    </div>

    <div class="row g-4">
      @if(isset($testimonials) && $testimonials->count() > 0)
        @foreach($testimonials as $index => $testi)
          <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
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
                <div class="author-avatar">
                  {{ strtoupper(substr($testi->nama, 0, 2)) }}
                </div>
                <div>
                  <div class="author-name">{{ $testi->nama }}</div>
                  <div class="author-role">{{ $testi->pekerjaan }}</div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="100">
          <div class="testimonial-card">
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p class="testimonial-text">"Pelayanan Riksa Uji K3 sangat profesional dan cepat. Sertifikasi dari Kemnaker diterbitkan tepat waktu sesuai dengan regulasi yang berlaku. Kerja sama yang luar biasa!"</p>
            <div class="testimonial-author">
              <div class="author-avatar">BN</div>
              <div>
                <div class="author-name">Budi Nugraha</div>
                <div class="author-role">HSE Manager, PT Manufaktur Agung</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="200">
          <div class="testimonial-card">
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p class="testimonial-text">"Sangat puas dengan layanan kalibrasi alat ukur dari BJI. Hasilnya sangat detail, laporannya akurat, dan tim teknisnya berlisensi resmi serta sangat berkompeten."</p>
            <div class="testimonial-author">
              <div class="author-avatar">SR</div>
              <div>
                <div class="author-name">Sari Rahayu</div>
                <div class="author-role">Direktur Operasional, PT Konstruksi Perkasa</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="300">
          <div class="testimonial-card">
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
            </div>
            <p class="testimonial-text">"Respons tim BJI sangat cepat saat kami membutuhkan riksa uji tangki timbun darurat. Penjelasannya edukatif dan sangat membantu pemenuhan standar K3 kami."</p>
            <div class="testimonial-author">
              <div class="author-avatar">DH</div>
              <div>
                <div class="author-name">Dimas Harianto</div>
                <div class="author-role">HSE Officer, Jakarta</div>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>

    {{-- CTA Button to Testimonial Form Page --}}
    <div class="text-center mt-5" data-aos="fade-up">
      <a href="{{ route('homepage.testimoni') }}#form-testimoni" class="btn-primary-hero" style="display:inline-flex;">
        <i class="bi bi-chat-left-heart-fill"></i>
        Tulis Testimoni Anda
      </a>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     FAQ
═══════════════════════════════════════════════ -->
<section class="section-bg-sand tech-grid-pattern" id="faq">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-xl-5" data-aos="fade-right">
        <div class="section-label">FAQ</div>
        <h2 class="section-title">Pertanyaan yang <em>Sering Ditanyakan</em></h2>
        <div class="divider-line"></div>
        <p class="section-desc mb-4">
          Tidak menemukan jawaban yang Anda cari? Tim kami siap membantu.
        </p>
        <a href="#kontak" class="btn-primary-hero" style="display:inline-flex;">
          <i class="bi bi-chat-right-dots"></i>
          Tanya Langsung
        </a>
      </div>

      <div class="col-xl-7" data-aos="fade-left">
        <div class="faq-item open" id="faq1">
          <div class="faq-question" onclick="toggleFaq('faq1')">
            <span>Apa saja jenis Riksa Uji yang dilayani BJI?</span>
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
          </div>
          <div class="faq-answer">
            Kami melayani 6 kategori Riksa Uji: K3 umum, Pesawat Angkat & Angkut, Pesawat Tenaga Produksi, Bejana Tekan & Tangki Timbun (termasuk Ketel Uap), Instalasi Listrik & Penyalur Petir, serta Instalasi Proteksi Kebakaran — seluruhnya sesuai Permenaker yang berlaku.
          </div>
        </div>

        <div class="faq-item" id="faq2">
          <div class="faq-question" onclick="toggleFaq('faq2')">
            <span>Apakah hasil Riksa Uji BJI diakui secara hukum?</span>
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
          </div>
          <div class="faq-answer">
            Ya. Seluruh proses pemeriksaan dan pengujian kami dilakukan sesuai standar Permenaker yang berlaku dan hasilnya diterbitkan oleh tenaga ahli K3 yang kompeten.
          </div>
        </div>

        <div class="faq-item" id="faq3">
          <div class="faq-question" onclick="toggleFaq('faq3')">
            <span>Apa itu metode Non Destructive Test (NDT)?</span>
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
          </div>
          <div class="faq-answer">
            NDT adalah metode pengujian peralatan tanpa merusak material, digunakan saat pemeriksaan pertama kali pemakaian atau instalasi alat baru, untuk memastikan kelayakan tanpa mengurangi umur pakai alat.
          </div>
        </div>

        <div class="faq-item" id="faq4">
          <div class="faq-question" onclick="toggleFaq('faq4')">
            <span>Apakah BJI melayani konsultasi sebelum Riksa Uji?</span>
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
          </div>
          <div class="faq-answer">
            Ya, tim ahli K3 kami siap memberikan konsultasi gratis untuk membantu menentukan jenis pemeriksaan yang sesuai dengan kebutuhan peralatan dan instalasi Anda.
          </div>
        </div>

        <div class="faq-item" id="faq5">
          <div class="faq-question" onclick="toggleFaq('faq5')">
            <span>Berapa lama proses hingga laporan hasil selesai?</span>
            <div class="faq-icon"><i class="bi bi-plus"></i></div>
          </div>
          <div class="faq-answer">
            Durasi bervariasi tergantung jenis dan skala peralatan, namun kami berkomitmen menyusun laporan akhir pemeriksaan lengkap beserta kesimpulan dan saran secara tepat waktu.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     CTA SECTION
═══════════════════════════════════════════════ -->
<div class="cta-section" id="kontak">
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center g-5">
      <div class="col-xl-7" data-aos="fade-right">
        <div class="section-label" style="color: var(--clay);">Mulai Sekarang</div>
        <h2 class="cta-title">Siap Memastikan<br><em>Keselamatan Kerja</em> Anda?</h2>
        <p class="cta-desc">
          Konsultasikan kebutuhan Riksa Uji, kalibrasi, dan sertifikasi peralatan Anda dengan tim ahli K3 kami.
          Konsultasi gratis, proses cepat, dan hasil sesuai standar Permenaker!
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="https://wa.me/{{ $cleanWa ?? '6282280312127' }}" class="btn-primary-hero" target="_blank">
            <i class="bi bi-whatsapp"></i>
            Chat WhatsApp Sekarang
          </a>
          <a href="https://wa.me/{{ $cleanWa ?? '6282280312127' }}" class="btn-outline-hero" target="_blank">
            <i class="bi bi-telephone"></i>
            {{ $contact->no_wa ?? '0822-8031-2127' }}
          </a>
        </div>
      </div>
      <div class="col-xl-5" data-aos="fade-left">
        <!-- Contact Info Cards -->
        <div class="d-flex flex-column gap-3">
          <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:20px 24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; background:rgba(228,3,46,0.3); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <i class="bi bi-geo-alt-fill" style="font-size:20px; color:var(--clay);"></i>
            </div>
            <div>
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:700; color:white; margin-bottom:4px;">Alamat</div>
              <div style="font-size:13px; color:rgba(255,255,255,0.5);">{{ $contact->alamat ?? 'Jl. Tiban Koperasi Blok D No. 57, Tiban Indah, Sekupang, Kepulauan Riau' }}</div>
            </div>
          </div>
          <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:20px 24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; background:rgba(228,3,46,0.3); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <i class="bi bi-envelope-fill" style="font-size:20px; color:var(--clay);"></i>
            </div>
            <div>
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:700; color:white; margin-bottom:4px;">Email</div>
              <div style="font-size:13px; color:rgba(255,255,255,0.5);">{{ $contact->email ?? 'berkaryajasainspeksi@gmail.com' }}</div>
            </div>
          </div>
          <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:20px 24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; background:rgba(228,3,46,0.3); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <i class="bi bi-clock-fill" style="font-size:20px; color:var(--clay);"></i>
            </div>
            <div>
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:700; color:white; margin-bottom:4px;">Jam Operasional</div>
              <div style="font-size:13px; color:rgba(255,255,255,0.5);">Senin – Sabtu: 08.00 – 17.00 WIB</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
