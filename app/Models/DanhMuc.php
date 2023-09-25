<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danh_mucs';

    protected $fillable = [
        'ma_danh_muc',
        'ten_danh_muc',
        'slug_danh_muc',
        'is_open',
        'id_danh_muc_cha',
        'hinh_anh',
    ];
}
