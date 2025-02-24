<?php

namespace App\Http\Requests\Certification\Booking;

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
            'schedule_id' => 'required',
            'salutation' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'country_code' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'company' => 'required',
            'email' => 'required',
            'payment_method' => 'required',
            'currency' => 'required',
            'authority_name' => 'required_with:authority_email',
            'authority_email' => 'required_with:authority_name',
        ];
    }
}
