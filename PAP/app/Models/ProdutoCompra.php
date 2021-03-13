<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoCompra extends Model
{
    use HasFactory;

    protected $primaryKey="id_prod_comp";
    protected $table="produtos_compras";
    public $timestamps = false;

   	protected $fillable=[
   		'id_movimento',
   		'id_produto',
   		'valor',
   		'quantidade'
   	];
}
