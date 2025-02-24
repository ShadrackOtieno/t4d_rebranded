<?php

namespace App\Http\Requests\Tour\Booking;

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
        $minimum_no_people = empty($this->route('tour')->booking_end) ? $this->route('tour')->minimum_no_people : 1;

        return [
            'participants' => "required|numeric|min:{$minimum_no_people}",
        ];
    }
}
