<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
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
            'description_start'     => 'required|string',
            'description_middle'    => 'required|string',
            'description_end'       => 'required|string',
            'mechanics_title_start' => 'required|string',
            'mechanics_title_end'   => 'required|string',
            'mechanics_description' => 'required|string',
            'video_link'            => 'nullable|url',
            'about_us_image'        => 'nullable|array',
            'about_us_image.*'        => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        //  dd($this->all());
    }
}
