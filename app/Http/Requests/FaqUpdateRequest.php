<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class FaqUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'question' => 'required|string',
            'answer' => 'required|string',
            'priority' => 'required|numeric',
            'status' => 'required|numeric',
        ];
    }
}
