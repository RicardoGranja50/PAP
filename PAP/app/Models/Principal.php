<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principal extends Model
{
    use HasFactory;

    protected $primaryKey="id_login";
    protected $table="login";
    public $timestamps = false;

    protected $fillable=[

        'nome',
        'password',
    ];
}
