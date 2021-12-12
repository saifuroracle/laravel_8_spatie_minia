<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class SlideUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'slide_title' => 'required|string',
        ];
    }
}
