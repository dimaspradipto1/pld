<!-- ═══════════════════════════════════════════════
     NAVBAR HEADER UTAMA — PLD UIS
═══════════════════════════════════════════════ -->
<nav class="navbar navbar-expand-xl navbar-main">
  <div class="container-fluid px-lg-4 px-xl-5">
    <!-- Logo PLD UIS -->
    <a class="navbar-brand navbar-brand-custom me-2 me-xl-4" href="{{ route('homepage') }}">
      <img src="{{ asset('frontend/img/logopld.png') }}" alt="Logo PLD UIS" class="brand-logo-img">
    </a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" aria-controls="navMain" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav mx-auto gap-1 align-items-center">
        <!-- Beranda -->
        <li class="nav-item">
          <a href="{{ route('homepage') }}" class="nav-link nav-link-custom {{ request()->routeIs('homepage') ? 'active' : '' }}">Beranda</a>
        </li>

        <!-- Profil Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('homepage.sejarah') || request()->routeIs('homepage.visi-misi') || request()->routeIs('homepage.struktur-organisasi') || request()->routeIs('homepage.program-kerja') || request()->routeIs('homepage.tentang') || request()->routeIs('homepage.sambutan-dekan') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profil <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-custom">
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.sejarah') ? 'active' : '' }}" href="{{ route('homepage.sejarah') }}"><i class="bi bi-hourglass-split"></i> 1. Sejarah</a></li>
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.visi-misi') ? 'active' : '' }}" href="{{ route('homepage.visi-misi') }}"><i class="bi bi-bullseye"></i> 2. Visi Misi</a></li>
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.struktur-organisasi') ? 'active' : '' }}" href="{{ route('homepage.struktur-organisasi') }}"><i class="bi bi-diagram-3"></i> 3. Struktur Organisasi</a></li>
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.program-kerja') ? 'active' : '' }}" href="{{ route('homepage.program-kerja') }}"><i class="bi bi-briefcase"></i> 4. Program Kerja</a></li>
          </ul>
        </li>

        <!-- Layanan Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('homepage.layanan*') || request()->routeIs('homepage.volunteer*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Layanan <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-custom">
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.layanan*') ? 'active' : '' }}" href="{{ route('homepage.layanan') }}"><i class="bi bi-person-raised-hand"></i> Layanan Pendamping dan Konseling</a></li>
            <li><a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.volunteer*') ? 'active' : '' }}" href="{{ route('homepage.volunteer') }}"><i class="bi bi-people-fill"></i> Volunteer</a></li>
          </ul>
        </li>

        <!-- Kemahasiswaan Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('homepage.statistik-mahasiswa') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kemahasiswaan <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-custom">
            <li>
              <a class="dropdown-item dropdown-item-custom {{ request()->routeIs('homepage.statistik-mahasiswa') ? 'active' : '' }}" href="{{ route('homepage.statistik-mahasiswa') }}">
                <i class="bi bi-bar-chart-line-fill"></i> Statistik Mahasiswa
              </a>
            </li>
          </ul>
        </li>

        <!-- Informasi Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('homepage.news*') || request()->routeIs('homepage.faq') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Informasi <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-custom">
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.news', ['category' => 'Berita']) }}"><i class="bi bi-newspaper"></i> Berita</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.news', ['category' => 'Pengumuman']) }}"><i class="bi bi-megaphone"></i> Pengumuman</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.news', ['category' => 'Agenda']) }}"><i class="bi bi-calendar-event"></i> Agenda</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.news', ['category' => 'Artikel']) }}"><i class="bi bi-card-text"></i> Artikel</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.faq') }}"><i class="bi bi-question-circle"></i> FAQ Informasi</a></li>
            <li><a class="dropdown-item dropdown-item-custom" href="{{ route('homepage.news', ['category' => 'Intelek Tuli']) }}"><i class="bi bi-lightbulb-fill" style="color: var(--pld-orange);"></i> Intelek Tuli</a></li>
          </ul>
        </li>

        <!-- Kontak -->
        <li class="nav-item">
          <a href="{{ route('homepage.kontak') }}" class="nav-link nav-link-custom {{ request()->routeIs('homepage.kontak') ? 'active' : '' }}">Kontak</a>
        </li>
      </ul>

      <!-- CTA Buttons -->
      <div class="d-flex align-items-center gap-2 mt-3 mt-xl-0">
        <a href="https://pmb.uis.ac.id/" target="_blank" rel="noopener noreferrer" class="btn-pmb-nav" title="Penerimaan Mahasiswa Baru UIS">
          <i class="bi bi-pencil-square"></i>
          <span>PMB</span>
        </a>
        <a href="{{ route('login') }}" class="btn-portal-nav" title="Login">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </div>
    </div>
  </div>
</nav>
