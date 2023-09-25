@extends('Admin.Share.master')

@section('content')
    <div class="row" id="app">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="mb-3">
                        <h4 class="form-label">Thêm mới chuyên mục </h4>
                    </div>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label">Tên chuyên mục</label>
                        <input tabindex="1" class="form-control" id="ten_chuyen_muc" name="ten_chuyen_muc"
                            v-model="ten_chuyen_muc" type="text" placeholder="Nhập vào tên chuyên mục">
                        <small id="massage_ten_chuyen_muc"><i></i></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hiển Thị</label>
                        <select name="is_open" class="form-control" v-model="is_open">
                            <option value=1>Hiển Thị</option>
                            <option value=0>Tạm Tắt</option>
                        </select>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-secondary" v-on:click="createChuyenMuc()">Thêm mới</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Danh sách Chuyên Mục</h4>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-responsive" id="listChuyenMuc">
                        <thead>
                            <tr class="text-center  bg-primary text-nowrap">
                                <th>#</th>
                                <th>Tên Chuyên Mục</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value,key) in list_cm">
                                <th>@{{ key + 1 }}</th>
                                <td class="text-center align-middle">@{{ value.ten_chuyen_muc }}</td>
                                <td class="align-middle text-center">

                                    <button v-if="value.is_open == 1" v-on:click="changeIsOpen(value)"
                                        class="btn btn-success">Hiển Thị</button>

                                    <button v-else v-on:click="changeIsOpen(value)" class="btn btn-danger">Tạm
                                        Tắt</button>

                                </td>
                                <td class="text-center align-middle text-nowrap">
                                    <button v-on:click="edit_cm = Object.assign({}, value)" data-bs-toggle="modal"
                                        data-bs-target="#editModal" class="btn border-0"><i
                                            class="fa fa-pencil-square text-primary"style="font-size: 25px"></i></button>
                                    <button v-on:click="delete_cm = value" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" class="btn border-0" style="margin-left: 10px"><i
                                            class="fa fa-trash text-danger"style="font-size: 25px"></i></button>
                                </td>

                            </tr>
                            {{-- Sửa --}}
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Chuyên Mục</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="id" id="id_chuyen_muc_edit" hidden>
                                            <div class="mb-3">
                                                <label class="form-label">Tên chuyên mục</label>
                                                <input tabindex="1" class="form-control" v-model="edit_cm.ten_chuyen_muc"
                                                    name="ten_chuyen_muc" type="text"
                                                    placeholder="Nhập vào tên chuyên mục">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Hiển Thị</label>
                                                <select name="is_open" id="is_open_edit" v-model="edit_cm.is_open"
                                                    class="form-control">
                                                    <option value=1>Hiển Thị</option>
                                                    <option value=0>Tạm Tắt</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="button"
                                                    data-bs-dismiss="modal">Đóng</button>
                                                <button v-on:click="updateChuyenMuc()" class="btn btn-secondary">Lưu</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xóa Chuyên Mục</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" id="id_chuyen_muc" hidden>
                                            <div class="alert alert-danger" role="alert">
                                                <h4 class="alert-heading">Xóa Chuyên Mục!</h4>
                                                <p>Bạn có chắc chắn muốn xóa danh muc <b
                                                    class="text-warning">@{{ delete_cm.ten_chuyen_muc }}</b> này không?.</p>
                                                <hr>
                                                <p class="mb-0"><i>Lưu ý: Hành động không thể khôi phục
                                                        lại</i>.</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="button"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button v-on:click="deleteChuyenMuc()" class="btn btn-danger" data-bs-dismiss="modal"
                                                type="button">Xóa</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tbody>
                    </table>
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
                ten_chuyen_muc: '',
                is_open: 1,
                list_cm: [],
                edit_cm: {},
                delete_cm: {}
            },
            created() {
                this.loadData();
            },
            methods: {
                createChuyenMuc() {
                    var paramObj = {
                        'ten_chuyen_muc': this.ten_chuyen_muc,
                        'is_open': this.is_open,

                    };
                    axios
                        .post('{{ Route('createChuyenMuc') }}', paramObj)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                                this.ten_chuyen_muc = '';
                                this.is_open = 0;
                                this.loadData();
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
                updateChuyenMuc(){
                    axios
                        .post('{{Route('updateChuyenMuc')}}', this.edit_cm)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.loadData();
                                $('#editModal').modal('hide');

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
                deleteChuyenMuc(){
                    axios
                        .post('{{Route('destroyChuyenMuc')}}', this.delete_cm)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.loadData();
                                $('#deleteModal').modal('hide');

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
                changeIsOpen(v) {
                    axios
                        .post('{{ Route('updateStatusChuyenMuc') }}', v)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                                this.loadData();
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
                loadData() {
                    axios
                        .get('{{ Route('getDataChuyenMuc') }}')
                        .then((res) => {
                            this.list_cm = res.data.data;
                        });
                },
            },
        });
    </script>
@endsection
