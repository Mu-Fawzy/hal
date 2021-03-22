<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $senderName;
    public $senderSubject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($senderName,$senderSubject)
    {
        $this->senderName = $senderName;
        $this->senderSubject = $senderSubject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.format-contactus')
        ->with([
            'senderName' => $this->senderName,
            'subject' => $this->senderSubject,
        ]);
    }
}
