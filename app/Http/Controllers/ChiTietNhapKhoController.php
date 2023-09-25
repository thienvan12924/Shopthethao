<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhapKho\CapNhatNhapKhoRequest;
use App\Http\Requests\NhapKho\createNhapKhoChinhThucRequest;
use App\Models\ChiTietNhapKho;
use App\Models\HoaDonNhapKho;
use App\Models\NhaCungCap;
use App\Models\SanPham;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPViet\NumberToWords\Transformer;

class ChiTietNhapKhoController extends Controller
{

    public function index()
    {
        $check = $this->checkRule_get(35);
        if(!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
	    }


            return view('Admin.Pages.NhapKho.index');

    }

    public function getData()
    {
        $data =  ChiTietNhapKho::where('id_hoa_don_nhap_kho',0)
                                ->where('trang_thai', 0)
                                ->select('chi_tiet_nhap_khos.*')
                                ->get();
            $tong_tien = 0;
            $tong_san_pham = 0;
            foreach ($data as $key => $value) {
                $tong_tien = $tong_tien + $value->thanh_tien;
                $tong_san_pham =  $tong_san_pham +  $value->so_luong_nhap;
            }
        $transformer = new Transformer();

        return response()->json([
            'data'          => $data,
            'tong_tien'     => $tong_tien,
            'tien_chu'      => $transformer->toCurrency($tong_tien),
            'tong_san_pham' => $tong_san_pham,
        ]);
    }
    public function store(Request $request)
    {   $check = $this->checkRule_post(36);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        // dd($request->all());
        $hoaDonNhapHang = ChiTietNhapKho::where('id_san_pham', $request->id)
                                        ->where('id_hoa_don_nhap_kho', 0)
                                        ->where('trang_thai', 0)
                                        ->first();
        $sanPham = SanPham::where('id',$request->id)
                            ->where('is_open', 1)
                            ->first();
        if ($hoaDonNhapHang) {
            $hoaDonNhapHang->so_luong_nhap  = $hoaDonNhapHang->so_luong_nhap + 1;
            $hoaDonNhapHang->thanh_tien     = $hoaDonNhapHang->so_luong_nhap * $hoaDonNhapHang->don_gia_nhap;
            $hoaDonNhapHang->save();
        } else {
            $hoaDonNhapHang = ChiTietNhapKho::create([
                'id_hoa_don_nhap_kho'   => $request->id_hoa_don_nhap_kho,
                'id_san_pham'           => $request->id,
                'ten_san_pham'          => $request->ten_san_pham,
                'so_luong_nhap'         => $sanPham->so_luong,
                'don_gia_nhap'          => $sanPham->gia,
                'thanh_tien'            => $sanPham->gia*$sanPham->so_luong,
                'id_hoa_don_nhap_kho'   => 0,
            ]);
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Đã nhập kho!',
        ]);
    }
    public function createNhapKhoChinhThuc(createNhapKhoChinhThucRequest $request)
    {    $check = $this->checkRule_post(39);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $data = $request->all();
        $data['ngay_nhap_hang']         = Carbon::now();
        $data['id_admin']               = Auth::guard('admin')->user()->id;
        $chiTietNhapKho = ChiTietNhapKho::where('id_hoa_don_nhap_kho', 0)
                                        ->where('trang_thai', 0)
                                        ->get();
        if (count($chiTietNhapKho) > 0) {
            $hoaDonNhapKho = HoaDonNhapKho::create($data);
            $hoaDonNhapKho->ma_don_hang = 'DATN' . (100000 + $hoaDonNhapKho->id);
            $tong_tien = 0;
            $tong_san_pham = 0;
            if ($hoaDonNhapKho) {
                foreach ($chiTietNhapKho as $key => $value) {
                    $value->id_hoa_don_nhap_kho = $hoaDonNhapKho->id;
                    $value->trang_thai = 1;
                    $tong_tien      += $value->so_luong_nhap * $value->don_gia_nhap;
                    $tong_san_pham  +=  $value->so_luong_nhap;
                    $value->save();
                    // $sanPham = SanPham::findOrFail($value->id_san_pham);
                    // $sanPham->so_luong += $value->so_luong_nhap;
                    // $sanPham->gia       = $value->don_gia_nhap;
                    // $sanPham->save();
                }

                $hoaDonNhapKho->tong_tien = $tong_tien;
                $hoaDonNhapKho->tong_san_pham = $tong_san_pham;
                $hoaDonNhapKho->save();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã nhập hàng thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Đã có lỗi hệ thống!',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Hóa đơn hàng này đã được người khác nhập!',
            ]);
        }
    }
    public function destroy(Request $request)
    {
        $check = $this->checkRule_post(38);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $hoaDonNhapHang = ChiTietNhapKho::find($request->id);

        $hoaDonNhapHang->delete();

        return response()->json([
            'status' => true,
            'message' => 'Đã xóa sản phảm ' . $hoaDonNhapHang->ten_san_pham . ' thành công!',
        ]);
    }
    public function update(CapNhatNhapKhoRequest $request)
    {
        $check = $this->checkRule_post(37);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $hoaDonNhapHang = ChiTietNhapKho::find($request->id);
        if ($hoaDonNhapHang->id_hoa_don_nhap_kho == 0 && $hoaDonNhapHang->trang_thai == 0) {

            $hoaDonNhapHang->update([
                'so_luong_nhap' => $request->so_luong_nhap,
                'don_gia_nhap'  => $request->don_gia_nhap,
                'thanh_tien'    => $request->don_gia_nhap * $request->so_luong_nhap,
            ]);

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Có lỗi xảy ra!',
            ]);
        }
    }
}
