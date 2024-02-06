<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $token;
    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    public function build()
    {
        return $this->from('admin@mail.com')
            ->subject('Verifikasi Email')
            ->view('pages.email.verif');
    }
}
