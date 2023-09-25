@extends('Admin.share.master')
@section('title')
    <h1 class="text-center mb-4" style="padding-top: 30px"> Quản Lý Sản Phẩm</h1>
@endsection
@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <form id="createSanPham">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới sản phẩm</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Mã sản phẩm</label>
                                    <input tabindex="1" class="form-control" name="ma_san_pham" id="ma_san_pham"
                                        type="text" placeholder="Nhập vào mã sản phẩm">

                                    <small id="message_ma_san_pham"><i></i></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tên sản phẩm</label>
                                    <input tabindex="1" class="form-control" name="ten_san_pham" id="ten_san_pham"
                                        type="text" placeholder="Nhập vào tên sản phẩm">
                                    <small id="message_ten_san_pham"><i></i></small>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Slug sản phẩm</label>
                                    <input tabindex="1" class="form-control" name="slug_san_pham" id="slug_san_pham"
                                        type="text" placeholder="Nhập vào slug sản phẩm">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Giá</label>
                                    <input tabindex="1" class="form-control" name="gia" id="gia" type="text"
                                        placeholder="Nhập giá">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Giá khuyến mãi</label>
                                    <input tabindex="1" class="form-control" name="gia_khuyen_mai" id="gia_khuyen_mai"
                                        type="text" placeholder="Nhập giá khuyến mãi">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Số lượng</label>
                                    <input tabindex="3" class="form-control" name="so_luong" type="number" id="so_luong"
                                        placeholder="Nhập số lượng" min="0">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Chi tiết</label>
                                    <textarea name="chi_tiet" id="chi_tiet" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Hình Ảnh</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a data-input="hinh_anh_chinh" data-preview="holder"
                                                class="btn btn-primary lfm">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="hinh_anh_chinh" class="form-control" type="text"
                                            name="hinh_anh_chinh">
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Hình Ảnh Phụ</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a data-input="hinh_anh_phu" data-preview="holder1"
                                                class="btn btn-primary lfm">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="hinh_anh_phu" class="form-control" type="text"
                                            name="hinh_anh_phu">
                                    </div>
                                    <div id="holder1" style="margin-top:15px;max-height:100px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Danh mục</label>
                                    <select name="ma_danh_muc_id" id="ma_danh_muc_id" class="form-control">
                                        @foreach ($danhMuc as $value)
                                            <option value={{ $value->id }}> {{ $value->ten_danh_muc }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Trạng Thái</label>
                                    <select tabindex="8" name="is_open" id="is_open" class="form-control">
                                        <option value=1>Hiển thị</option>
                                        <option value=0>Tạm tắt</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary " type="button" data-bs-dismiss="modal">Đóng</button>
                        <button class="btn btn-secondary" type="submit">Thêm
                            mới</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">

                        <div class="input-group md-form form-sm form-2 pl-0">
                            <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search"
                                aria-label="Search" id="searchSanPham">
                            <div class="input-group-append">
                                <span class="input-group-text red lighten-3" id="basic-text1"><i
                                        class="fas fa-search text-grey" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test"
                            data-bs-target="#exampleModal"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
                    </div>
                </div>



                <div class="mt-4 table-responsive">
                    <table class="table table-bordered table-responsive" id="listSanPham">
                        <thead>
                            <tr class="text-center bg-primary text-nowrap">
                                <th scope="col"><b>#</b></th>
                                <th scope="col"><b>Mã sản phẩm</b></th>
                                <th scope="col"><b>Tên sản phẩm</b></th>
                                <th scope="col"><b>Hình ảnh chính</b></th>
                                <th scope="col"><b>Hình ảnh phụ</b></th>
                                <th scope="col"><b>Số lượng</b></th>
                                <th scope="col"><b>Danh mục</b></th>
                                <th scope="col"><b>Giá</b></th>
                                <th scope="col"><b>Giá khuyến mãi</b></th>
                                <th scope="col"><b>Chi tiết</b></th>
                                <th scope="col"><b>Trạng thái</b></th>
                                <th scope="col"><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- Sửa --}}
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <form id="updateSanPham">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="exampleModalLabel">Cập Nhật Dịch
                                                    Vụ
                                                </h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" name="id" id="id_san_pham_edit" hidden>

                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Mã sản phẩm</label>
                                                                <input tabindex="1" class="form-control"
                                                                    name="ma_san_pham" id="ma_san_pham_edit"
                                                                    type="text" placeholder="Nhập vào tiêu đề">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Tên sản phẩm</label>
                                                                <input tabindex="1" class="form-control"
                                                                    name="ten_san_pham" id="ten_san_pham_edit"
                                                                    type="text" placeholder="Nhập vào tiêu đề">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Slug sản phẩm</label>
                                                                <input tabindex="1" class="form-control"
                                                                    name="slug_san_pham" id="slug_san_pham_edit"
                                                                    type="text" placeholder="Nhập vào tiêu đề">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Giá</label>
                                                                <input tabindex="1" class="form-control" name="gia"
                                                                    id="gia_edit" type="text"
                                                                    placeholder="Nhập vào tiêu đề">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Giá khuyến mãi</label>
                                                                <input tabindex="1" class="form-control"
                                                                    name="gia_khuyen_mai" id="gia_khuyen_mai_edit"
                                                                    type="text" placeholder="Nhập vào tiêu đề">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Số lượng</label>
                                                                <input tabindex="3" class="form-control"
                                                                    name="so_luong" id="so_luong_edit" type="number"
                                                                    placeholder="Nhập số lượng sản phẩm">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Danh mục</label>
                                                                <select name="ma_danh_muc_id" id="ma_danh_muc_id_edit"
                                                                    class="form-control">
                                                                    @foreach ($danhMuc as $value)
                                                                        <option value={{ $value->id }}>
                                                                            {{ $value->ten_danh_muc }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Chi tiết</label>
                                                                <textarea name="chi_tiet" id="chi_tiet_edit" cols="30" rows="5" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Hình Ảnh Chính</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <a data-input="hinh_anh_chinh_edit"
                                                                            data-preview="edit_holder"
                                                                            class="btn btn-primary lfm">
                                                                            <i class="fa fa-picture-o"></i> Choose
                                                                        </a>
                                                                    </span>
                                                                    <input id="hinh_anh_chinh_edit" class="form-control"
                                                                        type="text" name="hinh_anh_chinh">
                                                                </div>
                                                                <div id="edit_holder"
                                                                    style="margin-top:15px;max-height:100px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Hình Ảnh Phụ</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <a data-input="hinh_anh_phu_edit"
                                                                            data-preview="edit_holder1"
                                                                            class="btn btn-primary lfm">
                                                                            <i class="fa fa-picture-o"></i> Choose
                                                                        </a>
                                                                    </span>
                                                                    <input id="hinh_anh_phu_edit" class="form-control"
                                                                        type="text" name="hinh_anh_phu">
                                                                </div>
                                                                <div id="edit_holder1"
                                                                    style="margin-top:15px;max-height:100px;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Trạng Thái</label>
                                                                <select tabindex="8" name="is_open" id="is_open_edit"
                                                                    class="form-control">
                                                                    <option value=1>Hiển thị</option>
                                                                    <option value=0>Tạm tắt</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" type="button"
                                                            data-bs-dismiss="modal">Đóng</button>
                                                        <button class="btn btn-secondary" type="submit">Lưu Thay
                                                            Đổi</button>
                                                    </div>
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
                                            <h5 class="modal-title" id="exampleModalLabel">Xoá sản phẩm</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" id="id_san_pham_delete" hidden>
                                            <div class="alert alert-secondary" role="alert">
                                                <h4 class="alert-heading">Xóa sản phẩm!</h4>
                                                <p>Bạn có chắc chắn muốn xóa sản phẩm này không?.</p>
                                                <hr>
                                                <p class="mb-0"><i>Lưu ý: Hành động không thể khôi phục
                                                        lại</i>.</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="button"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button id="deleteSanPham" class="btn btn-secondary" type="button"
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            function converToSlug(str) {
                str = str.toLowerCase();

                str = str
                    .normalize('NFD') // chuyển chuỗi sang unicode tổ hợp
                    .replace(/[\u0300-\u036f]/g, ''); // xóa các ký tự dấu sau khi tách tổ hợp

                // Thay ký tự đĐ
                str = str.replace(/[đĐ]/g, 'd');

                // Xóa ký tự đặc biệt
                str = str.replace(/([^0-9a-z-\s])/g, '');

                // Xóa khoảng trắng thay bằng ký tự -
                str = str.replace(/(\s+)/g, '-');

                // Xóa ký tự - liên tiếp
                str = str.replace(/-+/g, '-');

                // xóa phần dư - ở đầu & cuối
                str = str.replace(/^-+|-+$/g, '');

                // return
                return str;
            };

            function formatNumber(number) {
                return new Intl.NumberFormat('vi-VI', {
                    style: 'currency',
                    currency: 'VND'
                }).format(number);
            }



            $("#ten_san_pham").keyup(function() {
                var ten_san_pham = $("#ten_san_pham").val();
                var slug = converToSlug(ten_san_pham);
                $("#slug_san_pham").val(slug);
            });
            $("#ten_san_pham_edit").keyup(function() {
                var ten_san_pham = $("#ten_san_pham_edit").val();
                var slug = converToSlug(ten_san_pham);
                $("#slug_san_pham_edit").val(slug);
            });
            $("#createSanPham").submit(function(e) {
                e.preventDefault();
                var payload = window.getFormData($(this));
                axios
                    .post('/admin-shop/san-pham/create', payload)
                    .then((res) => {
                        toastr.success("Đã thêm mới thành công!");
                        $('#createSanPham').trigger('reset');
                        loadData();
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            });


            $("#ma_san_pham").blur(function() {
                var payload = {
                    'ma_san_pham': $("#ma_san_pham").val(),
                };
                $.ajax({
                    url: '/admin-shop/san-pham/check-product-id',
                    type: 'post',
                    data: payload,
                    success: function(res) {
                        // Nếu true nghĩa đỏ và thông báo không được
                        if (res.status) {
                            $("#message_ma_san_pham").text("Mã sản phẩm đã tồn tại!");
                            $("#message_ma_san_pham").addClass("text-danger");
                            $("#ma_san_pham").removeClass("border border-danger");
                            $("#ma_san_pham").addClass("border border-danger");
                            $("#createSanPham").prop('disabled', true);
                        } else {
                            $("#message_ma_san_pham").text("Mã sản phẩm có thể tạo!");
                            $("#message_ma_san_pham").removeClass("text-danger");
                            $("#message_ma_san_pham").addClass("text-primary");
                            $("#ma_san_pham").removeClass("border border-danger");
                            $("#ma_san_pham").addClass("border border-primary");
                            $("#createSanPham").prop('disabled', false);
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
            $("#ten_san_pham").blur(function() {
                var payload = {
                    'ten_san_pham': $("#ten_san_pham").val(),
                };
                $.ajax({
                    url: '/admin-shop/san-pham/check-product-id2',
                    type: 'post',
                    data: payload,
                    success: function(res) {
                        // Nếu true nghĩa đỏ và thông báo không được
                        if (res.status) {
                            $("#message_ten_san_pham").text("Tên sản phẩm đã tồn tại!");
                            $("#message_ten_san_pham").addClass("text-danger");
                            $("#ten_san_pham").removeClass("border border-danger");
                            $("#ten_san_pham").addClass("border border-danger");
                            $("#createSanPham").prop('disabled', true);
                        } else {
                            $("#message_ten_san_pham").text("Tên sản phẩm có thể tạo!");
                            $("#message_ten_san_pham").removeClass("text-danger");
                            $("#message_ten_san_pham").addClass("text-primary");
                            $("#ten_san_pham").removeClass("border border-danger");
                            $("#ten_san_pham").addClass("border border-primary");
                            $("#createSanPham").prop('disabled', false);
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


            $("body").on('click', '.edit', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/admin-shop/san-pham/edit/' + id,
                    type: 'get',
                    success: function(res) {
                        if (res.status) {
                            $("#id_san_pham_edit").val(res.data.id);
                            $("#ma_san_pham_edit").val(res.data.ma_san_pham);
                            $("#ten_san_pham_edit").val(res.data.ten_san_pham);
                            $("#slug_san_pham_edit").val(res.data.slug_san_pham);
                            $("#ma_danh_muc_id_edit").val(res.data.ma_danh_muc_id);
                            $("#gia_edit").val(res.data.gia);
                            $("#gia_khuyen_mai_edit").val(res.data.gia_khuyen_mai);
                            $("#chi_tiet_edit").val(res.data.chi_tiet);
                            $("#is_open_edit").val(res.data.is_open);
                            $("#so_luong_edit").val(res.data.so_luong);
                            var a = res.data.hinh_anh_chinh.split(',');
                            var html_hinh_anh = '';
                            for (i = 0; i < a.length; i++) {
                                html_hinh_anh += '<img src="' + a[i] +
                                    '" style="height: 5rem;">';
                            }
                            $("#edit_holder").html(html_hinh_anh);
                            $("#hinh_anh_chinh_edit").val(res.data.hinh_anh_chinh);

                            var b = res.data.hinh_anh_phu.split(',');
                            var html_hinh_anh_2 = '';
                            for (i = 0; i < b.length; i++) {
                                html_hinh_anh_2 += '<img src="' + b[i] +
                                    '" style="height: 5rem;">';
                            }
                            $("#edit_holder1").html(html_hinh_anh_2);
                            $("#hinh_anh_phu_edit").val(res.data.hinh_anh_phu);
                        } else {
                            toastr.error("Dich vụ không tồn tại!");
                        }
                    },
                });

            });
            $("#updateSanPham").submit(function(e) {
                e.preventDefault();
                var payload = window.getFormData($(this));
                axios
                    .post('/admin-shop/san-pham/update', payload)
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
                var san_pham = $(this).data('id');
                $("#id_san_pham_delete").val(san_pham);
            });
            $('#deleteSanPham').click(function() {
                var id = $("#id_san_pham_delete").val();
                axios
                    .get('/admin-shop/san-pham/destroy/' + id)
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
                    .get('/admin-shop/san-pham/update-status/' + id)
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
                    .get('/admin-shop/san-pham/data')
                    .then((res) => {
                        var content = '';
                        //var a = res.data.hinh_anh.split(',');
                        $.each(res.data.data, function(key, value) {
                            content += '<tr class="text-nowrap text-center bg-light">';
                            content += '<td scope="col" class="text-center"><b>' + (key + 1) +
                                '</b></td>';
                            content += '<td scope="col">' + value.ma_san_pham + '</td>';
                            content += '<td scope="col">' + value.ten_san_pham + '</td>';
                            // for (i = 0; i < value.hinh_anh.length; i++) {
                            //     content+= '<img src="' + value.hinh_anh.length[i] +'" style="height: 5rem;">';
                            // }
                            content += '<td><img class="img-thumbnail" style="width: 50px" src="' +
                                value.hinh_anh_chinh + '"></td>';
                            content += '<td><img class="img-thumbnail" style="width: 50px" src="' +
                                value.hinh_anh_phu + '"></td>';
                            content += '<td scope="col">' + value.so_luong + '</td>';
                            content += '<td scope="col">' + value.ten_danh_muc + '</td>';
                            content += '<td scope="col">' + formatNumber(value.gia) + '</td>';
                            content += '<td scope="col">' + formatNumber(value.gia_khuyen_mai) +
                                '</td>';
                            content += '<td scope="col">' + value.chi_tiet + '</td>';
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
                            // for (i = 0; i < a.length; i++) {
                            //     '+' content+= '<img src="' + a[i] +
                            //         '" style="height: 5rem;">';
                            // }
                            // 'for(''<img class="img-thumbnail" style="width: 50px" src="' +value.hinh_anh + '">'
                        });
                        $("#listSanPham tbody").html(content);
                    })

            }

            $("#searchSanPham").keyup(function() {
                var search = $("#searchSanPham").val();
                var payload = {
                    'search': search,
                };
                console.log(payload);
                axios
                    .post('/admin-shop/san-pham/search', payload)
                    .then((res) => {
                        this.listSanPham = res.data.data;
                        var content = '';
                        //var a = res.data.hinh_anh.split(',');
                        $.each(res.data.data, function(key, value) {
                            content += '<tr class="text-nowrap text-center bg-light">';
                            content += '<td scope="col" class="text-center"><b>' + (key + 1) +
                                '</b></td>';
                            content += '<td scope="col">' + value.ma_san_pham + '</td>';
                            content += '<td scope="col">' + value.ten_san_pham + '</td>';
                            // for (i = 0; i < value.hinh_anh.length; i++) {
                            //     content+= '<img src="' + value.hinh_anh.length[i] +'" style="height: 5rem;">';
                            // }
                            content += '<td><img class="img-thumbnail" style="width: 50px" src="' +
                                value.hinh_anh_chinh + '"></td>';
                            content += '<td><img class="img-thumbnail" style="width: 50px" src="' +
                                value.hinh_anh_phu + '"></td>';
                            content += '<td scope="col">' + value.so_luong + '</td>';
                            content += '<td scope="col">' + value.ten_danh_muc + '</td>';
                            content += '<td scope="col">' + formatNumber(value.gia) + '</td>';
                            content += '<td scope="col">' + formatNumber(value.gia_khuyen_mai) +
                                '</td>';
                            content += '<td scope="col">' + value.chi_tiet + '</td>';
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
                            // for (i = 0; i < a.length; i++) {
                            //     '+' content+= '<img src="' + a[i] +
                            //         '" style="height: 5rem;">';
                            // }
                            // 'for(''<img class="img-thumbnail" style="width: 50px" src="' +value.hinh_anh + '">'
                        });
                        $("#listSanPham tbody").html(content);
                    });
            });

        })
    </script>
@endsection
