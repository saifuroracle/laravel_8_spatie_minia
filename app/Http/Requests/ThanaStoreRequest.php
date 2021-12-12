<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ThanaStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'district_id' => 'required|numeric|unique:thanas,thana_en',
            'thana_en' => 'required|string|unique:thanas,thana_bn',
        ];
    }
}
