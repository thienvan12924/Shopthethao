<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomerActiveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ho_ten;
    public $link;
    public function __construct($ho_ten, $link)
    {
        $this->ho_ten   = $ho_ten;
        $this->link     = $link;
    }


    public function build()
    {
        return $this->subject('Kích hoạt tài khoản khách hàng')->view('Mail.ActiveCustomer',[
            'link'      => $this->link,
            'ho_ten'    => $this->ho_ten,
        ]);
    }
}
