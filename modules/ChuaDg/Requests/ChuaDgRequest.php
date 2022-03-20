<?php

namespace Modules\ChuaDg\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ChuaDgRequest extends FormRequest {

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
    public function rules(Request $request) {
        return [
            'madv'   => 'required',
            'nam'    => 'required',
            'chuakd' => 'nullable',
            'chuadg' => 'nullable',
            'lydo'   => 'required',
        ];
    }

    public function messages() {

        return [
            'required' => ':attribute không được để trống',
            'regex'    => ':attribute chứa các ký tự không hợp lệ',
            'min'      => ':attribute quá ngắn',
            'unique'   => ':attribute đã tồn tại',
            'digits'   => ':attribute phải có :digits chữ số',
        ];
    }

    public function attributes() {
        return [
            'madv'   => 'Đảng viên',
            'nam'    => 'Năm',
            'chuakd' => 'Chưa kiểm điểm',
            'chuadg' => 'Chưa đánh giá',
            'lydo'   => 'Lý do',
        ];
    }
}
