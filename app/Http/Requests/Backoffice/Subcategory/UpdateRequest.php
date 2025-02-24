<?php

namespace App\Http\Requests\Backoffice\Subcategory;

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
                Rule::unique('subcategories')->ignore( $this->route('subcategory')->id )->whereNull('deleted_at'),
            ],
            'cover' => 'nullable|image',
        ];
    }
}
