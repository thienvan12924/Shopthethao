@extends('Client.Share.master')
@section('content')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container">
            <!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Đăng nhập</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">Đăng nhập</li>
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
                                <h3>Đăng nhập</h3>
                            </div>

                            <div class="form-group">
                                <input autocomplete="off" class="form-control" v-model="email" type="email" required=""
                                    placeholder="Nhập Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="password1" required="" type="password" v-model="password"
                                    placeholder="Nhập Mật Khẩu">
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="show-password">
                                        <label class="form-check-label" for="show-password"><span>Hiển mật
                                                khẩu</span></label>
                                    </div>
                                </div>
                                <a href="/reset">Quên mật khẩu?</a>
                            </div>
                            <div class="form-group">
                                <button type="button" v-on:click="login()" class="btn btn-fill-out btn-block">Đăng
                                    nhập</button>
                            </div>


                            <div class="form-note text-center">Bạn chưa có tài khoản <a href="/register">Đăng ký</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->
    <script></script>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#show-password').click(function() {
                if ($(this).is(':checked')) {
                    $('#password1').attr('type', 'text');
                } else {
                    $('#password1').attr('type', 'password');
                }
            });
        });
    </script>
    <script>
        new Vue({
            el: '#app',
            data: {
                email: '',
                password: '',
            },
            methods: {
                login() {
                    var payload = {
                        'email': this.email,
                        'password': this.password,
                    };

                    axios
                        .post('/login', payload)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success("Đã login thành công!");
                                window.location.href = "/";
                            } else if (res.data.status == 2) {
                                toastr.warning("Tài khoản chưa kích hoạt!");
                            } else {
                                toastr.error("Đăng nhập thất bại");
                            }
                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                },
            },
        })
    </script>
@endsection
