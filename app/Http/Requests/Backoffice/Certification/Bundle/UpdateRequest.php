<?php

namespace App\Http\Requests\Backoffice\Certification\Bundle;

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
                Rule::unique('certification_bundles')->ignore( $this->route('bundle')->id ),
            ],
            'cover' => 'nullable|image',
            'certifications' => 'required',
            'category_id' => 'required',
            'certifying_body_id' => 'required',
            'trainers' => 'required',
            'event_types' => 'required',
        ];
    }
}
