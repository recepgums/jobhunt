<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\City;
use App\Models\Faq;
use App\Models\Job;
use App\Models\Review;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    private $city;

    public function __construct()
    {
        if ($position = Location::get()) {
            $this->city = City::find((int)$position->regionCode);
        }
    }

    public function index()
    {
        $selectedCity = $this->city ?? null;

        $cities = Cache::rememberForever('cities',fn()=> City::all());

        $faqs = Cache::remember('faqs',3600, fn()=> Faq::listable()->orderBy('order')->limit(5)->get());

        $reviews = Cache::remember('reviews',3600,fn()=> Review::orderBy('order')->limit(5)->get());

        $locationRecentJobsQuery = Job::query()->listable()
            ->when($selectedCity, function ($query) use ($selectedCity) {
                $query->where('city_id', $selectedCity->id);
            });

        $locationRecentJobs = $locationRecentJobsQuery
            ->orderBy('created_at', 'desc')
            ->orderBy('published_until_at', 'desc')
            ->limit(6)
            ->get();

        $highlightedLocationJobs = $locationRecentJobsQuery->where('highlighted_until_at','>',now())->limit(3)->get();

        $recentJobs = Job::query()->listable()
            ->orderBy('published_until_at', 'desc')
            ->limit(2)
            ->get();

        $blogs = Blog::query()->inRandomOrder()->limit(3)->get();

        $districts = $selectedCity?->districts;
        $opePositionCategoriesWithCount = Job::listable()
            ->whereNotNull('category_id')
            ->limit(5)
            ->groupBy('category_id')
            ->select('category_id', DB::raw('count(*) as total'))
            ->with('category')
            ->get();

        return view('pages.home', [
            'isHomepage' => true,
            'selectedCity' => $selectedCity,
            'districts' => $districts,
            'blogs' => $blogs,
            'cities' => $cities,
            'opePositionCategoriesWithCount' => $opePositionCategoriesWithCount,
            'recentJobs' => $recentJobs,
            'locationRecentJobs' => $locationRecentJobs,
            'faqs' => $faqs,
            'reviews' => $reviews,
            'highlightedLocationJobs' => $highlightedLocationJobs,
        ]);
    }
}
