{{-- Active Filter Notification --}}
@if(!empty($selectedCat) || !empty($search))
  <div class="d-flex align-items-center justify-content-between px-3 py-2 mb-4 rounded-3 small bg-white shadow-sm" style="border: 1px solid rgba(86, 130, 61, 0.2);">
    <div class="text-muted">
      @if(!empty($selectedCat))
        Menampilkan kategori: <strong class="text-dark">{{ $selectedCat }}</strong>
      @endif
      @if(!empty($search))
        {{ !empty($selectedCat) ? '• ' : '' }}Pencarian: <strong class="text-dark">"{{ $search }}"</strong>
      @endif
      <span class="badge ms-1" style="background: var(--pld-purple, #56823D); color: #fff;">{{ $newsList->total() }} ditemukan</span>
    </div>
    <a href="{{ route('homepage.news', !empty($selectedCat) && !empty($search) ? ['category' => $selectedCat] : []) }}" class="text-danger fw-bold text-decoration-none small portal-news-reset-link">
      <i class="bi bi-x-circle me-1"></i> Reset Filter
    </a>
  </div>
@endif

{{-- Grid Semua Berita --}}
@if(isset($newsList) && $newsList->count() > 0)
  <div class="row g-4">
    @foreach($newsList as $article)
      <div class="col-md-6 col-lg-4">
        <div class="news-card-portal">
          <div class="news-card-thumb-wrap">
            @if($article->thumbnail)
              <img src="{{ asset('storage/' . $article->thumbnail) }}"
                   alt="{{ $article->title }}"
                   class="news-card-thumb"
                   onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
              <div class="w-100 h-100 align-items-center justify-content-center text-muted" style="display: none;">
                <i class="bi bi-newspaper fs-1"></i>
              </div>
            @else
              <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                <i class="bi bi-newspaper fs-1"></i>
              </div>
            @endif
            <span class="news-cat-badge">{{ $article->category ?? 'Berita' }}</span>
            @if(!empty($article->gallery) && count($article->gallery) > 0)
              <span class="news-gallery-badge">
                <i class="bi bi-images me-1"></i> +{{ count($article->gallery) }} Foto
              </span>
            @endif
          </div>

          <div class="news-card-body">
            <div>
              <div class="text-muted small mb-2">
                <i class="bi bi-calendar3 me-1"></i> {{ $article->created_at->format('d M Y') }}
                <span class="mx-1">•</span>
                <i class="bi bi-person me-1"></i> {{ $article->user?->name ?? 'Admin PLD' }}
              </div>
              <h5 class="fw-bold mb-2 text-dark">{{ Str::limit($article->title, 65) }}</h5>
              <p class="text-muted small mb-3">
                {{ Str::limit($article->description ?? strip_tags($article->content), 110) }}
              </p>
            </div>
            <div class="pt-3 border-top d-flex justify-content-between align-items-center">
              <a href="{{ route('homepage.news.detail', $article->slug ?? $article->id) }}" class="fw-bold text-decoration-none" style="color: var(--pld-purple); font-size: 13.5px;">
                Selengkapnya <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{-- Pagination --}}
  @if(method_exists($newsList, 'links') && $newsList->hasPages())
    <div class="mt-5 d-flex justify-content-center portal-news-pagination">
      {{ $newsList->links('pagination::bootstrap-5') }}
    </div>
  @endif
@else
  @if(!empty($search) || !empty($selectedCat))
    <div class="p-5 text-center bg-white rounded-4 shadow-sm">
      <i class="bi bi-search fs-1 text-muted mb-3 d-block"></i>
      <h4 class="fw-bold text-dark">Berita Tidak Ditemukan</h4>
      <p class="text-muted small mb-3">
        Tidak ada berita atau informasi yang cocok dengan
        @if(!empty($search)) kata kunci <strong>"{{ $search }}"</strong> @endif
        @if(!empty($selectedCat)) pada kategori <strong>{{ $selectedCat }}</strong> @endif.
      </p>
      <a href="{{ route('homepage.news') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-4 portal-news-reset-link">
        <i class="bi bi-arrow-counterclockwise me-1"></i> Tampilkan Semua Berita
      </a>
    </div>
  @elseif(!isset($featured) || !$featured)
    <div class="p-5 text-center bg-white rounded-4 shadow-sm">
      <i class="bi bi-newspaper fs-1 text-muted mb-3 d-block"></i>
      <h4 class="fw-bold text-dark">Belum Ada Berita</h4>
      <p class="text-muted small">Berita dan artikel terbaru PLD UIS akan segera dipublikasikan di sini.</p>
    </div>
  @endif
@endif

