<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Banner;
use App\Models\Layanan;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalNews         = News::count();
        $totalGalleries    = Gallery::count();
        $totalTestimonials = Testimonial::count();
        $totalFaqs         = Faq::count();
        $totalLayanan      = Layanan::count();
        $totalPartners     = Partner::count();
        $totalBanners      = Banner::count();
        $totalUsers        = User::count();

        // Data chart testimoni masuk per hari
        $testimonialsChart = Testimonial::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->take(10)
            ->get();

        // Data berita & ulasan terbaru
        $latestNews        = News::latest()->take(5)->get();
        $latestTestimonials = Testimonial::latest()->take(5)->get();

        return view('layouts.dashboard.index', compact(
            'totalNews',
            'totalGalleries',
            'totalTestimonials',
            'totalFaqs',
            'totalLayanan',
            'totalPartners',
            'totalBanners',
            'totalUsers',
            'testimonialsChart',
            'latestNews',
            'latestTestimonials'
        ));
    }
}
