<?php

namespace App\Http\Requests\Backoffice\Course\Bundle;

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
            'name' => 'required|unique:course_bundles',
            'cover' => 'nullable|image',
            'courses' => 'required',
            'category_id' => 'required',
            'trainers' => 'required',
            'event_types' => 'required',
        ];
    }
}
