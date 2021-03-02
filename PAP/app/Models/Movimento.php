<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    use HasFactory;

    protected $primaryKey="id_movimento";
    protected $table="movimentos";
    protected $dates=['created_at'];
    public $timestamps = true;

    protected $fillable=[

        'carregamento',
        'tipo_movimento',
        'id_aluno',
        'created_at'
    ];

    public function alunos(){

    	return $this->belongsTo('App\Models\Aluno', 'id_aluno');
    }
}
