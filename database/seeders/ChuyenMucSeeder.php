<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChuyenMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chuyen_mucs')->delete();
        DB::table('chuyen_mucs')->truncate();
        DB::table('chuyen_mucs')->insert([
            ['ten_chuyen_muc'=> 'TẬP LUYỆN THỂ THAO','is_open' => 1],
            // ['ten_chuyen_muc'=> 'Ưu đãi thanh toán','is_open' => 1],
        ]);
    }
}
