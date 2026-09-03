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

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-1"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm mb-4">
    <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2 py-3">
        <h5 class="mb-0 fw-semibold text-dark">
            <i class="bi bi-bar-chart-fill me-2 text-primary"></i>Daftar Mahasiswa Disabilitas PLD UIS
        </h5>
        <div class="d-flex flex-wrap align-items-center gap-2">
            {{-- Tombol Hapus Terpilih (Multi-Select) --}}
            <button type="button" id="btn-bulk-delete" class="btn btn-danger btn-sm d-none" onclick="confirmBulkDelete()">
                <i class="bi bi-trash-fill me-1"></i> Hapus Terpilih (<span id="selected-count">0</span>)
            </button>

            {{-- Tombol Hapus Semua --}}
            <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirmDeleteAll()">
                <i class="bi bi-trash3 me-1"></i> Hapus Semua
            </button>

            {{-- Tombol Download Template Excel --}}
            <a href="{{ route('admin-statistik-mahasiswa.download-template') }}" class="btn btn-outline-secondary btn-sm" title="Download Template Format Pengisian Excel">
                <i class="bi bi-file-earmark-excel me-1 text-success"></i> Template Excel
            </a>

            {{-- Tombol Import Excel --}}
            <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#importExcelModal">
                <i class="bi bi-file-earmark-arrow-up me-1"></i> Import Excel
            </button>

            {{-- Tombol Tambah Mahasiswa --}}
            <a href="{{ route('admin-statistik-mahasiswa.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-person-plus-fill me-1"></i> Tambah Mahasiswa
            </a>
        </div>
    </div>
    <div class="card-body pt-3">
        <div class="alert alert-info alert-dismissible fade show mb-3" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i>
            Kelola data mahasiswa disabilitas PLD UIS. Anda dapat memilih beberapa baris untuk dihapus sekaligus (multi-select), mengosongkan data, hingga impor massal dari file Excel sesuai format template resmi.
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

{{-- Form Tersembunyi untuk Bulk Delete --}}
<form id="form-bulk-delete" action="{{ route('admin-statistik-mahasiswa.bulk-delete') }}" method="POST" class="d-none">
    @csrf
    <div id="bulk-delete-inputs"></div>
</form>

{{-- Form Tersembunyi untuk Delete All --}}
<form id="form-delete-all" action="{{ route('admin-statistik-mahasiswa.delete-all') }}" method="POST" class="d-none">
    @csrf
</form>

{{-- Modal Import Excel --}}
<div class="modal fade" id="importExcelModal" tabindex="-1" aria-labelledby="importExcelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header text-white" style="background: linear-gradient(135deg, #141b39 0%, #283759 100%);">
                <h5 class="modal-title fw-bold" id="importExcelModalLabel">
                    <i class="bi bi-file-earmark-excel me-2 text-warning"></i>Import Data Mahasiswa dari Excel
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin-statistik-mahasiswa.import-excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3 p-3 bg-light rounded-3 border">
                        <h6 class="fw-bold text-dark mb-1"><i class="bi bi-info-circle text-primary me-1"></i>Petunjuk Pengisian:</h6>
                        <ol class="small text-muted mb-2 ps-3">
                            <li>Unduh template Excel resmi terlebih dahulu agar susunan kolom sesuai.</li>
                            <li>Kolom bertanda (*) Nama, Jenis Kelamin (L/P), Jenis Disabilitas, Fakultas, Prodi, Angkatan, dan Status wajib diisi.</li>
                            <li>File yang didukung: <code>.xlsx</code>, <code>.xls</code>, atau <code>.csv</code> (Maks. 10MB).</li>
                        </ol>
                        <a href="{{ route('admin-statistik-mahasiswa.download-template') }}" class="btn btn-sm btn-outline-success fw-semibold">
                            <i class="bi bi-download me-1"></i> Download Template Excel (.xlsx)
                        </a>
                    </div>

                    <div class="mb-3">
                        <label for="file_excel" class="form-label fw-semibold text-dark">Pilih File Excel / CSV <span class="text-danger">*</span></label>
                        <input type="file" name="file_excel" id="file_excel" class="form-control" accept=".xlsx,.xls,.csv" required>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary px-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success px-4 text-white fw-semibold">
                        <i class="bi bi-cloud-arrow-up me-1"></i> Mulai Impor Data
                    </button>
                </div>
            </form>
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

    <script>
        $(document).ready(function () {
            // Check All Handler
            $(document).on('change', '#check-all-mhs', function () {
                const isChecked = $(this).is(':checked');
                $('.check-item-mhs').prop('checked', isChecked);
                updateBulkDeleteButton();
            });

            // Single Checkbox Handler
            $(document).on('change', '.check-item-mhs', function () {
                const totalItems = $('.check-item-mhs').length;
                const checkedItems = $('.check-item-mhs:checked').length;
                $('#check-all-mhs').prop('checked', totalItems > 0 && totalItems === checkedItems);
                updateBulkDeleteButton();
            });

            // Re-bind when DataTable redraws
            $(document).on('draw.dt', function () {
                $('#check-all-mhs').prop('checked', false);
                updateBulkDeleteButton();
            });

            function updateBulkDeleteButton() {
                const checkedCount = $('.check-item-mhs:checked').length;
                $('#selected-count').text(checkedCount);
                if (checkedCount > 0) {
                    $('#btn-bulk-delete').removeClass('d-none');
                } else {
                    $('#btn-bulk-delete').addClass('d-none');
                }
            }

            // Confirm Bulk Delete with SweetAlert2
            window.confirmBulkDelete = function () {
                const selected = [];
                $('.check-item-mhs:checked').each(function () {
                    selected.push($(this).val());
                });

                if (selected.length === 0) {
                    Swal.fire('Info', 'Pilih minimal 1 data mahasiswa untuk dihapus.', 'info');
                    return;
                }

                Swal.fire({
                    title: 'Hapus ' + selected.length + ' Mahasiswa Terpilih?',
                    text: 'Data mahasiswa yang dipilih akan dihapus permanen dari sistem.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="bi bi-trash-fill me-1"></i> Ya, Hapus Terpilih',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        const container = $('#bulk-delete-inputs');
                        container.empty();
                        selected.forEach(id => {
                            container.append('<input type="hidden" name="ids[]" value="' + id + '">');
                        });
                        $('#form-bulk-delete').submit();
                    }
                });
            };

            // Confirm Delete All with SweetAlert2
            window.confirmDeleteAll = function () {
                Swal.fire({
                    title: 'Kosongkan SEMUA Data Mahasiswa?',
                    text: 'PERINGATAN: Seluruh data mahasiswa disabilitas akan dihapus permanen dari database!',
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="bi bi-exclamation-triangle-fill me-1"></i> Ya, Kosongkan Semua',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#form-delete-all').submit();
                    }
                });
            };
        });
    </script>
@endpush
