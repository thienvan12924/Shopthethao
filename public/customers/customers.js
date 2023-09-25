$(document).ready(function () {
    $("#loginForm").submit(function (e) {
        e.preventDefault();
        var payload = window.getFormData($(this));
        axios
            .post('/login', payload)
            .then((res) => {
                if (res.data.status == 1) {
                    // toastr.success("Đã login thành công!");
                    location.reload();
                } else if (res.data.status == 2) {
                    toastr.warning("Tài khoản chưa kích hoạt!");
                } else {
                    toastr.error("Đăng nhập thất bại");
                }
            })
            .catch((res) => {
                var listError = res.response.data.errors;
                $.each(listError, function (key, value) {
                    toastr.error(value[0]);
                });
            });
    });

    $("#registerForm").submit(function (e) {
        e.preventDefault();
        var payload = window.getFormData($(this));
        axios
            .post('/register', payload)
            .then((res) => {
                if (res.status) {
                    toastr.success("Mã kích hoạt đã gửi đến Email!");
                }
            })
            .catch((res) => {
                var listError = res.response.data.errors;
                $.each(listError, function (key, value) {
                    toastr.error(value[0]);
                });
            });
    });

    $(".addToCart").click(function (e) {

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
