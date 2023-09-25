<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'            =>  'required|exists:chi_tiet_don_hangs,id',
            'so_luong_mua'  =>  'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'required'  =>':attribute không được để trống',
            'unique'    =>':attributes đã tồn tại',
            'digits'   => ' :attributes tối da 10 số',
            'min'   => ':attributes số lượng quá nhỏ',

        ];
    }
    public function attributes()
    {
        return [
            'so_luong_mua'      => 'Số lượng mua',

        ];
    }
}
