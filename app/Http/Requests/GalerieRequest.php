<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalerieRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'image' => $this->galerie ? ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'] : ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Le titre est requis',
            'title.string' => 'Le titre doit être une chaîne de caractères',
            'title.max' => 'Le titre ne peut pas dépasser 255 caractères',
            'image.required' => 'L\'image est requise',
            'image.image' => 'Le fichier doit être une image',
            'image.mimes' => 'L\'image doit être de type : jpeg, png, jpg, gif',
            'image.max' => 'L\'image ne peut pas dépasser 2Mo',
        ];
    }
}
