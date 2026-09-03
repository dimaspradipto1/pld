<!-- ═══════════════════════════════════════════════
     TOPBAR BILAH ATAS — PLD UIS
═══════════════════════════════════════════════ -->
@php
  $topbar = $topbarSetting;
  $badgeText = $topbar?->badge_text ?? 'PLD UIS';
  $badgeIcon = $topbar?->badge_icon ?: 'bi-shield-check';
  $alamatText = $topbar?->alamat ?? $contact?->alamat ?? 'Lubuk Baja Kota, Kec. Lubuk Baja, Kota Batam, Kepulauan Riau 29444';
  $jamOperasional = $topbar?->jam_operasional ?? 'Senin - Sabtu: 08.00 - 17.00 WIB';
  $telpWa = $topbar?->telepon ?? $contact?->no_wa ?? '123456789';
  $emailText = $topbar?->email ?? $contact?->email ?? 'admin@uis.ac.id';
  $socialMediaList = is_array($topbar?->social_media) && count($topbar->social_media) > 0
    ? $topbar->social_media
    : [
        ['platform' => 'Instagram', 'icon' => 'bi-instagram', 'url' => 'https://instagram.com'],
        ['platform' => 'YouTube', 'icon' => 'bi-youtube', 'url' => 'https://youtube.com'],
      ];
@endphp

@if(!isset($topbar) || $topbar->is_active)
<div class="topbar-main d-none d-lg-block">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center gap-4">
        <span class="topbar-badge"><i class="bi {{ $badgeIcon }}"></i> {{ $badgeText }}</span>
        @if(!empty($alamatText))
          <span><i class="bi bi-geo-alt me-1" style="color:var(--pld-orange);"></i> {{ $alamatText }}</span>
        @endif
        @if(!empty($jamOperasional))
          <span><i class="bi bi-clock me-1" style="color:var(--pld-orange);"></i> {{ $jamOperasional }}</span>
        @endif
      </div>
      <div class="d-flex align-items-center gap-3">
        <!-- Dynamic Social Media -->
        @foreach($socialMediaList as $sosmed)
          @if(!empty($sosmed['url']))
            <a href="{{ $sosmed['url'] }}" target="_blank" title="{{ $sosmed['platform'] ?? 'Media Sosial' }}" class="text-white-50">
              <i class="bi {{ !empty($sosmed['icon']) ? $sosmed['icon'] : 'bi-globe' }}"></i>
            </a>
          @endif
        @endforeach

        @if(!empty($telpWa) || !empty($emailText))
          <span style="opacity:0.25; color:white;">|</span>
        @endif

        @if(!empty($telpWa))
          <a href="https://wa.me/{{ $cleanWa }}" target="_blank"><i class="bi bi-whatsapp me-1 text-success"></i> {{ $telpWa }}</a>
        @endif
        @if(!empty($emailText))
          <a href="mailto:{{ $emailText }}"><i class="bi bi-envelope me-1" style="color:var(--pld-orange);"></i> {{ $emailText }}</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endif
