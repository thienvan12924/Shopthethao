<?php

namespace App\Http\Requests\KhachHang;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    // protected function prepareForValidation()
    // {


    //     if(strpos($this->email, '+')){
    //         $first = substr($this->email, 0, strpos($this->email, '+'));
    //         $last = substr($this->email, strpos($this->email, '@'));
    //         $real_mail = $first . $last;
    //         $this->email = $real_mail;
    //     }
    //     if(strpos($this->email, '.')){
    //         $first = substr($this->email, 0, strpos($this->email, '@'));
    //         $first = str_replace('.', '', $first);
    //         $last = substr($this->email, strpos($this->email, '@'));
    //         $real_mail = $first . $last;

    //     }
    //     $this->merge([
    //         'real_email' => $real_mail,
    //     ]);
    // }

    public function rules()
    {
        return [
            'ho_ten'                => 'required|min:5',
            'so_dien_thoai'         => 'required|digits:10|unique:khach_hangs,so_dien_thoai',
            'email'                 => 'required|email|unique:khach_hangs,email',
            'sex'                   => 'required|integer',
            'password'              => ['required','max:30', Password::min(5)
                                        ->letters()
                                        ->mixedCase()
                                        ->numbers()],
            're_password'           => 'required|same:password',
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
            'password'          =>'Mật khẩu',
            're_password'       =>'Nhập lại mật khẩu',
            'dia_chi'           =>'Địa chỉ',

        ];
    }
}
