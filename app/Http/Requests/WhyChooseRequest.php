<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhyChooseRequest extends FormRequest
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
            'title_start' => 'required|string|max:255',
            'title_end'   => 'required|string|max:255',
            'video_link'  => 'nullable|url',
            'why_choose_image'   => 'nullable|image|mimes: jpeg,png,jpg,gif|max:2048'
        ];
    }
}
