<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class EventScheduleStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'thanas' => 'required',
            'schedule_date' => 'required',
        ];
    }
}
