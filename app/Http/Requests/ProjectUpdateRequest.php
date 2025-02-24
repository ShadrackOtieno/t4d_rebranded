<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
    public function messages()
    {
        return [
            'title.required' => 'A title is required you',
            'title.max' => 'A title should not surpass 100 characters',
            'excerpt.required' => 'A message is required',
            'description.required' => 'A message is required',
            'image.max' => 'Maximum file size to upload is 2MB (2048 KB). If you are uploading a photo, try to reduce its resolution to make it under 2MB',
            'image.mimes' => 'The image must be of webp format'
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
            //Validate the form
            'title' => 'required|max:100',
            'client' => 'required|max:200',
            // 'c_logo' => 'required|max:200',
            'excerpt' => 'max:250|required',
            'description' => 'required',
            'budget' => 'required|numeric',
            'location' => 'required|max:100',
            'region' => 'required|max:200',
            'sector' => 'required|max:100',
            'industry' => 'required|max:200',
            'nature' => 'required|max:100',
            'Sdate' => 'nullable|date',
            'Edate' => 'nullable|date',
            'impact' => 'required',
            // 'orgname' => 'nullable',
            // 'photo' => 'nullable|file|mimes:webp|max:2048'
        ];
    }
}
