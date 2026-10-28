@extends('layouts.frontend.template')

@section('title', 'Berita & Informasi Terkini — Pelayanan Disabilitas (PLD UIS)')
@section('meta_description', 'Ikuti berita, pengumuman akademik, riset, dan artikel kesehatan terbaru dari Pelayanan Disabilitas Universitas Ibnu Sina (PLD UIS).')
@section('meta_keywords', 'berita pld, artikel kesehatan, k3 batam, kesehatan lingkungan, pengumuman uis, pld ibnu sina')


@php
  $pageHeaderTitle = 'Berita & <em>Informasi</em>';
  $breadcrumbCurrent = 'Semua Informasi';

  if (!empty($selectedCat)) {
      if ($selectedCat === 'Agenda') {
          $pageHeaderTitle = 'Agenda & <em>Kegiatan</em>';
          $breadcrumbCurrent = 'Agenda';
      } elseif ($selectedCat === 'Pengumuman') {
          $pageHeaderTitle = 'Pengumuman <em>Resmi</em>';
          $breadcrumbCurrent = 'Pengumuman';
      } elseif ($selectedCat === 'Intelek Tuli') {
          $pageHeaderTitle = 'Intelek <em>Tuli</em>';
          $breadcrumbCurrent = 'Intelek Tuli';
      } elseif ($selectedCat === 'Berita') {
          $pageHeaderTitle = 'Warta &amp; <em>Berita</em>';
          $breadcrumbCurrent = 'Berita';
      } else {
          $pageHeaderTitle = e($selectedCat);
          $breadcrumbCurrent = $selectedCat;
      }
  }

  $portalCategories = [
    'Berita'       => 'bi-newspaper',
    'Pengumuman'   => 'bi-megaphone',
    'Agenda'       => 'bi-calendar-event',
    'Intelek Tuli' => 'bi-lightbulb-fill',
  ];
@endphp

@section('content')

<!-- ═══════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════ -->
<div class="news-hero">
  <div class="container">
    <div data-aos="fade-up">
      <h1 class="news-hero-title">{!! $pageHeaderTitle !!}</h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}"><i class="bi bi-house-fill me-1"></i>Beranda</a>
        <span>/</span>
        <a href="{{ route('homepage.news') }}">Informasi</a>
        <span>/</span>
        <span class="active">{{ $breadcrumbCurrent }}</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     NEWS PORTAL CONTENT
═══════════════════════════════════════════════ -->
<section class="section-bg-sand py-5">
  <div class="container">

    {{-- Featured / Berita Utama --}}
    @if(isset($featured) && $featured)
      <div class="news-featured-box" id="portal-news-featured" data-aos="fade-up">
        <div class="row g-0">
          <div class="col-lg-6">
            <div class="position-relative h-100" style="min-height: 280px;">
              @if($featured->thumbnail)
                <img src="{{ asset('storage/' . $featured->thumbnail) }}"
                     alt="{{ $featured->title }}"
                     class="w-100 h-100"
                     style="object-fit: cover;"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <div class="w-100 h-100 align-items-center justify-content-center bg-secondary text-white" style="display: none;">
                  <i class="bi bi-image fs-1"></i>
                </div>
              @else
                <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary text-white">
                  <i class="bi bi-image fs-1"></i>
                </div>
              @endif
              <span class="badge position-absolute top-0 start-0 m-3 px-3 py-2" style="background: var(--pld-orange); color: #ffffff; font-weight: 800;">
                <i class="bi bi-star-fill me-1"></i> BERITA UTAMA
              </span>
              @if(!empty($featured->gallery) && count($featured->gallery) > 0)
                <span class="news-gallery-badge">
                  <i class="bi bi-images me-1"></i> +{{ count($featured->gallery) }} Foto Galeri
                </span>
              @endif
            </div>
          </div>
          <div class="col-lg-6 p-4 p-md-5 d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex align-items-center gap-3 text-muted small mb-2">
                <span><i class="bi bi-calendar3 me-1"></i> {{ $featured->created_at->format('d M Y') }}</span>
                <span>•</span>
                <span class="badge bg-light text-dark border">{{ $featured->category ?? 'Berita' }}</span>
              </div>
              <h3 class="fw-bold mb-3 text-dark">{{ $featured->title }}</h3>
              <p class="text-muted small mb-4" style="line-height: 1.7;">
                {{ $featured->description ?? Str::limit(strip_tags($featured->content), 180) }}
              </p>
            </div>
            <div>
              <a href="{{ route('homepage.news.detail', $featured->slug ?? $featured->id) }}" class="btn-primary-hero" style="font-size: 13.5px; padding: 10px 22px;">
                Baca Lengkap <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    @endif

    {{-- Filter Kategori & Pencarian --}}
    <div class="news-filter-bar" id="portal-news-filter" data-aos="fade-up">
      <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
        
        {{-- Category Pills --}}
        <div class="d-flex flex-wrap align-items-center gap-2">
          <a href="{{ route('homepage.news') }}" class="cat-pill-item {{ empty($selectedCat) && empty($search) ? 'active' : '' }}">
            <i class="bi bi-grid-fill"></i> Semua Kategori
          </a>

          @foreach($portalCategories as $cName => $cIcon)
            <a href="{{ route('homepage.news', ['category' => $cName]) }}" class="cat-pill-item {{ ($selectedCat ?? '') === $cName ? 'active' : '' }}">
              <i class="bi {{ $cIcon }}"></i> {{ $cName }}
            </a>
          @endforeach
        </div>

        {{-- Search Input --}}
        <form action="{{ route('homepage.news') }}" method="GET" class="news-search-input-box ms-lg-auto" id="portal-news-search-form">
          @if(!empty($selectedCat))
            <input type="hidden" name="category" id="portal-news-category" value="{{ $selectedCat }}">
          @endif
          <input type="text" name="q" id="portal-news-search-input" value="{{ $search ?? '' }}" placeholder="Cari informasi..." autocomplete="off">
          <button type="button" id="portal-news-search-clear" class="me-1 text-secondary {{ empty($search) ? 'd-none' : '' }}" aria-label="Hapus Pencarian" title="Hapus Pencarian" style="background: transparent; border: none; font-size: 14px;">
            <i class="bi bi-x-circle-fill"></i>
          </button>
          <button type="submit" aria-label="Cari">
            <i class="bi bi-search" id="portal-news-search-icon"></i>
            <span class="spinner-border spinner-border-sm d-none" id="portal-news-search-spinner" role="status" style="width: 14px; height: 14px; color: var(--pld-purple, #56823D);"></span>
          </button>
        </form>

      </div>
    </div>

    {{-- Container Grid Berita & Pagination (AJAX Live Replace Target) --}}
    <div id="portal-news-list-container">
      @include('layouts.frontend.partials.news-portal-list')
    </div>

  </div>
