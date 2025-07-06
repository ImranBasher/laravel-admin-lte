<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaseStadyRequest extends FormRequest
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
            'service_name' => 'required|string|max:255',
            'service_work' => 'required|string',
            'description'  => 'required|string',
            'slug'         => 'required|string|unique:case_studies,slug,'.$this->case_study?->id,
            'client_name'  => 'nullable|string',
            'client_logo'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cover_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
