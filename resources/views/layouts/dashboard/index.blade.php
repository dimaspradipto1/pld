@extends('layouts.dashboard.template')



@section('content')
@php
  $rClass = $isAdmin ? 'admin' : ($isPenulis ? 'blue' : ($isOrganisasi ? 'green' : 'admin'));
  $rLabel = $isAdmin ? 'Super Administrator'
          : ($isOrganisasi && $isPenulis ? 'Pengurus Ormawa & Penulis'
          : ($isOrganisasi ? 'Pengurus Organisasi Mahasiswa'
          : ($isPenulis ? 'Penulis Berita & Konten' : 'Pengguna Portal')));
  $rIcon  = $isAdmin ? 'bi-shield-fill-check' : ($isOrganisasi ? 'bi-building-fill' : ($isPenulis ? 'bi-pencil-fill' : 'bi-person-fill'));
  $rEmoji = '';
@endphp

<div class="pagetitle mb-3">
  <h1>Dashboard Portal PLD UIS</h1>
  <nav><ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
  </ol></nav>
</div>

{{-- HERO --}}
<div class="dh-hero">
  <div class="dh-hero-inner">
    <div class="row align-items-center gy-4">
      <div class="col-lg-8">
        <div class="dh-role-tag {{ $rClass }}"><i class="bi {{ $rIcon }}"></i> {{ $rLabel }}</div>
        <h2 class="dh-hero-title">Selamat datang, <span>{{ $user->name }}</span>!
          @if($isAdmin)<i class="bi bi-patch-check-fill" style="color:#A8D27D;vertical-align:middle;"></i>
          @elseif($isOrganisasi)<i class="bi bi-building-fill" style="color:#A8D27D;vertical-align:middle;"></i>
          @elseif($isPenulis)<i class="bi bi-pencil-square" style="color:#D99032;vertical-align:middle;"></i>
          @else<i class="bi bi-person-fill" style="color:#fff;vertical-align:middle;"></i>@endif
        </h2>
        <p class="dh-hero-sub">
          @if($isAdmin) Pantau dan kelola seluruh konten portal web PLD UIS &mdash; akademik, kemahasiswaan, publikasi, dan pengaturan sistem.
          @elseif($isOrganisasi) Kelola profil lembaga kemahasiswaan, kegiatan, susunan pengurus, dan link pendaftaran anggota baru.
          @elseif($isPenulis) Tulis, edit, dan terbitkan berita, pengumuman resmi, dan liputan kegiatan akademik PLD UIS.
          @else Selamat datang di sistem manajemen portal web PLD UIS. @endif
        </p>
        <div class="d-flex flex-wrap gap-2">
          @if($isAdmin)
            <span class="dh-pill"><i class="bi bi-newspaper"></i> {{ $totalNews }} Berita</span>
            <span class="dh-pill"><i class="bi bi-person-workspace"></i> {{ $totalDosen }} Dosen</span>
            <span class="dh-pill"><i class="bi bi-building"></i> {{ $totalOrganisasi }} Ormawa</span>
            <span class="dh-pill"><i class="bi bi-person-gear"></i> {{ $totalUsers }} Pengguna</span>
          @elseif($isPenulis)
            <span class="dh-pill"><i class="bi bi-check-circle-fill"></i> {{ $myNewsPublished }} Terpublikasi</span>
            <span class="dh-pill"><i class="bi bi-hourglass-split"></i> {{ $myNewsDraft }} Draft</span>
          @elseif($isOrganisasi)
            <span class="dh-pill"><i class="bi bi-check-circle-fill"></i> {{ $totalOrganisasiActive }} Ormawa Aktif</span>
            <span class="dh-pill"><i class="bi bi-megaphone-fill"></i> {{ $totalOrganisasiOprec }} Open Rekrutmen</span>
          @endif
        </div>
      </div>
      <div class="col-lg-4 d-flex flex-column align-items-lg-end gap-2">
        <a href="{{ url('/') }}" target="_blank" class="dh-btn dh-btn-orange"><i class="bi bi-globe2"></i> Buka Website Utama</a>
        @if($isAdmin)
          <a href="{{ route('user.index') }}" class="dh-btn dh-btn-ghost"><i class="bi bi-people-fill"></i> Kelola Pengguna</a>
        @elseif($isPenulis)
          <a href="{{ route('news.create') }}" class="dh-btn dh-btn-ghost"><i class="bi bi-plus-circle-fill"></i> Tulis Berita Baru</a>
        @elseif($isOrganisasi)
          <a href="{{ route('organisasi-mahasiswa.create') }}" class="dh-btn dh-btn-ghost"><i class="bi bi-plus-circle-fill"></i> Tambah Organisasi</a>
        @endif
      </div>
    </div>
  </div>
  <div class="dh-hero-strip">
    <div class="dh-strip-item"><i class="bi bi-calendar3"></i><span>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span></div>
    <div class="dh-strip-item"><i class="bi bi-clock-fill"></i><span id="live-clock">--:--:--</span></div>
    @if($isAdmin)
      <div class="dh-strip-item"><i class="bi bi-newspaper"></i><span>{{ $totalNewsPublished }} berita tayang</span></div>
      <div class="dh-strip-item"><i class="bi bi-hourglass-split"></i><span>{{ $totalNewsDraft }} draft menunggu</span></div>
    @endif
  </div>
