<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Validacoes\AlunoValidate;
use App\Models\Aluno;


class AlunoController extends Controller
{
    public function index(Request $request){
        if(!$request->query()){
            $listagem = DB::table('aluno')->get();
            echo "<pre>";print_r($request->query());die;

            if(count($listagem) > 0){
                return response()->json($listagem, 200);
            } else {
                return response()->json("Não há alunos cadastrados!", 400);
            }
        } else {
            $serie = $request->query('serie_id');
            if($serie){
                $listagem = DB::table('aluno')->get()->where('serie_id', $serie);
                return response()->json($listagem, 200);
            }
            
            $responsavel = $request->query('responsavel');
            $id = DB::select('select id from responsavel where name = ?', [$responsavel]);
            $chave = json_decode(json_encode($id));
            $id = $chave[0]->id;
            $listagem = DB::select('select aluno.*, responsavel.email, responsavel.phone1, responsavel.phone2 from aluno as aluno join responsavel on aluno.responsavel_id = responsavel.id where responsavel.id = ?', [$id]);
            
            
            return response()->json($listagem, 200);

        }
    }

    public function show($id){
        $aluno = DB::table('aluno')->where('id',$id)->get();
        if(count($aluno) > 0){
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
            $aluno = new Aluno;
            $store = $aluno->create($request->all()); //Salva o registro
            if(!$store){
                return response()->json('Falha ao Cadastrar o Aluno');
            } else {
                return response()->json($store, 201);
            }
        }    
    }

    public function update($id, Request $request){
        $atualiza = DB::table('aluno')->where('id', $id)->update($request->except('_token', '_method'));

        if(!$atualiza){
            return response()->json('Falha ao atualizar o aluno', 400);
        } else {
            return response()->json($atualiza, 200);
        }
    }

    public function delete($id){
        $deletar = DB::table('aluno')->where('id', $id)->delete();

        if($deletar){
            return response()->json('Aluno excluído!', 200);
        } else {
            return response()->json('Não foi possível deletar o aluno');
        }
    }

    
}