<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|exists:users,email',
        ];
    }

    public function messages()
    {
        return [
            'email' => 'Böyle bir email yok lütfen emailinizi doğru yazınız',
        ];
    }
}
