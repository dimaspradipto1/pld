@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Tambah Program Kerja</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('program-kerja.index') }}">Program Kerja</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<div class="card shadow-sm">
    <div class="card-header py-3">
        <h5 class="mb-0 fw-semibold">
            <i class="bi bi-plus-circle me-2 text-primary"></i>Formulir Tambah Program Kerja
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

        <form action="{{ route('program-kerja.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-8">
                    <label for="judul" class="form-label fw-semibold">Nama / Judul Program Kerja <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Contoh: Rekrutmen & Pelatihan Volunteer Inklusif" required>
                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label for="kategori" class="form-label fw-semibold">Bidang / Kategori <span class="text-danger">*</span></label>
                    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                        <option value="Bidang Pendampingan & Inklusi" {{ old('kategori') == 'Bidang Pendampingan & Inklusi' ? 'selected' : '' }}>Bidang Pendampingan & Inklusi</option>
                        <option value="Bidang Konseling & Advokasi" {{ old('kategori') == 'Bidang Konseling & Advokasi' ? 'selected' : '' }}>Bidang Konseling & Advokasi</option>
                        <option value="Bidang Pengembangan Relawan" {{ old('kategori') == 'Bidang Pengembangan Relawan' ? 'selected' : '' }}>Bidang Pengembangan Relawan</option>
                        <option value="Bidang Edukasi & Intelek Tuli" {{ old('kategori') == 'Bidang Edukasi & Intelek Tuli' ? 'selected' : '' }}>Bidang Edukasi & Intelek Tuli</option>
                        <option value="Bidang Advokasi & Fasilitas" {{ old('kategori') == 'Bidang Advokasi & Fasilitas' ? 'selected' : '' }}>Bidang Advokasi & Fasilitas</option>
                        <option value="Bidang Advokasi & Sosialisasi" {{ old('kategori') == 'Bidang Advokasi & Sosialisasi' ? 'selected' : '' }}>Bidang Advokasi & Sosialisasi</option>
                    </select>
                    @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi & Rincian Kegiatan <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" placeholder="Jelaskan tujuan, ruang lingkup, dan mekanisme pelaksanaan program..." required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label for="sasaran" class="form-label fw-semibold">Sasaran Peserta / Penerima Manfaat</label>
                    <input type="text" class="form-control @error('sasaran') is-invalid @enderror" id="sasaran" name="sasaran" value="{{ old('sasaran') }}" placeholder="Contoh: Mahasiswa Disabilitas & Relawan">
                    @error('sasaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label for="target_waktu" class="form-label fw-semibold">Target Waktu / Jadwal</label>
                    <input type="text" class="form-control @error('target_waktu') is-invalid @enderror" id="target_waktu" name="target_waktu" value="{{ old('target_waktu') }}" placeholder="Contoh: Setiap Awal Semester">
                    @error('target_waktu') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label for="penanggung_jawab" class="form-label fw-semibold">Penanggung Jawab (PIC)</label>
                    <input type="text" class="form-control @error('penanggung_jawab') is-invalid @enderror" id="penanggung_jawab" name="penanggung_jawab" value="{{ old('penanggung_jawab') }}" placeholder="Contoh: Divisi Layanan Akademik PLD">
                    @error('penanggung_jawab') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label for="status" class="form-label fw-semibold">Status Progress <span class="text-danger">*</span></label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="Direncanakan" {{ old('status') == 'Direncanakan' ? 'selected' : '' }}>Direncanakan</option>
                        <option value="Sedang Berjalan" {{ old('status', 'Sedang Berjalan') == 'Sedang Berjalan' ? 'selected' : '' }}>Sedang Berjalan</option>
                        <option value="Terlaksana" {{ old('status') == 'Terlaksana' ? 'selected' : '' }}>Terlaksana</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label for="urutan" class="form-label fw-semibold">Nomor Urut Tampil</label>
                    <input type="number" class="form-control @error('urutan') is-invalid @enderror" id="urutan" name="urutan" value="{{ old('urutan', 1) }}" min="0">
                    @error('urutan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 d-flex align-items-center">
                    <div class="form-check form-switch mt-4">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="is_active">Publikasikan (Aktif)</label>
                    </div>
                </div>
            </div>

            <div class="mt-4 pt-2 border-top d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-save me-1"></i> Simpan Program Kerja
                </button>
                <a href="{{ route('program-kerja.index') }}" class="btn btn-secondary px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
