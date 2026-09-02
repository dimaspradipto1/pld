@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Tri Dharma Perguruan Tinggi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Konten Beranda</li>
            <li class="breadcrumb-item active">Tri Dharma</li>
        </ol>
    </nav>
</div>

<div class="card shadow-sm">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h5 class="mb-0 fw-semibold">
            <i class="bi bi-mortarboard-fill me-2 text-primary"></i>Daftar Item Tri Dharma (Riset & Pengabdian)
        </h5>
        <a href="{{ route('tridharma.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Item Tri Dharma
        </a>
    </div>
    <div class="card-body pt-3">
        <div class="alert alert-info alert-dismissible fade show mb-3" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i>
            <strong>Info:</strong> Data Tri Dharma ini akan ditampilkan pada seksi
            <strong>"Inovasi Riset & Pengabdian Masyarakat"</strong> di halaman beranda website.
            Icon dapat diisi menggunakan nama class Bootstrap Icons (contoh: <code>bi-journal-check</code>, <code>bi-globe-americas</code>, <code>bi-heart-pulse-fill</code>).
            Lihat katalog lengkap di <a href="https://icons.getbootstrap.com/" target="_blank" class="alert-link">icons.getbootstrap.com</a>.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <div class="table-responsive">
            {{ $dataTable->table([
                'class' => 'table table-striped table-bordered align-middle',
                'style' => 'width:100%',
            ]) }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
    @if(app()->environment('production'))
        {!! str_replace('http:', 'https:', $dataTable->scripts()) !!}
    @else
        {!! $dataTable->scripts() !!}
    @endif
@endpush
