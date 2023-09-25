<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHang\CustomerChangePassRequest;
use App\Http\Requests\KhachHang\RegisterCustomerRequest;
use App\Http\Requests\KhachHang\UpdateMyCustomerRequest;
use App\Http\Requests\KhachHang\UpdatePasswordCustomerRequest;
use App\Jobs\sendMailActiveJob;
use App\Jobs\sendMailPassJob;
use App\Models\HoaDon;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KhachHangController extends Controller
{
    public function viewAuth(){
        $user = Auth::guard('customer')->check();
        if($user){
            return redirect('/');
        }
        return view('Client.Pages.auth.login');
    }
    public function login(Request $request){
        $data = $request->all();

        $login = Auth::guard('customer')->attempt($data);

        if ($login) {

            $user = Auth::guard('customer')->user();
            if ($user->is_active == 1) {
                return response()->json([
                    'status' => 1,
                ]);
            } else {
                Auth::guard('customer')->logout();
                return response()->json([
                    'status' => 2,
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
            ]);
        }
    }
    public function viewRegister(){

        return view('Client.pages.auth.register');
    }
    public function register(RegisterCustomerRequest $request){
        $hash = Str::uuid()->toString();
        $data = $request->all();

        $data['hash'] = $hash;
        $data['password'] = bcrypt($request->password);
        $link = env('APP_URL') . '/kich-hoat/' . $hash;

        KhachHang::create($data);


        sendMailActiveJob::dispatch($request->ho_ten,$link,$request->email);
        return response()->json([
            'status' => true,
        ]);

    }
    public function active($hash){
        $khach_hang = KhachHang::where('hash', $hash)->first();
        if($khach_hang){
            if($khach_hang->is_active == 1){
                toastr()->warning("Tài khoản đã được kích hoạt trước đó!");
            }
            else
            {
                toastr()->success("Email " . $khach_hang->email . " đã được kích hoạt!");
                $khach_hang->is_active = 1;
                $khach_hang->save();
            }
        }
        else
        {
            toastr()->error("Mã không tồn tại!");
        }
        return redirect('/');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        // toastr()->success('Đã đăng xuất thành công!');
        return redirect('/');
    }
    public function viewReset(){
        return view('Client.Pages.auth.reset_pass');
    }
    public function actionReset(Request $request)
    {
        $customer = KhachHang::where('email', $request->email)->first();
        if($customer) {
            $hash = Str::uuid();
            $customer->hash_reset = $hash;
            $customer->save();

            // Gửi email
            sendMailPassJob::dispatch($hash, $customer->email, $customer->ho_ten);
        }

        return response()->json([
            'status'    => true,
        ]);
    }
    public function viewChangePass($hash){
        $customer = KhachHang::where('hash_reset', $hash)->first();
        if($customer) {
            return view('Client.pages.auth.chage_pass', compact('hash'));
        } else {
            toastr()->error('Liên kết không tồn tại!');
            return redirect('/');
        }
    }
    public function actionChangePass(CustomerChangePassRequest $request)
    {
        $customer = KhachHang::where('hash_reset', $request->hash)->first();
        $customer->password = bcrypt($request->password);
        $customer->hash_reset = '';
        $customer->save();

        return response()->json([
            'status'    => true,
        ]);
    }
    public function myAcc(){
        $user = Auth::guard('customer')->user();
        $customer = KhachHang::where('id',$user->id)->first();
        return response()->json([
            'data' => $customer,
        ]);
    }
    public function updatemyAcc(UpdateMyCustomerRequest $request){
        $data = $request->all();
        KhachHang::find($data['id'])->update($data);
        return response()->json([
            'status' => 1,
            'mess' =>"Cập Nhật Thành Công!",
        ]);
    }
    public function updatePassword(UpdatePasswordCustomerRequest $request){
        $data = $request->all();
        // dd($data);
        DB::transaction(function () use ($data) {
            $user = Auth::guard('customer')->user();
            $khachHang = KhachHang::find($user['id']);
            $khachHang->password = bcrypt($data['password']);
            // dd($khachHang);
            $khachHang->save();
        });

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã cập nhật mật khẩu thành công!',
        ]);
    }
    public function deleteHang(Request $request){
        $hoaDon = HoaDon::find($request->id);
        if($hoaDon->is_type==0){
            $hoaDon->is_payment =2;
            $hoaDon->save();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã hủy đơn hàng '. $hoaDon->bill_name . ' thành công!',
            ]);
        }else{
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không thể hủy đơn hàng '. $hoaDon->bill_nam,
            ]);
        }

    }
}
