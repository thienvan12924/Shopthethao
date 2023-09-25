@extends('Admin.Share.master')
@section('title')
    <h1 class="text-center mb-4" style="padding-top: 30px"> Thống Kê Đơn Hàng Nhập Kho
    </h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ Route('postThongKeNhapKho') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <input type="date" name="from_date" class="form-control"
                                    value="{{ Carbon\Carbon::parse($begin)->format('Y-m-d') }}">
                            </div>
                            <div class="col-md-5">
                                <input type="date" name="end_date" class="form-control"
                                    value="{{ Carbon\Carbon::parse($end)->format('Y-m-d') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Thống Kê</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4" >
                            <div class="table-responsive" style="max-height: 450px">
                            <table class="table table-bordered" >
                                <thead>
                                    <tr class="text-center bg-primary">
                                        <th>#</th>
                                        <th>Ngày</th>
                                        <th>Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr class="bg-light">
                                            <th class="text-center">{{ $key + 1 }}</th>
                                            <td class="text-center">{{ $value->date }}</td>
                                            <td class="text-end">{{ number_format($value->total, 0, ',', '.') }} đ</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var labels = {!! json_encode($labels) !!};
        var data_js = {!! json_encode($data_js) !!};

        const data = {
            labels: labels,
            datasets: [{
                label: 'Thống Kê',
                // // backgroundColor: 'rgb(77, 67, 222)',
                // borderColor: 'rgb(75, 192, 192)',
                data: data_js,
                // backgroundColor: [
                //     'rgba(255, 99, 132, 0.2)',
                //     'rgba(255, 159, 64, 0.2)',
                //     'rgba(255, 205, 86, 0.2)',
                //     'rgba(75, 192, 192, 0.2)',
                //     'rgba(54, 162, 235, 0.2)',
                //     'rgba(153, 102, 255, 0.2)',
                //     'rgba(201, 203, 207, 0.2)'
                // ],
                // borderColor: [
                //     'rgb(255, 99, 132)',
                //     'rgb(255, 159, 64)',
                //     'rgb(255, 205, 86)',
                //     'rgb(75, 192, 192)',
                //     'rgb(54, 162, 235)',
                //     'rgb(153, 102, 255)',
                //     'rgb(201, 203, 207)'
                // ],
                borderWidth: 1
            }]
        };
        const config = {
            type: 'doughnut',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        // const config = {
        //   type: 'bar',
        //   data: data,
        //   options: {}
        // };
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endsection
