@extends('Admin.share.master')
@section('title')
    <h1 class="text-center mb-4" style="padding-top: 30px"> Quản lý Admin</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 ">
            <div class="card ">
                <form id="formCreate">
                    <div class="card-header text-center">
                        <h2><b>Thêm Mới Tài Khoản</b></h2>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Họ Và Tên</label>
                                    <input tabindex="1" class="form-control" id="name" name="name" type="text"
                                        placeholder="Nhập vào họ và tên của tài khoản quản trị">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input tabindex="1" class="form-control" id="email" name="email" type="text"
                                        placeholder="Nhập vào email của tài khoản quản trị">
                                    <small class="text-danger" id="message_email"></small>
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
                                    <select name="is_quyen" id="is_quyen" class="form-control">
                                        @foreach ($quyen as $key => $value)

                                        <option value="{{$value->id}}">{{$value->ten_quyen}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="button" id="createAdmin">Tạo Tài Khoản</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2><b>Danh sách tài khoản Admin</b></h2>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-responsive" id="danhSachAdmin">
                        <thead>
                            <tr class="text-center bg-primary">
                                <th scope="col"><b>#</b></th>
                                <th scope="col"><b>Họ Và Tên</b></th>
                                <th scope="col"><b>Email</b></th>
                                <th scope="col"><b>Giới Tính</b></th>
                                <th scope="col"><b>Loại Admin</b></th>
                                <th scope="col"><b>Tình Trạng</b></th>
                                <th scope="col"><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>
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
                                                    type="text">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input tabindex="2" class="form-control" id="email_edit"
                                                    name="email" type="text">
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Mật Khẩu</label>
                                                    <input tabindex="1" class="form-control" id="password_edit"
                                                        name="password" type="password">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Nhập Lại Mật Khẩu</label>
                                                    <input tabindex="1" class="form-control" id="re_password_edit"
                                                        name="re_password" type="password">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Giới Tính</label>
                                                    <select name="gioi_tinh" id="gioi_tinh_edit" class="form-control">
                                                        <option value="1">Nam</option>
                                                        <option value="0">Nữ</option>
                                                        <option value="2">Không xác định</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Tình Trạng</label>
                                                    <select name="is_block" id="is_block_edit" class="form-control">
                                                        <option value="1">Đã Khóa</option>
                                                        <option value="0">Hoạt Động</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Quyền Quản Trị</label>
                                                    <select name="is_quyen" id="is_quyen_edit" class="form-control">
                                                        <option value="1">Admin Boss - Trùm</option>
                                                        <option value="0">Admin Bình Thường</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="button"
                                                    data-bs-dismiss="modal">Đóng</button>
                                                <button id="updateAdmin" class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Lưu Thay Đổi</button>
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
                                                <p>Bạn có chắc chắn muốn xóa Admin này không?.</p>
                                                <hr>
                                                <p class="mb-0"><i>Lưu ý: Hành động không thể khôi phục
                                                        lại</i>.</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="button"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button id="deleteAdmin" class="btn btn-danger" type="button"
                                                data-bs-dismiss="modal">Xóa</button>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $("#email").blur(function() {
                var payload = {
                    'email': $("#email").val(),
                };
                $.ajax({
                    url: '/admin-shop/admin/check-email',
                    type: 'post',
                    data: payload,
                    success: function(res) {
                        if (res.status) {
                            $("#message_email").html(
                                '<span class="text-primary">Email có thể được sử dụng</span>'
                            );
                        } else {
                            $("#message_email").html(
                                '<span class="text-danger">Email đã tồn tại</span>');
                        }
                    },
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });
            $("#createAdmin").click(function() {
                var payload = {
                    'email': $("#email").val(),
                    'name': $("#name").val(),
                    'password': $("#password").val(),
                    're_password': $("#re_password").val(),
                    'gioi_tinh': $("#gioi_tinh").val(),
                    'is_quyen': $("#is_quyen").val(),
                };
                $.ajax({
                    url: '/admin-shop/admin/create',
                    type: 'post',
                    data: payload,
                    success: function(res) {
                        toastr.success("Đã thêm mới tài khoản Admin thành công");
                        loadData();
                        $("#formCreate").trigger("reset");
                    },
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });


            $('body').on('click', '.edit', function() {
                var id = $(this).data('id')
                $.ajax({
                    url: '/admin-shop/admin/edit/' + id,
                    type: 'get',
                    success: function(res) {
                        if (res.status) {
                            $("#id_admin_edit").val(res.data.id);
                            $("#name_edit").val(res.data.name);
                            $("#email_edit").val(res.data.email);

                            $("#gioi_tinh_edit").val(res.data.gioi_tinh);
                            $("#is_block_edit").val(res.data.is_block);
                            $("#is_quyen_edit").val(res.data.is_quyen);

                        } else {
                            toastr.warning("Không tồn tại!");
                        }
                    }
                })

            });
            $("#updateAdmin").click(function() {
                var payload = {
                    'id': $('#id_admin_edit').val(),
                    'name': $('#name_edit').val(),
                    'email': $('#email_edit').val(),
                    'password': $('#password_edit').val(),
                    're_password': $('#re_password_edit').val(),
                    'gioi_tinh': $('#gioi_tinh_edit').val(),
                    'is_block': $('#is_block_edit').val(),
                    'is_quyen': $('#is_quyen_edit').val(),
                };
                $.ajax({
                    url: '/admin-shop/admin/update',
                    type: 'post',
                    data: payload,
                    success: function(res) {
                        if(res.status){
                            toastr.success("Đẫ cập nhật thành công !");
                            loadData();
                        }else{
                            toastr.warning(res.message);
                        }

                    },
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                })
            })

            $('body').on('click', '.delete', function() {
                var id_admin = $(this).data('id');
                $("#id_admin").val(id_admin);
            });

            $("#deleteAdmin").click(function() {
                var id = $("#id_admin").val();
                $.ajax({
                    url: '/admin-shop/admin/destroy/' + id,
                    type: 'get',
                    success: function(res) {
                        if (res.status) {
                            toastr.success("Đã xóa thành công!");
                            loadData();
                        } else {
                            toastr.warning("Tài khoảng không tồn tại!");
                        }
                    }

                })
            })
            $('body').on('click','.doiTrangThai',function(){
                var id = $(this).data('id');
                $.ajax({
                    url     :   '/admin-shop/admin/update-status/' + id,
                    type    :   'get',
                    success :   function(res) {
                        if(res.status) {
                            toastr.success("Đã cập nhật tạng thái thành công!");
                            loadData()
                        } else {
                            toastr.error(res.message);
                        }
                    },
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });
            loadData();

            function loadData() {
                $.ajax({
                    url: '/admin-shop/admin/data',
                    type: 'get',
                    success: function(res) {
                        var content = '';
                        $.each(res.data, function(key, value) {
                            content += '<tr class="text-nowrap text-center bg-light">';
                            content += '<th scope="col">' + (key + 1) + '</th>';
                            content += '<th>' + value.name + '</th>';
                            content += '<th>' + value.email + '</th>';
                            content += '<th>';
                                if (value.gioi_tinh == 1) {
                                    content += '<span class="">Nam</span>';
                                }
                                else if(value.gioi_tinh = 2) {
                                    content += '<span class="">Nữ</span>';
                                }
                                else {
                                    content += '<span class="">Không xác định</span>';
                                }
                            content += '</th>';
                            content += '<th>';
                                if (value.is_quyen == 1) {
                                    content += '<span class="">Admin Trùm</span>';
                                }
                                else {
                                    content += '<span class="">Admin Thường</span>';
                                }
                            content += '</th>';
                            content += '<td>';
                            if (value.is_block == 0) {
                                // content += '<button class="btn btn-success doiTrangThai" data-id="' +
                                //     value.id + '">Hoạt Động</button>';
                                content += '<p  class="text-success "><b>Hoạt Động</b></p>';
                            } else {
                                // content += '<button class="btn btn-danger doiTrangThai"data-id="' +
                                //     value.id + '">Đã Khóa</button>';
                                content += '<span class="text-danger"><b>Đã Khóa</b></span>';
                            }
                            content += '</td>';
                            content += '<td class="text-nowrap text-center">';
                            content +=
                                '<button type="button" class="btn btn-outline-primary  edit" data-id="' +
                                value.id +
                                '" data-bs-toggle="modal" data-bs-target="#editModal">Sửa</button>';
                            content +=
                                '<button type="button" class="btn btn-outline-danger delete" data-id="' +
                                value.id +
                                '" data-bs-toggle="modal" data-bs-target="#deleteModal" style="margin-left: 10px">Xóa</button>';
                            content += '</td>';

                            content += '</tr>';
                        });
                        $("#danhSachAdmin tbody").html(content);
                    },
                })
            }
        })
    </script>
@endsection
