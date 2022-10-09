<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\MailSendRequest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new \App\Mail\SendMail($details));

        return redirect()->back();
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $user = User::where('email',$request->get('email'))->firstOrFail();

        $user->token  = Str::random(30);
        $user->save();

        Mail::to($request->email)->send(new \App\Mail\SendForgotPasswordMail($user));

        return redirect()->back();
    }
}
