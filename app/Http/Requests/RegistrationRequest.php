<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required|between:2,255',
            'mobile_no' => 'required|min:10|regex:/\+?(88)?0?[1,4][13-9][0-9]{8}\b$/|unique:registration,mobile_no,' . $this->id,
            'alternative_mobile_no' => 'nullable|min:10|regex:/\+?(88)?0?[1,4][13-9][0-9]{8}\b$/',
            'division' => 'required|between:2,100',
            'district' => 'required|between:2,100',
            'thana' => 'required|between:2,100',
            'dessert_type' => 'required|between:2,100',
            'dessert_image' => 'required|mimes:jpeg,bmp,png,jpg,JPG|max:10240',
            // 'agree_check' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The Name field is required.',
            'name.min' => 'The Name field is minimum 2 character.',
            'mobile_no.required' => 'The Mobile no field is required.',
            'mobile_no.regex' => 'The Mobile no format is invalid.',
            'mobile_no.unique' => 'The Mobile no has already been taken.',
            'alternative_mobile_no.regex' => 'The Mobile no format is invalid.',
            'dessert_image.required' => 'The Dessert Image field is required.',
            // 'agree_check.required' => 'The Agree is required.',
            'division.required' => 'The Division Field is required.',
            'district.required' => 'The District Field is required.',
            'thana.required' => 'The Thana Field is required.',
            'dessert_image.max' => 'Maximum Image size to upload is 10MB (8192 KB).',
            'dessert_image.mimes' => 'Image Should be jpeg,bmp,png,jpg,JPG format.'

        ];
    }
}
