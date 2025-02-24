<?php

namespace App\Http\Requests\Course\Calendar;

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
            'year' => [
                'required',
                Rule::unique('course_calendars')->ignore( $this->route('calendar')->id ),
            ],
            'document' => 'nullable|file',
        ];
    }
}
