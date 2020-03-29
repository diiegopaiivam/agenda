<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Responsavel;
use App\Models\Serie;


class Aluno extends Model{

    protected $table = 'aluno';
 	
    protected $fillable = [
        'responsavel_id','serie_id','name','email','phone'
    ];

    protected $casts = [
        'date' => 'Timestamp',
    ];

    public $timestamps = false;

    public function getAlunos(){
        return DB::table('aluno')->get();
    }

    public function updateAluno($id, $request){
        return DB::table('aluno')->where('id', $id)->update($request->except('_token', '_method'));
    }

    public function deleteAluno($id){
        return DB::table('aluno')->where('id', $id)->delete();
    }

    public function getSeries($id){
        return DB::table('aluno')->where('serie_id',$id)->get();
    }

    public function getResponsavel($id){
        return DB::table('aluno')->where('responsavel_id',$id)->get();
    }

    public function aluno($id){
        return DB::table('aluno')->where('id',$id)->get();
    }

    public function responsavel(){
        return $this->belongsTo(Responsavel::class, 'responsavel_id');
    }

    public function serie(){
        return $this->belongsTo(Responsavel::class, 'serie_id');
    }

}