<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Aluno;

class Serie extends Model{


    protected $table = 'serie';
 	
    protected $fillable = [
        'serie','turma','turno'
    ];

    protected $casts = [
        'date' => 'Timestamp',
    ];

    public $timestamps = false;

    public function getSeries($id){
        $result = DB::select('
        select *
        from serie as ser
        join aluno as alu
        on ser.id = alu.serie_id 
        where serie_id = '.$id);
        
        return $result;
    }

    public function aluno(){
        return $this->hasMany(Aluno::class, 'serie_id');
    }

}