@extends('layouts.dashboard.template')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
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
                <div class="row">

                    <!-- Total Layanan Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">Total Layanan</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-primary-light text-primary" style="width: 50px; height: 50px; background: rgba(13, 110, 253, 0.1);">
                                        <i class="bi bi-clipboard2-check" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="fs-4 fw-bold mb-0">{{ $totalLayanan }}</h6>
                                        <span class="text-muted small">Jasa Riksa Uji</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Testimonial Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">Total Testimoni</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center text-success" style="width: 50px; height: 50px; background: rgba(25, 135, 84, 0.1);">
                                        <i class="bi bi-chat-quote" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="fs-4 fw-bold mb-0">{{ $totalTestimonials }}</h6>
                                        <span class="text-muted small">Ulasan Klien</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Partner Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card customers-card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">Partner</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 50px; height: 50px; background: rgba(255, 193, 7, 0.1);">
                                        <i class="bi bi-building" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="fs-4 fw-bold mb-0">{{ $totalPartners }}</h6>
                                        <span class="text-muted small">Klien & Mitra</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Post Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">Artikel / Post</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 50px; height: 50px; background: rgba(13, 202, 240, 0.1);">
                                        <i class="bi bi-newspaper" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="fs-4 fw-bold mb-0">{{ $totalNews }}</h6>
                                        <span class="text-muted small">Kabar & Berita</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Charts Section -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Tren Testimoni Masuk</h5>
                        <div id="testimonialTrendChart"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Rasio Kategori Testimoni</h5>
                        <div id="testimonialRatioChart" style="min-height: 290px;"></div>
                    </div>
                </div>
            </div>

            <!-- Latest Testimonials Table -->
            <div class="col-lg-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3 bg-transparent border-0 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-semibold text-dark">Testimoni Terbaru</h5>
                        <a href="{{ route('testimonial.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Pekerjaan</th>
                                        <th>Kategori</th>
                                        <th>Bintang</th>
                                        <th>Status</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($latestTestimonials as $testimonial)
                                        <tr>
                                            <td class="fw-semibold">{{ $testimonial->nama }}</td>
                                            <td>{{ $testimonial->pekerjaan }}</td>
                                            <td><span class="badge bg-light text-dark border">{{ $testimonial->kategori }}</span></td>
                                            <td>{{ str_repeat('★', $testimonial->bintang) }}</td>
                                            <td>
                                                @if($testimonial->aktif)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-secondary">Menunggu</span>
                                                @endif
                                            </td>
                                            <td>{{ $testimonial->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-3">Belum ada testimoni masuk.</td>
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

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Data Tren Testimoni dari DB
        const testimonialsData = {!! json_encode($testimonialsChart) !!};
        const dates = testimonialsData.map(item => item.date);
        const totals = testimonialsData.map(item => item.total);

        // Tren Testimoni Chart (Area Chart)
        new ApexCharts(document.querySelector("#testimonialTrendChart"), {
            series: [{
                name: 'Total Testimoni',
                data: totals.length ? totals : [0]
            }],
            chart: {
                height: 350,
                type: 'area',
                toolbar: { show: false }
            },
            colors: ['#E4032E'],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.3,
                    opacityTo: 0.4,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', width: 2 },
            xaxis: {
                categories: dates.length ? dates : ['Tidak Ada Data'],
                labels: {
                    rotate: -45,
                    style: { fontSize: '12px' }
                }
            },
            tooltip: { x: { format: 'yyyy-MM-dd' } }
        }).render();

        // Data Rasio Kategori dari DB
        const ratioData = {!! json_encode($testimonialsRatio) !!};
        const ratioLabels = ratioData.map(item => item.kategori);
        const ratioCounts = ratioData.map(item => item.total);

        // Rasio Kategori Chart (Donut Chart)
        new ApexCharts(document.querySelector("#testimonialRatioChart"), {
            series: ratioCounts.length ? ratioCounts : [0],
            chart: {
                height: 290,
                type: 'donut',
            },
            labels: ratioLabels.length ? ratioLabels : ['Kosong'],
            colors: ['#E4032E', '#152B5C', '#4FA8E8', '#ffc107', '#2eca6a'],
            legend: {
                position: 'bottom'
            },
            dataLabels: { enabled: true }
        }).render();
    });
</script>
@endpush
