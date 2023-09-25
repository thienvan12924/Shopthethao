<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonNhapKho extends Model
{
    use HasFactory;
    protected $table = 'hoa_don_nhap_khos';

    protected $fillable = [
        'ma_don_hang',
        'tong_tien',
        'tong_san_pham',
        'tinh_trang',
        'ngay_nhap_hang',
        'id_admin',
        'id_nha_cung_cap',
    ];
}
