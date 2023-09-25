<div class="section pb_20">
    <div class="container">
        <div class="row">
            @foreach ($top4DanhMuc as $value)
                <div class="col-md-6">
                    <div class="single_banner">
                        <img src="{{ explode(",",$value->hinh_anh)[0] }}" alt="shop_banner_img1"  style="
                        height: 240px;
                    "/>
                        <div class="single_banner_info">
                            {{-- <h5 class="single_bn_title1">Super Sale</h5> --}}
                            <h3 class="single_bn_title">{{ $value->ten_danh_muc }}</h3>
                            <a href="/category/{{ $value->slug_danh_muc }}-post-{{ $value->id }}"
                                class="btn btn-fill-out rounded-0">Xem Thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
