<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VnPay extends Model
{
    use HasFactory;
    protected $table = 'vn_pays';
    protected $fillable = [
        'vnp_Amount',
        'vnp_BankCode',
        'vnp_BankTranNo',
        'vnp_OrderInfo',
        'vnp_ResponseCode',
        'vnp_TransactionStatus',
        'vnp_TxnRef',
    ];
}
