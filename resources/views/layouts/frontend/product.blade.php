@extends('layouts.frontend.template')

@section('title', 'Katalog Roster Dinding Minimalis — Galeri & Harga Roster Terbaik')
@section('meta_description', 'Jelajahi berbagai motif roster beton, roster tanah liat (terracotta), roster GRC, dan roster keramik berkualitas premium langsung dari distributor resmi.')
@section('meta_keywords', 'katalog roster, roster beton minimalis, roster keramik, harga roster dinding, beli roster terakota')

@section('content')
@php
  $cleanWa = '';
  if (!empty($contact->no_wa)) {
      $cleanWa = preg_replace('/[^0-9]/', '', $contact->no_wa);
      if (strpos($cleanWa, '08') === 0) {
          $cleanWa = '628' . substr($cleanWa, 2);
      }
  }
@endphp

<!-- ═══════════════════════════════════════════════
     HERO BANNER
     ═══════════════════════════════════════════════ -->
<div class="product-hero">
  <div class="product-hero-bg"></div>
  <div class="product-hero-overlay"></div>
  <div class="product-hero-pattern"></div>

  <div class="container">
    <div class="product-hero-content" data-aos="fade-up" data-aos-duration="800">
      <h1 class="product-hero-title">
        Katalog <em>Produk</em>
      </h1>
      <div class="breadcrumb-custom">
        <a href="{{ route('homepage') }}">Beranda</a>
        <span class="sep">/</span>
        <span class="active">Katalog Produk</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     CATALOG SECTION
     ═══════════════════════════════════════════════ -->
<section class="section-bg-white roster-pattern">
  <div class="container">

    <!-- Search Bar & Filtering -->
    <div class="row justify-content-center mb-4" data-aos="fade-up">
      <div class="col-lg-8">
        <div class="search-box-wrap mb-4">
          <i class="bi bi-search"></i>
          <input type="text" id="productSearchInput" class="search-input-custom" placeholder="Cari roster berdasarkan nama atau kode (misal: Sakura, RB-01)..." onkeyup="filterProducts()">
        </div>

        <!-- Category Tabs -->
        <div class="category-tabs-wrap d-flex flex-wrap justify-content-center gap-2">
          <button class="btn-filter-tab active" data-filter="all" onclick="filterByCategory('all', this)">
            <i class="bi bi-grid-fill me-1"></i> Semua Roster
          </button>
          @foreach($categories as $cat)
            <button class="btn-filter-tab" data-filter="{{ $cat->nama_kategori }}" onclick="filterByCategory('{{ $cat->nama_kategori }}', this)">
              {{ $cat->nama_kategori }}
            </button>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Product Grid -->
    <div class="row g-4 justify-content-center" id="productGrid" data-aos="fade-up" data-aos-delay="100">
      @forelse($products as $product)
        @php
          $mainImage = $product->galleries->first();
          $productUrl = $mainImage ? asset('storage/' . $mainImage->url) : null;
        @endphp
        <div class="col-sm-6 col-md-4 col-xl-3 product-card-col" 
             data-name="{{ $product->nama_produk }}" 
             data-code="{{ $product->kode_produk }}" 
             data-category="{{ $product->category->nama_kategori ?? '' }}">
          <div class="product-card">
            <!-- Product Image -->
            <div class="product-card-img">
              @if($productUrl)
                <img src="{{ $productUrl }}" alt="{{ $product->nama_produk }}" loading="lazy">
              @else
                <div class="product-placeholder-bg">
                  <i class="bi bi-grid-3x3-gap product-placeholder-icon"></i>
                  <span class="product-placeholder-text">{{ $product->kode_produk }}</span>
                </div>
              @endif
            </div>

            <!-- Card Body -->
            <div class="product-card-body">
              <div class="product-card-cat">{{ $product->category->nama_kategori ?? 'Roster' }}</div>
              <h3 class="product-card-title">{{ $product->nama_produk }}</h3>
              
              <!-- Details -->
              <div class="product-details">
                <div class="product-detail-item">
                  <span class="product-detail-label">Kode Produk</span>
                  <span class="product-detail-value">{{ $product->kode_produk }}</span>
                </div>
                <div class="product-detail-item">
                  <span class="product-detail-label">Ukuran (P x L x T)</span>
                  <span class="product-detail-value">{{ $product->panjang }}x{{ $product->lebar }}x{{ $product->tebal }} cm</span>
                </div>
                <div class="product-detail-item">
                  <span class="product-detail-label">Ketersediaan</span>
                  <span class="product-detail-value">
                    @if($product->stok > 0)
                      <span class="product-status-badge ready">
                        <i class="bi bi-check-circle-fill"></i> Ready Stock
                      </span>
                    @else
                      <span class="product-status-badge empty">
                        <i class="bi bi-clock-fill"></i> Pre-Order
                      </span>
                    @endif
                  </span>
                </div>
              </div>

              <!-- Price & CTA -->
              <div class="product-card-price-wrap">
                <div>
                  <div class="product-price">Rp {{ number_format($product->harga, 0, ',', '.') }}</div>
                  <span class="product-price-unit">/ pcs</span>
                </div>
              </div>

              @php
                $waText = "Halo Admin Roster Dinding, saya tertarik memesan produk *" . $product->nama_produk . "* (Kode: " . $product->kode_produk . ") ukuran " . $product->panjang . "x" . $product->lebar . "x" . $product->tebal . " cm. Mohon info ketersediaan stok dan biaya kirim selengkapnya.";
                $waLink = "https://wa.me/" . ($cleanWa ?: '6281234567890') . "?text=" . urlencode($waText);
              @endphp
              <a href="{{ $waLink }}" target="_blank" class="btn-order-wa">
                <i class="bi bi-whatsapp"></i> Tanya / Pesan via WA
              </a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <div class="text-muted fs-5">
            <i class="bi bi-inbox-fill d-block fs-1 mb-3 text-terracotta" style="opacity: 0.5;"></i>
            Belum ada produk yang ditambahkan.
          </div>
        </div>
      @endforelse

      <!-- No Products Filter Match State -->
      <div class="col-12 text-center py-5 d-none" id="noProductsState">
        <div class="text-muted fs-5">
          <i class="bi bi-search d-block fs-1 mb-3 text-terracotta" style="opacity: 0.5;"></i>
          Tidak ditemukan produk yang cocok dengan pencarian atau filter Anda.
        </div>
      </div>
    </div>

  </div>
