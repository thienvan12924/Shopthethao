@extends('client.share.master')
@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                    <div class="single_post">
                        <h2 class="blog_title">{{$baiViet->tieu_de}}</h2>
                        <ul class="list_none blog_meta">
                            <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                            <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                        </ul>
                        <div class="blog_img">
                            <img src="{{$baiViet->hinh_anh}}" alt="">
                        </div>
                        <div class="blog_content">
                            <div class="blog_text">
                                <p>{{$baiViet->noi_dung}}
                                </p>

                            </div>
                        </div>
                    </div>



            </div>

        </div>
    </div>
</div>

@endsection
@section('js')


@endsection
