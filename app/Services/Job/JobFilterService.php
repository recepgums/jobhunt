<?php

namespace App\Services\Job;

use App\Models\Job;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

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
        $this->filterByWorkType();
        $this->filterByOrderBy();

        return $this->jobs;
    }

    private function filterByCityId()
    {
        if ($this->request->get('city_id')){
            if (is_array($this->request->get('city_id'))){
                $this->jobs = $this->jobs->whereIn('city_id', $this->request->get('city_id'));
            }else{
                $this->jobs = $this->jobs->where('city_id', $this->request->get('city_id'));
            }
        }
    }

    private function filterByDistrictId()
    {
        if ($this->request->get('district_id') ) {
            if (is_array($this->request->get('district_id')) && count(array_filter($this->request->get('district_id'))) > 0){
                $this->jobs = $this->jobs->whereIn('district_id', $this->request->get('district_id'));
            }else{
                if (ctype_digit($this->request->get('district_id'))){
                    $this->jobs = $this->jobs->where('district_id', $this->request->get('district_id'));
                }
            }
        }
    }

    private function filterByKeyword()
    {
        if ($this->request->get('keyword')) {
            $this->jobs = $this->jobs->where(function ($query) {
                $query->whereRaw('LOWER(`title`) LIKE ? ',[trim(strtolower($this->request->get('keyword'))).'%']);
                $query->orWhereRaw('LOWER(`description`) LIKE ? ',[trim(strtolower($this->request->get('keyword'))).'%']);
            });
        }
    }

    private function filterByCreatedTime()
    {
        if ($this->request->get('created_at') && (int)$this->request->get('created_at')*1 > 1 ) {
            $from = now()->subHours((int)$this->request->get('created_at'))->toDateTimeString();
            $to = now()->toDateTimeString();
            $this->jobs = $this->jobs->whereBetween('created_at', [$from, $to]);
        }
    }

    private function filterByCategoryId()
    {
        if ($this->request->get('category_id')) {
            if (is_array($this->request->get('category_id'))){
                $this->jobs = $this->jobs->whereIn('category_id', $this->request->get('category_id'));
            }else{
                $this->jobs = $this->jobs->where('category_id', $this->request->get('category_id'));
            }
        }
    }

    private function filterByWorkType()
    {
        if ($this->request->get('work_type_id')) {
            if (is_array($this->request->get('work_type_id'))) {
                $this->jobs = $this->jobs->whereIn('work_type_id', $this->request->get('work_type_id'));
            } else {
                $this->jobs = $this->jobs->where('work_type_id', $this->request->get('work_type_id'));
            }
        }
    }

    private function filterBySallary()
    {
        if ($this->request->get('sallary')) {
            [$min,$max] = sallary_to_min_max_sallary($this->request->get('sallary'));
            $this->jobs = $this->jobs->whereBetween('fee',[$min, $max]);
        }
    }

    private function filterByOrderBy()
    {
        if ($this->request->get('order_by')) {
            $this->jobs = $this->jobs->orderBy($this->request->get('order_by'),'desc');
        }
    }
}
