<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThongKe\ThongKeRequset;
use App\Models\ChiTietNhapKho;
use App\Models\HoaDonNhapKho;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HoaDonNhapKhoController extends Controller
{

    public function index()
    {
        $check = $this->checkRule_get(40);
        if(!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
	    }
        return view('Admin.Pages.NhapKho.lich_su');
    }
    public function getData()
    {
        $hoaDonNhapKho = HoaDonNhapKho::join('admins','hoa_don_nhap_khos.id_admin','admins.id')
                                    ->select('hoa_don_nhap_khos.*','admins.name')
                                    ->orderBy('hoa_don_nhap_khos.ngay_nhap_hang', 'desc')->get();
        return response()->json([
            'data'   => $hoaDonNhapKho,
        ]);
    }
    public function dataNhapKho($id)
    {
        $check = $this->checkRule_post(42);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $chiTiet = ChiTietNhapKho::where('id_hoa_don_nhap_kho', $id)
                    ->get();
        return response()->json([
            'status'  => true,
            'data' => $chiTiet,
        ]);
    }
    public function changeType(Request $request)
    {
        $check = $this->checkRule_post(41);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $hoaDonNhapKho = HoaDonNhapKho::find($request->id);
        if ($hoaDonNhapKho) {
            $hoaDonNhapKho->tinh_trang = !$hoaDonNhapKho->tinh_trang;
            $hoaDonNhapKho->save();
            return response()->json([
                'status' => true,
                'message' => 'Đã thay đổi tình trạng ' . $hoaDonNhapKho->ma_don_hang . '!',
            ]);
        }
        return response()->json([
            'status' => false,
            'message' =>   'Có lỗi xảy ra!',

        ]);
    }
    public function search(Request $request){
        $check = $this->checkRule_post(43);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $search = $request->search;
        $hoaDonNhapKho = HoaDonNhapKho::where('ma_don_hang', 'like', '%'.$search.'%')
                            ->orWhere('ngay_nhap_hang', 'like', '%'.$search.'%')
                            ->select('hoa_don_nhap_khos.*')
                            ->get();
        return response()->json([
            'status'    => true,
            'data'      => $hoaDonNhapKho,
        ]);

    }
    public function viewAnalytic($begin, $end)
    {
        $data = HoaDonNhapKho::select(DB::raw('date(created_at) as date'),  DB::raw('sum(tong_tien) as total'))
                             ->whereDate('created_at', '>=', $begin)
                             ->whereDate('created_at', '<=', $end)
                             ->groupBy('date')
                             ->get();

        return $data;
    }

    public function analytic()
    {
        $check = $this->checkRule_get(31);
        if(!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
        }
        $end     = Carbon::now();
        $begin   = Carbon::now()->subDays(10);

        $data    = $this->viewAnalytic($begin, $end);

        $labels  = [];
        $data_js = [];
        foreach ($data as $key => $value) {
            array_push($labels,  $value->date);
            array_push($data_js, $value->total);
        }

        // dd($data->toArray(), $labels, $data_js);

        return view('Admin.Pages.NhapKho.thong_ke', compact('begin', 'end', 'data', 'labels', 'data_js'));
    }

    public function analyticPost(Request $request)
    {
        $check = $this->checkRule_get(32);
        if(!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
        }
        $end    = $request->end_date;
        $begin  = $request->from_date;

        $data    = $this->viewAnalytic($begin, $end);
        $data2    = $this->viewAnalytic($begin, $end);

        $labels  = [];
        $data_js = [];

        foreach ($data as $key => $value) {
            array_push($labels,  $value->date);
            array_push($data_js, $value->total);
        }

        return view('Admin.Pages.NhapKho.thong_ke', compact('begin', 'end', 'data', 'labels', 'data_js'));
    }

}
