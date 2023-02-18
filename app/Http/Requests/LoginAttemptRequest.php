<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAttemptRequest extends FormRequest
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
            'phone' => 'required',
            'password' => 'required|min:7',
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Telefon girmek zorunludur',
            'password.required' => 'Şifre girmek zorunludur',
            'password.min' => 'Şifreniz en az 7 hanelidir',
        ];
    }
}
