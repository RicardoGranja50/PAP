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

    public function movimentos(){

    	return $this->hasMany('App\Http\Controllers\MovimentosController', 'id_aluno');
    }

    public function turma(){

    	return $this->belongsTo('App\Http\Controllers\TurmasController','id_turma');
    }
}
