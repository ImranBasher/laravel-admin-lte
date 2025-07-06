<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainBannerRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'short_title' => 'required|string|max:255',
            'long_title'  => 'required|string',
            'banner_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'animation_banner_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
