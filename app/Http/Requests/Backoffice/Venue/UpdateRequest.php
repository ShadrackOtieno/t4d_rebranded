<?php

namespace App\Http\Requests\Backoffice\Venue;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'country' => 'required',
            'email' => [
                'email'
            ],
            'phone' => [
                'required'
            ],
            'tax' => 'required',
            'reg_no' => 'required',
            'tax_pin' => 'required',
        ];
    }
}
