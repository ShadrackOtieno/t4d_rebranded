<?php

namespace App\Http\Requests\Backoffice\Course\Bundle\VirtualBundle;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'from' => 'required|date',
            'to' => 'required|date',
            'tax' => 'required',
            'booking_start' => 'required|date',
            'booking_end' => 'required|date',
            'tax' => 'required',
        ];
    }
}
