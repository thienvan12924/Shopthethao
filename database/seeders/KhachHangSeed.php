<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhachHangSeed extends Seeder
{

    public function run()
    {
        DB::table('khach_hangs')->delete();

        DB::table('khach_hangs')->truncate();
        DB::table('khach_hangs')->insert([
            [
                'ho_ten' => 'Trương Công Thạch',
                'email' => 'thachtruongcong93@gmail.com',
                'so_dien_thoai' => '0936734440',
                'password' => bcrypt('123123Ac'),
                'sex' => 1, 'is_active' => 1,
                'is_block' => 0,
                'dia_chi' => 'Quảng Nam'
            ],
            [
                'ho_ten' => 'Mai Thế Việt',
                'email' => 'maitheviet14@gmail.com',
                'so_dien_thoai' => '0905747059',
                'password' => bcrypt('123123Ac'),
                'sex' => 1, 'is_active' => 1,
                'is_block' => 0,
                'dia_chi' => 'Đại Lộc'
            ],
        ]);
    }
}
