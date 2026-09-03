@extends('layouts.dashboard.template')

@section('content')
<div class="pagetitle">
    <h1>Detail Calon Volunteer</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('volunteer.index') }}">Volunteer</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-person-lines-fill me-2 text-primary"></i>Profil Pendaftar: {{ $volunteer->nama_lengkap }}
                </h5>
            </div>
            <div class="card-body pt-3">
                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <th style="width: 30%;" class="bg-light">Nama Lengkap</th>
                            <td class="fw-bold fs-6">{{ $volunteer->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">NIM (Nomor Induk Mahasiswa)</th>
                            <td>{{ $volunteer->nim ?: '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Program Studi / Fakultas</th>
                            <td>{{ $volunteer->jurusan_prodi ?: '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">WhatsApp / Telepon</th>
                            <td>
                                @php
                                    $waNum = preg_replace('/[^0-9]/', '', $volunteer->no_hp_wa);
                                    if (str_starts_with($waNum, '0')) $waNum = '62' . substr($waNum, 1);
                                @endphp
                                <a href="https://wa.me/{{ $waNum }}" target="_blank" class="btn btn-sm btn-success">
                                    <i class="bi bi-whatsapp me-1"></i> Hubungi WhatsApp: {{ $volunteer->no_hp_wa }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-light">Email</th>
                            <td><a href="mailto:{{ $volunteer->email }}">{{ $volunteer->email }}</a></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Minat & Keahlian Khusus</th>
                            <td><span class="badge fs-6" style="background:#283759; color:#fff;">{{ $volunteer->keahlian ?: 'Umum' }}</span></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Motivasi / Alasan Bergabung</th>
                            <td>
                                <div class="p-3 bg-light rounded border text-secondary" style="white-space: pre-line;">
                                    {{ $volunteer->alasan_bergabung ?: 'Tidak mencantumkan catatan tambahan.' }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-light">Waktu Mendaftar</th>
                            <td>{{ $volunteer->created_at->format('d F Y, H:i:s') }} ({{ $volunteer->created_at->diffForHumans() }})</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h5 class="mb-0 fw-semibold"><i class="bi bi-check-circle me-2 text-primary"></i>Status Seleksi</h5>
            </div>
            <div class="card-body pt-3">
                <div class="mb-3 text-center p-3 rounded" style="background: #f8fafd; border: 1px solid #e2ebf2;">
                    <span class="small text-muted d-block mb-1">Status Saat Ini:</span>
                    @if ($volunteer->status === 'Diterima')
                        <span class="badge bg-success fs-6 px-3 py-2"><i class="bi bi-check-circle me-1"></i>DITERIMA</span>
                    @elseif ($volunteer->status === 'Ditolak')
                        <span class="badge bg-danger fs-6 px-3 py-2"><i class="bi bi-x-circle me-1"></i>DITOLAK</span>
                    @else
                        <span class="badge fs-6 px-3 py-2" style="background:#79a8e2; color:#fff;"><i class="bi bi-hourglass-split me-1"></i>MENUNGGU REVIEW</span>
                    @endif
                </div>

                <form action="{{ route('volunteer.update-status', $volunteer->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="status" class="form-label fw-semibold">Ubah Status Keputusan:</label>
                        <select name="status" id="status" class="form-select">
                            <option value="Menunggu Review" {{ $volunteer->status == 'Menunggu Review' ? 'selected' : '' }}>Menunggu Review</option>
                            <option value="Diterima" {{ $volunteer->status == 'Diterima' ? 'selected' : '' }}>Terima Sebagai Volunteer</option>
                            <option value="Ditolak" {{ $volunteer->status == 'Ditolak' ? 'selected' : '' }}>Tolak Pendaftaran</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        <i class="bi bi-check-lg me-1"></i> Simpan Status
                    </button>
                </form>

                <a href="{{ route('volunteer.index') }}" class="btn btn-outline-secondary w-100">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
