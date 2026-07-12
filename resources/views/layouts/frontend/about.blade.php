@extends('layouts.frontend.template')

@section('title', 'Tentang Kami — PT Berkarya Jasa Inspeksi (BJI)')
@section('meta_description', 'Kenali lebih dekat PT Berkarya Jasa Inspeksi (BJI), perusahaan jasa keselamatan dan kesehatan kerja (K3) — profil, visi misi, nilai perusahaan, dan struktur organisasi kami.')
@section('meta_keywords', 'tentang bji, profil perusahaan k3, visi misi k3, struktur organisasi, berkarya jasa inspeksi')

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
     ABOUT HERO BANNER — SIMPLE VERSION
═══════════════════════════════════════════════ -->
<div class="about-hero">
  <div class="about-hero-bg"></div>
  <div class="about-hero-overlay"></div>
  <div class="about-hero-pattern"></div>

  <div class="container">
    <div class="about-hero-content" data-aos="fade-up" data-aos-duration="800">
      <h1 class="about-hero-title">
        Tentang <em>Kami</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}"><i class="bi bi-house-fill me-1"></i>Beranda</a>
        <span class="sep">/</span>
        <span class="active">Tentang Kami</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     PROFIL & KISAH PERJALANAN
═══════════════════════════════════════════════ -->
<section class="section-bg-white">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6" data-aos="fade-right" data-aos-duration="800">
        <div class="about-visual">
          <div class="about-img-main">
            <span class="tech-corner tl"></span>
            <span class="tech-corner tr"></span>
            <span class="tech-corner bl"></span>
            <span class="tech-corner br"></span>
            <div class="tech-panel-content">
              <div class="tech-panel-icon"><i class="bi bi-shield-fill-check"></i></div>
              <div class="tech-panel-title">Standar K3 Nasional</div>
              <div class="tech-panel-sub">Permenaker &amp; Kemnaker Compliant</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left" data-aos-duration="800">
        <div class="section-label">Profil Perusahaan</div>
        <h2 class="section-title">{!! $about->judul_profil ?? 'Perusahaan Jasa <em>Keselamatan dan Kesehatan Kerja</em>' !!}</h2>
        <div class="divider-line"></div>
        <p class="section-desc mb-4" style="text-align: justify;">
          {{ $about->deskripsi_profil_1 ?? 'PT Berkarya Jasa Inspeksi adalah perusahaan jasa keselamatan dan kesehatan kerja. Bergerak di bidang pemeriksaan uji kelayakan peralatan, konsultasi, sertifikasi, kalibrasi, dan perpanjangan lisensi peralatan. Kegiatan kami adalah memastikan bahwa peralatan sudah benar dan sesuai dengan standar K3 yang berlaku sesuai dengan peraturan perundang-undangan.' }}
        </p>
        @if($about?->deskripsi_profil_2)
        <p class="section-desc mb-4" style="text-align: justify;">
          {{ $about->deskripsi_profil_2 }}
        </p>
        @endif
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     VISI & MISI
═══════════════════════════════════════════════ -->
<section class="section-bg-sand tech-grid-pattern">
  <div class="container">
    <div class="row g-4 justify-content-center">
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="value-card" style="height: 100%;">
          <div class="value-icon-wrap">
            <i class="bi {{ $about->visi_icon ?? 'bi-eye' }}"></i>
          </div>
          <div class="value-title" style="font-size:22px;">{{ $about->visi_judul ?? 'Visi Kami' }}</div>
          @php $visiPoin = $visiMisis['visi'] ?? collect(); @endphp
          @if($visiPoin->count())
            @foreach($visiPoin as $v)
              <p class="value-desc" style="font-size:15px; line-height:1.8; text-align: justify;">
                {{ $v->isi }}
              </p>
            @endforeach
          @else
            <p class="value-desc" style="font-size:15px; line-height:1.8; text-align: justify;">
              Menjadi mitra bisnis terpercaya untuk layanan inspeksi, pengujian, dan sertifikasi di bidang keselamatan dan kesehatan kerja.
            </p>
          @endif
        </div>
      </div>

      <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="value-card" style="height: 100%;">
          <div class="value-icon-wrap">
            <i class="bi {{ $about->misi_icon ?? 'bi-rocket-takeoff' }}"></i>
          </div>
          <div class="value-title" style="font-size:22px;">{{ $about->misi_judul ?? 'Misi Kami' }}</div>
          @php
            $misiPoin = ($visiMisis['misi'] ?? collect())->pluck('isi');
            if ($misiPoin->isEmpty()) {
              $misiPoin = collect([
                'Meningkatkan kualitas SDM di bidang K3.',
                'Meningkatkan pengujian, pelayanan teknis, dan informasi di bidang K3.',
                'Meningkatkan kualitas pelaksanaan, pembinaan, dan pengawasan Keselamatan dan Kesehatan Kerja dalam mewujudkan upaya kinerja K3 yang optimal.',
                'Menjadi mitra terpercaya bagi klien dan instansi pemerintahan untuk meningkatkan efisiensi dan produktivitas.',
              ]);
            }
          @endphp
          <ul class="value-desc" style="font-size:14.5px; line-height:1.75; padding-left: 20px; text-align: justify; margin: 0;">
            @foreach($misiPoin as $poin)
              <li class="mb-2">{{ $poin }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     NILAI-NILAI UTAMA
═══════════════════════════════════════════════ -->
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
      <h2 class="nilai-title-text">{{ $about->judul_nilai ?? 'Nilai yang Kami' }} <span class="text-red">Pegang Teguh</span></h2>
      <div class="nilai-title-line"></div>
      @if(isset($about->deskripsi_nilai))
        <p class="section-desc mx-auto mt-3" style="max-width: 700px; color: var(--muted); font-size: 15px;">
          {{ $about->deskripsi_nilai }}
        </p>
      @endif
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

<!-- ═══════════════════════════════════════════════
     STRUKTUR ORGANISASI
═══════════════════════════════════════════════ -->
@if(isset($struktur) && $struktur->url_struktur)
<section class="section-bg-sand">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Struktur Organisasi</div>
      <h2 class="section-title">Susunan <em>Organisasi</em> Kami</h2>
      <div class="divider-line centered"></div>
    </div>

    <div class="text-center" data-aos="zoom-in" data-aos-delay="100">
      <div class="struktur-img-wrap p-3 bg-white rounded-4 shadow-sm d-inline-block">
        <img src="{{ asset($struktur->url_struktur) }}" alt="Struktur Organisasi PT Berkarya Jasa Inspeksi" class="img-fluid rounded-3" style="max-height: 600px;">
      </div>
    </div>
  </div>
</section>
@endif

<!-- ═══════════════════════════════════════════════
     TIMELINE PERJALANAN
═══════════════════════════════════════════════ -->
<section class="section-bg-cream tech-grid-pattern">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Milestone</div>
      <h2 class="section-title">Perjalanan & <em>Perkembangan</em> Kami</h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Jejak langkah kami dalam menghadirkan layanan Riksa Uji, kalibrasi, dan sertifikasi K3 terpercaya.
      </p>
    </div>

    <div class="timeline">
      @forelse($milestones as $ms)
        @php $side = $loop->iteration % 2 === 1 ? 'left' : 'right'; @endphp
        <div class="timeline-container {{ $side }}" data-aos="{{ $side === 'left' ? 'fade-right' : 'fade-left' }}">
          <div class="timeline-content">
            <div class="timeline-year">{{ $ms->tahun }}</div>
            <div class="timeline-title">{{ $ms->judul }}</div>
            <p class="timeline-text">{{ $ms->deskripsi }}</p>
          </div>
        </div>
      @empty
        <p class="text-center text-muted">Belum ada data milestone.</p>
      @endforelse
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
        <h2 class="cta-title">Butuh Layanan<br><em>Riksa Uji K3</em> Terpercaya?</h2>
        <p class="cta-desc">
          Konsultasikan kebutuhan Riksa Uji, kalibrasi, dan sertifikasi peralatan Anda dengan tim ahli kami.
          Konsultasi gratis dan proses sesuai standar Permenaker!
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="https://wa.me/{{ $cleanWa ?? '6282280312127' }}" class="btn-primary-hero" target="_blank">
            <i class="bi bi-whatsapp"></i>
            Konsultasi WhatsApp
          </a>
          <a href="https://wa.me/{{ $cleanWa ?? '6282280312127' }}" class="btn-outline-hero" target="_blank">
            <i class="bi bi-telephone"></i>
            {{ $contact->no_wa ?? '0822-8031-2127' }}
          </a>
        </div>
      </div>
      <div class="col-xl-5" data-aos="fade-left">
        <div class="d-flex flex-column gap-3">
          <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:20px 24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; background:rgba(228,3,46,0.3); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <i class="bi bi-geo-alt-fill" style="font-size:20px; color:var(--clay);"></i>
            </div>
            <div>
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:700; color:white; margin-bottom:4px;">Kantor Utama</div>
              <div style="font-size:13px; color:rgba(255,255,255,0.5);">{{ $contact->alamat ?? 'Jl. Tiban Koperasi Blok D No. 57, Tiban Indah, Sekupang, Kepulauan Riau' }}</div>
            </div>
          </div>
          <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:20px 24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; background:rgba(228,3,46,0.3); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <i class="bi bi-envelope-fill" style="font-size:20px; color:var(--clay);"></i>
            </div>
            <div>
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:700; color:white; margin-bottom:4px;">Email Resmi</div>
              <div style="font-size:13px; color:rgba(255,255,255,0.5);">{{ $contact->email ?? 'berkaryajasainspeksi@gmail.com' }}</div>
            </div>
          </div>
          <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:20px 24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; background:rgba(228,3,46,0.3); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <i class="bi bi-clock-fill" style="font-size:20px; color:var(--clay);"></i>
            </div>
            <div>
              <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:700; color:white; margin-bottom:4px;">Jam Kerja</div>
              <div style="font-size:13px; color:rgba(255,255,255,0.5);">Senin – Sabtu: 08.00 – 17.00 WIB</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .nilai-team-visual {
    border-radius: 16px;
    overflow: hidden;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
  }
  .nilai-team-visual img {
    width: 100%;
    height: auto;
    display: block;
  }
  .nilai-team-placeholder {
    height: 260px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 12px;
    background:
      linear-gradient(rgba(255,255,255,0.05) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255,255,255,0.05) 1px, transparent 1px),
      var(--charcoal);
    background-size: 28px 28px, 28px 28px, auto;
    color: rgba(255,255,255,0.35);
  }
  .nilai-team-placeholder i { font-size: 48px; }
  .nilai-team-placeholder span {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
  }
  .struktur-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 18px 22px;
    text-align: center;
    min-width: 170px;
    box-shadow: 0 4px 16px rgba(13,27,61,0.05);
  }
  .struktur-icon {
    width: 44px;
    height: 44px;
    margin: 0 auto 10px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
    color: var(--white);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
  }
  .struktur-jabatan {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px;
    font-weight: 700;
    color: var(--charcoal);
  }
  .struktur-nama {
    font-size: 12px;
    color: var(--muted);
    margin-top: 2px;
  }
  .struktur-connector {
    width: 2px;
    height: 24px;
    background: var(--border);
  }
</style>
@endpush
