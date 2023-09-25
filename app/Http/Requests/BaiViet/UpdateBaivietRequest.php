<?php

namespace App\Http\Requests\BaiViet;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBaivietRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tieu_de'            => 'required|min:2|',
            'noi_dung'           => 'required|min:5|',
            'chuyenmuc_id'       => 'required',

        ];
    }
    public function messages()
    {
        return [
            'required'      =>  ':attribute không được để trống',
            'min'           =>  ':attribute quá nhỏ/ngắn',

        ];
    }
    public function attributes()
    {
        return [
            'tieu_de'            => 'Tiêu đề',
            'noi_dung'           => 'Nội dung',

        ];
    }
}
