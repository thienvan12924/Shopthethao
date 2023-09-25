@extends('Admin.share.master')

@section('content')
    <div class="row" id="app">
        <div class="card">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm mới bài viết</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Tiêu đề</label>
                                        <input tabindex="1" class="form-control" v-model="add.tieu_de" id="tieu_de"
                                            type="text" placeholder="Nhập tiêu đề bài viết">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Chuyên mục</label>
                                        <select v-model="add.chuyenmuc_id" id="chuyenmuc_id" class="form-control">
                                            @foreach ($chuyenMuc as $value)
                                                <option value={{ $value->id }}> {{ $value->ten_chuyen_muc }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên admin</label>
                                <input type="text" v-model="add.name" class="form-control" readonly>
                            </div>

                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label">Nội dung</label>
                                    <input tabindex="1" class="form-control" v-model="add.noi_dung" id="noi_dung"
                                        type="text">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hình Ảnh</label>
                                <div class="input-group">
                                    <input type="file" ref="fileInput" multiple v-on:change="handleFileUpload()"
                                        class="form-control" />
                                </div>

                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary " type="button" data-bs-dismiss="modal">Đóng</button>
                            <button class="btn btn-secondary" v-on:click="createBaiViet()">Thêm
                                mới</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">

                        <div class="input-group md-form form-sm form-2 pl-0">
                            <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search"
                                aria-label="Search" id="searchBaiViet">
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
                    <table class="table table-bordered table-responsive" id="listBaiViet">
                        <thead>
                            <tr class="text-center bg-primary text-nowrap">
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Tên Admin</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Chuyên mục</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value,key) in list_bv">
                                <th>@{{ key + 1 }}</th>
                                <td>@{{ value.tieu_de }}</td>
                                <td>@{{ value.name }}</td>
                                <td>@{{ value.noi_dung }}</td>
                                <td>@{{ value.ten_chuyen_muc }}</td>
                                <td class="align-middle" style="width: 200px;">
                                    <img v-if="value.hinh_anh.startsWith('http') || value.hinh_anh.startsWith('https')"
                                        v-bind:src="value.hinh_anh" class="img-fluid br-sm shadow-sm" alt="Image title">

                                    <img v-else v-bind:src="'/Image/hinh_anh_bai_viet/'+value.hinh_anh"
                                        class="img-fluid br-sm shadow-sm" alt="Image title">
                                </td>
                                <td class="text-center align-middle text-nowrap">
                                    <button v-on:click="showUpdate(value)" data-bs-toggle="modal"
                                        data-bs-target="#editModal" class="btn border-0"><i
                                            class="fa fa-pencil-square text-primary"style="font-size: 25px"></i></button>
                                    <button v-on:click="delete_bv = value" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" class="btn border-0" style="margin-left: 10px"><i
                                            class="fa fa-trash text-danger"style="font-size: 25px"></i></button>
                                </td>
                            </tr>
                            {{-- Sửa --}}
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="exampleModalLabel">Cập Nhật Bài
                                                Viết
                                            </h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="id" id="id_bai_viet" hidden>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Tiêu đề</label>
                                                            <input tabindex="1" class="form-control"
                                                                v-model="edit_bv.tieu_de" id="tieu_de_edit"
                                                                type="text" placeholder="Nhập vào tiêu đề">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nội dung</label>
                                                            <input tabindex="1" class="form-control"
                                                                v-model="edit_bv.noi_dung" id="noi_dung_edit"
                                                                type="text" placeholder="Nhập vào nội dung">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Chuyên mục</label>
                                                            <select name="chuyenmuc_id" id="chuyenmuc_id_edit"
                                                                class="form-control">
                                                                @foreach ($chuyenMuc as $value)
                                                                    <option value={{ $value->id }}>
                                                                        {{ $value->ten_chuyen_muc }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label class="form-label">Hình Ảnh</label>
                                                        <div class="mb-3">
                                                            {{-- <input v-model = "hinh_anh_update"  type="file" ref="fileInput" multiple
                                                                    @change="handleFileUpload" class="form-control" /> --}}
                                                            <input type="file" ref="fileInput"
                                                                v-on:change="handleFileChange()" class="form-control" />
                                                            <span class="selected-file">@{{ hinh_anh_update }}</span>
                                                        </div>

                                                        <img v-bind:src="hinh_anh_src" alt=""
                                                            style="width: 200px;">
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="button"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                    <button class="btn btn-secondary" v-on:click="updateBaiViet()">Lưu
                                                        Thay
                                                        Đổi</button>
                                                </div>
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
                                            <h5 class="modal-title" id="exampleModalLabel">Xoá bài viết</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" id="id_san_pham_delete" hidden>
                                            <div class="alert alert-secondary" role="alert">
                                                <h4 class="alert-heading">Xóa bài viết này!</h4>
                                                <p>Bạn có chắc chắn muốn xóa <b
                                                        class="text-danger">@{{ delete_bv.tieu_de }}</b> này không?.</p>
                                                <hr>
                                                <p class="mb-0"><i>Lưu ý: Hành động không thể khôi phục
                                                        lại</i>.</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="button"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button v-on:click="deleteBaiViet()" class="btn btn-secondary" type="button"
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
        new Vue({
            el: '#app',
            data: {
                list_bv: [],
                edit_bv: {},
                delete_bv: {},
                add: {

                    id: "{{ Auth::guard('admin')->user()->id }}",
                    name: "{{ Auth::guard('admin')->user()->name }}"
                },
                selectedImages: '',
                hinh_anh_update: '',
                hinh_anh_src: '',
            },
            created() {
                this.loadData();
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
                createBaiViet() {
                    const payload = {
                        'chuyenmuc_id': this.add.chuyenmuc_id,
                        'tieu_de': this.add.tieu_de,
                        'noi_dung': this.add.noi_dung,
                        'admin_id': this.add.id,
                        'hinh_anh': this.selectedImages,
                    };
                    axios
                        .post('{{ Route('storeBaiViet') }}', payload, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                                this.loadData();
                                $("#exampleModal").modal('hide');
                                this.add.chuyenmuc_id = '';
                                this.add.tieu_de = '';
                                this.add.noi_dung = '';
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
                deleteBaiViet() {
                    axios
                        .post('{{ Route('destroyBaiViet') }}', this.delete_bv)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                                this.loadData();
                                $("#deleteModal").modal('hide');

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
                    this.edit_bv = Object.assign({}, value);
                    this.hinh_anh_src = "/Image/hinh_anh_bai_viet/" + value.hinh_anh;
                    this.hinh_anh_update = value.hinh_anh;
                    console.log(this.hinh_anh_update);
                },
                updateBaiViet() {
                    const payload = {
                        'id'            : this.edit_bv.id,
                        'chuyenmuc_id'  : this.edit_bv.chuyenmuc_id,
                        'tieu_de'       : this.edit_bv.tieu_de,
                        'noi_dung'      : this.edit_bv.noi_dung,
                        'admin_id'      : this.edit_bv.id,
                        'hinh_anh'      : this.hinh_anh_update,
                    };
                    axios
                        .post('{{Route('updateBaiViet')}}', payload, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.loadData();
                                $("#editModal").modal('hide');
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
                        .get('{{ Route('getDataBaiViet') }}')
                        .then((res) => {
                            this.list_bv = res.data.data;
                        });
                },
            },
        });
    </script>
@endsection
