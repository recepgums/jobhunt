<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryStoreRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() && auth()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'model' => ['required',Rule::in([\App\Models\Job::class, \App\Models\Blog::class])],
            'parent_id' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Lütfen İsminizi Giriniz',
            'description.required' => 'Açıklama Giriniz',
            'image.image' => 'Resim Yükleyiniz',
        ];
    }
}
