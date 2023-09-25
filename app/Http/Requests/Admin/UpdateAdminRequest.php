<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            'name'           => 'required|min:2',
            'email'          => 'required|unique:admins,email,' .$this->id,
            'gioi_tinh'      => 'required|numeric',
            'id_quyen'       => 'required|numeric',

        ];
    }

    public function messages()
    {
        return [
            'required'      =>  ':attribute không được để trống',
            'min'           =>  ':attribute quá nhỏ/ngắn',
            'boolean'       =>  ':attribute phải Yes/No',
            'numeric'       =>  ':attribute phải là số',
            'max'           =>  ':attribute quá lớn/dài',
            'unique'        =>  ':attribute đã tồn tại trong hệ thống',
            'digits'        =>  ':attribute phải đủ 10 số',
        ];
    }
    public function attributes()
    {
        return [
            'name'              => 'Họ và tên',
            'email'             => 'Email',
            'gioi_tinh'         => 'Giới tính',
            'id_quyen'          => 'Quyền Quản Trị',
        ];
    }
}
