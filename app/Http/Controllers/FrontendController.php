<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homepage()
    {
        $banners          = \App\Models\Banner::where('aktif', true)->orderBy('urutan')->get();
        $features         = \App\Models\Feature::orderBy('urutan')->get();
        $saranas          = \App\Models\Sarana::where('is_active', true)->orderBy('urutan')->get();
        $triDharmas       = \App\Models\TriDharma::where('is_active', true)->orderBy('urutan')->get();
        $tenagaPendidiks  = \App\Models\TenagaPendidik::with('layanan')->where('is_active', true)->orderBy('urutan')->get();
        $layanans         = \App\Models\Layanan::where('aktif', true)->orderBy('urutan')->get();
        $partners         = \App\Models\Partner::where('aktif', true)->orderBy('urutan')->get();
        $visiMisis        = \App\Models\VisiMisi::orderBy('urutan')->get()->groupBy('tipe');
        $nilaiPerusahaans = \App\Models\NilaiPerusahaan::orderBy('urutan')->get();
        $testimonials     = \App\Models\Testimonial::where('aktif', true)->orderByDesc('id')->get();
        $latestNews       = \App\Models\News::where('status', 'published')->latest()->paginate(10, ['*'], 'page_berita')->withQueryString();
        $announcements    = \App\Models\News::where('status', 'published')
                                ->where(function ($q) {
                                    $q->where('category', 'like', '%Pengumuman%')
                                      ->orWhere('title', 'like', '%Pengumuman%');
                                })
                                ->latest()
                                ->take(5)
                                ->get();
        $faqs             = \App\Models\Faq::take(6)->get();
        $galleries        = \App\Models\Gallery::latest()->take(6)->get();
        $prestasis        = \App\Models\Prestasi::where('is_active', true)->orderBy('urutan')->latest('id')->take(6)->get();
        $organisasis      = \App\Models\OrganisasiMahasiswa::where('is_active', true)->orderBy('urutan')->get();
        $about            = \App\Models\About::first();
        $sambutanDekan    = \App\Models\SambutanDekan::first();
        $struktur         = \App\Models\StrukturOrganisasi::first();
        $pmbSetting       = \App\Models\PmbSetting::first();
        $facultyStat      = \App\Models\FacultyStat::where('is_active', true)->latest('id')->first();
        $layananTerkaits  = \App\Models\LayananTerkait::where('is_active', true)->orderBy('urutan')->get();
        $layananTerkaitSetting = \App\Models\LayananTerkaitSetting::first();
        $homeProgramKerjas = \App\Models\ProgramKerja::where('is_active', true)->orderBy('urutan')->take(6)->get();

        if (!$facultyStat) {
            $facultyStat = (object) [
                'title'           => 'PLD UIS Dalam Angka',
                'jumlah_prodi'    => 0,
                'total_mahasiswa' => 0,
                'total_dosen'     => 0,
                'total_alumni'    => 0,
                'image'           => null,
            ];
        }

        return view('layouts.frontend.homepage', compact(
            'banners',
            'features',
            'saranas',
            'triDharmas',
            'tenagaPendidiks',
            'layanans',
            'partners',
            'visiMisis',
            'nilaiPerusahaans',
            'testimonials',
            'latestNews',
            'announcements',
            'faqs',
            'galleries',
            'prestasis',
            'organisasis',
            'about',
            'sambutanDekan',
            'struktur',
            'pmbSetting',
            'facultyStat',
            'layananTerkaits',
            'layananTerkaitSetting',
            'homeProgramKerjas'
        ));
    }

    public function kurikulum(\Illuminate\Http\Request $request)
    {
        $prodis = \App\Models\Layanan::where('aktif', true)->orderBy('urutan')->get();

        $selectedProdiId = $request->query('prodi');
        if ($selectedProdiId) {
            $currentProdi = $prodis->firstWhere('id', $selectedProdiId) ?? $prodis->first();
        } else {
            $currentProdi = $prodis->first();
        }

        $query = \App\Models\Kurikulum::where('is_active', true);
        if ($currentProdi) {
            $query->where('layanan_id', $currentProdi->id);
        }

        $courses = $query->orderBy('semester')->orderBy('urutan')->orderBy('id')->get();
        $coursesBySemester = $courses->groupBy('semester');

        $totalSks = $courses->sum('sks');
        $totalMatakuliah = $courses->count();

        $pageTitle = 'Kurikulum ' . ($currentProdi?->judul ?? 'Program Studi PLD');

        return view('layouts.frontend.kurikulum', compact('prodis', 'currentProdi', 'coursesBySemester', 'totalSks', 'totalMatakuliah', 'pageTitle'));
    }

    public function kalenderAkademik()
    {
        $item = \App\Models\Akademik::firstOrCreate(['tipe' => 'kalender'], [
            'judul'     => 'Kalender Akademik Tahun Akademik 2026/2027',
            'subjudul'  => 'Jadwal perkuliahan, registrasi, UTS, UAS, dan kegiatan akademik fakultas.',
            'deskripsi' => '<p>Kalender Akademik memuat seluruh linimasa kegiatan perkuliahan Semester Ganjil dan Genap, termasuk masa registrasi ulang, pengisian KRS, bimbingan akademik, hingga yudisium dan wisuda.</p>',
            'link_url'  => '',
            'is_active' => true,
        ]);
        $pageTitle = 'Kalender Akademik';
        return view('layouts.frontend.akademik', compact('item', 'pageTitle'));
    }

    public function pedomanAkademik()
    {
        $item = \App\Models\Akademik::firstOrCreate(['tipe' => 'pedoman'], [
            'judul'     => 'Pedoman & Panduan Akademik Mahasiswa',
            'subjudul'  => 'Buku panduan tata tertib, prosedur skripsi, magang/PKL, dan etika akademik.',
            'deskripsi' => '<p>Buku Pedoman Akademik merupakan acuan utama bagi seluruh civitas akademika PLD UIS dalam menjalankan aktivitas belajar-mengajar, tata tertib perkuliahan, evaluasi hasil belajar, dan layanan kemahasiswaan.</p>',
            'link_url'  => '',
            'is_active' => true,
        ]);
        $pageTitle = 'Pedoman Akademik';
        return view('layouts.frontend.akademik', compact('item', 'pageTitle'));
    }

    public function sistemAkademik()
    {
        $item = \App\Models\Akademik::firstOrCreate(['tipe' => 'sistem'], [
            'judul'     => 'Portal Sistem Informasi Akademik (SIAKAD & E-Learning)',
            'subjudul'  => 'Layanan portal digital terpadu untuk pengisian KRS, presensi, nilai, dan pembelajaran online.',
            'deskripsi' => '<p>Sistem Informasi Akademik (SIAKAD) PLD Universitas Ibnu Sina memfasilitasi mahasiswa dan dosen dalam proses administrasi perkuliahan secara daring, cepat, dan transparan.</p>',
            'link_url'  => 'https://siakad.uis.ac.id',
            'is_active' => true,
        ]);
        $pageTitle = 'Sistem Akademik & Portal Online';
        return view('layouts.frontend.akademik', compact('item', 'pageTitle'));
    }

    public function dosen(\Illuminate\Http\Request $request)
    {
        $prodis = \App\Models\Layanan::where('aktif', true)->orderBy('urutan')->get();

        $selectedProdiId = $request->query('prodi');
        if ($selectedProdiId) {
            $currentProdi = $prodis->firstWhere('id', $selectedProdiId) ?? $prodis->first();
        } else {
            $currentProdi = $prodis->first();
        }

        $search = trim($request->query('q', ''));

        $query = \App\Models\Dosen::where('is_active', true);
        if ($currentProdi) {
            $query->where('layanan_id', $currentProdi->id);
        }

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_dosen', 'like', "%{$search}%")
                  ->orWhere('nidn', 'like', "%{$search}%")
                  ->orWhere('nuptk', 'like', "%{$search}%")
                  ->orWhere('jabatan_fungsional', 'like', "%{$search}%");
            });
        }

        $totalDosen = (clone $query)->count();
        $dosens = $query->orderBy('urutan')->orderBy('nama_dosen')->paginate(10)->withQueryString();

        $pageTitle = 'Dosen ' . ($currentProdi?->judul ?? 'Program Studi PLD UIS');

        return view('layouts.frontend.dosen', compact('prodis', 'currentProdi', 'dosens', 'totalDosen', 'search', 'pageTitle'));
    }

    public function layanan()
    {
        $layanans = \App\Models\Layanan::where('aktif', true)->orderBy('urutan')->get();
        return view('layouts.frontend.layanan', compact('layanans'));
    }

    public function layananDetail($id)
    {
        $layanan  = \App\Models\Layanan::findOrFail($id);
        $layanans = \App\Models\Layanan::where('aktif', true)->orderBy('urutan')->get();
        return view('layouts.frontend.layanan-detail', compact('layanan', 'layanans'));
    }

    public function galeri()
    {
        $galleries = \App\Models\Gallery::latest()->paginate(12);
        return view('layouts.frontend.galeri', compact('galleries'));
    }

    public function galeriDetail($slug)
    {
        $gallery = \App\Models\Gallery::where(function ($q) use ($slug) {
                $q->where('slug', $slug)
                  ->orWhere('id', $slug);
            })
            ->firstOrFail();

        $otherGalleries = \App\Models\Gallery::where('id', '!=', $gallery->id)
                            ->latest('id')
                            ->take(6)
                            ->get();

        return view('layouts.frontend.galeri-detail', compact('gallery', 'otherGalleries'));
    }

    public function tentang()
    {
        $about      = \App\Models\About::first();
        $features   = \App\Models\Feature::orderBy('urutan')->get();
        $milestones = \App\Models\Milestone::orderBy('tahun')->get();
        $partners   = \App\Models\Partner::orderBy('urutan')->get();
        $contact    = \App\Models\Contact::first();
        return view('layouts.frontend.about', compact('about', 'features', 'milestones', 'partners', 'contact'));
    }

    public function sambutanDekan()
    {
        $sambutanDekan = \App\Models\SambutanDekan::first();
        $contact       = \App\Models\Contact::first();
        return view('layouts.frontend.sambutan-dekan', compact('sambutanDekan', 'contact'));
    }

    public function visiMisi()
    {
        $about            = \App\Models\About::first();
        $visiMisis        = \App\Models\VisiMisi::orderBy('urutan')->get()->groupBy('tipe');
        $nilaiPerusahaans = \App\Models\NilaiPerusahaan::orderBy('urutan')->get();
        return view('layouts.frontend.visi-misi', compact('about', 'visiMisis', 'nilaiPerusahaans'));
    }

    public function sejarah()
    {
        $about      = \App\Models\About::first();
        $milestones = \App\Models\Milestone::orderBy('tahun')->get();
        return view('layouts.frontend.sejarah', compact('about', 'milestones'));
    }

    public function faq()
    {
        $faqs = \App\Models\Faq::all();
        return view('layouts.frontend.faq', compact('faqs'));
    }

    public function strukturOrganisasi()
    {
        $struktur = \App\Models\StrukturOrganisasi::first();
        return view('layouts.frontend.struktur-organisasi', compact('struktur'));
    }

    public function programKerja(\Illuminate\Http\Request $request)
    {
        $selectedCat = $request->query('kategori');
        $query = \App\Models\ProgramKerja::where('is_active', true);

        if (!empty($selectedCat)) {
            $query->where('kategori', $selectedCat);
        }

        $programKerjas = $query->orderBy('urutan')->orderBy('id')->paginate(9)->withQueryString();
        $totalPrograms = \App\Models\ProgramKerja::where('is_active', true)->count();
        $categories = \App\Models\ProgramKerja::where('is_active', true)
            ->whereNotNull('kategori')
            ->distinct()
            ->pluck('kategori');

        return view('layouts.frontend.program-kerja', compact('programKerjas', 'totalPrograms', 'categories', 'selectedCat'));
    }

    public function volunteer()
    {
        return view('layouts.frontend.volunteer');
    }

    public function storeVolunteer(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'     => 'required|string|max:255',
            'nim'              => 'nullable|string|max:50',
            'jurusan_prodi'    => 'nullable|string|max:150',
            'no_hp_wa'         => 'required|string|max:30',
            'email'            => 'required|email|max:150',
            'keahlian'         => 'nullable|string|max:255',
            'alasan_bergabung' => 'nullable|string|max:2000',
        ]);

        \App\Models\Volunteer::create($validated);

        return redirect()->route('homepage.volunteer')->with('success', 'Terima kasih atas antusiasme Anda! Pendaftaran Anda telah kami terima dan tim PLD UIS akan segera menghubungi Anda.');
    }

    public function kontak()
    {
        return view('layouts.frontend.contact');
    }

    public function news(\Illuminate\Http\Request $request)
    {
        $search      = $request->query('q');
        $selectedCat = $request->query('category');
        $query       = \App\Models\News::where('status', 'published');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if (!empty($selectedCat)) {
            $query->where('category', $selectedCat);
        }

        $featured = null;
        if (empty($search) && empty($selectedCat)) {
            $featured = \App\Models\News::where('status', 'published')
                            ->where('is_featured', true)
                            ->latest()
                            ->first();

            if (!$featured) {
                $featured = \App\Models\News::where('status', 'published')
                                ->latest()
                                ->first();
            }
        }

        $newsList = $query
                        ->when($featured, fn($q) => $q->where('id', '!=', $featured->id))
                        ->latest()
                        ->paginate(10)
                        ->withQueryString();

        $categories = \App\Models\News::where('status', 'published')
                        ->whereNotNull('category')
                        ->where('category', '!=', '')
                        ->select('category', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
                        ->groupBy('category')
                        ->orderBy('category')
                        ->get();

        return view('layouts.frontend.news', compact('featured', 'newsList', 'search', 'categories', 'selectedCat'));
    }

    public function newsDetail($slug)
    {
        $news = \App\Models\News::where('status', 'published')
            ->where(function ($q) use ($slug) {
                $q->where('slug', $slug)
                  ->orWhere('id', $slug);
            })
            ->firstOrFail();

        $relatedNews = \App\Models\News::where('status', 'published')
                        ->where('id', '!=', $news->id)
                        ->latest()
                        ->take(4)
                        ->get();

        $categories  = \App\Models\News::where('status', 'published')
                        ->whereNotNull('category')
                        ->where('category', '!=', '')
                        ->select('category', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
                        ->groupBy('category')
                        ->orderBy('category')
                        ->get();

        return view('layouts.frontend.news-detail', compact('news', 'relatedNews', 'categories'));
    }

    public function prestasi(\Illuminate\Http\Request $request)
    {
        $search          = $request->query('q');
        $selectedTingkat = $request->query('tingkat');
        $selectedProdi   = $request->query('prodi');

        $query = \App\Models\Prestasi::where('is_active', true);

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('judul_prestasi', 'like', "%{$search}%")
                  ->orWhere('nama_mahasiswa', 'like', "%{$search}%")
                  ->orWhere('penyelenggara', 'like', "%{$search}%")
                  ->orWhere('peringkat', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if (!empty($selectedTingkat)) {
            $query->where('tingkat', $selectedTingkat);
        }

        if (!empty($selectedProdi)) {
            $query->where('prodi', $selectedProdi);
        }

        $prestasiList = $query->orderBy('urutan')->latest('id')->paginate(9)->withQueryString();

        $tingkatList = ['Internasional', 'Nasional', 'Provinsi / Wilayah', 'Universitas'];

        return view('layouts.frontend.prestasi', compact('prestasiList', 'search', 'selectedTingkat', 'selectedProdi', 'tingkatList'));
    }

    public function prestasiDetail($slug)
    {
        $prestasi = \App\Models\Prestasi::where('is_active', true)
            ->where(function ($q) use ($slug) {
                $q->where('slug', $slug)
                  ->orWhere('id', $slug);
            })
            ->firstOrFail();

        $otherPrestasis = \App\Models\Prestasi::where('is_active', true)
                            ->where('id', '!=', $prestasi->id)
                            ->orderBy('urutan')
                            ->latest('id')
                            ->take(5)
                            ->get();

        return view('layouts.frontend.prestasi-detail', compact('prestasi', 'otherPrestasis'));
    }

    public function organisasiMahasiswa(\Illuminate\Http\Request $request)
    {
        $search = $request->query('q');
        $selectedKategori = $request->query('kategori');

        $query = \App\Models\OrganisasiMahasiswa::where('is_active', true);

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_organisasi', 'like', "%{$search}%")
                  ->orWhere('singkatan', 'like', "%{$search}%")
                  ->orWhere('nama_ketua', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if (!empty($selectedKategori)) {
            $query->where('kategori', $selectedKategori);
        }

        $organisasiList = $query->orderBy('urutan')->latest('id')->paginate(9)->withQueryString();

        $kategoriList = ['BEM / DPM', 'Himpunan Mahasiswa (HIMA)', 'Unit Kegiatan Mahasiswa (UKM)', 'Komunitas Minat Bakat'];

        return view('layouts.frontend.organisasi', compact('organisasiList', 'search', 'selectedKategori', 'kategoriList'));
    }

    public function organisasiMahasiswaDetail($slug)
    {
        $organisasi = \App\Models\OrganisasiMahasiswa::where('is_active', true)
            ->where(function ($q) use ($slug) {
                $q->where('slug', $slug)
                  ->orWhere('id', $slug);
            })
            ->firstOrFail();

        $otherOrganisasis = \App\Models\OrganisasiMahasiswa::where('is_active', true)
                                ->where('id', '!=', $organisasi->id)
                                ->orderBy('urutan')
                                ->latest('id')
                                ->take(5)
                                ->get();

        return view('layouts.frontend.organisasi-detail', compact('organisasi', 'otherOrganisasis'));
    }

    public function testimoni(\Illuminate\Http\Request $request)
    {
        $search = $request->query('q');
        $selectedKategori = $request->query('kategori');
        $selectedRating = $request->query('rating');

        $query = \App\Models\Testimonial::where('aktif', true);

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('pekerjaan', 'like', "%{$search}%")
                  ->orWhere('pesan', 'like', "%{$search}%");
            });
        }

        if (!empty($selectedKategori)) {
            $query->where('kategori', $selectedKategori);
        }

        if (!empty($selectedRating)) {
            $query->where('bintang', $selectedRating);
        }

        $testimonials = $query->orderByDesc('id')->paginate(10)->withQueryString();

        // Rating Stats for Analytics Chart & Summary
        $allActive = \App\Models\Testimonial::where('aktif', true)->get();
        $totalCount = $allActive->count();
        $avgScore = $totalCount > 0 ? round($allActive->avg('bintang'), 1) : 5.0;

        $ratingCounts = [
            5 => $allActive->where('bintang', 5)->count(),
            4 => $allActive->where('bintang', 4)->count(),
            3 => $allActive->where('bintang', 3)->count(),
            2 => $allActive->where('bintang', 2)->count(),
            1 => $allActive->where('bintang', 1)->count(),
        ];

        $ratingPercentages = [];
        foreach ($ratingCounts as $star => $count) {
            $ratingPercentages[$star] = $totalCount > 0 ? round(($count / $totalCount) * 100) : 0;
        }

        $categories = $allActive->pluck('kategori')->filter()->unique()->values();

        return view('layouts.frontend.testimoni', compact(
            'testimonials',
            'search',
            'selectedKategori',
            'selectedRating',
            'totalCount',
            'avgScore',
            'ratingCounts',
            'ratingPercentages',
            'categories'
        ));
    }

    public function alumniCreateTestimoni()
    {
        return view('layouts.frontend.alumni-form');
    }

    public function storeTestimonial(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'nama'      => ['required', 'string', 'max:255'],
            'pekerjaan' => ['required', 'string', 'max:255'],
            'kategori'  => ['required', 'string', 'max:150'],
            'bintang'   => ['required', 'integer', 'min:1', 'max:5'],
            'pesan'     => ['required', 'string', 'max:2000'],
        ], [
            'nama.required'      => 'Nama lengkap wajib diisi.',
            'pekerjaan.required' => 'Profesi / instansi / angkatan wajib diisi.',
            'kategori.required'  => 'Kategori hubungan wajib dipilih.',
            'bintang.required'   => 'Rating kepuasan bintang wajib dipilih.',
            'pesan.required'     => 'Pesan / testimoni Anda wajib diisi.',
        ]);

        $validated['aktif'] = false; // Pending moderasi admin

        \App\Models\Testimonial::create($validated);

        return redirect()
            ->route('homepage.alumni.create')
            ->with('success', 'Terima kasih atas kontribusi Anda! Testimoni & kisah sukses Anda telah berhasil kami terima dan akan segera ditinjau oleh admin.');
    }

    /**
     * Halaman Publik Data & Statistik Mahasiswa Disabilitas PLD UIS
     */
    public function statistikMahasiswa(\Illuminate\Http\Request $request)
    {
        $query = \App\Models\StatistikMahasiswa::query();

        $selectedAngkatan = $request->get('angkatan');
        $selectedStatus = $request->get('status', 'Semua');

        if (!empty($selectedAngkatan)) {
            $query->where('angkatan', $selectedAngkatan);
        }
        if (!empty($selectedStatus) && $selectedStatus !== 'Semua') {
            $query->where('status', $selectedStatus);
        }

        $allData = $query->get();
        $totalMahasiswa = $allData->count();

        // 1. Rekapitulasi per Jenis Disabilitas
        $disabilitasCounts = $allData->groupBy('jenis_disabilitas')->map->count()->sortDesc();

        // Standard icons & colors for each disabilitas
        $disabilitasMeta = [
            'Tunanetra'         => ['icon' => 'bi-eye-slash-fill', 'color' => '#283759', 'bg' => '#eef4fc'],
            'Tunadaksa'         => ['icon' => 'bi-person-wheelchair', 'color' => '#141b39', 'bg' => '#dbe7f7'],
            'Tunarungu'         => ['icon' => 'bi-ear-fill', 'color' => '#50697d', 'bg' => '#f0f5fc'],
            'Tunagrahita'       => ['icon' => 'bi-puzzle-fill', 'color' => '#79a8e2', 'bg' => '#e0ecf9'],
            'Kesulitan Belajar' => ['icon' => 'bi-book-half', 'color' => '#283759', 'bg' => '#eef4fc'],
            'Tunawicara'        => ['icon' => 'bi-chat-dots-fill', 'color' => '#6396d8', 'bg' => '#dbe8f8'],
            'Autisme'           => ['icon' => 'bi-heart-pulse-fill', 'color' => '#50697d', 'bg' => '#eef4fc'],
            'Lainnya'           => ['icon' => 'bi-asterisk', 'color' => '#141b39', 'bg' => '#f8fafd'],
        ];

        // 2. Rekapitulasi per Fakultas (for Chart.js)
        $fakultasCounts = $allData->groupBy('fakultas')->map->count()->sortDesc();

        // 3. Rekapitulasi per Prodi (for Chart.js)
        $prodiCounts = $allData->groupBy('prodi')->map->count()->sortDesc();

        // Available Angkatan list for filter
        $angkatanList = \App\Models\StatistikMahasiswa::select('angkatan')->distinct()->orderBy('angkatan', 'desc')->pluck('angkatan');

        // Daftar mahasiswa untuk tabel direktori frontend (10 per halaman)
        $mahasiswaList = $query->orderBy('angkatan', 'desc')->orderBy('nama', 'asc')->paginate(10)->withQueryString();

        return view('layouts.frontend.statistik-mahasiswa', compact(
            'totalMahasiswa',
            'disabilitasCounts',
            'disabilitasMeta',
            'fakultasCounts',
            'prodiCounts',
            'angkatanList',
            'selectedAngkatan',
            'selectedStatus',
            'mahasiswaList'
        ));
    }
}