</div>

<section class="section dashboard">

{{-- â•â• ADMIN â•â• --}}
@if($isAdmin)

<div class="kpi-grid mb-4">
  <div class="kpi kpi-indigo"><div class="kpi-icon"><i class="bi bi-newspaper"></i></div><div class="kpi-num">{{ $totalNews }}</div><div class="kpi-label">Berita & Informasi</div><div class="kpi-sub">{{ $totalNewsPublished }} tayang Â· {{ $totalNewsDraft }} draft</div></div>
  <div class="kpi kpi-purple"><div class="kpi-icon"><i class="bi bi-person-workspace"></i></div><div class="kpi-num">{{ $totalDosen }}</div><div class="kpi-label">Dosen & Pengajar</div><div class="kpi-sub">Tenaga pengajar aktif</div></div>
  <div class="kpi kpi-orange"><div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div><div class="kpi-num">{{ $totalLayanan }}</div><div class="kpi-label">Program Studi</div><div class="kpi-sub">Prodi teregistrasi</div></div>
  <div class="kpi kpi-emerald"><div class="kpi-icon"><i class="bi bi-building"></i></div><div class="kpi-num">{{ $totalOrganisasi }}</div><div class="kpi-label">Organisasi Mahasiswa</div><div class="kpi-sub">{{ $totalOrganisasiActive }} aktif saat ini</div></div>
</div>
<div class="kpi-grid mb-4">
  <div class="kpi kpi-teal"><div class="kpi-icon"><i class="bi bi-trophy-fill"></i></div><div class="kpi-num">{{ $totalPrestasi }}</div><div class="kpi-label">Prestasi Mahasiswa</div><div class="kpi-sub">Pencapaian tercatat</div></div>
  <div class="kpi kpi-amber"><div class="kpi-icon"><i class="bi bi-chat-heart-fill"></i></div><div class="kpi-num">{{ $totalTestimonials }}</div><div class="kpi-label">Testimoni Civitas</div><div class="kpi-sub">Ulasan masuk</div></div>
  <div class="kpi kpi-rose"><div class="kpi-icon"><i class="bi bi-images"></i></div><div class="kpi-num">{{ $totalGalleries }}</div><div class="kpi-label">Dokumentasi Galeri</div><div class="kpi-sub">Foto & media</div></div>
  <div class="kpi kpi-navy"><div class="kpi-icon"><i class="bi bi-person-gear"></i></div><div class="kpi-num">{{ $totalUsers }}</div><div class="kpi-label">Pengguna Sistem</div><div class="kpi-sub">Admin, penulis, ormawa</div></div>
</div>

