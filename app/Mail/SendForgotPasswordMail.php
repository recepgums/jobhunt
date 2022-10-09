<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $url =route('password-change-token-check', $this->user->token);
        $user = $this->user;

        return $this->subject('İşbull şifre yenileme')
            ->view('email.forgotPassword',compact('url','user'));
    }
}
