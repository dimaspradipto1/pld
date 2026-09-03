<!-- ═══════════════════════════════════════════════
     FOOTER — PLD UIS
═══════════════════════════════════════════════ -->
<footer class="footer-main">
  <div class="container">
    <div class="row g-5">
      <!-- Brand -->
      <div class="col-lg-4">
        <a href="{{ route('homepage') }}" class="footer-logo mb-3 d-inline-block">
          <img src="{{ asset('frontend/img/logopld.png') }}" alt="Logo PLD UIS" style="height: 48px; width: auto; object-fit: contain;">
        </a>
        <p class="footer-desc">
          Pusat Layanan Disabilitas Universitas Ibnu Sina berdedikasi mewujudkan ekosistem pendidikan tinggi yang inklusif, ramah, aksesibel, dan berkeadilan bagi seluruh mahasiswa disabilitas.
        </p>
        <div class="footer-social">
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-whatsapp"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      <!-- Links -->
      <div class="col-6 col-lg-2">
        <div class="footer-heading">Navigasi</div>
        <ul class="footer-links">
          <li><a href="{{ route('homepage') }}"><i class="bi bi-chevron-right"></i> Beranda</a></li>
          <li><a href="{{ route('homepage.layanan') }}"><i class="bi bi-chevron-right"></i> Layanan</a></li>
          <li><a href="{{ route('homepage.galeri') }}"><i class="bi bi-chevron-right"></i> Galeri</a></li>
          <li><a href="{{ route('homepage.news') }}"><i class="bi bi-chevron-right"></i> Berita</a></li>
          <li><a href="{{ route('homepage.tentang') }}"><i class="bi bi-chevron-right"></i> Tentang Kami</a></li>
          <li><a href="{{ route('homepage.kontak') }}"><i class="bi bi-chevron-right"></i> Kontak</a></li>
        </ul>
      </div>

      <!-- Fakultas Info -->
      <div class="col-6 col-lg-2">
        <div class="footer-heading">Akademik</div>
        <ul class="footer-links">
          <li><a href="{{ route('homepage.visi-misi') }}"><i class="bi bi-chevron-right"></i> Visi & Misi</a></li>
          <li><a href="{{ route('homepage.sambutan-dekan') }}"><i class="bi bi-chevron-right"></i> Sambutan Dekan</a></li>
          <li><a href="{{ route('homepage.struktur-organisasi') }}"><i class="bi bi-chevron-right"></i> Struktur Organisasi</a></li>
          <li><a href="{{ route('homepage.testimoni') }}"><i class="bi bi-chevron-right"></i> Testimoni</a></li>
          <li><a href="{{ route('homepage.faq') }}"><i class="bi bi-chevron-right"></i> FAQ Informasi</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-lg-4">
        <div class="footer-heading">Hubungi Kami</div>
        <div class="footer-contact-item">
          <div class="footer-contact-icon"><i class="bi bi-geo-alt"></i></div>
          <div class="footer-contact-text">
            <strong>Alamat Kampus</strong>
            {{ $contact->alamat ?? 'Pelayanan Disabilitas, Kampus Terpadu' }}
          </div>
        </div>
        <div class="footer-contact-item">
          <div class="footer-contact-icon"><i class="bi bi-telephone"></i></div>
          <div class="footer-contact-text">
            <strong>Telepon / WhatsApp</strong>
            {{ $contact->no_wa ?? '+62 812 3456 7890' }}
          </div>
        </div>
        <div class="footer-contact-item">
          <div class="footer-contact-icon"><i class="bi bi-envelope"></i></div>
          <div class="footer-contact-text">
            <strong>Email Resmi</strong>
            {{ $contact->email ?? 'info@pld.ac.id' }}
          </div>
        </div>
        <div class="footer-contact-item">
          <div class="footer-contact-icon"><i class="bi bi-clock"></i></div>
          <div class="footer-contact-text">
            <strong>Jam Operasional</strong>
            Senin – Sabtu: 08.00 – 17.00 WIB
          </div>
        </div>
      </div>
    </div>

    <div class="footer-divider"></div>

    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 footer-bottom">
      <span>© {{ date('Y') }} PLD — Pelayanan Disabilitas. All rights reserved.</span>
      <div class="d-flex gap-3">
        <a href="#">Kebijakan Privasi</a>
        <a href="#">Syarat & Ketentuan</a>
        <a href="{{ route('login') }}" style="color:var(--pld-orange);">Portal Admin</a>
      </div>
    </div>
  </div>
</footer>
