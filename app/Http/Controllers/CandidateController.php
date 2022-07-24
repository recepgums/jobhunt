<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Categories;
use App\Models\City;
use App\Services\StorageService;

class CandidateController extends Controller
{
    public function profile()
    {
        $data = [
            'cities' => City::select('id','name')->get(),
            'user' => auth()->user(),
            'categories' => Categories::forJob()->select('id','name')->get(),
        ];

        return view('candidates.profile',$data);
    }

    public function profileUpdate(ProfileUpdateRequest $request,StorageService $storageService)
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => string_to_ten_digits_phone_number($request->get('phone')),
        ]);

        if ($request->has('profile_image_file')){
         /*   $file = $storageService->put(StorageService::USER_PHOTO, $request->file('profile_image_file'));

            $user->update([
                'profile_image_url' => $file['path']
            ]);*/
        }

        $candidate = $user->candidate;
        $candidate->update([
            'city_id'=>$request->get('city_id'),
            'is_searchable'=>$request->get('is_searchable'),
            'expected_salary'=>$request->get('expected_salary'),
            'experience_year'=>$request->get('experience_year'),
            'age'=>$request->get('age'),
            'description'=>$request->get('description'),
        ]);

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
