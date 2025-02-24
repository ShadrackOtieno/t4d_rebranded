<?php

namespace App\Http\Requests\Backoffice\Certification;

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
            'name' => 'required|unique:certifications',
            'category_id' => 'required',
            'brochure' => 'nullable|file',
            'cover' => 'nullable|image',
            'event_types' => 'required',
        ];
    }
}
