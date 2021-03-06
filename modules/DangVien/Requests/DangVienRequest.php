<?php

namespace Modules\DangVien\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\DangVien\Models\DangVien;

class DangVienRequest extends FormRequest {

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
        $method = segmentUrl(1);
        $dv     = DangVien::query()->find($this->id);
        switch ($method) {
            default:
                return [
                    'macb'          => 'nullable',
                    'mavc'          => 'required|digits:6|unique:dangviens,mavc',
                    'hoten'         => 'required',
                    'ngaysinh'      => 'required',
                    'gioitinh'      => 'nullable',
                    'ngayvaodang'   => 'required',
                    'ngaychinhthuc' => 'required',
                    'sodt'          => 'digits:10|nullable|unique:dangviens,sodt',
                    'username'      => [
                        'required',
                        'regex:/(^([a-zA-Z0-9_.]+)(\d+)?$)/u',
                        'unique:users,username',
                    ],
                    'password'      => 'required|min:6',
                ];
            case 'update':
                return [
                    'macb'          => 'nullable',
                    'mavc'          => 'required|digits:6|unique:dangviens,mavc,' . $this->id . ',madv',
                    'hoten'         => 'required',
                    'ngaysinh'      => 'required',
                    'gioitinh'      => 'nullable',
                    'ngayvaodang'   => 'required',
                    'ngaychinhthuc' => 'required',
                    'sodt'          => 'digits:10|nullable|unique:dangviens,sodt,' . $this->id . ',madv',
                    'username'      => [
                        'required',
                        'regex:/(^([a-zA-Z0-9_.]+)(\d+)?$)/u',
                        'unique:users,username,' . $dv->user_id . ',id',
                    ],
                    'password'      => 'nullable|min:6',
                ];
        }
    }

    public function messages() {
        return [
            'required'      => ':attribute kh??ng ???????c ????? tr???ng',
            'regex'         => ':attribute ch???a c??c k?? t??? kh??ng h???p l???',
            'min'           => ':attribute qu?? ng???n',
            'required_with' => ':attribute kh??ng ???????c ????? tr???ng',
            'unique'        => ':attribute ???? t???n t???i',
            'digits'        => ':attribute ph???i c?? :digits ch??? s???',
        ];
    }

    public function attributes() {
        return [
            'macb'          => 'Chi b???',
            'madv'          => 'M?? ?????ng vi??n',
            'mavc'          => 'M?? vi??n ch???c',
            'hoten'         => 'H??? t??n',
            'ngaysinh'      => 'Ng??y sinh',
            'gioitinh'      => 'Gi???i t??nh',
            'ngayvaodang'   => 'Ng??y v??o ?????ng',
            'ngaychinhthuc' => 'Ng??y ch??nh th???c',
            'sodt'          => 'S??? ??i???n tho???i',
            'username'      => 'T??i kho???n',
            'password'      => 'M???t kh???u',
        ];
    }
}
