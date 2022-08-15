<?php

namespace App\Http\Controllers;

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
}
