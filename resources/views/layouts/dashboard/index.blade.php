@extends('layouts.dashboard.template')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard Fakultas Ilmu Kesehatan (FIKES)</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Stats Columns -->
            <div class="col-lg-12">
                <div class="row g-3 mb-4">

                    <!-- Total Post Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card shadow-sm border-0 h-100" style="border-left: 4px solid #823ca2 !important;">
                            <div class="card-body">
                                <h5 class="card-title text-muted fs-6 mb-2">Berita & Informasi</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: rgba(130, 60, 162, 0.12); color: #823ca2;">
                                        <i class="bi bi-newspaper" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="fs-3 fw-bold mb-0 text-dark">{{ $totalNews }}</h6>
                                        <span class="text-muted small">Artikel Terpublikasi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Testimoni Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card shadow-sm border-0 h-100" style="border-left: 4px solid #ff9c00 !important;">
                            <div class="card-body">
                                <h5 class="card-title text-muted fs-6 mb-2">Ulasan & Testimoni</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: rgba(255, 156, 0, 0.12); color: #ff9c00;">
                                        <i class="bi bi-chat-quote" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="fs-3 fw-bold mb-0 text-dark">{{ $totalTestimonials }}</h6>
                                        <span class="text-muted small">Ulasan Masuk</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Galeri Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card shadow-sm border-0 h-100" style="border-left: 4px solid #823ca2 !important;">
                            <div class="card-body">
                                <h5 class="card-title text-muted fs-6 mb-2">Galeri & Media</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: rgba(130, 60, 162, 0.12); color: #823ca2;">
                                        <i class="bi bi-images" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="fs-3 fw-bold mb-0 text-dark">{{ $totalGalleries }}</h6>
                                        <span class="text-muted small">File Media & Dokumentasi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total FAQ Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card shadow-sm border-0 h-100" style="border-left: 4px solid #ff9c00 !important;">
                            <div class="card-body">
                                <h5 class="card-title text-muted fs-6 mb-2">FAQ / Bantuan</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: rgba(255, 156, 0, 0.12); color: #ff9c00;">
                                        <i class="bi bi-question-circle" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="fs-3 fw-bold mb-0 text-dark">{{ $totalFaqs }}</h6>
                                        <span class="text-muted small">Tanya Jawab Tersedia</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Recent News Table -->
            <div class="col-lg-7">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3 bg-transparent border-0 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-semibold text-dark"><i class="bi bi-newspaper me-2" style="color:#823ca2;"></i> Berita Terkini</h5>
                        <a href="{{ route('news.index') }}" class="btn btn-sm btn-outline-primary" style="color:#823ca2; border-color:#823ca2;">Lihat Semua</a>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Judul Berita</th>
                                        <th>Tanggal</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($latestNews as $news)
                                        <tr>
                                            <td class="fw-semibold">{{ Str::limit($news->judul ?? $news->title ?? 'Tanpa Judul', 45) }}</td>
                                            <td class="text-muted small">{{ $news->created_at ? $news->created_at->format('d M Y') : '-' }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('news.edit', $news->id) }}" class="btn btn-sm btn-outline-secondary">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted py-3">Belum ada berita terpublikasi.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Testimonials -->
            <div class="col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3 bg-transparent border-0 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-semibold text-dark"><i class="bi bi-chat-heart me-2" style="color:#ff9c00;"></i> Testimoni Masuk</h5>
                        <a href="{{ route('testimonial.index') }}" class="btn btn-sm btn-outline-warning" style="color:#cc7c00; border-color:#ff9c00;">Kelola</a>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Pengirim</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($latestTestimonials as $testi)
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">{{ $testi->nama }}</div>
                                                <div class="text-muted small">{{ Str::limit($testi->pesan, 30) }}</div>
                                            </td>
                                            <td>
                                                <span class="text-warning">★ {{ $testi->bintang }}</span>
                                            </td>
                                            <td>
                                                @if($testi->aktif)
                                                    <span class="badge bg-success">Tayang</span>
                                                @else
                                                    <span class="badge bg-secondary">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted py-3">Belum ada ulasan masuk.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
