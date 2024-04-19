<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalRecordStoreRequest extends FormRequest
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
            'birth' => ['required|date'],
            'height' => ['required|numeric'],
            'weight' => ['required|numeric'],
            'blood_type' => ['nullable|string|max:100'],
            'allergies' => ['nullable|string|max:100'], 
            'medications' => ['nullable|string|max:100'],
            'diseases' => ['nullable|string|max:100'],
            'surgeries' => ['nullable|string|max:100'],
            'observations' => ['nullable|string'],
        ];
    }
}