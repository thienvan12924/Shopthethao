<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'edit_pass'       => 'required|min:6|max:30',
            're_password'   =>  'required|same:edit_pass',

        ];
    }
    public function messages()
    {
        return [
            'required'      =>  ':attribute không được để trống',
            'unique'        =>  ':attribute đã tồn tại trong hệ thống',
            'min'           =>  ':attribute quá nhỏ/ngắn',
            'max'           =>  ':attribute quá lớn/dài',
            'numeric'       =>  ':attribute phải là số',
        ];
    }
    public function attributes()
    {
        return [
            'edit_pass'      => 'Mật khẩu',
            're_password'   =>'Nhập lại mật khẩu',
        ];
    }
}
