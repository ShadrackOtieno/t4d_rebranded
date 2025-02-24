<?php

namespace App\Http\Requests\Backoffice\Course\Bundle;

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
                Rule::unique('course_bundles')->ignore( $this->route('bundle')->id ),
            ],
            'cover' => 'nullable|image',
            'courses' => 'required',
            'category_id' => 'required',
            'trainers' => 'required',
            'event_types' => 'required',
        ];
    }
}
