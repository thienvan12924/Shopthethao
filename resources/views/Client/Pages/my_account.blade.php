@extends('Client.Share.master')
@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>{{ Auth::guard('customer')->user()->ho_ten }}</h1>
                    <div class="text-muted">{{ Auth::guard('customer')->user()->email }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>

                    <li class="breadcrumb-item active">{{ Auth::guard('customer')->user()->ho_ten }}</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- START SECTION SHOP -->
<div id="app">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="dashboard_menu">
                        <ul class="nav nav-tabs flex-column" role="tablist">
                            {{-- <li class="nav-item">
                            <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Dashboard</a>
                        </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab"
                                    aria-controls="orders" aria-selected="false"><i
                                        class="ti-shopping-cart-full"></i>Đặt hàng</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail"
                                    role="tab" aria-controls="account-detail" aria-selected="true"><i
                                        class="ti-id-badge"></i>Tài Khoản</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
                                    aria-controls="address" aria-selected="true"><i class="ti-lock"></i>Mật khẩu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout"><i class="ti-back-left"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content dashboard_content">

                        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="accordion br-sm" id="accordionOrdersExample">
                                <div class="card-header">
                                    <h3>Đơn đặt hàng </h3>
                                </div>

                                <template v-for="(value, key) in listBill">
                                    <template v-if="value.is_payment == 2">
                                        <div class="card card-fill mb-3 shadow-sm rounded">
                                            <div class="card-header bg-white py-4 p-2 p-md-4 pointer" id="heading-1"
                                                role="button" data-toggle="collapse" v-bind:data-target="'#a'+key"
                                                aria-expanded="true" v-bind:aria-controls="'a'+key">
                                                <div class="row">
                                                    <div class="col-md-3 text-nowrap">
                                                        <i class="icon icon-tag mr-3"></i>
                                                        <span>@{{ value.bill_name }}</span>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-nowrap">
                                                        <i class="icon icon-clock mr-3"></i>
                                                        <span>@{{ formatDate(value.created_at) }}</span>
                                                    </div>
                                                    <div class="col-6 col-md-2 text-right text-nowrap">
                                                        <span>@{{ formatPrice(value.bill_total) }} VNĐ</span>
                                                    </div>

                                                    <div class="col-md-2 text-nowrap text-center">
                                                        <small v-if="value.is_payment == 2"
                                                            class="p-1 bg-light-danger rounded-sm text-danger  btn-block">
                                                            Đã hủy
                                                        </small>

                                                    </div>

                                                    <div class="col-md-2 text-center pt-3 pt-xl-0">
                                                        <small class="p-1  rounded-sm  btn-block"
                                                            style="
                                                    background: #26d24c;color: #1600ff;">
                                                            Xem chi tiết
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div v-bind:id="'a'+key" class="collapse pt-0" aria-labelledby="heading-1"
                                                data-parent="#accordionOrdersExample">
                                                <hr class="m-0">
                                                <div class="card-body bg-white">
                                                    <template v-if="value.id == value_sp.id_don_hang"
                                                        v-for="(value_sp, key_sp) in listOrder">
                                                        <div class="mb-3 mb-lg-4 bg-light shadow-sm px-4 py-3">
                                                            <div class="row align-items-center no-gutters p-md-2">
                                                                <div class="col-lg-2">
                                                                    <img v-bind:src="value_sp.hinh_anh"
                                                                        class="img-fluid br-sm shadow-sm" alt="Image title">
                                                                </div>
                                                                <div class="col-lg-5 pl-lg-3 py-2 py-lg-0">
                                                                    <div><strong>@{{ value_sp.ten_san_pham }}</strong></div>
                                                                    <small class="text-muted">@{{ value_sp.ten_danh_muc }}</small>
                                                                </div>
                                                                <div class="col-6 col-lg-2">
                                                                    <div><small class="pre-label text-center">Số Lượng</small></div>
                                                                    <p class="text-center">@{{ value_sp.so_luong_mua }}</p>
                                                                </div>
                                                                <div class="col-6 col-lg-3 text-right">
                                                                    <div><small class="pre-label">Tổng Tiền</small></div>
                                                                    <span>@{{ formatPrice(thanhTien(value_sp)) }} đ</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                    <template v-else-if="value.is_payment == 1">
                                        <div class="card card-fill mb-3 shadow-sm rounded">
                                            <div class="card-header bg-white py-4 p-2 p-md-4 pointer" id="heading-1"
                                                role="button" data-toggle="collapse" v-bind:data-target="'#a'+key"
                                                aria-expanded="true" v-bind:aria-controls="'a'+key">
                                                <div class="row">
                                                    <div class="col-md-3 text-nowrap">
                                                        <i class="icon icon-tag mr-3"></i>
                                                        <span>@{{ value.bill_name }}</span>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-nowrap">
                                                        <i class="icon icon-clock mr-3"></i>
                                                        <span>@{{ formatDate(value.created_at) }}</span>
                                                    </div>
                                                    <div class="col-6 col-md-2 text-right text-nowrap">
                                                        <span>@{{ formatPrice(value.bill_total) }} VNĐ</span>
                                                    </div>

                                                    <div class="col-md-2 text-nowrap text-center">
                                                        <small v-if="value.is_payment == 0"
                                                            class="p-1 bg-light-danger rounded-sm text-warning  btn-block">
                                                            Chưa Thanh Toán
                                                        </small>
                                                        <small v-else class="p-1 bg-light-primary text-success rounded-sm  btn-block">
                                                            Đã Thanh Toán
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2 text-nowrap text-center">
                                                        <small v-if="value.is_type == 0"
                                                            class="p-1  rounded-sm text-infor btn-block">
                                                           Chờ xác nhận
                                                        </small>
                                                        <small v-if="value.is_type == 1"
                                                            class="p-1 rounded-sm text-warning btn-block">
                                                            Đang vận chuyển
                                                        </small>
                                                        <small v-if ="value.is_type == 2" class="p-1 text-success rounded-sm btn-block">
                                                            Đã giao hàng
                                                        </small>
                                                        <small v-if ="value.is_type == 3" class="p-1 text-success rounded-sm btn-block">
                                                            Đã trả hàng
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2 text-center pt-3 pt-xl-0 ">
                                                        <small class="p-1  rounded-sm  btn-block"
                                                            style="
                                                    background: #26d24c;color: #1600ff; margin-left: 660px;">
                                                            Xem chi tiết
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div v-bind:id="'a'+key" class="collapse pt-0" aria-labelledby="heading-1"
                                                data-parent="#accordionOrdersExample">
                                                <hr class="m-0">
                                                <div class="card-body bg-white">
                                                    <template v-if="value.id == value_sp.id_don_hang"
                                                        v-for="(value_sp, key_sp) in listOrder">
                                                        <div class="mb-3 mb-lg-4 bg-light shadow-sm px-4 py-3">
                                                            <div class="row align-items-center no-gutters p-md-2">
                                                                <div class="col-lg-2">
                                                                    <img v-bind:src="value_sp.hinh_anh"
                                                                        class="img-fluid br-sm shadow-sm" alt="Image title">
                                                                </div>
                                                                <div class="col-lg-5 pl-lg-3 py-2 py-lg-0">
                                                                    <div><strong>@{{ value_sp.ten_san_pham }}</strong></div>
                                                                    <small class="text-muted">@{{ value_sp.ten_danh_muc }}</small>
                                                                </div>
                                                                <div class="col-6 col-lg-2">
                                                                    <div><small class="pre-label text-center">Số Lượng</small></div>
                                                                    <p class="text-center">@{{ value_sp.so_luong_mua }}</p>
                                                                </div>
                                                                <div class="col-6 col-lg-3 text-right">
                                                                    <div><small class="pre-label">Tổng Tiền</small></div>
                                                                    <span>@{{ formatPrice(thanhTien(value_sp)) }} đ</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>

                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                    <template v-else>
                                        <template v-if="value.is_type < 1">
                                            <div class="card card-fill mb-3 shadow-sm rounded">
                                                <div class="card-header bg-white py-4 p-2 p-md-4 pointer" id="heading-1"
                                                    role="button" data-toggle="collapse" v-bind:data-target="'#a'+key"
                                                    aria-expanded="true" v-bind:aria-controls="'a'+key">
                                                    <div class="row">
                                                        <div class="col-md-3 text-nowrap">
                                                            <i class="icon icon-tag mr-3"></i>
                                                            <span>@{{ value.bill_name }}</span>
                                                        </div>
                                                        <div class="col-6 col-md-3 text-nowrap">
                                                            <i class="icon icon-clock mr-3"></i>
                                                            <span>@{{ formatDate(value.created_at) }}</span>
                                                        </div>
                                                        <div class="col-6 col-md-2 text-right text-nowrap">
                                                            <span>@{{ formatPrice(value.bill_total) }} VNĐ</span>
                                                        </div>

                                                        <div class="col-md-2 text-nowrap text-center">
                                                            <small v-if="value.is_payment == 0"
                                                                class="p-1 bg-light-danger rounded-sm text-warning  btn-block">
                                                                Chưa Thanh Toán
                                                            </small>
                                                            <small v-else class="p-1 bg-light-primary text-success rounded-sm  btn-block">
                                                                Đã Thanh Toán
                                                            </small>
                                                        </div>
                                                        <div class="col-md-2 text-nowrap text-center">
                                                            <small v-if="value.is_type == 0"
                                                                class="p-1  rounded-sm text-infor btn-block">
                                                               Chờ xác nhận
                                                            </small>
                                                            <small v-if="value.is_type == 1"
                                                                class="p-1 rounded-sm text-warning btn-block">
                                                                Đang vận chuyển
                                                            </small>
                                                            <small v-if ="value.is_type == 2" class="p-1 text-success rounded-sm btn-block">
                                                                Đã giao hàng
                                                            </small>
                                                            <small v-if ="value.is_type == 3" class="p-1 text-danger rounded-sm btn-block">
                                                                Đã trả hàng
                                                            </small>
                                                        </div>
                                                        <div class="col-md-2 text-center pt-3 pt-xl-0 ">
                                                            <small class="p-1  rounded-sm  btn-block"
                                                                style="
                                                        background: #26d24c;color: #1600ff; margin-left: 660px;">
                                                                Xem chi tiết
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div v-bind:id="'a'+key" class="collapse pt-0" aria-labelledby="heading-1"
                                                    data-parent="#accordionOrdersExample">
                                                    <hr class="m-0">
                                                    <div class="card-body bg-white">
                                                        <template v-if="value.id == value_sp.id_don_hang"
                                                            v-for="(value_sp, key_sp) in listOrder">
                                                            <div class="mb-3 mb-lg-4 bg-light shadow-sm px-4 py-3">
                                                                <div class="row align-items-center no-gutters p-md-2">
                                                                    <div class="col-lg-2">
                                                                        <img v-bind:src="value_sp.hinh_anh"
                                                                            class="img-fluid br-sm shadow-sm" alt="Image title">
                                                                    </div>
                                                                    <div class="col-lg-5 pl-lg-3 py-2 py-lg-0">
                                                                        <div><strong>@{{ value_sp.ten_san_pham }}</strong></div>
                                                                        <small class="text-muted">@{{ value_sp.ten_danh_muc }}</small>
                                                                    </div>
                                                                    <div class="col-6 col-lg-2">
                                                                        <div><small class="pre-label text-center">Số Lượng</small></div>
                                                                        <p class="text-center">@{{ value_sp.so_luong_mua }}</p>
                                                                    </div>
                                                                    <div class="col-6 col-lg-3 text-right">
                                                                        <div><small class="pre-label">Tổng Tiền</small></div>
                                                                        <span>@{{ formatPrice(thanhTien(value_sp)) }} đ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </template>
                                                        <div class="text-right">
                                                            <button  type="button" class="btn btn-fill-out" data-toggle="modal" data-target="#exampleModalLong" v-on:click ="huyhang = value"
                                                            ><i class="ti-trash"></i>Hủy đơn hàng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- Hủy Đơn Hàng -->
                                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Xác Nhận Hủy Đơn Hàng</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body ">
                                                        <div class="alert alert-dark"  role="alert">
                                                            <p>Bạn có chắc chắn muốn hủy đơn hàng <i class="text-uppercase text-danger font-weight-bold">@{{huyhang.bill_name}}</i> này không?.</p>
                                                            <hr>
                                                            <p class="mb-0"><i>Lưu ý: Hành động không thể khôi phục
                                                                    lại</i></p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                    <button type="button" class="btn btn-danger" v-on:click="delDonHang()">Xác Nhận</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </template>
                                        {{-- <template v-if="value.is_payment ==1">
                                            <div class="card card-fill mb-3 shadow-sm rounded">
                                                <div class="card-header bg-white py-4 p-2 p-md-4 pointer" id="heading-1"
                                                    role="button" data-toggle="collapse" v-bind:data-target="'#a'+key"
                                                    aria-expanded="true" v-bind:aria-controls="'a'+key">
                                                    <div class="row">
                                                        <div class="col-md-3 text-nowrap">
                                                            <i class="icon icon-tag mr-3"></i>
                                                            <span>@{{ value.bill_name }}</span>
                                                        </div>
                                                        <div class="col-6 col-md-3 text-nowrap">
                                                            <i class="icon icon-clock mr-3"></i>
                                                            <span>@{{ formatDate(value.created_at) }}</span>
                                                        </div>
                                                        <div class="col-6 col-md-2 text-right text-nowrap">
                                                            <span>@{{ formatPrice(value.bill_total) }} VNĐ</span>
                                                        </div>

                                                        <div class="col-md-2 text-nowrap text-center">
                                                            <small v-if="value.is_payment == 0"
                                                                class="p-1 bg-light-danger rounded-sm text-warning  btn-block">
                                                                Chưa Thanh Toán
                                                            </small>
                                                            <small v-else class="p-1 bg-light-primary text-success rounded-sm  btn-block">
                                                                Đã Thanh Toán
                                                            </small>
                                                        </div>
                                                        <div class="col-md-2 text-nowrap text-center">
                                                            <small v-if="value.is_type == 0"
                                                                class="p-1  rounded-sm text-infor btn-block">
                                                               Chờ xác nhận
                                                            </small>
                                                            <small v-if="value.is_type == 1"
                                                                class="p-1 rounded-sm text-warning btn-block">
                                                                Đang vận chuyển
                                                            </small>
                                                            <small v-if ="value.is_type == 2" class="p-1 text-success rounded-sm btn-block">
                                                                Đã giao hàng
                                                            </small>
                                                            <small v-if ="value.is_type == 3" class="p-1 text-success rounded-sm btn-block">
                                                                Đã trả hàng
                                                            </small>
                                                        </div>
                                                        <div class="col-md-2 text-center pt-3 pt-xl-0 ">
                                                            <small class="p-1  rounded-sm  btn-block"
                                                                style="
                                                        background: #26d24c;color: #1600ff; margin-left: 660px;">
                                                                Xem chi tiết
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div v-bind:id="'a'+key" class="collapse pt-0" aria-labelledby="heading-1"
                                                    data-parent="#accordionOrdersExample">
                                                    <hr class="m-0">
                                                    <div class="card-body bg-white">
                                                        <template v-if="value.id == value_sp.id_don_hang"
                                                            v-for="(value_sp, key_sp) in listOrder">
                                                            <div class="mb-3 mb-lg-4 bg-light shadow-sm px-4 py-3">
                                                                <div class="row align-items-center no-gutters p-md-2">
                                                                    <div class="col-lg-2">
                                                                        <img v-bind:src="value_sp.hinh_anh"
                                                                            class="img-fluid br-sm shadow-sm" alt="Image title">
                                                                    </div>
                                                                    <div class="col-lg-5 pl-lg-3 py-2 py-lg-0">
                                                                        <div><strong>@{{ value_sp.ten_san_pham }}</strong></div>
                                                                        <small class="text-muted">@{{ value_sp.ten_danh_muc }}</small>
                                                                    </div>
                                                                    <div class="col-6 col-lg-2">
                                                                        <div><small class="pre-label text-center">Số Lượng</small></div>
                                                                        <p class="text-center">@{{ value_sp.so_luong_mua }}</p>
                                                                    </div>
                                                                    <div class="col-6 col-lg-3 text-right">
                                                                        <div><small class="pre-label">Tổng Tiền</small></div>
                                                                        <span>@{{ formatPrice(thanhTien(value_sp)) }} đ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>
                                        </template> --}}
                                        <template v-else>

                                                <div class="card card-fill mb-3 shadow-sm rounded">
                                                    <div class="card-header bg-white py-4 p-2 p-md-4 pointer" id="heading-1"
                                                        role="button" data-toggle="collapse" v-bind:data-target="'#a'+key"
                                                        aria-expanded="true" v-bind:aria-controls="'a'+key">
                                                        <div class="row">
                                                            <div class="col-md-3 text-nowrap">
                                                                <i class="icon icon-tag mr-3"></i>
                                                                <span>@{{ value.bill_name }}</span>
                                                            </div>
                                                            <div class="col-6 col-md-3 text-nowrap">
                                                                <i class="icon icon-clock mr-3"></i>
                                                                <span>@{{ formatDate(value.created_at) }}</span>
                                                            </div>
                                                            <div class="col-6 col-md-2 text-right text-nowrap">
                                                                <span>@{{ formatPrice(value.bill_total) }} VNĐ</span>
                                                            </div>

                                                            <div class="col-md-2 text-nowrap text-center">
                                                                <small v-if="value.is_payment == 0"
                                                                    class="p-1 bg-light-danger rounded-sm text-warning  btn-block">
                                                                    Chưa Thanh Toán
                                                                </small>
                                                                <small v-else class="p-1 bg-light-primary text-success rounded-sm  btn-block">
                                                                    Đã Thanh Toán
                                                                </small>
                                                            </div>
                                                            <div class="col-md-2 text-nowrap text-center">
                                                                <small v-if="value.is_type == 0"
                                                                    class="p-1  rounded-sm text-infor btn-block">
                                                                   Chờ xác nhận
                                                                </small>
                                                                <small v-if="value.is_type == 1"
                                                                    class="p-1 rounded-sm text-warning btn-block">
                                                                    Đang vận chuyển
                                                                </small>
                                                                <small v-if ="value.is_type == 2" class="p-1 text-success rounded-sm btn-block">
                                                                    Đã giao hàng
                                                                </small>
                                                                <small v-if ="value.is_type == 3" class="p-1 text-danger rounded-sm btn-block">
                                                                    Đã trả hàng
                                                                </small>
                                                            </div>
                                                            <div class="col-md-2 text-center pt-3 pt-xl-0 ">
                                                                <small class="p-1  rounded-sm  btn-block"
                                                                    style="
                                                            background: #26d24c;color: #1600ff; margin-left: 660px;">
                                                                    Xem chi tiết
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div v-bind:id="'a'+key" class="collapse pt-0" aria-labelledby="heading-1"
                                                        data-parent="#accordionOrdersExample">
                                                        <hr class="m-0">
                                                        <div class="card-body bg-white">
                                                            <template v-if="value.id == value_sp.id_don_hang"
                                                                v-for="(value_sp, key_sp) in listOrder">
                                                                <div class="mb-3 mb-lg-4 bg-light shadow-sm px-4 py-3">
                                                                    <div class="row align-items-center no-gutters p-md-2">
                                                                        <div class="col-lg-2">
                                                                            <img v-bind:src="value_sp.hinh_anh"
                                                                                class="img-fluid br-sm shadow-sm" alt="Image title">
                                                                        </div>
                                                                        <div class="col-lg-5 pl-lg-3 py-2 py-lg-0">
                                                                            <div><strong>@{{ value_sp.ten_san_pham }}</strong></div>
                                                                            <small class="text-muted">@{{ value_sp.ten_danh_muc }}</small>
                                                                        </div>
                                                                        <div class="col-6 col-lg-2">
                                                                            <div><small class="pre-label text-center">Số Lượng</small></div>
                                                                            <p class="text-center">@{{ value_sp.so_luong_mua }}</p>
                                                                        </div>
                                                                        <div class="col-6 col-lg-3 text-right">
                                                                            <div><small class="pre-label">Tổng Tiền</small></div>
                                                                            <span>@{{ formatPrice(thanhTien(value_sp)) }} đ</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </div>
                                                </div>
                                        </template>

                                    </template>
                                </template>
                            </div>


                        </div>
                        {{-- Mật Khẩu --}}
                        <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                            <div class="row">
                                {{-- <input v-model = "updatepass.id" class="form-control" type="text" hidden> --}}
                                <div class="form-group col-md-12">
                                    <label>Mật khẩu<span class="required">*</span></label>
                                    <input v-model="updatepass.password" class="form-control"
                                        type="password">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Nhập lại mật khẩu <span class="required">*</span></label>
                                    <input v-model="updatepass.re_password" class="form-control"
                                        type="password">
                                </div>
                                <div class="col-md-12">
                                    <button v-on:click = "updatePass()" type="button" class="btn btn-fill-out"
                                        >Lưu</button>
                                </div>

                            </div>
                        </div>
                        {{-- Thông Tin --}}
                        <div class="tab-pane fade" id="account-detail" role="tabpanel"
                            aria-labelledby="account-detail-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Thông tin tài khoản</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" name="enq">
                                        <div class="row">
                                            {{-- <div class="form-group col-md-6">
                                                <label>First Name <span class="required">*</span></label>
                                                <input required="" class="form-control" name="name"
                                                    type="text">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input required="" class="form-control" name="phone">
                                            </div> --}}
                                            <input v-model = "dataAcc.id" class="form-control" type="text" hidden>
                                            <div class="form-group col-md-12">
                                                <label>Họ Và Tên <span class="required">*</span></label>
                                                <input v-model = "dataAcc.ho_ten" class="form-control" :disabled="!disabled"
                                                    type="text">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Email <span class="required">*</span></label>
                                                <input v-model = "dataAcc.email"  class="form-control" :disabled="!disabled"
                                                    type="email">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Số Điện Thoại <span class="required">*</span></label>
                                                <input v-model = "dataAcc.so_dien_thoai"  class="form-control" :disabled="!disabled"
                                                    type="number">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Địa Chỉ <span class="required">*</span></label>
                                                <input v-model = "dataAcc.dia_chi"  class="form-control" :disabled="!disabled"
                                                    type="text">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Giới Tính <span class="required">*</span></label>
                                                <select v-model = "dataAcc.sex"  class="form-control" :disabled="!disabled">
                                                    <option v-bind:value="1">Nam</option>
                                                    <option v-bind:value="0">Nữ</option>
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <button v-if="!isHidden" v-on:click="showisHidden()" type="button" class="btn btn-fill-out"
                                                    >Chỉnh Sửa</button>
                                                <button v-else v-on:click = "updateMyacc()" type="button" class="btn btn-fill-out"
                                                    >Lưu</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
                listOrder: [],
                listBill: [],
                dataAcc: {},
                updatepass:{},
                huyhang:{},
                disabled: false,
                isHidden: false,
            },
            created() {
                this.getData();
                this.getBill();
                this.getMyacc();
            },
            methods: {
                showisHidden(){
                    this.disabled=true;
                    this.isHidden=true;
                },
                getData() {
                    axios
                        .get('/client/bill/order')
                        .then((res) => {
                            this.listOrder = res.data.listOrder;
                        });
                },

                getBill() {
                    axios
                        .get('/client/all-bill')
                        .then((res) => {
                            this.listBill = res.data.listBill;
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
                    return this.donGia(v.don_gia_mua, v.gia_khuyen_mai) * v.so_luong_mua;
                },

                getMyacc(){
                    axios
                        .get('/client/myaccount')
                        .then((res) =>{
                            this.dataAcc = res.data.data;
                        });
                },
                updateMyacc(){
                    //console.log(this.dataAcc);
                    axios
                        .post('/client/myaccount', this.dataAcc)
                        .then((res)=>{
                            if(res.data.status){
                                toastr.success(res.data.mess);
                                this.disabled= false;
                                this.isHidden= false;
                                // window.location.reload();

                            }
                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });

                        });

                },
                updatePass(){
                    axios
                        .post('/client/updatepassword', this.updatepass)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.updatepass='';
                                // window.location.reload();
                            } else {
                                toastr.error(res.data.message);
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                delDonHang(){
                    axios
                        .post('/client/delete-hang', this.huyhang)
                        .then((res) => {
                            if(res.data.status==1) {
                                toastr.success(res.data.message);
                                this.getBill();
                                $('#exampleModalLong').modal('hide');
                            } else {
                                toastr.error(res.data.message);
                                this.getBill();
                                $('#exampleModalLong').modal('hide');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                formatDate(datetime) {
                    const input = datetime;
                    const dateObj = new Date(input);
                    const year = dateObj.getFullYear();
                    const month = (dateObj.getMonth() + 1).toString().padStart(2, '0');
                    const date = dateObj.getDate().toString().padStart(2, '0');

                    const result = `${date}/${month}/${year}`;

                    return result;
                },

                totalRequest() {
                    return this.listCart.reduce((acc, item) => acc + this.thanhTien(item), 0);
                },

                formatPrice(value) {
                    let val = (value / 1).toFixed(0).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                }
            },
        });
    </script>
@endsection
