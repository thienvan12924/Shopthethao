@extends('Admin.Share.master')
@section('title')
<h1 class="text-center mb-4" style="padding-top: 30px"> Slide</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <form id="createSlide">
                    <div class="mb-3">
                        <h4 class="form-label">Thêm mới Slide </h4>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hình Ảnh</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="hinh_anh">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hiển Thị</label>
                        <select name="is_open" class="form-control">
                            <option value=1>Hiển Thị</option>
                            <option value=0>Tạm Tắt</option>
                        </select>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-secondary" type="submit">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Danh sách Slide</h4>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-responsive" id="listSlide">
                    <thead>
                        <tr class="text-center  bg-primary text-nowrap">
                            <th scope="col"><b>#</b></th>
                            <th scope="col"><b>Hình ảnh</b></th>
                            <th scope="col"><b>Trạng thái</b></th>
                            <th scope="col"><b>Action</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Sửa --}}
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form id="updateSlide">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Danh Mục</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="id" id="id_slide_edit" hidden>
                                            <div class="mb-3">
                                                <label class="form-label">Hình Ảnh</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a data-input="hinh_anh_edit" data-preview="edit_holder"
                                                            class="btn btn-primary lfm">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="hinh_anh_edit" class="form-control" type="text"
                                                        name="hinh_anh">
                                                </div>
                                                <div id="edit_holder" style="margin-top:15px;max-height:100px;">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Hiển Thị</label>
                                                <select name="is_open" id="is_open_edit" class="form-control">
                                                    <option value=1>Hiển Thị</option>
                                                    <option value=0>Tạm Tắt</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="button"
                                                    data-bs-dismiss="modal">Đóng</button>
                                                <button id="updateLoaisp" class="btn btn-secondary"
                                                    type="submit">Lưu</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- Xóa --}}
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xóa Slide</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" id="id_slide" hidden>
                                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading">Xóa Slide!</h4>
                                            <p>Bạn có chắc chắn muốn xóa không?.</p>
                                            <hr>
                                            <p class="mb-0"><i>Lưu ý: Hành động không thể khôi phục
                                                    lại</i>.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="button"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button id="deleteSlide" class="btn btn-danger" data-bs-dismiss="modal"
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
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('.lfm').filemanager('image', {
            prefix: '/laravel-filemanager'
        });
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        $(document).ready(function() {
            $("#createSlide").submit(function(e) {
                e.preventDefault();
                var payload = window.getFormData($(this));
                axios
                    .post('/admin-shop/slide/create', payload)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success('Thêm mới thành công!');
                            $('#createSlide').trigger('reset');
                            loadData();
                        }
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            });
            $("body").on('click', '.edit', function() {
                var id = $(this).data('id');
                axios
                    .get('/admin-shop/slide/edit/' + id)
                    .then((res) => {
                        if (res.data.status) {
                            $("#id_slide_edit").val(res.data.data.id);

                            $("#is_open_edit").val(res.data.data.is_open);
                            var a = res.data.data.hinh_anh.split(',');
                            var html_hinh_anh = '';
                            for (i = 0; i < a.length; i++) {
                                html_hinh_anh += '<img src="' + a[i] +
                                    '" style="height: 5rem;">';
                            }
                            $("#edit_holder").html(html_hinh_anh);
                            $("#hinh_anh_edit").val(res.data.data.hinh_anh);
                        } else {
                            toastr.error("Bài viết không tồn tại!");
                        }
                    })
            });
            $("#updateSlide").submit(function(e) {
                e.preventDefault();
                var payload = window.getFormData($(this));
                axios
                    .post('/admin-shop/slide/update', payload)
                    .then((res) => {
                        toastr.success("Đã cập nhật thành công!");
                        loadData();
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            });
            $('body').on('click', '.delete', function() {
                var dich_vu = $(this).data('id');
                $("#id_slide").val(dich_vu);
            });
            $('#deleteSlide').click(function() {
                var id = $("#id_slide").val();
                axios
                    .get('/admin-shop/slide/destroy/' + id)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success("Đã xóa thành công!");
                            loadData();
                        } else {
                            toastr.error("Không tồn tại!");
                        }
                    })
            });
            $('body').on('click', '.doiTrangThai', function() {
                var id = $(this).data('id');
                axios
                    .get('/admin-shop/slide/update-status/' + id)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success("Đã cập nhật trạng thái thành công!");
                            loadData();
                        } else {
                            toastr.error(res.data.message);
                        }
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            });
            loadData();

            function loadData() {
                axios
                    .get('/admin-shop/slide/data')
                    .then((res) => {
                        var content = '';
                        //var a = res.data.hinh_anh.split(',');
                        $.each(res.data.data, function(key, value) {
                            content += '<tr class="text-nowrap text-center bg-light">';
                            content += '<td scope="col" class="text-center"><b>' + (key + 1) +
                                '</b></td>';
                            content += '<td><img class="img-thumbnail" style="width: 50px" src="' +
                                value.hinh_anh + '"></td>';

                            content += '<td>';
                            if (value.is_open == 1) {
                                content +=
                                    '<button class="btn btn-success doiTrangThai" data-id="' +
                                    value.id + '">Hiển thị</button>';
                            } else {
                                content +=
                                    '<button class="btn btn-danger doiTrangThai"data-id="' +
                                    value.id + '">Tạm tắt</button>';
                            }
                            content += '</td>';
                            content += '<td class="text-nowrap text-center">';
                            content +=
                                '<button type="button" class="btn edit" data-id="' +
                                value.id +
                                '" data-bs-toggle="modal" style="width: 0px" data-bs-target="#editModal"><i class="fa fa-pencil-square text-primary"style="font-size: 20px"></i></i><span class="ps-3 text-success"></button>';
                            content +=
                                '<button type="button" class="btn delete" data-id="' +
                                value.id +
                                '" data-bs-toggle="modal" style="width: 0px" data-bs-target="#deleteModal" style="margin-left: 10px"><i class="fa fa-trash text-danger"style="font-size: 20px"></i></i><span class="ps-3 text-success"></button>';
                            content += '</td>';
                            content += '</tr>';

                        });
                        $("#listSlide tbody").html(content);
                    })

            }
        })
    </script>
@endsection
