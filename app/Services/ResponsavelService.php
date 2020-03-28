<?php 

namespace App\Services;

use App\Models\Responsavel;
use Illuminate\Support\Facades\Validator;
use App\Validacoes\ResponsavelValidate;
use Illuminate\Http\Request;

class ResponsavelService {

    private $responsavel;

    public function __construct(Responsavel $responsavel){
        $this->responsavel = $responsavel;
    }

    public function listarResponsavel(){

        $listagem = $this->responsavel->getResponsavel();

        if(count($listagem) > 0){
            return response()->json($listagem, 200);
        } else {
            return response()->json("Não há alunos cadastrados!", 404);
        }
    }

    public function cadastrarResponsavel($request){

        $validacao = Validator::make(
            $request->all(),
            ResponsavelValidate::REGRA_NOVO_RESPONSAVEL,
            ResponsavelValidate::MENSAGENS_DE_ERRO              
        );
 
        if($validacao->fails()) {
            return response()->json($validacao->errors(), 400); 
        } else {
            $store = $this->responsavel->create($request->all()); //Salva o registro
            if(!$store){
                return response()->json('Falha ao Cadastrar o Responsavel');
            } else {
                return response()->json($store, 201);
            }
        }    
    
    }


    public function atualizarAluno($id, $request){
        $atualiza = $this->aluno->updateAluno($id, $request);

        if(!$atualiza){
            return response()->json('Falha ao atualizar o aluno', 400);
        } else {
            return response()->json($atualiza, 200);
        }
    }

    public function deletarAluno($id){
        $deletar = $this->aluno->deleteAluno($id);

        if($deletar){
            return response()->json('Aluno excluído!', 200);
        } else {
            return response()->json('Não foi possível deletar o aluno');
        }
    }
}