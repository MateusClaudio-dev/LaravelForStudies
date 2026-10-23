<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContaRequest extends FormRequest
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
            'nome' => 'required',
            'valor' => 'required|max:10',
            'vencimento' => 'required'
        ];
    }

    public function messages(): array 
    {
        return[
            'nome.required' => 'O campo nome é obrigatório',
            'valor.required' => 'O campo valor é obrigatório',
            'valor.max' => 'O preço pode ter no máximo 8 números',
            'vencimento.required' => 'O campo vencimento é obrigatório',
        ];
    }
}
