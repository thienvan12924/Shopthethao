<?php

namespace App\Http\Requests\KhachHang;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CustomerChangePassRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => ['required', 'max:30', Password::min(6)
                ->letters()
                ->mixedCase()
                ->numbers()],
            're_password'   =>  'required|same:password',
            'hash'          =>  'required|exists:khach_hangs,hash_reset',
        ];
    }
    public function messages()
    {
        return [
            'required'      =>  ':attribute không được để trống',
            'unique'        =>  ':attribute đã tồn tại trong hệ thống',
            'min'           =>  ':attribute quá nhỏ/ngắn',
            'max'           =>  ':attribute quá lớn/dài',
            'numeric'       => ':attribute phải là số',
        ];
    }
    public function attributes()
    {
        return [

            'password' => 'Mật khẩu',
            're_password' => 'Nhập lại mật khẩu',

        ];
    }
}
