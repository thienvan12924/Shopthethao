@extends('Admin.share.master')
@section('title')
@endsection

@section('content')
    <div class="row" id="app">
        <div class="col-md-4 ">
            <div class="card ">
                <form id="formdata" v-on:submit.prevent="addAdmin()">
                    <div class="card-header text-center">
                        <h2>Thêm Mới Tài Khoản</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Họ Và Tên</label>
                                    <input tabindex="1" class="form-control" id="name" name="name" type="text"
                                        placeholder="Nhập vào họ và tên ">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input tabindex="1" class="form-control" id="email" name="email" type="text"
                                        v-model="email" v-on:blur="checkEmail()" placeholder="Nhập vào email">
                                    <small id="message_email">@{{ message_email }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Mật Khẩu</label>
                                    <input tabindex="1" class="form-control" id="password" name="password"
                                        type="password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Nhập Lại Mật Khẩu</label>
                                    <input tabindex="1" class="form-control" id="re_password" name="re_password"
                                        type="password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Giới Tính</label>
                                    <select name="gioi_tinh" id="gioi_tinh" class="form-control">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                        <option value="2">Không xác định</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Quyền Quản Trị</label>
                                    <select name="id_quyen" id="id_quyen" class="form-control">
                                        @foreach ($quyen as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->ten_quyen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Tạo Tài Khoản</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Danh sách tài khoản Admin</h2>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-responsive" id="danhSachAdmin">
                        <thead>
                            <tr class="text-center bg-primary">
                                <th class="text-nowrap">#</th>
                                <th class="text-nowrap">Họ Và Tên</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">Giới Tính</th>
                                <th class="text-nowrap">Quyền</th>
                                <th class="text-nowrap">Password</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(v, k) in list_ds">
                                <tr class="bg-light">
                                    <th class="text-center align-middle">@{{ k + 1 }}</th>
                                    <td class="align-middle  text-nowrap">@{{ v.name }}</td>
                                    <td class="align-middle">@{{ v.email }}</td>
                                    <td class="align-middle text-center">
                                        <span v-if="v.gioi_tinh ==1">Nam</span>
                                        <span v-else-if="v.gioi_tinh ==0">Nữ</span>
                                        <span v-else="v.gioi_tinh ==2">Không Xác Định</span>
                                    </td>

                                    <td class="align-middle text-nowrap" v-if="v.id_quyen ==0">@{{ ten }}</td>
                                    <td class="align-middle text-nowrap" v-else="v.id_quyen">@{{ v.ten_quyen }}</td>

                                    <td class="align-middle"><button data-bs-toggle="modal" data-bs-target="#modalPassword"
                                            v-on:click="edit_pass = v" class="btn btn-primary"><i
                                                class="fa-solid fa-lock"></i></button></td>
                                    <td class="text-center align-middle text-nowrap">
                                        <button v-on:click="edit_ds = Object.assign({}, v)" data-bs-toggle="modal"
                                            data-bs-target="#editModal" class="btn border-0"><i
                                                class="fa fa-pencil-square text-primary"
                                                style="font-size: 25px;"></i></button>
                                        <button v-on:click="delete_ds = v" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" class="btn border-0"><i
                                                class="fa fa-trash text-danger"style="font-size: 25px"></i></button>
                                    </td>
                                </tr>
                            </template>
                            {{-- Password --}}
                            <div class="modal fade" id="modalPassword" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Đổi Mật Khẩu</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" v-model="edit_pass.id">
                                            <div class="mb-3">
                                                <label class="form-label">Mật Khẩu</label>
                                                <input type="password" class="form-control" name="password"
                                                    v-model="edit_pass.edit_pass" placeholder="Nhập vào mật khẩu mới *">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Xác Nhận Mật Khẩu</label>
                                                <input type="password" class="form-control" name="re_password"
                                                    v-model="edit_pass.re_password" placeholder="Nhập lại mật khẩu mới *">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button type="button" class="btn btn-primary"
                                                v-on:click="updatePassword()">Cập Nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Sửa --}}
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Admin</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="id" id="id_admin_edit" hidden>
                                            <div class="mb-3">
                                                <label class="form-label">Họ và tên</label>
                                                <input tabindex="1" class="form-control" id="name_edit" name="name"
                                                    v-model="edit_ds.name" type="text">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input tabindex="2" class="form-control" id="email_edit"
                                                    v-model="edit_ds.email" name="email" type="text">
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Giới Tính</label>
                                                    <select name="gioi_tinh" id="gioi_tinh_edit" class="form-control"
                                                        v-model="edit_ds.gioi_tinh">
                                                        <option value="1">Nam</option>
                                                        <option value="0">Nữ</option>
                                                        <option value="2">Không xác định</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Tình Trạng</label>
                                                    <select v-model="edit_ds.is_block" name="is_block" id="is_block"
                                                        class="form-control">
                                                        <option value="1">Đã Khóa</option>
                                                        <option value="0">Hoạt Động</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Quyền Quản Trị</label>
                                                    <select v-model="edit_ds.id_quyen" name="id_quyen" id="id_quyen_edit"
                                                        class="form-control">
                                                        <template v-for="(v, k) in list_quyen">
                                                            <option v-bind:value="v.id"> @{{ v.ten_quyen }}</option>
                                                        </template>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="button"
                                                    data-bs-dismiss="modal">Đóng</button>
                                                <button v-on:click="updateAdmin()" class="btn btn-secondary"
                                                    type="button">Lưu Thay Đổi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Xóa --}}
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xoá Admin</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" id="id_admin" hidden>
                                            <div class="alert alert-danger" role="alert">
                                                <h4 class="alert-heading">Xóa Admin!</h4>
                                                <p>Bạn có chắc chắn muốn xóa Admin <b
                                                        class="text-warning">@{{ delete_ds.name }}</b> này không?.</p>
                                                <hr>
                                                <p class="mb-0"><i>Lưu ý: Hành động không thể khôi phục
                                                        lại</i>.</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="button"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button v-on:click="xoaAdmin()" class="btn btn-danger"
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
                list_ds: [],
                edit_ds: {},
                delete_ds: {},
                edit_pass: {},
                list_quyen: [],
                modal: {},
                email: '',
                message_email: '',
                ten: 'Master',
                // password: '',
                // re_password: '',
            },
            created() {
                this.loadData();
                this.loadDataQuyen();
            },
            methods: {
                loadData() {
                    axios
                        .get('/admin-shop/admin/data')
                        .then((res) => {
                            this.list_ds = res.data.data;
                        });
                },
                addAdmin() {
                    var paramObj = {};
                    $.each($('#formdata').serializeArray(), function(_, kv) {
                        if (paramObj.hasOwnProperty(kv.name)) {
                            paramObj[kv.name] = $.makeArray(paramObj[kv.name]);
                            paramObj[kv.name].push(kv.value);
                        } else {
                            paramObj[kv.name] = kv.value;
                        }
                    });
                    axios
                        .post('/admin-shop/admin/create', paramObj)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                this.loadData();
                                this.email = '',
                                    $("#formdata").trigger("reset");
                            } else if (res.data.status == 2) {
                                toastr.warning(res.data.message);
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
                updateAdmin() {
                    axios
                        .post('/admin-shop/admin/update', this.edit_ds)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                                $('#editModal').modal('hide');
                                this.loadData()
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
                xoaAdmin() {
                    axios
                        .get('/admin-shop/admin/destroy/' + this.delete_ds.id)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                $('#deleteModal').modal('hide');
                                this.loadData();
                            } else if (res.data.status == 2) {
                                toastr.warning(res.data.message);
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
                loadDataQuyen() {
                    axios
                        .get('/admin-shop/quyen/data')
                        .then((res) => {
                            this.list_quyen = res.data.data;
                        });
                },
                checkEmail() {
                    if (this.email === '') {
                        this.message_email = "Email không được để trống!";
                        $("#message_email").addClass("text-danger");
                        $("#email").removeClass("border border-danger");
                        $("#email").addClass("border border-danger");
                        return;
                    }
                    var payload = {
                        'email': this.email,
                    };
                    axios.post('/admin-shop/admin/check-email', payload)
                        .then((res) => {
                            // Nếu true nghĩa đỏ và thông báo không được
                            if (res.data.status) {
                                this.message_email = "Email đã tồn tại!";
                                $("#message_email").addClass("text-danger");
                                $("#email").removeClass("border border-danger");
                                $("#email").addClass("border border-danger");
                            } else {
                                this.message_email = "Email có thể tạo!";
                                $("#message_email").removeClass("text-danger");
                                $("#message_email").addClass("text-primary");
                                $("#email").removeClass("border border-danger");
                                $("#email").addClass("border border-primary");
                            }
                        })
                        .catch((error) => {
                            var listError = error.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                },
                updatePassword() {

                    axios
                        .post('/admin-shop/admin/update-password', this.edit_pass)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                                $('#modalPassword').modal('hide');
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
            },
        });
    </script>
@endsection
