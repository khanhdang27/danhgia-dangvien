<?php

namespace Modules\Rating\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RatingRequest extends FormRequest {
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
            'maxeploai'  => [
                'required',
                'max:10',
                Rule::unique('xeploais', 'maxeploai')->ignore($this->id, 'maxeploai')
            ],
            'tenxeploai' => 'required',
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
            'maxeploai'  => 'Mã xếp loại',
            'tenxeploai' => 'Tên xếp loại',
        ];
    }
}
