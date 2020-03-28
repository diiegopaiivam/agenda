<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AlunoService;


class AlunoController extends Controller
{

    private $alunoService;
    public function __construct(AlunoService $alunoService)
    {
        $this->alunoService = $alunoService;
    }

    public function index(){
        return $this->alunoService->listarAlunos();
    }

    public function store(Request $request){
        return $this->alunoService->cadastrarAluno($request);
    }

    public function update($id, Request $request){
        return $this->alunoService->atualizarAluno($id, $request);
    }

    public function delete($id){
        return $this->alunoService->deletarAluno($id);
    }

    
}