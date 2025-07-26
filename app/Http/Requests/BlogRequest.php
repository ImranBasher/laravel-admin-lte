<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title'            => 'required|string|max:255',
            'short_title'      => 'required|string|max:255',
            'author'           => 'nullable|string|max:20',
            'description_1'    => 'nullable|string',
            'description_2'    => 'nullable|string',
            'description_3'    => 'nullable|string',
            'description_4'    => 'nullable|string',
            'description_5'    => 'nullable|string',
            'description_6'    => 'nullable|string',
            'description_7'    => 'nullable|string',


            'blog_images'                   => 'nullable|array',
            'blog_images.*'                 => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'blog_description_1_images'      => 'nullable|array',
            'blog_description_1_images.*'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',    
            
            'blog_description_2_images'      => 'nullable|array',
            'blog_description_2_images.*'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',             

            'blog_description_3_images'      => 'nullable|array',
            'blog_description_3_images.*'    => 'image|mimes:jpeg,png,jpg,gif|max:2048', 

            'blog_description_4_images'      => 'nullable|array',
            'blog_description_4_images.*'    => 'image|mimes:jpeg,png,jpg,gif|max:2048', 


            'blog_description_5_images'      => 'nullable|array',
            'blog_description_5_images.*'    => 'image|mimes:jpeg,png,jpg,gif|max:2048', 


            'blog_description_6_images'      => 'nullable|array',
            'blog_description_6_images.*'    => 'image|mimes:jpeg,png,jpg,gif|max:2048', 


            'blog_description_7_images'      => 'nullable|array',
            'blog_description_7_images.*'    => 'image|mimes:jpeg,png,jpg,gif|max:2048', 






        ];
    }
}
