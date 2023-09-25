<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ThanhToanBillMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $info;

    public function __construct($info)
    {
        $this->info = $info;
    }

    public function build()
    {
        return $this->subject('Xác nhận thanh toán tự động thành công')
                    ->view('Mail.Thanh_toan_thanh_cong', [
                        'info'      =>  $this->info,
                    ]);
    }
}
