<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordChange extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public function __construct()
    {
        //
    }

    public function build()
    {
        return $this->from('admin@mail.com')
            ->subject('Reset Password')
            ->view('pages.email.password_change');
    }
}
