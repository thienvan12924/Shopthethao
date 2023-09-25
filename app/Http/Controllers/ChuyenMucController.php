<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChuyenMuc\CreateChuyenMucRequest;
use App\Http\Requests\ChuyenMuc\UpdateChuyenMucRequest;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;

class ChuyenMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //View Hiển thị FE
    public function index()
    {
        return view('Admin.Pages.ChuyenMuc.index');
    }
    //Thêm Mới
    public function store(CreateChuyenMucRequest $request)
    {
        $data = $request->all();
        ChuyenMuc::create($data);
        return response()->json([
            'status'    => true,
            'message'   => "Tạo Chuyên Mục Thành Công"
        ]);
    }
    //Xem chuyên mục tồn tại hay chưa
    public function checkChuyenMuc(Request $request)
    {
        $chuyenMuc = ChuyenMuc::where('ten_chuyen_muc', $request->ten_chuyen_muc)->first();
        if ($chuyenMuc) {
            return response()->json([
                'status' => true
            ]);
        } else {

            return response()->json([
                'status' => false
            ]);
        }
    }
    //Lấy dữ liệu
    public function getData()
    {
        $chuyenMuc = ChuyenMuc::select('chuyen_mucs.*')->get();
        return response()->json([
            'data' => $chuyenMuc,
        ]);
    }
    //Cập nhật trạng thái
    public function updateStatus(Request $request)
    {
        $chuyenMuc = ChuyenMuc::find($request->id);
        if ($chuyenMuc) {

            $chuyenMuc->is_open = $chuyenMuc->is_open == 0 ? 1 : 0;
            $chuyenMuc->save();

            return response()->json([
                'status'  => true,
                'message'   => "Đổi Trạng Thái Chuyên Mục Thành Công"

            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message'   => "Chuyên Mục Không Tồn Tại"

            ]);
        }
    }

    //Chỉnh sửa
    public function edit($id)
    {
        $chuyenMuc = ChuyenMuc::find($id);
        //dd($chuyenMuc);
        if ($chuyenMuc) {
            return response()->json([
                'status'    => true,
                'data'  => $chuyenMuc,
            ]);
        } else {
            return response()->json([
                'status'    => false,
            ]);
        }
    }

    //Cập nhật
    public function update(UpdateChuyenMucRequest $request)
    {
        $chuyenMuc = ChuyenMuc::find($request->id);
        if($chuyenMuc){
            $chuyenMuc->ten_chuyen_muc = $request->ten_chuyen_muc;
            $chuyenMuc->is_open = $request->is_open;
            $chuyenMuc->save();
            return response()->json([
                'status'  => true,
                'message'   => "Cập Nhật Chuyên Mục Thành Công"

            ]);

        }else{
            return response()->json([
                'status'  => true,
                'message'   => "Chuyên Mục Không Tồn Tại"

            ]);
        }
    }

    //Xóa
    public function destroy(Request $request)
    {
        $chuyen_muc = ChuyenMuc::find($request->id);
        if ($chuyen_muc) {
            $chuyen_muc->delete();
            return response()->json([
                'status'    => true,
                'message'   => "Xóa Chuyên Mục Thành Công"

            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => "Chuyên Mục Không Tồn Tại"

            ]);
        }
    }
}
