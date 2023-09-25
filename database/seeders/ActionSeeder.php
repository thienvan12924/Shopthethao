<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionSeeder extends Seeder
{
    public function run()
    {
        DB::table('actions')->delete();

        DB::table('actions')->truncate();

        DB::table('actions')->insert([
            ['id' => 1, 'ten_action' => 'Xem danh mục'],
            ['id' => 2, 'ten_action' => 'Thêm mới danh mục'],
            ['id' => 3, 'ten_action' => 'Đổi trạng thái danh mục'],
            ['id' => 4, 'ten_action' => 'Xóa danh mục'],
            ['id' => 5, 'ten_action' => 'Cập nhật danh mục'],

            ['id' => 6, 'ten_action' => 'Xem sản phẩm'],
            ['id' => 7, 'ten_action' => 'Thêm mới sản phẩm'],
            ['id' => 8, 'ten_action' => 'Đổi trạng thái sản phẩm'],
            ['id' => 9, 'ten_action' => 'Xóa sản phẩm'],
            ['id' => 10, 'ten_action' => 'Cập nhật sản phẩm'],
            ['id' => 11, 'ten_action' => 'Tìm kiếm sản phẩm'],

            ['id' => 12, 'ten_action' => 'Xem tài khoản'],
            ['id' => 13, 'ten_action' => 'Thêm mới tài khoản'],
            ['id' => 14, 'ten_action' => 'Xóa tài khoản'],
            ['id' => 15, 'ten_action' => 'Cập nhật tài khoản'],
            ['id' => 16, 'ten_action' => 'Cập nhật mật khẩu'],

            ['id' => 17, 'ten_action' => 'Xem bài viết'],
            ['id' => 18, 'ten_action' => 'Thêm mới bài viết'],
            ['id' => 19, 'ten_action' => 'Tìm kiếm bài viết'],
            ['id' => 20, 'ten_action' => 'Xóa bài viết'],
            ['id' => 21, 'ten_action' => 'Cập nhật bài viết'],

            ['id' => 22, 'ten_action' => 'Xem quản lý đơn hàng'],
            ['id' => 23, 'ten_action' => 'Đổi trạng thái thanh toán'],
            ['id' => 24, 'ten_action' => 'Đổi trạng thái tình trạng'],
            ['id' => 25, 'ten_action' => 'Xem chi tiết đơn hàng'],
            ['id' => 26, 'ten_action' => 'Tìm đơn hàng'],

            ['id' => 27, 'ten_action' => 'Xem thống kê tổng tiền đơn hàng'],
            ['id' => 28, 'ten_action' => 'Thống kê tổng tiền đơn hàng'],

            ['id' => 29, 'ten_action' => 'Xem thống kê sản phẩm đơn hàng'],
            ['id' => 30, 'ten_action' => 'Thống kê tổng tiền đơn hàng'],

            ['id' => 31, 'ten_action' => 'Xem thống kê tổng tiền nhập kho'],
            ['id' => 32, 'ten_action' => 'Thống kê tổng tiền đơn hàng'],

            ['id' => 33, 'ten_action' => 'Xem thống kê sản phẩm nhập kho'],
            ['id' => 34, 'ten_action' => 'Thống kê tổng tiền đơn hàng'],

            ['id' => 35, 'ten_action' => 'Xem nhập kho'],
            ['id' => 36, 'ten_action' => 'Nhập kho sản phẩm'],
            ['id' => 37, 'ten_action' => 'Cập nhật nhập kho'],
            ['id' => 38, 'ten_action' => 'Xóa nhập kho'],
            ['id' => 39, 'ten_action' => 'Nhập hàng vào kho'],

            ['id' => 40, 'ten_action' => 'Xem lịch sử nhập kho'],
            ['id' => 41, 'ten_action' => 'Đổi trạng thái lịch sử nhập kho'],
            ['id' => 42, 'ten_action' => 'Xem chi tiết lịch sử nhập kho'],
            ['id' => 43, 'ten_action' => 'Tìm kiếm lịch sử nhập kho'],

            ['id' => 100, 'ten_action' => 'Xem phân quyền'],
            ['id' => 101, 'ten_action' => 'Thêm mới phân quyền'],
            ['id' => 102, 'ten_action' => 'Đổi trạng thái phân quyền'],
            // ['id' => 103, 'ten_action' => 'Cấp phân quyền'],
            ['id' => 104, 'ten_action' => 'Chỉnh sửa phân quyền'],
            ['id' => 105, 'ten_action' => 'Xóa phân quyền'],
            ['id' => 106, 'ten_action' => 'Cập nhật phân quyền'],
        ]);
    }
}
