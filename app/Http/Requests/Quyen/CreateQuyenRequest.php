<?php

namespace App\Http\Requests\Quyen;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuyenRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ten_quyen' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'ten_quyen.*' => 'Tên quyền không được để trống!',
        ];
    }
}
