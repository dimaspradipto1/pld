@extends('layouts.frontend.template')

@section('title', 'Layanan Riksa Uji, Kalibrasi & Sertifikasi K3 — PT Berkarya Jasa Inspeksi')
@section('meta_description', 'Layanan Riksa Uji K3, kalibrasi, dan sertifikasi teknis oleh PT Berkarya Jasa Inspeksi (BJI): pesawat angkat & angkut, pesawat tenaga produksi, bejana tekan, instalasi listrik, penyalur petir, hingga proteksi kebakaran.')
@section('meta_keywords', 'riksa uji k3, kalibrasi, sertifikasi teknis, PJK3, pesawat angkat angkut, bejana tekan, instalasi listrik, proteksi kebakaran')

@section('content')

<!-- ═══════════════════════════════════════════════
     HERO BANNER
     ═══════════════════════════════════════════════ -->
<div class="layanan-hero">
  <div class="layanan-hero-bg"></div>
  <div class="layanan-hero-overlay"></div>
  <div class="layanan-hero-pattern"></div>

  <div class="container">
    <div class="layanan-hero-content" data-aos="fade-up" data-aos-duration="800">
      <h1 class="layanan-hero-title">
        Layanan <em>Riksa Uji</em> Kami
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}">Beranda</a>
        <span class="sep">/</span>
        <span class="active">Layanan</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     LAYANAN LIST
     ═══════════════════════════════════════════════ -->
<section class="section-bg-white">
  <div class="container">

    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Jasa Layanan</div>
      <h2 class="section-title">Riksa Uji, Kalibrasi & <em>Sertifikasi Teknis</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Kami memastikan peralatan kerja Anda sesuai standar Keselamatan dan Kesehatan Kerja (K3)
        yang berlaku sesuai peraturan perundang-undangan.
      </p>
    </div>

    <div class="row g-4">
      @forelse($layanans as $layanan)
        @php
          $rincianItems = $layanan->rincian
            ? array_filter(array_map('trim', explode("\n", $layanan->rincian)))
            : [];
        @endphp
        <div class="col-lg-6" data-aos="fade-up">
          <div class="layanan-card">
            <div class="layanan-card-head">
              <div class="layanan-card-icon"><i class="bi {{ $layanan->icon }}"></i></div>
              <div>
                <h3 class="layanan-card-title">{{ $layanan->judul }}</h3>
                @if($layanan->dasar_hukum)
                  <span class="layanan-card-badge">{{ $layanan->dasar_hukum }}</span>
                @endif
              </div>
            </div>
            <p class="layanan-card-desc">{{ $layanan->deskripsi }}</p>
            @if(count($rincianItems))
              <ul class="layanan-card-list">
                @foreach(array_slice($rincianItems, 0, 3) as $item)
                  <li><i class="bi bi-check-circle-fill"></i> {{ $item }}</li>
                @endforeach
                @if(count($rincianItems) > 3)
                  <li class="layanan-more-hint"><i class="bi bi-three-dots"></i> dan {{ count($rincianItems) - 3 }} item lainnya</li>
                @endif
              </ul>
            @endif
            <a href="{{ route('homepage.layanan.detail', $layanan->id) }}" class="layanan-detail-btn mt-3">
              Lihat Detail Layanan <i class="bi bi-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <div class="text-muted fs-5">
            <i class="bi bi-inbox-fill d-block fs-1 mb-3" style="opacity: 0.5;"></i>
            Belum ada layanan yang ditambahkan.
          </div>
        </div>
      @endforelse
    </div>

  </div>
</section>
@endsection

@push('styles')
<style>
  .layanan-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 28px;
    height: 100%;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 20px rgba(13,27,61,0.04);
  }
  .layanan-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(228,3,46,0.10);
    border-color: rgba(228,3,46,0.25);
  }
  .layanan-card-head {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 16px;
  }
  .layanan-card-icon {
    width: 56px;
    height: 56px;
    flex-shrink: 0;
    border-radius: 14px;
    background: linear-gradient(135deg, var(--terracotta), var(--terracotta-lt));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 26px;
    box-shadow: 0 4px 12px rgba(228,3,46,0.25);
  }
  .layanan-card-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 18px;
    font-weight: 800;
    color: var(--charcoal);
    line-height: 1.3;
    margin-bottom: 6px;
  }
  .layanan-card-badge {
    display: inline-block;
    font-size: 11px;
    font-weight: 700;
    color: var(--clay);
    background: rgba(79,168,232,0.1);
    padding: 3px 10px;
    border-radius: 50px;
  }
  .layanan-card-desc {
    font-size: 14px;
    color: var(--muted);
    line-height: 1.7;
    margin-bottom: 14px;
  }
  .layanan-card-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
    border-top: 1px dashed var(--border);
    padding-top: 14px;
  }
  .layanan-card-list li {
    font-size: 13.5px;
    color: var(--charcoal);
    display: flex;
    align-items: flex-start;
    gap: 8px;
  }
  .layanan-card-list li i {
    color: var(--terracotta);
    margin-top: 3px;
    flex-shrink: 0;
  }
  .layanan-more-hint {
    font-size: 12.5px;
    color: var(--concrete);
    font-style: italic;
  }
  .layanan-more-hint i { color: var(--concrete); }
  .layanan-detail-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13.5px;
    font-weight: 700;
    color: var(--terracotta);
    text-decoration: none;
    border: 1.5px solid var(--terracotta);
    border-radius: 8px;
    padding: 8px 18px;
    transition: all 0.2s;
  }
  .layanan-detail-btn:hover {
    background: var(--terracotta);
    color: white;
  }
</style>
@endpush
