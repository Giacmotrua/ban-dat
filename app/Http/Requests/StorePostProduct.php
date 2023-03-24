<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostProduct extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name,'.$this->id,
            'price' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
            'description' => 'max:200'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được bỏ trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'price.required' => 'Giá sản phẩm không được bỏ trống',
            'image.required' => 'Ảnh sản phẩm không được bỏ trống',
            'image.mimes' => 'Ảnh sản phẩm phải là định dạng jpg, jpeg, png',
            'description.max' => 'Mô tả sản phẩm không được quá 200 ký tự'
        ];
    }
}
