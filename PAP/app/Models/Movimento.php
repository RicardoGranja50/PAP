<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    use HasFactory;

    protected $primaryKey="id_movimento";
    protected $table="movimentos";

    public function alunos(){

    	return $this->belongsTo('App\Http\Controllers\AlunosController', 'id_aluno');
    }
}
