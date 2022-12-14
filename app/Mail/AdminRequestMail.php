<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
     public $adminData;
    public function __construct($adminData)
    {
        $this->adminData = $adminData;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
   
     public function build()
    {
        return $this->from($this->adminData['email'])->view('mail.admin_request_mail');
    }

}
