<!-- START SECTION SHOP -->
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2>Best Disscounts</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach ($sanPhamGiam as $key => $value)
                    <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true"
                        data-dots="false" data-nav="true" data-margin="20" data-responsive='{{ $key }}'>
                        @foreach ($sanPhamGiam as $k => $v)
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

                                        <a href="shop-product-detail.html">
                                            <img src="{{ explode(",",$v->hinh_anh)[0] }}" alt="product_img1">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                {{-- <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i>
                                                Add To Cart</a></li> --}}
                                                @if (Auth::guard('customer')->check())
                                                    <li class="add-to-cart"><a class="addToCart"
                                                            data-id="{{ $v->id }}"><i
                                                                class="icon-basket-loaded"></i>Mua hàng</a></li>
                                                @else
                                                    <li class="add-to-cart"><a data-toggle="modal"
                                                            data-target="#loginModal"><i
                                                                class="icon-basket-loaded"></i>Mua hàng</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a
                                                href="/product/{{ $v->slug_san_pham }}-post-{{ $v->id }}">{{ $v->ten_san_pham }}</a>
                                        </h6>
                                        @if ($v->gia_khuyen_mai == 0)
                                            <span class="price">{{ number_format($v->gia, 0) }} đ</span>
                                        @else
                                            <div class="product_price">
                                                <span class="price">{{ number_format($v->gia_khuyen_mai, 0) }} đ</span>
                                                <del>{{ number_format($v->gia, 0) }} đ</del>
                                                <div class="on_sale">
                                                    <span>{{ number_format((($v->gia - $v->gia_khuyen_mai) / $v->gia) * 100), 2 }}%
                                                        Off</span>
                                                </div>
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
                                                blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
