<?php

namespace App\Http\Requests\NhapKho;

use Illuminate\Foundation\Http\FormRequest;

class createNhapKhoChinhThucRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // 'id'                =>  'required|exists:chi_tiet_nhap_khos,id',
         //   'so_luong_nhap'     =>  'required|numeric|min:1',
           // 'don_gia_nhap'      =>  'required|numeric|min:0',
            'id_nha_cung_cap'   =>  'required|exists:nha_cung_caps,id'

        ];
    }
    public function messages()
    {
        return [
            'id_nha_cung_cap.required'  =>  ' Vui lòng chọn nhà cung cấp',
            'unique'    =>  ':attributes đã tồn tại',
            'digits'    =>  ':attributes tối da 10 số',
            'numeric'   =>  ':attribute phải là số',
            'min'       =>  ':attribute phải lớn hơn 1',
            'id_nha_cung_cap.min'       =>  'Vui lòng chọn nhà cung cấp !',
            'exists'    =>  ':attribute không tồn tại',

        ];
    }
    public function attributes()
    {
        return [
            // 'id'                    => 'Chi tiết hóa đơn',
            'so_luong_nhap'         => 'Số Lượng Nhập',
            'don_gia_nhap'          => 'Đơn Giá Nhập',
            'id_nha_cung_cap'       => 'Nhà Cung Cấp'

        ];
    }
}
