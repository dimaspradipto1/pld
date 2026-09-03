<div id="mhs-live-content">
  <!-- Search Summary Counter -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      @if(!empty($search))
        <span class="badge bg-light text-dark border py-2 px-3">
          <i class="bi bi-filter me-1 text-primary"></i>Hasil pencarian: "<strong>{{ $search }}</strong>"
          <span class="badge bg-primary ms-1">{{ $mahasiswaList->total() }}</span>
        </span>
      @else
        <span class="text-muted small">
          <i class="bi bi-people-fill me-1 text-primary"></i>Total: <strong>{{ $mahasiswaList->total() }}</strong> mahasiswa terdata
        </span>
      @endif
    </div>
    @if($mahasiswaList->total() > 0)
      <div class="text-muted small d-none d-md-block">
        Halaman <strong>{{ $mahasiswaList->currentPage() }}</strong> dari <strong>{{ $mahasiswaList->lastPage() }}</strong>
      </div>
    @endif
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
