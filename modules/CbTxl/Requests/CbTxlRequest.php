<?php

namespace Modules\CbTxl\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CbTxlRequest extends FormRequest {

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
            'txl' => 'nullable',
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute không được để trống',
        ];
    }

    public function attributes() {
        return [
            'txl' => 'Xếp loại',
        ];
    }
}
