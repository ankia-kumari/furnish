<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryFileAtt extends Mailable
{
    use Queueable, SerializesModels;

    private $data_att;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($file_att)
    {
        $this->data_att = $file_att;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.enquiry-file-att')
                    ->attach(public_path('assets/img/avatars/avatar1.jpg'));
    }
}
