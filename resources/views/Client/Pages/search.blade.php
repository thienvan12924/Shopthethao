@extends('Client.Share.master')
@section('content')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container">
            <!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Danh sách sản phẩm</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->
    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="row shop_container loadmore" data-item="8" data-item-show="4"
                        data-finish-message="No More Item to Show" data-btn="Load More">
                        @foreach ($products as $value)
                            <div class="col-lg-3 col-md-4 col-6 grid_item">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="/product/{{ $value->id }}">
                                            <img style="height: 200px;" src="{{ explode(",",$value->hinh_anh)[0] }}" alt="product_img1">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">

                                                @if (Auth::guard('customer')->check())
                                                        <li class="add-to-cart"><a  class="addToCart" data-id="{{ $value->id }}"><i
                                                            class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    @else
                                                    <li class="add-to-cart"><a data-toggle="modal" data-target="#loginModal"><i
                                                        class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    @endif

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">

                                        <h6 class="product_title"><a
                                            href="/product/{{ $value->slug_san_pham }}-post-{{ $value->id }}">{{ $value->ten_san_pham }}</a>
                                        </h6>
                                        @if ($value->gia_khuyen_mai == 0)
                                        <span class="price">{{ number_format($value->gia, 0) }} đ</span>
                                        @else
                                        <div class="product_price">
                                            <span class="price">{{ number_format($value->gia_khuyen_mai, 0) }} đ</span>
                                            <del>{{ number_format($value->gia, 0) }} đ</del>

                                        </div>
                                        @endif


                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit
                                                massa
                                                enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
@endsection
