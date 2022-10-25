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

    public function active($job)
    {
        Job::findOrFail($job)->update(['status' => Job::STATUS['published']]);

        return redirect('/firinci/admin/jobs');
    }

    public function passive($job)
    {
        Job::findOrFail($job)->update(['status' => Job::STATUS['expired']]);

        return redirect('/firinci/admin/jobs');
    }

}
