<?php 

namespace App\Services;

use App\Models\Aluno;
use Illuminate\Support\Facades\Validator;
use App\Validacoes\AlunoValidate;
use Illuminate\Http\Request;

class AlunoService {

    private $aluno;

    public function __construct(Aluno $aluno){
        $this->aluno = $aluno;
    }


    public function cadastrarAluno($request){

        $validacao = Validator::make(
            $request->all(),
            AlunoValidate::REGRA_NOVO_ALUNO,
            AlunoValidate::MENSAGENS_DE_ERRO              
        );
 
        if($validacao->fails()) {
            return response()->json($validacao->errors(), 400); 
        } else {
            $store = $this->aluno->create($request->all()); //Salva o registro
            if(!$store){
                return response()->json('Falha ao Cadastrar o Aluno');
            } else {
                return response()->json($store, 201);
            }
        }    
    
    }

    public function listarAlunos(){

        $listagem = $this->aluno->getAlunos();

        if(count($listagem) > 0){
            return response()->json($listagem, 200);
        } else {
            return response()->json("Não há alunos cadastrados!", 400);
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