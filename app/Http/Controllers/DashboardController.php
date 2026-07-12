<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\News;
use App\Models\Partner;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalNews         = News::count();
        $totalTestimonials = Testimonial::count();
        $totalLayanan      = Layanan::count();
        $totalPartners     = Partner::count();

        // Data chart testimoni masuk per hari
        $testimonialsChart = Testimonial::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->take(10)
            ->get();

        // Data chart rasio testimoni per kategori
        $testimonialsRatio = Testimonial::selectRaw('kategori, count(*) as total')
            ->groupBy('kategori')
            ->get();

        // Testimoni terbaru
        $latestTestimonials = Testimonial::latest()->take(5)->get();

        return view('layouts.dashboard.index', compact(
            'totalNews',
            'totalTestimonials',
            'totalLayanan',
            'totalPartners',
            'testimonialsChart',
            'testimonialsRatio',
            'latestTestimonials'
        ));
    }
}
