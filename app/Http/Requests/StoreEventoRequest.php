<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|min:3|max:150',
            'categoria_id' => 'required|exists:categorias,id',
            'descricao' => 'required|string|min:10',
            'data_evento' => 'required|date',
            'local' => 'required|string|max:255',
            'preco_ingresso' => 'required|numeric|min:0',
            'capacidade' => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O campo título é obrigatório.',
            'categoria_id.exists' => 'Selecione uma categoria válida.',
            'preco_ingresso.numeric' => 'O preço deve ser um número válido.',
        ];
    }
}
