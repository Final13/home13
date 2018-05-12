<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


/**
 */
class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $birthdayUsers;

    /**
     * Create a new message instance.
     * @param $birthdayUsers
     */
    public function __construct($birthdayUsers)
    {
        $this->birthdayUsers = $birthdayUsers;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.index')->with(['birthdayUsers' => $this->birthdayUsers]);
    }
}
