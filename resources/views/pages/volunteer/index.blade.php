@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Manajemen Volunteer PLD</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Layanan</li>
            <li class="breadcrumb-item active">Volunteer</li>
        </ol>
    </nav>
</div>

<div class="card shadow-sm">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h5 class="mb-0 fw-semibold">
            <i class="bi bi-people-fill me-2 text-primary"></i>Daftar Pendaftar & Relawan Mahasiswa Inklusif
        </h5>
        <a href="{{ route('homepage.volunteer') }}" target="_blank" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-box-arrow-up-right me-1"></i> Buka Halaman Pendaftaran Publik
        </a>
    </div>
    <div class="card-body pt-3">
        <div class="alert alert-info alert-dismissible fade show mb-3" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i>
            <strong>Informasi:</strong> Tabel ini memuat data mahasiswa yang mendaftar program <strong>Volunteer Pendamping PLD</strong> melalui form pendaftaran publik di website. Klik tombol detail mata (<i class="bi bi-eye-fill"></i>) untuk membaca alasan bergabung serta mengubah status (Diterima / Ditolak / Menunggu).
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
