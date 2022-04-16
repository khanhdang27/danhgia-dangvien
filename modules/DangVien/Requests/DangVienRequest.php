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
            'required'      => ':attribute không được để trống',
            'regex'         => ':attribute chứa các ký tự không hợp lệ',
            'min'           => ':attribute quá ngắn',
            'required_with' => ':attribute không được để trống',
            'unique'        => ':attribute đã tồn tại',
            'digits'        => ':attribute phải có :digits chữ số',
        ];
    }

    public function attributes() {
        return [
            'macb'          => 'Chi bộ',
            'madv'          => 'Mã đảng viên',
            'mavc'          => 'Mã viên chức',
            'hoten'         => 'Họ tên',
            'ngaysinh'      => 'Ngày sinh',
            'gioitinh'      => 'Giới tính',
            'ngayvaodang'   => 'Ngày vào đảng',
            'ngaychinhthuc' => 'Ngày chính thức',
            'sodt'          => 'Số điện thoại',
            'username'      => 'Tài khoản',
            'password'      => 'Mật khẩu',
        ];
    }
}
