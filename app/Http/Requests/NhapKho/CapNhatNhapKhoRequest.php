<?php

namespace App\Http\Requests\NhapKho;

use Illuminate\Foundation\Http\FormRequest;

class CapNhatNhapKhoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'                =>  'required|exists:chi_tiet_nhap_khos,id',
            'so_luong_nhap'     =>  'required|numeric|min:1',
            'don_gia_nhap'      =>  'required|numeric|min:0',

        ];
    }
    public function messages()
    {
        return [
            'required'  =>  ':attribute không được để trống',
            'unique'    =>  ':attributes đã tồn tại',
            'digits'    =>  ':attributes tối da 10 số',
            'numeric'   =>  ':attribute phải là số',
            'min'       =>  ':attribute phải lớn hơn 1',
            'exists'    =>  ':attribute không tồn tại',

        ];
    }
    public function attributes()
    {
        return [
            'id'                    => 'Chi tiết hóa đơn',
            'so_luong_nhap'         => 'Số Lượng Nhập',
            'don_gia_nhap'          => 'Đơn Giá Nhập',

        ];
    }
}
