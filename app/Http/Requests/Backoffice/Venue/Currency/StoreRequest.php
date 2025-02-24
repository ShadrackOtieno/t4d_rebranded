<?php

namespace App\Http\Requests\Backoffice\Venue\Currency;

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
            
            'code' => 'required',
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'bank_account' => 'required',
            'account_name' => 'required',
            'bank_code' => 'required',
            'branch_code' => 'required',
            'swift_code' => 'required',
        ];
    }
}
