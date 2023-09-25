<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DanhMucSeeder::class);
        $this->call(SanPhamSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(BaiVietSeeder::class);
        $this->call(ChuyenMucSeeder::class);
        $this->call(KhachHangSeed::class);
        $this->call(ActionSeeder::class);
        $this->call(QuyenSeeder::class);

    }
}
