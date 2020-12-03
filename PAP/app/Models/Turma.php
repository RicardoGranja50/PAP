<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $primaryKey="id_turma";
    protected $table="turmas";
    public $timestamps = false;

    protected $fillable=[

        'nome',
        'ano',
        'curso_abreviacao'
    ];

    public function alunos(){

    	return $this->hasMany('App\Models\Aluno','id_turma');
    }
}
