<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\City;
use App\Models\Job;
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

        $locationRecentJobs = Job::query()->listable()
            ->when($selectedCity, function ($query) use ($selectedCity) {
                $query->where('city_id', $selectedCity->id);
            })
            ->orderBy('published_until_at', 'desc')
            ->limit(6)
            ->get();

        $recentJobs = Job::query()->listable()
            ->orderBy('published_until_at', 'desc')
            ->limit(2)
            ->get();

        $blogs = Blog::query()->inRandomOrder()->limit(3)->get();

        $cities = Cache::rememberForever('cities',function (){
            return City::all();
        });

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
        ]);
    }
}
