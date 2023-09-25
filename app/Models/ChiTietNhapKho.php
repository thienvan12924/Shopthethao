<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietNhapKho extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_nhap_khos';

    protected $fillable = [
        'id_san_pham',
        'ten_san_pham',
        'so_luong_nhap',
        'don_gia_nhap',
        'id_hoa_don_nhap_kho',
        'trang_thai',
        'thanh_tien',
    ];
}
