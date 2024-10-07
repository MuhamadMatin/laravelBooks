<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasRole(['Admin', 'admin', 'Editor', 'editor']);
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
            'slug' => ['sometimes', 'string', 'unique:pages,slug', 'max:255'],
            'body' => ['required', 'string'],
            'chapter_id' => ['required', 'integer', 'exists:chapters,id'],
            'book_id' => ['required', 'integer', 'exists:books,id'],
        ];
    }
}
