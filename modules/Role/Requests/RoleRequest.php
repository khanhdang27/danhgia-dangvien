<?php

namespace Modules\Role\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest {
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
                    'name'   => 'required|validate_unique:roles',
                ];
                break;
            case 'update':
                return [
                    'name'   => 'required|validate_unique:roles,' . $this->id,
                ];
                break;
        }
    }

    public function messages() {
        return [
            'required'        => ':attribute' . trans(' can not be empty.'),
            'validate_unique' => ':attribute' . trans(' was exist.')
        ];
    }

    public function attributes() {
        return [
            'name'        => trans('Role name'),
            'status'      => trans('Status'),
            'description' => trans('Description'),
        ];
    }
}
