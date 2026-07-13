<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homepage()
    {
        $banners      = \App\Models\Banner::where('aktif', true)->orderBy('urutan')->get();
        $features     = \App\Models\Feature::orderBy('urutan')->get();
        $layanans     = \App\Models\Layanan::where('aktif', true)->orderBy('urutan')->get();
        $partners     = \App\Models\Partner::where('aktif', true)->orderBy('urutan')->get();
        $visiMisis    = \App\Models\VisiMisi::orderBy('urutan')->get()->groupBy('tipe');
        $nilaiPerusahaans = \App\Models\NilaiPerusahaan::orderBy('urutan')->get();
        $testimonials = \App\Models\Testimonial::where('aktif', true)->orderByDesc('id')->take(6)->get();
        return view('layouts.frontend.homepage', compact('banners', 'features', 'layanans', 'partners', 'visiMisis', 'nilaiPerusahaans', 'testimonials'));
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
        $about               = \App\Models\About::first();
        $struktur            = \App\Models\StrukturOrganisasi::first();
        $visiMisis           = \App\Models\VisiMisi::orderBy('urutan')->get()->groupBy('tipe');
        $nilaiPerusahaans    = \App\Models\NilaiPerusahaan::orderBy('urutan')->get();
        return view('layouts.frontend.about', compact('about', 'struktur', 'visiMisis', 'nilaiPerusahaans'));
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

    public function news()
    {
        $featured  = \App\Models\News::where('status', 'published')
                        ->where('is_featured', true)
                        ->latest()
                        ->first();

        // Fallback: jika tidak ada yang di-featured, ambil artikel terbaru
        if (!$featured) {
            $featured = \App\Models\News::where('status', 'published')
                            ->latest()
                            ->first();
        }

        $newsList  = \App\Models\News::where('status', 'published')
                        ->when($featured, fn($q) => $q->where('id', '!=', $featured->id))
                        ->latest()
                        ->paginate(9);

        return view('layouts.frontend.news', compact('featured', 'newsList'));
    }

    public function newsDetail($id)
    {
        $news        = \App\Models\News::where('status', 'published')->findOrFail($id);
        $relatedNews = \App\Models\News::where('status', 'published')
                        ->where('id', '!=', $id)
                        ->latest()
                        ->take(4)
                        ->get();

        return view('layouts.frontend.news-detail', compact('news', 'relatedNews'));
    }
}
