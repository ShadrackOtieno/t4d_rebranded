<?php

namespace App\Http\Requests\Backoffice\Programs;

use Illuminate\Foundation\Http\FormRequest;

class StorePriceRequest extends FormRequest
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
            'learning_mode' => 'required',
            'session' => 'required',
            'ksh' => 'nullable|numeric',
            'usd' => 'nullable|numeric',
        ];
    }

    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
public function messages()
{
    return [
        'ksh.numeric' => 'The KSH should be a valid amount',
        'usd.numeric' => 'The USD should be a valid amount',
    ];
}
}
