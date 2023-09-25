@extends('Admin.Share.master')
@section('title')
    <h1 class="text-center mb-4" style="padding-top: 30px"> Quản Lý Loại Danh Mục</h1>
@endsection
@section('content')
    <div class="row" id="app">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="mb-3">
                        <h4 class="form-label">Thêm mới danh mục </h4>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mã danh mục</label>
                        <input tabindex="1" class="form-control" id="ma_danh_muc" v-model="ma_danh_muc" type="text"
                            placeholder="Nhập vào mã danh mục">
                        <small id="message_ma_danh_muc"><i></i></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tên danh mục</label>
                        <input tabindex="1" class="form-control" id="ten_danh_muc" v-model="ten_danh_muc" type="text"
                            v-on:keyup="chuyenDoiSlug()" placeholder="Nhập vào tên danh mục">
                        <small id="message_ten_danh_muc"><i></i></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug danh mục</label>
                        <input class="form-control" id="slug_danh_muc" v-model="slug_danh_muc" type="text"
                            placeholder="Nhập vào slug danh mục">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Danh mục cha</label>
                        <select v-model="id_danh_muc_cha" id="id_danh_muc_cha" class="form-control">
                            <option value=0>Root</option>
                            <template v-for="(v,k) in list_dm_cha">
                                <option v-bind:value="v.id">@{{ v.ten_danh_muc }}</option>

                            </template>
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="mb-3">
                            <label class="form-label">Hình Ảnh</label>
                            <input type="file" ref="fileInput" multiple v-on:change="handleFileUpload()"
                                class="form-control" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hiển Thị</label>
                        <select v-model="is_open" class="form-control">
                            <option value=1>Hiển Thị</option>
                            <option value=0>Tạm Tắt</option>
                        </select>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-secondary" v-on:click="createDanhMuc()">Thêm mới</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Danh sách Danh Mục</h4>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-responsive" id="listDanhMuc">
                        <thead>
                            <tr class="text-center bg-primary ">
                                <th class="text-nowrap">#</th>
                                <th class="text-nowrap">Mã Danh Mục</th>
                                <th class="text-nowrap">Tên Danh Mục</th>
                                <th class="text-nowrap">Danh Mục Cha</th>
                                <th class="text-nowrap">Hình Ảnh</th>
                                <th class="text-nowrap">Trạng thái</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value,key) in list_dm">
                                <th class="text-center align-middle">@{{ key + 1 }}</th>
                                <td class="align-middle  text-nowrap">@{{ value.ma_danh_muc }}</td>
                                <td class="align-middle">@{{ value.ten_danh_muc }}</td>
                                <template v-if="value.id_danh_muc_cha==0">

                                    <td class="align-middle">Root</td>
                                </template>
                                <template v-else>

                                    <td class="align-middle">@{{ value.ten_danh_muc_cha }}</td>
                                </template>

                                <td class="align-middle" style="width: 200px;">
                                    <img v-if="value.hinh_anh.startsWith('http') || value.hinh_anh.startsWith('https')"
                                        v-bind:src="value.hinh_anh" class="img-fluid br-sm shadow-sm" alt="Image title">

                                    <img v-else v-bind:src="'/Image/hinh_anh_danh_muc/'+value.hinh_anh"
                                        class="img-fluid br-sm shadow-sm" alt="Image title">
                                </td>
                                <td class="align-middle text-nowrap">

                                    <button v-if="value.is_open == 1" v-on:click="changeIsOpen(value)"
                                        class="btn btn-success">Hiển Thị</button>

                                    <button v-else v-on:click="changeIsOpen(value)" class="btn btn-danger">Tạm
                                        Tắt</button>

                                </td>
                                <td class="text-center align-middle text-nowrap">
                                    <button v-on:click="showUpdate (value) " data-bs-toggle="modal"
                                        data-bs-target="#editModal" class="btn border-0"><i
                                            class="fa fa-pencil-square text-primary"style="font-size: 25px"></i></button>
                                    <button v-on:click="delete_dm = value" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" class="btn border-0" style="margin-left: 10px"><i
                                            class="fa fa-trash text-danger"style="font-size: 25px"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Danh Mụcư</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <input type="text" v-model="edit_dm.id" hidden>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Mã danh mục</label>
                                                <input tabindex="1" class="form-control" id="ma_danh_muc"
                                                    v-model="edit_dm.ma_danh_muc" type="text"
                                                    placeholder="Nhập vào mã danh mục">
                                                <small id="message_ma_danh_muc"><i></i></small>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tên danh mục</label>
                                                <input tabindex="1" class="form-control" id="ten_danh_muc"
                                                    v-on:keyup="chuyenDoiSlugEdit()" v-model="edit_dm.ten_danh_muc"
                                                    type="text" placeholder="Nhập vào tên danh mục">
                                                <small id="message_ten_danh_muc"><i></i></small>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Slug danh mục</label>
                                                <input class="form-control" id="slug_danh_muc"
                                                    v-model="edit_dm.slug_danh_muc" type="text"
                                                    placeholder="Nhập vào slug danh mục">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Danh mục cha</label>
                                                <select v-model="edit_dm.id_danh_muc_cha" id="id_danh_muc_cha"
                                                    class="form-control">
                                                    <option value=0>Root</option>
                                                    <template v-for="(v,k) in list_dm_cha">
                                                        <option v-bind:value="v.id">@{{ v.ten_danh_muc }}</option>

                                                    </template>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Hình Ảnh</label>
                                                    {{-- <input v-model = "hinh_anh_update"  type="file" ref="fileInput" multiple
                                                        @change="handleFileUpload" class="form-control" /> --}}
                                                    <input type="file" ref="fileInput"
                                                        v-on:change="handleFileChange()" class="form-control" />
                                                    {{-- <span class="selected-file">@{{ hinh_anh_update }}</span> --}}
                                                </div>

                                                <img v-bind:src="hinh_anh_src" alt="" style="width: 200px;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Hiển Thị</label>
                                                <select v-model="edit_dm.is_open" class="form-control">
                                                    <option value=1>Hiển Thị</option>
                                                    <option value=0>Tạm Tắt</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Thoái</button>
                                            <button type="button" v-on:click="updateDanhMuc()"
                                                class="btn btn-primary">Lưu</button>
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
                                            <h5 class="modal-title" id="exampleModalLabel">Xoá danh mục</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" id="id_admin" hidden>
                                            <div class="alert alert-danger" role="alert">
                                                <h4 class="alert-heading">Xóa danh muc!</h4>
                                                <p>Bạn có chắc chắn muốn xóa danh muc <b
                                                        class="text-warning">@{{ delete_dm.ten_danh_muc }}</b> này không?.</p>
                                                <hr>
                                                <p class="mb-0"><i>Lưu ý: Hành động không thể khôi phục
                                                        lại</i>.</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="button"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button v-on:click="xoaDanhMuc()" class="btn btn-danger"
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
                ma_danh_muc: '',
                ten_danh_muc: '',
                slug_danh_muc: '',
                is_open: '',
                id_danh_muc_cha: '',
                selectedImages: '',
                hinh_anh_update: '',
                hinh_anh_src: '',
                list_dm: [],
                list_dm_cha: [],
                edit_dm: {
                    slug_danh_muc: '',

                },
                delete_dm: {},
            },
            created() {
                this.getData();
            },
            methods: {
                handleFileChange() {

                    this.hinh_anh_update = this.$refs.fileInput.files[0];

                    console.log(this.hinh_anh_update);
                },
                handleFileUpload() {
                    this.selectedImages = this.$refs.fileInput.files[0];
                    console.log(this.selectedImages);
                },
                getData() {
                    axios
                        .get('/admin-shop/danh-muc/data')
                        .then((res) => {
                            this.list_dm = res.data.data;
                            this.list_dm_cha = res.data.dataCha;
                        });
                },
                createDanhMuc() {
                    const formData = new FormData();
                    const config = {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                    formData.append('ma_danh_muc', this.ma_danh_muc);
                    formData.append('ten_danh_muc', this.ten_danh_muc);
                    formData.append('slug_danh_muc', this.slug_danh_muc);
                    formData.append('is_open', this.is_open);
                    formData.append('id_danh_muc_cha', this.id_danh_muc_cha);
                    formData.append('hinh_anh', this.selectedImages);
                    axios
                        .post('/admin-shop/danh-muc/create', formData, config)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                                this.getData();
                                this.ma_danh_muc = '';
                                this.ten_danh_muc = '';
                                this.slug_danh_muc = '';
                                this.is_open = '';
                                this.id_danh_muc_cha = '';
                                this.selectedImages = '';

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
                        .post('{{ Route('updateStatus') }}', v)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                                this.getData();
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
                showUpdate(value) {
                    this.edit_dm = Object.assign({}, value);
                    if (value.hinh_anh.startsWith("https://")) {
                        this.hinh_anh_src = value.hinh_anh;
                    } else {
                        this.hinh_anh_src = "/Image/hinh_anh_danh_muc/" + value.hinh_anh;
                    }
                    this.hinh_anh_update = value.hinh_anh;
                    console.log(this.hinh_anh_update);
                },
                updateDanhMuc() {
                    const formData = new FormData();
                    const config = {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                    formData.append('id', this.edit_dm.id);

                    formData.append('ma_danh_muc', this.edit_dm.ma_danh_muc);
                    formData.append('ten_danh_muc', this.edit_dm.ten_danh_muc);
                    formData.append('slug_danh_muc', this.edit_dm.slug_danh_muc);
                    formData.append('id_danh_muc_cha', this.edit_dm.id_danh_muc_cha);
                    formData.append('is_open', this.edit_dm.is_open);

                    formData.append('hinh_anh', this.hinh_anh_update);

                    axios
                        .post('/admin-shop/danh-muc/update', formData, config)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                                this.getData();
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
                xoaDanhMuc() {
                    axios
                        .post('{{ Route('deleteDanhMuc') }}', this.delete_dm)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message);
                                this.getData();
                                $('#deleteModal').modal('hide');

                            } else if (res.data.status == 2) {
                                toastr.info(res.data.message);
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
                converToSlug(str) {
                    str = str.toLowerCase();
                    str = str
                        .normalize('NFD') // chuyển chuỗi sang unicode tổ hợp
                        .replace(/[\u0300-\u036f]/g, ''); // xóa các ký tự dấu sau khi tách tổ hợp
                    str = str.replace(/[đĐ]/g, 'd');
                    str = str.replace(/([^0-9a-z-\s])/g, '');
                    str = str.replace(/(\s+)/g, '-');
                    str = str.replace(/-+/g, '-');
                    str = str.replace(/^-+|-+$/g, '');
                    return str;
                },

                chuyenDoiSlug() {
                    this.slug_danh_muc = this.converToSlug(this.ten_danh_muc);
                },
                chuyenDoiSlugEdit() {
                    this.edit_dm.slug_danh_muc = this.converToSlug(this.edit_dm.ten_danh_muc);
                },
            },
        });
    </script>
@endsection
