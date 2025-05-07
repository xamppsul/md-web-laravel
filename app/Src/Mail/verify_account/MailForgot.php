<?php

namespace App\Src\Mail\verify_account;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailForgot extends Mailable
{
    use Queueable, SerializesModels;

    /**

     * Create a new message instance.

     *

     * @return void

     */
    protected $email,
        $url;
    public function __construct(
        string $email,
        string $url
    ) {
        $this->email = $email;
        $this->url = $url;
    }

    /**

     * Build the message.

     *

     * @return $this

     */

    public function build()
    {
        return $this->view('mail.forgot_password.index', [
            'email' => $this->email,
            'url' => $this->url,
        ])->subject('Forgot Password Your Account');
    }
}
