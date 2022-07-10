<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Services\Job\JobFilterService;
use App\Services\Job\JobHelper;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request, JobFilterService $jobFilterService)
    {
        $jobs = $jobFilterService->filter($request);

        $jobs = $jobs->orderByDesc('created_at')->paginate(12);

        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create(JobHelper $jobHelper)
    {
        [$workTypes, $categories, $genders, $jobPackages, $cities] = $jobHelper->getJobCreateData();

        return view('jobs.create',
            compact('workTypes','categories','genders','jobPackages','cities'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        //
    }

    public function update(Request $request, Job $job)
    {
        //
    }

    public function destroy(Job $job)
    {
        //
    }
}
