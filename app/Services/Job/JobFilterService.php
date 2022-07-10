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

        $this->filterByCityId();
        $this->filterByDistrictId();
        $this->filterByKeyword();

        return $this->jobs;
    }

    private function filterByCityId()
    {
        if ($this->request->get('city_id'))
            $this->jobs = $this->jobs->where('city_id',$this->request->get('city_id'));
    }

    private function filterByDistrictId()
    {
        if ($this->request->get('district_id'))
            $this->jobs = $this->jobs->where('district_id',$this->request->get('district_id'));

    }

    private function filterByKeyword()
    {
        if ($this->request->get('keyword'))
            $this->jobs = $this->jobs->where(function ($query)use ($request){
                $query->whereRaw("UPPER('description') LIKE '%'". $this->request->get('keyword') ."'%'");
                $query->orWhereRaw("UPPER('title') LIKE '%'". $this->request->get('keyword') ."'%'");
            });
    }
}
