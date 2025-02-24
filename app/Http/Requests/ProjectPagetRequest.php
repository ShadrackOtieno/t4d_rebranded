<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\ProjectPage;

class ProjectPagetRequest extends FormRequest
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
            'title.unique' => 'You have a project with the same title',
            'excerpt.required' => 'A message is required',
            'description.required' => 'A message is required',
            'photo.max' => 'Maximum file size to upload is 2MB (2048 KB). If you are uploading a photo, try to reduce its resolution to make it under 2MB',
            'photo.mimes' => 'The image must be of webp format',
            'image.max' => 'Maximum file size to upload is 2MB (2048 KB). If you are uploading a photo, try to reduce its resolution to make it under 2MB',
            'image.mimes' => 'The image must be of webp format',
            'images.max' => 'Maximum file size to upload is 2MB (2048 KB). If you are uploading a photo, try to reduce its resolution to make it under 2MB',
            'images.mimes' => 'The image must be of webp format',
            'logo.max' => 'Maximum file size to upload is 2MB (2048 KB). If you are uploading a photo, try to reduce its resolution to make it under 2MB',
            'logo.mimes' => 'The image must be of webp format',
            
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
            'title' => 'required|max:100|unique:project_pages',
            'client' => 'required|max:200',
            'c_logo' => 'required|file|mimes:webp|max:2048',
            'budget' => 'required|numeric',
            'location' => 'required|max:100',
            'region' => 'required|max:200',
            'sector' => 'required|max:100',
            'industry' => 'required|max:200',
            'nature' => 'required|max:100',
            'Sdate' => 'required|date',
            'Edate' => 'nullable|date',
            'impact' => 'required',
            'orgname' => 'nullable|max:100',
            'excerpt' => 'required|max:250',
            'description' => 'required',
            'photo' => 'required|file|mimes:webp|max:2048',
            'images.*' => 'nullable|file|mimes:webp|max:2048',
            'logo' => 'nullable|file|mimes:webp|max:2048'

        ];
    }
}
