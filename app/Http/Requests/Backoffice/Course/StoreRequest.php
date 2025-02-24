<?php

namespace App\Http\Requests\Backoffice\Course;

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
            'name' => 'required|unique:courses',
            'category_id' => 'required',
            'brochure' => 'nullable|file',
            'cover' => 'nullable|image',
            'event_types' => 'required',
            'banner_description' => 'nullable|min:15',
            'who_should_attend' => 'nullable|min:5',
        ];
    }
}
