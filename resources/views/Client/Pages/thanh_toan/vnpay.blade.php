<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="/vnpay/thanh-toan" method="POST">
                        @csrf
                        {{-- <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount" max="100000000" min="1" name="amount" type="number" value="{{$bill->id}}" /> --}}

                        <div class="form-group">
                            <label for="amount">Số tiền</label>
                            <input class="form-control" data-val="true"
                                data-val-number="The field Amount must be a number."
                                data-val-required="The Amount field is required." id="amount" max="100000000"
                                min="1" name="amount" type="number" value="{{ $bill->bill_total }}" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="amount">Mã Đơn Hàng</label>
                            <input class="form-control " data-val="true"
                                data-val-number="The field Amount must be a number."
                                data-val-required="The Amount field is required." id="txnRef" max="100000000"
                                min="1" name="txnRef" type="text" value="{{ $bill->bill_name }}" readonly  />
                        </div>
                        <div class="form-group mb-3">
                            <h5>Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>
                            <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                            <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>

                            <h5>Cách 2: Tách phương thức tại site của đơn vị kết nối</h5>
                            <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR">
                            <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label><br>

                            <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                            <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>

                            <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                            <label for="bankCode">Thanh toán qua thẻ quốc tế</label><br>

                        </div>
                        <div class="form-group">
                            <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                            <input type="radio" id="language" Checked="True" name="language" value="vn">
                            <label for="language">Tiếng việt</label><br>
                            <input type="radio" id="language" name="language" value="en">
                            <label for="language">Tiếng anh</label><br>

                        </div>
                        <button type="submit" class="btn btn-primary" href>Thanh toán</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        var inputElement = document.getElementById('txnRef');
        inputElement.disabled = true;
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
