<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaiViet\CreateBaiVietRequest;
use App\Http\Requests\BaiViet\UpdateBaivietRequest;
use App\Models\Admin;
use App\Models\BaiViet;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{

    public function index()
    {
        $check = $this->checkRule_get(17);
        if (!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
        }
        $chuyenMuc = ChuyenMuc::where('is_open', '=', 1)->get();
        $admin = Admin::where('is_block', '=', 0)->get();
        return view('Admin.Pages.BaiViet.index', compact('chuyenMuc', 'admin'));
    }

    public function store(CreateBaiVietRequest $request)
    {
        $check = $this->checkRule_post(18);
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
            $imagelogo->move(public_path('/Image/hinh_anh_bai_viet/'), $imageName);
            $data['hinh_anh'] = $imageName;
        } else {
            $data['hinh_anh'] = "null";
        }
        BaiViet::create($data);
        return response()->json([
            'status'    => true,
            'message' => 'Thêm bài viết thành công!',
        ]);
    }

    public function getData()
    {
        $baiViet = BaiViet::join('chuyen_mucs', 'bai_viets.chuyenmuc_id', 'chuyen_mucs.id')
            ->join('admins', 'bai_viets.admin_id', 'admins.id')
            ->select('bai_viets.*', 'chuyen_mucs.ten_chuyen_muc', 'admins.name')
            ->get();
        return response()->json([
            'data' => $baiViet,
        ]);
    }



    public function edit($id)
    {
        $baiViet = BaiViet::find($id);
        if ($baiViet) {
            return response()->json([
                'status'    => true,
                'data'  => $baiViet,
            ]);
        } else {
            return response()->json([
                'status'    => false,
            ]);
        }
    }


    public function update(UpdateBaivietRequest $request)
    {
        $check = $this->checkRule_post(21);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $baiViet = BaiViet::find($request->id);
        if ($baiViet) {
            $imagelogo = $request->file('hinh_anh');
            if ($imagelogo != null) {

                $imageName = $imagelogo->getClientOriginalName();
                $imagelogo->move(public_path('/Image/hinh_anh_bai_viet/'), $imageName);
                $data['hinh_anh'] = $imageName;
            } else {
                $data['hinh_anh'] = $baiViet->hinh_anh;
            }
            $baiViet->update($data);
            return response()->json([
                'status'  => true,
                'message' => 'Cập nhật bài viết thành công!',
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Có lỗi!',
            ]);
        }
    }


    public function destroy(Request $request)
    {
        $check = $this->checkRule_post(20);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $baiViet = BaiViet::find($request->id);
        if ($baiViet) {
            $baiViet->delete();
            return response()->json([
                'status'    => true,
                'message' => 'Xóa bài viết thành công!',

            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message' => 'Có lỗi!',

            ]);
        }
    }
}
