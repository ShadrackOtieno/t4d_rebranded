<?php

namespace App\Http\Requests\Backoffice\Venue\City;

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
            'name' => 'required|unique:cities',
            // 'description' => 'nullable|string|max:1000',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ];
    }
}
