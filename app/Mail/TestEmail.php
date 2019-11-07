<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_name)
    {
      $this->user_name = $user_name;  
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->user_name;
        return $this->view('test_email', compact('name'));
    }
}