<div class="row g-4 mb-4">
  <div class="col-lg-6">
    <div class="panel">
      <div class="ch-wrap">
        <div class="ch-title"><span class="ch-ic" style="background:rgba(67,97,238,.12);color:#4361ee;"><i class="bi bi-bar-chart-fill"></i></span> Tren Publikasi Berita</div>
        <div class="ch-sub">Artikel yang diterbitkan dalam 6 bulan terakhir</div>
        <div id="adminNewsChart" style="min-height:280px;"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="panel h-100">
      <div class="ch-wrap">
        <div class="ch-title"><span class="ch-ic" style="background:rgba(86,130,61,.14);color:#56823D;"><i class="bi bi-pie-chart-fill"></i></span> Distribusi Ormawa</div>
        <div class="ch-sub">Berdasarkan kategori</div>
        <div id="adminOrmawaChart" style="min-height:260px;"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="panel h-100">
      <div class="ch-wrap">
        <div class="ch-title"><span class="ch-ic" style="background:rgba(245,159,11,.12);color:#f59e0b;"><i class="bi bi-star-fill"></i></span> Rating Testimoni</div>
        <div class="ch-sub">Distribusi bintang ulasan</div>
        <div id="testimonialRadarChart" style="min-height:260px;"></div>
      </div>
    </div>
  </div>
</div>

<div class="row g-4 mb-4">
  <div class="col-lg-7">
    <div class="panel">
      <div class="panel-head">
        <h3><span class="panel-head-ic" style="background:rgba(67,97,238,.12);color:#4361ee;"><i class="bi bi-newspaper"></i></span> Berita & Informasi Terkini</h3>
        <a href="{{ route('news.index') }}" class="pb pb-indigo">Lihat Semua <i class="bi bi-arrow-right"></i></a>
      </div>
      <div class="table-responsive">
        <table class="table tbl table-hover mb-0">
          <thead><tr><th>Judul Berita</th><th>Kategori</th><th>Tanggal</th><th class="text-center">Status</th><th class="text-center">Edit</th></tr></thead>
          <tbody>
          @forelse($latestNews as $news)
            <tr>
              <td><div class="fw-bold" style="max-width:240px;font-size:13.5px;">{{ Str::limit($news->title ?? $news->judul,44) }}</div><small class="text-muted">{{ $news->user->name ?? 'Admin' }}</small></td>
              <td><span class="bd bd-cat">{{ $news->category ?? 'Berita' }}</span></td>
              <td style="font-size:12.5px;color:var(--txt2);">{{ $news->created_at?$news->created_at->format('d M Y'):'-' }}</td>
              <td class="text-center">
                @if($news->status==='published')<span class="bd bd-pub"><i class="bi bi-check-circle-fill"></i> Live</span>
                @else<span class="bd bd-dft"><i class="bi bi-hourglass"></i> Draft</span>@endif
              </td>
              <td class="text-center"><a href="{{ route('news.edit',$news->id) }}" class="btn btn-sm btn-warning text-white py-1 px-2"><i class="bi bi-pencil-fill"></i></a></td>
            </tr>
          @empty
            <tr><td colspan="5"><div class="empty-state"><i class="bi bi-inbox"></i><p>Belum ada berita.</p></div></td></tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="panel">
      <div class="panel-head">
        <h3><span class="panel-head-ic" style="background:rgba(245,159,11,.12);color:#f59e0b;"><i class="bi bi-chat-heart-fill"></i></span> Testimoni Terbaru</h3>
        <a href="{{ route('testimonial.index') }}" class="pb pb-orange">Kelola <i class="bi bi-arrow-right"></i></a>
      </div>
      <div class="table-responsive">
        <table class="table tbl table-hover mb-0">
          <thead><tr><th>Pengirim</th><th class="text-center">Rating</th><th class="text-center">Status</th></tr></thead>
          <tbody>
          @forelse($latestTestimonials as $t)
            <tr>
              <td><div class="fw-bold" style="font-size:13.5px;">{{ $t->nama }}</div><small class="text-muted text-truncate d-block" style="max-width:180px;">{{ $t->pesan }}</small></td>
              <td class="text-center">
                <div style="color:#f59e0b;font-size:14px;letter-spacing:1px;">
                  @for($s=1;$s<=5;$s++)
                    @if($s<=(int)$t->bintang)
                      <i class="bi bi-star-fill"></i>
                    @else
                      <i class="bi bi-star" style="color:#ddd;"></i>
                    @endif
                  @endfor
                </div>
                <div style="font-size:11px;color:var(--txt2);">{{ $t->bintang }}/5</div>
              </td>
              <td class="text-center">
                @if($t->aktif)<span class="bd bd-tay"><i class="bi bi-eye-fill"></i> Tayang</span>
                @else<span class="bd bd-pnd"><i class="bi bi-eye-slash-fill"></i> Pending</span>@endif
              </td>
            </tr>
          @empty
            <tr><td colspan="3"><div class="empty-state"><i class="bi bi-inbox"></i><p>Belum ada testimoni.</p></div></td></tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="panel">
  <div class="panel-head">
    <h3><span class="panel-head-ic" style="background:rgba(86,130,61,.14);color:#56823D;"><i class="bi bi-grid-fill"></i></span> Pintasan Akses Cepat Administrator</h3>
    <span style="font-size:12px;color:var(--txt2);font-weight:600;">{{ now()->format('H:i') }} WIB</span>
  </div>
  <div class="sc-wrap">
    <a href="{{ route('news.create') }}"                class="sc"><div class="sc-ic"><i class="bi bi-pencil-square"></i></div>Tulis Berita</a>
    <a href="{{ route('dosen.index') }}"                class="sc"><div class="sc-ic"><i class="bi bi-person-workspace"></i></div>Kelola Dosen</a>
    <a href="{{ route('organisasi-mahasiswa.index') }}"  class="sc"><div class="sc-ic"><i class="bi bi-building"></i></div>Organisasi</a>
    <a href="{{ route('kurikulum.index') }}"             class="sc"><div class="sc-ic"><i class="bi bi-journal-bookmark-fill"></i></div>Kurikulum</a>
    <a href="{{ route('testimonial.index') }}"           class="sc"><div class="sc-ic"><i class="bi bi-chat-heart-fill"></i></div>Testimoni</a>
    <a href="{{ route('banner.index') }}"                class="sc"><div class="sc-ic"><i class="bi bi-image-fill"></i></div>Banner Hero</a>
    <a href="{{ route('gallery.index') }}"               class="sc"><div class="sc-ic"><i class="bi bi-images"></i></div>Galeri</a>
    <a href="{{ route('prestasi.index') }}"              class="sc"><div class="sc-ic"><i class="bi bi-trophy-fill"></i></div>Prestasi</a>
    <a href="{{ route('faculty-stat.index') }}"          class="sc"><div class="sc-ic"><i class="bi bi-bar-chart-fill"></i></div>Statistik PLD</a>
    <a href="{{ route('topbar.index') }}"                class="sc"><div class="sc-ic"><i class="bi bi-sliders"></i></div>Topbar</a>
    <a href="{{ route('user.index') }}"                  class="sc"><div class="sc-ic"><i class="bi bi-person-gear"></i></div>Pengguna</a>
    <a href="{{ url('/') }}" target="_blank"             class="sc"><div class="sc-ic"><i class="bi bi-globe2"></i></div>Buka Website</a>
  </div>
