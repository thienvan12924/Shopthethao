<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="/assets_UI/assets_admin/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/assets_UI/assets_admin/images/favicon.png" type="image/x-icon">
    <title>Shop thể thao</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets_UI/assets_admin/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/assets_UI/assets_admin/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="/assets_UI/assets_admin/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/assets_UI/assets_admin/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="/assets_UI/assets_admin/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/assets_UI/assets_admin/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/assets_UI/assets_admin/css/style.css">
    <link id="color" rel="stylesheet" href="/assets_UI/assets_admin/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/assets_UI/assets_admin/css/responsive.css">
    {{-- @toastr_css --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="/assets_UI/assets_admin/images/login/4.png"
                    alt="looginpage"></div>
            <div class="col-xl-5">
                <div class="login-card">
                    <div>
                        <div class="login-main">
                            <form class="theme-form" autocomplete="off">
                                <h4 class="text">Sign in </h4>
                                <p>Enter your email & password to login</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email or Phone</label>
                                    <input class="form-control" id="username" name="user_name" type="email"
                                        required="" placeholder="Nhập Email hoặc SĐT">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="password" id="password"
                                            required="" placeholder="Nhập vào mật khẩu">
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div>
                                    <button class="btn btn-primary btn-block w-100" id="login" type="button">Sign
                                        in</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- latest jquery-->
        <script src="../assets/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="../assets/js/config.js"></script>
        <script src="../assets/js/script.js"></script>



        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ready(function() {

                $("#login").click(function() {
                    var payload = {
                        'username': $("#username").val(),
                        'password': $("#password").val(),
                    };
                    $.ajax({
                        url: '/admin-shop/login',
                        type: 'post',
                        data: payload,
                        success: function(res) {
                            // if (res.status) {
                            //     toastr.success('Đã login thành công!');
                            //     window.location.href = "/admin-shop/";
                            // } else {
                            //     toastr.error('Tài khoản hoặc mật khẩu không chính xác');
                            // }
                            if(res.status) {
                                toastr.success("Đăng nhập thành công!");
                                window.location.href = "/admin-shop/";
                            }else if(res.status==0){
                                toastr.warning("Tài khoản bạn đã bị khóa!");
                            }
                            else {
                                toastr.error("Tài khoản hoặc mật khẩu không chính xác!");
                            }
                        },
                        error: function(res) {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        },
                    });
                })


            });
        </script>
    </div>

</body>

</html>
