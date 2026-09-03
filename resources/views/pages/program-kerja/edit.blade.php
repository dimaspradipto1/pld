@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Edit Program Kerja</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('program-kerja.index') }}">Program Kerja</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card shadow-sm">
    <div class="card-header py-3">
        <h5 class="mb-0 fw-semibold">
            <i class="bi bi-pencil-square me-2 text-primary"></i>Edit Program Kerja: {{ $program_kerja->judul }}
        </h5>
    </div>
    <div class="card-body pt-3">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('program-kerja.update', $program_kerja->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-8">
                    <label for="judul" class="form-label fw-semibold">Nama / Judul Program Kerja <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $program_kerja->judul) }}" required>
                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label for="kategori" class="form-label fw-semibold">Bidang / Kategori <span class="text-danger">*</span></label>
                    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                        @php $currentCat = old('kategori', $program_kerja->kategori); @endphp
                        <option value="Bidang Pendampingan & Inklusi" {{ $currentCat == 'Bidang Pendampingan & Inklusi' ? 'selected' : '' }}>Bidang Pendampingan & Inklusi</option>
                        <option value="Bidang Konseling & Advokasi" {{ $currentCat == 'Bidang Konseling & Advokasi' ? 'selected' : '' }}>Bidang Konseling & Advokasi</option>
                        <option value="Bidang Pengembangan Relawan" {{ $currentCat == 'Bidang Pengembangan Relawan' ? 'selected' : '' }}>Bidang Pengembangan Relawan</option>
                        <option value="Bidang Edukasi & Intelek Tuli" {{ $currentCat == 'Bidang Edukasi & Intelek Tuli' ? 'selected' : '' }}>Bidang Edukasi & Intelek Tuli</option>
                        <option value="Bidang Advokasi & Fasilitas" {{ $currentCat == 'Bidang Advokasi & Fasilitas' ? 'selected' : '' }}>Bidang Advokasi & Fasilitas</option>
                        <option value="Bidang Advokasi & Sosialisasi" {{ $currentCat == 'Bidang Advokasi & Sosialisasi' ? 'selected' : '' }}>Bidang Advokasi & Sosialisasi</option>
                    </select>
                    @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi & Rincian Kegiatan <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $program_kerja->deskripsi) }}</textarea>
                    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label for="sasaran" class="form-label fw-semibold">Sasaran Peserta / Penerima Manfaat</label>
                    <input type="text" class="form-control @error('sasaran') is-invalid @enderror" id="sasaran" name="sasaran" value="{{ old('sasaran', $program_kerja->sasaran) }}">
                    @error('sasaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label for="target_waktu" class="form-label fw-semibold">Target Waktu / Jadwal</label>
                    <input type="text" class="form-control @error('target_waktu') is-invalid @enderror" id="target_waktu" name="target_waktu" value="{{ old('target_waktu', $program_kerja->target_waktu) }}">
                    @error('target_waktu') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label for="penanggung_jawab" class="form-label fw-semibold">Penanggung Jawab (PIC)</label>
                    <input type="text" class="form-control @error('penanggung_jawab') is-invalid @enderror" id="penanggung_jawab" name="penanggung_jawab" value="{{ old('penanggung_jawab', $program_kerja->penanggung_jawab) }}">
                    @error('penanggung_jawab') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label for="status" class="form-label fw-semibold">Status Progress <span class="text-danger">*</span></label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        @php $currentStatus = old('status', $program_kerja->status); @endphp
                        <option value="Direncanakan" {{ $currentStatus == 'Direncanakan' ? 'selected' : '' }}>Direncanakan</option>
                        <option value="Sedang Berjalan" {{ $currentStatus == 'Sedang Berjalan' ? 'selected' : '' }}>Sedang Berjalan</option>
                        <option value="Terlaksana" {{ $currentStatus == 'Terlaksana' ? 'selected' : '' }}>Terlaksana</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label for="urutan" class="form-label fw-semibold">Nomor Urut Tampil</label>
                    <input type="number" class="form-control @error('urutan') is-invalid @enderror" id="urutan" name="urutan" value="{{ old('urutan', $program_kerja->urutan) }}" min="0">
                    @error('urutan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 d-flex align-items-center">
                    <div class="form-check form-switch mt-4">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $program_kerja->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="is_active">Publikasikan (Aktif)</label>
                    </div>
                </div>
            </div>

            <div class="mt-4 pt-2 border-top d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-save me-1"></i> Perbarui Program Kerja
                </button>
                <a href="{{ route('program-kerja.index') }}" class="btn btn-secondary px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
