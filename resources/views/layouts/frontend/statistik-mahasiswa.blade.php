@extends('layouts.frontend.template')

@section('title', 'Data & Statistik Mahasiswa Disabilitas — Pusat Layanan Disabilitas (PLD UIS)')
@section('meta_description', 'Analisis komprehensif data dan statistik mahasiswa berkebutuhan khusus, distribusi per fakultas, dan program studi di Universitas Ibnu Sina.')
@section('meta_keywords', 'statistik disabilitas uis, data mahasiswa disabilitas batam, pld uis data, tunanetra, tunarungu, tunadaksa')

@push('styles')
<style>
  .stats-hero {
    position: relative;
    background: var(--obsidian-dark, #141b39);
    padding: 75px 0 55px;
    border-bottom: 2px solid var(--pld-purple, #283759);
  }
  .stats-hero-title {
    font-size: 38px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 10px;
    letter-spacing: -0.5px;
  }
  .stats-hero-title em {
    font-style: normal;
    color: var(--pld-orange, #79a8e2);
  }
  .stats-hero-desc {
    color: rgba(255, 255, 255, 0.75);
    font-size: 15.5px;
    max-width: 720px;
    line-height: 1.8;
  }
  .breadcrumb-custom {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 13.5px;
    color: rgba(255, 255, 255, 0.6);
  }
  .breadcrumb-custom a { color: rgba(255, 255, 255, 0.85); text-decoration: none; }
  .breadcrumb-custom a:hover { color: var(--pld-orange, #79a8e2); }
  .breadcrumb-custom .active { color: var(--pld-orange, #79a8e2); font-weight: 600; }

  /* Disability Cards */
  .disability-stat-card {
    background: #ffffff;
    border: 1px solid var(--border-light, #e2ebf2);
    border-radius: 18px;
    padding: 24px 22px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 15px rgba(20, 27, 57, 0.04);
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .disability-stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(20, 27, 57, 0.1);
    border-color: #79a8e2;
  }
  .disability-card-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
  }
  .disability-name {
    font-size: 16px;
    font-weight: 700;
    color: #141b39;
    margin: 0;
  }
  .disability-icon-wrap {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
  }
  .disability-count-wrap {
    margin-bottom: 14px;
  }
  .disability-count {
    font-size: 36px;
    font-weight: 800;
    line-height: 1;
    color: #141b39;
    margin-bottom: 4px;
  }
  .disability-count-unit {
    font-size: 13px;
    font-weight: 600;
    color: #50697d;
  }
  .disability-progress {
    height: 5px;
    border-radius: 10px;
    background: #edf2f7;
    overflow: hidden;
  }
  .disability-progress-bar {
    height: 100%;
    border-radius: 10px;
    background: linear-gradient(90deg, #283759 0%, #79a8e2 100%);
  }

  /* Chart Card Boxes */
  .chart-section-card {
    background: #ffffff;
    border: 1px solid var(--border-light, #e2ebf2);
    border-radius: 24px;
    padding: 34px 28px;
    box-shadow: 0 6px 20px rgba(20, 27, 57, 0.05);
    margin-bottom: 35px;
  }
  .chart-header {
    text-align: center;
    margin-bottom: 30px;
  }
  .chart-title {
    font-size: 24px;
    font-weight: 800;
    color: #141b39;
    margin-bottom: 8px;
  }
  .chart-subtitle {
    font-size: 14px;
    color: #50697d;
    max-width: 600px;
    margin: 0 auto;
  }

  /* Filter Bar */
  .filter-bar-card {
    background: #ffffff;
    border: 1px solid var(--border-light, #e2ebf2);
    border-radius: 16px;
    padding: 16px 22px;
    box-shadow: 0 4px 12px rgba(20, 27, 57, 0.04);
    margin-top: -30px;
    position: relative;
    z-index: 10;
  }

  /* Search Mahasiswa Box */
  .search-mhs-box {
    border: 1.5px solid #dce4ec;
    border-radius: 12px;
    background: #ffffff;
    overflow: hidden;
    transition: all 0.2s ease;
  }
  .search-mhs-box:focus-within {
    border-color: #79a8e2;
    box-shadow: 0 0 0 3px rgba(121, 168, 226, 0.2);
  }
  .search-mhs-box .form-control {
    border: none !important;
    box-shadow: none !important;
    font-size: 14px;
    background: transparent;
  }

  /* Pagination Styling */
  .custom-pagination-container .pagination {
    margin-bottom: 0;
    gap: 4px;
    flex-wrap: wrap;
    justify-content: center;
  }
  .custom-pagination-container .page-item:first-child .page-link,
  .custom-pagination-container .page-item:last-child .page-link {
    border-radius: 8px !important;
  }
  .custom-pagination-container .page-link {
    border-radius: 8px !important;
    border: 1px solid #e2ebf2;
    color: #141b39;
    font-weight: 600;
    font-size: 13.5px;
    padding: 6px 12px;
    transition: all 0.2s ease;
    box-shadow: none !important;
  }
  .custom-pagination-container .page-link:hover {
    background: #eef4fc;
    color: #141b39;
    border-color: #79a8e2;
  }
  .custom-pagination-container .page-item.active .page-link {
    background: #141b39 !important;
    border-color: #141b39 !important;
    color: #ffffff !important;
    box-shadow: 0 3px 8px rgba(20, 27, 57, 0.2) !important;
  }
  .custom-pagination-container .page-item.disabled .page-link {
    background: #f8fafc;
    color: #94a3b8;
    border-color: #edf2f7;
  }
  .custom-pagination-container nav > div:first-child {
    display: none !important;
  }
</style>
@endpush

@section('content')

<!-- ═══════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════ -->
<div class="stats-hero">
  <div class="container text-center">
    <div data-aos="fade-up">
      <div class="breadcrumb-custom mb-3 justify-content-center">
        <a href="{{ route('homepage') }}"><i class="bi bi-house-fill me-1"></i>Beranda</a>
        <span>/</span>
        <span>Kemahasiswaan</span>
        <span>/</span>
        <span class="active">Statistik Mahasiswa</span>
      </div>
      <h1 class="stats-hero-title">
        Data &amp; Statistik <em>PLD UIS</em>
      </h1>
      <p class="stats-hero-desc mx-auto">
        Analisis mendalam tentang mahasiswa berkebutuhan khusus, sebaran di setiap fakultas, dan program studi di lingkungan Universitas Ibnu Sina.
      </p>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     FILTER BAR
═══════════════════════════════════════════════ -->
<div class="container">
  <div class="filter-bar-card" data-aos="fade-up" data-aos-delay="50">
    <form method="GET" action="{{ route('homepage.statistik-mahasiswa') }}" class="row g-3 align-items-center justify-content-between">
      <div class="col-md-4 col-lg-3">
        <div class="d-flex align-items-center gap-2">
          <div class="p-2 rounded-3 text-white" style="background:#283759;">
            <i class="bi bi-people-fill fs-5"></i>
          </div>
          <div>
            <div class="small text-muted fw-semibold" style="font-size:11.5px;">TOTAL MAHASISWA</div>
            <div class="fw-bold text-dark fs-5">{{ $totalMahasiswa }} <span class="fs-6 text-muted fw-normal">Orang</span></div>
          </div>
        </div>
      </div>

      <div class="col-md-8 col-lg-7 d-flex flex-wrap gap-2 justify-content-md-end align-items-center">
        <div class="d-flex align-items-center gap-1">
          <label class="small fw-bold text-muted me-1">Angkatan:</label>
          <select name="angkatan" class="form-select form-select-sm" style="width: auto; min-width: 120px;" onchange="this.form.submit()">
            <option value="">Semua Angkatan</option>
            @foreach($angkatanList as $akt)
              <option value="{{ $akt }}" {{ (string)$selectedAngkatan === (string)$akt ? 'selected' : '' }}>{{ $akt }}</option>
            @endforeach
          </select>
        </div>

        <div class="d-flex align-items-center gap-1">
          <label class="small fw-bold text-muted me-1">Status:</label>
          <select name="status" class="form-select form-select-sm" style="width: auto; min-width: 120px;" onchange="this.form.submit()">
            <option value="Semua" {{ $selectedStatus === 'Semua' ? 'selected' : '' }}>Semua Status</option>
            <option value="Aktif" {{ $selectedStatus === 'Aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="Lulus" {{ $selectedStatus === 'Lulus' ? 'selected' : '' }}>Lulus</option>
            <option value="Cuti" {{ $selectedStatus === 'Cuti' ? 'selected' : '' }}>Cuti</option>
          </select>
        </div>

        @if(!empty($selectedAngkatan) || ($selectedStatus && $selectedStatus !== 'Semua'))
          <a href="{{ route('homepage.statistik-mahasiswa') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
          </a>
        @endif
      </div>
    </form>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     SECTION 1: JUMLAH MAHASISWA PER JENIS DISABILITAS
═══════════════════════════════════════════════ -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-4" data-aos="fade-up">
      <div class="section-label mx-auto">Klasifikasi Ragam Disabilitas</div>
      <h2 class="section-title">Jumlah Mahasiswa per <em>Jenis Disabilitas</em></h2>
      <div class="divider-line centered"></div>
      <p class="section-desc mx-auto">
        Distribusi mahasiswa berkebutuhan khusus berdasarkan ragam disabilitas yang difasilitasi oleh PLD UIS.
      </p>
    </div>

    <div class="row g-4 justify-content-center">
      @forelse($disabilitasCounts as $jenis => $count)
        @php
          $meta = $disabilitasMeta[$jenis] ?? ['icon' => 'bi-universal-access', 'color' => '#283759', 'bg' => '#eef4fc'];
          $percent = $totalMahasiswa > 0 ? round(($count / $totalMahasiswa) * 100) : 0;
        @endphp
        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
          <div class="disability-stat-card">
            <div>
              <div class="disability-card-head">
                <h4 class="disability-name">{{ $jenis }}</h4>
                <div class="disability-icon-wrap" style="background: {{ $meta['bg'] }}; color: {{ $meta['color'] }};">
                  <i class="bi {{ $meta['icon'] }}"></i>
                </div>
              </div>
              <div class="disability-count-wrap">
                <div class="disability-count">{{ $count }}</div>
                <div class="disability-count-unit">Mahasiswa ({{ $percent }}%)</div>
              </div>
            </div>
            <div class="disability-progress">
              <div class="disability-progress-bar" style="width: {{ $percent }}%;"></div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5 text-muted">
          <i class="bi bi-folder-x fs-1 d-block mb-2"></i>
          Belum ada data mahasiswa disabilitas pada filter yang dipilih.
        </div>
      @endforelse
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     SECTION 2: DISTRIBUSI MAHASISWA PER FAKULTAS
═══════════════════════════════════════════════ -->
<section class="section-bg-sand py-5">
  <div class="container">
    
    <div class="chart-section-card" data-aos="fade-up">
      <div class="chart-header">
        <h3 class="chart-title">Distribusi Mahasiswa per <em>Fakultas</em></h3>
        <p class="chart-subtitle">
          Sebaran mahasiswa berkebutuhan khusus di berbagai fakultas Universitas Ibnu Sina
        </p>
      </div>
      <div style="position: relative; height: 360px; width: 100%;">
        <canvas id="fakultasChart"></canvas>
      </div>
    </div>

    <!-- ═══════════════════════════════════════════════
         SECTION 3: DISTRIBUSI BERDASARKAN PRODI
    ═══════════════════════════════════════════════ -->
    <div class="chart-section-card" data-aos="fade-up">
      <div class="chart-header">
        <h3 class="chart-title">Distribusi Berdasarkan <em>Program Studi</em></h3>
        <p class="chart-subtitle">
          Sebaran mahasiswa berkebutuhan khusus di setiap program studi Universitas Ibnu Sina
        </p>
      </div>
      <div style="position: relative; height: 400px; width: 100%;">
        <canvas id="prodiChart"></canvas>
      </div>
    </div>

    <!-- ═══════════════════════════════════════════════
         SECTION 4: DIREKTORI MAHASISWA & PENDAMPINGAN
    ═══════════════════════════════════════════════ -->
    <div class="chart-section-card" id="direktori-mahasiswa" data-aos="fade-up">
      <div class="chart-header">
        <h3 class="chart-title">Direktori Mahasiswa &amp; <em>Akomodasi Pendampingan</em></h3>
        <p class="chart-subtitle">
          Daftar mahasiswa berkebutuhan khusus yang tercatat dalam layanan pendampingan PLD UIS beserta catatan kebutuhan asistif
        </p>
      </div>

      <!-- ── Search & Filter Info Bar ── -->
      <div class="row g-3 align-items-center justify-content-between mb-4 pb-2">
        <div class="col-md-7 col-lg-6">
          <form method="GET" action="{{ route('homepage.statistik-mahasiswa') }}#direktori-mahasiswa" class="d-flex align-items-center">
            @if(!empty($selectedAngkatan))
              <input type="hidden" name="angkatan" value="{{ $selectedAngkatan }}">
            @endif
            @if(!empty($selectedStatus) && $selectedStatus !== 'Semua')
              <input type="hidden" name="status" value="{{ $selectedStatus }}">
            @endif
            
            <div class="input-group search-mhs-box w-100">
              <span class="input-group-text bg-transparent border-0 pe-1 text-muted">
                <i class="bi bi-search"></i>
              </span>
              <input type="text" name="search" class="form-control ps-1" placeholder="Cari nama mahasiswa, NIM, prodi, disabilitas..." value="{{ $search ?? '' }}">
              @if(!empty($search))
                <a href="{{ route('homepage.statistik-mahasiswa', array_filter(['angkatan' => $selectedAngkatan, 'status' => $selectedStatus !== 'Semua' ? $selectedStatus : null])) }}#direktori-mahasiswa" class="btn btn-link text-secondary text-decoration-none px-2" title="Hapus Pencarian">
                  <i class="bi bi-x-circle-fill"></i>
                </a>
              @endif
              <button class="btn btn-primary px-3 fw-semibold text-white" type="submit" style="background: #141b39; border-color: #141b39; border-radius: 0 10px 10px 0;">
                Cari
              </button>
            </div>
          </form>
        </div>

        <div class="col-md-5 col-lg-6 text-md-end">
          @if(!empty($search))
            <span class="badge bg-light text-dark border py-2 px-3">
              <i class="bi bi-filter me-1 text-primary"></i>Hasil pencarian: "<strong>{{ $search }}</strong>"
            </span>
          @else
            <span class="text-muted small">
              <i class="bi bi-people-fill me-1 text-primary"></i>Total: <strong>{{ $mahasiswaList->total() }}</strong> mahasiswa terdata
            </span>
          @endif
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0" style="border-radius: 12px; overflow: hidden;">
          <thead style="background: #141b39; color: #ffffff;">
            <tr>
              <th class="py-3 px-3 text-center" style="width: 50px;">#</th>
              <th class="py-3 px-3">Mahasiswa / NIM</th>
              <th class="py-3 px-3">Ragam Disabilitas</th>
              <th class="py-3 px-3">Program Studi &amp; Fakultas</th>
              <th class="py-3 px-3 text-center">Status</th>
              <th class="py-3 px-3">Catatan Pendampingan</th>
            </tr>
          </thead>
          <tbody class="border-top-0">
            @forelse($mahasiswaList as $mhs)
              <tr>
                <td class="text-center fw-bold text-muted">{{ ($mahasiswaList->currentPage() - 1) * $mahasiswaList->perPage() + $loop->iteration }}</td>
                <td>
                  <div class="fw-bold text-dark">{{ $mhs->nama }}</div>
                  <small class="text-muted"><i class="bi bi-person-badge me-1"></i>NIM: {{ $mhs->nim ?: '-' }}</small>
                </td>
                <td>
                  <span class="badge" style="background:#283759; color:#fff; font-size:12px; font-weight:600;">
                    {{ $mhs->jenis_disabilitas }}
                  </span>
                </td>
                <td>
                  <div class="fw-semibold text-dark">{{ $mhs->prodi }}</div>
                  <small class="text-muted">{{ $mhs->fakultas }} &bull; Angkatan {{ $mhs->angkatan }}</small>
                </td>
                <td class="text-center">
                  @if($mhs->status === 'Aktif')
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Aktif</span>
                  @elseif($mhs->status === 'Lulus')
                    <span class="badge bg-info text-dark"><i class="bi bi-mortarboard me-1"></i>Lulus</span>
                  @else
                    <span class="badge bg-warning text-dark"><i class="bi bi-pause-circle me-1"></i>Cuti</span>
                  @endif
                </td>
                <td>
                  @php
                    $cleanKetFrontend = trim(strip_tags(html_entity_decode($mhs->keterangan ?? '')));
                  @endphp
                  @if(!empty($cleanKetFrontend))
                    <span class="text-secondary small" style="line-height: 1.5;">
                      <i class="bi bi-check2-circle text-primary me-1"></i>{{ $cleanKetFrontend }}
                    </span>
                  @else
                    <span class="text-muted small fst-italic">-</span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center py-5 text-muted">
                  <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary opacity-50"></i>
                  <div class="fw-semibold">Tidak ada data mahasiswa yang cocok.</div>
                  <small>Silakan coba kata kunci pencarian atau kombinasi filter yang lain.</small>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- ── Custom Clean Pagination ── -->
      @if($mahasiswaList->hasPages())
        <div class="custom-pagination-container d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 mt-4 pt-3 border-top">
          <div class="text-muted small">
            Menampilkan <strong>{{ $mahasiswaList->firstItem() ?? 0 }}</strong> sampai <strong>{{ $mahasiswaList->lastItem() ?? 0 }}</strong> dari total <strong>{{ $mahasiswaList->total() }}</strong> mahasiswa
          </div>
          <div>
            {{ $mahasiswaList->links('pagination::bootstrap-5') }}
          </div>
        </div>
      @endif
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════
     CTA KONSULTASI / REGISTRASI
═══════════════════════════════════════════════ -->
<section class="py-5 text-center text-white" style="background: var(--obsidian-dark, #141b39);">
  <div class="container" data-aos="fade-up">
    <h3 class="fw-bold mb-3">Ingin Mendaftarkan Kebutuhan Akomodasi Belajar?</h3>
    <p class="text-white-50 mx-auto mb-4" style="max-width: 620px; font-size: 15px;">
      Pusat Layanan Disabilitas UIS siap mendampingi perjalanan studi Anda melalui asesmen kebutuhan khusus, akomodasi perkuliahan, dan bimbingan inklusif.
    </p>
    <div class="d-flex justify-content-center flex-wrap gap-3">
      <a href="{{ route('homepage.layanan') }}" class="btn-primary-hero">
        <i class="bi bi-grid-fill me-1"></i> Pelajari Layanan PLD
      </a>
      <a href="{{ route('homepage.kontak') }}" class="btn-outline-hero" style="color: #ffffff; border-color: rgba(255,255,255,0.4);">
        <i class="bi bi-telephone-fill me-1"></i> Hubungi Kami
      </a>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // 1. Data Fakultas
    const fakultasLabels = {!! json_encode($fakultasCounts->keys()->toArray()) !!};
    const fakultasData = {!! json_encode($fakultasCounts->values()->toArray()) !!};

    const ctxFakultas = document.getElementById('fakultasChart').getContext('2d');
    new Chart(ctxFakultas, {
      type: 'bar',
      data: {
        labels: fakultasLabels,
        datasets: [{
          label: 'Jumlah Mahasiswa',
          data: fakultasData,
          backgroundColor: '#141b39',
          hoverBackgroundColor: '#79a8e2',
          borderRadius: 8,
          borderSkipped: false,
          maxBarThickness: 55,
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false },
          tooltip: {
            backgroundColor: '#141b39',
            titleColor: '#ffffff',
            bodyColor: '#79a8e2',
            padding: 12,
            cornerRadius: 10,
            callbacks: {
              label: function(context) {
                return ' ' + context.parsed.y + ' Mahasiswa';
              }
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 5,
              color: '#50697d',
              font: { family: 'Plus Jakarta Sans', size: 12 }
            },
            grid: {
              color: '#f0f4f8'
            }
          },
          x: {
            ticks: {
              color: '#141b39',
              font: { family: 'Plus Jakarta Sans', size: 12, weight: '600' },
              maxRotation: 25,
              minRotation: 0
            },
            grid: { display: false }
          }
        }
      }
    });

    // 2. Data Program Studi
    const prodiLabels = {!! json_encode($prodiCounts->keys()->toArray()) !!};
    const prodiData = {!! json_encode($prodiCounts->values()->toArray()) !!};

    const ctxProdi = document.getElementById('prodiChart').getContext('2d');
    new Chart(ctxProdi, {
      type: 'bar',
      data: {
        labels: prodiLabels,
        datasets: [{
          label: 'Jumlah Mahasiswa',
          data: prodiData,
          backgroundColor: '#283759',
          hoverBackgroundColor: '#79a8e2',
          borderRadius: 8,
          borderSkipped: false,
          maxBarThickness: 45,
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false },
          tooltip: {
            backgroundColor: '#141b39',
            titleColor: '#ffffff',
            bodyColor: '#79a8e2',
            padding: 12,
            cornerRadius: 10,
            callbacks: {
              label: function(context) {
                return ' ' + context.parsed.y + ' Mahasiswa';
              }
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 5,
              color: '#50697d',
              font: { family: 'Plus Jakarta Sans', size: 12 }
            },
            grid: {
              color: '#f0f4f8'
            }
          },
          x: {
            ticks: {
              color: '#141b39',
              font: { family: 'Plus Jakarta Sans', size: 11, weight: '600' },
              maxRotation: 35,
              minRotation: 15
            },
            grid: { display: false }
          }
        }
      }
    });
  });
</script>
@endpush
