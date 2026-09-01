@extends('layouts.frontend.template')

@section('title', 'Visi & Misi — Fakultas Ilmu Kesehatan (FIKES UIS)')
@section('meta_description', 'Visi, Misi, dan Nilai-nilai Budaya Civitas Akademika Fakultas Ilmu Kesehatan Universitas Ibnu Sina.')
@section('meta_keywords', 'visi misi fikes, visi fikes uis, misi fakultas ilmu kesehatan batam')

@push('styles')
<style>
  .visimisi-hero {
    position: relative;
    background: var(--obsidian-dark);
    padding: 70px 0 50px;
    border-bottom: 2px solid var(--fikes-purple);
  }
  .visimisi-hero-title {
    font-size: 38px;
    font-weight: 800;
    color: var(--white);
    margin-bottom: 8px;
  }
  .visimisi-hero-title em {
    font-style: normal;
    color: var(--fikes-orange);
  }
  .breadcrumb-custom {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 13.5px;
    color: rgba(255, 255, 255, 0.6);
  }
  .breadcrumb-custom a { color: rgba(255, 255, 255, 0.85); text-decoration: none; }
  .breadcrumb-custom a:hover { color: var(--fikes-orange); }
  .breadcrumb-custom .active { color: var(--fikes-orange); font-weight: 600; }
</style>
@endpush

@section('content')

<!-- ═══════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════ -->
<div class="visimisi-hero">
  <div class="container">
    <div data-aos="fade-up">
      <h1 class="visimisi-hero-title">
        Visi & <em>Misi</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}"><i class="bi bi-house-fill me-1"></i>Beranda</a>
        <span>/</span>
        <a href="{{ route('homepage.tentang') }}">Profil</a>
        <span>/</span>
        <span class="active">Visi & Misi</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     VISI & MISI CARDS
