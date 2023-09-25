@extends('Client.share.master')
@section('content')
    <!-- START SECTION BREADCRUMB -->
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
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
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
                                <h3>Nhập tài khoản</h3>
                            </div>
                            <form>
                                <div class="form-group">
                                    <input type="email" class="form-control" v-model="email"
                                        placeholder="Nhập Email">
                                </div>


                                <div class="form-group">
                                    <button type="button" v-on:click="resetPass()"
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
                email: '',
            },
            methods: {
                resetPass() {
                    var payload = {
                        'email': this.email,
                    };
                    axios
                        .post('/reset', payload)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success('Vui lòng kiểm tra Email!');
                                window.location.replace("/");
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
