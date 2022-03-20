<?php

namespace Modules\Dgcb\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DgcbRequest extends FormRequest {

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
            'duk' => 'nullable',
            'dut' => 'nullable',
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute không được để trống',
        ];
    }

    public function attributes() {
        return [
            'duk' => 'Đảng uỷ khoa',
            'dut' => 'Đảng uỷ trường',
        ];
    }
}
