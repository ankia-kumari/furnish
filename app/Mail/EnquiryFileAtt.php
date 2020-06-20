<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

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
    public function build(){

        return $this->view('emails.enquiry-file-att')
                    ->attach(public_path('assets/original.pdf'),[
                        'mime' => 'application/pdf'
                    ])
        ->attach('assets/team_list.xlsx');
                    //->attachData($this->data_att,'enquiry_list.csv');
    }
}
