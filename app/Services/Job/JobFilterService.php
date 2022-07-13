<?php

namespace App\Services\Job;

use App\Models\Job;
use Illuminate\Http\Request;

class JobFilterService
{
    private Request $request;
    private $jobs;

    public function __construct()
    {
        $this->jobs = Job::listable();
    }

    public function filter(Request $request)
    {
        $this->request = $request;

        $this->filterByKeyword();
        $this->filterByCityId();
        $this->filterByDistrictId();
        $this->filterByCreatedTime();
        $this->filterByCategoryId();
        $this->filterBySallary();

        return $this->jobs;
    }

    private function filterByCityId()
    {
        if ($this->request->get('city_id')){
            $this->jobs = $this->jobs->where('city_id', $this->request->get('city_id'));
        }
    }

    private function filterByDistrictId()
    {
        if ($this->request->get('district_id')) {
            $this->jobs = $this->jobs->where('district_id', $this->request->get('district_id'));
        }
    }

    private function filterByKeyword()
    {
        if ($this->request->get('keyword')) {
            $this->jobs = $this->jobs->where(function ($query) {
                $query->whereRaw("UPPER('description') LIKE '%'" . $this->request->get('keyword') . "'%'");
                $query->orWhereRaw("UPPER('title') LIKE '%'" . $this->request->get('keyword') . "'%'");
            });
        }
    }

    private function filterByCreatedTime()
    {
        if ($this->request->get('created_at') && is_int((int)$this->request->get('created_at'))) {
            $from = now()->subHours((int)$this->request->get('created_at'))->toDateTimeString();
            $to = now()->toDateTimeString();
            $this->jobs = $this->jobs->whereBetween('created_at', [$from, $to]);
        }
    }

    private function filterByCategoryId()
    {
        if ($this->request->get('category_id')) {
            $this->jobs = $this->jobs->where('category_id', $this->request->get('category_id'));
        }
    }

    private function filterBySallary()
    {
        if ($this->request->get('sallary')) {
            sallary_to_min_max_sallary($this->request->get('sallary'));
            $this->jobs = $this->jobs->where('category_id', $this->request->get('category_id'));
        }
    }
}
