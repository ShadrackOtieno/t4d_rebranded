<?php

namespace App\Http\Requests\Backoffice\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Staff;
use Auth;

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
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => [
                'required',
                Rule::unique('staff')->ignore( Staff::whereUserId( Auth::id() )->first()->id ),
            ],
            'email' => [
                'email',
                Rule::unique('users')->ignore( Auth::id() ),
            ],
            'password' => 'nullable|min:8|confirmed',
        ];
    }
}
