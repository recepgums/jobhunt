<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {

        $jobs = Job::get();

        return view('admin.jobs.index', compact('jobs'));

    }

    public function update(Job $job)
    {
        dd('update');
        $job->update(['status' => Job::STATUS['published']]);

        return redirect('/firinci/admin/jobs');
    }

    public function jobsPassive($job)
    {
        $job->update(['status' => Job::STATUS['expired']]);

        return redirect()->back();
    }

}
