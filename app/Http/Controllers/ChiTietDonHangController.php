<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\UpdateCartRequest;
use App\Models\ChiTietDonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChiTietDonHangController extends Controller
{
    public function getDetail($id)
    {
        $check = $this->checkRule_post(25);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $chiTiet = ChiTietDonHang::where('id_don_hang', $id)
            ->get();

        return response()->json([
            'status'  => true,

            'chiTiet' => $chiTiet,
        ]);
    }
    public function index()
    {
        return view('Client.Pages.cart');
    }
    public function dataCart()
    {
        $user = Auth::guard('customer')->user();
        $data = ChiTietDonHang::join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
            ->select(
                'chi_tiet_don_hangs.*',
                'san_phams.slug_san_pham',
                'san_phams.ten_san_pham',
                'san_phams.hinh_anh',
                'san_phams.gia',
                'san_phams.gia_khuyen_mai',
            )
            ->where('id_khach_hang', $user->id)
            ->whereNull('id_don_hang')
            ->get();

        return response()->json([
            'chiTiet' => $data,
        ]);
    }
    public function store($id_san_pham)
    {
        $customer = Auth::guard('customer')->user();
        $sanPham = SanPham::find($id_san_pham);
        if ($sanPham) {
            $chi_tiet_don_Hang = ChiTietDonHang::where('id_san_pham', $id_san_pham)
                ->where('id_khach_hang', $customer->id)
                ->whereNull('id_don_hang')
                ->first();

            if ($chi_tiet_don_Hang) {
                $chi_tiet_don_Hang->so_luong_mua++;
                $chi_tiet_don_Hang->save();
            } else {
                ChiTietDonHang::create([
                    'id_san_pham' => $id_san_pham,
                    'id_khach_hang' => $customer->id,

                ]);
            }
            return response()->json([
                'status' => true,
                'message' => 'Đã thêm vào giỏ hàng!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Sản phẩm không tồn tại!',
            ]);
        }
    }
    public function removeCart($id)
    {
        $customer = Auth::guard('customer')->user();

        ChiTietDonHang::where('id', $id)
            ->where('id_khach_hang', $customer->id)
            ->whereNull('id_don_hang')
            ->first()->delete();
    }
    public function update(UpdateCartRequest $request)
    {
        $customer = Auth::guard('customer')->user();

        $chi_tiet = ChiTietDonHang::where('id', $request->id)
            ->where('id_khach_hang', $customer->id)
            ->whereNull('id_don_hang')
            ->first();
        $sanPham = SanPham::find($chi_tiet->id_san_pham);
        if ($sanPham) {
            $tonKho = $sanPham->so_luong;
            if ($request->so_luong_mua > $tonKho) {
                $chi_tiet->so_luong_mua = $tonKho;
                $chi_tiet->save();
                return response()->json([
                    'status' => false,
                    'message' => 'Số lượng mua chỉ được ' . $tonKho,
                ]);
            } else {
                $chi_tiet->so_luong_mua = $request->so_luong_mua;
                $chi_tiet->save();
                return response()->json([
                    'status' => true,
                    'message' => 'Đã cập nhật số lượng',
                ]);
            }
        }
    }
}
