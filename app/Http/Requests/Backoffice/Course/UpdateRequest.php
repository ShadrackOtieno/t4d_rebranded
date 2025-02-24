<?php

namespace App\Http\Requests\Backoffice\Course;

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
            'name' => [
                'required',
                Rule::unique('courses')->ignore( $this->route('course')->id ),
            ],
            'category_id' => 'required',
            'brochure' => 'nullable|file',
            'cover' => 'nullable|image',
            'event_types' => 'required',
            'who_should_attend' => 'nullable|required',
            'banner_description' => 'nullable|min:15',
        ];
    }
}
