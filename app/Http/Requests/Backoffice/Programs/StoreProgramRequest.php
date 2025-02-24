<?php

namespace App\Http\Requests\Backoffice\Programs;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
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
            'name' => 'required|min:3',
            'brochure' => 'nullable|file|mimes:pdf|max:3500',
            'introduction' => 'required',
            'about'=>'required',
            'description' => 'required',
            'prerequisite'=> 'required',
            'methodology'=> 'required',
            'objective'=> 'required',
            'outcomes'=>'required',
            'cover'=>'nullable|file|mimes:webp|max:500',
            'participants' => 'required',
            'alumni_information' => 'nullable',
            'tools'=>'nullable',
            'courses'=>'required'
            // 'tool_banner.*'=> 'nullable',
        ];
    }
}
