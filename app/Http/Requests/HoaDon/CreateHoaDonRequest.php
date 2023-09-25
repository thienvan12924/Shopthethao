<?php

namespace App\Http\Requests\HoaDon;

use Illuminate\Foundation\Http\FormRequest;

class CreateHoaDonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'ship_address'   =>  'required',
            'ship_phone'     =>  'required|digits:10',
            'ship_fullname'  =>  'required',
            'list_cart'      =>  'required',
        ];
    }
    public function messages()
    {
        return [
            'required'  => ':attribute không được để trống',
            'unique'    => ':attributes đã tồn tại',
            'digits'    => ':attributes tối da 10 số',
        ];
    }
    public function attributes()
    {
        return [
            'ship_address'      => 'Địa chỉ',
            'ship_phone'        => 'Số điện thoại',
            'ship_fullname'     => 'Tên',
            'list_cart'         => 'Sản Phẩm',
        ];
    }
}
