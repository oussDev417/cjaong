<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FunFactRequest extends FormRequest
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
            'count' => ['required', 'integer', 'min:0'],
            'title' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'count.required' => 'Le compteur est requis',
            'count.integer' => 'Le compteur doit être un nombre entier',
            'count.min' => 'Le compteur doit être supérieur ou égal à 0',
            'title.required' => 'Le titre est requis',
            'title.string' => 'Le titre doit être une chaîne de caractères',
            'title.max' => 'Le titre ne peut pas dépasser 255 caractères',
        ];
    }
}
