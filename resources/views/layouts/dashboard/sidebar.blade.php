  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <!-- 1. Beranda / Dashboard -->
          <li class="nav-item">
              <a class="nav-link {{ Route::is('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          @php
              $currentUser = Auth::user();
              $isAdmin = $currentUser?->isAdmin();
              $isPenulis = $currentUser?->hasExactRole('penulis');
              $isOrganisasi = $currentUser?->hasExactRole('organisasi');
          @endphp

          @if($isAdmin)
          <!-- 2. Profil PLD (Sesuai Urutan & Dropdown Header) -->
          <li class="nav-item">
            <a class="nav-link {{ Route::is('milestone.*') || Route::is('visimisi.*') || Route::is('struktur-organisasi.*') || Route::is('program-kerja.*') || Route::is('about.*') || Route::is('sambutan-dekan.*') ? '' : 'collapsed' }}" data-bs-target="#profil-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-building"></i><span>Profil</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="profil-nav" class="nav-content collapse {{ Route::is('milestone.*') || Route::is('visimisi.*') || Route::is('struktur-organisasi.*') || Route::is('program-kerja.*') || Route::is('about.*') || Route::is('sambutan-dekan.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ route('milestone.index') }}" class="{{ Route::is('milestone.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>1. Sejarah</span>
                </a>
              </li>
              <li>
                <a href="{{ route('visimisi.index') }}" class="{{ Route::is('visimisi.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>2. Visi & Misi</span>
                </a>
              </li>
              <li>
                <a href="{{ route('struktur-organisasi.index') }}" class="{{ Route::is('struktur-organisasi.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>3. Struktur Organisasi</span>
                </a>
              </li>
              <li>
                <a href="{{ route('program-kerja.index') }}" class="{{ Route::is('program-kerja.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>4. Program Kerja</span>
                </a>
              </li>
              <li>
                <a href="{{ route('about.index') }}" class="{{ Route::is('about.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Tentang PLD</span>
                </a>
              </li>
              <li>
                <a href="{{ route('sambutan-dekan.index') }}" class="{{ Route::is('sambutan-dekan.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Sambutan Pimpinan</span>
                </a>
              </li>
            </ul>
          </li>

          <!-- 3. Layanan PLD (Sesuai Urutan Header) -->
          <li class="nav-item">
            <a class="nav-link {{ Route::is('layanan.*') || Route::is('volunteer.*') ? '' : 'collapsed' }}" data-bs-target="#layanan-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-person-raised-hand"></i><span>Layanan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="layanan-nav" class="nav-content collapse {{ Route::is('layanan.*') || Route::is('volunteer.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ route('layanan.index') }}" class="{{ Route::is('layanan.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Pendamping & Konseling</span>
                </a>
              </li>
              <li>
                <a href="{{ route('volunteer.index') }}" class="{{ Route::is('volunteer.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Volunteer & Relawan</span>
                </a>
              </li>
            </ul>
          </li>

          <!-- Kemahasiswaan PLD -->
          <li class="nav-item">
            <a class="nav-link {{ Route::is('admin-statistik-mahasiswa.*') ? '' : 'collapsed' }}" data-bs-target="#kemahasiswaan-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-mortarboard"></i><span>Kemahasiswaan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="kemahasiswaan-nav" class="nav-content collapse {{ Route::is('admin-statistik-mahasiswa.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ route('admin-statistik-mahasiswa.index') }}" class="{{ Route::is('admin-statistik-mahasiswa.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Statistik Mahasiswa</span>
                </a>
              </li>
            </ul>
          </li>
          @elseif($isOrganisasi)
          <!-- Menu Khusus Role Organisasi Mahasiswa -->
          <li class="nav-item">
            <a class="nav-link {{ Route::is('organisasi-mahasiswa.*') ? '' : 'collapsed' }}" href="{{ route('organisasi-mahasiswa.index') }}">
              <i class="bi bi-people-fill"></i><span>Organisasi Mahasiswa</span>
            </a>
          </li>
          @endif

          @if($isAdmin || $isPenulis)
          <!-- 4. Informasi (Sesuai Urutan Header) -->
          <li class="nav-item">
              <a class="nav-link {{ Route::is('news.*') || Route::is('faq.*') ? '' : 'collapsed' }}" data-bs-target="#informasi-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-newspaper"></i><span>Informasi</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="informasi-nav" class="nav-content collapse {{ Route::is('news.*') || Route::is('faq.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('news.index') }}" class="{{ Route::is('news.index') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Semua Berita & Informasi</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('news.create') }}" class="{{ Route::is('news.create') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Tulis Informasi Baru</span>
                      </a>
                  </li>
                  @if($isAdmin)
                  <li>
                      <a href="{{ route('faq.index') }}" class="{{ Route::is('faq.*') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>FAQ Informasi</span>
                      </a>
                  </li>
                  @endif
              </ul>
          </li>
          @endif

          @if($isAdmin)
          <!-- 5. Kontak (Sesuai Urutan Header) -->
          <li class="nav-item">
              <a class="nav-link {{ Route::is('contact.*') ? '' : 'collapsed' }}" href="{{ route('contact.index') }}">
                  <i class="bi bi-telephone"></i>
                  <span>Kontak</span>
              </a>
          </li>

          <!-- Pengaturan Konten Beranda / Landing Page -->
          <li class="nav-item">
              <a class="nav-link {{ Route::is('banner.*') || Route::is('layanan-terkait.*') || Route::is('sarana.*') || Route::is('gallery.*') || Route::is('testimonial.*') || Route::is('pmb-setting.*') || Route::is('faculty-stat.*') ? '' : 'collapsed' }}" data-bs-target="#beranda-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-layout-text-window-reverse"></i><span>Konten Beranda</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="beranda-nav" class="nav-content collapse {{ Route::is('banner.*') || Route::is('layanan-terkait.*') || Route::is('sarana.*') || Route::is('gallery.*') || Route::is('testimonial.*') || Route::is('pmb-setting.*') || Route::is('faculty-stat.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('banner.index') }}" class="{{ Route::is('banner.*') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Banner Hero</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('layanan-terkait.index') }}" class="{{ Route::is('layanan-terkait.*') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Layanan Terkait</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('faculty-stat.index') }}" class="{{ Route::is('faculty-stat.*') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Statistik PLD</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('sarana.index') }}" class="{{ Route::is('sarana.*') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Sarana & Fasilitas</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('gallery.index') }}" class="{{ Route::is('gallery.index') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Galeri Dokumentasi</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('testimonial.index') }}" class="{{ Route::is('testimonial.*') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Alumni & Testimoni</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('pmb-setting.index') }}" class="{{ Route::is('pmb-setting.*') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Banner Pendaftaran</span>
                      </a>
                  </li>
              </ul>
          </li>
          @endif


          <li class="nav-heading">Pengaturan & Administrator</li>

          @if($isAdmin)
          <li class="nav-item">
              <a class="nav-link {{ Route::is('topbar.*') ? '' : 'collapsed' }}" href="{{ route('topbar.index') }}">
                  <i class="bi bi-layout-text-window-reverse"></i>
                  <span>Pengaturan Topbar</span>
              </a>
          </li>
          @endif

          <li class="nav-item">
              <a class="nav-link {{ Route::is('user.my-profile') || Route::is('profil.*') ? '' : 'collapsed' }}" href="{{ route('user.my-profile') }}">
                  <i class="bi bi-person"></i>
                  <span>Profil Akun</span>
              </a>
          </li>

          @if($isAdmin)
          <li class="nav-item">
              <a class="nav-link {{ Route::is('user.*') ? '' : 'collapsed' }}" href="{{ route('user.index') }}">
                  <i class="bi bi-people"></i>
                  <span>Manajemen Pengguna</span>
              </a>
          </li>
          @endif

      </ul>

  </aside>
