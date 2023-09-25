<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPassCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $hash;
    public $ho_ten;

    public function __construct($hash, $ho_ten)
    {
        $this->hash     = $hash;
        $this->ho_ten   = $ho_ten;
    }

    public function build()
    {
        return $this->subject('Khôi phục tài khoản')->view('Mail.ResetPassCustomer', [
            'hash'      =>  $this->hash,
            'ho_ten'    =>  $this->ho_ten,
        ]);
    }
}
