<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use App\Models\Admin;
use App\Models\Quyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $check = $this->checkRule_get(12);
        if (!$check) {
            toastr()->error('Bạn không có quyền truy cập chức năng này!');
            return redirect('/admin-shop');
        }
        $quyen = Quyen::where('is_open', '=', 1)->get();
        return view('Admin.Pages.admin.index_vue', compact('quyen'));
    }
    public function checkEmail(Request $request)
    {
        $account = Admin::where('email', $request->email)->first();
        if ($account) {
            return response()->json([
                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
            ]);
        }
    }

    public function store(CreateAdminRequest $request)
    {
        $check = $this->checkRule_post(13);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $quyen = Quyen::where('id',$request->id_quyen)->first();
        if($quyen){
            Admin::create($data);
            return response()->json([
                'status'  => true,
                'message' => 'Thêm mới tài khoản thành công!',
            ]);
        }else{
            return response()->json([
                'status'  => 2,
                'message' => 'Không có Quyền này!',
            ]);
        }

    }

    public function getData()
    {
        $accAdmin = Admin::leftjoin('quyens', 'admins.id_quyen', 'quyens.id')
            ->select('admins.*', 'quyens.ten_quyen')
            ->get();
        return response()->json([
            'data' => $accAdmin,
        ]);
    }

    public function updateStatus($id)
    {
        $idAdmin = Admin::find($id);
        if ($idAdmin) {

            $idAdmin->is_block = $idAdmin->is_block == 0 ? 1 : 0;
            $idAdmin->save();

            return response()->json([
                'status'  => true,
            ]);
        } else {
            return response()->json([
                'status'  => false,
            ]);
        }
    }

    public function viewLogin()
    {

        return view('Admin.Login');
    }
    public function actionLogin(Request $request)
    {
        $checkEmail = Auth::guard('admin')->attempt([
            'email'    => $request->username,
            'password' => $request->password,
        ]);
        if ($checkEmail) {
            $admin = Auth::guard('admin')->user();
            if ($admin->is_block) {
                return response()->json([
                    'status' => 0,

                ]);
            } else {
                return response()->json([
                    'status' => 1,

                ]);
            }
        } else {
            Auth::guard('admin')->logout();
            return redirect()->back();
            return response()->json([
                'status' => false,

            ]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->back();
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        if ($admin) {
            return response()->json([
                'status'    => true,
                'data'  => $admin,
            ]);
        } else {
            return response()->json([
                'status'    => false,
            ]);
        }
    }


    public function update(UpdateAdminRequest $request)
    {
        $check = $this->checkRule_post(15);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $login_id = Auth::guard('admin')->user();
        if ($login_id->id == $request->id && $request->is_block == 1) {
            return response()->json(['status' => 0, 'message' => 'Bạn không thể hủy chính mình']);
        }
        $admin = admin::find($request->id);
        if ($admin) {
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->gioi_tinh = $request->gioi_tinh;
            $admin->is_block = $request->is_block;
            $admin->is_master = $request->is_master;
            $admin->id_quyen = $request->id_quyen;
            $admin->save();
            return response()->json([
                'status' => true,
                'message' => 'Cập nhật tài khoản thành công!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi!',
            ]);
        }
    }

    public function destroy($id)
    {
        $check = $this->checkRule_post(14);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $login_id = Auth::guard('admin')->user();

        $admin = Admin::find($id);
        if ($admin) {
            if ($login_id->id == $id) {
                return response()->json(['status' => 2, 'message' => 'Bạn không thể xóa chính mình!']);
            }
            $admin->delete();
            return response()->json([
                'status'    => true,
                'message' => 'Đã xóa tài khoản thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Có lỗi!',

            ]);
        }
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $check = $this->checkRule_post(16);
        if (!$check) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập chức năng này!',
            ]);
        }
        $data = $request->all();
        if (isset($request->password)) {
            $admin = Admin::find($request->id);
            $data['password'] = bcrypt($data['edit_pass']);
            $admin->password = $data['password'];
            $admin->save();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật mật khẩu thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Có Lỗi!',
            ]);
        }
    }





    public function show(Admin $admin)
    {
        //
    }
}
