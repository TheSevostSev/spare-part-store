<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BuyReceipt extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $receipt;

    public function __construct(string $name, int $receipt)
    {
        $this->name=$name;
        $this->receipt=$receipt;
    }

    public function build()
    {
        return $this->markdown('emails.buy-product',["data"=>$this->receipt,"product"=>$this->name])
        ->subject("Receipt about ".$this->name );
    }
}
