<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Responsavel extends Model {

    protected $table = 'responsavel';
 	
    protected $fillable = [
        'name','email','phone1','phone2'
    ];

    protected $casts = [
        'date' => 'Timestamp',
    ];

    public $timestamps = false;

    public function getResponsavel(){
        return DB::table('responsavel')->get();
    }

    public function updateResponsavel($id, $request){
        return DB::table('responsavel')->where('id', $id)->update($request->except('_token', '_method'));
    }

    public function deleteResponsavel($id){
        return DB::table('responsavel')->where('id', $id)->delete();
    }

    public function aluno(){
        return $this->hasMany(Aluno::class, 'responsavel_id');
    }
}