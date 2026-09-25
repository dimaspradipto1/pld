@extends('layouts.frontend.template')

@section('title', 'Sejarah & Milestone — Pelayanan Disabilitas (PLD UIS)')
@section('meta_description', 'Sejarah perjalanan, pendirian, dan tonggak sejarah milestone Pelayanan Disabilitas Universitas Ibnu Sina.')
@section('meta_keywords', 'sejarah pld, milestone pld uis, pendirian pelayanan disabilitas')


@section('content')

<!-- ═══════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════ -->
<div class="sejarah-hero">
  <div class="container">
    <div data-aos="fade-up">
      <h1 class="sejarah-hero-title">
        Sejarah & <em>Milestone</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}"><i class="bi bi-house-fill me-1"></i>Beranda</a>
        <span>/</span>
        <a href="{{ route('homepage.tentang') }}">Profil</a>
        <span>/</span>
        <span class="active">Sejarah & Milestone</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     SEJARAH NARASI SECTION
═══════════════════════════════════════════════ -->
<section class="section-bg-white py-5">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6" data-aos="fade-right">
        <div class="section-label">Jejak Langkah PLD UIS</div>
        <h2 class="section-title">Perjalanan Berkelanjutan <em>Mewujudkan Kampus Inklusif</em></h2>
        <div class="divider-line"></div>
        <div class="section-desc" style="text-align: justify; line-height: 1.8; color: #4a5568;">
          <p>
            Pusat Layanan Disabilitas (PLD) Universitas Ibnu Sina didirikan sebagai unit kelembagaan strategis yang berfokus memberikan pendampingan akademik, advokasi, fasilitasi akomodasi yang layak, serta layanan psikologis bagi sivitas akademika berkebutuhan khusus.
          </p>
          <p>
            Berlandaskan amanat Undang-Undang No. 8 Tahun 2016 tentang Penyandang Disabilitas dan Permenristekdikti No. 46 Tahun 2017 tentang Pendidikan Khusus dan Pendidikan Layanan Khusus di Perguruan Tinggi, PLD UIS berkomitmen menghadirkan iklim kampus yang ramah, aksesibel, dan berkesetaraan tanpa diskriminasi.
          </p>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left">
        <div class="p-4 rounded-4 text-white" style="background: linear-gradient(135deg, #1b2b13 0%, #375326 100%); border: 2px solid var(--pld-purple);">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="p-3 rounded-3" style="background: var(--pld-orange); color: #ffffff;">
              <i class="bi bi-hourglass-split fs-2"></i>
            </div>
            <div>
              <h5 class="fw-bold text-white mb-0">Komitmen Pendidikan Inklusif Terpadu</h5>
              <div class="text-white-50 small">Aksesibilitas, Kesetaraan &amp; Kemandirian</div>
            </div>
          </div>
          <p class="text-white-50 small mb-0" style="line-height: 1.8;">
            Setiap fase perkembangan PLD UIS diarahkan untuk memperkuat mutu pendampingan belajar, penyediaan teknologi asistif, pelatihan juru bahasa isyarat, serta membangun budaya empati civitas akademika UIS.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     TIMELINE MILESTONES
═══════════════════════════════════════════════ -->
<section class="section-bg-sand py-5">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Linimasa Perkembangan</div>
      <h2 class="section-title">Milestone &amp; <em>Tonggak Sejarah</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Catatan pencapaian dan peristiwa penting dalam perjalanan Pusat Layanan Disabilitas UIS.
      </p>
    </div>

    @if(isset($milestones) && $milestones->count() > 0)
      <div class="timeline-container">
        @foreach($milestones as $index => $m)
          <div class="timeline-item" data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
            <div class="timeline-badge">
              {{ $m->tahun ?: ($index + 1) }}
            </div>
            <div class="timeline-content">
              <span class="timeline-year-tag"><i class="bi bi-calendar-event me-1"></i> {{ $m->tahun }}</span>
              <h4 class="fw-bold text-dark mb-2">{{ $m->judul }}</h4>
              <p class="text-muted small mb-0" style="line-height: 1.7; text-align: justify;">
                {{ $m->deskripsi }}
              </p>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="p-5 text-center bg-white rounded-4 shadow-sm">
        <i class="bi bi-hourglass fs-1 text-muted mb-3 d-block"></i>
        <h5 class="fw-bold text-dark">Data Milestone Belum Tersedia</h5>
        <p class="text-muted small">Data linimasa sejarah dapat ditambahkan melalui panel admin di menu <strong>Sejarah & Milestone</strong>.</p>
      </div>
    @endif

  </div>
</section>

@endsection
