<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubServiceCategoryRequest extends FormRequest
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
            'logo'                              => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner'                            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'service_category_id'              => 'required|exists:service_categories,id',
            'sub_service_name'                 => 'required|string|max:255',
            'banner_short_title'               => 'nullable|string|max:255',
            'banner_long_title'                => 'nullable|string|max:255',
            'banner_description'               => 'nullable|string',
            'service_introduction_description' => 'nullable|string',

            'key_services_list'                => 'nullable|string|max:255',
            'key_service_description'          => 'nullable|string',
            'key_service_images'                => 'nullable|array',
            'key_service_images.*'              => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'features_and_benefit_list'        => 'nullable|string|max:255',
            'features_and_benefit_description' => 'nullable|string',
            'features_and_benefit_images'        => 'nullable|array',
            'features_and_benefit_images.*'        => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'how_do_we_work_list'              => 'nullable|string|max:255',
            'how_do_we_work_description'       => 'nullable|string',
            'how_do_we_work_images'              => 'nullable|array',
            'how_do_we_work_images.*'            => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'expected_result_list'             => 'nullable|string|max:255',
            'expected_result_description'      => 'nullable|string',
            'expected_result_images'             => 'nullable|array',
            'expected_result_images.*'             => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'quantity'                         => 'nullable|int|max:255',
            'quantity_logo'                     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'svg_icon'                          => 'nullable',

            'meta_title'        => 'nullable|string|max:255',
            'meta_keywords'     => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
        ];

    }
}
