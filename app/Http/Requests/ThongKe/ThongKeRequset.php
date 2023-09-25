<?php

namespace App\Http\Requests\ThongKe;

use Illuminate\Foundation\Http\FormRequest;

class ThongKeRequset extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'day_begin' => 'required|date',
            'day_end'   => 'required|date|after_or_equal:day_begin',
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
            'after_or_equal'=>  ':attribute không được hơn đến ngày'
        ];
    }
    public function attributes()
    {
        return [
          'day_begin'   => 'Từ Ngày',
          'day_end'     => 'Đến Ngày',

        ];
    }
}
