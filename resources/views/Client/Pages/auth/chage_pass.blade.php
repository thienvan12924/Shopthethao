@extends('Client.share.master')
@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Quên mật khẩu</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>

                    <li class="breadcrumb-item active">Quên mật khẩu</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- START LOGIN SECTION -->
<div class="login_register_wrap section" id="app">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Nhập mật khẩu</h3>
                        </div>
                        <form>
                            <div class="form-group">
                                <input type="hidden" id="hash" value="{{ $hash }}">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" v-model="password"  placeholder="Nhập Mật Khẩu">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" v-model="re_password"  placeholder="Nhập Lại Mật Khẩu">
                            </div>

                            <div class="form-group">
                                <button type="button" v-on:click="changePass()"
                                    class="btn btn-fill-out btn-block">Gửi</button>
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
            password    :   '',
            re_password :   '',
        },
        methods: {
            changePass() {
                var payload = {
                    'password'      : this.password,
                    're_password'   : this.re_password,
                    'hash'          : document.getElementById("hash").value,
                };

                axios
                    .post('/change-pass', payload)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success('Mật khẩu đã được thay đổi!');
                            window.location.href = "/login";
                        }
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            }
        },
    });
    </script>
@endsection
