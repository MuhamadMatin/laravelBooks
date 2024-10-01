<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => ['sometimes', 'email', 'string', 'unique:users,email,' . $this->user->id, 'max:255'],
            // 'password' => ['sometimes', 'password', 'max:255'],
            'profile_photo_path' => ['sometimes', 'image', 'mimes:jpg,jpeg,png,svg', 'max:1024'],
        ];
    }
}
