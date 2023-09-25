<!-- START SECTION SHOP -->
<div class="section small_pt pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2>Exclusive Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-style1">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        @foreach ($loaiSP as $key => $value)
                            <li class="nav-item">
                                <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="arrival-tab" data-toggle="tab"
                                    href="#arrival_{{ $key }}" role="tab" aria-controls="arrival"
                                    aria-selected="true">{{ $value->ten_danh_muc }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content">
                    @foreach ($loaiSP as $key => $value)
                        <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="arrival_{{ $key }}"
                            role="tabpanel" aria-labelledby="arrival-tab">
                            <div class="row shop_container">
                                @foreach ($sanPham as $key_sp => $value_sp)
                                    @if ($value_sp->id_cha == $value->id)
                                        @php
                                            $data = [0, 1, 2, 3];
                                            $randomIndex = array_rand($data);
                                        @endphp

                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="product">
                                                @if ($randomIndex == 0)
                                                    <span class="pr_flash bg-danger">Hot</span>
                                                @elseif($randomIndex == 1)
                                                    <span class="pr_flash">New</span>
                                                @elseif ($randomIndex == 2)
                                                    <span class="pr_flash bg-success">Sale</span>
                                                @else
                                                @endif

                                                <div class="product_img" style="
                                                height: 200px;
                                            ">
                                                    <a href="shop-product-detail.html">
                                                        <img style="height: 200px;"
                                                            src="{{ explode(",",$value_sp->hinh_anh)[0] }}" alt="product_img1">
                                                    </a>
                                                    <div class="product_action_box">
                                                        <ul class="list_none pr_action_btn">
                                                            @if (Auth::guard('customer')->check())
                                                                <li class="add-to-cart"><a class="addToCart"
                                                                        data-id="{{ $value_sp->id }}"><i
                                                                            class="icon-basket-loaded"></i>Mua hàng</a>
                                                                </li>
                                                            @else
                                                                <li class="add-to-cart"><a data-toggle="modal"
                                                                        data-target="#loginModal"><i
                                                                            class="icon-basket-loaded"></i>Mua hàng</a>
                                                                </li>
                                                            @endif

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_title"><a
                                                            href="/product/{{ $value_sp->slug_san_pham }}-post-{{ $value_sp->id }}">{{ $value_sp->ten_san_pham }}</a>
                                                    </h6>
                                                    @if ($value_sp->gia_khuyen_mai == 0)
                                                        <span class="price">{{ number_format($value_sp->gia, 0) }}
                                                            đ</span>
                                                    @else
                                                        <div class="product_price">
                                                            <span
                                                                class="price">{{ number_format($value_sp->gia_khuyen_mai, 0) }}
                                                                đ</span>
                                                            <del>{{ number_format($value_sp->gia, 0) }} đ</del>
                                                            <div class="on_sale">
                                                                <span>{{ number_format((($value_sp->gia - $value_sp->gia_khuyen_mai) / $value_sp->gia) * 100), 2 }}%
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

                                                        <span
                                                            class="rating-count ms-2">({{ random_int(30, 100) }})</span>
                                                    </div>
                                                    <div class="pr_desc">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                            Phasellus blandit massa enim. Nullam id varius nunc id
                                                            varius
                                                            nunc.</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
