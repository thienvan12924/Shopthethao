@extends('Admin.Share.master')
@section('title')
    <h1 class="text-center mb-4" style="padding-top: 30px">Lịch Sử Nhập Kho</h1>
@endsection
@section('content')
    <div class="row" id="app">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">

                        <div class="input-group md-form form-sm form-2 pl-0">
                            <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search"
                                aria-label="Search" id="searchSanPham" v-model="search" v-on:keyup.enter="searchNhapkho(search)">
                            <div class="input-group-append">
                                <button class="input-group-text red lighten-3" id="basic-text1" v-on:click="searchNhapkho(search)"><i
                                        class="fas fa-search text-grey" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="mt-4 table-responsive">
                    <table class="table table-bordered table-responsive " id="listSanPham">
                        <thead>
                            <tr class="bg-primary">
                                <th class="text-center text-nowrap">#</th>
                                <th class="text-center text-nowrap">Mã Đơn Hàng</th>
                                <th class="text-center text-nowrap">Ngày Nhập Hàng</th>
                                <th class="text-center text-nowrap">Tên Người Nhập Hàng</th>
                                <th class="text-center text-nowrap">Tổng Tiền</th>
                                <th class="text-center text-nowrap">Tổng Sản Phẩm</th>
                                <th class="text-center text-nowrap">Trạng Thái</th>
                                <th class="text-center text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(v, k) in list_hd">
                                <tr class="bg-light">
                                    <th class="text-center align-middle">@{{ k + 1 }}</th>
                                    <td class="align-middle text-center">@{{ v.ma_don_hang }}</td>
                                    <td class="align-middle text-center">@{{ new Date(v.ngay_nhap_hang).toLocaleDateString('vi-VN') }}</td>
                                    <td class="align-middle text-center">@{{ v.name }}</td>
                                    <td class="align-middle text-center">@{{ formatPrice(v.tong_tien) }}đ</td>
                                    <td class="align-middle text-nowrap text-center">@{{ v.tong_san_pham }}</td>
                                    <td class="align-middle text-nowrap text-center">
                                        <button v-if="v.tinh_trang == 1" v-on:click="changeType(v)"
                                            class="btn btn-success">Đã Thanh Toán</button>

                                        <button v-else v-on:click="changeType(v)" class="btn btn-danger">Chưa Thanh
                                            Toán</button>

                                    </td>
                                    <td class="text-center align-middle text-nowrap">
                                        <button v-on:click="chiTiet(v)" style="width: 0px"class="btn"><i
                                                class="fa fa-pencil-square text-primary"style="font-size: 20px"></i></i><span
                                                class="ps-3 text-success"></button>
                                    </td>
                                </tr>
                            </template>

                        </tbody>
                    </table>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <form id="updateSanPham">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">Chi Tiết Nhập Kho
                                        </h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <table class="table table-bordered table-responsive ">
                                                <thead>
                                                    <tr class="bg-primary">
                                                        <th class="text-center text-nowrap"><b>#</b></th>
                                                        <th class="text-center text-nowrap"><b>Tên Sản Phẩm</b></th>
                                                        <th class="text-center text-nowrap"><b>Số Lượng</b>
                                                        </th>
                                                        <th class="text-center text-nowrap"><b>Đơn Giá</b></th>
                                                        <th class="text-center text-nowrap"><b>Thành Tiền</b></th>
                                                        {{-- <th class="text-center text-nowrap"><b>Trạng Thái</b></th>
                                                        <th class="text-center text-nowrap"><b>Action</b></th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <template v-for="(value, key ) in list_nk">
                                                        <tr class="bg-light">
                                                            <th class="text-center align-middle">@{{ key + 1 }}</th>
                                                            <td class="align-middle text-center">@{{ value.ten_san_pham }}</td>
                                                            <td class="align-middle text-center">@{{ value.so_luong_nhap }}</td>
                                                            <td class="align-middle text-center">@{{ formatPrice(value.don_gia_nhap) }}đ</td>
                                                            <td class="align-middle text-center">@{{ formatPrice(value.thanh_tien) }}đ</td>

                                                        </tr>
                                                    </template>
                                                </tbody>
                                            </table>
                                            <table class="table table-bordered mt-3 bg-primary text-center ">
                                                <tr>
                                                    <th><b style="color: black;">Tổng Tiền</b></th>
                                                    <td class="bg-light text-center"
                                                        style="color: black;">
                                                        @{{ formatPrice(tong_tien) }}đ</td>
                                                </tr>
                                                <tr>
                                                    <th><b style="color: black;">Tổng Sản Phẩm</b></th>
                                                    <td class="bg-light text-center"
                                                        style="color: black;">
                                                        @{{ tong_san_pham }}</td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                list_hd: [],
                list_nk: {},
                tong_tien:0,
                tong_san_pham:0,
                search   : '',

            },
            created() {
                this.loadData();
                // this.loadData();
            },
            methods: {
                loadData() {
                    axios
                        .get('{{ Route('DataHoaDonNhapKho') }}')
                        .then((res) => {
                            this.list_hd = res.data.data;
                        });
                },
                chiTiet(value) {
                    this.tong_tien = value.tong_tien;
                    this.tong_san_pham = value.tong_san_pham;

                    axios
                        .get('/admin-shop/hoa-don-nhap-kho/data-nhap-kho/' + value.id)
                        .then((res) => {
                            if(res.data.status) {
                                this.list_nk = res.data.data;
                                $('#myModal').modal('show');
                            } else {
                                toastr.error(res.data.message);
                            }

                        });
                },
                changeType(x) {
                    axios
                        .post('/admin-shop/hoa-don-nhap-kho/change-type', x)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.loadData();
                            } else {
                                toastr.error(res.data.message);
                            }

                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                searchNhapkho(){
                    var payload = {
                        'search' : this.search,
                    };
                    axios
                        .post('/admin-shop/hoa-don-nhap-kho/search', payload)
                        .then((res) => {
                            if(res.data.status) {
                                this.list_hd = res.data.data;
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
                formatPrice(value) {
                    let val = (value / 1).toFixed(0).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                },
            },
        });
    </script>
@endsection
