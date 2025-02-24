<?php

namespace App\Http\Requests\Software\Quotation;

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
            'name' => 'required',
            'country_code' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'organization' => 'required',
            'email' => 'required|email',
            'licenses' => 'required|numeric|min:1',
        ];
    }
}
