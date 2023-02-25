<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'model' => ['required',Rule::in([\App\Models\Job::class, \App\Models\Blog::class])],
            'parent_id' => 'nullable',
            'image' => 'nullable|image',
            'description' => 'nullable',
        ];
    }

}
