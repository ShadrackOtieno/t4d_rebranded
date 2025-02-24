<?php

namespace App\Http\Requests\Backoffice\Programs;

use Illuminate\Foundation\Http\FormRequest;

class TechStackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(){
        return [
            'image.required' => 'No image has been uploaded',
            'image.max' => 'Maximum file size to upload is 2MB (2048 KB). If you are uploading a photo, try to reduce its resolution to make it under 2MB',
            'image.mimes' => 'The image must be of webp format',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2024',
        ];
    }
}
