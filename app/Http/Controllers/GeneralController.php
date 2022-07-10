<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Support\Facades\Cache;

class GeneralController extends Controller
{
    public function getDistrictsByCity(City $city)
    {
        return Cache::rememberForever('city_'.$city->id.'districts',function ()use($city){
            return $city->districts()->select('id','name')->get();
        });
    }
}
