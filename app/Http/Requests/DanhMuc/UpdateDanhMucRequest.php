<?php

namespace App\Http\Requests\DanhMuc;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDanhMucRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'ma_danh_muc' => 'required|min:2|unique:danh_mucs,ma_danh_muc,' .$this->id,
            'ten_danh_muc'=> 'required|min:1|unique:danh_mucs,ten_danh_muc,' .$this->id,
            'slug_danh_muc'=> 'required|min:1|unique:danh_mucs,slug_danh_muc,' .$this->id,
            'is_open' =>'required',
            'id_danh_muc_cha'=>'required',
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
        ];
    }
    public function attributes()
    {
        return [
            'ma_danh_muc'       => 'Mã danh mục',
            'ten_danh_muc'      => 'Tên danh mục',
            'slug_danh_muc'     => 'Slug danh mục',
            'is_open'           =>'Trạng thái',
            'id_danh_muc_cha'   =>'Danh mục lớn',
        ];
    }
}
