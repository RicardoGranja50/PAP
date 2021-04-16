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
        'created_at',
        'carrinho',
        'entrada_saida'
    ];

    public function alunos(){

    	return $this->belongsTo('App\Models\Aluno', 'id_aluno');
    }

    public function produtos(){

        return $this->belongsToMany(
            'App\Models\Produto', 
            'produtos_compras',
            'id_movimento',
            'id_produto'
        )->withPivot('quantidade','valor');
    }
}
