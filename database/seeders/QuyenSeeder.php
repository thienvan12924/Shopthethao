<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class QuyenSeeder extends Seeder
{
    public function run()
    {
        DB::table('quyens')->delete();
        DB::table('quyens')->truncate();
        DB::table('quyens')->insert([
            [
                'ten_quyen' => "Quản lý sản phẩm",
                'slug'      => Str::slug("Quản lý sản phẩm"),
                'list_rule' =>  "1,2,3,4,11,10,9,7,5,8,6,17,18,19,20,21",
                'is_open'   => 1,
            ],
            [
                'ten_quyen' => "Quản lý đơn hàng",
                'slug'      => Str::slug("Quản lý đơn hàng"),
                'list_rule' =>  "22,23,25,24,26,17,18,19,20,21",
                'is_open'   => 1,
            ],
            [
                'ten_quyen' => "Quản lý nhập kho",
                'slug'      => Str::slug("Quản lý nhập kho"),
                'list_rule' =>  "35,36,38,37,39,40,41,42,43,17,18,19,20,21",
                'is_open'   => 1,
            ],
            [
                'ten_quyen' => "Quản lý thống kê",
                'slug'      => Str::slug("Quản lý thống kê"),
                'list_rule' =>  "33,31,29,27,28,30,32,34,17,18,19,20,21",
                'is_open'   => 1,
            ],
        ]);
    }
}
