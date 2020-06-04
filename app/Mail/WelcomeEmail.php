<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user_detail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user_detail = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $user_name = $this->user_detail->name ;

        return $this->markdown('emails.welcome', compact('user_name'));
    }
}