</div>

{{-- â•â• ORGANISASI â•â• --}}
@elseif($isOrganisasi && !$isAdmin)

<div class="kpi-grid mb-4">
  <div class="kpi kpi-emerald"><div class="kpi-icon"><i class="bi bi-building"></i></div><div class="kpi-num">{{ $totalOrganisasi }}</div><div class="kpi-label">Total Organisasi</div><div class="kpi-sub">Seluruh lembaga terdaftar</div></div>
  <div class="kpi kpi-teal"><div class="kpi-icon"><i class="bi bi-check-circle-fill"></i></div><div class="kpi-num">{{ $totalOrganisasiActive }}</div><div class="kpi-label">Lembaga Aktif</div><div class="kpi-sub">Status aktif saat ini</div></div>
  <div class="kpi kpi-orange"><div class="kpi-icon"><i class="bi bi-megaphone-fill"></i></div><div class="kpi-num">{{ $totalOrganisasiOprec }}</div><div class="kpi-label">Open Rekrutmen</div><div class="kpi-sub">Link pendaftaran aktif</div></div>
  <div class="kpi kpi-indigo"><div class="kpi-icon"><i class="bi bi-diagram-3-fill"></i></div><div class="kpi-num">{{ count($ormawaCategories) }}</div><div class="kpi-label">Kategori Lembaga</div><div class="kpi-sub">Jenis organisasi</div></div>
