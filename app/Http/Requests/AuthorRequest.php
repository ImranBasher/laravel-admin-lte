<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:authors,email,'.$this->author?->id,
            'phone'     => 'nullable|string|max:20',
            'facebook'  => 'nullable|url',
            'twitter'   => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin'  => 'nullable|url',
            'author_photos'     => 'nullable|array',
            'author_photos.*'     => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio'       => 'nullable|string'
        ];

    }
}
