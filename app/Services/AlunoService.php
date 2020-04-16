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


}