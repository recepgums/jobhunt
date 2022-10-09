<?php

namespace App\Http\Controllers;

use App\Console\Commands\GenerateSitemap;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\City;
use App\Models\Faq;
use App\Models\Job;
use App\Models\Review;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    private $city;

    public function __construct()
    {
        if ($position = Location::get()) {
            if (strlen($position->zipCode) == 4){
                $position->zipCode = "0".$position->zipCode;
            }
            $this->city = City::find((int)substr($position->zipCode, 0, 2));
        }
    }

    public function index()
    {
        $selectedCity = $this->city ?? null;
        $cities = Cache::rememberForever('cities',fn()=> City::all());
        $faqs = Cache::remember('faqs',3600, fn()=> Faq::listable()->orderBy('order')->limit(5)->get());
        $reviews = Cache::remember('reviews',3600,fn()=> Review::orderBy('order')->limit(5)->get());
        $categories = Cache::rememberForever('job-categories-all', fn() => Categories::forJob()->get());

        $locationRecentJobsQuery = Job::query()->listable()
            ->when($selectedCity, function ($query) use ($selectedCity) {
                $query->where('city_id', $selectedCity->id);
            });

        $locationRecentJobs = $locationRecentJobsQuery
            ->orderBy('created_at', 'desc')
            ->orderBy('published_until_at', 'desc')
            ->limit(6)
            ->get();

        $highlightedLocationJobs = $locationRecentJobsQuery->where('highlighted_until_at','>',now())->limit(2)->get();

        $recentJobs = Job::query()->listable()
            ->orderBy('published_until_at', 'desc')
            ->limit(2)
            ->get();

        $blogs = Blog::query()->inRandomOrder()->limit(6)->get();

        $districts = $selectedCity?->districts;

        return view('pages.home', [
            'isHomepage' => true,
            'selectedCity' => $selectedCity,
            'districts' => $districts,
            'blogs' => $blogs,
            'cities' => $cities,
            'recentJobs' => $recentJobs,
            'locationRecentJobs' => $locationRecentJobs,
            'faqs' => $faqs,
            'reviews' => $reviews,
            'categories' => $categories,
            'highlightedLocationJobs' => $highlightedLocationJobs,
        ]);
    }

    public function sitemap()
    {
        Artisan::call(GenerateSitemap::class);

        return redirect('sitemap.xml');
    }
}
