<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KhachHang extends Authenticatable
{
    use HasFactory;
    protected $table = 'khach_hangs';

    protected $fillable = [
        'ho_ten',
        'so_dien_thoai',
        'email',
        'sex',
        'password',
        'is_active',
        'is_block',
        'hash',
        'hash_reset',
        'real_email',
        'dia_chi',
    ];
}
