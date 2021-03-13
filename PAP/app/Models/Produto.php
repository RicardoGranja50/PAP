<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $primaryKey="id_produto";
    protected $table="produtos";
    public $timestamps = false;

    protected $fillable=[

      'nome',
      'preco',
      'tipo_produto',
      'foto'
    ];

     public function movimentos(){

        return $this->belongsToMany(
            'App\Models\Movimento', 
            'produtos_compras',
            'id_produto',
            'id_movimento'
        )->withPivot('quantidade');
    }

}
