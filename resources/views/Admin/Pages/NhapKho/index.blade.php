@extends('Admin.Share.master')
@section('title')
<h1 class="text-center mb-4" style="padding-top: 30px"> Quản Lý Loại Danh Mục</h1>
@endsection
@section('content')
<div class="row" id="app">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                 <h4>Thêm Mới Hóa Đơn Nhập Hàng</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="table-responsive" style="max-height: 450px">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="align-middle text-nowrap bg-primary" >Tìm kiếm</th>
                                    <th class="bg-primary">
                                        <input type="text" class="form-control" v-model="key_search" v-on:keyup.enter="search()">
                                    </th>
                                    <th class="text-center text-white text-nowrap bg-primary">
                                        <button class="btn btn-info text-nowrap" v-on:click="search()">Tìm Kiếm</button>
                                    </th>
                                </tr>
                                <tr class="bg-primary">
                                    <th class="align-middle text-center text-nowrap">#</th>
                                    <th class="align-middle text-center text-nowrap">Tên Sản Phẩm</th>
                                    <th class="align-middle text-center text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, key) in list_sp">
                                    <tr class="bg-light">
                                        <th class="text-center align-middle">@{{key+1}}</th>
                                        <td class="align-middle"> @{{value.ten_san_pham}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary" v-on:click="addSanPham(value)">Thêm</button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-7">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Danh Sách Nhập Hàng</h4>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-primary">
                            <th class="align-middle" colspan="2">
                                <select class="form-control mb-3" v-model="id_nha_cung_cap">
                                    <option value="">Chọn Nhà Cung Cấp</option>
                                    <template v-for="(value, key) in list_ncc">
                                        <option v-bind:value="value.id">@{{ value.ten_cong_ty}}</option>
                                    </template>
                                </select>
                            </th>
                            <th class="text-center align-middle">Tổng Số Lượng</th>
                            <td class="align-middle">@{{tong_san_pham}}</td>
                            <th class="text-center align-middle">Tổng Tiền</th>
                            <td class="align-middle">
                                @{{format(tong_tien)}}
                            </td>
                            <th class="text-center align-middle" rowspan="2"><i class="text-capitalize  " style="color: #f8d62b">@{{tien_chu}}</i></th>
                        </tr>

                    </thead>
                </table>
                <table class="table table-bordered table-responsive mt-2">
                    <thead>
                        <tr class="bg-primary">
                            <th class="text-center">#</th>
                            <th class="text-center text-nowrap">Tên Sản Phẩm</th>
                            <th class="text-center text-nowrap">Số Lượng</th>
                            <th class="text-center text-nowrap"style="padding: 12px 50px;">Đơn Giá</th>
                            <th class="text-center text-nowrap">Thành Tiền</th>
                            <th class="text-center text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(value, key) in list_nk">
                            <tr class="bg-light">
                                <th class="text-center align-middle">@{{key+1}}</th>
                                <td class="align-middle">@{{value.ten_san_pham}}</td>
                                <td class="align-middle text-nowrap">
                                    <input class="form-control text-center" type="number" v-model="value.so_luong_nhap" v-on:change="update(value)">
                                </td>
                                <td class="align-middle text-center ">
                                    <input class="form-control text-nowrap" type="number" v-model="value.don_gia_nhap" v-on:change="update(value)">
                                </td>
                                <td class="align-middle"> @{{ format(value.so_luong_nhap * value.don_gia_nhap) }}</td>
                                <td class="align-middle text-center text-nowrap">
                                    <button class="btn btn-danger ml-1" data-bs-toggle="modal" data-bs-target="#deleteModal" v-on:click="destroy = value">Xóa Bỏ</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Sản Phẩm</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-primary" role="alert">
                                Bạn có chắc chắn muốn xóa sản phẩm: <b class="text-danger text-uppercase">@{{destroy.ten_san_pham}}</b> này không?
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-danger"  v-on:click="deleteSanPham()">Xác Nhận</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary w-100" v-on:click="nhapHang()">Nhập Hàng</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        new Vue({
            el      :   '#app',
            data    :   {
                list_sp         :[],
                list_nk         :[],
                destroy         :{},
                key_search      :'',
                tong_tien       : 0,
                tien_chu        : '',
                tong_san_pham   : 0,
                so_luong_nhap   : 0,
                don_gia_nhap    : 0,
                list_ncc        : [],
                id_nha_cung_cap : '',
            },
            created()   {
                this.loadDataSP();
                this.loadNhapKho();
                this.loadDataNCC();
            },
            methods :   {
                nhapHang(){
                    var payload = {
                        'tong_tien'         : this.tong_tien,
                        'tong_san_pham'     : this.tong_san_pham,
                        'id_nha_cung_cap'   : this.id_nha_cung_cap,
                        // 'so_luong_nhap'     : this.so_luong_nhap,
                        // 'don_gia_nhap'      : this.don_gia_nhap,
                    };
                    axios
                        .post('{{ Route("NhapKhoChinhThuc") }}',payload)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                    this.loadNhapKho();
                                    this.loadDataSP();
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
                addSanPham(value){
                    axios
                        .post('/admin-shop/nhap-kho/create', value)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.loadNhapKho();
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
                deleteSanPham(){
                    axios
                        .post('/admin-shop/nhap-kho/delete', this.destroy)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                $('#deleteModal').modal('hide');
                                this.loadNhapKho();
                            }
                            else {
                                toastr.error(res.data.message);
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                update(value){
                    axios
                        .post('/admin-shop/nhap-kho/update', value)
                        .then((res) => {
                            if(res.data.status==1) {
                                toastr.success(res.data.message);
                                this.loadNhapKho();
                            }else if(res.data.status==2){
                                toastr.warning(res.data.message);
                                this.loadNhapKho();

                            }
                            else {
                                toastr.error(res.data.message);
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                search(){
                    var payload = {
                        'key_search' : this.key_search,
                    };
                    axios
                        .post('/admin-shop/san-pham/search', payload)
                        .then((res) => {
                          this.list_sp = res.data.data;
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                loadDataSP(){
                    axios
                        .get('/admin-shop/san-pham/data')
                        .then((res) => {
                            this.list_sp = res.data.data;
                        });
                },
                loadDataNCC() {
                    axios
                        .get('/admin-shop/nha-cung-cap/data')
                        .then((res) => {
                            this.list_ncc  =  res.data.data;
                        });
                },
                loadNhapKho(){
                    axios
                        .get('/admin-shop/nhap-kho/data')
                        .then((res) => {
                            this.list_nk        = res.data.data;
                            this.tong_tien      = res.data.tong_tien;
                            this.tien_chu       = res.data.tien_chu;
                            this.tong_san_pham  = res.data.tong_san_pham;
                        });
                },
                format(number) {
                    return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
                },
            },
        });
    </script>
@endsection
