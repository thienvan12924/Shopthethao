<?php

namespace App\Providers;

use App\Models\ChuyenMuc;
use App\Models\DanhMuc;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        $danhMuc = DanhMuc::where('is_open', 1)->orderBy('ten_danh_muc')->get();
        view()->share('danhMuc', $danhMuc);
        $top4DanhMuc = DanhMuc::where('is_open', 1)->where('id_danh_muc_cha', 0)->inRandomOrder()->orderBy('ten_danh_muc')->take(4)->get();
        view()->share('top4DanhMuc', $top4DanhMuc);
        $top5DanhMuc = DanhMuc::where('is_open', 1)->where('id_danh_muc_cha', 0)->orderBy('ten_danh_muc')->get();
        view()->share('top5DanhMuc', $top5DanhMuc);
        $chuyen_muc = ChuyenMuc::where('is_open', 1)->get();
        view()->share('chuyen_muc', $chuyen_muc);
    }
}
