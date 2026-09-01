  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="{{ route('dashboard') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          @if(Auth::user()->roles === 'admin')
          <li class="nav-item">
            <a class="nav-link {{ Route::is('feature.*') || Route::is('testimonial.*') || Route::is('faq.*') || Route::is('about.*') || Route::is('sambutan-dekan.*') || Route::is('pmb-setting.*') || Route::is('layanan.*') || Route::is('struktur-organisasi.*') || Route::is('milestone.*') || Route::is('partner.*') || Route::is('visimisi.*') || Route::is('nilaiperusahaan.*') ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-mortarboard"></i><span>Profil & Konten FIKES</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ Route::is('banner.*') || Route::is('feature.*') || Route::is('testimonial.*') || Route::is('faq.*') || Route::is('about.*') || Route::is('sambutan-dekan.*') || Route::is('pmb-setting.*') || Route::is('layanan.*') || Route::is('struktur-organisasi.*') || Route::is('milestone.*') || Route::is('partner.*') || Route::is('visimisi.*') || Route::is('nilaiperusahaan.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ route('banner.index') }}" class="{{ Route::is('banner.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Banner Hero</span>
                </a>
              </li>
              <li>
                <a href="{{ route('about.index') }}" class="{{ Route::is('about.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Profil Tentang Kami</span>
                </a>
              </li>
              <li>
                <a href="{{ route('visimisi.index') }}" class="{{ Route::is('visimisi.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Visi & Misi</span>
                </a>
              </li>
              <li>
                <a href="{{ route('sambutan-dekan.index') }}" class="{{ Route::is('sambutan-dekan.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Sambutan Dekan</span>
                </a>
              </li>
              <li>
                <a href="{{ route('struktur-organisasi.index') }}" class="{{ Route::is('struktur-organisasi.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Struktur Organisasi</span>
                </a>
              </li>
              <li>
                <a href="{{ route('milestone.index') }}" class="{{ Route::is('milestone.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Sejarah & Milestone</span>
                </a>
              </li>
              <li>
                <a href="{{ route('nilaiperusahaan.index') }}" class="{{ Route::is('nilaiperusahaan.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Nilai Budaya Civitas</span>
                </a>
              </li>
              <li>
                <a href="{{ route('layanan.index') }}" class="{{ Route::is('layanan.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Layanan & Fasilitas</span>
                </a>
              </li>
              <li>
                <a href="{{ route('feature.index') }}" class="{{ Route::is('feature.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Keunggulan Fakultas</span>
                </a>
              </li>
              <li>
                <a href="{{ route('partner.index') }}" class="{{ Route::is('partner.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Mitra Rumah Sakit & Instansi</span>
                </a>
              </li>
              <li>
                <a href="{{ route('testimonial.index') }}" class="{{ Route::is('testimonial.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Testimoni</span>
                </a>
              </li>
              <li>
                <a href="{{ route('pmb-setting.index') }}" class="{{ Route::is('pmb-setting.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Banner PMB & Pendaftaran</span>
                </a>
              </li>
              <li>
                <a href="{{ route('faq.index') }}" class="{{ Route::is('faq.*') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>FAQ Informasi</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Route::is('akademik.*') ? '' : 'collapsed' }}" data-bs-target="#akademik-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-book-half"></i><span>Akademik</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="akademik-nav" class="nav-content collapse {{ Route::is('akademik.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ route('akademik.kurikulum') }}" class="{{ Route::is('akademik.kurikulum') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Kurikulum</span>
                </a>
              </li>
              <li>
                <a href="{{ route('akademik.kalender') }}" class="{{ Route::is('akademik.kalender') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Kalender Akademik</span>
                </a>
              </li>
              <li>
                <a href="{{ route('akademik.pedoman') }}" class="{{ Route::is('akademik.pedoman') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Pedoman Akademik</span>
                </a>
              </li>
              <li>
                <a href="{{ route('akademik.sistem') }}" class="{{ Route::is('akademik.sistem') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Sistem Akademik</span>
                </a>
              </li>
            </ul>
          </li>
          @endif

          <li class="nav-item">
              <a class="nav-link {{ Route::is('news.*') ? '' : 'collapsed' }}" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-newspaper"></i><span>Berita & Pengumuman</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="charts-nav" class="nav-content collapse {{ Route::is('news.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('news.index') }}" class="{{ Route::is('news.index') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Semua Publikasi</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('news.create') }}" class="{{ Route::is('news.create') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Tulis Berita / Pengumuman</span>
                      </a>
                  </li>
              </ul>
          </li><!-- End Charts Nav -->

          @if(Auth::user()->roles === 'admin')
          <li class="nav-item">
              <a class="nav-link {{ Route::is('gallery.*') ? '' : 'collapsed' }}" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-images"></i><span>Galeri & Dokumentasi</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="icons-nav" class="nav-content collapse {{ Route::is('gallery.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('gallery.index') }}" class="{{ Route::is('gallery.index') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Semua Media</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('gallery.create') }}" class="{{ Route::is('gallery.create') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Upload Media Baru</span>
                      </a>
                  </li>
              </ul>
          </li>
          @endif

          <li class="nav-heading">Pengaturan & Administrator</li>

          <li class="nav-item">
              <a class="nav-link {{ Route::is('profil.*') ? '' : 'collapsed' }}" href="{{ route('profil.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Profil Akun</span>
              </a>
          </li>

          @if(Auth::user()->roles === 'admin')
          <li class="nav-item">
              <a class="nav-link {{ Route::is('contact.*') ? '' : 'collapsed' }}" href="{{ route('contact.index') }}">
                  <i class="bi bi-telephone"></i>
                  <span>Kontak & Lokasi</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Route::is('user.*') ? '' : 'collapsed' }}" href="{{ route('user.index') }}">
                  <i class="bi bi-people"></i>
                  <span>Manajemen Pengguna</span>
              </a>
          </li>
          @endif

      </ul>

  </aside>
