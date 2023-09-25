@extends('client.share.master')
@section('content')
{{-- <div class="section">
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                @foreach ($baiViet as $value)
                    <div class="single_post">
                        <h2 class="blog_title">{{$value->tieu_de}}</h2>
                        <ul class="list_none blog_meta">
                            <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                            <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                        </ul>
                        <div class="blog_img">
                            <img src="{{$value->hinh_anh}}" alt="">
                        </div>
                        <div class="blog_content">
                            <div class="blog_text">
                                <p>{{$value->noi_dung}}
                                </p>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>
    </div>
</div> --}}
<div class="section">
	<div class="container">
        <div class="row">
            @foreach ($baiViet as $value)
            <div class="col-lg-4 col-md-6">
                    <div class="blog_post blog_style2 box_shadow1">
                        <div class="blog_img">
                            <a href="blog-single.html">
                                <img src="{{$value->hinh_anh}}" alt="blog_small_img1">
                            </a>
                        </div>
                        <div class="blog_content bg-white">
                            <div class="blog_text">
                                <h5 class="blog_title"><a href="/blog/{{ $value->id }}">
                                   {{$value->tieu_de}} </a></h5>
                                <ul class="list_none blog_meta">
                                    <li><a href="#"><i class="ti-calendar"></i>{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y') }}</a></li>
                                    <li><a href="#"><i class="ti-comments"></i> 10</a></li>
                                </ul>
                                <p>{{ substr($value->noi_dung, 0, 100) . '...' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            {{-- <div class="col-lg-4 col-md-6">
                <div class="blog_post blog_style2 box_shadow1">
                    <div class="blog_img">
                        <a href="blog-single.html">
                            <img src="assets/images/blog_small_img2.jpg" alt="blog_small_img2">
                        </a>
                    </div>
                    <div class="blog_content bg-white">
                        <div class="blog_text">
                            <h5 class="blog_title"><a href="blog-single.html">On the other hand we provide denounce with righteous</a></h5>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                <li><a href="#"><i class="ti-comments"></i> 12</a></li>
                            </ul>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>

    </div>
</div>
@endsection
@section('js')


@endsection
