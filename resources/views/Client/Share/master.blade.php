<!DOCTYPE html>
<html lang="en">

<head>

    @include('Client.share.head')
</head>

<body>



    @include('Client.share.menu')
    @yield('slide')
    {{-- @include('Client.share.slide') --}}

    <!-- END MAIN CONTENT -->
    <div class="main_content">
        @yield('content')


    </div>
    <!-- END MAIN CONTENT -->

    <!-- START FOOTER -->
    @include('Client.share.footer')
    <!-- END FOOTER -->

    <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>


    @include('Client.share.js')
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/642d30d431ebfa0fe7f6989d/1gt88dfm1';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <script src="/js/app.js"></script>
    <script>
        $(document).ready(function() {
            $("#registerForm").hide();
            $("#viewRegister").click(function() {
                $("#loginForm").hide();
                $("#registerForm").show();
            });
            $("#viewLogin").click(function() {
                $("#registerForm").hide();
                $("#loginForm").show();
            });
            $("#loginForm").submit(function(e) {
                e.preventDefault();
                var payload = window.getFormData($(this));
                axios
                    .post('/login', payload)
                    .then((res) => {
                        if (res.data.status == 1) {
                            // toastr.success("Đã login thành công!");
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
            });

            $("#registerForm").submit(function(e) {
                e.preventDefault();
                var payload = window.getFormData($(this));
                axios
                    .post('/register', payload)
                    .then((res) => {
                        if (res.status) {
                            toastr.success("Mã kích hoạt đã gửi đến Email!");
                            $("#registerForm").hide();
                            $("#loginForm").show();
                        }
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            });

            $(".addToCart").click(function(e) {

                var id_san_pham = $(this).data('id');
                axios
                    .get('/client/add-to-cart/' + id_san_pham)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message);
                        } else {
                            toastr.error(res.data.message);
                        }
                    });
            });
        })
    </script>
    @yield('js')
</body>

</html>
