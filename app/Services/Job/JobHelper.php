<?php

namespace App\Services\Job;

use App\Models\Categories;
use App\Models\City;
use App\Models\Gender;
use App\Models\Package;
use App\Models\WorkType;
use Illuminate\Support\Facades\Cache;

class JobHelper
{
    public function getJobCreateData():array
    {
        $workTypes = Cache::rememberForever('work_types', function () {
            return WorkType::all();
        });

        $categories = Cache::rememberForever('categories', function () {
            return Categories::forJob()->get();
        });

        $genders = Cache::rememberForever('genders', function () {
            return Gender::all();
        });

        $jobPackages = Cache::rememberForever('packages', function () {
            return Package::all();
        });

        $cities = Cache::rememberForever('cities', function () {
            return City::all();
        });

        return [$workTypes, $categories, $genders, $jobPackages, $cities];
    }
}
