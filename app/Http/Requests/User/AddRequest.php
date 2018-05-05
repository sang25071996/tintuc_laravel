<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
        return 
        [
            'txtUser' => 'required|unique:users,email',
            'txtPass' => 'required',
            'txtRepass' => 'same:txtPass',
            'rdoLevel' => 'required'
        ];
    }
    public function messages()
    {
        return 
            [
                'txtUser.required' => 'Bạn chưa nhập user',
                'txtUser.unique' => 'Tên user đã tồn tại',
                'txtPass.required' => 'Bạn chưa nhập mật khẩu',
                'txtRepass.required' => 'Bạn chưa nhập lại mật khẩu',
                'txtRepass.same' => 'Mật khẩu bạn nhập không khớp'
            ];
    }
}
