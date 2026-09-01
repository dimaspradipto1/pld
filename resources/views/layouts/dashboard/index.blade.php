@extends('layouts.dashboard.template')

@push('styles')
<style>
:root {
  --dp: #190a24; --mp: #823ca2; --lp: #b76ed1;
  --gold: #f5a623; --teal: #00b4a6; --coral: #ff6b6b;
  --indigo: #4361ee; --emerald: #06d6a0; --bg: #f4f0f8;
}
body { background: var(--bg) !important; }

.db-hero {
  background: linear-gradient(135deg,#190a24 0%,#3d1257 45%,#6a1e9e 80%,#823ca2 100%);
  border-radius: 22px; padding: 30px 36px; color: #fff;
  position: relative; overflow: hidden; margin-bottom: 28px;
  box-shadow: 0 16px 48px rgba(130,60,162,.3);
}
.db-hero::before {
  content:''; position:absolute; top:-80px; right:-80px;
  width:280px; height:280px; border-radius:50%;
  background:radial-gradient(circle,rgba(245,166,35,.25) 0%,transparent 70%);
}
.db-hero::after {
  content:''; position:absolute; bottom:-60px; left:20%;
  width:220px; height:220px; border-radius:50%;
  background:radial-gradient(circle,rgba(0,180,166,.15) 0%,transparent 70%);
}
.db-hero-role {
  display:inline-flex; align-items:center; gap:6px;
  background:rgba(245,166,35,.2); border:1px solid rgba(245,166,35,.5);
  color:#f5a623; font-size:12px; font-weight:700;
  padding:4px 12px; border-radius:30px; letter-spacing:.5px; margin-bottom:10px;
}
.db-hero h2 { font-size:clamp(1.3rem,3vw,1.9rem); font-weight:800; margin-bottom:6px; }
.db-hero p  { color:rgba(255,255,255,.72); font-size:14.5px; max-width:640px; }
.db-hero-btn {
  background:linear-gradient(135deg,#f5a623,#ff6b35); border:none;
  color:#fff; font-weight:700; font-size:13.5px; padding:10px 22px;
  border-radius:12px; box-shadow:0 4px 14px rgba(245,166,35,.4);
  transition:all .25s; text-decoration:none;
  display:inline-flex; align-items:center; gap:7px;
}
.db-hero-btn:hover { transform:translateY(-2px); box-shadow:0 8px 24px rgba(245,166,35,.5); color:#fff; }

/* KPI CARDS */
.kpi-row { display:flex; gap:16px; flex-wrap:wrap; margin-bottom:24px; }
.kpi-card {
  flex:1; min-width:200px; border-radius:18px; padding:22px;
  color:#fff; position:relative; overflow:hidden;
  box-shadow:0 8px 28px rgba(0,0,0,.12);
  transition:transform .25s,box-shadow .25s;
}
.kpi-card:hover { transform:translateY(-5px); box-shadow:0 16px 40px rgba(0,0,0,.18); }
.kpi-card::after {
  content:''; position:absolute; top:-30px; right:-30px;
  width:100px; height:100px; border-radius:50%;
  background:rgba(255,255,255,.12);
}
.kpi-card::before {
  content:''; position:absolute; bottom:-40px; right:30px;
  width:80px; height:80px; border-radius:50%;
  background:rgba(255,255,255,.08);
}
.kpi-num  { font-size:2.4rem; font-weight:900; line-height:1; letter-spacing:-1px; }
.kpi-sub  { font-size:13px; font-weight:500; opacity:.85; margin-top:4px; }
.kpi-icon {
  width:46px; height:46px; border-radius:12px;
  background:rgba(255,255,255,.2);
  display:flex; align-items:center; justify-content:center;
  font-size:22px; margin-bottom:14px;
}
.kpi-purple  { background:linear-gradient(135deg,#823ca2,#b45fcf); }
.kpi-gold    { background:linear-gradient(135deg,#f5a623,#ff8c42); }
.kpi-teal    { background:linear-gradient(135deg,#00b4a6,#00d4c8); }
.kpi-indigo  { background:linear-gradient(135deg,#4361ee,#7b88ff); }
.kpi-coral   { background:linear-gradient(135deg,#ff6b6b,#ff9a9a); }
.kpi-emerald { background:linear-gradient(135deg,#06d6a0,#02f0b3); }
.kpi-rose    { background:linear-gradient(135deg,#e91e63,#f06292); }
.kpi-navy    { background:linear-gradient(135deg,#1a237e,#3949ab); }

/* CHART CARDS */
.ch-card {
  background:#fff; border-radius:18px;
  border:1px solid #ede4f2;
  box-shadow:0 4px 20px rgba(0,0,0,.05);
  padding:24px; height:100%;
}
.ch-hdr {
  display:flex; align-items:center; justify-content:space-between;
  padding-bottom:14px; border-bottom:1px solid #f2e9f7; margin-bottom:18px;
}
.ch-title { font-size:15px; font-weight:700; color:#1a0528; margin:0; display:flex; align-items:center; gap:8px; }
.ch-badge {
  font-size:11px; padding:4px 10px; border-radius:20px; font-weight:600;
  background:#f2e9f7; color:#823ca2; border:1px solid #ddc7f0;
}

/* DATA TABLES */
.dt-card {
  background:#fff; border-radius:18px;
  border:1px solid #ede4f2;
  box-shadow:0 4px 20px rgba(0,0,0,.05);
  overflow:hidden; margin-bottom:24px;
}
.dt-card-hdr {
  display:flex; align-items:center; justify-content:space-between;
  padding:18px 22px; border-bottom:1px solid #f2e9f7;
  background:linear-gradient(135deg,#faf7fc,#f2e9f7);
}
.dt-card-hdr h3 { font-size:15px; font-weight:700; color:#1a0528; margin:0; display:flex; align-items:center; gap:8px; }
.dt-body { padding:0 4px 4px; }
.dt-body .table { margin:0; }
.dt-body .table thead th {
  background:#faf7fc; font-size:12px; font-weight:700;
  text-transform:uppercase; letter-spacing:.5px; color:#6e6e7a;
  padding:12px 16px; border-bottom:1px solid #ede4f2;
}
.dt-body .table tbody td { padding:12px 16px; vertical-align:middle; font-size:13.5px; }
.dt-body .table tbody tr:hover { background:#fdf9ff; }

/* SHORTCUTS */
.sc-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(130px,1fr)); gap:14px; }
.sc-item {
  display:flex; flex-direction:column; align-items:center;
  padding:18px 10px; border-radius:16px;
  background:#faf7fc; border:1.5px solid #eddff5;
  text-decoration:none; color:#1a0528;
  font-size:13px; font-weight:600; text-align:center; gap:8px;
  transition:all .22s;
}
.sc-item:hover {
  background:linear-gradient(135deg,#823ca2,#b45fcf);
  border-color:#823ca2; color:#fff;
  transform:translateY(-3px);
  box-shadow:0 8px 22px rgba(130,60,162,.3);
}
.sc-item:hover .sc-ic { background:rgba(255,255,255,.25); color:#fff; }
.sc-ic {
  width:44px; height:44px; border-radius:12px;
  background:rgba(130,60,162,.12); color:#823ca2;
  display:flex; align-items:center; justify-content:center;
  font-size:20px; transition:all .22s;
}
.star-mini { color:#f5a623; font-size:14px; letter-spacing:1px; }
.badge-tayang  { background:#e6f9f2; color:#059669; border:1px solid #a7f3d0; font-size:11px; }
.badge-pending { background:#fef3c7; color:#b45309; border:1px solid #fde68a; font-size:11px; }
.badge-prodi   { background:#ede9fe; color:#6d28d9; border:1px solid #ddd6fe; font-size:11px; }

@media(max-width:767px) {
  .kpi-row { gap:12px; }
  .kpi-card { min-width:calc(50% - 6px); }
  .db-hero { padding:22px 20px; }
}
@media(max-width:480px) { .kpi-card { min-width:100%; } }
</style>
@endpush

@section('content')
<div class="pagetitle mb-3">
    <h1>Dashboard Portal FIKES UIS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

{{-- HERO BANNER --}}
<div class="db-hero">
    <div class="row align-items-center">
        <div class="col-lg-8">
            <div class="db-hero-role">
                <i class="bi bi-patch-check-fill"></i>
                @if($isAdmin) Super Administrator
                @elseif($isOrganisasi && $isPenulis) Pengelola Organisasi & Penulis
                @elseif($isOrganisasi) Pengelola Organisasi Mahasiswa
                @elseif($isPenulis) Penulis Berita & Konten
                @else Pengguna Portal
                @endif
            </div>
            <div class="text-white-50 small mb-2">
                <i class="bi bi-calendar3 me-1"></i>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
            <h2 class="text-white">Selamat Datang, <span style="color:#f5a623;">{{ $user->name }}</span>! 👋</h2>
            <p>
                @if($isAdmin) Pantau dan kelola seluruh konten portal web FIKES UIS dari satu tempat — akademik, kemahasiswaan, publikasi, dan pengaturan sistem.
                @elseif($isOrganisasi) Kelola profil lembaga kemahasiswaan, kegiatan, susunan pengurus, dan link pendaftaran anggota baru.
                @elseif($isPenulis) Tulis, edit, dan terbitkan berita, pengumuman resmi, dan liputan kegiatan akademik FIKES UIS.
                @else Selamat datang di sistem manajemen portal web FIKES UIS.
                @endif
            </p>
        </div>
        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0" style="position:relative;z-index:1;">
            <a href="{{ url('/') }}" target="_blank" class="db-hero-btn">
                <i class="bi bi-globe2"></i> Buka Website Utama
            </a>
        </div>
    </div>
</div>

<section class="section dashboard">

@if($isOrganisasi && !$isAdmin)
{{-- ══ ROLE: ORGANISASI ══ --}}
<div class="kpi-row">
    <div class="kpi-card kpi-purple"><div class="kpi-icon"><i class="bi bi-people-fill"></i></div><div class="kpi-num">{{ $totalOrganisasi }}</div><div class="kpi-sub">Total Organisasi</div></div>
    <div class="kpi-card kpi-emerald"><div class="kpi-icon"><i class="bi bi-check-circle-fill"></i></div><div class="kpi-num">{{ $totalOrganisasiActive }}</div><div class="kpi-sub">Aktif</div></div>
    <div class="kpi-card kpi-gold"><div class="kpi-icon"><i class="bi bi-megaphone-fill"></i></div><div class="kpi-num">{{ $totalOrganisasiOprec }}</div><div class="kpi-sub">Oprec Terbuka</div></div>
    <div class="kpi-card kpi-indigo"><div class="kpi-icon"><i class="bi bi-diagram-3-fill"></i></div><div class="kpi-num">{{ count($ormawaCategories) }}</div><div class="kpi-sub">Kategori Lembaga</div></div>
</div>
<div class="row g-4 mb-4">
    <div class="col-lg-5">
        <div class="ch-card">
            <div class="ch-hdr"><h3 class="ch-title"><i class="bi bi-pie-chart-fill" style="color:#823ca2;"></i>Distribusi Kategori</h3><span class="ch-badge">Donut</span></div>
            <div id="ormawaCategoryChart" style="min-height:280px;"></div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="ch-card">
            <div class="ch-hdr"><h3 class="ch-title"><i class="bi bi-lightning-charge-fill" style="color:#f5a623;"></i>Aksi Cepat Pengurus</h3></div>
            <p class="text-muted small mb-3">Kelola profil lembaga, susunan pengurus, dan informasi pendaftaran anggota baru.</p>
            <div class="sc-grid" style="grid-template-columns:repeat(3,1fr);">
                <a href="{{ route('organisasi-mahasiswa.create') }}" class="sc-item"><div class="sc-ic"><i class="bi bi-plus-circle-fill"></i></div><span>Tambah</span></a>
                <a href="{{ route('organisasi-mahasiswa.index') }}" class="sc-item"><div class="sc-ic"><i class="bi bi-list-task"></i></div><span>Kelola Data</span></a>
                <a href="{{ route('homepage.organisasi') }}" target="_blank" class="sc-item"><div class="sc-ic"><i class="bi bi-eye-fill"></i></div><span>Pratinjau</span></a>
            </div>
        </div>
    </div>
</div>
<div class="dt-card">
    <div class="dt-card-hdr"><h3><i class="bi bi-people-fill" style="color:#823ca2;"></i>Daftar Organisasi Mahasiswa</h3><a href="{{ route('organisasi-mahasiswa.index') }}" class="btn btn-sm" style="background:#823ca2;color:#fff;border-radius:8px;">Kelola Semua</a></div>
    <div class="dt-body"><div class="table-responsive"><table class="table table-hover align-middle mb-0">
        <thead><tr><th>No</th><th>Nama Organisasi</th><th>Kategori</th><th>Ketua</th><th>Periode</th><th class="text-center">Status</th><th class="text-center">Aksi</th></tr></thead>
        <tbody>
        @forelse($latestOrganisasis as $orm)
            <tr>
                <td class="text-muted">{{ $loop->iteration }}</td>
                <td><div class="fw-bold">{{ $orm->nama_organisasi }}</div>@if($orm->singkatan)<small class="text-muted">{{ $orm->singkatan }}</small>@endif</td>
                <td><span class="badge badge-prodi">{{ $orm->kategori }}</span></td>
                <td>{{ $orm->nama_ketua ?: '-' }}</td>
                <td>{{ $orm->periode ?: '-' }}</td>
                <td class="text-center">@if($orm->is_active)<span class="badge badge-tayang">Aktif</span>@else<span class="badge bg-secondary" style="font-size:11px;">Nonaktif</span>@endif</td>
                <td class="text-center"><a href="{{ route('organisasi-mahasiswa.edit', $orm->id) }}" class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil-fill"></i></a></td>
            </tr>
        @empty
            <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data.</td></tr>
        @endforelse
        </tbody>
    </table></div></div>
</div>

@elseif($isPenulis && !$isAdmin)
{{-- ══ ROLE: PENULIS ══ --}}
<div class="kpi-row">
    <div class="kpi-card kpi-indigo"><div class="kpi-icon"><i class="bi bi-newspaper"></i></div><div class="kpi-num">{{ $totalNews }}</div><div class="kpi-sub">Total Tulisan</div></div>
    <div class="kpi-card kpi-emerald"><div class="kpi-icon"><i class="bi bi-check-circle-fill"></i></div><div class="kpi-num">{{ $myNewsPublished }}</div><div class="kpi-sub">Terpublikasi</div></div>
    <div class="kpi-card kpi-gold"><div class="kpi-icon"><i class="bi bi-hourglass-split"></i></div><div class="kpi-num">{{ $myNewsDraft }}</div><div class="kpi-sub">Draft / Pending</div></div>
    <div class="kpi-card kpi-purple"><div class="kpi-icon"><i class="bi bi-images"></i></div><div class="kpi-num">{{ $totalGalleries }}</div><div class="kpi-sub">Foto Dokumentasi</div></div>
</div>
<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="ch-card">
            <div class="ch-hdr"><h3 class="ch-title"><i class="bi bi-bar-chart-fill" style="color:#4361ee;"></i>Tren Publikasi Artikel (6 Bulan)</h3><span class="ch-badge">Bar Chart</span></div>
            <div id="newsMonthlyChart" style="min-height:290px;"></div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ch-card">
            <div class="ch-hdr"><h3 class="ch-title"><i class="bi bi-pencil-fill" style="color:#f5a623;"></i>Menu Penulis</h3></div>
            <div class="d-flex flex-column gap-2">
                <a href="{{ route('news.create') }}" class="sc-item" style="flex-direction:row;justify-content:flex-start;"><div class="sc-ic"><i class="bi bi-plus-circle-fill"></i></div><span>Tulis Berita Baru</span></a>
                <a href="{{ route('news.index') }}" class="sc-item" style="flex-direction:row;justify-content:flex-start;"><div class="sc-ic"><i class="bi bi-journal-text"></i></div><span>Semua Berita Saya</span></a>
                <a href="{{ route('homepage.news') }}" target="_blank" class="sc-item" style="flex-direction:row;justify-content:flex-start;"><div class="sc-ic"><i class="bi bi-globe"></i></div><span>Lihat Portal Berita</span></a>
            </div>
        </div>
    </div>
</div>
<div class="dt-card">
    <div class="dt-card-hdr"><h3><i class="bi bi-newspaper" style="color:#823ca2;"></i>Berita Terbaru Anda</h3><a href="{{ route('news.index') }}" class="btn btn-sm" style="background:#823ca2;color:#fff;border-radius:8px;">Kelola Semua</a></div>
    <div class="dt-body"><div class="table-responsive"><table class="table table-hover align-middle mb-0">
        <thead><tr><th>Judul Berita</th><th>Kategori</th><th>Tanggal</th><th class="text-center">Status</th><th class="text-center">Aksi</th></tr></thead>
        <tbody>
        @forelse($latestNews as $n)
            <tr>
                <td class="fw-semibold">{{ Str::limit($n->title ?? $n->judul, 55) }}</td>
                <td><span class="badge badge-prodi">{{ $n->category ?? 'Berita' }}</span></td>
                <td class="text-muted small">{{ $n->created_at ? $n->created_at->format('d M Y') : '-' }}</td>
                <td class="text-center">@if($n->status === 'published')<span class="badge badge-tayang">Published</span>@else<span class="badge badge-pending">Draft</span>@endif</td>
                <td class="text-center"><a href="{{ route('news.edit', $n->id) }}" class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil-fill"></i></a></td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center text-muted py-4">Anda belum menulis berita.</td></tr>
        @endforelse
        </tbody>
    </table></div></div>
</div>

@else
{{-- ══ ROLE: SUPER ADMIN ══ --}}

{{-- KPI Row 1 --}}
<div class="kpi-row">
    <div class="kpi-card kpi-indigo"><div class="kpi-icon"><i class="bi bi-newspaper"></i></div><div class="kpi-num">{{ $totalNews }}</div><div class="kpi-sub">Berita & Informasi</div></div>
    <div class="kpi-card kpi-purple"><div class="kpi-icon"><i class="bi bi-person-workspace"></i></div><div class="kpi-num">{{ $totalDosen }}</div><div class="kpi-sub">Dosen & Pengajar</div></div>
    <div class="kpi-card kpi-gold"><div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div><div class="kpi-num">{{ $totalLayanan }}</div><div class="kpi-sub">Program Studi</div></div>
    <div class="kpi-card kpi-emerald"><div class="kpi-icon"><i class="bi bi-people-fill"></i></div><div class="kpi-num">{{ $totalOrganisasi }}</div><div class="kpi-sub">Organisasi Mahasiswa</div></div>
</div>
{{-- KPI Row 2 --}}
<div class="kpi-row">
    <div class="kpi-card kpi-teal"><div class="kpi-icon"><i class="bi bi-trophy-fill"></i></div><div class="kpi-num">{{ $totalPrestasi }}</div><div class="kpi-sub">Prestasi Mahasiswa</div></div>
    <div class="kpi-card kpi-coral"><div class="kpi-icon"><i class="bi bi-chat-heart-fill"></i></div><div class="kpi-num">{{ $totalTestimonials }}</div><div class="kpi-sub">Testimoni Civitas</div></div>
    <div class="kpi-card kpi-rose"><div class="kpi-icon"><i class="bi bi-images"></i></div><div class="kpi-num">{{ $totalGalleries }}</div><div class="kpi-sub">Dokumentasi Galeri</div></div>
    <div class="kpi-card kpi-navy"><div class="kpi-icon"><i class="bi bi-person-gear"></i></div><div class="kpi-num">{{ $totalUsers }}</div><div class="kpi-sub">Pengguna Sistem</div></div>
</div>

{{-- 3 CHARTS ROW --}}
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="ch-card">
            <div class="ch-hdr"><h3 class="ch-title"><i class="bi bi-bar-chart-fill" style="color:#4361ee;"></i>Tren Publikasi Berita (6 Bulan)</h3><span class="ch-badge">Bar</span></div>
            <div id="adminNewsChart" style="min-height:300px;"></div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ch-card">
            <div class="ch-hdr"><h3 class="ch-title"><i class="bi bi-pie-chart-fill" style="color:#823ca2;"></i>Distribusi Ormawa</h3><a href="{{ route('organisasi-mahasiswa.index') }}" class="ch-badge" style="text-decoration:none;">Kelola</a></div>
            <div id="adminOrmawaChart" style="min-height:300px;"></div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ch-card">
            <div class="ch-hdr"><h3 class="ch-title"><i class="bi bi-star-fill" style="color:#f5a623;"></i>Rating Testimoni</h3><span class="ch-badge">Radar</span></div>
            <div id="testimonialRadarChart" style="min-height:300px;"></div>
        </div>
    </div>
</div>

{{-- RECENT DATA ROW --}}
<div class="row g-4 mb-4">
    <div class="col-lg-7">
        <div class="dt-card h-100" style="margin-bottom:0;">
            <div class="dt-card-hdr"><h3><i class="bi bi-newspaper" style="color:#4361ee;"></i>Berita & Informasi Terkini</h3><a href="{{ route('news.index') }}" class="btn btn-sm" style="background:#4361ee;color:#fff;border-radius:8px;font-size:12px;">Lihat Semua</a></div>
            <div class="dt-body"><div class="table-responsive"><table class="table table-hover align-middle mb-0">
                <thead><tr><th>Judul Berita</th><th>Kategori</th><th>Tanggal</th><th class="text-center">Aksi</th></tr></thead>
                <tbody>
                @forelse($latestNews as $news)
                    <tr>
                        <td><div class="fw-semibold" style="font-size:13.5px;">{{ Str::limit($news->title ?? $news->judul, 45) }}</div><small class="text-muted">{{ $news->status === 'published' ? 'Published' : 'Draft' }}</small></td>
                        <td><span class="badge badge-prodi">{{ $news->category ?? 'Berita' }}</span></td>
                        <td class="text-muted small">{{ $news->created_at ? $news->created_at->format('d M Y') : '-' }}</td>
                        <td class="text-center"><a href="{{ route('news.edit', $news->id) }}" class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil-fill"></i></a></td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted py-4">Belum ada berita.</td></tr>
                @endforelse
                </tbody>
            </table></div></div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="dt-card h-100" style="margin-bottom:0;">
            <div class="dt-card-hdr"><h3><i class="bi bi-chat-heart-fill" style="color:#f5a623;"></i>Testimoni Terbaru</h3><a href="{{ route('testimonial.index') }}" class="btn btn-sm" style="background:#f5a623;color:#fff;border-radius:8px;font-size:12px;">Kelola</a></div>
            <div class="dt-body"><div class="table-responsive"><table class="table table-hover align-middle mb-0">
                <thead><tr><th>Pengirim</th><th class="text-center">Rating</th><th class="text-center">Status</th></tr></thead>
                <tbody>
                @forelse($latestTestimonials as $testi)
                    <tr>
                        <td><div class="fw-semibold" style="font-size:13.5px;">{{ $testi->nama }}</div><small class="text-muted d-block text-truncate" style="max-width:170px;">{{ $testi->pesan }}</small></td>
                        <td class="text-center"><span class="star-mini">{{ str_repeat('★',(int)$testi->bintang) }}</span><div style="font-size:11px;color:#6e6e7a;">{{ $testi->bintang }}/5</div></td>
                        <td class="text-center">@if($testi->aktif)<span class="badge badge-tayang">Tayang</span>@else<span class="badge badge-pending">Pending</span>@endif</td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center text-muted py-4">Belum ada testimoni.</td></tr>
                @endforelse
                </tbody>
            </table></div></div>
        </div>
    </div>
</div>

{{-- SHORTCUTS --}}
<div class="ch-card">
    <div class="ch-hdr"><h3 class="ch-title"><i class="bi bi-grid-fill" style="color:#823ca2;"></i>Pintasan Akses Cepat Administrator</h3></div>
    <div class="sc-grid">
        <a href="{{ route('news.create') }}" class="sc-item"><div class="sc-ic"><i class="bi bi-pencil-square"></i></div><span>Tulis Berita</span></a>
        <a href="{{ route('dosen.index') }}" class="sc-item"><div class="sc-ic"><i class="bi bi-person-workspace"></i></div><span>Kelola Dosen</span></a>
        <a href="{{ route('organisasi-mahasiswa.index') }}" class="sc-item"><div class="sc-ic"><i class="bi bi-people-fill"></i></div><span>Organisasi</span></a>
        <a href="{{ route('kurikulum.index') }}" class="sc-item"><div class="sc-ic"><i class="bi bi-journal-bookmark-fill"></i></div><span>Kurikulum</span></a>
        <a href="{{ route('testimonial.index') }}" class="sc-item"><div class="sc-ic"><i class="bi bi-chat-heart-fill"></i></div><span>Testimoni</span></a>
        <a href="{{ route('banner.index') }}" class="sc-item"><div class="sc-ic"><i class="bi bi-image-fill"></i></div><span>Banner Hero</span></a>
        <a href="{{ route('gallery.index') }}" class="sc-item"><div class="sc-ic"><i class="bi bi-images"></i></div><span>Galeri</span></a>
        <a href="{{ route('prestasi.index') }}" class="sc-item"><div class="sc-ic"><i class="bi bi-trophy-fill"></i></div><span>Prestasi</span></a>
        <a href="{{ route('faculty-stat.index') }}" class="sc-item"><div class="sc-ic"><i class="bi bi-bar-chart-fill"></i></div><span>Statistik FIKES</span></a>
        <a href="{{ route('topbar.index') }}" class="sc-item"><div class="sc-ic"><i class="bi bi-sliders"></i></div><span>Topbar</span></a>
        <a href="{{ route('user.index') }}" class="sc-item"><div class="sc-ic"><i class="bi bi-person-gear"></i></div><span>Pengguna</span></a>
        <a href="{{ url('/') }}" target="_blank" class="sc-item"><div class="sc-ic"><i class="bi bi-globe2"></i></div><span>Buka Website</span></a>
    </div>
</div>
@endif

</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    @php
        $chartCategories     = array_keys($ormawaCategories);
        $chartCategoryCounts = array_values($ormawaCategories);
        $ratingValues        = [
            $testimonialRatings[1] ?? 0,
            $testimonialRatings[2] ?? 0,
            $testimonialRatings[3] ?? 0,
            $testimonialRatings[4] ?? 0,
            $testimonialRatings[5] ?? 0,
        ];
    @endphp

    const C = {
        purple:'#823ca2', indigo:'#4361ee', teal:'#00b4a6',
        gold:'#f5a623',   coral:'#ff6b6b',  emerald:'#06d6a0',
        rose:'#e91e63',   navy:'#1a237e',
    };

    @if($isOrganisasi && !$isAdmin)
    (function(){
        const el = document.getElementById('ormawaCategoryChart');
        if (!el) return;
        new ApexCharts(el, {
            chart:{ type:'donut', height:280, fontFamily:'Inter,sans-serif' },
            series:{!! json_encode(!empty($chartCategoryCounts)?$chartCategoryCounts:[1,2,1,1]) !!},
            labels:{!! json_encode(!empty($chartCategories)?$chartCategories:['BEM','HIMA','UKM','Komunitas']) !!},
            colors:[C.purple,C.gold,C.teal,C.coral,C.indigo,C.emerald],
            legend:{ position:'bottom', fontSize:'12px' },
            stroke:{ width:2, colors:['#fff'] },
            plotOptions:{ pie:{ donut:{ size:'68%', labels:{ show:true, total:{ show:true, label:'Total', fontSize:'13px', fontWeight:'700', formatter:()=>'{{ $totalOrganisasi }}' }}}}},
            dataLabels:{ style:{ fontSize:'12px' } },
        }).render();
    })();
    @endif

    @if($isPenulis && !$isAdmin)
    (function(){
        const el = document.getElementById('newsMonthlyChart');
        if (!el) return;
        new ApexCharts(el, {
            chart:{ type:'bar', height:290, toolbar:{ show:false }, fontFamily:'Inter,sans-serif' },
            series:[{ name:'Artikel Diterbitkan', data:{!! json_encode($newsMonthlyCounts) !!} }],
            colors:[C.indigo],
            plotOptions:{ bar:{ borderRadius:8, columnWidth:'55%' } },
            dataLabels:{ enabled:true, style:{ fontSize:'12px', colors:['#fff'] } },
            xaxis:{ categories:{!! json_encode($months) !!}, axisBorder:{ show:false }, axisTicks:{ show:false } },
            yaxis:{ labels:{ formatter:v=>Math.floor(v) } },
            grid:{ borderColor:'#f2e9f7', strokeDashArray:4 },
            fill:{ type:'gradient', gradient:{ shade:'light', type:'vertical', shadeIntensity:.3, gradientToColors:[C.teal], opacityFrom:1, opacityTo:.8, stops:[0,100] }},
        }).render();
    })();
    @endif

    @if($isAdmin)
    // BAR CHART
    (function(){
        const el = document.getElementById('adminNewsChart');
        if (!el) return;
        new ApexCharts(el, {
            chart:{ type:'bar', height:300, toolbar:{ show:false }, fontFamily:'Inter,sans-serif', dropShadow:{ enabled:true, top:4, blur:6, opacity:.08 } },
            series:[{ name:'Publikasi Berita', data:{!! json_encode($newsMonthlyCounts) !!} }],
            colors:[C.indigo],
            plotOptions:{ bar:{ borderRadius:9, borderRadiusApplication:'end', columnWidth:'52%' } },
            fill:{ type:'gradient', gradient:{ shade:'light', type:'vertical', shadeIntensity:.25, gradientToColors:[C.teal], opacityFrom:1, opacityTo:.75, stops:[0,100] }},
            dataLabels:{ enabled:true, style:{ fontSize:'12px', fontWeight:'700', colors:['#fff'] }, background:{ enabled:false } },
            xaxis:{ categories:{!! json_encode($months) !!}, labels:{ style:{ fontSize:'12px', colors:'#6e6e7a' }}, axisBorder:{ show:false }, axisTicks:{ show:false } },
            yaxis:{ labels:{ formatter:v=>Math.floor(v), style:{ fontSize:'12px', colors:'#6e6e7a' }}},
            grid:{ borderColor:'#f2e9f7', strokeDashArray:4 },
            tooltip:{ theme:'dark' },
        }).render();
    })();

    // DONUT CHART
    (function(){
        const el = document.getElementById('adminOrmawaChart');
        if (!el) return;
        new ApexCharts(el, {
            chart:{ type:'donut', height:300, fontFamily:'Inter,sans-serif' },
            series:{!! json_encode(!empty($chartCategoryCounts)?$chartCategoryCounts:[1,2,1,1]) !!},
            labels:{!! json_encode(!empty($chartCategories)?$chartCategories:['BEM','HIMA','UKM','Komunitas']) !!},
            colors:[C.purple,C.gold,C.teal,C.coral,C.indigo,C.emerald],
            legend:{ position:'bottom', fontSize:'11px', offsetY:4 },
            stroke:{ width:3, colors:['#fff'] },
            plotOptions:{ pie:{ donut:{ size:'70%', labels:{ show:true, name:{ show:true, fontSize:'13px', fontWeight:'700' }, value:{ show:true, fontSize:'22px', fontWeight:'900', color:'#1a0528' }, total:{ show:true, label:'Ormawa', fontSize:'12px', fontWeight:'600', color:'#6e6e7a', formatter:()=>'{{ $totalOrganisasi }}' }}}}},
            dataLabels:{ enabled:false },
            tooltip:{ theme:'dark' },
        }).render();
    })();

    // RADAR CHART
    (function(){
        const el = document.getElementById('testimonialRadarChart');
        if (!el) return;
        new ApexCharts(el, {
            chart:{ type:'radar', height:300, toolbar:{ show:false }, fontFamily:'Inter,sans-serif', dropShadow:{ enabled:true, blur:4, left:1, top:1, opacity:.1 } },
            series:[{ name:'Jumlah Testimoni', data:{!! json_encode($ratingValues) !!} }],
            xaxis:{ categories:['1 ★','2 ★★','3 ★★★','4 ★★★★','5 ★★★★★'] },
            colors:[C.gold],
            fill:{ opacity:.35, type:'gradient', gradient:{ shade:'dark', gradientToColors:[C.coral], shadeIntensity:.5, opacityFrom:.5, opacityTo:.2 }},
            stroke:{ width:2.5, colors:[C.gold] },
            markers:{ size:5, colors:['#fff'], strokeColors:C.gold, strokeWidth:2 },
            yaxis:{ show:false },
            plotOptions:{ radar:{ polygons:{ strokeColors:'#ede4f2', strokeWidth:1, connectorColors:'#ede4f2', fill:{ colors:['#fdf9ff','#f5f0fa'] }}}},
            tooltip:{ theme:'dark' },
        }).render();
    })();
    @endif
});
</script>
@endpush
