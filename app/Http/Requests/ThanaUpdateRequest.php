<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ThanaUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'district_id' => 'required|numeric|unique:thanas,thana_en,'.$this->thana,
            'thana_en' => 'required|string|unique:thanas,thana_bn,'.$this->thana,
        ];
    }
}
