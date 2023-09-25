@extends('Admin.Share.master')
@section('title')
    <h1 class="text-center mb-4" style="padding-top: 30px"> Quản Lý Đơn Hàng</h1>
@endsection
@section('content')
    <div id="app">
        <div class="">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <div class="input-group md-form form-sm form-2 pl-0">
                            <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search"
                                aria-label="Search" id="searchSanPham" v-model="search" v-on:keyup.enter="searchBill(search)">
                            <div class="input-group-append">
                                <button class="input-group-text red lighten-3" id="basic-text1" v-on:click="searchBill(search)"><i
                                        class="fas fa-search text-grey" aria-hidden="true"></i></button>
                            </div>
                        </div>

                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr class="bg-primary text-nowrap ">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Mã hóa đơn</th>
                                    <th class="text-center">Người dùng</th>
                                    <th class="text-center">Người nhận</th>
                                    <th class="text-center">Ngày</th>
                                    <th class="text-center">Tổng Tiền</th>
                                    <th class="text-center">Thanh Toán</th>
                                    <th class="text-center">Tình Trạng</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in listBill" class="bg-light text-nowrap text-center">
                                    <th class="align-middle">@{{ (key + 1) }}</th>
                                    <td class="align-middle">@{{ value.bill_name}}</td>
                                    <td class="align-middle">@{{ value.ho_ten}}</td>
                                    <td class="align-middle">@{{ value.ship_fullname}}</td>
                                    <td class="align-middle">@{{ formatDate(value.created_at) }}</td>
                                    <td class="align-middle">@{{ formatPrice(value.bill_total) }}đ</td>
                                    <td class="align-middle text-center">
                                        <button v-on:click="changeOpen(value)" v-if="value.is_payment == 0"
                                            class="btn btn-warning">Chưa thanh toán</button>
                                            <button v-on:click="changeOpen(value)" v-else-if="value.is_payment == 2" class="btn btn-danger">Đã hủy</button>
                                        <button v-on:click="changeOpen(value)" v-else class="btn btn-success">Đã thanh
                                            toán</button>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button v-on:click="changeType(value)" v-if="value.is_type == 0"
                                            class="btn btn-info">Đang xử lý</button>
                                        <button v-on:click="changeType(value)" v-else-if="value.is_type == 1"
                                            class="btn btn-warning">Đang vận chuyển</button>
                                        <button v-on:click="changeType(value)" v-else-if="value.is_type == 2"
                                            class="btn btn-success">Đã giao</button>
                                        <button v-on:click="changeType(value)" v-else class="btn btn-danger">Đã hoàn
                                            trả</button>
                                    </td>
                                    {{-- <td class="align-middle">@{{ value.is_payment == 0 ? 'Chưa Thanh Toán' : 'Đã Thanh Toán' }}</td> --}}
                                    {{-- <td class="align-middle">@{{ showType(value.is_type) }}</td> --}}
                                    <td>

                                        <button class="btn btn-outline-primary " v-on:click="chiTiet(value)"
                                           >Chi tiết</button>
                                        <button class="btn btn-outline-primary "
                                        ><a target="_blank"
                                        :href="'/admin-shop/hoa-don-ban-hang/exportPdf/' + value.id">In Hóa Đơn</a></button>
                                    </td>
                                </tr>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Chi Tiết Bán Hàng</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Tên Sản Phẩm</th>
                                    <th class="text-center">Số Lượng</th>
                                    <th class="text-center">Đơn Giá</th>
                                    <th class="text-center">Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in listDetail" class="bg-light">
                                    <th class="align-middle">@{{ (key + 1) }}</th>
                                    <td class="align-middle">@{{ value.ten_san_pham }}</td>
                                    <td class="align-middle">@{{ formatPrice(value.so_luong_mua) }}</td>
                                    <td class="align-middle">@{{ formatPrice(value.don_gia_mua) }}</td>
                                    <td class="align-middle">@{{ formatPrice(value.don_gia_mua * value.so_luong_mua) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered mt-3 bg-primary">
                            <tr>
                                <th>Tên Người Nhận</th>
                                <td>@{{ ship_name }}</td>
                            </tr>
                            <tr>
                                <th>Số Điện Thoại Nhận</th>
                                <td>@{{ ship_phone }}</td>
                            </tr>
                            <tr>
                                <th>Địa Chỉ</th>
                                <td>@{{ ship_add }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div> --}}
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <form id="updateSanPham">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Chi Tiết Bán Hàng</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="bg-primary">
                                                    <th class="text-center"><b>#</b></th>
                                                    <th class="text-center"><b>Tên Sản Phẩm</b></th>
                                                    <th class="text-center"><b>Hình Ảnh</b></th>
                                                    <th class="text-center"><b>Số Lượng</b></th>
                                                    <th class="text-center"><b>Đơn Giá</b></th>
                                                    <th class="text-center"><b>Thành Tiền</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(value, key) in listDetail" class="bg-light text-center">
                                                    <th class="align-middle">@{{ (key + 1) }}</th>
                                                    <td class="align-middle">@{{ value.ten_san_pham }}</td>
                                                    <td class="align-middle" style="width: 200px;"><img v-bind:src="value.hinh_anh"
                                                        class="img-fluid br-sm shadow-sm" alt="Image title"></td>
                                                    <td class="align-middle">@{{ formatPrice(value.so_luong_mua) }}</td>
                                                    <td class="align-middle">@{{ formatPrice(value.don_gia_mua) }}đ</td>
                                                    <td class="align-middle">@{{ formatPrice(value.don_gia_mua * value.so_luong_mua) }}đ</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered mt-3 bg-primary text-center ">
                                            <tr>
                                                <th><b style="color: black;">Tên Người Nhận</b></th>
                                                <td class="bg-light text-center"
                                                    style="color: black;">
                                                    @{{ ship_name }}</td>
                                            </tr>
                                            <tr>
                                                <th><b style="color: black;">Số Điện Thoại Nhận</b></th>
                                                <td class="bg-light text-center"
                                                    style="color: black;">
                                                    @{{ ship_phone }}</td>
                                            </tr>
                                            <tr>
                                                <th><b style="color: black;">Địa Chỉ</b></th>
                                                <td class="bg-light text-center"
                                                    style="color: black;">
                                                    @{{ ship_add }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                listBill: [],
                listDetail: [],
                listsearchBill:[],
                ship_name: '',
                ship_phone: '',
                ship_add: '',
                search: '',

            },
            created() {
                this.getData();
                // this.searchBill();
                //this.searchBill();
            },
            methods: {
                changeOpen(a) {
                    axios
                        .post('/admin-shop/hoa-don-ban-hang/change-status', a)
                        .then((res) => {

                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.getData();
                            } else {
                                toastr.error(res.data.message);
                                this.getData();

                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                changeType(x) {
                    axios
                        .post('/admin-shop/hoa-don-ban-hang/change-type', x)
                        .then((res) => {

                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.getData();

                            } else {
                                toastr.error(res.data.message);
                                this.getData();

                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                getData() {
                    axios
                        .get('/admin-shop/hoa-don-ban-hang/data')
                        .then((res) => {
                            this.listBill = res.data.bill;
                        });
                },
                chiTiet(value) {
                    this.ship_name = value.ship_fullname;
                    this.ship_phone = value.ship_phone;
                    this.ship_add = value.ship_address;
                    axios
                        .get('/admin-shop/hoa-don-ban-hang/detail/' + value.id)
                        .then((res) => {
                            if(res.data.status) {
                                this.listDetail = res.data.chiTiet;
                                $('#myModal').modal('show');
                            } else {
                                toastr.error(res.data.message);
                            }

                        });
                },
                // showType(type) {
                //     if (type == 0) {
                //         return 'Đang xử lý';
                //     } else if (type == 1) {
                //         return 'Đang vận chuyển';
                //     } else if (type == 2) {
                //         return 'Đã thành công';
                //     } else {
                //         return 'Đã hoàn trả';
                //     }
                // },
                // xuatPDF(value){
                //     axios
                //         .get('/admin-shop/hoa-don-ban-hang/exportPdf/'+ value.id)
                //         .then((res) => {

                //         });
                // },
                searchBill(){
                    var payload ={
                        'search': this.search,
                    };
                    console.log(payload);
                    axios
                        .post('/admin-shop/hoa-don-ban-hang/search', payload)
                        .then((res) => {
                            if(res.data.status) {
                                this.listBill = res.data.bill;
                            } else {
                                toastr.error(res.data.message);
                            }

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
                formatPrice(value) {
                    let val = (value / 1).toFixed(0).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                },
            },
        });
    </script>
@endsection
