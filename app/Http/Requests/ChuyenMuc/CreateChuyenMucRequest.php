<?php

namespace App\Http\Requests\ChuyenMuc;

use Illuminate\Foundation\Http\FormRequest;

class CreateChuyenMucRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ten_chuyen_muc' => 'required|min:2|unique:chuyen_mucs,ten_chuyen_muc',
            'is_open'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'required'      =>  ':attribute không được để trống',
            'unique'        =>  ':attribute đã tồn tại trong hệ thống',
        ];
    }
    public function attributes()
    {
        return [
            'ten_chuyen_muc'       => 'Tên chuyên mục',
            'is_open'              => 'Trạng thái',
        ];
    }
}
