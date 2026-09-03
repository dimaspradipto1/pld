@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Tambah Data Mahasiswa Disabilitas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin-statistik-mahasiswa.index') }}">Statistik Mahasiswa</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<div class="card shadow-sm">
    <div class="card-header py-3">
        <h5 class="mb-0 fw-semibold text-primary">
            <i class="bi bi-person-plus-fill me-2"></i>Formulir Mahasiswa Disabilitas
        </h5>
    </div>
    <div class="card-body pt-4">
        <form action="{{ route('admin-statistik-mahasiswa.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nim" class="form-label fw-bold">Nomor Induk Mahasiswa (NIM)</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim') }}" placeholder="Contoh: 23010012">
                    @error('nim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nama" class="form-label fw-bold">Nama Lengkap Mahasiswa <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required placeholder="Nama lengkap mahasiswa">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-laki (L)</option>
                        <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan (P)</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="jenis_disabilitas" class="form-label fw-bold">Jenis Disabilitas <span class="text-danger">*</span></label>
                    <select class="form-select @error('jenis_disabilitas') is-invalid @enderror" id="jenis_disabilitas" name="jenis_disabilitas" required>
                        <option value="" disabled selected>-- Pilih Jenis Disabilitas --</option>
                        @foreach($jenisDisabilitas as $jd)
                            <option value="{{ $jd }}" {{ old('jenis_disabilitas') === $jd ? 'selected' : '' }}>{{ $jd }}</option>
                        @endforeach
                    </select>
                    @error('jenis_disabilitas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="angkatan" class="form-label fw-bold">Tahun Angkatan <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan" name="angkatan" value="{{ old('angkatan', date('Y')) }}" min="2010" max="2035" required>
                    @error('angkatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="fakultas" class="form-label fw-bold">Fakultas <span class="text-danger">*</span></label>
                    <select class="form-select @error('fakultas') is-invalid @enderror" id="fakultas" name="fakultas" required onchange="filterProdiByFakultas(this.value)">
                        <option value="" disabled selected>-- Pilih Fakultas --</option>
                        @foreach($fakultas as $fak)
                            <option value="{{ $fak }}" {{ old('fakultas') === $fak ? 'selected' : '' }}>{{ $fak }}</option>
                        @endforeach
                    </select>
                    @error('fakultas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="prodi" class="form-label fw-bold">Program Studi <span class="text-danger">*</span></label>
                    <select class="form-select @error('prodi') is-invalid @enderror" id="prodi" name="prodi" required>
                        <option value="" disabled selected>-- Pilih Program Studi --</option>
                        @foreach($fakultasProdi as $fakName => $prodis)
                            <optgroup label="{{ $fakName }}" data-fakultas="{{ $fakName }}">
                                @foreach($prodis as $prd)
                                    <option value="{{ $prd }}" data-fakultas="{{ $fakName }}" {{ old('prodi') === $prd ? 'selected' : '' }}>
                                        {{ $prd }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                    @error('prodi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="status" class="form-label fw-bold">Status Mahasiswa <span class="text-danger">*</span></label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="Aktif" {{ old('status', 'Aktif') === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Lulus" {{ old('status') === 'Lulus' ? 'selected' : '' }}>Lulus</option>
                        <option value="Cuti" {{ old('status') === 'Cuti' ? 'selected' : '' }}>Cuti</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="keterangan" class="form-label fw-bold">Keterangan / Catatan Pendampingan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}" placeholder="Catatan khusus, akomodasi atau kebutuhan asistif">
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-end gap-2 mt-4 pt-3 border-top">
                <a href="{{ route('admin-statistik-mahasiswa.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const fakultasProdiData = {!! json_encode($fakultasProdi) !!};

    function filterProdiByFakultas(selectedFakultas) {
        const prodiSelect = document.getElementById('prodi');
        const currentProdi = prodiSelect.value;
        prodiSelect.innerHTML = '<option value="" disabled selected>-- Pilih Program Studi --</option>';

        if (selectedFakultas && fakultasProdiData[selectedFakultas]) {
            fakultasProdiData[selectedFakultas].forEach(function (p) {
                const opt = document.createElement('option');
                opt.value = p;
                opt.textContent = p;
                if (p === currentProdi) {
                    opt.selected = true;
                }
                prodiSelect.appendChild(opt);
            });
        } else {
            // Tampilkan semua jika belum dipilih
            Object.keys(fakultasProdiData).forEach(function (f) {
                const group = document.createElement('optgroup');
                group.label = f;
                fakultasProdiData[f].forEach(function (p) {
                    const opt = document.createElement('option');
                    opt.value = p;
                    opt.textContent = p;
                    if (p === currentProdi) {
                        opt.selected = true;
                    }
                    group.appendChild(opt);
                });
                prodiSelect.appendChild(group);
            });
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const fakVal = document.getElementById('fakultas').value;
        if (fakVal) {
            filterProdiByFakultas(fakVal);
        }
    });
</script>
@endpush
