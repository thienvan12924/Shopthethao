<header class="header_wrap fixed-top header_with_topbar">
    @include('Client.Share.top')
    <div class="bottom_header dark_skin main_menu_uppercase">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="/">
                    <img class="logo_light" src="/assets_client/assets/images/logo_light.png" alt="logo" />
                    <img class="logo_dark" src="/assets_client/assets/images/logo_dark.png" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="dropdown">
                            <a class="nav-link active" href="/">Trang chủ</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Blog</a>
                            <div class="dropdown-menu">
                                <ul>
                                    @foreach ($chuyen_muc as $key => $value)
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="/blog-list/{{ $value->id }}">{{ $value->ten_chuyen_muc }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </li>
                        @foreach ($danhMuc as $value)
                            @if ($value->id_danh_muc_cha == 0)
                                <li class="dropdown">
                                    <a class="dropdown-toggle nav-link"
                                        href="/category/{{ $value->slug_danh_muc }}-post-{{ $value->id }}">{{ $value->ten_danh_muc }}</a>
                                    <div class="dropdown-menu dropdown-reverse">
                                        @foreach ($danhMuc as $v)
                                            @if ($value->id == $v->id_danh_muc_cha)
                                                <ul>
                                                    <li>
                                                        <ul>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="/category/{{ $v->slug_danh_muc }}-post-{{ $v->id }}">{{ $v->ten_danh_muc }}</a>
                                                            </li>

                                                        </ul>
                                                    </li>

                                                </ul>
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>


                <div>
                    <ul class="navbar-nav attr-nav align-items-center" id="cartMini">
                        @if (Auth::guard('customer')->check())
                            <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#"
                                    data-toggle="dropdown"><i class="linearicons-cart"></i></a>
                                <div class="cart_box dropdown-menu dropdown-menu-right">
                                    <ul class="cart_list" v-for="(value, key) in listCart">
                                        <li>
                                            <a href="#" class="item_remove"><i class="ion-close"
                                                    v-on:click="remove(value.id)"></i></a>
                                            <a href="#"><img v-bind:src="stringToArray(value.hinh_anh)[0]"
                                                    alt="cart_thumb1">@{{ value.ten_san_pham }}</a>
                                            <span class="cart_quantity">@{{ value.so_luong_mua }}<span class="cart_amount">
                                                    <span class="price_symbole"> Giá</span>
                                                    <template v-if="value.gia_khuyen_mai==0">
                                                        <td class="product-subtotal" data-title="Total">
                                                            @{{ formatPrice(donGia(value.gia) * value.so_luong_mua) }} đ
                                                        </td>
                                                    </template>
                                                    <template v-else>
                                                        <td class="product-subtotal" data-title="Total">
                                                            @{{ formatPrice(donGia(value.gia_khuyen_mai) * value.so_luong_mua) }} đ
                                                        </td>
                                                    </template>
                                        </li>
                                    </ul>
                                    <div class="cart_footer">
                                        <p class="cart_buttons"><a href="/client/cart"
                                                class="btn btn-fill-line rounded-0 view-cart">Xem Giỏ Hàng</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>

            </nav>
        </div>
    </div>
</header>
@include('Client.share.js')

<script>
    new Vue({
        el: '#cartMini',
        data: {
            listCart: [],
        },
        created() {
            this.loadTable();
        },
        methods: {
            remove(id) {
                axios
                    .get('/client/cart/remove/' + id)
                    .then((res) => {
                        //toastr.success("Đã xóa sản phẩm khỏi giỏ hàng");
                        this.loadTable();
                    });
            },
            loadTable() {
                axios
                    .get('/client/cart/data')
                    .then((res) => {
                        this.listCart = res.data.chiTiet;
                    });
            },

            totalRequest() {
                var total = 0;
                for (var i in this.listCart) {
                    total = total + this.listCart[i].thanh_tien;
                }
                return total;
            },

            donGia(x, y) {
                if (x == 0) {
                    return y;
                } else {
                    return x;
                }
            },
            thanhTien(v) {
                if (v.gia_khuyen_mai == 0) {
                    return this.donGia(v.gia) * v.so_luong_mua;
                } else {
                    return this.donGia(v.gia_khuyen_mai) * v.so_luong_mua;
                }
            },

            formatPrice(value) {
                let val = (value / 1).toFixed(0).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            },

            count() {
                count = 0;
                for (var i in this.listCart) {
                    count += 1;
                }
                return count;
            },
            stringToArray(str) {
                    return str.split(",");
                },
        },
    });
</script>
<!-- END HEADER -->
@include('Client.Share.model')
