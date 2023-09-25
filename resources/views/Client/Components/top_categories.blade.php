<!-- START SECTION CATEGORIES -->
<div class="section small_pb small_pt">
	<div class="container">
    	<div class="row justify-content-center">
			<div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Top Categories</h2>
                </div>
            </div>
		</div>
        <div class="row align-items-center">
            <div class="col-12">
                @foreach ($top5DanhMuc as $key=>$value)
                <div class="cat_slider cat_style1 mt-4 mt-md-0 carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{{$key}}'>
                    @foreach ($top5DanhMuc as $k=>$v)
                    <div class="item">
                        <div class="categories_box">
                            <a href="/category/{{ $v->id }}" >
                                <img src="{{$v->hinh_anh}}" alt="cat_img1" />
                                <span>{{$v->ten_danh_muc}}</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CATEGORIES -->
