<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            // For authenticated users
            'name' => 'required|string|max:255', // Required for guests
            'email' => 'required|email|max:255', // Required for guests
            'message' => 'required|string|min:10|max:2000',
            // 'commentable_id' => 'required|integer', // ID of the item being commented on
            // 'commentable_type' => 'required|string|in:App\Models\Blog,App\Models\Product', // Model types allowed
            // 'parent_id' => 'nullable|exists:comments,id', // For reply comments
        ];
    }
}
