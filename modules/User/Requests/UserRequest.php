<?php

namespace Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {
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
        $method = segmentUrl(2);
        switch ($method) {
            default:
                return [
                    'name'     => 'required',
                    'username' => 'nullable|unique:users',
                    'email'    => 'required|email|unique:users',
                    'phone'    => 'required|digits:10|unique:users',
                    'role_id'  => 'required',
                    'password' => 'required|min:6|confirmed',
                ];
                break;
            case 'update':
                return [
                    'name'     => 'required',
                    'username' => 'nullable|unique:users,username,' . $this->id,
                    'email'    => 'required|email|unique:users,email,' . $this->id,
                    'phone'    => 'required|digits:8|unique:users,phone,' . $this->id,
                    'role_id'  => 'required',
                    'password' => 'nullable|min:6|confirmed',
                ];
                break;
        }
    }

    public function messages() {
        return [
            'required'         => ':attribute' . trans(' can not be empty.'),
            'unique'           => ':attribute' . trans(' was exist.'),
            'confirmed'        => ':attribute' . trans(' confirmation does not match.'),
            'email'            => ':attribute' . trans(' must be a valid email address.'),
            'min'              => ':attribute' . trans(' too short.'),
            'role_id.required' => trans('Please select ') . ':attribute'
        ];
    }

    public function attributes() {
        return [
            'name'     => trans('Tên'),
            'username' => trans('Username'),
            'email'    => trans('Email'),
            'phone'    => trans('Số điện thoại'),
            'password' => trans('Mật khẩu'),
            'status'   => trans('Trạng thái'),
            'role_id'  => trans('Chức vụ'),
        ];
    }
}
