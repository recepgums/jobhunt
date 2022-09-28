<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\MailSendRequest;
use Illuminate\Support\Facades\Mail;

class MailSend extends Controller
{
    public function mailSend(MailSendRequest $request)
    {
        $details = [
            'subject' => $request->subject,
            'fullName' => $request->fullName,
            'surname' => $request->surname,
            'message' => $request->message,
        ];

        Mail::to('arslanmuhammet100@gmail.com')->send(new \App\Mail\SendMail($details));

        return redirect()->back();
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $details = [
            'email' => $request->email,
        ];

        Mail::to($request->email)->send(new \App\Mail\SendForgotPasswordMail($details));

        return redirect()->back();
    }
}
