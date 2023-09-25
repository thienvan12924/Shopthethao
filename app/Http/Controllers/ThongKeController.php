<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThongKe\ThongKeRequset;
use App\Models\ChiTietDonHang;
use App\Models\ChiTietNhapKho;
use App\Models\HoaDonNhapKho;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function index()
    {
        $check = $this->checkRule_get(29);
        if(!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
        }

        $data = ChiTietDonHang::join('san_phams', 'san_phams.id', 'chi_tiet_don_hangs.id_san_pham')
                                ->join('hoa_dons', 'hoa_dons.id', 'chi_tiet_don_hangs.id_don_hang')
                                ->select('san_phams.ten_san_pham',
                                        DB::raw('SUM(chi_tiet_don_hangs.so_luong_mua) as so_luong'),
                                    )
                                ->groupBy('san_phams.ten_san_pham')
                                ->get();
        $array_san_pham = [];
        $array_so_luong = [];
        foreach ($data as $key => $value) {
            array_push($array_san_pham, $value->ten_san_pham);
            array_push($array_so_luong, $value->so_luong);

        }
        $tu_ngay = Carbon::today()->format("Y-m-d");
        $den_ngay = Carbon::today()->format("Y-m-d");
        return view('Admin.Pages.ThongKe.BanHang.tong_san_pham', compact('data', 'array_san_pham', 'array_so_luong', 'tu_ngay', 'den_ngay'));
    }

    public function search(ThongKeRequset $request)
    {
        $check = $this->checkRule_post(30);
        if(!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
        }

        $data = ChiTietDonHang::join('san_phams', 'san_phams.id', 'chi_tiet_don_hangs.id_san_pham')
                                ->join('hoa_dons', 'hoa_dons.id', 'chi_tiet_don_hangs.id_don_hang')
                                ->whereDate('hoa_dons.created_at', '>=', $request->day_begin)
                                ->whereDate('hoa_dons.created_at', '<=', $request->day_end)
                                ->select('san_phams.ten_san_pham',
                                        DB::raw('SUM(chi_tiet_don_hangs.so_luong_mua) as so_luong'),
                                    )
                                ->groupBy('san_phams.ten_san_pham')
                                ->get();
        $array_san_pham = [];
        $array_so_luong = [];
        foreach ($data as $key => $value) {
            array_push($array_san_pham, $value->ten_san_pham);
            array_push($array_so_luong, $value->so_luong);

        }
        $tu_ngay = Carbon::parse($request->day_begin)->format("Y-m-d");
        $den_ngay = Carbon::parse($request->day_end)->format("Y-m-d");
        return view('Admin.Pages.ThongKe.BanHang.tong_san_pham', compact('data', 'array_san_pham', 'array_so_luong', 'tu_ngay', 'den_ngay'));
    }
    public function index1()
    {
        $check = $this->checkRule_get(33);
        if(!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
        }

        $data = ChiTietNhapKho::join('san_phams', 'san_phams.id', 'chi_tiet_nhap_khos.id_san_pham')
                                ->join('hoa_don_nhap_khos', 'hoa_don_nhap_khos.id', 'chi_tiet_nhap_khos.id_hoa_don_nhap_kho')
                                ->select('san_phams.ten_san_pham',
                                        DB::raw('SUM(chi_tiet_nhap_khos.so_luong_nhap) as so_luong'),
                                    )
                                ->groupBy('san_phams.ten_san_pham')
                                ->get();
        $array_san_pham = [];
        $array_so_luong = [];
        foreach ($data as $key => $value) {
            array_push($array_san_pham, $value->ten_san_pham);
            array_push($array_so_luong, $value->so_luong);

        }
        $tu_ngay = Carbon::today()->format("Y-m-d");
        $den_ngay = Carbon::today()->format("Y-m-d");
        return view('Admin.Pages.NhapKho.tong_san_pham', compact('data', 'array_san_pham', 'array_so_luong', 'tu_ngay', 'den_ngay'));
    }

    public function search1(ThongKeRequset $request)
    {
        $check = $this->checkRule_get(34);
        if(!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
        }
        $data = ChiTietNhapKho::join('san_phams', 'san_phams.id', 'chi_tiet_nhap_khos.id_san_pham')
                                ->join('hoa_don_nhap_khos', 'hoa_don_nhap_khos.id', 'chi_tiet_nhap_khos.id_hoa_don_nhap_kho')
                                ->whereDate('hoa_don_nhap_khos.created_at', '>=', $request->day_begin)
                                ->whereDate('hoa_don_nhap_khos.created_at', '<=', $request->day_end)
                                ->select('san_phams.ten_san_pham',
                                        DB::raw('SUM(chi_tiet_nhap_khos.so_luong_nhap) as so_luong'),
                                    )
                                ->groupBy('san_phams.ten_san_pham')
                                ->get();
        $array_san_pham = [];
        $array_so_luong = [];
        foreach ($data as $key => $value) {
            array_push($array_san_pham, $value->ten_san_pham);
            array_push($array_so_luong, $value->so_luong);

        }
        $tu_ngay = Carbon::parse($request->day_begin)->format("Y-m-d");
        $den_ngay = Carbon::parse($request->day_end)->format("Y-m-d");
        return view('Admin.Pages.NhapKho.tong_san_pham', compact('data', 'array_san_pham', 'array_so_luong', 'tu_ngay', 'den_ngay'));
    }

}
