<?php

namespace App\Http\Requests\Backoffice\Career;

use Illuminate\Foundation\Http\FormRequest;

class CareerModuleRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'department' => 'required|max:50',
            'Job_Category' => 'required|max:50',
            'Job_description' => 'required',
            'requirements' => 'required',
            'date' => 'required|date'
        ];
    }
}
