<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\City;
use App\Models\Gender;
use App\Models\WorkType;
use Illuminate\Support\Facades\Cache;
use Stevebauman\Location\Facades\Location;

class PublicDataController extends Controller
{
    public function city()
    {
        return City::all();
    }

    public function district(City $city)
    {
        return $city->districts;
    }

    public function jobCategories()
    {
        return Categories::forJob()->onlyParent()->get();
    }

    public function subCategory(Categories $category)
    {
        return $category->children;
    }

    public function jobCreateData()
    {
        $selectedCity = $this->getSelectedCity();

        return response()->json([
            'cities' => Cache::rememberForever('cities', fn() => City::all()),
            'categories' => Cache::rememberForever('job-categories', fn() => Categories::forJob()->onlyParent()->get()),
            'work_types' => Cache::rememberForever('work-types', fn() => WorkType::all()),
            'selected_city' => $selectedCity,
            'districts' => $selectedCity?->districts,
            'genders' => Cache::rememberForever('genders', fn() => Gender::all())
        ]);
    }

    /**
     * @param $selectedCity
     * @return mixed
     */
    public function getSelectedCity(): mixed
    {
        if ($position = Location::get()) {
            if (strlen($position->zipCode) == 4) {
                $position->zipCode = "0" . $position->zipCode;
            }
            return City::find((int)substr($position->zipCode, 0, 2));
        }

        return null;
    }
}
