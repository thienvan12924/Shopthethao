<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaiVietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bai_viets')->delete();
        DB::table('bai_viets')->truncate();
        DB::table('bai_viets')->insert([
            ['tieu_de'=> 'Những mẹo giúp bạn thoải mái hơn với đôi giày đá bóng mới',
            'chuyenmuc_id'=>1,
            'noi_dung' => ' mới luôn đem lại cảm giác hơi cứng và không được thoải mái. Đôi khi sự không thoải mái đó khiến nó ảnh hưởng đến chất lượng thi đấu của bạn.Vậy có cách nào giúp chúng ta thích nghi nhanh nhất đối với đôi giày đá bóng mới mua không? Hãy theo dõi tiếp bài viết này để có thể biết thêm vài mẹo giúp bạn thoải mái hơn với một đôi giày đá bóng mới.Nếu như mới mua một đôi giày đá bóng mới và cảm thấy hơi cứng và không được thoải mái mấy thì việc mang giày có thể giúp bạn thích nghi với nó. Hãy mang giày vào và đi xung quanh khi ở nhà để phần upper có thể giảm đi độ cứng giúp bạn thoải mái hơn trước khi mang nó ra sân thi đấu.',
            'hinh_anh' => 'https://cdn.yousport.vn/Media/Blog/Nh%E1%BB%AFng%20m%E1%BA%B9o%20gi%C3%BAp%20cho%20b%E1%BA%A1n%20tho%E1%BA%A3i%20m%C3%A1i%20h%C6%A1n%20v%E1%BB%9Bi%20%C4%91%C3%B4i%20gi%C3%A0y%20%C4%91%C3%A1%20b%C3%B3ng%20m%E1%BB%9Bi/nhung-meo-giup-ban-thoai-mai-hon-voi-doi-giay-da-bong-moi-o-nha.jpg',
            'admin_id' => 1,
            ],
            ['tieu_de'=> 'Những mặt sân bóng đá phổ biến nhất hiện nay',
            'chuyenmuc_id'=>1,
            'noi_dung' => 'Bóng đá sân 11 và sân 7 người sẽ có điều luật cũng như lối chơi tương tự nhau chỉ khác một chút ở kích thước sân và cầu môn. Futsal và bóng đá sân 5 người sẽ là hai môn với điều luật và kích thước sân tương đương. Khác biệt nhiều nhất có lẽ là bóng đá bãi biển vì lối chơi, điều luật và mặt sân thi đấu khá đặc biệt. Đối với bóng đá đường phố thì sẽ không có luật lệ bạn có thể thoải mái chơi ở bất kì đâu. Cũng không có điều lệ tương tự như bóng đá đường phố đó là bóng đá nghẹ thuật (hay còn gọi là Freestyle Football), bộ môn này đòi hỏi bạn phải có đôi chân khéo léo và óc sáng tạo để tạo ra những động tác nghệ thuật đẹp mắt.',
            'hinh_anh' => 'https://cdn.yousport.vn/Media/Blog/Nh%E1%BB%AFng%20m%E1%BA%B7t%20s%C3%A2n%20b%C3%B3ng%20%C4%91%C3%A1%20ph%E1%BB%95%20bi%E1%BA%BFn%20hi%E1%BB%87n%20nay/nhung-mat-san-bong-da-pho-bien-nhat-hien-nay-san-11.jpg',
            'admin_id' => 2,
            ],
            ['tieu_de'=> '5 lỗi thường gặp của người mới khi thực hiện kỹ thuật sút bóng',
            'chuyenmuc_id'=>1,
            'noi_dung' => 'Nhiều bạn mới tập chơi đá bóng thường được nghe nói rằng “muốn sút mạnh thì bước chạy đà phải dài và nhanh”. Điều này cũng đã được kiểm chứng qua các trận đấu những cầu thủ chuyên nghiệp thường lấy đà rất xa và tung ra một cú sút cực mạnh, đặc biệt là trong bộ môn Futsal.Chạy đà xa và nhanh giúp lực của những cú sút mạnh hơn là điều chính xác. Tuy nhiên đó là khi bạn đã kiểm soát được đôi chân và thuần thục kỹ thuật sút bóng. Đối với những bạn mới thì khi chạy đà xa và nhanh sẽ rất khó để có thể kiểm soát được điểm tiếp xúc bóng và đặt đúng chân trụ. Và điều đó sẽ gây ra là những cú sút của các bạn sẽ không đi chính xác và lực cũng không được như mong muốn..',
            'hinh_anh' => 'https://cdn.yousport.vn/Media/Blog/Nh%E1%BB%AFng%20l%E1%BB%97i%20th%C6%B0%E1%BB%9Dng%20g%E1%BA%B7p%20c%E1%BB%A7a%20ng%C6%B0%E1%BB%9Di%20m%E1%BB%9Bi%20khi%20th%E1%BB%B1c%20hi%E1%BB%87n%20k%E1%BB%B9%20thu%E1%BA%ADt%20s%C3%BAt%20b%C3%B3ng/nhung-loi-thuong-gap-cua-nguoi-moi-khi-thuc-hien-ky-thuat-sut-bong-chay-da.jpg',
            'admin_id' => 2,
            ],
        ]);
    }
}
