<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['string', 'unique:books,slug,' . $this->book->id, 'max:255'],
            'desk' => ['required', 'string'],
            'image' => ['nullable', 'sometimes', 'image', 'mimes:jpg,jpeg,png,svg', 'max:2048'],
            'show' => ['sometimes', 'boolean'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'user_id' => ['sometimes', 'integer', 'exists:users,id'],
        ];
    }
}
