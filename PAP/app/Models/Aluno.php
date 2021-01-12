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

    protected $fillable=[

        'nome',
        'morada',
        'codigo_postal',
        'telemovel',
        'email',
        'nome_enc',
        'telemovel_enc',
        'id_civil_aluno',
        'localidade',
        'nascimento',
        'id_turma',
        'foto_aluno'
    ];

    public function movimentos(){

    	return $this->hasMany('App\Models\Movimento', 'id_aluno');
    }

    public function turma(){

    	return $this->belongsTo('App\Models\Turma','id_turma');
    }
}