</div>

<div class="row g-4 mb-4">
  <div class="col-lg-5">
    <div class="panel h-100">
      <div class="ch-wrap">
        <div class="ch-title"><span class="ch-ic" style="background:rgba(6,214,160,.12);color:#047a56;"><i class="bi bi-pie-chart-fill"></i></span> Distribusi Kategori</div>
        <div class="ch-sub">Komposisi organisasi berdasarkan kategori</div>
        <div id="ormawaCategoryChart" style="min-height:280px;"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-7">
    <div class="panel h-100">
      <div class="ch-wrap">
        <div class="ch-title"><span class="ch-ic" style="background:rgba(6,214,160,.12);color:#047a56;"><i class="bi bi-lightning-charge-fill"></i></span> Aksi Cepat Pengurus</div>
        <div class="ch-sub mb-3">Kelola profil lembaga, susunan pengurus, dan informasi pendaftaran.</div>
        <div class="ai-list">
          <a href="{{ route('organisasi-mahasiswa.create') }}" class="ai green"><div class="ai-ic aic-g"><i class="bi bi-plus-circle-fill"></i></div><div><div>Tambah Organisasi Baru</div><small class="text-muted fw-normal">Daftarkan lembaga baru</small></div><i class="bi bi-chevron-right ms-auto text-muted"></i></a>
          <a href="{{ route('organisasi-mahasiswa.index') }}" class="ai green"><div class="ai-ic aic-g"><i class="bi bi-list-task"></i></div><div><div>Kelola Semua Organisasi</div><small class="text-muted fw-normal">Edit, aktifkan, nonaktifkan</small></div><i class="bi bi-chevron-right ms-auto text-muted"></i></a>
          <a href="{{ route('homepage.organisasi') }}" target="_blank" class="ai green"><div class="ai-ic aic-g"><i class="bi bi-eye-fill"></i></div><div><div>Pratinjau di Website</div><small class="text-muted fw-normal">Lihat tampilan publik</small></div><i class="bi bi-box-arrow-up-right ms-auto text-muted"></i></a>
          <a href="{{ url('/') }}" target="_blank" class="ai"><div class="ai-ic aic-o"><i class="bi bi-globe2"></i></div><div><div>Buka Portal PLD UIS</div><small class="text-muted fw-normal">Website utama fakultas</small></div><i class="bi bi-box-arrow-up-right ms-auto text-muted"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="panel">
  <div class="panel-head">
    <h3><span class="panel-head-ic" style="background:rgba(6,214,160,.12);color:#047a56;"><i class="bi bi-building"></i></span> Daftar Organisasi Mahasiswa</h3>
    <a href="{{ route('organisasi-mahasiswa.index') }}" class="pb pb-green">Kelola Semua <i class="bi bi-arrow-right"></i></a>
  </div>
  <div class="table-responsive">
    <table class="table tbl table-hover mb-0">
      <thead><tr><th>No</th><th>Nama Organisasi</th><th>Kategori</th><th>Ketua</th><th>Periode</th><th class="text-center">Status</th><th class="text-center">Aksi</th></tr></thead>
      <tbody>
      @forelse($latestOrganisasis as $o)
        <tr>
          <td class="fw-bold text-muted">{{ $loop->iteration }}</td>
          <td><div class="fw-bold">{{ $o->nama_organisasi }}</div>@if($o->singkatan)<small class="text-muted">{{ $o->singkatan }}</small>@endif</td>
          <td><span class="bd bd-sky">{{ $o->kategori }}</span></td>
          <td>{{ $o->nama_ketua ?: '-' }}</td>
          <td>{{ $o->periode ?: '-' }}</td>
          <td class="text-center">@if($o->is_active)<span class="bd bd-act"><i class="bi bi-check-circle-fill"></i> Aktif</span>@else<span class="bd bd-off">Nonaktif</span>@endif</td>
          <td class="text-center"><a href="{{ route('organisasi-mahasiswa.edit',$o->id) }}" class="btn btn-sm btn-warning text-white py-1 px-2"><i class="bi bi-pencil-fill"></i></a></td>
        </tr>
      @empty
        <tr><td colspan="7"><div class="empty-state"><i class="bi bi-inbox"></i><p>Belum ada organisasi.</p></div></td></tr>
      @endforelse
      </tbody>
    </table>
  </div>
