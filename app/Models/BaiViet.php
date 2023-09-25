<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;
    protected $table = 'bai_viets';
    protected $fillable = [
        'chuyenmuc_id',
        'tieu_de',
        'noi_dung',
        'admin_id',
        'hinh_anh',
    ];
}
