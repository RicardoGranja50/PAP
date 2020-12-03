<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $primaryKey="id_aluno";
    protected $table="alunos";
    protected $dates=['nascimento'];
    public $timestamps = false;

    public function movimentos(){

    	return $this->hasMany('App\Models\Movimento', 'id_aluno');
    }

    public function turma(){

    	return $this->belongsTo('App\Models\Turma','id_turma');
    }
}
