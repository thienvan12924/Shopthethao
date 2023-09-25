<?php

namespace App\Http\Controllers;

use App\Jobs\ThanhToanBillJob;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\VnPay;
use Carbon\Carbon;
use Illuminate\Http\Request;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class VnPayController extends Controller
{
    public function indexvnpay($id)
    {
        $bill = HoaDon::find($id);
        // dd($bill->toArray());
        return view('Client.Pages.thanh_toan.vnpay' ,compact('bill'));
    }

    public function actionThanhToan(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $data = $request->all();
        // dd($data);
        $vnp_TxnRef = $data['txnRef']; //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $data['amount']; // Số tiền thanh toán
        $vnp_Locale = $data['language']; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = $data['bankCode']; //Mã phương thức thanh toán
        $vnp_IpAddr = $request->ip(); //IP Khách hàng thanh toán
        $now = Carbon::now()->format("YmdHis");
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => env("VN_TMNCODE"),
            "vnp_Amount" => $vnp_Amount* 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => $now,
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => env("VNP_RETURNURL"),
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=> date('YmdHis',strtotime('+15 minutes',strtotime(Carbon::parse($now)))),
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env("VNP_URL") . "?" . $query;

        $vnpSecureHash =   hash_hmac('sha512', $hashdata, env("VNP_HASHSECRET"));//
        // dd($vnp_Url);
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        return redirect($vnp_Url);
    }

    public function responeVNPay(Request $request)
    {
        // dd($request->all());
        $url = session('url_prev','/');
        if($request->vnp_ResponseCode == "00") {
             VnPay::create([
                'vnp_Amount'            => $request->vnp_Amount,
                'vnp_BankCode'          => $request->vnp_BankCode,
                'vnp_BankTranNo'        => $request->vnp_BankTranNo,
                'vnp_OrderInfo'         => $request->vnp_OrderInfo,
                'vnp_ResponseCode'      => $request->vnp_ResponseCode,
                'vnp_TransactionStatus' => $request->vnp_TransactionStatus,
                'vnp_TxnRef'            => $request->vnp_TxnRef,
            ]);
            // $this->apSer->thanhtoanonline(session('cost_id'));
            $hoadon = HoaDon::where('bill_name',$request->vnp_TxnRef)->first();
            $hoadon->is_payment =1;
            $hoadon->save();
            $khachHang                  = KhachHang::find($hoadon->customer_id);
            $info['email']              = $hoadon->customer_email;
            $info['ho_ten']             = $khachHang->ho_ten;
            $info['dia_chi']            = $khachHang->dia_chi;
            $info['bill_total']         = $hoadon->bill_total;
            $info['bill_name']          = $hoadon->bill_name;
            $info['ship_fullname']      = $hoadon->ship_fullname;
            $info['ship_phone']         = $hoadon->ship_phone;
            $info['ship_address']       = $hoadon->ship_address;

            ThanhToanBillJob::dispatch($info);
            toastr()->success("Đã thanh toán phí dịch vụ thành công");
            return redirect("/");
        }
        session()->forget('url_prev');
        return redirect($url)->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
    }
}
