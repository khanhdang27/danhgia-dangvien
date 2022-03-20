<?php

namespace Modules\Dgdv\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DgdvRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'madv' => 'required',
            'cqxl' => 'nullable',
            'cuxl' => 'nullable',
            'cbxl' => 'nullable',
            'dtxl' => 'nullable',
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute không được để trống',
        ];
    }

    public function attributes() {
        return [
            'madv' => 'Đảng viên',
            'cqxl' => 'Chính quyền xếp loại',
            'cuxl' => 'Chính uỷ xếp loại',
            'cbxl' => 'Chi bộ xếp loại',
            'dtxl' => 'Đoàn trường xếp loại',
        ];
    }
}
