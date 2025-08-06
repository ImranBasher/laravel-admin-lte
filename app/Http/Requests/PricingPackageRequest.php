<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PricingPackageRequest extends FormRequest
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
        // dd($this->all());
        return [
            'name'          => 'required|string|max:255',
            'subtitle'      => 'required|string|max:255',
            'monthly_price' => 'required|numeric',
            'yearly_price'  => 'required|numeric',
            'features'      => 'required|string',
            'is_popular'    => 'boolean',
            'tag_text'      => 'nullable|string|max:255'
        ];
    }
}
