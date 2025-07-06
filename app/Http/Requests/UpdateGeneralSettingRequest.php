<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGeneralSettingRequest extends FormRequest
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
            'company_name_start'  => 'nullable|string|max:255',
            'company_name_middle' => 'nullable|string|max:255',
            'company_name_end'    => 'nullable|string|max:255',
            'phone'               => 'nullable|string|max:20',
            'contact_title'       => 'nullable|string|max:255',
            'email'               => 'nullable|email|max :255',
            'address'             => 'nullable|string|max:500',
            'working_time'        => 'nullable|string|max:255',
            'facebook_link'       => 'nullable|url|max:255',
            'twitter_link'        => 'nullable|url|max:255',
            'instagram_link'      => 'nullable|url|max:255',
            'linkedin_link'       => 'nullable|url|max:255',
            'map_link'            => 'nullable|string',
            'logo'                => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_us_logo'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'blog_header_banner'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ];
    }
}
