<?php 

namespace App\Validacoes;

class AlunoValidate {
    public const MENSAGENS_DE_ERRO = [
        'required'    => 'O campo :attribute é obrigatorio',
        'numeric'     => 'O valor do campo deve ser numerico',
        'max'         => 'O :attribute deve ter no máximo :max caracteres',
        'min'         => 'O :attribute deve ter no mínimo :min caracteres',
        'unique'      => 'O :attribute deve ser único'
    ];
 
    public const REGRA_NOVO_ALUNO = [
        'responsavel_id'    => 'required',
        'serie_id'          => 'required',
        'name'              => 'required | min: 3 | max:80',
        'email'             => 'required | unique:aluno',
        'phone'             => 'required | numeric | min:9',
    ];
}