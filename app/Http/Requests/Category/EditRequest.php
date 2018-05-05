<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'txtCateName' => 'required',
            'txtCateName' => 'unique:category,name'
        ];
    }
    public function messages(){
        return [
            'txtCateName.required' => 'Vui lòng nhập tên danh mục',
            'txtCateName.unique' => 'Tên thể loại đã tồn tại'
        ];
    }
}
