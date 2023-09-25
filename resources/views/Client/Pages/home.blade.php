@extends('Client.Share.master')
@section('content')
    @include('Client.Components.slide')
    @include('Client.Components.section')
    {{-- @include('Client.Share.model') --}}

    @include('Client.Components.exclusive_products')
    @include('Client.Components.best_disscount')
    <div class="section bg_default small_pt small_pb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shopping_info">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-shipped"></i>
                                    </div>
                                    <div class="icon_box_content">
                                        <h5 class="text-white">Giao Hàng Miễn Phí</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-money-back"></i>
                                    </div>
                                    <div class="icon_box_content">
                                        <h5 class="text-white">Đổi trả trong 30 ngày</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-support"></i>
                                    </div>
                                    <div class="icon_box_content">
                                        <h5 class="text-white">Hỗ trợ trực tuyến 27/4</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
