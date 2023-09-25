<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();

        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            ['name' => 'Trương Công Thạch', 'email' => 'admin@admin.com', 'password' => bcrypt('123123'), 'gioi_tinh' => 1, 'is_master' => 1, 'is_block' => 0,'id_quyen' => 0],
            ['name' => 'Mai Thế Việt', 'email' => 'viet@admin.com', 'password' => bcrypt('123123'), 'gioi_tinh' => 1, 'is_master' => 0, 'is_block' => 0,'id_quyen' => 1],
            ['name' => 'Đoàn Văn Lực', 'email' => 'luc@admin.com', 'password' => bcrypt('123123'), 'gioi_tinh' => 1, 'is_master' => 0, 'is_block' => 0,'id_quyen' => 2],
            ['name' => 'Nguyễn Lương Bảo', 'email' => 'bao@admin.com', 'password' => bcrypt('123123'), 'gioi_tinh' => 1, 'is_master' => 0, 'is_block' => 0,'id_quyen' => 3],
           


        ]);
    }
}
