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
        return view('layouts.frontend.homepage');
    }

    public function tentang()
    {
        $about               = \App\Models\About::first();
        $milestones          = \App\Models\Milestone::orderBy('tahun')->get();
        $struktur            = \App\Models\StrukturOrganisasi::first();
        $visiMisis           = \App\Models\VisiMisi::orderBy('urutan')->get()->groupBy('tipe');
        $nilaiPerusahaans    = \App\Models\NilaiPerusahaan::orderBy('urutan')->get();
        return view('layouts.frontend.about', compact('about', 'milestones', 'struktur', 'visiMisis', 'nilaiPerusahaans'));
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
}
