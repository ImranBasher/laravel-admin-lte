<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterBannerRequest extends FormRequest
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
            'title_a'     => 'required|string|max:255',
            'title_b'     => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|url'
        ];
    }
}
