<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Revocation extends Mailable
{
    use Queueable, SerializesModels;

    public $text;
    public $subject;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $subject,string $text,string $user)
    {
        $this->subject=$subject;
        $this->text=$text;
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users-revocation',["text"=>$this->text,"user"=>$this->user,"subject"=>$this->subject])
        ->subject("Revocation about ".$this->subject );
    }
}
