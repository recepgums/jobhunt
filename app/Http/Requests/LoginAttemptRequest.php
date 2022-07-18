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
            'email' => 'required|email',
            'password' => 'required|min:7',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email alanı zorunludur',
            'password.required' => 'Şifre alanı zorunludur',
            'email.email' => 'Geçerli bir email adresi giriniz.',
            'password.min' => 'Şifreniz en az 7 hanelidir',
        ];
    }
}
