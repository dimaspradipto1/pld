{{-- Active Search Notification --}}
@if(!empty($searchBerita))
  <div class="d-flex align-items-center justify-content-between px-3 py-2 mb-3 rounded-3 small" style="background: var(--pld-purple-light, #f0f6ec); border: 1px solid rgba(86, 130, 61, 0.2);">
    <span class="text-muted">
      Menampilkan hasil pencarian: <strong class="text-dark">"{{ $searchBerita }}"</strong>
      <span class="badge ms-1" style="background: var(--pld-purple, #56823D); color: #fff;">{{ $latestNews->total() }} ditemukan</span>
    </span>
    <a href="{{ route('homepage') }}#berita" class="text-danger fw-bold text-decoration-none home-news-reset-link">
      <i class="bi bi-x-circle me-1"></i>Reset
    </a>
  </div>
@endif

{{-- Grid Daftar Berita (2 Kolom) --}}
<div class="row g-3">
  @if(isset($latestNews) && $latestNews->count() > 0)
    @foreach($latestNews as $news)
      <div class="col-sm-6">
        <a href="{{ route('homepage.news.detail', $news->slug ?? $news->id) }}" class="news-mini-item">
          <div class="news-mini-img-wrap">
            @if(!empty($news->thumbnail))
              <img src="{{ asset('storage/' . $news->thumbnail) }}"
                   alt="{{ $news->title }}"
                   class="news-mini-img"
                   onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
              <div class="news-mini-fallback" style="display: none;">
                <i class="bi bi-newspaper"></i>
              </div>
            @else
              <div class="news-mini-fallback">
                <i class="bi bi-newspaper"></i>
              </div>
            @endif
          </div>
          <div class="news-mini-content">
            <h6 class="news-mini-title">{{ $news->title }}</h6>
            <div class="news-mini-meta">
              {{ $news->created_at ? $news->created_at->format('d F Y // H:i') : '-' }}
            </div>
          </div>
        </a>
      </div>
    @endforeach
  @else
    <div class="col-12 text-muted py-4 text-center">
      @if(!empty($searchBerita))
        <i class="bi bi-search fs-2 d-block mb-2 text-secondary"></i>
        <p class="mb-2">Tidak ditemukan berita dengan kata kunci <strong>"{{ $searchBerita }}"</strong>.</p>
        <a href="{{ route('homepage') }}#berita" class="btn btn-sm btn-outline-secondary rounded-pill px-3 home-news-reset-link">
          Tampilkan Semua Berita
        </a>
      @else
        <p class="mb-0">Belum ada berita yang diterbitkan.</p>
      @endif
    </div>
  @endif
</div>

{{-- Pagination Berita --}}
@if(isset($latestNews) && method_exists($latestNews, 'hasPages') && $latestNews->hasPages())
  <div class="d-flex justify-content-center mt-4 pt-2 home-news-pagination">
    {{ $latestNews->fragment('berita')->links('pagination::bootstrap-5') }}
  </div>
@endif

{{-- Tombol Lihat Berita Lainnya --}}
<div class="text-center mt-3 pt-2">
  <a href="{{ !empty($searchBerita) ? route('homepage.news', ['q' => $searchBerita]) : route('homepage.news') }}" class="btn-pld-pill">
    Lihat Berita Lainnya
  </a>
</div>

