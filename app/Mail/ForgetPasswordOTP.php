<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordOTP extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $username;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($otp, $username)
    {
        $this->otp = $otp;
        $this->username = $username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('ZOHO_MAIL_FROM_ADDRESS'))
                    ->subject('Forget Password OTP')
                    ->view('frontend.email_templates.email-otp')
                    ->with([
                        'otp' => $this->otp,
                        'username' => $this->username,
                    ]);
    }
}
