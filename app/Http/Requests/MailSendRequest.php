<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailSendRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fullName' => 'required',
            'surname' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'fullName' => 'Lütfen İsminizi Giriniz',
            'surname' => 'Lütfen Soyisminizi Giriniz',
            'subject' => 'Konunuzu giriniz',
            'message' => 'Mesajınızı Giriniz',
        ];
    }
}
