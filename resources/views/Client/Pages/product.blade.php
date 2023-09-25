@extends('Client.Share.master')
@section('content')
    <!-- Start Page Title -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container">
            <!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>{{ $sanPhamdetail->ten_san_pham }}</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $sanPhamdetail->ten_san_pham }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- End Page Title -->

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    @php
                        $hinh_anh = explode(',', $sanPhamdetail->hinh_anh);
                    @endphp
                    <div class="product-image">
                        @foreach ($hinh_anh as $key => $value)
                            @if ($key == 0)
                                <div class="product_img_box">
                                    <img id="product_img" src='{{ $value }}' data-zoom-image="" alt="" />
                                    <a href="#" class="product_img_zoom" title="Zoom">
                                        <span class="linearicons-zoom-in"></span>
                                    </a>
                                </div>

                                <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4"
                                    data-slides-to-scroll="1" data-infinite="false">
                                    @foreach ($hinh_anh as $k => $v)
                                        <div class="item_1">
                                            <a href="#" class="product_gallery_item active"
                                                data-image="{{ $v }}" data-zoom-image="{{ $v }}">
                                                <img src="{{ $v }}" alt="" />
                                            </a>

                                        </div>
                                    @endforeach


                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="pr_detail">
                        <div class="product_description">
                            <h4 class="product_title"><a href="#">{{ $sanPhamdetail->ten_san_pham }}</a></h4>

                            @if ($sanPhamdetail->gia_khuyen_mai == 0)
                                <span class="price">{{ number_format($sanPhamdetail->gia, 0) }}đ</span>
                            @else
                                <div class="product_price">
                                    <span class="price">{{ number_format($sanPhamdetail->gia_khuyen_mai, 0) }}đ</span>
                                    <del>{{ number_format($sanPhamdetail->gia, 0) }} đ</del>

                                    <div class="on_sale">
                                        <span>{{ number_format((($sanPhamdetail->gia - $sanPhamdetail->gia_khuyen_mai) / $sanPhamdetail->gia) * 100), 2 }}%
                                            Off</span>
                                    </div>
                                </div>
                            @endif
                            <div class="rating_wrap">
                                <span class="">
                                    @php
                                        $random = random_int(3, 5);
                                    @endphp
                                    @for ($i = 0; $i < $random; $i++)
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z"
                                                fill="#FFAE00" />
                                        </svg>
                                    @endfor
                                    @for ($i = 0; $i < 5 - $random; $i++)
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z"
                                                fill="#B2B2B2" />
                                        </svg>
                                    @endfor
                                </span>
                                <span class="rating_num">({{ random_int(30, 100) }})</span>
                            </div>
                            <div class="pr_desc">
                                <p>{{ substr($sanPhamdetail->chi_tiet, 0, 90) . '...' }}</p>
                            </div>
                            <div class="product_sort_info">
                                <ul>
                                    <li><i class="linearicons-shield-check"></i> Bảo hành 1 năm</li>
                                    <li><i class="linearicons-sync"></i> Chính sách đổi trả trong 30 ngày</li>
                                    <li><i class="linearicons-bag-dollar"></i> Tiền mặt khi giao hàng có sẵn</li>
                                </ul>
                            </div>

                        </div>
                        <hr />
                        <div class="cart_extra">
                            {{-- <div class="cart-product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="quantity" value="1" title="Qty" class="qty"
                                            size="4">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </div> --}}
                        </div>
                        <div class="cart_btn">
                            @if (Auth::guard('customer')->check())
                                <button class="btn btn-fill-out btn-addtocart addToCart" data-id="{{ $sanPhamdetail->id }}"
                                    type="button"><i class="icon-basket-loaded"></i>Mua hàng</button>
                            @else
                                <button class="btn btn-fill-out btn-addtocart" data-toggle="modal" data-target="#loginModal"
                                    type="button"><i class="icon-basket-loaded"></i>Mua
                                    hàng</button>
                            @endif
                        </div>
                        <hr />
                        <ul class="product-meta">
                            <li>SKU: <a href="#">{{ $sanPhamdetail->ma_san_pham }}</a></li>
                            <li>Category: <a
                                    href="/category/{{ $sanPhamdetail->slug_danh_muc }}-post-{{ $sanPhamdetail->ma_danh_muc_id }}">{{ $sanPhamdetail->ten_danh_muc }}</a>
                            </li>
                            <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#"
                                    rel="tag">printed</a> </li>
                        </ul>

                        <div class="product_share">
                            <span>Share:</span>
                            <ul class="social_icons">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="large_divider clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description"
                                    role="tab" aria-controls="Description" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info"
                                    role="tab" aria-controls="Additional-info" aria-selected="false">Additional
                                    info</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab"
                                    aria-controls="Reviews" aria-selected="false">Reviews (2)</a>
                            </li> --}}
                        </ul>
                        <div class="tab-content shop_info_tab">
                            <div class="tab-pane fade show active" id="Description" role="tabpanel"
                                aria-labelledby="Description-tab">
                                <p>{{ $sanPhamdetail->chi_tiet }}</p>

                            </div>
                            <div class="tab-pane fade" id="Additional-info" role="tabpanel"
                                aria-labelledby="Additional-info-tab">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Capacity</td>
                                        <td>5 Kg</td>
                                    </tr>
                                    <tr>
                                        <td>Color</td>
                                        <td>Black, Brown, Red,</td>
                                    </tr>
                                    <tr>
                                        <td>Water Resistant</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Material</td>
                                        <td>Artificial Leather</td>
                                    </tr>
                                </table>
                            </div>
                            {{-- <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                <div class="comments">
                                    <h5 class="product_tab_title">2 Review For <span>Blue Dress For Woman</span></h5>
                                    <ul class="list_none comment_list mt-4">
                                        <li>
                                            <div class="comment_img">
                                                <img src="assets/images/user1.jpg" alt="user1" />
                                            </div>
                                            <div class="comment_block">
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%"></div>
                                                    </div>
                                                </div>
                                                <p class="customer_meta">
                                                    <span class="review_author">Alea Brooks</span>
                                                    <span class="comment-date">March 5, 2018</span>
                                                </p>
                                                <div class="description">
                                                    <p>Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean
                                                        sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                                        nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="comment_img">
                                                <img src="assets/images/user2.jpg" alt="user2" />
                                            </div>
                                            <div class="comment_block">
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:60%"></div>
                                                    </div>
                                                </div>
                                                <p class="customer_meta">
                                                    <span class="review_author">Grace Wong</span>
                                                    <span class="comment-date">June 17, 2018</span>
                                                </p>
                                                <div class="description">
                                                    <p>It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout. The point of
                                                        using Lorem Ipsum is that it has a more-or-less normal distribution
                                                        of letters</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="review_form field_form">
                                    <h5>Add a review</h5>
                                    <form class="row mt-3">
                                        <div class="form-group col-12">
                                            <div class="star_rating">
                                                <span data-value="1"><i class="far fa-star"></i></span>
                                                <span data-value="2"><i class="far fa-star"></i></span>
                                                <span data-value="3"><i class="far fa-star"></i></span>
                                                <span data-value="4"><i class="far fa-star"></i></span>
                                                <span data-value="5"><i class="far fa-star"></i></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input required="required" placeholder="Enter Name *" class="form-control"
                                                name="name" type="text">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input required="required" placeholder="Enter Email *" class="form-control"
                                                name="email" type="email">
                                        </div>

                                        <div class="form-group col-12">
                                            <button type="submit" class="btn btn-fill-out" name="submit"
                                                value="Submit">Submit Review</button>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="small_divider"></div>
                    <div class="divider"></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="heading_s1">
                        <h3>Releted Products</h3>
                    </div>
                    {{-- <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20"
                            data-responsive='{"0":{"items": "1"}, "1":{"items": "2"}, "2":{"items": "3"}, "3":{"items": "4"}, "3":{"items": "4"}, "3":{"items": "4"}, "3":{"items": "4"}}'>
                            @foreach ($sanPhamDel as $value)
                                <div class="item">
                                    <div class="product">
                                        <div class="product_img">
                                            <a href="/product/{{ $value->slug_san_pham }}">
                                                <img src="{{ $value->hinh_anh_chinh }}" alt="">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    @if (Auth::guard('customer')->check())
                                                        <li class="add-to-cart"><a class="addToCart"
                                                                data-id="{{ $value->id }}"><i
                                                                    class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    @else
                                                        <li class="add-to-cart"><a data-toggle="modal"
                                                                data-target="#loginModal"><i
                                                                    class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    @endif

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a
                                                    href="/product/{{ $value->slug_san_pham }}">{{ $value->ten_san_pham }}</a>
                                            </h6>
                                            @if ($value->gia_khuyen_mai == 0)
                                                <div class="product_price">
                                                    <span class="price">{{ number_format($value->gia) }} đ</span>

                                                </div>
                                            @else
                                                <div class="product_price">
                                                    <span class="price">{{ number_format($value->gia_khuyen_mai, 0) }}
                                                        đ</span>
                                                    <del>{{ number_format($value->gia) }} đ</del>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> --}}
                    <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20"
                        data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        @foreach ($sanPhamDel as $value)
                            <div class="item">
                                <div class="product">
                                    @php
                                        $data = [0, 1, 2, 3];
                                        $randomIndex = array_rand($data);
                                    @endphp
                                    @if ($randomIndex == 0)
                                        <span class="pr_flash bg-danger">Hot</span>
                                    @elseif($randomIndex == 1)
                                        <span class="pr_flash">New</span>
                                    @elseif ($randomIndex == 2)
                                        <span class="pr_flash bg-success">Sale</span>
                                    @else
                                    @endif
                                    <div class="product_img">
                                        <a href="/product/{{ $value->id }}">
                                            <img src="{{ explode(",",$value->hinh_anh)[0] }}" alt="product_img1">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">

                                                @if (Auth::guard('customer')->check())
                                                    <li class="add-to-cart"><a class="addToCart"
                                                            data-id="{{ $value->id }}"><i
                                                                class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                @else
                                                    <li class="add-to-cart"><a data-toggle="modal"
                                                            data-target="#loginModal"><i class="icon-basket-loaded"></i>
                                                            Add To Cart</a></li>
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
                                                <span class="price">{{ number_format($value->gia_khuyen_mai, 0) }}
                                                    đ</span>
                                                <del>{{ number_format($value->gia, 0) }} đ</del>

                                            </div>
                                        @endif
                                        <div class="rating_wrap">
                                            <div class="star-rating">
                                                @php
                                                    $random = random_int(3, 5);
                                                @endphp
                                                @for ($i = 0; $i < $random; $i++)
                                                    <svg width="16" height="15" viewBox="0 0 16 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z"
                                                            fill="#FFAE00" />
                                                    </svg>
                                                @endfor
                                                @for ($i = 0; $i < 5 - $random; $i++)
                                                    <svg width="16" height="15" viewBox="0 0 16 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z"
                                                            fill="#B2B2B2" />
                                                    </svg>
                                                @endfor
                                            </div>

                                            <span class="rating-count ms-2">({{ random_int(30, 100) }})</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus
                                                blandit
                                                massa
                                                enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="assets/images/product_img1.jpg" alt="product_img1">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i>
                                                    Add To Cart</a></li>
                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i
                                                        class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">{{$value->ten_san_pham}}</a>
                                    </h6>
                                    <div class="product_price">
                                        <span class="price"></span>
                                        <del>$55.25</del>
                                        <div class="on_sale">
                                            <span>35% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <span class="rating_num">(21)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa
                                            enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#87554B"></span>
                                            <span data-color="#333333"></span>
                                            <span data-color="#DA323F"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- END SECTION SHOP -->
@endsection
@include('Client.Share.model')
