<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResponsibleStoreRequest extends FormRequest
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
            'name' => ['required|string|max:100'],
            'phone' => ['required|string|max:15'],
            'phone2' => ['nullable|string|max:15'],
            'email' => ['required|email|max:100'],
        ];
    }
}