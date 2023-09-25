<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_phams';

    protected $fillable = [
        'ma_san_pham',
        'ten_san_pham',
        'slug_san_pham',
        'ma_danh_muc_id',
        'gia',
        'gia_khuyen_mai',
        'hinh_anh',
        'so_luong',
        'chi_tiet',
        'is_open',

    ];
}
