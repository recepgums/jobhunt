<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\City;
use App\Models\Job;
use Illuminate\Support\Facades\Cache;
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

        $recentJobs = Job::query()->listable()
            ->when($selectedCity, function ($query) use ($selectedCity) {
                $query->where('city_id', $selectedCity->id);
            })
            ->orderBy('published_until_at', 'desc')
            ->limit(3)
            ->get();

        $blogs = Blog::query()->inRandomOrder()->limit(3)->get();

        $cities = Cache::rememberForever('cities',function (){
            return City::all();
        });

        $districts = $selectedCity?->districts;

        return view('pages.home', [
            'isHomepage' => true,
            'selectedCity' => $selectedCity,
            'districts' => $districts,
            'blogs' => $blogs,
            'cities' => $cities,
            'recentJobs' => $recentJobs
        ]);
    }
}
