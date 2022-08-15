<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\City;

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
}
