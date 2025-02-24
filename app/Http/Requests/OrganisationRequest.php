<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganisationRequest extends FormRequest
{
    
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(){
        return [
            'orgname.required' => 'Add the organisation name to continue',
            'logo.required' => 'Can not add the organisation without the associated logo',
            'logo.max' => 'Maximum file size to upload is 2MB (2048 KB). If you are uploading a photo, try to reduce its resolution to make it under 2MB',
            'logo.mimes' => 'The image must be of webp format'
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
            'orgname' => 'required|max:100',
            'logo' => 'required|file|mimes:webp|max:2048',
        ];
    }
}
