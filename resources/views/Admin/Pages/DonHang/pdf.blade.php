<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@1,700&family=Roboto:ital@1&display=swap"
        rel="stylesheet">
    <title>Hóa đơn</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    {{-- <div class="container"> --}}
    <h1 class="text-center">HÓA ĐƠN</h1>
    <hr>
    <div class="row mb-3">
        <div class="col-4">
            <strong>Mã đơn hàng:</strong> {{ $data->bill_name }} |
            <strong>Ngày đặt hàng:</strong> {{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }} |
            <strong>Email:</strong> {{ $data->customer_email }}
        </div>

    </div>
    <hr>
    <div class="row">
        <table class="table table-bordered" border="1">
            <thead>

                <th>Nội Dung Hàng</th>
                <th>Số Lượng</th>
                <th>Đơn Giá</th>


            </thead>
            <tbody>
                <th>
                    @foreach ($chi_tiet_don_hang as $key => $value)
                        {{ $value->ten_san_pham }}
                        <br>
                    @endforeach
                </th>
                <th>
                    @foreach ($chi_tiet_don_hang as $key => $value)
                        {{ $value->so_luong_mua }}
                        <br>
                    @endforeach
                </th>
                <th>
                    @foreach ($chi_tiet_don_hang as $key => $value)
                        {{ number_format($value->don_gia_mua) }} đ
                        <br>
                    @endforeach
                </th>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="row">
        <table class="table table-bordered" border="1">
            <thead>
                <tr>
                    <th>Tên Người Nhận Hàng</th>
                    <th>{{ $data->ship_fullname }}</th>

                </tr>
                <tr>

                    <th>Số Điện Thoại Nhận Hàng</th>
                    <th>{{ $data->ship_phone }}</th>
                </tr>
                <tr>

                    <th>Địa Chỉ Nhận Hàng</th>
                    <th>{{ $data->ship_address }}</th>
                </tr>
                <tr>

                    <th>Tổng Tiền Nhận Hàng</th>
                    @if ($data->is_payment == 1)
                        <th>0 đ</th>
                    @else
                        <th>{{ number_format($data->bill_total) }} đ</th>
                    @endif

                </tr>



            </thead>

        </table>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-xeQZVvuvIpOENVax7BRE6yE0C7V23G02FYjKmRti6ziX1YUClgzdKjz3iwNO1I55" crossorigin="anonymous">
    </script>

</body>

</html>
