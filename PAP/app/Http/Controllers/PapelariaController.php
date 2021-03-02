<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimento;
use App\Models\Aluno;

class PapelariaController extends Controller
{
    //

    public function papelaria(Request $req){
    	$idAluno=$req->id;
    	$aluno=Aluno::where('id_aluno', $idAluno)->first();
    	return view('papelaria.papelaria.papelaria',[
    		'aluno'=>$aluno
    	]);
    }
}
