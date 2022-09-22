<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSend extends Controller
{
    public function mailSend(Request $request)
    {
        $details = [
            'text' => $request->text,
            'fullName' => $request->fullName,
            'surname' => $request->surname,
            'message' => $request->message,
        ];

        Mail::to('arslanmuhammet100@gmail.com')->send(new \App\Mail\SendMail($details));

        dd("Email gönderildi!");
    }
}
