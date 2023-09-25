@extends('Client.Share.master')
@section('content')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container">
            <!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Đăng Ký</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="/">Trang Chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">Đăng Ký</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section" id="app">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Tạo Tài Khoản</h3>
                            </div>
                            <form id="registerForm">
                                <div class="form-group">
                                    <input type="text" class="form-control" v-model="ho_ten" id="ho_ten"
                                        placeholder="Nhập Họ Tên">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" v-model="email" id="email"
                                        placeholder="Nhập Email">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" v-model="so_dien_thoai" id="so_dien_thoai"
                                        placeholder="Nhập Số Điện Thoại">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" v-model="password" id="password"
                                        placeholder="Nhập Mật Khẩu">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" v-model="re_password " id="re_password"
                                        placeholder="Nhập Lại Mật Khẩu">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" v-model="dia_chi " id="dia_chi"
                                        placeholder="Nhập Địa Chỉ">
                                </div>

                                <div class="form-group">
                                    <select class="form-control" v-model="sex" id="sex">
                                        <option disabled value="">Giới tính</option>
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            {{-- <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1"
                                                value="">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label> --}}
                                        </div>
                                    </div>
                                    <div class="form-note text-center"><a href="/reset">Quên mật khẩu?</a></div>

                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-fill-out btn-block" v-on:click="register()">Đăng
                                        Ký</button>
                                </div>
                            </form>

                            <div class="form-note text-center">Bạn đã có tài khoản? <a href="/login">Đăng nhập</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                'ho_ten'        : '',
                'email'         : '',
                'so_dien_thoai' : '',
                'password'      : '',
                're_password'   : '',
                'sex'           : '',
                'dia_chi'       :'',
            },

            methods: {
                register() {
                    var payload = {
                        'ho_ten'        : this.ho_ten,
                        'email'         : this.email,
                        'so_dien_thoai' : this.so_dien_thoai,
                        'password'      : this.password,
                        're_password'   : this.re_password,
                        'sex'           : this.sex,
                        'dia_chi'       : this.dia_chi,

                    };
                    axios
                        .post('/register', payload)
                        .then((res) => {
                            if (res.status) {
                                toastr.success("Mã kích hoạt đã gửi đến Email!");
                                window.location.replace("/login");
                            }
                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                },
            }
        });
    </script>
@endsection