</div>

{{-- â•â• PENULIS â•â• --}}
@elseif($isPenulis && !$isAdmin)

<div class="sp-row">
  <span class="sp sp-g"><i class="bi bi-check-circle-fill"></i> {{ $myNewsPublished }} Terpublikasi</span>
  <span class="sp sp-y"><i class="bi bi-hourglass-split"></i> {{ $myNewsDraft }} Draft</span>
  <span class="sp sp-v"><i class="bi bi-images"></i> {{ $totalGalleries }} Galeri</span>
</div>

<div class="kpi-grid kpi-grid-3 mb-4">
  <div class="kpi kpi-indigo"><div class="kpi-icon"><i class="bi bi-newspaper"></i></div><div class="kpi-num">{{ $totalNews }}</div><div class="kpi-label">Total Tulisan Saya</div><div class="kpi-sub">Semua artikel Anda</div></div>
  <div class="kpi kpi-emerald"><div class="kpi-icon"><i class="bi bi-check-circle-fill"></i></div><div class="kpi-num">{{ $myNewsPublished }}</div><div class="kpi-label">Terpublikasi</div><div class="kpi-sub">Sudah tayang di portal</div></div>
  <div class="kpi kpi-amber"><div class="kpi-icon"><i class="bi bi-hourglass-split"></i></div><div class="kpi-num">{{ $myNewsDraft }}</div><div class="kpi-label">Draft / Menunggu</div><div class="kpi-sub">Belum dipublikasikan</div></div>
</div>

<div class="row g-4 mb-4">
  <div class="col-lg-8">
    <div class="panel">
      <div class="ch-wrap">
        <div class="ch-title"><span class="ch-ic" style="background:rgba(67,97,238,.12);color:#4361ee;"><i class="bi bi-bar-chart-fill"></i></span> Tren Publikasi Artikel</div>
        <div class="ch-sub">Jumlah artikel yang Anda terbitkan dalam 6 bulan terakhir</div>
        <div id="newsMonthlyChart" style="min-height:270px;"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="panel h-100">
      <div class="ch-wrap">
        <div class="ch-title"><span class="ch-ic" style="background:rgba(67,97,238,.12);color:#4361ee;"><i class="bi bi-lightning-charge-fill"></i></span> Aksi Cepat</div>
        <div class="ch-sub mb-3">Menu penulis konten.</div>
        <div class="ai-list">
          <a href="{{ route('news.create') }}" class="ai blue"><div class="ai-ic aic-b"><i class="bi bi-plus-circle-fill"></i></div><div><div>Tulis Berita Baru</div><small class="text-muted fw-normal">Buat artikel baru</small></div><i class="bi bi-chevron-right ms-auto text-muted"></i></a>
          <a href="{{ route('news.index') }}" class="ai blue"><div class="ai-ic aic-b"><i class="bi bi-journal-text"></i></div><div><div>Semua Berita Saya</div><small class="text-muted fw-normal">Kelola tulisan</small></div><i class="bi bi-chevron-right ms-auto text-muted"></i></a>
          <a href="{{ route('gallery.index') }}" class="ai blue"><div class="ai-ic aic-b"><i class="bi bi-images"></i></div><div><div>Kelola Galeri</div><small class="text-muted fw-normal">Upload dokumentasi</small></div><i class="bi bi-chevron-right ms-auto text-muted"></i></a>
          <a href="{{ route('homepage.news') }}" target="_blank" class="ai"><div class="ai-ic aic-o"><i class="bi bi-globe"></i></div><div><div>Lihat Portal Berita</div><small class="text-muted fw-normal">Pratinjau publik</small></div><i class="bi bi-box-arrow-up-right ms-auto text-muted"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="panel">
  <div class="panel-head">
    <h3><span class="panel-head-ic" style="background:rgba(67,97,238,.12);color:#4361ee;"><i class="bi bi-newspaper"></i></span> Berita Terbaru Anda</h3>
    <a href="{{ route('news.create') }}" class="pb pb-indigo"><i class="bi bi-plus-circle-fill"></i> Tulis Baru</a>
  </div>
  <div class="table-responsive">
    <table class="table tbl table-hover mb-0">
      <thead><tr><th>Judul Berita</th><th>Kategori</th><th>Tanggal</th><th class="text-center">Status</th><th class="text-center">Aksi</th></tr></thead>
      <tbody>
      @forelse($latestNews as $n)
        <tr>
          <td class="fw-bold" style="max-width:280px;">{{ Str::limit($n->title ?? $n->judul,52) }}</td>
          <td><span class="bd bd-cat">{{ $n->category ?? 'Berita' }}</span></td>
          <td style="font-size:12.5px;color:var(--txt2);">{{ $n->created_at?$n->created_at->format('d M Y'):'-' }}</td>
          <td class="text-center">
            @if($n->status==='published')<span class="bd bd-pub"><i class="bi bi-check-circle-fill"></i> Live</span>
            @else<span class="bd bd-dft"><i class="bi bi-hourglass"></i> Draft</span>@endif
          </td>
          <td class="text-center"><a href="{{ route('news.edit',$n->id) }}" class="btn btn-sm btn-warning text-white py-1 px-2"><i class="bi bi-pencil-fill"></i></a></td>
        </tr>
      @empty
        <tr><td colspan="5"><div class="empty-state"><i class="bi bi-inbox"></i><p>Belum ada berita. <a href="{{ route('news.create') }}" class="fw-bold" style="color:#4361ee;">Tulis sekarang!</a></p></div></td></tr>
      @endforelse
      </tbody>
    </table>
  </div>
