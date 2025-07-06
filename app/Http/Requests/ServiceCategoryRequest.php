<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCategoryRequest extends FormRequest
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
            'service_name'  => 'required|string|max:255',
            'short_title'  => 'nullable|string|max:255',
            // 'long_title'  => 'nullable',
            // 'description'  => 'nullable',
            // 'quantity'  => 'nullable',

            'logo_first' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'logo_second' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'quantity_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
