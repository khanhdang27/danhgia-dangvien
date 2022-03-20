<?php

namespace Modules\DangBo\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DangBoRequest extends FormRequest {
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
            'madb'  => [
                'required',
                'max:20',
                Rule::unique('dangbos', 'madb')->ignore($this->id, 'madb')
            ],
            'tendb' => 'required',
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute không được để trống',
            'unique'   => ':attribute đã tồn tại',
            'max'      => ':attribute không được quá :max kí tự'
        ];
    }

    public function attributes() {
        return [
            'madb'  => 'Mã đảng bộ',
            'tendb' => 'Tên đảng bộ',
        ];
    }
}
