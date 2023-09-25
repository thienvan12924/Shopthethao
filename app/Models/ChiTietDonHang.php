<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_don_hangs';

    protected $fillable = [
        'id_san_pham',
        'ten_san_pham',
        'hinh_anh',
        'so_luong_mua',
        'don_gia_mua',
        'id_don_hang',
        'id_khach_hang',
    ];
}
