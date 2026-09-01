  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="{{ route('dashboard') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
        <a class="nav-link {{ Route::is('feature.*') || Route::is('testimonial.*') || Route::is('faq.*') || Route::is('about.*') || Route::is('milestone.*') ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>frontend</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{ Route::is('banner.*') || Route::is('feature.*') || Route::is('testimonial.*') || Route::is('faq.*') || Route::is('about.*') || Route::is('milestone.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('banner.index') }}" class="{{ Route::is('banner.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Banner</span>
            </a>
          </li>
          <li>
            <a href="{{ route('faq.index') }}" class="{{ Route::is('faq.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>FAQ</span>
            </a>
          </li>
          <li>
            <a href="{{ route('testimonial.index') }}" class="{{ Route::is('testimonial.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Testimoni</span>
            </a>
          </li>
          <li>
            <a href="{{ route('about.index') }}" class="{{ Route::is('about.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>About</span>
            </a>
          </li>
          <li>
            <a href="{{ route('milestone.index') }}" class="{{ Route::is('milestone.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Milestone</span>
            </a>
          </li>
          <li>
            <a href="{{ route('feature.index') }}" class="{{ Route::is('feature.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Keunggulan</span>
            </a>
          </li>
        </ul>
      </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::is('news.*') ? '' : 'collapsed' }}" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-newspaper"></i><span>Berita & Informasi</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="charts-nav" class="nav-content collapse {{ Route::is('news.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('news.index') }}" class="{{ Route::is('news.index') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Semua Berita</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('news.create') }}" class="{{ Route::is('news.create') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Tambah Berita</span>
                      </a>
                  </li>
              </ul>
          </li><!-- End Charts Nav -->

          <li class="nav-item">
              <a class="nav-link {{ Route::is('gallery.*') ? '' : 'collapsed' }}" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-images"></i><span>Galeri & Media</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="icons-nav" class="nav-content collapse {{ Route::is('gallery.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('gallery.index') }}" class="{{ Route::is('gallery.index') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Semua Media</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('gallery.create') }}" class="{{ Route::is('gallery.create') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Upload Media</span>
                      </a>
                  </li>
              </ul>
          </li>

          <li class="nav-heading">Pengaturan & Profil</li>
          <li class="nav-item">
              <a class="nav-link {{ Route::is('profil.*') ? '' : 'collapsed' }}" href="{{ route('profil.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Profile</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Route::is('contact.*') ? '' : 'collapsed' }}" href="{{ route('contact.index') }}">
                  <i class="bi bi-telephone"></i>
                  <span>Kontak</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Route::is('nomoradmin.*') ? '' : 'collapsed' }}" href="{{ route('nomoradmin.index') }}">
                  <i class="bi bi-person-badge"></i>
                  <span>Nomor Admin</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('user.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Users</span>
              </a>
          </li>

      </ul>

  </aside>
