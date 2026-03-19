<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Autoriser l'action
    }

    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'status'      => 'required|in:À faire,En cours,Terminé',
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'       => 'Le titre est obligatoire pour créer une mission.',
            'category_id.required' => 'Veuillez choisir une catégorie valide.',
            'category_id.exists'   => 'Cette catégorie n\'existe pas.',
            'status.required'      => 'Le statut est nécessaire (À faire, En cours ou Terminé).',
            'status.in'            => 'Le statut choisi est incorrect.',
        ];
    }
}