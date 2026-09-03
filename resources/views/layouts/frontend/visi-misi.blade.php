@extends('layouts.frontend.template')

@section('title', 'Visi & Misi — Pusat Layanan Disabilitas (PLD UIS)')
@section('meta_description', 'Visi, Misi, dan Nilai-nilai Budaya Civitas Akademika Pusat Layanan Disabilitas Universitas Ibnu Sina.')
@section('meta_keywords', 'visi misi pld, visi pld uis, misi pusat layanan disabilitas batam')

@push('styles')
<style>
  .visimisi-hero {
    position: relative;
    background: var(--obsidian-dark);
    padding: 70px 0 50px;
    border-bottom: 2px solid var(--pld-purple);
  }
  .visimisi-hero-title {
    font-size: 38px;
    font-weight: 800;
    color: var(--white);
    margin-bottom: 8px;
  }
  .visimisi-hero-title em {
    font-style: normal;
    color: var(--pld-orange);
  }
  .breadcrumb-custom {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 13.5px;
    color: rgba(255, 255, 255, 0.6);
  }
  .breadcrumb-custom a { color: rgba(255, 255, 255, 0.85); text-decoration: none; }
  .breadcrumb-custom a:hover { color: var(--pld-orange); }
  .breadcrumb-custom .active { color: var(--pld-orange); font-weight: 600; }
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
      <h2 class="section-title">Visi &amp; Misi <em>PLD UIS</em></h2>
      <p class="section-desc mx-auto" style="max-width: 650px;">
        Komitmen fundamental yang mengarahkan setiap langkah layanan, pendampingan, dan advokasi di Pusat Layanan Disabilitas Universitas Ibnu Sina.
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
              {{ $about->visi ?? 'Menjadi Pusat Layanan Disabilitas yang unggul, adaptif, dan berdaya saing nasional dalam mewujudkan ekosistem pendidikan tinggi inklusif berlandaskan nilai kemanusiaan, kesetaraan, dan integritas moral.' }}
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
                'Menyelenggarakan layanan pendampingan akademik, advokasi hak belajar, serta konseling psikososial yang profesional bagi mahasiswa disabilitas.',
                'Mengembangkan sarana aksesibilitas fisik, teknologi asistif digital, dan akomodasi kurikulum ramah disabilitas.',
                'Membangun budaya kampus inklusif melalui pelatihan Bahasa Isyarat Indonesia (BISINDO) dan penguatan relawan mahasiswa.',
                'Menjalin kemitraan kolaboratif dengan komunitas disabilitas, pegiat Intelek Tuli, dunia usaha, dan instansi pemerintah guna memperluas kesempatan karier alumni.',
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



@endsection
