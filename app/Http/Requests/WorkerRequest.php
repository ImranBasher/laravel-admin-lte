<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerRequest extends FormRequest
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
        'name'        => 'required|string|max:255',
        'email'       => 'required|email',
        'phone'       => 'nullable|string|max:20',
        'designation' => 'required|string|max:255',
        'facebook'    => 'nullable|url',
        'instagram'   => 'nullable|url',
        'twitter'     => 'nullable|url',
        'linkedin'    => 'nullable|url',
        'bio'         => 'nullable|string',
        'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];
    }
}
