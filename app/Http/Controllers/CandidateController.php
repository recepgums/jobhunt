<?php

namespace App\Http\Controllers;


class CandidateController extends Controller
{
    public function profile()
    {
        return view('candidates.profile');
    }

    public function my_resume()
    {
        return view('candidates.my_resume');
    }

    public function shortlist()
    {
        return view('candidates.shortlist');
    }

    public function applied_jobs()
    {
        return view('candidates.applied_jobs');
    }

    public function job_alert()
    {
        return view('candidates.job_alert');
    }

    public function cv_cover_letter()
    {
        return view('candidates.cv_cover_letter');
    }

    public function change_password()
    {
        return view('candidates.change_password');
    }
}
