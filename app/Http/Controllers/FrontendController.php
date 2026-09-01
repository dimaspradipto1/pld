<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homepage()
    {
        $banners          = \App\Models\Banner::where('aktif', true)->orderBy('urutan')->get();
        $features         = \App\Models\Feature::orderBy('urutan')->get();
        $layanans         = \App\Models\Layanan::where('aktif', true)->orderBy('urutan')->get();
        $partners         = \App\Models\Partner::where('aktif', true)->orderBy('urutan')->get();
        $visiMisis        = \App\Models\VisiMisi::orderBy('urutan')->get()->groupBy('tipe');
        $nilaiPerusahaans = \App\Models\NilaiPerusahaan::orderBy('urutan')->get();
        $testimonials     = \App\Models\Testimonial::where('aktif', true)->orderByDesc('id')->take(6)->get();
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
        $about            = \App\Models\About::first();
        $sambutanDekan    = \App\Models\SambutanDekan::first();
        $struktur         = \App\Models\StrukturOrganisasi::first();
        $pmbSetting       = \App\Models\PmbSetting::first();

        return view('layouts.frontend.homepage', compact(
            'banners',
            'features',
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
            'about',
            'sambutanDekan',
            'struktur',
            'pmbSetting'
        ));
    }

    public function kurikulum()
    {
        $item = \App\Models\Akademik::firstOrCreate(['tipe' => 'kurikulum'], [
            'judul'     => 'Kurikulum & Capaian Pembelajaran',
            'subjudul'  => 'Struktur kurikulum berbasis kompetensi dan Outcome-Based Education (OBE) FIKES UIS.',
            'deskripsi' => '<p>Kurikulum Fakultas Ilmu Kesehatan dirancang untuk menghasilkan lulusan yang kompeten, berdaya saing global, dan berintegritas tinggi. Mengacu pada Kerangka Kualifikasi Nasional Indonesia (KKNI) serta standar profesi kesehatan.</p>',
            'link_url'  => '',
            'is_active' => true,
        ]);
        $pageTitle = 'Kurikulum';
        return view('layouts.frontend.akademik', compact('item', 'pageTitle'));
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
            'deskripsi' => '<p>Buku Pedoman Akademik merupakan acuan utama bagi seluruh civitas akademika FIKES UIS dalam menjalankan aktivitas belajar-mengajar, tata tertib perkuliahan, evaluasi hasil belajar, dan layanan kemahasiswaan.</p>',
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
            'deskripsi' => '<p>Sistem Informasi Akademik (SIAKAD) FIKES Universitas Ibnu Sina memfasilitasi mahasiswa dan dosen dalam proses administrasi perkuliahan secara daring, cepat, dan transparan.</p>',
            'link_url'  => 'https://siakad.uis.ac.id',
            'is_active' => true,
        ]);
        $pageTitle = 'Sistem Akademik';
        return view('layouts.frontend.akademik', compact('item', 'pageTitle'));
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
        $galleries = \App\Models\Gallery::latest()->get();
        return view('layouts.frontend.galeri', compact('galleries'));
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

    public function testimoni()
    {
        $testimonials = \App\Models\Testimonial::where('aktif', true)->orderByDesc('id')->get();
        return view('layouts.frontend.testimoni', compact('testimonials'));
    }

    /**
     * Menyimpan testimoni yang diajukan oleh pengguna/publik.
     */
    public function storeTestimonial(\App\Http\Requests\TestimonialRequest $request)
    {
        \App\Models\Testimonial::create([
            'nama'      => $request->nama,
            'pekerjaan' => $request->pekerjaan,
            'kategori'  => $request->kategori,
            'bintang'   => $request->bintang,
            'pesan'     => $request->pesan,
            'aktif'     => false, // Default pending (butuh moderasi admin)
        ]);

        alert()->success('Terima Kasih!', 'Ulasan Anda berhasil dikirim dan akan segera diproses oleh admin.');

        return redirect()->back();
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

    public function newsDetail($id)
    {
        $news        = \App\Models\News::where('status', 'published')->findOrFail($id);
        $relatedNews = \App\Models\News::where('status', 'published')
                        ->where('id', '!=', $id)
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

    public function prestasiDetail($id)
    {
        $prestasi = \App\Models\Prestasi::where('is_active', true)->findOrFail($id);
        $otherPrestasis = \App\Models\Prestasi::where('is_active', true)
                            ->where('id', '!=', $id)
                            ->orderBy('urutan')
                            ->latest('id')
                            ->take(5)
                            ->get();

        return view('layouts.frontend.prestasi-detail', compact('prestasi', 'otherPrestasis'));
    }
}
