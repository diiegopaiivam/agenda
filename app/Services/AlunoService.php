<?php 

namespace App\Services;


use App\Models\Aluno;
use App\Models\Serie;
use Illuminate\Support\Facades\Validator;
use App\Validacoes\AlunoValidate;
use Illuminate\Http\Request;

class AlunoService {


    private $aluno;
    private $serie;

    public function __construct(Aluno $aluno, Serie $serie){
        $this->aluno = $aluno;
        $this->serie = $serie;
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

    public function getAluno($id){
        $aluno = $this->aluno->aluno($id);

        if(count($aluno) > 0){
            return response()->json($aluno, 200);
        } else {
            return response()->json("Aluno não encontrado!", 400);
        }
    }

    public function alunosPorSerie($id){
        $series = $this->aluno->getSeries($id);
        $array = json_decode(json_encode($series), true);
        
        if(count($array) > 0){
            return response()->json($array, 200);
        } else {
            return response()->json("Não há alunos cadastrados por serie", 202);
        }
    }

    public function seriesComAlunos($id){
        $series = $this->serie->getSeries($id);
        $array = json_decode(json_encode($series), true);
 
        if(count($array) > 0){
            return response()->json($array ,200);
        } else {
            return response()->json("Não há alunos cadastrados nessa série", 404);
        }
    }

    public function alunosPorResponsavel($id){
        $responsavel = $this->aluno->getResponsavel($id);

        if(count($responsavel) > 0){
            return response()->json($responsavel, 200);
        } else {
            return response()->json("Não há alunos para esse responsável", 202);
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