<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:categories,name,',
        ];
    }
    /**
     * Messages d'erreur personnalisés en français.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom de la catégorie est indispensable pour continuer.',
            'name.string'   => 'Le nom doit être composé de texte uniquement.',
            'name.max'      => 'Le nom est trop long (maximum 255 caractères).',
            'name.unique'   => 'Désolé, cette catégorie existe déjà dans votre liste.',
        ];
    }
}
