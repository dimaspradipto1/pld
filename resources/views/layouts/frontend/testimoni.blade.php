@extends('layouts.frontend.template')

@section('title', 'Testimoni Civitas & Alumni — Fakultas Ilmu Kesehatan (FIKES)')
@section('meta_description', 'Baca ulasan dan pengalaman langsung dari mahasiswa, alumni, dan mitra rumah sakit yang telah bekerjasama dengan Fakultas Ilmu Kesehatan (FIKES).')
@section('meta_keywords', 'testimoni fikes, ulasan mahasiswa fikes, review alumni kesehatan, testimoni fakultas ilmu kesehatan')

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
<div class="about-hero" style="background: var(--obsidian-dark); padding: 70px 0 50px; border-bottom: 2px solid var(--fikes-purple);">
  <div class="container">
    <div class="about-hero-content" data-aos="fade-up" data-aos-duration="800">
      <h1 style="font-size: 38px; font-weight: 800; color: var(--white); margin-bottom: 8px;">
        Testimoni <em style="font-style: normal; color: var(--fikes-orange);">Civitas & Alumni</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}"><i class="bi bi-house-fill me-1"></i>Beranda</a>
        <span class="mx-2 text-white-50">/</span>
        <span style="color: var(--fikes-orange); font-weight: 600;">Testimoni</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     TESTIMONIAL SECTION
═══════════════════════════════════════════════ -->
<section class="section-bg-white">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="section-label mx-auto">Ulasan Pengguna</div>
      <h2 class="section-title">Pengalaman Nyata di <em>FIKES</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto mb-4">
        Cerita dan pengalaman berharga dari mahasiswa, dosen, alumni, serta mitra institusi kesehatan yang telah berkolaborasi dengan Fakultas Ilmu Kesehatan.
      </p>
    </div>

    <!-- Review Grid -->
    <div class="row g-4 mb-5">
      @forelse($testimonials as $index => $testi)
        @php
          $initials = '';
          $words = explode(' ', $testi->nama);
          foreach ($words as $w) {
              $initials .= strtoupper(substr($w, 0, 1));
          }
          $initials = substr($initials, 0, 2);
        @endphp
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ (($index % 3) + 1) * 100 }}">
          <div class="testi-card">
            <div>
              <div class="testi-stars">
                @for($i = 1; $i <= 5; $i++)
                  <i class="bi bi-star{{ $i <= $testi->bintang ? '-fill' : '' }}"></i>
                @endfor
              </div>
              <p class="testi-text">"{{ $testi->pesan }}"</p>
            </div>
            <div class="testi-author">
              <div class="testi-avatar">{{ $initials }}</div>
              <div>
                <div class="testi-name">{{ $testi->nama }}</div>
                <div class="testi-role">{{ $testi->pekerjaan ?? $testi->kategori ?? 'Civitas FIKES' }}</div>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <p class="text-muted">Belum ada testimoni terpublikasi.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     FORM KIRIM TESTIMONI
═══════════════════════════════════════════════ -->
<section class="section-bg-sand">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8" data-aos="fade-up">
        <div class="card border-0 shadow-lg p-4 p-md-5" style="border-radius: 24px; background: var(--white); border: 1px solid var(--border-light) !important;">
          <div class="text-center mb-4">
            <div class="section-label mx-auto">Formulir Ulasan</div>
            <h3 class="fw-bold mb-2">Bagikan Pengalaman Anda di FIKES</h3>
            <p class="text-muted small">Ulasan Anda sangat berarti untuk kemajuan mutu pendidikan dan pelayanan FIKES.</p>
          </div>

          @if(session('success'))
            <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
              <i class="bi bi-check-circle-fill me-2 fs-5"></i>
              <div>{{ session('success') }}</div>
            </div>
          @endif

          <form action="{{ route('homepage.testimoni.store') }}" method="POST">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Anda" value="{{ old('nama') }}" required>
                @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-6">
                <label class="form-label fw-semibold">Profesi / Status</label>
                <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" placeholder="Contoh: Mahasiswa / Alumni / Perawat" value="{{ old('pekerjaan') }}" required>
                @error('pekerjaan')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-6">
                <label class="form-label fw-semibold">Kategori Civitas</label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                  <option value="" disabled selected>Pilih Kategori</option>
                  <option value="Mahasiswa" {{ old('kategori') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                  <option value="Alumni" {{ old('kategori') == 'Alumni' ? 'selected' : '' }}>Alumni</option>
                  <option value="Dosen & Staff" {{ old('kategori') == 'Dosen & Staff' ? 'selected' : '' }}>Dosen & Staff</option>
                  <option value="Mitra Rumah Sakit" {{ old('kategori') == 'Mitra Rumah Sakit' ? 'selected' : '' }}>Mitra Rumah Sakit / Instansi</option>
                  <option value="Masyarakat Umum" {{ old('kategori') == 'Masyarakat Umum' ? 'selected' : '' }}>Masyarakat Umum</option>
                </select>
                @error('kategori')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-6">
                <label class="form-label fw-semibold">Rating (1 - 5 Bintang)</label>
                <select name="bintang" class="form-select @error('bintang') is-invalid @enderror" required>
                  <option value="5" {{ old('bintang', 5) == 5 ? 'selected' : '' }}>★★★★★ (5 Bintang - Sangat Puas)</option>
                  <option value="4" {{ old('bintang') == 4 ? 'selected' : '' }}>★★★★☆ (4 Bintang - Puas)</option>
                  <option value="3" {{ old('bintang') == 3 ? 'selected' : '' }}>★★★☆☆ (3 Bintang - Cukup)</option>
                  <option value="2" {{ old('bintang') == 2 ? 'selected' : '' }}>★★☆☆☆ (2 Bintang - Kurang)</option>
                  <option value="1" {{ old('bintang') == 1 ? 'selected' : '' }}>★☆☆☆☆ (1 Bintang - Sangat Kurang)</option>
                </select>
                @error('bintang')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <label class="form-label fw-semibold">Pesan / Ulasan Anda</label>
                <textarea name="pesan" rows="4" class="form-control @error('pesan') is-invalid @enderror" placeholder="Tuliskan pengalaman Anda secara jujur dan objektif..." required>{{ old('pesan') }}</textarea>
                @error('pesan')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn-primary-hero px-5 py-3" style="cursor: pointer;">
                  <i class="bi bi-send-fill me-2"></i> Kirim Ulasan
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
