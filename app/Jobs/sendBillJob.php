<?php

namespace App\Jobs;

use App\Mail\sendMailBill;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class sendBillJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $full_name;
    private $bill_detail;
    private $bill_total;
    private $mail_to;
    private $bill_name;

    public function __construct($mail_to, $full_name, $bill_detail,$bill_total,$bill_name)
    {
        $this->full_name    = $full_name;
        $this->mail_to      = $mail_to;

        $this->bill_detail  = $bill_detail;
        $this->bill_total  = $bill_total;
        $this->bill_name  = $bill_name;


    }

    public function handle()
    {
        Mail::to($this->mail_to)->send(new sendMailBill($this->full_name, $this->bill_detail, $this->bill_total,$this->bill_name));
    }
}
