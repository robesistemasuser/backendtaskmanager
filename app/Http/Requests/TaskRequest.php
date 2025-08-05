<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // o ajusta según tus políticas de autorización
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'completed' => ['sometimes', 'boolean'],
            'keyword_ids' => ['nullable', 'array'],
            'keyword_ids.*' => ['integer', 'exists:keywords,id']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título de la tarea es obligatorio.',
            'keyword_ids.array' => 'Las palabras clave deben ser un arreglo.',
            'keyword_ids.*.integer' => 'Cada palabra clave debe ser un número.',
            'keyword_ids.*.exists' => 'Una de las palabras clave no existe en la base de datos.'
        ];
    }
}
