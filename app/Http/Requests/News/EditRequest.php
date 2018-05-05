<?php

namespace App\Http\Requests\News;

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
            'sltCate' => 'required',
            'txtTitle' => 'required|unique:news,title',
            'txtIntro' => 'required',
            'newsImg' => 'image',
        ];
    }
    public function messages(){
        return [
            'sltCate.required' => 'Vui lòng chọn thể loại',
            'txtTitle.required' => 'Vui lòng nhập tiêu đề',
            'txtTitle.unique' => 'Tiêu đề đã tồn tại',
            'txtIntro.required' => 'Vui lòng nhập tóm tắt',
            'newsImg.required' => 'Chỉ được phép nhập hình'
        ];
    }
}
