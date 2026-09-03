@extends('layouts.frontend.template')

@section('title', 'Volunteer Relawan Inklusif — Pusat Layanan Disabilitas (PLD UIS)')
@section('meta_description', 'Pendaftaran relawan pendamping mahasiswa disabilitas Pusat Layanan Disabilitas Universitas Ibnu Sina. Mari bersama ciptakan lingkungan kampus ramah dan aksesibel.')
@section('meta_keywords', 'volunteer pld, relawan disabilitas uis, relawan kampus inklusif, pendaftaran volunteer')

@push('styles')
<style>
  .volunteer-hero {
    position: relative;
    background: var(--obsidian-dark);
    padding: 70px 0 50px;
    border-bottom: 2px solid var(--pld-purple);
  }
  .volunteer-hero-title {
    font-size: 38px;
    font-weight: 800;
    color: var(--white);
    margin-bottom: 8px;
  }
  .volunteer-hero-title em {
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

  .benefit-card {
    background: var(--white);
    border: 1px solid var(--border-light);
    border-radius: 12px;
    padding: 22px;
    height: 100%;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-sm);
  }
  .benefit-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
    border-color: var(--pld-orange);
  }
  .benefit-icon-box {
    width: 48px;
    height: 48px;
    border-radius: 10px;
    background: var(--pld-purple-light);
    color: var(--pld-purple);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    margin-bottom: 14px;
  }
  .form-register-card {
    background: var(--white);
    border: 1.5px solid var(--border-purple);
    border-radius: 16px;
    padding: 32px;
    box-shadow: var(--shadow-md);
  }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="volunteer-hero">
  <div class="container text-center">
    <h1 class="volunteer-hero-title">Program Volunteer <em>Relawan Inklusif</em></h1>
    <p class="text-white-50 mx-auto mb-3" style="max-width: 650px;">
      Jadilah bagian dari agen perubahan untuk menciptakan ruang belajar yang setara, nyaman, dan ramah bagi mahasiswa berkebutuhan khusus di Universitas Ibnu Sina.
    </p>
    <nav class="breadcrumb-custom">
      <a href="{{ route('homepage') }}"><i class="bi bi-house-door-fill"></i> Beranda</a>
      <span>/</span>
      <span class="text-white-50">Layanan</span>
      <span>/</span>
      <span class="active">Volunteer</span>
    </nav>
  </div>
</section>

