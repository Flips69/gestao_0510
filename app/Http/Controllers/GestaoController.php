<?php

namespace App\Http\Controllers;

use App\Http\Requests\GestaoFormRequest;
use App\Models\GestaoModel;
use Illuminate\Http\Request;

class GestaoController extends Controller
{
    public function store(GestaoFormRequest $request){
        $gestao = GestaoModel::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'data_inicio' => $request->data_inicio,
            'data_termino' => $request->data_termino,
            'valor_projeto' => $request->valor_projeto,
            'status' => $request->status
        ]);

        return response()->json([
            "sucess" => true,
            "message" => "Projeto foi cadastrado com sucesso.",
            "data" => $gestao
        ],200);
    }

    public function excluir($id){
        $gestao = GestaoModel::find($id);

        if(!isset($gestao)){
            return response()->json([
                'status' => false,
                'message' => "Projeto não foi encontrado."
            ]);
        }

    $gestao ->delete();
    
        return response()->json([
            'status' => false,
            'message' => "Projeto foi excluído com sucesso."
        ]);
    }
}
