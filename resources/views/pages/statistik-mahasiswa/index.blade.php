@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Statistik Mahasiswa</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Kemahasiswaan</li>
            <li class="breadcrumb-item active">Statistik Mahasiswa</li>
        </ol>
    </nav>
</div>

<div class="card shadow-sm">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h5 class="mb-0 fw-semibold">
            <i class="bi bi-bar-chart-fill me-2 text-primary"></i>Data Mahasiswa Disabilitas PLD UIS
        </h5>
        <a href="{{ route('admin-statistik-mahasiswa.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Mahasiswa
        </a>
    </div>
    <div class="card-body pt-3">
        <div class="alert alert-info alert-dismissible fade show mb-3" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i>
            <strong>Informasi:</strong> Data mahasiswa ini menjadi sumber agregasi statistik di halaman publik <strong>Kemahasiswaan &gt; Statistik Mahasiswa</strong>, termasuk kartu rekapitulasi jenis disabilitas serta grafik distribusi per fakultas dan prodi.
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
