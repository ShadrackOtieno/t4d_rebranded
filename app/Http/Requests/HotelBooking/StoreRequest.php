<?php

namespace App\Http\Requests\HotelBooking;

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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'country_code' => 'required',
            'phone' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'check_in' => 'required|date',
            'rooms' => 'required|min:1',
            'visa' => 'required',
            'airport_transfer' => 'required',
        ];
    }
}
