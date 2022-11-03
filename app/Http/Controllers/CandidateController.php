<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Categories;
use App\Models\CategoryUser;
use App\Models\City;
use App\Models\Job;
use App\Models\User;
use App\Services\StorageService;
use Illuminate\Support\Facades\DB;
use Omgtheking\OmgIyzicoPayment\Models\OmgPayTransactions;

class CandidateController extends Controller
{
    public function profile()
    {
        $data = [
            'cities' => City::select('id', 'name')->get(),
            'user' => auth()->user(),
            'categories' => Categories::forJob()->select('id', 'name')->get(),
            'category' => CategoryUser::with('category')->where('user_id', auth()->user()->id)->get(),
        ];

        return view('candidates.profile', $data);
    }

    public function profileUpdate(ProfileUpdateRequest $request, StorageService $storageService)
    {
        $user = auth()->user();
        $user->update(array_merge($request->validated(), [
            'phone' => string_to_ten_digits_phone_number($request->get('phone')),
        ]));

        $user->categories()->delete();

        if ($request->filled('category_id') && count($request->category_id) > 0){
            foreach ($request->category_id as $category) {
                CategoryUser::create([
                    'category_id' => $category,
                    'user_id' => auth()->id(),
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

        $jobs = Job::orderBy('id','desc')->listable()->where('user_id', auth()->id())->where('status',Job::STATUS['published'])->get();

        $endPubJobs = Job::orderBy('id','desc')->where('user_id', auth()->id())->where('status',Job::STATUS['expired'])->get();

        return view('candidates.shortlist', compact('jobs','endPubJobs'));
    }

    public function active($job)
    {
        Job::findOrFail($job)->update(['status' => Job::STATUS['published']]);

        return redirect()->back()->with(['msg' => 'İlanınız başarıyla aktif edilmiştir']);
    }

    public function passive(Job $job)
    {
        $job->update(['status' => Job::STATUS['expired']]);

        return redirect()->back()->with(['msg' => 'İlanınız başarıyla yayından kaldırılmıştır']);
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->back()->with(['msg' => 'İlanınız başarıyla silindi']);
    }

    public function applied_jobs()
    {
        $appliedJobs = auth()->user()->appliedJobs;

        return view('candidates.applied_jobs', compact('appliedJobs'));
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

    public function payments()
    {
        $payments = OmgPayTransactions::where('user_id',auth()->id())->get();
        $user = auth()->user();

        return view('candidates.payment',['payments' => $payments,'user' => $user]);
    }
}
