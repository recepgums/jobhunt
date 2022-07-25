<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'profile_image_file' => 'nullable',
            'name' => 'required',
            'about' => 'nullable',
            'phone' => 'required',
            'email' => 'required|email',
            'city_id' => 'nullable|exists:cities,id',
            'is_searchable' => 'nullable|boolean',
            'experience_year' => 'nullable|numeric|min:0,max:40',
            'expected_salary' => 'nullable|numeric',
            'age' => 'nullable|numeric|max:65',
            "categories" => "nullable|array",
            "categories.*" => "required|exists:categories,id",
        ];
    }

    public function messages()
    {
        return [
            'profile_image_file.image' => 'Profil fotoğrafınız resim dosyası olmalı',
            'phone.required' => 'Telefon numarası girilmek zorundadır',
            'email.email' => 'Geçerli bir email adresi giriniz',
            'email.required' => 'Email adresi girilmek zorundadır',
            'city_id.exists' => 'Geçerli bir şehir seçiniz',
            'is_searchable.boolean' => 'Arama özelliği alanında evet ya da hayır ı seçiniz',
            'experience_year.min' => 'Deneyim yılınız en az 1 yıl olmalı',
            'experience_year.max' => 'Deneyim yılınız en fazla 50 yıl olmalı',
            'expected_salary.numeric' => 'Maaş beklentiniz sayı olmalıdır',
            'age.max' => 'Yaşınız en fazla 65 seçilebilir',
            'categories.*.exists' => 'Geçerli bir iş alanı seçiniz',
        ];
    }
}