</section>
@endsection

@push('styles')
<style>
  /* Local Catalog styling */
  .category-tabs-wrap {
    margin-bottom: 40px;
  }
  .btn-filter-tab {
    background: var(--white);
    border: 1px solid var(--border-light, #ebdff2);
    color: var(--text-main, #190a24);
    padding: 10px 22px;
    border-radius: 50px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.25s ease;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
  }
  .btn-filter-tab:hover, .btn-filter-tab.active {
    background: var(--fikes-purple, #823ca2);
    border-color: var(--fikes-purple, #823ca2);
    color: var(--white);
    box-shadow: 0 4px 15px rgba(130, 60, 162, 0.25);
  }
  
  /* Product card layout */
  .product-card {
    background: var(--white);
    border: 1px solid var(--border-light, #ebdff2);
    border-radius: 20px;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 20px rgba(25, 10, 36, 0.04);
  }
  .product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 32px rgba(130, 60, 162, 0.12);
    border-color: var(--fikes-purple-subtle, #ecdcf7);
  }
  .product-card-img {
    position: relative;
    width: 100%;
    padding-top: 100%; /* Aspect 1:1 */
    background: var(--fikes-purple-light, #f5eefb);
    overflow: hidden;
    border-bottom: 1px solid var(--border-light, #ebdff2);
  }
  .product-card-img img {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }
  .product-card:hover .product-card-img img {
    transform: scale(1.08);
  }
  .product-placeholder-bg {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: var(--fikes-purple-light, #f5eefb);
    color: var(--fikes-purple, #823ca2);
  }
  .product-placeholder-icon {
    font-size: 40px;
    margin-bottom: 8px;
    opacity: 0.7;
  }
  .product-placeholder-text {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    opacity: 0.8;
  }
  .product-card-body {
    padding: 22px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }
  .product-card-cat {
    font-size: 11px;
    font-weight: 700;
    color: var(--fikes-purple, #823ca2);
    background: var(--fikes-purple-light, #f5eefb);
    padding: 3px 10px;
    border-radius: 50px;
    width: fit-content;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 8px;
  }
  .product-card-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 17px;
    font-weight: 700;
    color: var(--text-main, #190a24);
    margin-bottom: 12px;
    line-height: 1.35;
    min-height: 46px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .product-details {
    display: flex;
    flex-direction: column;
    gap: 7px;
    margin-bottom: 15px;
    font-size: 12.5px;
    color: var(--text-muted, #655672);
    border-top: 1px dashed var(--border-light, #ebdff2);
    border-bottom: 1px dashed var(--border-light, #ebdff2);
    padding: 10px 0;
  }
  .product-detail-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .product-detail-label {
    font-weight: 500;
  }
  .product-detail-value {
    color: var(--text-main, #190a24);
    font-weight: 600;
  }
  .product-card-price-wrap {
    margin-top: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
  }
  .product-price {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 19px;
    font-weight: 800;
    color: var(--fikes-purple, #823ca2);
  }
  .product-price-unit {
    font-size: 11px;
    font-weight: 500;
    color: var(--text-muted, #655672);
  }
  .product-status-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 10.5px;
    font-weight: 700;
    padding: 3px 9px;
    border-radius: 50px;
  }
  .product-status-badge.ready {
    background: rgba(25, 135, 84, 0.12);
    color: #198754;
  }
  .product-status-badge.empty {
    background: rgba(220, 53, 69, 0.12);
    color: #dc3545;
  }
  .btn-order-wa {
    width: 100%;
    background: var(--fikes-orange, #ff9c00);
    color: #190a24;
    border: none;
    padding: 11px;
    border-radius: 10px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 4px 14px rgba(255, 156, 0, 0.25);
  }
  .btn-order-wa:hover {
    background: var(--fikes-orange-hover, #e88d00);
    color: #190a24;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(255, 156, 0, 0.35);
  }
</style>
@endpush

@push('scripts')
<script>
  let activeCategory = 'all';

  function filterByCategory(catName, buttonEl) {
    activeCategory = catName;
    
    // Update active class in filter tabs
    document.querySelectorAll('.btn-filter-tab').forEach(btn => {
      btn.classList.remove('active');
    });
    buttonEl.classList.add('active');
    
    filterProducts();
  }

  function filterProducts() {
    const query = document.getElementById('productSearchInput').value.toLowerCase();
    const productCols = document.querySelectorAll('.product-card-col');
    let visibleCount = 0;

    productCols.forEach(col => {
      const name = col.getAttribute('data-name').toLowerCase();
      const code = col.getAttribute('data-code').toLowerCase();
      const category = col.getAttribute('data-category');

      const matchesSearch = name.includes(query) || code.includes(query);
      const matchesCategory = activeCategory === 'all' || category === activeCategory;

      if (matchesSearch && matchesCategory) {
        col.style.display = 'block';
        visibleCount++;
      } else {
        col.style.display = 'none';
      }
    });

    // Toggle Empty state placeholder
    const emptyState = document.getElementById('noProductsState');
    if (visibleCount === 0) {
      emptyState.classList.remove('d-none');
    } else {
      emptyState.classList.add('d-none');
    }
  }

  // Handle category link redirect from external pages / footer
  document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const catParam = params.get('category');
    if (catParam) {
      const decodedCat = decodeURIComponent(catParam);
      const targetBtn = Array.from(document.querySelectorAll('.btn-filter-tab')).find(
        btn => btn.getAttribute('data-filter') === decodedCat
      );
      if (targetBtn) {
        targetBtn.click();
        
        // Scroll smoothly to filter container
        document.querySelector('.search-box-wrap').scrollIntoView({ 
          behavior: 'smooth', 
          block: 'center' 
        });
      }
    }
  });
</script>
@endpush
