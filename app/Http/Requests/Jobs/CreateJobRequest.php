<?php

namespace App\Http\Requests\Jobs;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title'=>'required',
            'location'=>'required',
            'description'=>'required',
            'requirements'=>'required',
            'expires_on'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required'=>'Job Title is required',
            'location.required'=>'Location is required',
            'description.required'=>'Description is required',
            'requirements.required'=>'Requirements is required',
            'expires_on.required'=>'Expires On is required',
        ];
    }
}
