<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMailBill extends Mailable
{
    use Queueable, SerializesModels;

    public $full_name;
    public $billDetail;
    public $billTotal;
    public $bill_name;
    public function __construct($full_name, $billDetail,$billTotal,$bill_name)
    {
       $this->full_name     =   $full_name;
       $this->billDetail    =   $billDetail;
       $this->billTotal     =   $billTotal;
       $this->bill_name     =   $bill_name;
    }

    public function build()
    {
        return $this->subject('Thông báo đặt hàng thành công')->view('Mail.DonHangCustomer', [
            'full_name'       =>  $this->full_name,
            'billDetail'      =>  $this->billDetail,
            'billTotal'       =>  $this->billTotal,
            'bill_name'       =>  $this->bill_name,
        ]);
    }
}
