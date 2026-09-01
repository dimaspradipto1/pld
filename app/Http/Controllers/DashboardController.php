<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Banner;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalNews = News::count();
        $totalGalleries = Gallery::count();
        $totalTestimonials = Testimonial::count();
        $totalFaqs = Faq::count();
        $totalBanners = Banner::count();
        $totalUsers = User::count();

        // Data berita & ulasan terbaru
        $latestNews = News::latest()->take(5)->get();
        $latestTestimonials = Testimonial::latest()->take(5)->get();

        return view('layouts.dashboard.index', compact(
            'totalNews',
            'totalGalleries',
            'totalTestimonials',
            'totalFaqs',
            'totalBanners',
            'totalUsers',
            'latestNews',
            'latestTestimonials'
        ));
    }
}
