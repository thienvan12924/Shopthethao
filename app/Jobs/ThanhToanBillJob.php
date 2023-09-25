<?php

namespace App\Jobs;

use App\Mail\ThanhToanBillMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ThanhToanBillJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $info;

    public function __construct($info)
    {
        $this->info = $info;
    }

    public function handle()
    {
        Mail::to($this->info['email'])->send(new ThanhToanBillMail($this->info));
    }
}
