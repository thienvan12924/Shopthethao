<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quyen\CreateQuyenRequest;
use App\Http\Requests\Quyen\DeleteQuyenRequest;
use App\Http\Requests\Quyen\UpdateQuyenRequest;
use App\Models\Action;
use App\Models\Admin;
use App\Models\Quyen;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuyenController extends Controller
{

    public function index()
    {
        $check = $this->checkRule_get(100);
        if (!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
        }
        return view('Admin.Pages.Quyen.index');
    }
    public function store(CreateQuyenRequest $request)
    {
        $check = $this->checkRule_post(101);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $slug = Str::slug($request->ten_quyen);
        $check = Quyen::where('slug', $slug)->first();
        if (!$check) {
            Quyen::create([
                'ten_quyen'     => $request->ten_quyen,
                'slug'          => $slug,
                'is_open'       => $request->is_open,
            ]);

            return response()->json([
                'status' => true,
                'message' => "Thêm mới quyền thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Tên quyền đã tồn tại!"
            ]);
        }
    }
    public function updateStatus($id)
    {
        $check = $this->checkRule_post(102);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $quyen = Quyen::find($id);
        if ($quyen) {
            $admin = Admin::where('id_quyen', $id)->first();
            if ($admin) {
                return response()->json([
                    'status' => 2,
                    'message' => $quyen->ten_quyen . ' admin đang sử dụng không thể tắt!',
                ]);
            } else {
                $quyen->is_open = $quyen->is_open == 0 ? 1 : 0;
                $quyen->save();
                return response()->json([
                    'status' => true,
                    'message' => "Đổi trạng thái quyền thành công!"
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi!"

            ]);
        }
    }
    public function getData()
    {
        $data = Quyen::all();

        return response()->json([
            'data' => $data
        ]);
    }

    public function destroy(DeleteQuyenRequest $request)
    {
        $check = $this->checkRule_post(105);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $quyen = Quyen::find($request->id);
        if ($quyen) {
            $admin = Admin::where('id_quyen', $request->id)->first();
            if ($admin) {
                return response()->json([
                    'status' => 2,
                    'message' => $quyen->ten_quyen . ' admin đang sử dụng không thể xóa quyền này!',
                ]);
            } else {
                $quyen->delete();
                return response()->json([
                    'status' => true,
                    'message' => "Đã xóa quyền thành công!",
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi!",
            ]);
        }
    }

    public function update(DeleteQuyenRequest $request)
    {
        $check = $this->checkRule_post(104);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $data = $request->all();
        $slug = Str::slug($request->ten_quyen);
        $check = Quyen::where('slug', $slug)
            ->where('id', '<>', $request->id)
            ->first();
        if (!$check) {
            $quyen = Quyen::find($request->id);
            $data['slug'] = $slug;
            $quyen->update($data);

            return response()->json([
                'status' => true,
                'message' => "Cập nhật quyền thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Tên quyền đã tồn tại!"
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => "Đã xóa quyền thành công!",
        ]);
    }

    public function getAction()
    {
        $data = Action::all();
        return response()->json([
            'data' => $data
        ]);
    }

    public function updateAction(UpdateQuyenRequest $request)
    {
        $check = $this->checkRule_post(106);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $quyen = Quyen::find($request->id_quyen);
        $quyen->update([
            'list_rule' => $request->list_rule
        ]);

        return response()->json([
            'status' => true,
            'message' => "Cập Nhập Phân Quyền Thành Công!",
        ]);
    }
}
