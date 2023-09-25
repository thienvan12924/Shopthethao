<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active background_bg"
                data-img-src="https://file.hstatic.net/1000398692/article/giay-da-bong-zocker-space-tien-phong-but-pha_8d3300abe18e4391b03cf4e558b4729f.jpg">
                <div class="banner_slide_content">
                    <div class="container">
                        <!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                    <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft"
                                        data-animation-delay="0.5s"></h5>
                                    <h2 class="staggered-animation" data-animation="slideInLeft"
                                        data-animation-delay="1s"></h2>
                                     <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase"
                                            href="shop-left-sidebar.html" data-animation="slideInLeft"
                                            data-animation-delay="1.5s">Shop Now</a> 
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>

            @foreach ($slide as $value)
            <div class="carousel-item background_bg" data-img-src="{{$value->hinh_anh}}">
                <div class="banner_slide_content">
                    <div class="container">
                        <!-- STRART CONTAINER -->
                        {{-- <div class="row">
                            <div class="col-lg-6">
                                <div class="banner_content overflow-hidden">
                                    <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft"
                                        data-animation-delay="0.5s">50% off in all
                                        products</h5>
                                    <h2 class="staggered-animation" data-animation="slideInLeft"
                                        data-animation-delay="1s">Man Fashion</h2>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase"
                                        href="shop-left-sidebar.html" data-animation="slideInLeft"
                                        data-animation-delay="1.5s">Shop Now</a>
                                </div>
                            </div>
                        </div> --}}
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i
                class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i
                class="ion-chevron-right"></i></a>
    </div>
</div>
