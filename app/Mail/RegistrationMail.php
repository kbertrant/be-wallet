<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var  User */
    protected $user;

    /** @var  string */
    protected $rawPassword;

    /**
     * Create a new message instance.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = env('MAIL_FROM_ADDRESS');
        $name = env('MAIL_FROM_NAME');

        $appUrl = env('APP_URL').env('CONFIRM_ACCOUNT_PATH');
        $url = $appUrl.'?email='.$this->user->email.'&confirmationtoken='.$this->user->email_token;

        return $this->view('emails.confirm')
            ->from($address, $name)
            ->subject('Confirmation du compte')
            ->with("url", $url)
            ->with("name", $this->user->name);
    }
}
