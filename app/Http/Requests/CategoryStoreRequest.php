<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'parent_id' => 'nullable',
            'description' => 'required',
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
