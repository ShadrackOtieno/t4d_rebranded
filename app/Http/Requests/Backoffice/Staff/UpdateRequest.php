<?php

namespace App\Http\Requests\Backoffice\Staff;

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
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => [
                'required',
                Rule::unique('staff')->ignore( $this->route('staff') ),
            ],
            'email' => [
                'email',
                Rule::unique('users')->ignore( $this->route('staff')->user_id ),
            ],
            'role' => 'required',
        ];
    }
}
