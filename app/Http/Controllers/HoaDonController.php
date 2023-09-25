<?php

namespace App\Http\Controllers;

use App\Http\Requests\HoaDon\CreateHoaDonRequest;
use App\Http\Requests\ThongKe\ThongKeRequset;
use App\Jobs\sendBillJob;
use App\Jobs\sendDonHangJob;
use App\Jobs\ThanhToanBillJob;
use App\Models\ChiTietDonHang;
use App\Models\HoaDon;
use App\Models\SanPham;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class HoaDonController extends Controller
{
    public function admin_index()
    {
        $check = $this->checkRule_get(22);
        if (!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
        }

        return view('Admin.Pages.DonHang.index');
    }
    public function getData()
    {
        $data = HoaDon::join('khach_hangs', 'hoa_dons.customer_id', 'khach_hangs.id')
            ->select('hoa_dons.*', 'khach_hangs.ho_ten')
            ->orderBy('hoa_dons.created_at', 'desc')->get();

        return response()->json([
            'bill'  => $data,
        ]);
    }
    public function exportPdf($id)
    {
        $data = HoaDon::where('id', $id)->first();
        $chi_tiet_don_hang = ChiTietDonHang::where('id_don_hang', $id)
            ->select(
                'chi_tiet_don_hangs.ten_san_pham',
                'chi_tiet_don_hangs.so_luong_mua',
                'chi_tiet_don_hangs.don_gia_mua'
            )
            ->get();

        $pdf = PDF::loadView('Admin.Pages.DonHang.pdf', compact('data', 'chi_tiet_don_hang'))->setOption([
            'dpi' => 150,
            'font_path' => base_path('/fonts/'),
            'font_family' => 'Roboto',
            'default_font' => 'Roboto'
        ]);
        return $pdf->download($data->bill_name . '.pdf');
    }
    public function store(CreateHoaDonRequest $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $list_cart = [];

            foreach ($request->list_cart as $value) {
                if (isset($value['check'])) {
                    array_push($list_cart, $value);
                }
            }

            if (count($list_cart) > 0) {
                $cutommer = Auth::guard('customer')->user();

                $bill = HoaDon::create([
                    'ship_fullname'     => $request->ship_fullname,
                    'ship_address'      => $request->ship_address,
                    'ship_phone'        => $request->ship_phone,
                    'customer_id'       => $cutommer->id,
                    'customer_fullname' => $cutommer->ho_ten,
                    'customer_phone'    => $cutommer->so_dien_thoai,
                    'customer_email'    => $cutommer->email,
                ]);

                $check    = true;
                $tongTien = 0;

                $gioHang = ChiTietDonHang::whereNull('id_don_hang')->where('id_khach_hang', $cutommer->id)->get();
                // dd($gioHang->toArray(), $list_cart);
                foreach ($gioHang as $key => $value) {
                    foreach ($list_cart as $value_cart) {
                        // dd($value->id, $value_cart['id']);
                        if ($value->id == $value_cart['id']) {
                            $sanPham = SanPham::find($value->id_san_pham);
                            $hinh_anh_arr = explode(',', $sanPham->hinh_anh)[0];
                            // dd($hinh_anh_arr);
                            if ($sanPham && $sanPham->is_open == true && $sanPham->so_luong >= $value->so_luong_mua) {
                                $donGia = $sanPham->gia_khuyen_mai == 0 ? $sanPham->gia : $sanPham->gia_khuyen_mai;
                                $value->ten_san_pham = $sanPham->ten_san_pham;
                                $value->don_gia_mua  = $donGia;
                                $value->hinh_anh     = $hinh_anh_arr;
                                $value->id_don_hang  = $bill->id;

                                $value->save();

                                $tongTien += $donGia * $value->so_luong_mua;
                            } else {
                                $check = false;
                            }
                            $sanPham->so_luong = $sanPham->so_luong - $value->so_luong_mua;
                            $sanPham->save();
                        }
                    }
                    // dd('here');
                }

                $bill->bill_name  = "DATN" . (10000 + $bill->id);
                $bill->bill_total = $tongTien;
                $bill->save();
                $billDetail = ChiTietDonHang::where('id_don_hang', $bill->id)->get();
                sendBillJob::dispatch($bill->customer_email, $bill->customer_fullname, $billDetail, $bill->bill_total, $bill->bill_name);

                if ($check) {
                    DB::commit();
                } else {
                    DB::rollBack();
                }
                return response()->json([
                    "bill_id" => $bill->id
                ]);
            }
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
    public function index()
    {
        return view('Client.Pages.my_account');
    }
    public function listOrder()
    {
        $cutommer = Auth::guard('customer')->user();
        $listOrder = HoaDon::join('chi_tiet_don_hangs', 'hoa_dons.id', 'chi_tiet_don_hangs.id_don_hang')
            ->join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
            ->join('danh_mucs', 'san_phams.ma_danh_muc_id', 'danh_mucs.id')
            ->where('customer_id', $cutommer->id)
            ->select('chi_tiet_don_hangs.*', 'hoa_dons.bill_total', 'danh_mucs.ten_danh_muc')
            ->get();

        return response()->json(['listOrder' => $listOrder]);
    }
    public function listBill()
    {
        $cutommer = Auth::guard('customer')->user();
        $listBill = HoaDon::where('customer_id', $cutommer->id)
            ->orderBy('hoa_dons.created_at', 'desc')->get();

        return response()->json(['listBill' => $listBill]);
    }
    public function viewAnalytic($begin, $end)
    {
        $data = HoaDon::select(DB::raw('date(created_at) as date'),  DB::raw('sum(bill_total) as total'))
            ->whereDate('created_at', '>=', $begin)
            ->whereDate('created_at', '<=', $end)
            ->groupBy('date')
            ->get();

        return $data;
    }

    public function analytic()
    {
        $check = $this->checkRule_get(27);
        if (!$check) {
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

        return view('Admin.Pages.ThongKe.BanHang.index', compact('begin', 'end', 'data', 'labels', 'data_js'));
    }

    public function analyticPost(Request $request)
    {
        $check = $this->checkRule_get(28);
        if (!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
        }
        $end    = $request->end_date;
        $begin  = $request->from_date;

        $data    = $this->viewAnalytic($begin, $end);

        $labels  = [];
        $data_js = [];

        foreach ($data as $key => $value) {
            array_push($labels,  $value->date);
            array_push($data_js, $value->total);
        }

        return view('Admin.Pages.ThongKe.BanHang.index', compact('begin', 'end', 'data', 'labels', 'data_js'));
    }
    public function changeStatus(Request $request)
    {
        $check = $this->checkRule_post(23);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $bill = HoaDon::find($request->id);
        if ($bill->is_payment ==2) {
            return response()->json([
                'status' => false,
                'message' => 'Đơn hàng '. $bill->bill_name . ' đã hủy!',
            ]);
        }else{
            $bill->is_payment = !$bill->is_payment;
            $bill->save();
            return response()->json([
                'status' => true,
                'message' => 'Đổi trạng thái thanh toán ' . $bill->bill_name . ' Thành công!',
            ]);
        }

    }
    public function changeType(Request $request)
    {
        $check = $this->checkRule_post(24);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $bill = HoaDon::find($request->id);
        if ($bill->is_payment == 2) {
            return response()->json([
                'status' => false,
                'message' => 'Hóa Đơn ' . $bill->bill_name .' này đã hủy',

            ]);
        } else {
            if ($bill->is_type == 0)
                $bill->is_type = $bill->is_type = 1;
            elseif ($bill->is_type == 1)
                $bill->is_type = $bill->is_type = 2;
            else if ($bill->is_type == 2) {
                $bill->is_type = $bill->is_type = 3;
                $bill->is_payment = $bill->is_payment = 2;
            } else
                $bill->is_type = $bill->is_type = 0;

            $bill->save();
            return response()->json([
                'status' => true,
                'message' => 'Đổi trạng thái tình trạng ' . $bill->bill_name . ' Thành công!',

            ]);
        }
    }
    public function search(Request $request)
    {
        $check = $this->checkRule_post(26);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $search = $request->search;
        $listBill = HoaDon::where('bill_name', 'like', '%' . $search . '%')
            ->orWhere('ho_ten', 'like', '%' . $search . '%')
            ->join('khach_hangs', 'hoa_dons.customer_id', 'khach_hangs.id')
            ->select('hoa_dons.*', 'khach_hangs.ho_ten')
            ->get();
        return response()->json([
            'status'  => true,
            'bill' => $listBill,
        ]);
    }
}
