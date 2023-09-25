<?php

namespace App\Jobs;

use App\Mail\ResetPassCustomer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class sendMailPassJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $hash;
    private $ho_ten;
    private $email;

    public function __construct($hash, $email, $ho_ten)
    {
        $this->ho_ten    = $ho_ten;
        $this->email    = $email;
        $this->hash     = $hash;
    }

    public function handle()
    {
        Mail::to($this->email)->send(new ResetPassCustomer($this->hash, $this->ho_ten));
    }
}
