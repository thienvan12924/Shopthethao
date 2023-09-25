<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucSeeder extends Seeder
{

    public function run()
    {
        DB::table('danh_mucs')->delete();
        DB::table('danh_mucs')->truncate();
        DB::table('danh_mucs')->insert([
            ['ma_danh_muc' => 'G1',
            'ten_danh_muc' => 'Giày',
            'slug_danh_muc' => 'giay',
            'is_open' => 1,
             'id_danh_muc_cha'=> 0,
             'hinh_anh'=>'https://www.sport9.vn/images/uploaded/tin-tuc-mizuno/nhan%20biet%20giay%20bong%20da%20mizuno%20chinh%20hang.jpg',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),],

            ['ma_danh_muc' => 'QA',
            'ten_danh_muc' => 'Quần Áo',
            'is_open' => 1,
            'slug_danh_muc' => 'quan-ao',
             'id_danh_muc_cha'=> 0,
             'hinh_anh'=>'https://theme.hstatic.net/200000247969/1000814323/14/collection_banner.jpg?v=73',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),],
            ['ma_danh_muc' => 'V1',
            'ten_danh_muc' => 'Vợt',
            'is_open' => 1,
            'slug_danh_muc' => 'vot',
             'id_danh_muc_cha'=> 0,
             'hinh_anh'=>'https://thuvienmuasam.com/uploads/default/original/2X/6/6e2f92a6f3dc54201841b788214005b25b825e0e.jpeg',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),],

            ['ma_danh_muc' => 'B1',
            'ten_danh_muc' => 'Phụ Kiện Bóng Đá',
            'is_open' => 1,
            'slug_danh_muc' => 'phu-kien-bong-da',
             'id_danh_muc_cha'=> 0,
             'hinh_anh'=>'https://file.hstatic.net/1000061481/file/phu-kien-bong-da-neymarsport__14__10397bcd0c6b4f4f8aa7703aa775e6a1.jpg',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),],

            ['ma_danh_muc' => 'G2',
            'ten_danh_muc' => 'Giày Đá Bóng',
            'slug_danh_muc' => 'giay-da-bong',
            'is_open' => 1,
            'id_danh_muc_cha'=> 1,
            'hinh_anh' => 'http://file.hstatic.net/200000022804/collection/banner_giay_95daabef9ff24a9fa8b83c3879d5a366.jpg',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ],

            ['ma_danh_muc' => 'G3',
            'ten_danh_muc' => 'Giày Cầu Lông',
            'slug_danh_muc' => 'giay-cau-long',
            'is_open' => 1,
             'id_danh_muc_cha'=> 1,
             'hinh_anh' => 'https://luongsport.com/wp-content/uploads/2020/09/Untitled-1PP.jpg',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),],

            ['ma_danh_muc' => 'QA1',
            'ten_danh_muc' => 'Áo Bóng Đá Không Logo',
            'slug_danh_muc' => 'ao-bong-da-khong-logo',
            'is_open' => 1,
             'id_danh_muc_cha'=> 2,
             'hinh_anh'=> 'https://kiwisport.vn/wp-content/uploads/2021/08/ao-bong-da-gem-2021-768x461.jpg',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),],

            ['ma_danh_muc' => 'QA2',
            'ten_danh_muc' => 'Quần Lửng',
            'slug_danh_muc' => 'quan-lung',
            'is_open' => 1,
            'id_danh_muc_cha'=> 2,
            'hinh_anh' => '',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),],

            ['ma_danh_muc' => 'QA3',
            'ten_danh_muc' => 'Quần short thể thao',
            'slug_danh_muc' => 'quan-short-the-thao',
            'is_open' => 0,
             'id_danh_muc_cha'=> 2,
             'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNDl87dr6RlTrAqJiMb6NgduNxxFr3uyaZej4E99qEcvdfSxO8t-eYEvga7WVL9I3LEoo&usqp=CAU',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),],

            ['ma_danh_muc' => 'QA4',
            'ten_danh_muc' => 'Quần dài thể thao',
            'slug_danh_muc' => 'quan-dai-the-thao',
            'is_open' => 0,
             'id_danh_muc_cha'=> 2,
             'hinh_anh' => 'https://bizweb.dktcdn.net/100/176/815/products/82238188-2682187275199039-7039887414633955328-n.jpg?v=1589955082753',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),],
            ['ma_danh_muc' => 'B2',
            'ten_danh_muc' => 'Quả Bóng Đá',
            'is_open' => 1,
            'slug_danh_muc' => 'qua-bong-da',
             'id_danh_muc_cha'=> 4,
             'hinh_anh'=>'https://i1-vnexpress.vnecdn.net/2022/11/28/VNE-Cup-8664-1669628729.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=BILr9TR6LhNHI7PfWB-OEg',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),],
            ['ma_danh_muc' => 'B3',
            'ten_danh_muc' => 'Túi Đựng Giày',
            'is_open' => 1,
            'slug_danh_muc' => 'tui-dung-giay',
             'id_danh_muc_cha'=> 4,
             'hinh_anh'=>'https://bulbal.vn/wp-content/uploads/2022/05/TUI-DUNG-GIAY-BONG-DA-BULBAL-COLLECTOR-2-DEN-3-scaled.jpg',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),],
            ['ma_danh_muc' => 'B4',
            'ten_danh_muc' => 'Găng Tay Thủ Môn',
            'is_open' => 1,
            'slug_danh_muc' => 'gang-tay-thu-mon',
             'id_danh_muc_cha'=> 4,
             'hinh_anh'=>'http://aobongda123.com/pic/Product/Untitled-_636871244247636047_HasThumb.png',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),],
            ['ma_danh_muc' => 'V2',
            'ten_danh_muc' => 'Vợt cầu lông đan sẵn ',
            'is_open' => 1,
            'slug_danh_muc' => 'vot-cau-long-dan-san',
             'id_danh_muc_cha'=> 3,
             'hinh_anh'=>'https://thuvienmuasam.com/uploads/default/original/2X/6/6e2f92a6f3dc54201841b788214005b25b825e0e.jpeg',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),],
        ]);
    }
}