<!-- Overview & Manfaat -->
<section class="py-5" style="background: var(--page-bg);">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="badge px-3 py-2 rounded-pill mb-2" style="background: var(--pld-purple-light); color: var(--pld-purple); font-weight: 700;">
        <i class="bi bi-heart-fill text-danger me-1"></i> Mengapa Bergabung Bersama Kami?
      </span>
      <h2 class="fw-bold text-dark">Peran Mulia Bersama PLD UIS</h2>
      <p class="text-muted">
        Relawan PLD adalah sahabat belajar yang mendampingi mahasiswa disabilitas dalam aktivitas akademik dan kehidupan kampus sehari-hari.
      </p>
    </div>

    <!-- 4 Manfaat Cards -->
    <div class="row g-4 mb-5">
      <div class="col-md-6 col-lg-3">
        <div class="benefit-card">
          <div class="benefit-icon-box">
            <i class="bi bi-journal-check"></i>
          </div>
          <h5 class="fw-bold fs-6 text-dark mb-2">Pelatihan BISINDO & Etika</h5>
          <p class="small text-secondary mb-0">Mendapatkan kursus intensif Bahasa Isyarat Indonesia dan pedoman etika interaksi inklusif berstandar nasional.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="benefit-card">
          <div class="benefit-icon-box">
            <i class="bi bi-award-fill"></i>
          </div>
          <h5 class="fw-bold fs-6 text-dark mb-2">Sertifikat & SKPI Resmi</h5>
          <p class="small text-secondary mb-0">Pengakuan resmi kontribusi sosial dari Rektorat UIS sebagai poin Surat Keterangan Pendamping Ijazah (SKPI).</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="benefit-card">
          <div class="benefit-icon-box">
            <i class="bi bi-person-hearts"></i>
          </div>
          <h5 class="fw-bold fs-6 text-dark mb-2">Relasi & Empati Nyata</h5>
          <p class="small text-secondary mb-0">Membangun kepedulian sosial, keterampilan komunikasi interpersonal, dan jejaring sahabat lintas fakultas.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="benefit-card">
          <div class="benefit-icon-box">
            <i class="bi bi-pencil-square"></i>
          </div>
          <h5 class="fw-bold fs-6 text-dark mb-2">Akomodasi & Jam Belajar</h5>
          <p class="small text-secondary mb-0">Penyesuaian jadwal pendampingan yang fleksibel mengikuti jam luang dan jadwal kuliah relawan.</p>
        </div>
      </div>
    </div>

    <!-- Form Pendaftaran -->
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9">
        <div class="form-register-card">
          
          <div class="text-center mb-4">
            <h3 class="fw-bold text-dark">Formulir Pendaftaran Volunteer PLD</h3>
            <p class="text-muted small">Lengkapi data diri Anda di bawah ini. Tim Pusat Layanan Disabilitas akan segera menghubungi Anda untuk tahap seleksi dan wawancara.</p>
          </div>

          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show p-3 mb-4" role="alert">
              <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill fs-4 me-3 text-success"></i>
                <div>
                  <strong>Pendaftaran Berhasil Terkirim!</strong>
                  <div class="small">{{ session('success') }}</div>
                </div>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          @endif

          @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show p-3 mb-4" role="alert">
              <strong>Terjadi kesalahan input:</strong>
              <ul class="mb-0 mt-1 small">
                @foreach($errors->all() as $err)
                  <li>{{ $err }}</li>
                @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          @endif

          <form action="{{ route('homepage.volunteer.store') }}" method="POST">
            @csrf

            <div class="row g-3">
              <div class="col-md-6">
                <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap Anda" required>
              </div>

              <div class="col-md-6">
                <label for="nim" class="form-label fw-semibold">NIM (Nomor Induk Mahasiswa)</label>
                <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim') }}" placeholder="Contoh: 230101001">
              </div>

              <div class="col-md-6">
                <label for="jurusan_prodi" class="form-label fw-semibold">Fakultas / Program Studi</label>
                <input type="text" class="form-control" id="jurusan_prodi" name="jurusan_prodi" value="{{ old('jurusan_prodi') }}" placeholder="Contoh: Teknik Informatika / FTI">
              </div>

              <div class="col-md-6">
                <label for="no_hp_wa" class="form-label fw-semibold">Nomor WhatsApp Aktif <span class="text-danger">*</span></label>
                <input type="tel" class="form-control" id="no_hp_wa" name="no_hp_wa" value="{{ old('no_hp_wa') }}" placeholder="Contoh: 08123456789" required>
              </div>

              <div class="col-md-6">
                <label for="email" class="form-label fw-semibold">Alamat Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="nama@student.uis.ac.id" required>
              </div>

              <div class="col-md-6">
                <label for="keahlian" class="form-label fw-semibold">Minat Bidang Pendampingan</label>
                <select class="form-select" id="keahlian" name="keahlian">
                  <option value="Notetaker (Pencatatan Kuliah Teman Tuli)" {{ old('keahlian') == 'Notetaker (Pencatatan Kuliah Teman Tuli)' ? 'selected' : '' }}>Notetaker (Pencatatan Kuliah Teman Tuli)</option>
                  <option value="Bahasa Isyarat BISINDO (JBI)" {{ old('keahlian') == 'Bahasa Isyarat BISINDO (JBI)' ? 'selected' : '' }}>Bahasa Isyarat BISINDO (JBI)</option>
                  <option value="Reader & Konversi Audio (Teman Tunanetra)" {{ old('keahlian') == 'Reader & Konversi Audio (Teman Tunanetra)' ? 'selected' : '' }}>Reader & Konversi Audio (Teman Tunanetra)</option>
                  <option value="Pendamping Mobilitas & Fisik (Teman Daksa)" {{ old('keahlian') == 'Pendamping Mobilitas & Fisik (Teman Daksa)' ? 'selected' : '' }}>Pendamping Mobilitas & Fisik (Teman Daksa)</option>
                  <option value="Dukungan Psikososial & Peer Counseling" {{ old('keahlian') == 'Dukungan Psikososial & Peer Counseling' ? 'selected' : '' }}>Dukungan Psikososial & Peer Counseling</option>
                  <option value="Umum (Siap ditempatkan di bidang apa saja)" {{ old('keahlian') == 'Umum (Siap ditempatkan di bidang apa saja)' ? 'selected' : '' }}>Umum (Siap ditempatkan di bidang apa saja)</option>
                </select>
              </div>

              <div class="col-12">
                <label for="alasan_bergabung" class="form-label fw-semibold">Motivasi & Pengalaman Singkat</label>
                <textarea class="form-control" id="alasan_bergabung" name="alasan_bergabung" rows="3" placeholder="Ceritakan alasan Anda ingin bergabung dan pengalaman organisasi/sosial yang pernah Anda ikuti...">{{ old('alasan_bergabung') }}</textarea>
              </div>

              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm" style="border-radius: 8px;">
                  <i class="bi bi-send-fill me-2"></i> Kirim Pendaftaran Volunteer
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
