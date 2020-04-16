<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Validacoes\AlunoValidate;
use App\Models\Aluno;
use App\Services\AlunoService;


class AlunoController extends Controller
{
    public function index(Request $request){
        if(!$request->query()){
            $listagem = DB::table('aluno')->get();
            //echo "<pre>";print_r($request->query());die;

            if(count($listagem) > 0){
                return response()->json($listagem, 200);
            } else {
                return response()->json("Não há alunos cadastrados!", 400);
            }
        } else {
            $array = $request->query();
            $data = key($array);
            $aluno = new AlunoService;
            $parametro = $aluno->verificaParams($data);
            $result = $request->query($parametro);
            $listagem = $aluno->retornaQuery($parametro, $result);
            //echo "<pre>";print_r($parametro);die;

            // if($serie){
            //     $listagem = DB::table('aluno')->get()->where('serie_id', $serie);
            //     return response()->json($listagem, 200);
            // }
            
            // $id = DB::select('select id from responsavel where name = ?', [$responsavel]);
            // $chave = json_decode(json_encode($id));
            // $id = $chave[0]->id;
            // $listagem = DB::select('select aluno.*, responsavel.email, responsavel.phone1, responsavel.phone2 from aluno as aluno join responsavel on aluno.responsavel_id = responsavel.id where responsavel.id = ?', [$id]);
            
            
            return response()->json($listagem, 200);

        }
    }

    public function show($id){
        $aluno = Aluno::find($id);
        if($aluno){
            return response()->json($aluno, 200);
        } else {
            return response()->json("Aluno não encontrado!", 400);
        }
    }

    public function store(Request $request){
        $validacao = Validator::make(
            $request->all(),
            AlunoValidate::REGRA_NOVO_ALUNO,
            AlunoValidate::MENSAGENS_DE_ERRO              
        );
 
        if($validacao->fails()) {
            return response()->json($validacao->errors(), 400); 
        } else {
            $aluno = Aluno::create($request->all()); //Salva o registro;
            if(!$aluno){
                return response()->json('Falha ao Cadastrar o Aluno');
            } else {
                return response()->json($aluno, 201);
            }
        }    
    }

    public function update($id, Request $request){
        $aluno = Aluno::find($id);
        $update = $aluno->update($request->all());

        if(!$update){
            return response()->json('Falha ao atualizar o aluno', 400);
        } else {
            return response()->json($update, 200);
        }
    }

    public function delete($id){
        $deletar = Aluno::destroy($id);

        if($deletar){
            return response()->json('Aluno excluído!', 200);
        } else {
            return response()->json('Não foi possível deletar o aluno');
        }
    }

    
}