@extends('Admin.share.master')
@section('title')
    <h1 class="text-center mb-4" style="padding-top: 30px"> Thống Kê</h1>
@endsection
@section('content')
    <div id="app">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ Route('postThongKeSanPham') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <label for="exampleDataList" class="form-label">Từ Ngày</label>
                                <input class="form-control" name="day_begin" type="date" placeholder="Type to search..."
                                    value="{{ $tu_ngay }}">
                            </div>
                            <div class="col-md-5">
                                <label for="exampleDataList" class="form-label">Đến Ngày</label>
                                <input class="form-control" name="day_end" type="date" placeholder="Type to search..."
                                    value="{{ $den_ngay }}">
                            </div>
                            <div class="col-md-2 mt-2">
                                <label for="exampleDataList" class="form-label"></label>
                                <button class="btn btn-success" type="submit" style="width: 100%"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" style="max-height: 450px">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center bg-primary">
                                        <th># </th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr class="bg-light">
                                            <th class="text-center align-middle">{{ $key + 1 }}</th>
                                            <td class="align-middle">{{ $value->ten_san_pham }}</td>
                                            <td class="text-center align-middle">{{ $value->so_luong }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        var lables = {!! json_encode($array_san_pham) !!};
        var datas = {!! json_encode($array_so_luong) !!};
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: lables,
                datasets: [{
                    label: 'Sản Phẩm',
                    data: datas,
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
