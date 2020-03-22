<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ThreadCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $thread;
    
    public function __construct($thread)
    {
        $this->thread = $thread;
    }

    public function build()
    {
        return $this->markdown('emails.thread.created');
    }
}
