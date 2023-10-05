<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GestaoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|unique:gestao, titulo',
            'descricao' => 'required|max:200|min:1',
            'data_inicio' => 'required|date',
            'data_termino' => 'required|date',
            'valor_projeto' => 'required|decimal: 2',
            'status' => 'required'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'sucess' => false,
            'error' => $validator-> errors()
        ]));
    }

    public function messages(){
        return [
            'titulo.required' => 'O campo título é obrigatório',
        ];
    }
}
