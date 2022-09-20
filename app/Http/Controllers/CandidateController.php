<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Categories;
use App\Models\CategoryUser;
use App\Models\City;
use App\Models\Job;
use App\Models\User;
use App\Services\StorageService;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class CandidateController extends Controller
{
    public function profile()
    {
        $data = [
            'cities' => City::select('id', 'name')->get(),
            'user' => auth()->user(),
            'categories' => Categories::forJob()->select('id', 'name')->get(),
        ];

        return view('candidates.profile', $data);
    }

    public function profileUpdate(ProfileUpdateRequest $request, StorageService $storageService)
    {
        $user = auth()->user();
        $user->update(array_merge($request->validated(), [
            'phone' => string_to_ten_digits_phone_number($request->get('phone')),
        ]));
        $user->is_searchable_for_job = $request->is_searchable;
        $user->update();

        if ($request->category_id != "") {
            foreach ($request->category_id as $category) {
                CategoryUser::create([
                    'category_id' => $category,
                    'user_id' => auth()->user()->id,
                ]);
            }
        }
        
        if ($request->hasFile('profile_image_file')) {
            $user->clearMediaCollection('images');
            $user->addMedia($request->file('profile_image_file'))->toMediaCollection('images');
        }

        return redirect()->back()->with('message', 'Bilgileriniz güncellenmiştir');
    }

    public function my_resume()
    {
        return view('candidates.my_resume');
    }

    public function shortlist()
    {
        return view('candidates.shortlist');
    }

    public function myJobs()
    {
        $jobs = Job::where('user_id', auth()->id())->paginate(10);

        return view('candidates.shortlist', compact('jobs'));
    }

    public function applied_jobs()
    {
        $user = auth()->user();
        $jobs = $user->jobs->load('job');
        return view('candidates.applied_jobs', compact('jobs'));
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
