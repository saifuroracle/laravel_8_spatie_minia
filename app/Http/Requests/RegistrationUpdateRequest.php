<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name' => 'required|between:2,255',
            // 'mobile_no' =>  'required|min:10|regex:/\+?(88)?0?[1,4][13-9][0-9]{8}\b$/|unique:registration,mobile_no,' . $this->registration,
            // 'alternative_mobile_no' => 'required|between:11,16',
            'division' => 'required|between:2,100',
            'district' => 'required|between:2,100',
            'thana' => 'required|between:2,100',
            // 'dessert_type' => 'required|between:2,100',
        ];
    }
}
