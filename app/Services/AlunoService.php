<?php 

namespace App\Services;


use App\Models\Aluno;
use App\Models\Responsavel;
use App\Models\Serie;
use Illuminate\Support\Facades\Validator;
use App\Validacoes\AlunoValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlunoService {


    public function verificaParams($params){
        if($params === 'serie_id'){
            return 'serie_id';
            
    
        } else if($params === 'responsavel') {
            return 'responsavel';
            
        } else {
            return 'Parâmetro inválido';
        }
    }

    public function retornaQuery($parametro, $result){
        if ($parametro === 'serie_id'){
            $listagem = DB::table('aluno')->get()->where('serie_id', $result);
            return $listagem;
        } else {
            $id = DB::select('select id from responsavel where name = ?', [$result]);
            $chave = json_decode(json_encode($id));
            $id = $chave[0]->id;
            $listagem = DB::select('select aluno.*, responsavel.email, responsavel.phone1, responsavel.phone2 from aluno as aluno join responsavel on aluno.responsavel_id = responsavel.id where responsavel.id = ?', [$id]);

            return $listagem;
        }
    }

}