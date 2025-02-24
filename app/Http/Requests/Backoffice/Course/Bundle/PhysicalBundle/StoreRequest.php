<?php

namespace App\Http\Requests\Backoffice\Course\Bundle\PhysicalBundle;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\City;

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
            'city_id' => [
                'required',
                Rule::in( City::all()->modelKeys() )
            ],
            'tax' => 'required',
            'booking_start' => 'required|date',
            'booking_end' => 'required|date',
            'tax' => 'required',
        ];
    }
}
