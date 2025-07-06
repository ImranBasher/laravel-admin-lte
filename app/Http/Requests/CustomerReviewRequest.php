<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerReviewRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_name'    => 'required|string|max:255',
            'place'            => 'required|string|max:255',
            'customer_message' => 'required|string',
            'rating'           => 'required|integer|between: 1,5',
            'company'          => 'nullable|string',
            'customer_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
