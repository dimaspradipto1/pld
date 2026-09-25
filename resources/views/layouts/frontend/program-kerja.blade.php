@extends('layouts.frontend.template')

@section('title', 'Program Kerja — Pusat Layanan Disabilitas (PLD UIS)')
@section('meta_description', 'Program kerja strategis dan rencana operasional Pusat Layanan Disabilitas Universitas Ibnu Sina dalam mewujudkan kampus yang inklusif, adaptif, dan berkeadilan.')
@section('meta_keywords', 'program kerja pld, kegiatan pld uis, kampus inklusif, pendampingan disabilitas')


@section('content')
<!-- Hero Section -->
<section class="program-hero">
  <div class="container text-center">
    <h1 class="program-hero-title">Program Kerja <em>PLD UIS</em></h1>
    <p class="text-white-50 max-w-600 mx-auto mb-3" style="max-width: 650px;">
      Inisiatif strategis dan agenda aksi Pusat Layanan Disabilitas dalam mewujudkan ekosistem pendidikan tinggi yang aksesibel, ramah, dan inklusif.
    </p>
    <nav class="breadcrumb-custom">
      <a href="{{ route('homepage') }}"><i class="bi bi-house-door-fill"></i> Beranda</a>
      <span>/</span>
      <span class="text-white-50">Profil</span>
      <span>/</span>
      <span class="active">Program Kerja</span>
    </nav>
  </div>
</section>

<!-- Content Section -->
<section class="py-5" style="background: var(--page-bg);">
  <div class="container">
    
    <!-- Filter Kategori -->
    <div class="d-flex flex-wrap gap-2 justify-content-center mb-5">
      <a href="{{ route('homepage.program-kerja') }}" class="cat-pill-btn {{ empty($selectedCat) ? 'active' : '' }}">
        <i class="bi bi-grid-fill me-1"></i> Semua Program ({{ $totalPrograms }})
      </a>
      @foreach($categories as $cat)
        <a href="{{ route('homepage.program-kerja', ['kategori' => $cat]) }}" class="cat-pill-btn {{ $selectedCat == $cat ? 'active' : '' }}">
          {{ $cat }}
        </a>
      @endforeach
    </div>

    <!-- Grid Program Kerja -->
    <div class="row g-4">
      @forelse($programKerjas as $pk)
        <div class="col-lg-6 col-xl-4">
          <div class="program-card">
            <div class="d-flex justify-content-between align-items-start gap-2 mb-3">
              <span class="program-cat-badge">{{ $pk->kategori }}</span>
              @if($pk->status === 'Terlaksana')
                <span class="program-status-badge status-terlaksana"><i class="bi bi-check-circle-fill me-1"></i>Terlaksana</span>
              @elseif($pk->status === 'Sedang Berjalan')
                <span class="program-status-badge status-berjalan"><i class="bi bi-arrow-repeat me-1"></i>Sedang Berjalan</span>
              @else
                <span class="program-status-badge status-direncanakan"><i class="bi bi-calendar-event me-1"></i>Direncanakan</span>
              @endif
            </div>

            <h3 class="h5 fw-bold text-dark mb-2" style="line-height: 1.4;">{{ $pk->judul }}</h3>
            
            <p class="text-secondary small mb-4 flex-grow-1" style="line-height: 1.6;">
              {{ trim(strip_tags(html_entity_decode($pk->deskripsi))) }}
            </p>

            <div class="pt-3 border-top mt-auto">
              @if($pk->sasaran)
                <div class="program-meta-item">
                  <i class="bi bi-people-fill"></i>
                  <span><strong>Sasaran:</strong> {{ $pk->sasaran }}</span>
                </div>
              @endif
              @if($pk->target_waktu)
                <div class="program-meta-item">
                  <i class="bi bi-clock-history"></i>
                  <span><strong>Jadwal:</strong> {{ $pk->target_waktu }}</span>
                </div>
              @endif
              @if($pk->penanggung_jawab)
                <div class="program-meta-item">
                  <i class="bi bi-person-badge"></i>
                  <span><strong>PIC:</strong> {{ $pk->penanggung_jawab }}</span>
                </div>
              @endif
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <i class="bi bi-folder2-open text-muted" style="font-size: 52px;"></i>
          <h5 class="fw-bold mt-3 text-secondary">Belum ada program kerja pada kategori ini.</h5>
          <a href="{{ route('homepage.program-kerja') }}" class="btn btn-primary mt-2">Lihat Semua Program</a>
        </div>
      @endforelse
    </div>

    <!-- Pagination -->
    @if($programKerjas->hasPages())
      <div class="d-flex justify-content-center mt-5">
        {{ $programKerjas->links() }}
      </div>
    @endif

  </div>
</section>
@endsection
