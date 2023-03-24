<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorLoginAdmin extends FormRequest
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
            'username' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Email không được bỏ trống',
            'username.email' => 'Trường vừa nhập không phải email',
            'password.required' => 'Mật khẩu không được bỏ trống',
        ];
    }
}
