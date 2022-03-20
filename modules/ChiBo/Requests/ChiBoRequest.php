<?php

namespace Modules\ChiBo\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChiBoRequest extends FormRequest {
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
            'macb'  => 'required|max:20|unique:chibos,macb,' . $this->id . ',macb',
            'tencb' => 'required',
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute' . trans(' không được để trống'),
            'unique'   => ':attribute' . trans(' đã tồn tại'),
            'max'      => ':attribute không được quá :max kí tự'
        ];
    }

    public function attributes() {
        return [
            'macb'  => 'Mã chi bộ',
            'tencb' => 'Tên chi bộ',
        ];
    }
}
