<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'txtUser' => 'required',
            'txtPass' => 'required'
        ];
    }
    public function messages() {
        return [
            'txtUser.required' => 'Bạn chưa nhập email',
            'txtPass.required' => 'Bạn chưa nhập password'
        ];
    }
}
