<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'password',
        'email',
        'so_dien_thoai',
        'gioi_tinh',
        'is_master',
        'id_quyen',
        'is_block',
    ];
}
