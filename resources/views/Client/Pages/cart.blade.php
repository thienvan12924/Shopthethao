@extends('Client.share.master')
@section('content')
    <div id="app">
        <!-- START SECTION BREADCRUMB -->
        <div class="breadcrumb_section bg_gray page-title-mini">
            <div class="container">
                <!-- STRART CONTAINER -->
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-title">
                            <h1>Giỏ Hàng</h1>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb justify-content-md-end">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Giỏ Hàng</li>
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
                        <div class="table-responsive shop_cart_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product"></th>
                                        <th class="product">Hình ảnh</th>
                                        <th class="product">Sản Phẩm</th>
                                        <th class="product">Giá</th>
                                        <th class="product">Số lượng</th>
                                        <th class="product">Tổng tiền</th>
                                        <th class="product">Xóa</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="(value, key) in listCart">
                                        <td><input type="checkbox" class="form-control" v-model="value.check" /></td>

                                        <td class="product-thumbnail"><a><img v-bind:src="stringToArray(value.hinh_anh)[0]"></a></td>
                                        <td class="product-name" data-title="Product"><a target="_blank"
                                                :href="'/product/' + value.slug_san_pham + '-post-' + value.id_san_pham">@{{ value.ten_san_pham }}</a>
                                        </td>
                                        <template v-if="value.gia_khuyen_mai==0">
                                            <td class="product-price" data-title="Price">@{{ formatPrice(donGia(value.gia)) }} đ</td>
                                        </template>
                                        <template v-else>
                                            <td class="product-price" data-title="Price">@{{ formatPrice(donGia(value.gia_khuyen_mai)) }} đ</td>
                                        </template>

                                        <td>
                                            <input v-on:change="update(value)" v-model="value.so_luong_mua" type="number"
                                                class="form-control text-center" style="margin-left: 50px; width: 160px;" />
                                            {{-- <input type="number" v-on:change="update(value)" v-model="value.so_luong_mua" class="form-control" /> --}}
                                        </td>
                                        <template v-if="value.gia_khuyen_mai==0">
                                            <td class="product-subtotal" data-title="Total">@{{ formatPrice(donGia(value.gia) * value.so_luong_mua) }} đ</td>
                                        </template>
                                        <template v-else>
                                            <td class="product-subtotal" data-title="Total">@{{ formatPrice(donGia(value.gia_khuyen_mai) * value.so_luong_mua) }} đ</td>
                                        </template>

                                        <td class="product-remove"><a><i class="ti-close"
                                                    v-on:click="remove(value.id)"></i></a></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider"></div>
                        <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading_s1">
                            <h6> Xác Nhận Thông tin địa chỉ nhận hàng</h6>
                        </div>

                        <div class="form-group">
                       <input required="required" placeholder="Họ và tên"
                                class="form-control" v-model="ship_fullname" type="text" >
                        </div>
                        <div class="form-group">
                       <input required="required" placeholder="Số điện thoại"
                                class="form-control" v-model="ship_phone" type="number">
                        </div>
                        <div class="form-group">
                       <input required="required" placeholder="Địa chỉ" class="form-control"
                                v-model="ship_address" type="text" >

                        </div>
                        <div class="payment_method">
                            <div class="heading_s1">
                                <h6>Phương Thức Thanh Toán</h6>
                            </div>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" id="option3" value="cash" v-model="paymentMethod">
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" type="radio" name="payment_option" id="option4" value="cod" v-model="paymentMethod">
                                    <label class="form-check-label" for="option4">Thanh toán khi nhận hàng</label>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" type="radio" name="payment_option" id="option5" value="vnpay" v-model="paymentMethod">
                                    <label class="form-check-label" for="option5">Thanh toán VNPAY</label>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">Tổng Tiền</td>
                                        <td class="cart_total_amount"><strong>@{{ formatPrice(totalRequest()) }} VNĐ</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-fill-out" v-on:click="checkPaymentAndCreateBill()">Đặt hàng</a>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="heading_s1">
                                <h4>Thông tin tài khoản</h4>
                            </div>
                            <div class="table-responsive order_table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Họ và tên</td>
                                            <td><h6>@{{dataAcc.ho_ten}}</h6></td>
                                        </tr>
                                        <tr>
                                            <td>Số Điện Thoại</td>
                                            <td><h6>@{{dataAcc.so_dien_thoai}}</h6></td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td><h6>@{{dataAcc.dia_chi}}</h6></td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                listCart        :   [],
                ship_phone      :   '',
                ship_fullname   :   '',
                ship_address    :   '',
                dataAcc         :   {},
                billId          :   0,
                paymentMethod   :   '',
                // check           :   '',
            },
            created() {
                this.getData();
                this.getMyacc();
            },
            methods: {
                getMyacc(){
                    axios
                        .get('/client/myaccount')
                        .then((res) =>{
                            this.dataAcc = res.data.data;
                            this.ship_fullname  = this.dataAcc.ho_ten;
                            this.ship_phone     = this.dataAcc.so_dien_thoai;
                            this.ship_address   = this.dataAcc.dia_chi;
                        });
                },
                getData() {
                    axios
                        .get('/client/cart/data')
                        .then((res) => {
                            this.listCart = res.data.chiTiet;
                        });
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
                totalRequest() {
                    var total = 0;
                    for (var i in this.listCart) {
                        if (this.listCart[i]['check'] == true) {
                            total = total + this.thanhTien(this.listCart[i]);
                        }
                    }
                    return total;
                },
                remove(id) {
                    axios
                        .get('/client/cart/remove/' + id)
                        .then((res) => {
                            toastr.success("Đã xóa sản phẩm khỏi giỏ hàng");
                            this.getData();
                        });
                },
                update(x) {
                    axios
                        .post('/client/cart/update', x)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                                this.getData();
                            } else {
                                toastr.warning(res.data.message);
                                this.getData();
                            }

                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                            x.so_luong_mua = 1;
                        });
                },
                stringToArray(str) {
                    return str.split(",");
                },
                checkPaymentAndCreateBill() {
                    if (!this.paymentMethod) {
                        toastr.error("Vui lòng chọn một phương thức thanh toán");
                    } else {
                        this.createBill();
                    }
                },
                createBill() {
                    var payload = {
                        ship_phone    : this.ship_phone,
                        ship_fullname : this.ship_fullname,
                        ship_address  : this.ship_address,
                        list_cart     : this.listCart,
                    };
                    // console.log(payload);
                    axios
                        .post('/client/bill/create', payload)
                        .then((res) => {
                            toastr.success('Đã tạo đơn hàng thành công!');
                            this.billId = res.data.bill_id;
                            // window.location.replace("/vnpay/" + this.billId);
                            if (this.paymentMethod == 'vnpay') {
                                window.location.replace("/vnpay/" + this.billId);
                            } else {
                               window.location.reload();
                            }
                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });

                },
                formatPrice(value) {
                    let val = (value / 1).toFixed(0).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                },
            },
        });
    </script>
@endsection
