<?php

namespace App\Http\Requests\Course\Booking;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'schedule_type' => 'required',
            'schedule_id' => 'required',
            'salutation' => 'required',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'designation' => 'required|min:3',
            'company' => 'required|min:3',
            'country' => 'required',
            'country_code' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'work_email' => 'nullable|email',
            'authority_name' => 'nullable',
            'authority_code' => 'nullable',
            'authority_phone' => 'nullable',
            'authority_email' => 'nullable',
            'authority_designation' => 'nullable',
            'currency' => 'required',
            'learn_about_us' => 'required',
            'payment_method' => 'required',
            'tocs' => 'required',
            'department' => 'nullable',
            'no_department' => 'nullable',
            'no_company'=> 'nullable',
        ];
    }
}
