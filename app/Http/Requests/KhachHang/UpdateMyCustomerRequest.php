<?php

namespace App\Http\Requests\KhachHang;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMyCustomerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'ho_ten'                => 'required|min:5',
            'so_dien_thoai'         => 'required|digits:10|unique:khach_hangs,so_dien_thoai,'.$this->id,
            'email'                 => 'required|email|unique:khach_hangs,email,'.$this->id,
            'sex'                   => 'required|integer',
            'dia_chi'               => 'required',
            //'real_email'    => 'required|unique:khach_hangs,real_email',

        ];
    }
    public function messages()
    {
        return [
            'required'      =>  ':attribute không được để trống',
            'min'           =>  ':attribute quá nhỏ/ngắn',
            'boolean'       =>  ':attribute không phải Yes/No',
            'numeric'       =>  ':attribute không phải là số',
            'max'           =>  ':attribute quá lớn/dài',
            'exists'        =>  ':attribute không tồn tại',
            'unique'        =>  ':attribute đã tồn tại trong hệ thống',
            'digits'        =>  ':attribute phải nhập 10 số',

        ];
    }
    public function attributes()
    {
        return [
            'ho_ten'            =>'Họ tên',
            'so_dien_thoai'     =>'Số điện thoại',
            'email'             =>'Email',
            'sex'               =>'Giới tính',
            'dia_chi'           =>'Địa chỉ',
        ];
    }
}
