<?php

namespace App\Http\Requests\SanPham;

use Illuminate\Foundation\Http\FormRequest;

class CreateSanPhamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'ma_san_pham'           => 'required|min:2|unique:san_phams,ma_san_pham',
            'ten_san_pham'          => 'required|min:5|unique:san_phams,ten_san_pham',
            'slug_san_pham'         => 'required|min:5|unique:san_phams,slug_san_pham',
            'ma_danh_muc_id'        => 'required',
            'gia'                   => 'required|numeric|min:0',
            'gia_khuyen_mai'        => 'required|numeric|max:' . $this->gia,
            'images'                => 'required',
            'chi_tiet'              => 'required',
            'is_open'               => 'required|boolean',
            'so_luong'              => 'required|numeric|min:0',

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
            'ma_san_pham'       =>'Mã sản phẩm',
            'ten_san_pham'      =>'Tên sản phẩm',
            'slug_san_pham'     =>'Slug sản phẩm',
            'ma_danh_muc_id'    =>'Mã danh mục',
            'gia'               =>'Giá',
            'gia_khuyen_mai'    =>'Giá khuyến mãi',
            'images'            =>'Hình ảnh',
            'chi_tiet'          =>'Chi tiết',
            'is_open'           =>'Trạng thái',
            'so_luong'          =>'Số lượng',
        ];
    }
}
