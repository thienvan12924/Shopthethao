<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamSeeder extends Seeder
{

    public function run()
    {
        DB::table('san_phams')->delete();
        DB::table('san_phams')->truncate();
        DB::table('san_phams')->insert([

            [
                'ma_san_pham'  => 'GBD1',
                'ten_san_pham' => 'Giày Mira Galaxy S2' ,
                'slug_san_pham' => 'giay-mira-galaxy-s2' ,
                'so_luong' => 100,
                'gia' => 449000,
                'gia_khuyen_mai' => 439000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/230522120021029/mira-galaxy-s1-vang-1b.jpg,https://cdn.yousport.vn/Media/Products/230522120021029/mira-galaxy-s1-vang-2.jpg,https://cdn.yousport.vn/Media/Products/230522120021029/mira-galaxy-s1-vang-3.jpg,https://cdn.yousport.vn/Media/Products/230522120021029/mira-galaxy-s1-vang-4.jpg',
                'chi_tiet' => 'Giày bóng đá Mira Galaxy S2 là sự cải tiến về mẫu mã, chất lượng so với thế hệ đầu tiên với sự thành công của mẫu giày cổ cao, chân bè - một đôi giày vừa có kiểu dáng phù hợp với tất cả form chân vừa được cấu tạo từ những chất liệu siêu tốt đến từ thương hiệu giày MIRA

                Upper: Làm từ chất liệu da TPU phủ bóng cho khả năng chống thấm tốt, dễ vệ sinh.
                Lớp da tương đối mỏng, được dập vân nổi hình lục giác cho khả năng tiếp xúc bóng tốt
                Mũi giày: Được khâu chắc chắn, mũi tương đối dẹt cho khả năng chích bóng uy lực.
                Cổ giày: Làm từ thun co giãn, ôm chân chắc chắn, hạn chế hạt cao su và sỏi nhỏ lọt vào trong giày
                Đế giày: Làm từ cao su tổng hợp với độ bền cao
                Đinh giăm TF dạng hình thoi cho độ thăng bằng tốt, bám sân và hỗ trợ bứt tốc hiệu quả',
                'ma_danh_muc_id' => 5,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GBD2',
                'ten_san_pham' => 'Giày Mira Galaxy S1' ,
                'slug_san_pham' => 'giay-mira-galaxy-s1' ,
                'so_luong' => 100,
                'gia' => 449000,
                'gia_khuyen_mai' => 439000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/230522120021029/mira-galaxy-s1-den-xanh-1b.jpg,https://cdn.yousport.vn/Media/Products/230522120021029/mira-galaxy-s1-den-cam-2.jpg,https://cdn.yousport.vn/Media/Products/230522120021029/mira-galaxy-s1-den-xanh-3.jpg,https://cdn.yousport.vn/Media/Products/230522120021029/mira-galaxy-s1-den-cam-4.jpg',
                'chi_tiet' => 'Giày bóng đá Mira Galaxy S1 là sự cải tiến về mẫu mã, chất lượng so với thế hệ đầu tiên với sự thành công của mẫu giày cổ cao, chân bè - một đôi giày vừa có kiểu dáng phù hợp với tất cả form chân vừa được cấu tạo từ những chất liệu siêu tốt đến từ thương hiệu giày MIRA
                Upper: Làm từ chất liệu da TPU phủ bóng cho khả năng chống thấm tốt, dễ vệ sinh.
                Lớp da tương đối mỏng, được dập vân nổi hình lục giác cho khả năng tiếp xúc bóng tốt
                Mũi giày: Được khâu chắc chắn, mũi tương đối dẹt cho khả năng chích bóng uy lực.
                Cổ giày: Làm từ thun co giãn, ôm chân chắc chắn, hạn chế hạt cao su và sỏi nhỏ lọt vào trong giày
                Đế giày: Làm từ cao su tổng hợp với độ bền cao
                Đinh giăm TF dạng hình thoi cho độ thăng bằng tốt, bám sân và hỗ trợ bứt tốc hiệu quả',
                'ma_danh_muc_id' => 5,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GBD3',
                'ten_san_pham' => 'Giày bóng đá Mira Gavin TF' ,
                'slug_san_pham' => 'giay-bong-da-mira-gavin-tf' ,
                'so_luong' => 100,
                'gia' => 449000,
                'gia_khuyen_mai' => 399000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/160922023103693/giay-bong-da-san-co-nhan-tao-chan-be-mira-gavin-yousport-do-1.jpg,https://cdn.yousport.vn/Media/Products/160922023103693/giay-bong-da-san-co-nhan-tao-chan-be-mira-gavin-yousport-do-2.jpg,https://cdn.yousport.vn/Media/Products/160922023103693/giay-bong-da-san-co-nhan-tao-chan-be-mira-gavin-yousport-do-4.jpg,https://cdn.yousport.vn/Media/Products/160922023103693/giay-bong-da-san-co-nhan-tao-chan-be-mira-gavin-yousport-do-5.jpg',
                'chi_tiet' => 'Giày bóng đá Mira Gavin TF là mẫu giày sân cỏ nhân tạo mới nhất đến từ thương hiệu Mira. Một mẫu giày cổ cao tiếp nối sự thành công của Galaxy S1, dự đoán đây sẽ là phiên bản thay thế hoàn hảo nhất của Galaxy S1.

                Form giày: Tuy là một đôi giày cổ cao nhưng Gavin có một bộ form bè, phù hợp với đa số bàn chân của người Việt.
                Upper: Chất liệu da TPU cao cấp có phần dày hơn mẫu Galaxy S1, mang lại sự bền bỉ cao cho bề mặt upper của giày. Tuy vậy, lớp da này vẫn đủ sự mềm mại cho những pha xử lí cần có cảm giác bóng tốt.
                Lưỡi gà liền và cổ thun: Giống như Galaxy S1 thì Gavin cũng mang trong mình thiết kế liền mạch với lớp vải thun co giãn được nối với upper TPU qua những đường chỉ vô cùng tỉ mỉ, và chắc chắn.
                Đế giày: Cao su tổng hợp vẫn là chất liệu quen thuộc ấy, đem lại một sự chắn chắn khi chạy trên sân, và độ bám cũng cực kì ổn định với mặt đinh dăm TF lục giác đa kích thước.',
                'ma_danh_muc_id' => 5,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GBD4',
                'ten_san_pham' => 'Giày bóng đá Mira Ultra TF' ,
                'slug_san_pham' => 'giay-bong-da-mira-ultra-tf' ,
                'so_luong' => 100,
                'gia' => 549000,
                'gia_khuyen_mai' => 439000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/160922023608606/giay-bong-da-san-co-nhan-tao-chan-be-mira-ultra-ptt-12-yousport-den-1.jpg,https://cdn.yousport.vn/Media/Products/160922023608606/giay-bong-da-san-co-nhan-tao-chan-be-mira-ultra-ptt-12-yousport-den-2.jpg,https://cdn.yousport.vn/Media/Products/160922023608606/giay-bong-da-san-co-nhan-tao-chan-be-mira-ultra-ptt-12-yousport-den-4.jpg,https://cdn.yousport.vn/Media/Products/160922023608606/giay-bong-da-san-co-nhan-tao-chan-be-mira-ultra-ptt-12-yousport-den-5.jpg',
                'chi_tiet' => 'Sau Hùng Dũng thì lần này Mira lại tiếp tục kết hợp với một truyển thủ quốc gia để cho ra mắt mẫu giày đá bóng mới nhất, Phan Tuấn Tài. Mira Ultra PTT.12 dự kiến là một mẫu giày với thiết kế và chất lượng tốt nhất trong tầm giá.

                Form giày: Không mất xa lạ với anh em Việt Nam, khi đôi giày mang bộ form bè.
                Upper: Vẫn là chất liệu TPU quen thuộc nhưng lần này Mira là đã làm mềm mại hơn, đường chỉ may chắc chắn nối liền với phần vải thun, đem lại độ ôm khá ấn tượng.
                Lười gà liền và cổ thun: Vừa đảm bảo được độ ôm chân, vừa đem lại sự thoải mái cho phần cổ chân.
                Đế giày: Phần đế cao su tổng hợp được chia làm 2 phần, kết hợp với chỉ khâu đế nằm trong rãnh thì độ bền của đôi giày sẽ được gia tăng đáng kể. ',
                'ma_danh_muc_id' => 5,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GBD5',
                'ten_san_pham' => 'Giày bóng đá sân cỏ tự nhiên Mira Galaxy S1 FG' ,
                'slug_san_pham' => 'giay-bong-da-san-co-tu-nhien-mira-galaxy-s1-fg' ,
                'so_luong' => 100,
                'gia' => 549000,
                'gia_khuyen_mai' => 494000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/130922054125021/giay-bong-da-san-co-nhan-tao-dinh-dai-fg-mira-galaxy-s1-yousport-trang-1.jpg,https://cdn.yousport.vn/Media/Products/130922054125021/giay-bong-da-san-co-nhan-tao-dinh-dai-fg-mira-galaxy-s1-yousport-trang-3.jpg,https://cdn.yousport.vn/Media/Products/130922054125021/giay-bong-da-san-co-nhan-tao-dinh-dai-fg-mira-galaxy-s1-yousport-trang-4.jpg,https://cdn.yousport.vn/Media/Products/130922054125021/giay-bong-da-san-co-nhan-tao-dinh-dai-fg-mira-galaxy-s1-yousport-trang-5.jpg',
                'chi_tiet' => 'Giày bóng đá Mira Galaxy S1 FG là sự cải tiến về mẫu mã, chất lượng so với thế hệ đầu tiên với sự thành công của mẫu giày cổ cao, chân bè - một đôi giày vừa có kiểu dáng phù hợp với tất cả form chân vừa được cấu tạo từ những chất liệu siêu tốt đến từ thương hiệu giày MIRA.

                Upper: Làm từ chất liệu da TPU phủ bóng cho khả năng chống thấm tốt, dễ vệ sinh.
                Lớp da tương đối mỏng, được dập vân nổi hình lục giác cho khả năng tiếp xúc bóng tốt
                Mũi giày: Tương đối dẹt cho khả năng chích bóng uy lực.
                Cổ giày: Làm từ thun co giãn, ôm chân chắc chắn, hạn chế được tối đa việc bàn chân trượt bên trong giày.
                Đế giày: Làm từ nhựa cứng tổng hợp với độ bền cao
                Đinh dài FG cho độ thăng bằng tốt, bám sân trên mặt đất xốp của cỏ tự nhiên và hỗ trợ bứt tốc hiệu quả.',
                'ma_danh_muc_id' => 5,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GBD6',
                'ten_san_pham' => 'Giày Pan Super Sonic II TF' ,
                'slug_san_pham' => 'giay-pan-super-sonic-ii-tf' ,
                'so_luong' => 100,
                'gia' => 590000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/251122040303332/giay-pan-super-sonic-2-tf-bac-(2).jpg,https://cdn.yousport.vn/Media/Products/251122040303332/giay-pan-super-sonic-2-tf-bac-3.jpg,https://cdn.yousport.vn/Media/Products/251122040303332/giay-pan-super-sonic-2-tf-bac-4.jpg,https://cdn.yousport.vn/Media/Products/251122040303332/giay-pan-super-sonic-2-tf-bac-5.jpg',
                'chi_tiet' => 'Giày Pan Super Sonic II Chính Hãng vừa ra mắt với thay đổi lớn nhất chính là phần đế, mẫu đế mới giống với mẫu Pan Flash, nhìn hiện đại và khỏe khoắn. Dàn đinh dăm được sắp xếm khoa học, giúp cho khả năng bám sân tăng lên rất nhiều. Mũi giày được dập nổi 3D hình tia chớp vô cùng bắt mắt, giúp cho cầu thủ cảm nhận và tiếp xúc bóng tốt hơn, những cú xút có quỹ đạo bóng khó lường.

                Chất liệu: Thân giày đá banh Pan Thái Lan là PU cao cấp mềm mại được kết hợp với bề mặt vân nổi cho khả năng tiếp xúc, khống chế bóng chuẩn xác , dễ lau chùi vệ sinh.
                Đế giày đá banh Pan Thái Lan là cao su chất lượng cao, có độ co giãn, dẻo, độ đế cao vừa phải. Được bố trí đều lớp đinh lục giác nhằm tạo độ bám với bề mặt sân cỏ, giữ thăng bằng và tránh trơn trượt kể cả khi trời mưa.
                Form giày đá banh Pan Thái Lan dành cho người có bàn chân bè ngang.
                Mũi giày đá banh Pan Thái Lan được dán keo kỹ càng và khâu may chắc chắn, tăng lực cho những pha chích mũi sở trường',
                'ma_danh_muc_id' => 5,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GBD7',
                'ten_san_pham' => 'Giày Pan Patriot POD TF' ,
                'slug_san_pham' => 'giay-pan-patriot-pod-tf' ,
                'so_luong' => 100,
                'gia' => 609000,
                'gia_khuyen_mai' => 579000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/231221023016398/giay-da-bong-san-co-nhan-tao-chan-be-pan-evo-pod-yousport-do-1.jpg,https://cdn.yousport.vn/Media/Products/231221023016398/giay-da-bong-san-co-nhan-tao-chan-be-pan-evo-pod-yousport-do-3.jpg,https://cdn.yousport.vn/Media/Products/231221023016398/giay-da-bong-san-co-nhan-tao-chan-be-pan-evo-pod-yousport-do-4.jpg,https://cdn.yousport.vn/Media/Products/231221023016398/giay-da-bong-san-co-nhan-tao-chan-be-pan-evo-pod-yousport-do-5.jpg',
                'chi_tiet' => 'Giày đá bóng Pan Patriot POD mang đến một vẻ ngoài phóng khoáng và hiện đại dù vẫn giữ những nét đặc trưng truyền thống của những đôi giày Pan. Thiết kế lỗ xỏ dây theo đường chéo bắt mắt cùng với các họa tiết tạo ra điểm nhấn ấn tượng.

                Form giày bè ngang phù hợp với người có bàn chân to.
                Da ELVALOY PU chắc chắn, độ bền cao và chống thấm tốt. Bề mặt có các mảng tạo khả năng khống chế bóng tốt.
                Đế TF đinh lục giác, tạo khả năng thăng bằng tốt, độ bám ổn định.
                Mũi giày thuôn, tiết diện tiếp xúc bóng vừa đủ giúp chích mũi uy lực, chính xác. ',
                'ma_danh_muc_id' => 5,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GBD8',
                'ten_san_pham' => 'Giày bóng đá Jogarbola 190424B TF' ,
                'slug_san_pham' => 'giay-bong-da-jogarbola-190424b-tf' ,
                'so_luong' => 100,
                'gia' => 685000,
                'gia_khuyen_mai' => 651000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/130120115519889/jogarbola-190424b-naudat-1x.jpg,https://cdn.yousport.vn/Media/Products/130120115519889/jogarbola-190424b-naudat2.jpg,https://cdn.yousport.vn/Media/Products/130120115519889/jogarbola-190424b-naudat4.jpg,https://cdn.yousport.vn/Media/Products/130120115519889/jogarbola-190424b-naudat5.jpg',
                'chi_tiet' => 'JOGARBOLA ra mắt mẫu giày đá bóng sân cỏ nhân tạo mới JGBL 190424B với đặc điểm nổi bật như trọng lượng giày siêu nhẹ cho khả năng tấn công tuyệt vời cùng phần đế đinh tạo ra những đột phá khi di chuyển. Với mẫu giày Jogarbola 190424B này các cầu thủ có thể phô diễn toàn bộ kĩ thuật một cách trọn vẹn nhất.

                Jogarbola 190424B được thiết kế theo form thon gọn và thuôn dài nên có cảm giác rất ôm chân, nhưng không hề bị tức dù bạn có đeo tất chống trơn dày.
                Phần gót cảm giác rất chắc chắn và ôm rất chặt.
                Lưỡi gà mỏng xong rất ôm bàn chân tạo cảm giác rất thoải mái mà không hề lỏng lẻo
                Công nghệ đế TF mới của Jogarbola là một sự đột phá trên mặt sân cỏ nhân tạo cho bạn cảm giác bùng nổ trên mỗi bước chạy
                Phần upper được làm từ chất liệu microfiber tiếp bóng rất tốt, đỡ bóng dính mang đến cho bạn những trải nghiệm cảm giác rất thật khi chạm bóng trực tiếp
                Form giày phù hợp với những bạn thích dứt điểm hay dê rắt bóng',
                'ma_danh_muc_id' => 5,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GBD9',
                'ten_san_pham' => 'Giày Kamito TA11' ,
                'slug_san_pham' => 'giay-kamito-ta11' ,
                'so_luong' => 100,
                'gia' => 690000,
                'gia_khuyen_mai' => 655000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/090321083134639/gbd-kamito-ta11-xanh-nhat-1.jpg,https://cdn.yousport.vn/Media/Products/090321083134639/gbd-kamito-ta11-xanh-nhat-3.jpg,https://cdn.yousport.vn/Media/Products/090321083134639/gbd-kamito-ta11-xanh-nhat-4.jpg,https://cdn.yousport.vn/Media/Products/090321083134639/gbd-kamito-ta11-xanh-nhat-5.jpg',
                'chi_tiet' => 'Giày Kamito TA11 AS là mẫu giày sân cỏ nhân tạo được thương hiệu Kamito thiết kế với sự góp ý của chính Tuấn Anh. Như mọi mẫu giày "Signature" của các cầu thủ khác, Kamito TA11 mang những đặc trưng riêng biệt và đầy thú vị liên quan đến đội trưởng của CLB Hoàng Anh Gia Lai - Nguyễn Tuấn Anh.

                Ký hiệu TA11 đặt theo tên và số áo của chàng cầu thủ này.
                Chữ ký của Tuấn Anh cũng xuất hiện trên thân giày.
                Các họa tiết mang đậm dấu ấn của Tuấn Anh, đặc biệt là các vân kim cương nổi tạo điểm nhấn trong tổng thể thiết kế.
                Ngoài ra còn có những bước tiến trong việc nâng cao chất lượng sản phẩm để giúp mẫu giày Kamito TA11 thật sự trở thành một vũ khí đắc lực cho người chơi bóng.

                Lớp da KA-FIBER ULTRA siêu mềm, tạo cảm giác như đi chân trần và với lớp da mới này, độ bền cũng đã được nâng cấp lên một tầm cao mới.
                Thiết kế đặc biệt với những vân kim cương nổi trên thân giày, vừa tạo tính thẩm mỹ vừa hỗ trợ kiểm soát bóng tối ưu.
                Bộ đế giày áp dụng công nghệ KA-SPIN với dàn đinh dăm được sắp xếp khoa học, giúp bám sân hiệu quả ngay cả khi trời mưa sân trơn bóng ướt.
                Đặc biệt, lớp đệm giảm chấn cực êm ái KA-COMFORT lần đầu tiên xuất hiện ở một đôi giày phân khúc tầm trung sẽ mang lại một trải nghiệm tuyệt vời giúp các cầu thủ luôn cảm thấy thoải mái và êm ái trong suốt quá trình thi đấu. Bên cạnh đó, lớp đệm êm này cũng sẽ giảm áp lực lên đầu gối và cột sống qua đó giảm thiểu những chấn thương không đáng có.
                Form giày áp dụng chuẩn KA-FIT, ôm sát và phù hợp với bàn chân người Việt.',
                'ma_danh_muc_id' => 5,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GBD10',
                'ten_san_pham' => 'Giày Kamito TA11 Woncup' ,
                'slug_san_pham' => 'giay-kamito-ta11-woncup' ,
                'so_luong' => 100,
                'gia' => 690000,
                'gia_khuyen_mai' => 655000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/051122115111520/gbd-kamito-ta11-woncup-xanh.jpg,https://cdn.yousport.vn/Media/Products/051122115111520/gbd-kamito-ta11-woncup-xanh-(3).jpg,https://cdn.yousport.vn/Media/Products/051122115111520/gbd-kamito-ta11-woncup-xanh-(2).jpg,https://cdn.yousport.vn/Media/Products/051122115111520/gbd-kamito-ta11-woncup-xanh-(4).jpg',
                'chi_tiet' => 'Kamito TA11 là mẫu giày được đặt tên theo tên và số áo của tiền vệ Nguyễn Tuấn Anh. Mẫu giày này đã ra mắt được một thời gian và nhận được sự ủng hộ rất lớn của người chơi bóng đá trên cả nước bởi chất lượng tốt, độ ổn định cao, thiết kế nổi bật cùng với đó là mức giá vô cùng hợp lý. Với những yếu tố đó, Kamito TA11 được nhiều người hâm mộ nhận định là mẫu giày “quốc dân”, phù hợp với nhiều người chơi Việt Nam.

                Kamito TA11 Woncup mang tới những thiết kế hoàn toàn mới dành riêng cho TA11 với những họa tiết đậm chất Qatar trải dài trên thân giày. Bên cạnh đó, giày Kamito TA11 Woncup còn có hộp giày, túi đựng giày đi kèm và những sản phẩm này cũng được thiết kế đồng bộ cùng các sản phẩm khác trong bộ sưu tập. ',
                'ma_danh_muc_id' => 5,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GCL1',
                'ten_san_pham' => 'Giày cầu lông Mira LIGHTNING 19.1',
                'slug_san_pham' => 'giay-cau-long-mira-lightning-191' ,
                'so_luong' => 100,
                'gia' => 449000,
                'gia_khuyen_mai' => 359000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/120122010802059/giay-cau-long-mira-lightning-19-1-bac-1.jpg,https://cdn.yousport.vn/Media/Products/120122010802059/giay-cau-long-mira-lightning-19-1-bac-2.jpg,https://cdn.yousport.vn/Media/Products/120122010802059/giay-cau-long-mira-lightning-19-1-bac-3.jpg,https://cdn.yousport.vn/Media/Products/120122010802059/giay-cau-long-mira-lightning-19-1-bac-4.jpg',
                'chi_tiet' => 'Giày cầu lông Mira Lightning có bề mặt được làm từ da tổng hợp và vải dệt thoáng khí sẽ mang đến cho bạn cảm giác khô thoáng và thoải mái. Phần mũi giày được điều chỉnh giúp giảm bớt lực ép lên các ngón chân nên việc di chuyển trở nên linh hoạt và dễ dàng hơn nữa.

                Cổ giày Mira Lightning ôm khít vào cổ chân giúp cho bạn di chuyển uyển chuyển, dễ dàng xử lý các pha khó khi chơi cầu lông. Ngoài ra, phần cổ giày này cũng bảo vệ cổ chân bạn một cách tối đa nên bạn có thể hoàn toàn yên tâm vận động.

                Phần đế cao su chắc chắn cùng với đệm khí lót bên trong tạo cho bạn cảm giác êm ái, dễ chịu khi mang giày và bật nhảy. Bạn hoàn toàn yên tâm khi vận động trên sân cầu lông mà không lo bị trơn trượt.',
                'ma_danh_muc_id' => 6,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GCL2',
                'ten_san_pham' => 'Giày cầu lông Kamito Calo' ,
                'slug_san_pham' => 'giay-cau-long-kamito-calo' ,
                'so_luong' => 100,
                'gia' => 790000,
                'gia_khuyen_mai' => 632000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/040322085738238/giay-cau-long-kamito-calo-tim-1.jpg,https://cdn.yousport.vn/Media/Products/040322085738238/giay-cau-long-kamito-calo-tim-3.jpg,https://cdn.yousport.vn/Media/Products/040322085738238/giay-cau-long-kamito-calo-tim-4.jpg,https://cdn.yousport.vn/Media/Products/040322085738238/giay-cau-long-kamito-calo-tim-5.jpg',
                'chi_tiet' => 'Giày cầu lông Kamito Calo là mẫu sản phẩm thi đấu hướng tới những người chơi phong trào với mức giá vô cùng hợp lý. Đồng thời vẫn đảm bảo đầy đủ các yếu tố từ thẩm mỹ cho tới độ êm ái, phòng tránh chấn thương cho người chơi. Đặc biệt, form giày được thiết kế riêng theo form bàn chân người châu Á, phù hợp với hầu hết những người chơi tại Việt Nam.

                Là mẫu giày ở phân khúc tầm trung nhưng Kamito Calo được thiết kế hiện đại, ấn tượng và được trang bị những công nghệ cao cấp nhằm mang tới những trải nghiệm tốt nhất:

                 KA – FRESH AIR:  Lớp vải lưới siêu bền dọc theo thân giày, giúp giảm thiểu trọng lượng giày đồng thời mang tới sự thông thoáng trong suốt quá trình thi đấu.
                 KA – SOFT: Lót giày được làm từ chất liệu EVA mềm êm và được đúc theo khuôn bàn chân, hỗ trợ di chuyển thật chân và an toàn.
                KA – COMFORT:  Lớp đệm giảm chấn êm ái mang tới sự thoải mái và yên tâm cho người đi. Lớp đệm này giúp những pha bật nhảy trở nên dễ dàng hơn và giúp giảm áp lực lên đầu gối và cột sống qua đó giảm thiểu những chấn thương không đáng có.
                KA – HEXABRAKE: Lớp đế ngoài được làm từ cao su cao cấp với những họa tiết lục giác giúp tăng cường độ bám sân và giảm thiểu trọng lư���ng giày.
                Với những công nghệ cao cấp được trang bị, Kamito Calo hứa hẹn sẽ là mẫu giày mang tới những trải nghiệm tuyệt vời dành cho người chơi cầu lông tại Việt Nam. Nếu bạn là một người chơi phong trào đang tìm kiếm một mẫu giày nhẹ, êm ái và có mức giá hợp lý, chắc chắn không thể bỏ qua Kamito Calo. Hãy trải nghiệm và cảm nhận!',
                'ma_danh_muc_id' => 6,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GCL3',
                'ten_san_pham' => 'Giày cầu lông Warrior Chính Hãng' ,
                'slug_san_pham' => 'giay-cau-long-warrior-chinh-hang',
                'so_luong' => 100,
                'gia' => 549000,
                'gia_khuyen_mai' => 439000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/111122112904880/giay-cau-long-mira-warrior-yousport-den-trang.jpg,https://cdn.yousport.vn/Media/Products/111122112904880/giay-cau-long-mira-warrior-yousport-den-trang-2.jpg,https://cdn.yousport.vn/Media/Products/111122112904880/giay-cau-long-mira-warrior-yousport-den-trang-3.jpg,https://cdn.yousport.vn/Media/Products/111122112904880/giay-cau-long-mira-warrior-yousport-den-trang-1.jpg',
                'chi_tiet' => 'Mira Warrior là mẫu giày cầu lông chuyên dụng, có bề mặt được làm từ da Microfiber và vải dệt thoáng khí sẽ mang đến cho bạn cảm giác khô thoáng và không để lại mùi hôi chân khi mang trong thời gian dài. Phần mũi giày được điều chỉnh giúp giảm bớt lực ép lên các ngón chân nên việc di chuyển trở nên linh hoạt và dễ dàng hơn nữa.

                Cổ giày Mira Warrior ôm chân tuyệt đối dễ dàng di chuyển, Cổ giày ôm khít vào cổ chân giúp cho bạn di chuyển uyển chuyển, dễ dàng xử lý các pha khó khi chơi cầu lông. Ngoài ra, phần cổ giày này cũng bảo vệ cổ chân bạn một cách tối đa nên bạn có thể hoàn toàn yên tâm vận động.

                Da giày được thiết kế với lỗ thoáng khí thông hơi đặc sắc kết hợp cùng mặt quay TPU chống gãy cực kì tốt. Logo ép chìm độc đáo.

                Phần đế giày Mira Warrior có điểm gì đặc biệt? Phần đế Falong siêu nhẹ, đàn hồi cao và chắc chắn cùng với đệm khí lót bên trong tạo cho bạn cảm giác êm ái, dễ chịu khi mang giày và bật nhảy. Thành đế cao su giúp bảo vệ tốt mũi khi ma sát kết hợp miếng dán TPU tăng sự đàn hồi và sức bậc cho người chơi. Bạn hoàn toàn yên tâm khi vận động trên sân cầu lông mà không lo bị trơn trượt.',
                'ma_danh_muc_id' => 6,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GCL4',
                'ten_san_pham' => 'Giày cầu lông Mira Legend' ,
                'slug_san_pham' => 'giay-cau-long-mira-legend' ,
                'so_luong' => 100,
                'gia' => 599000,
                'gia_khuyen_mai' => 479000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/300622103533417/giay-cau-long-mira-legend-trang-1.jpg,https://cdn.yousport.vn/Media/Products/300622103533417/giay-cau-long-mira-legend-trang-2.jpg,https://cdn.yousport.vn/Media/Products/300622103533417/giay-cau-long-mira-legend-trang-4.jpg,https://cdn.yousport.vn/Media/Products/300622103533417/giay-cau-long-mira-legend-trang-5.jpg',
                'chi_tiet' => 'Giày cầu lông Mira Legend có bề mặt được làm từ da Microfiber và vải dệt thoáng khí sẽ mang đến cho bạn cảm giác khô thoáng khi mang trong thời gian dài.
                Phần mũi giày được điều chỉnh giúp giảm bớt lực ép lên các ngón chân nên việc di chuyển trở nên linh hoạt và dễ dàng hơn nữa.
                Cổ giày Mira Legend ôm chân tuyệt đối, dễ dàng di chuyển, xử lý các pha khó khi chơi cầu lông. Ngoài ra, phần cổ giày này cũng bảo vệ cổ chân bạn một cách tối đa nên bạn có thể hoàn toàn yên tâm vận động.
                Phần đế cao su chắc chắn cùng với đệm khí lót bên trong tạo cho bạn cảm giác êm ái, dễ chịu khi mang giày và bật nhảy. Bạn hoàn toàn yên tâm khi vận động trên sân cầu lông mà không lo bị trơn trượt.',
                'ma_danh_muc_id' => 6,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GCL5',
                'ten_san_pham' => 'Giày cầu lông XPD 342' ,
                'slug_san_pham' => 'giay-cau-long-xpd-342' ,
                'so_luong' => 100,
                'gia' => 599000,
                'gia_khuyen_mai' => 479000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/241120034309879/xpd-den.jpg,https://cdn.yousport.vn/Media/Products/241120034309879/giay-cau-long-xpd-342-den-2.jpg,https://cdn.yousport.vn/Media/Products/241120034309879/giay-cau-long-xpd-342-den-3.jpg,https://cdn.yousport.vn/Media/Products/241120034309879/giay-cau-long-xpd-342-den-4.jpg',
                'chi_tiet' => 'Giày cầu lông XPD 342 là mẫu giày chính hãng với giá cả phải chăng và đáp ứng được những yêu cầu mà mỗi người chơi cầu lông cần có
                Chất liệu da PU. Phần đầu mũi là da phủ bóng giúp bảo vệ tốt cho đôi giày trong những pha di chuyển kéo mũi giày đặc thù của môn cầu lông.
                Kết hợp với các phần vải mesh để tạo độ thông thoáng cho bàn chân người mang
                Bộ đệm EVA giảm chấn hiệu quả trong các pha dậm nhảy.
                Đế ngoài dùng cao su tự nhiên với độ bám tốt.
                Trang bị miếng chống xoắn đế giúp tăng độ an toàn trong các pha di chuyển',
                'ma_danh_muc_id' => 6,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GTTM1',
                'ten_san_pham' => 'Găng Tay Thủ Môn Iwin Keepa' ,
                'slug_san_pham' => 'gang-tay-thu-mon-iwin-keepa' ,
                'so_luong' => 100,
                'gia' => 279000,
                'gia_khuyen_mai' => 251000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/300818031605907/trang.jpg,https://cdn.yousport.vn/Media/Products/300818031605907/gang-tay-thu-mon-bat-bong-sieu-dinh-co-xuong-iwin-keepa-yousport-trang-2.jpg,https://cdn.yousport.vn/Media/Products/300818031605907/gang-tay-thu-mon-bat-bong-sieu-dinh-co-xuong-iwin-keepa-yousport-trang-1.jpg,https://cdn.yousport.vn/Media/Products/300818031605907/gang-tay-thu-mon-bat-bong-sieu-dinh-co-xuong-iwin-keepa-yousport-trang.jpg',
                'chi_tiet' => 'Đối với người chơi ở vị trí thủ môn thì găng tay là một phụ kiện bóng đá cần thiết. Găng tay thủ môn Iwin Keepa sẽ đem lại sự an toàn cho đôi bàn tay.
                Chất liệu da PU có độ bền cao
                Cảm giác bóng tốt, giúp kiểm soát bóng dễ dàng với mặt cắt hybrid hiện đại.
                Khung xương bảo vệ 4 ngón trừ ngón cái không có xương đem lại cảm giác bóng tốt khi ném bóng phát động tấn công.
                Thun quấn cổ tay co dãn mang lại độ ôm chắc chắn cho cổ tay mà không quá chật.',
                'ma_danh_muc_id' => 13,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GTTM2',
                'ten_san_pham' => 'Găng tay thủ môn giá rẻ Iwin Keepa A' ,
                'slug_san_pham' => 'gang-tay-thu-mon-gia-re-iwin-keepa-a' ,
                'so_luong' => 100,
                'gia' => 399000,
                'gia_khuyen_mai' => 359000,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/260722120714858/gang-tay-thu-mon-bat-bong-sieu-dinh-co-xuong-iwin-keepa-yousport-xanh-4.jpg,https://cdn.yousport.vn/Media/Products/260722120714858/gang-tay-thu-mon-bat-bong-sieu-dinh-co-xuong-iwin-keepa-yousport-xanh-4-(1).jpg,https://cdn.yousport.vn/Media/Products/260722120714858/gang-tay-thu-mon-bat-bong-sieu-dinh-co-xuong-iwin-keepa-yousport-xanh-4-(2).jpg,https://cdn.yousport.vn/Media/Products/260722120714858/gang-tay-thu-mon-bat-bong-sieu-dinh-co-xuong-iwin-keepa-yousport-xanh-4-(3).jpg',
                'chi_tiet' => 'Găng Tay Thủ Môn iWin Keepa A | Made in Pakistan, với iWin Keepa những cú sút mạnh không còn là lí do khiến bạn phải e ngại.
                Diện tích tiếp xúc bóng rộng, mút cao su Đức dày 4mm gúp bắt dính bóng.
                Kiểu cắt “NEGATIVE” ôm tay cho cảm giác bắt bóng chân thực.
                Form vừa tay, lớp đệm lót êm ái, vải mesh thoáng khí, mang lại sự mềm mại và êm tay trong thời gian dài.
                Lớp mút cao su giảm & phân tán lực giúp tay không đau rát.
                Khung xương bảo vệ cứng cáp giúp tăng sức mạnh cho những cú bắt bóng, phòng tránh lật, bong gân, trật khớp ngón tay, mang lại cảm giác an toàn cho bạn.',
                'ma_danh_muc_id' => 13,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GTTM3',
                'ten_san_pham' => 'Găng tay thủ môn Iwin Keepa PRO GK02' ,
                'slug_san_pham' => 'gang-tay-thu-mon-iwin-keepa-pro-gk02' ,
                'so_luong' => 100,
                'gia' => 499000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/031022095718869/gang-tay-thu-mon-bat-bong-sieu-dinh-co-xuong-iwin-keepa-pro-yousport-hong-1.jpg,https://cdn.yousport.vn/Media/Products/031022095718869/gang-tay-thu-mon-bat-bong-sieu-dinh-co-xuong-iwin-keepa-pro-yousport-hong-2.jpg,https://cdn.yousport.vn/Media/Products/031022095718869/gang-tay-thu-mon-bat-bong-sieu-dinh-co-xuong-iwin-keepa-pro-yousport-hong-3.jpg,https://cdn.yousport.vn/Media/Products/031022095718869/gang-tay-thu-mon-bat-bong-sieu-dinh-co-xuong-iwin-keepa-pro-yousport-hong-4.jpg',
                'chi_tiet' => 'GIỮ TAY VỮNG VÀNG, SẴN SÀNG CẢN PHÁ
                Với iWin Keepa, những cú sút mạnh không còn là lí do khiến bạn phải e ngại. Thiết kế đăc biêt giúp bảo vệvà hạn chế chấn thương tối đa cho các ngón tay, đây chính là trợ thủ đắc lực giúp mang lại cảm giác an toàn, sẵn sàng hóa giải từng cú sút.',
                'ma_danh_muc_id' => 13,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GTTM4',
                'ten_san_pham' => 'Găng Tay Thủ Môn H3 Bengal' ,
                'slug_san_pham' => 'gang-tay-thu-mon-h3-bengal' ,
                'so_luong' => 100,
                'gia' => 650000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/021222094834077/gang-tay-thu-mon-san-co-nhan-tao-h3-bengal-yousport-trang-hong-1.jpg,https://cdn.yousport.vn/Media/Products/021222094834077/gang-tay-thu-mon-san-co-nhan-tao-h3-bengal-yousport-trang-hong-3.jpg,https://cdn.yousport.vn/Media/Products/021222094834077/gang-tay-thu-mon-san-co-nhan-tao-h3-bengal-yousport-trang-hong-4.jpg,https://cdn.yousport.vn/Media/Products/021222094834077/gang-tay-thu-mon-san-co-nhan-tao-h3-bengal-yousport-trang-hong-2.jpg',
                'chi_tiet' => 'Găng tay thủ môn H3 Bengal chính hãng xuất xứ từ Thái Lan với thiết kế có lớp đệm mút mềm, găng tay giúp giảm lực tác động từ bóng lên bàn tay và các ngón tay của bạn, đóng vai trò rất quan trọng trong hỗ trợ chơi bóng cho người gác đền. Những ưu điểm từ Găng tay thủ môn H3 Bengal:
                Lòng bàn tay mút dày 4mm, bổ sung công nghệ ép mút giúp tăng độ chắc tay và giúp bắt dính bóng tốt cả trời nắng lẫn trời mưa.
                Bề mặt găng tay dày 3mm và được thiết kế với họa tiết silicon in nổi 3D hỗ trợ đấm bóng tốt.
                Có khung xương bảo vệ ngón tay, có thể tháo lắp dễ dàng linh hoạt.
                Miếng dán cổ tay bản to quấn 2 vòng ôm sát cổ tay chắc chắn.
                Bề mặt bên trong các ngón tay có điểm mút silicon, hỗ trợ chống trơn tay tạo cảm giác bắt bóng tốt hơn.
                Thuộc dòng găng tay Negative được nhiều thủ môn ưa chuộng vì cảm giác bắt bóng thật hơn Flat và thoáng hơn so dòng Roll Finger.',
                'ma_danh_muc_id' => 13,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'GTTM5',
                'ten_san_pham' => 'Găng tay thủ môn Zocker Edwin' ,
                'slug_san_pham' => '' ,
                'so_luong' => 100,
                'gia' => 569000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' => 'https://cdn.yousport.vn/Media/Products/080722104924996/gang-tay-thu-mon-bat-bong-sieu-dinh-khong-xuong-zocker-edwin-yousport-(7).jpg,https://cdn.yousport.vn/Media/Products/080722104924996/gang-tay-thu-mon-bat-bong-sieu-dinh-khong-xuong-zocker-edwin-yousport-(8).jpg,https://cdn.yousport.vn/Media/Products/080722104924996/gang-tay-thu-mon-bat-bong-sieu-dinh-khong-xuong-zocker-edwin-yousport-(10).jpg,https://cdn.yousport.vn/Media/Products/080722104924996/gang-tay-thu-mon-bat-bong-sieu-dinh-khong-xuong-zocker-edwin-yousport-(9).jpg',
                'chi_tiet' => 'Găng tay thủ môn Zocker GLOVES EDWIN được thiết kế theo phong cách Hybirdôm vừa khít tay, duy trì sự linh hoạt cũng như cảm giác bóng.

                Lòng găng sử dụng chất liệu cao cấp Latico New Basic Latex Foam (Germany) tăng cường tính ma sát giúp thủ môn bắt dính bóng đồng thời giữ cảm giác bóng chân thật.
                Mu bàn tay ứng dụng công nghệ 3D định hình bộ khung, giúp các ngón và bàn tay không bị bó chặt bên trong mà ôm vừa đủ để đảm bảo sự linh hoạt.
                Phần đấm bóng sử dụng chất liệu Latex Foam, bên dưới có lớp đệm bảo vệ. Lớp đệm còn hỗ trợ tăng cường lực khi đấm bóng.
                Quấn cố tay có thể điều chỉnh để đạt độ ôm tay vừa phải.
                Phần cổ tay sử dung đệm mút để giữ cổ tay linh hoạt, đồng thời giữ cho tay luôn thoáng khí.',
                'ma_danh_muc_id' => 13,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QBD1',
                'ten_san_pham' => 'Quả bóng đá số 4 Akpro Tomahank' ,
                'slug_san_pham' => 'qua-bong-da-so-4-akpro-tomahank' ,
                'so_luong' => 100,
                'gia' => 159000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/160722094311962/qua-bong-so-4-akpro-tomahank.jpg',
                'chi_tiet' => 'Mã sản phẩm: TMHK-M4
                Size: 4
                Số miếng ghép: 32
                Màu: Trắng – Xanh – Đen – Cam
                Lớp phủ bề mặt: Cao bóng
                Chất liệu vỏ: Da TPU
                Ruột bóng: Butyl
                Công nghệ sản xuất: Khâu máy
                Nhãn hiệu: AKpro
                Sản xuất tại: Việt Nam',
                'ma_danh_muc_id' => 11,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QBD2',
                'ten_san_pham' => 'Quả Bóng Futsal Akpro AF3800' ,
                'slug_san_pham' => 'qua-bong-futsal-akpro-af3800' ,
                'so_luong' => 100,
                'gia' => 399000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/300722111123627/qua-bong-da-so-4-akpro-af3800-vang.jpg',
                'chi_tiet' => 'AKpro Sport chào sân mùa Hè này bằng “siêu phẩm” quả bóng đá futsal AF3800 cực kỳ thu hút. Quả bóng đặc biệt này nhanh chóng phủ sóng nhờ công nghệ mới tạo nên sự khác biệt so với các loại bóng khác.

                Nếu trước đây, khách hàng ưa chuộng loại bóng dán với kiểu bóng chì sân 5. Thì nay, AKpro Sport tạo nên bước đột phá với bóng chì công nghệ ép nhiệt được mang tên ACENTECpro. Một công nghệ mang lại nhiều tính năng ưu việt cho quả bóng AF3800.

                Trước đây chúng ta từng nghe về ACENTEC được áp dụng trên những quả bóng cao cấp với giá cao. Vậy mà ở AF3800 với mức giá chỉ 399.000đ, người mua đã có thể trải nghiệm công nghệ ép nhiệt đình đám này dưới tên gọi ACENTECpro.

                Ép nhiệt là công nghệ sản xuất mà các miếng ghép sẽ được nối lại với nhau. Qua đó, tạo thành một khối tròn trịa và chắc chắn nhờ loại keo nhiệt chuyên dụng. Lớp lót phụ ngoài ruột được phủ keo toàn bộ giúp những đường nối cũng kín kẽ để đối phó với việc thấm nước. Ngoài ra, công nghệ sản xuất này còn mang lại cho quả bóng sự ổn định và đồng nhất ở đa điểm trên bề mặt của nó.

                Ở bên ngoài, AF3800 được phủ thêm một lớp bảo vệ bề mặt bóng sáng giúp tăng độ thẩm mỹ và độ bền của quả bóng. Qua trải nghiệm thực tế, công nghệ ACENTECpro thực sự nâng tầm chất lượng thi đấu của quả bóng AF3800. Các cầu thủ có nhiều cảm giác để dễ dàng kiểm soát quả bóng, điều hướng đi của bóng tốt hơn và ít gặp lỗi với bước một.',
                'ma_danh_muc_id' => 11,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QBD3',
                'ten_san_pham' => 'Quả Bóng Số 4 UHV 2.05' ,
                'slug_san_pham' => 'qua-bong-so-4-uhv-205' ,
                'so_luong' => 100,
                'gia' => 495000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/231216100904/qua-bong-da-so-4-uhv-2-05.jpg,https://cdn.yousport.vn/Media/Products/231216100904/qua-bong-da-dong-luc-uhv-2-05-size-4-3.jpg',
                'chi_tiet' => 'Quả bóng đá số 4 UHV 2.05 là sản phẩm được thiết kế theo chuẩn FIFA QUALITY. Quả bóng được làm từ chất liệu da PU cao cấp, có cấu tạo nhiều lớp, ruột làm bằng cao su cao cấp, giữ hơi tốt.',
                'ma_danh_muc_id' => 11,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QBD4',
                'ten_san_pham' => 'Quả bóng đá Futsal Molten tiêu chuẩn F9A1510' ,
                'slug_san_pham' => 'qua-bong-da-futsal-molten-tieu-chuan-f9a1510' ,
                'so_luong' => 100,
                'gia' => 595000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/270521041213764/qua-bong-futsal-molten-1500-dq-(2).jpg,https://cdn.yousport.vn/Media/Products/270521041213764/qua-bong-futsal-molten-1500-dq.jpg',
                'chi_tiet' => 'MOLTEN là một thương hiệu sản xuất Bóng rất nổi tiếng, được thành lập vào năm 1958 tại Nhật Bản.  Hơn 50 năm tồn tại, tập đoàn Molten đã chứng minh được vị thế và thương hiệu của mình với các dòng sản phẩm về bóng đá, bóng chuyền, bóng rổ, bóng ném, bóng chày và rất nhiều phụ kiện thể thao phục vụ cho nhu cầu mua sắm trang thiết bị của người chơi thể thao trên toàn thế giới. Đặc biệt, bóng đá Molten được liên đoàn bóng đá Nhật Bản và thế giới chứng nhận, được sử dụng cho các giải đấu Quốc tế mang tầm cỡ Châu lục. Quả bóng Molten đã lăn ở khắp nơi trên thế giới,  được sử dụng ở những giải đấu mang tầm Châu lục và Quốc tế như ASIAN CUP, EUROPA LEAGUE...',
                'ma_danh_muc_id' => 11,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QBD5',
                'ten_san_pham' => 'Quả bóng đá Molten số 5 FIFAPro F5A 4900' ,
                'slug_san_pham' => 'qua-bong-da-molten-so-5-fifapro-f5a-4900' ,
                'so_luong' => 100,
                'gia' => 1790000 ,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/200221110652373/qua-bong-da-molten-so-5-fifapro-f5a-4900.jpg',
                'chi_tiet' => 'Quả bóng đá Molten số 5 FIFAPro F5A 4900 là mẫu bóng đạt tiêu chuẩn thi đấu cao nhất FIFA Quality Pro với hình dạng, độ nảy, độ chống thấm nước và trọng lượng chuẩn mực',
                'ma_danh_muc_id' => 11,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'TDD1',
                'ten_san_pham' => 'Túi rút thể thao 2 ngăn YS' ,
                'slug_san_pham' => 'tui-rut-the-thao-2-ngan-ys' ,
                'so_luong' => 100,
                'gia' => 119000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/130720044516116/tui-rut-bong-da-ys-2-0.jpg,https://cdn.yousport.vn/Media/Products/130720044516116/tui-rut-ys-den-2.jpg,https://cdn.yousport.vn/Media/Products/130720044516116/tui-rut-ys-xanhreu-1.jpg',
                'chi_tiet' => ' Túi đựng giày YouSport là mẫu túi rút cực chất, đồng thời đảm bảo độ bền cao để đồng hành cùng người chơi bóng mỗi lần ra sân.
                Có lớp lưới 2 bên hông giúp giày ở bên trong không bị lưu mùi.
                Kích thước túi rộng, có chia 2 ngăn đựng giày và các phụ kiện bóng đá thoải mái
                Có ngăn nhỏ bên ngoài với khóa kéo tiện lợi',
                'ma_danh_muc_id' => 12,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'TDD2',
                'ten_san_pham' => 'Túi trống thể thao Yousport' ,
                'slug_san_pham' => 'tui-trong-the-thao-yousport' ,
                'so_luong' => 100,
                'gia' => 189000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/111220015654196/tui-trong-the-thao-yousport.jpg,https://cdn.yousport.vn/Media/Products/111220015654196/tui-trong-yousport-ii-den-1.jpg,https://cdn.yousport.vn/Media/Products/111220015654196/tui-trong-yousport-ii-den-2.jpg',
                'chi_tiet' => 'Túi trống thể thao YouSport với thiết kế với chất liệu bền, nhẹ cùng sự tiện lợi mà nó mang lại hứa hẹn sẽ là một phụ kiện thể thao tuyệt vời cho người chơi thể thao nói chung và chơi bóng nói riêng trong nhiều hoạt động.',
                'ma_danh_muc_id' => 12,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'TDD3',
                'ten_san_pham' => 'Túi đựng giày 2 ngăn Yousport' ,
                'slug_san_pham' => 'tui-dung-giay-2-ngan-yousport' ,
                'so_luong' => 100,
                'gia' =>119000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/301221105725747/tui-2-ngan-yousport-v2-2022-xam-1.jpg,https://cdn.yousport.vn/Media/Products/301221105725747/tui-2-ngan-yousport-2022-trang-2.jpg,https://cdn.yousport.vn/Media/Products/301221105725747/tui-2-ngan-yousport-v2-2022-xam-3.jpg',
                'chi_tiet' => 'Túi đựng giày hay túi đựng giày thể thao là một phụ kiện bóng đá rất tiện lợi cho những bạn đam mê bóng đá nói riêng và thể thao nói chung. YouSport.vn cung cấp những mẫu túi đựng giày tiện lợi, chất lượng, tốt và giá rẻ nhất thị trường. ',
                'ma_danh_muc_id' => 12,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'TDD4',
                'ten_san_pham' => 'Ba lô thể thao SG' ,
                'slug_san_pham' => 'ba-lo-the-thao-sg' ,
                'so_luong' => 100,
                'gia' => 289000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/280720091449390/balo-sg-den-2.jpg',
                'chi_tiet' => 'Balo thể thao SG với thiết kế các ngăn rộng rãi, phù hợp trong nhiều hoạt động từ thể thao, du lịch lẫn học tập.
                Chất liệu vải bền đẹp
                Có ngăn riêng đựng giày tiện lợi.',
                'ma_danh_muc_id' => 12,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'TDD5',
                'ten_san_pham' => 'Ba lô thể thao SG II' ,
                'slug_san_pham' => 'ba-lo-the-thao-sg-ii' ,
                'so_luong' => 100,
                'gia' => 289000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/100121092043108/balo-sg2-den-xanh-ngoc-1.jpg,https://cdn.yousport.vn/Media/Products/100121092043108/balo-sg2-den-xanh-ngoc-2.jpg',
                'chi_tiet' => ' Balo thể thao SG II với những nâng cấp đáng kể về chất liệu, lẫn ngoại hình và thiết kế hứa hẹn sẽ không chỉ là một món phụ kiện thể thao đẹp mắt mà còn đắc lực trong nhiều hoạt động thường ngày.',
                'ma_danh_muc_id' => 12,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'VCL1',
                'ten_san_pham' => 'VỢT CẦU LÔNG DECOO DK216' ,
                'slug_san_pham' => 'vot-cau-long-decoo-dk216' ,
                'so_luong' => 100,
                'gia' => 195000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/060217044203779/products_55949-vot-cau-long-decoo-dk216.png',
                'chi_tiet' => 'Vợt cầu lông Decoo DK216 là mẫu vợt cầu lông đan sẵn với kiểu dáng và màu sắc dễ chịu, giá thành vừa phải phù hợp với những người mới tập chơi cầu lông',
                'ma_danh_muc_id' => 14,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'VCL2',
                'ten_san_pham' => 'VỢT CẦU LÔNG DECOO DK315' ,
                'slug_san_pham' => 'vot-cau-long-decoo-dk315' ,
                'so_luong' => 100,
                'gia' => 395000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/070316053200/products_55962-vot-cau-long-decoo-dk315.png',
                'chi_tiet' => 'Vợt cầu lông Decoo DK315 là mẫu vợt cầu lông đan sẵn với kiểu dáng và màu sắc dễ chịu, giá thành vừa phải phù hợp với những người mới tập chơi cầu lông',
                'ma_danh_muc_id' => 14,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'VCL3',
                'ten_san_pham' => 'VỢT CẦU LÔNG DECOO CR002' ,
                'slug_san_pham' => 'vot-cau-long-decoo-cr002' ,
                'so_luong' => 100,
                'gia' => 495000,
                'gia_khuyen_mai' => 475000,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/060217043659364/210.000.png',
                'chi_tiet' => 'Vợt cầu lông Decoo CR002 là mẫu vợt cầu lông đan sẵn với kiểu dáng và màu sắc dễ chịu, giá thành vừa phải phù hợp với những người mới tập chơi cầu lông

                Thiết kế với màu sắc bắt mắt, thể hiện sự sành điệu và tinh tế của người chơi.
                Cán vợt cứng chắc chắn và bền bỉ, cán vợt và mặt vợt có khớp nối chắc chắn
                Là dòng vợt cầu lông lý tưởng dành cho những ai yêu thích bộ môn cầu lông mới bắt đầu tập chơi.
                Cặp vợt được đựng trong bao màu đen, thiết kế đơn giản, có dây đeo, vô cùng thuận tiện cho việc bảo quản cũng như khi mang theo đến sân tập',
                'ma_danh_muc_id' => 14,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QA1',
                'ten_san_pham' => 'Quần áo Riki CSD Namor' ,
                'slug_san_pham' => 'quan-ao-riki-csd-namor' ,
                'so_luong' => 100,
                'gia' => 155000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/151022033424313/quan-ao-bong-da-khong-logo-riki-namor-yousport-trang-1.jpg,https://cdn.yousport.vn/Media/Products/151022033424313/quan-ao-bong-da-khong-logo-riki-namor-yousport-trang-2.jpg,https://cdn.yousport.vn/Media/Products/151022033424313/quan-ao-bong-da-khong-logo-riki-namor-yousport-trang-3.jpg,https://cdn.yousport.vn/Media/Products/151022033424313/quan-ao-bong-da-khong-logo-riki-namor-yousport-trang-6.jpg',
                'chi_tiet' => 'Quần áo bóng đá Riki Namor là bộ sưu tập mới nhất đến từ thương hiệu Riki, với một thiết kế đơn giản nhưng vẫn có đầy đủ các điểm nhấn để mang đến sự bắt mắt.',
                'ma_danh_muc_id' => 7,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QA2',
                'ten_san_pham' => 'Quần Áo JP Dragon' ,
                'slug_san_pham' => 'quan-ao-jp-dragon' ,
                'so_luong' => 100,
                'gia' => 199000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/151022034613075/quan-ao-bong-da-khong-logo-jp-dragon-yousport-trang-1.jpg,https://cdn.yousport.vn/Media/Products/151022034613075/quan-ao-bong-da-khong-logo-jp-dragon-yousport-trang-2.jpghttps://cdn.yousport.vn/Media/Products/151022034613075/quan-ao-bong-da-khong-logo-jp-dragon-yousport-trang-3.jpg,https://cdn.yousport.vn/Media/Products/151022034613075/quan-ao-bong-da-khong-logo-jp-dragon-yousport-trang-7.jpg',
                'chi_tiet' => 'Justplay Dragon là mẫu quần áo bóng đá không logo mới nhất đến từ thương hiệu Justplay. Lấy cảm hứng từ hình ảnh rồng bay, linh thú huyền thoại trong nền văn hóa Châu Á.',
                'ma_danh_muc_id' => 7,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QA3',
                'ten_san_pham' => 'Quần Áo JP Phoenix' ,
                'slug_san_pham' => 'quan-ao-jp-phoenix' ,
                'so_luong' => 100,
                'gia' => 495000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/220622101921007/qabd-jp-phoenix-xam-1.jpg,https://cdn.yousport.vn/Media/Products/220622101921007/qabd-jp-phoenix-xam-2.jpg,https://cdn.yousport.vn/Media/Products/220622101921007/qabd-jp-phoenix-xam-3.jpg',
                'chi_tiet' => 'Mẫu quần áo bóng đá không logoJust Play Phoenix vừa ra mắt được chào đón tích cực và đầy hứa hẹn trong năm 2022

                BST Phoenix tạo ra sự cuốn hút với họa tiết chim phượng hoàng cách điệu được in chìm trên mặt trước thân áo.',
                'ma_danh_muc_id' => 7,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QA4',
                'ten_san_pham' => 'Quần Áo JP Panther' ,
                'slug_san_pham' => 'quan-ao-jp-panther' ,
                'so_luong' => 100,
                'gia' => 169000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/220622102246972/qabd-jp-panther-trang-1.jpg,https://cdn.yousport.vn/Media/Products/220622102246972/qabd-jp-panther-trang-2.jpg,https://cdn.yousport.vn/Media/Products/220622102246972/qabd-jp-panther-trang-3.jpg',
                'chi_tiet' => 'Mẫu quần áo bóng đá không logoJust Play Panther vừa ra mắt được chào đón tích cực và đầy hứa hẹn trong năm 2022

                BST Panther lấy ý tưởng từ Chiến Binh Báo đen với khả năng quan sát tinh tường, khả năng di chuyển tốc độ cùng sự mạnh mẽ uy lực của mình thể hiện bản lĩnh “SĂN BÀN THẮNG” tỏa sáng trên sân cỏ.',
                'ma_danh_muc_id' => 7,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QA5',
                'ten_san_pham' => 'Quần áo bóng đá Mira PTT12' ,
                'slug_san_pham' => 'quan-ao-bong-da-mira-ptt12' ,
                'so_luong' => 100,
                'gia' => 199000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/190922083646256/quan-ao-bong-da-khong-logo-mira-ptt-yousport-xanh-2.jpg,https://cdn.yousport.vn/Media/Products/190922083646256/quan-ao-bong-da-khong-logo-mira-ptt-yousport-xanh-1.jpg,https://cdn.yousport.vn/Media/Products/190922083646256/quan-ao-bong-da-khong-logo-mira-ptt-yousport-xanh-4.jpg,https://cdn.yousport.vn/Media/Products/190922083646256/quan-ao-bong-da-khong-logo-mira-ptt-yousport-xanh-3.jpg',
                'chi_tiet' => 'Quần áo bóng đá Mira PTT12 là mẫu quần áo bóng đá không logo mới nằm trong bộ sưu tập PTT với đôi giày bóng đá Mira Ultra, sự kết hợp giữa Mira x Phan Tuấn Tài, chàng tiền vệ điển trai trong màu áo ĐTVN.',
                'ma_danh_muc_id' => 7,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QL1',
                'ten_san_pham' => 'Quần lửng Egan Ms03' ,
                'slug_san_pham' => 'quan-lung-egan-ms03' ,
                'so_luong' => 100,
                'gia' => 199000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/191121115445598/quan-short-the-thao-egan-ms03-yousport-xanh-1.jpg,https://cdn.yousport.vn/Media/Products/191121115445598/quan-short-the-thao-egan-ms03-yousport-xanh-2.jpg,https://cdn.yousport.vn/Media/Products/191121115445598/quan-short-the-thao-egan-ms03-yousport-xanh-3.jpg',
                'chi_tiet' => ' Quần lửng Egan là mẫu quần thể thao nam đầy chất lượng đến từ thương hiệu CP Sport.

                Form quần thiết kế đơn giản nhưng không kém phần năng động, tạo sự tự tin cho người mặc.
                Thiết túi với khóa kéo cao cấp, tiện dụng
                Phù hợp cho những lúc tập gym hay hoạt động thể chất ngoài trời lẫn hoạt động thường ngày.',
                'ma_danh_muc_id' => 8,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QL2',
                'ten_san_pham' => 'Quần lửng Wilwol' ,
                'slug_san_pham' => 'quan-lung-wilwol' ,
                'so_luong' => 100,
                'gia' => 132000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/120722122208957/quan-short-the-thao-thoi-trang-ngan-wilwol-yousport-xanh-den-1.jpg,https://cdn.yousport.vn/Media/Products/120722122208957/quan-short-the-thao-thoi-trang-ngan-wilwol-yousport-xanh-den-2.jpg,',
                'chi_tiet' => 'Với phong cách thời trang thể thao thoải mái đang rất được ưa chuộng hiện nay thì Quần lửng Wilwol là một trong những sản phẩm rất được ưa chuộng.',
                'ma_danh_muc_id' => 8,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QL3',
                'ten_san_pham' => 'Quần Short Wilwol' ,
                'slug_san_pham' => 'quan-short-wilwol' ,
                'so_luong' => 100,
                'gia' => 160000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/120722121959982/dsc01557.jpg',
                'chi_tiet' => 'Họa tiết Geometry Blue hình học hiện đại, độc quyền trên nền chất liệu cao cấp Woven MicroStrech (90%microfiber - 10%spandex) bề mặt mịn đẹp sang trọng, co giãn thoải mái, thấm hút mồ hôi và kháng khuẩn cực tốt với công nghệ Maxxcool & Germlock cho người mặc luôn thoải mái, tự tin.
                Thiết kế hai túi Flat-Front trước sâu rộng chứa đựng thuận tiện các vật dụng cá nhân cần thiết, tiện lợi.
                Lưng trong được in Silicon giúp cố định quần và giữ áo tốt hơn khi sơ vin.
                Form Slim-Fit hiện đại, gọn gàng – đường may tỉ mỉ chỉn chu như may đo.
                Gia cố chắc chắn các chi tiết bằng máy bartack chuyên dụng.
                Quần mang phong cách khoẻ khoắn, thể thao nhưng vẫn giữ được sự sang trọng.',
                'ma_danh_muc_id' => 8,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ma_san_pham'  => 'QL4',
                'ten_san_pham' => 'Quần Pro Combat Ngắn' ,
                'slug_san_pham' => 'quan-pro-combat-ngan' ,
                'so_luong' => 100,
                'gia' => 99000,
                'gia_khuyen_mai' => 0,

                'hinh_anh' =>'https://cdn.yousport.vn/Media/Products/290521024557660/484a55f9b835447d87fea3ca144ce05a.jpg',
                'chi_tiet' => 'Chất liệu: 95% polyester 5% spandex.
                Quần được dệt may từ chất liệu vải thun cao cấp, đường may bền chắc.
                Bề mặt vải mềm mại, dễ giặt sạch, thoát mồ hôi nhanh chóng, giải phóng sự oi bức khi vận động.
                Form body co giãn, ôm nhẹ nhàng theo đường nét cơ thể.
                Giúp hấp thụ, phân tán và giảm bớt các lực tác động có hại lên cơ bắp, xương & khớp trong quá trình vận động.
                Loại bỏ tình trạng căng cơ, chuột rút, loại bỏ mồ hôi trên bề mặt da giúp giảm tình trạng viêm da, viêm lỗ chân lông.
                Quần Pro Combat ngắn được thiết kế theo đúng form chuẩn của nam giới Việt Nam.',
                'ma_danh_muc_id' => 8,
                'is_open' => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now(),
            ],
            // [
            //     'ma_san_pham'  => 'QL5',
            //     'ten_san_pham' => '' ,
            //     'slug_san_pham' => '' ,
            //     'so_luong' => 100,
            //     'gia' => 495000,
            //     'gia_khuyen_mai' => 0,
            //
            //     'hinh_anh' =>'',
            //     'chi_tiet' => '',
            //     'ma_danh_muc_id' => 8,
            //     'is_open' => 1,
            //     'created_at'    => Carbon::now()->subDays(2),
            //     'updated_at'    => Carbon::now(),
            // ],
            // [
            //     'ma_san_pham'  => 'QL6',
            //     'ten_san_pham' => '' ,
            //     'slug_san_pham' => '' ,
            //     'so_luong' => 100,
            //     'gia' => 495000,
            //     'gia_khuyen_mai' => 0,
            //
            //     'hinh_anh' =>'',
            //     'chi_tiet' => '',
            //     'ma_danh_muc_id' => 8,
            //     'is_open' => 1,
            //     'created_at'    => Carbon::now()->subDays(2),
            //     'updated_at'    => Carbon::now(),
            // ],

        ]);
    }
}
