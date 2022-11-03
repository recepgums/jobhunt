<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class JobUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Log::info(print_r($this->job,true));
        return auth()->check() && $this->job->user_id === auth()->id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'nullable',
            'description' => 'nullable',
            'phone' => 'nullable',
            'sleep_after_at' => 'nullable',
            'work_type_id' => 'nullable|exists:work_types,id',
            'category_id' => 'nullable|exists:categories,id',
            'city_id' => 'nullable|exists:cities,id',
            'district_id' => 'nullable|exists:districts,id',
            'gender_id' => 'nullable|exists:genders,id',
            'fee' => 'nullable|numeric',
            'files' => 'nullable|array',
            'files.*' => 'nullable',//todo image and video max file size 10 mb
            'theme' => 'nullable'
        ];
    }
}
