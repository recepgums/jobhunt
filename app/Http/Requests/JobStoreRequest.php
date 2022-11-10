<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'sleep_after_at' => 'nullable',
            'work_type_id' => 'required|exists:work_types,id',
            'category_id' => 'nullable|exists:categories,id',
            'city_id' => 'nullable|exists:cities,id',
            'district_id' => 'nullable|exists:districts,id',
            'package_id' => 'nullable|exists:packages,id',
            'gender_id' => 'nullable|exists:genders,id',
            'fee' => 'nullable|numeric',
            'files' => 'nullable|array',
            'files.*' => 'nullable',//todo image and video max file size 10 mb
        ];
    }

    public function messages()
    {
        return [
            'district_id.required' => 'İlçe bilgisi zorunludur',
            'district_id.exists' => 'Böyle bir ilçe bulunmamaktadır',

        ];
    }
}
