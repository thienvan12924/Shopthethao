<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhMuc\CreateDanhMucRequest;
use App\Http\Requests\DanhMuc\UpdateDanhMucRequest;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
// use Yoeunes\Toastr\Toastr as Toastr;

class DanhMucController extends Controller
{
    public function index()
    {
        $check = $this->checkRule_get(1);
        if (!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
        }
        $danh_muc_cha = DanhMuc::where('is_open', '=', 1)->get();
        return view('Admin.Pages.DanhMuc.index', compact('danh_muc_cha'));
    }
    public function store(CreateDanhMucRequest $request)
    {
        $check = $this->checkRule_post(2);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $data = $request->all();
        $imagelogo = $request->file('hinh_anh');
        if ($imagelogo != null) {

            $imageName = $imagelogo->getClientOriginalName();
            $imagelogo->move(public_path('/Image/hinh_anh_danh_muc/'), $imageName);
            $data['hinh_anh'] = $imageName;
        } else {
            $data['hinh_anh'] = "null";
        }
        DanhMuc::create($data);
        return response()->json([
            'status'    => true,
        ]);
    }
    public function updateStatus(Request $request)
    {
        $check = $this->checkRule_get(3);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $danhMuc = DanhMuc::find($request->id);
        if ($danhMuc) {

            $danhMuc->is_open = $danhMuc->is_open == 0 ? 1 : 0;
            $danhMuc->save();

                return response()->json([
                    'status'    => true,
                    'message'   => 'Đã Cập Nhật Trạng Thái Thành Công',
                ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Danh Mục Không Tồn Tại',
            ]);
        }
    }
    public function getData()
    {
        $danhMuc = 'SELECT a.*, b.ten_danh_muc as ten_danh_muc_cha
        FROM `danh_mucs` a LEFT JOIN `danh_mucs` b
        on a.id_danh_muc_cha = b.id';
        $data = DB::select($danhMuc);

        $danhMucCha = DanhMuc::where('id_danh_muc_cha', 0)->get();

        return response()->json([
            'data'      => $data,
            'dataCha'   => $danhMucCha,

        ]);
    }
    public function checkCategoryId(Request $request)
    {
        // $danhMuc = DanhMuc::where('ma_danh_muc','ten_danh_muc', $request->ma_danh_muc,$request->ten_danh_muc)
        // ->first();

        $danhMuc = DanhMuc::where('ma_danh_muc', $request->ma_danh_muc)->first();

        if ($danhMuc) {
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
        //
    }

    public function checkCategoryId2(Request $request)
    {

        $danhMuc = DanhMuc::where('ten_danh_muc', $request->ten_danh_muc)->first();

        if ($danhMuc) {
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function destroy(Request $request)
    {
        $check = $this->checkRule_get(4);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $danhMuc = DanhMuc::find($request->id);
        if ($danhMuc) {
            $sanPham = SanPham::where('ma_danh_muc_id',$request->id)->first();
            if($sanPham){
                return response()->json([
                    'status'    => 2,
                    'message'   => 'Danh Mục Này Đã Có Sẩn Phẩm : '.$sanPham->ten_san_pham,
                ]);
            }
            else{
                $danhMuc->delete();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Xóa Danh Mục Thành Công'
                ]);
            }

        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Danh Mục Không Tồn Tại'

            ]);
        }
    }
    public function edit($id)
    {
        $danhMuc = DanhMuc::find($id);
        if ($danhMuc) {
            return response()->json([
                'status'    => true,
                'data'  => $danhMuc,
            ]);
        } else {
            return response()->json([
                'status'    => false,
            ]);
        }
    }
    public function update(UpdateDanhMucRequest $request)
    {
        $check = $this->checkRule_get(5);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $danhMuc = DanhMuc::find($request->id);
        if($danhMuc){

            $imagelogo = $request->file('hinh_anh');
            if ($imagelogo != null) {

                $imageName = $imagelogo->getClientOriginalName();
                $imagelogo->move(public_path('/Image/hinh_anh_danh_muc/'), $imageName);
                $data['hinh_anh'] = $imageName;
            } else {
                $data['hinh_anh'] = $danhMuc->hinh_anh;
            }
            $danhMuc->update($data);
            return response()->json([
                'status'    => 1,
                'message'   => 'Cập Nhật Danh Mục Thành Công',
            ]);
        }
        else{
            return response()->json([
                'status'    => 0,
                'message'   => 'Danh Mục Không Tồn Tại',
            ]);
        }
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $danhMuc = 'SELECT a.*, b.ten_danh_muc as ten_danh_muc_cha
        FROM `danh_mucs` a LEFT JOIN `danh_mucs` b
        on a.id_danh_muc_cha = b.id';
        $data1 = DB::select($danhMuc);
        $data = DanhMuc::where('ma_danh_muc', 'like', '%' . $search . '%')

            ->orwhere('ten_danh_muc', 'like', '%' . $search . '%')
            ->orwhere('slug_danh_muc', 'like', '%' . $search . '%')
            ->orwhere('id_danh_muc_cha', 'like', '%' . $search . '%')

            ->get();

        return response()->json([
            'data'  => $data,
            'data1'  => $data1,
        ]);
    }
}