</section>

@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('portal-news-search-input');
    const searchForm = document.getElementById('portal-news-search-form');
    const searchSpinner = document.getElementById('portal-news-search-spinner');
    const searchIcon = document.getElementById('portal-news-search-icon');
    const searchClear = document.getElementById('portal-news-search-clear');
    const listContainer = document.getElementById('portal-news-list-container');
    const featuredBox = document.getElementById('portal-news-featured');

    if (!searchInput || !listContainer) return;

    let debounceTimer = null;

    function setSearching(loading) {
      if (!searchSpinner || !searchIcon) return;
      if (loading) {
        searchSpinner.classList.remove('d-none');
        searchIcon.classList.add('d-none');
      } else {
        searchSpinner.classList.add('d-none');
        searchIcon.classList.remove('d-none');
      }
    }

    function doPortalSearch(targetUrl = null) {
      setSearching(true);

      let url;
      if (targetUrl) {
        url = new URL(targetUrl, window.location.origin);
      } else {
        url = new URL("{{ route('homepage.news') }}", window.location.origin);
        const query = searchInput.value.trim();
        const catInput = document.getElementById('portal-news-category');

        if (catInput && catInput.value) {
          url.searchParams.set('category', catInput.value);
        }
        if (query) {
          url.searchParams.set('q', query);
        }
      }

      const activeQuery = url.searchParams.get('q') || '';
      const activeCat = url.searchParams.get('category') || '';

      if (featuredBox) {
        if (activeQuery || activeCat) {
          featuredBox.classList.add('d-none');
        } else {
          featuredBox.classList.remove('d-none');
        }
      }

      fetch(url.toString(), {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
      .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.text();
      })
      .then(html => {
        listContainer.innerHTML = html;
        window.history.replaceState(null, '', url.toString());
        bindPortalEvents();
      })
      .catch(err => {
        console.error('Error fetching portal berita:', err);
      })
      .finally(() => {
        setSearching(false);
      });
    }

    searchInput.addEventListener('input', function () {
      const val = this.value.trim();
      if (searchClear) {
        if (val.length > 0) {
          searchClear.classList.remove('d-none');
        } else {
          searchClear.classList.add('d-none');
        }
      }

      clearTimeout(debounceTimer);
      debounceTimer = setTimeout(() => {
        doPortalSearch();
      }, 300);
    });

    if (searchClear) {
      searchClear.addEventListener('click', function () {
        searchInput.value = '';
        this.classList.add('d-none');
        searchInput.focus();
        clearTimeout(debounceTimer);
        doPortalSearch();
      });
    }

    if (searchForm) {
      searchForm.addEventListener('submit', function (e) {
        e.preventDefault();
        clearTimeout(debounceTimer);
        doPortalSearch();
      });
    }

    function bindPortalEvents() {
      const pageLinks = listContainer.querySelectorAll('.portal-news-pagination a.page-link');
      pageLinks.forEach(link => {
        link.addEventListener('click', function (e) {
          e.preventDefault();
          const targetHref = this.getAttribute('href');
          if (targetHref && targetHref !== '#') {
            doPortalSearch(targetHref);
            const filterSection = document.getElementById('portal-news-filter');
            if (filterSection) {
              filterSection.scrollIntoView({ behavior: 'smooth' });
            }
          }
        });
      });

      const resetLinks = listContainer.querySelectorAll('.portal-news-reset-link');
      resetLinks.forEach(link => {
        link.addEventListener('click', function (e) {
          if (searchInput.value.trim() !== '') {
            e.preventDefault();
            searchInput.value = '';
            if (searchClear) searchClear.classList.add('d-none');
            clearTimeout(debounceTimer);
            doPortalSearch();
          }
        });
      });
    }

    bindPortalEvents();
  });
</script>
@endpush
