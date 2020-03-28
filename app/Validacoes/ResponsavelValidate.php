<?php 

namespace App\Validacoes;

class ResponsavelValidate {
    public const MENSAGENS_DE_ERRO = [
        'required'    => 'O campo :attribute é obrigatorio',
        'numeric'     => 'O valor do campo deve ser numerico',
        'max'         => 'O :attribute deve ter no máximo :max caracteres',
        'min'         => 'O :attribute deve ter no mínimo :min caracteres',
        'unique'      => 'O :attribute deve ser único'
    ];
 
    public const REGRA_NOVO_RESPONSAVEL = [
        'name'          => 'required | min: 3 | max:80',
        'email'         => 'required | unique:responsavel',
        'phone1'        => 'required | numeric | min:9',
        'phone2'        => 'required | numeric | min:9'
    ];
}