═══════════════════════════════════════════════ -->
<section class="section-bg-sand py-5">
  <div class="container py-3">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label">Arah & Landasan Institusi</div>
      <h2 class="section-title">Visi & Misi <em>FIKES UIS</em></h2>
      <p class="section-desc mx-auto" style="max-width: 650px;">
        Komitmen fundamental yang mengarahkan setiap langkah Tri Dharma Perguruan Tinggi di Fakultas Ilmu Kesehatan.
      </p>
    </div>

    <div class="row g-4 justify-content-center">
      {{-- Visi --}}
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="value-card h-100 p-4 p-md-5">
          <div class="value-icon-wrap mb-4">
            <i class="bi {{ $about->visi_icon ?? 'bi-eye' }}"></i>
          </div>
          <h3 class="value-title mb-3" style="font-size:24px;">{{ $about->visi_judul ?? 'Visi Kami' }}</h3>
          
          @php $visiPoin = $visiMisis['visi'] ?? collect(); @endphp
          @if($visiPoin->count())
            @foreach($visiPoin as $v)
              <p class="value-desc" style="font-size:15.5px; line-height:1.9; text-align: justify;">
                {{ $v->isi }}
              </p>
            @endforeach
          @else
            <p class="value-desc" style="font-size:15.5px; line-height:1.9; text-align: justify;">
              {{ $about->visi ?? 'Menjadi Fakultas Ilmu Kesehatan yang unggul, terkemuka, dan berdaya saing internasional dalam penyelenggaraan Tri Dharma Perguruan Tinggi di bidang ilmu kesehatan yang berlandaskan nilai integritas dan kemanusiaan.' }}
            </p>
          @endif
        </div>
      </div>

      {{-- Misi --}}
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="value-card h-100 p-4 p-md-5">
          <div class="value-icon-wrap mb-4">
            <i class="bi {{ $about->misi_icon ?? 'bi-rocket-takeoff' }}"></i>
          </div>
          <h3 class="value-title mb-3" style="font-size:24px;">{{ $about->misi_judul ?? 'Misi Kami' }}</h3>
          @php
            $misiPoin = ($visiMisis['misi'] ?? collect())->pluck('isi');
            if ($misiPoin->isEmpty()) {
              $misiPoin = collect([
                'Menyelenggarakan pendidikan akademik dan profesi kesehatan yang berkualitas dan berstandar nasional/internasional.',
                'Mengembangkan penelitian terapan dan inovatif di bidang ilmu kesehatan yang bermanfaat bagi masyarakat.',
                'Melaksanakan pengabdian kepada masyarakat secara berkelanjutan demi meningkatkan derajat kesehatan publik.',
                'Menjalin kerjasama strategis dengan institusi pelayanan kesehatan, rumah sakit, dan mitra global.',
              ]);
            }
          @endphp
          <ul class="value-desc" style="font-size:15px; line-height:1.8; padding-left: 20px; text-align: justify; margin: 0;">
            @foreach($misiPoin as $poin)
              <li class="mb-3">{{ $poin }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     NILAI BUDAYA CIVITAS
═══════════════════════════════════════════════ -->
<section class="section-bg-white py-5">
  <div class="container py-3">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label">Karakter & Etika</div>
      <h2 class="section-title">Nilai Budaya <em>Civitas FIKES</em></h2>
      <p class="section-desc mx-auto" style="max-width: 600px;">
        Prinsip utama yang membentuk kepribadian lulusan tenaga kesehatan yang unggul dan humanis.
      </p>
    </div>

    <div class="row g-4">
      @if(isset($nilaiPerusahaans) && $nilaiPerusahaans->count())
        @foreach($nilaiPerusahaans as $nilai)
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 80 }}">
            <div class="value-card text-center h-100 p-4">
              <div class="value-icon-wrap mx-auto mb-3">
                <i class="bi {{ $nilai->icon ?? 'bi-patch-check-fill' }}"></i>
              </div>
              <h5 class="fw-bold mb-2 text-dark">{{ $nilai->judul }}</h5>
              <p class="text-muted small mb-0" style="line-height: 1.7;">{{ $nilai->deskripsi }}</p>
            </div>
          </div>
        @endforeach
      @else
        <div class="col-md-6 col-lg-3" data-aos="fade-up">
          <div class="value-card text-center h-100 p-4">
            <div class="value-icon-wrap mx-auto mb-3"><i class="bi bi-shield-fill-check"></i></div>
            <h5 class="fw-bold mb-2 text-dark">Integritas</h5>
            <p class="text-muted small mb-0" style="line-height: 1.7;">Menjunjung tinggi etika profesi, moralitas luhur, dan kejujuran akademik.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
          <div class="value-card text-center h-100 p-4">
            <div class="value-icon-wrap mx-auto mb-3"><i class="bi bi-award-fill"></i></div>
            <h5 class="fw-bold mb-2 text-dark">Keunggulan</h5>
            <p class="text-muted small mb-0" style="line-height: 1.7;">Senantiasa meningkatkan standar mutu akademik demi mencetak lulusan terbaik.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
          <div class="value-card text-center h-100 p-4">
            <div class="value-icon-wrap mx-auto mb-3"><i class="bi bi-heart-fill"></i></div>
            <h5 class="fw-bold mb-2 text-dark">Humanis</h5>
            <p class="text-muted small mb-0" style="line-height: 1.7;">Mengedepankan rasa empati, kasih sayang, dan kepedulian tulus terhadap sesama.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
          <div class="value-card text-center h-100 p-4">
            <div class="value-icon-wrap mx-auto mb-3"><i class="bi bi-lightning-charge-fill"></i></div>
            <h5 class="fw-bold mb-2 text-dark">Inovatif</h5>
            <p class="text-muted small mb-0" style="line-height: 1.7;">Adaptif terhadap perkembangan sains dan teknologi kesehatan terkini.</p>
          </div>
        </div>
      @endif
    </div>
  </div>
</section>

@endsection