</div>

@else
<div class="panel text-center py-5">
  <div style="font-size:60px;">ðŸ‘‹</div>
  <h3 class="fw-bold mt-3 mb-2" style="color:var(--txt);">Selamat Datang!</h3>
  <p class="text-muted mb-4">Akun Anda belum memiliki role. Hubungi administrator.</p>
  <a href="{{ url('/') }}" target="_blank" class="dh-btn dh-btn-orange" style="display:inline-flex;"><i class="bi bi-globe2"></i> Buka Website PLD UIS</a>
</div>
@endif

</section>
@endsection

@push('scripts')
<script>
(function(){ const el=document.getElementById('live-clock'); if(!el)return; const t=()=>el.textContent=new Date().toLocaleTimeString('id-ID',{hour:'2-digit',minute:'2-digit',second:'2-digit'}); t(); setInterval(t,1000); })();

function initDashboardCharts(){
@php
  $cats  = array_keys($ormawaCategories);
  $cvals = array_values($ormawaCategories);
  $rvs   = [$testimonialRatings[1]??0,$testimonialRatings[2]??0,$testimonialRatings[3]??0,$testimonialRatings[4]??0,$testimonialRatings[5]??0];
@endphp
  const C={purple:'#56823D',orange:'#D99032',secondary:'#A8D27D',indigo:'#56823D',teal:'#446830',emerald:'#A8D27D',coral:'#D99032',amber:'#f59e0b',rose:'#ec4899',navy:'#263238'};
  const bar=(data,months)=>({
    chart:{type:'bar',height:270,toolbar:{show:false},fontFamily:'Plus Jakarta Sans,sans-serif',dropShadow:{enabled:true,top:3,blur:6,opacity:.07}},
    series:[{name:'Publikasi',data}], colors:[C.indigo],
    plotOptions:{bar:{borderRadius:10,borderRadiusApplication:'end',columnWidth:'50%'}},
    fill:{type:'gradient',gradient:{shade:'light',type:'vertical',shadeIntensity:.2,gradientToColors:[C.teal],opacityFrom:1,opacityTo:.8,stops:[0,100]}},
    dataLabels:{enabled:true,style:{fontSize:'12px',fontWeight:'700',colors:['#fff']},background:{enabled:false}},
    xaxis:{categories:months,labels:{style:{fontSize:'12px',colors:'#9185a8'}},axisBorder:{show:false},axisTicks:{show:false}},
    yaxis:{labels:{formatter:v=>Math.floor(v),style:{fontSize:'12px',colors:'#9185a8'}}},
    grid:{borderColor:'#ede4f2',strokeDashArray:4},tooltip:{theme:'dark'},
  });
  const donut=(size,total,cats,vals,colors)=>({
    chart:{type:'donut',height:size,fontFamily:'Plus Jakarta Sans,sans-serif'},
    series:vals, labels:cats, colors:colors,
    legend:{position:'bottom',fontSize:'11px',fontFamily:'Plus Jakarta Sans,sans-serif'},
    stroke:{width:3,colors:['#fff']},
    plotOptions:{pie:{donut:{size:'68%',labels:{show:true,name:{show:true,fontSize:'12px',fontWeight:'700'},value:{show:true,fontSize:'22px',fontWeight:'900',color:'#1a0a2e'},total:{show:true,label:'Total',fontSize:'12px',fontWeight:'700',color:'#1a0a2e',formatter:()=>String(total)}}}}},
    dataLabels:{enabled:false},tooltip:{theme:'dark'},
  });

@if($isOrganisasi && !$isAdmin)
  (function(){ const el=document.getElementById('ormawaCategoryChart'); if(!el)return; new ApexCharts(el,donut(280,{{ $totalOrganisasi }},{!! json_encode(!empty($cats)?$cats:['BEM','HIMA','UKM','Komunitas']) !!},{!! json_encode(!empty($cvals)?$cvals:[1,2,1,1]) !!},[C.emerald,C.orange,C.teal,C.coral,C.indigo,C.purple])).render(); })();
@endif

@if($isPenulis && !$isAdmin)
  (function(){ const el=document.getElementById('newsMonthlyChart'); if(!el)return; new ApexCharts(el,bar({!! json_encode($newsMonthlyCounts) !!},{!! json_encode($months) !!})).render(); })();
@endif

@if($isAdmin)
  (function(){ const el=document.getElementById('adminNewsChart'); if(!el)return; new ApexCharts(el,bar({!! json_encode($newsMonthlyCounts) !!},{!! json_encode($months) !!})).render(); })();
  (function(){ const el=document.getElementById('adminOrmawaChart'); if(!el)return; new ApexCharts(el,donut(260,{{ $totalOrganisasi }},{!! json_encode(!empty($cats)?$cats:['BEM','HIMA','UKM','Komunitas']) !!},{!! json_encode(!empty($cvals)?$cvals:[1,2,1,1]) !!},[C.purple,C.orange,C.teal,C.coral,C.indigo,C.emerald])).render(); })();
  (function(){
    const el=document.getElementById('testimonialRadarChart'); if(!el)return;
    new ApexCharts(el,{
      chart:{type:'radar',height:260,toolbar:{show:false},fontFamily:'Plus Jakarta Sans,sans-serif',dropShadow:{enabled:true,blur:4,opacity:.08}},
      series:[{name:'Testimoni',data:{!! json_encode($rvs) !!}}],
      xaxis:{categories:['1 Bintang','2 Bintang','3 Bintang','4 Bintang','5 Bintang']}, colors:[C.amber],
      fill:{opacity:.35,type:'gradient',gradient:{shade:'dark',gradientToColors:[C.coral],opacityFrom:.5,opacityTo:.2}},
      stroke:{width:2.5,colors:[C.amber]}, markers:{size:5,colors:['#fff'],strokeColors:C.amber,strokeWidth:2},
      yaxis:{show:false},
      plotOptions:{radar:{polygons:{strokeColors:'#ede4f2',strokeWidth:1,connectorColors:'#ede4f2',fill:{colors:['#fdf9ff','#f5f0fa']}}}},
      tooltip:{theme:'dark'},
    }).render();
  })();
@endif
}

// Load ApexCharts then init charts
(function(){
  if(typeof ApexCharts !== 'undefined'){
    initDashboardCharts();
  } else {
    var s = document.createElement('script');
    s.src = 'https://cdn.jsdelivr.net/npm/apexcharts';
    s.onload = function(){ initDashboardCharts(); };
    document.head.appendChild(s);
  }
})();
</script>
@endpush
