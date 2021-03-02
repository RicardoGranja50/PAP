<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimento;
use App\Models\Aluno;

class CarregamentosController extends Controller
{
    public function index(Request $req){

        $idAluno=$req->id;
        $aluno=Aluno::where('id_aluno',$idAluno)->first();
        $movimento=Movimento::where('id_aluno',$idAluno)->orderBy('id_movimento','desc')->paginate(10);
        
    	return view('papelaria.carregamentos.carregamentos',[
            'aluno'=>$aluno,
            'movimento'=>$movimento
        ]);
    }

    public function idAluno(){

    	return view('papelaria.carregamentos.idAluno');
    }

    public function exec(Request $req){

    	$idAluno=$req->idAluno;
    	$aluno=Aluno::where('id_aluno',$idAluno)->first();

    	if(!empty($aluno)){
    		return redirect()->route('papelaria.carregamentos.carregamentos',[
    			'id'=>$idAluno
    		]);
    	}
    	else{
    		return redirect()->route('papelaria.carregamentos.idAluno')->with('msg','O aluno não existe');
    	}
    }

    public function carregamentos(Request $req){
        
        $carregamento=$req->display_final;
        
        $idAluno=$req->id;

        $alunos=Aluno::where('id_aluno',$idAluno)->first();
        
        $papelaria['carregamento']=$carregamento;

        $papelaria['id_aluno']=$idAluno;
        
        $papelaria['tipo_movimento']="carregamento";
        
        $carregamentos=Movimento::create($papelaria);
        

        $valor=$alunos->saldo + $carregamento;

        $saldo['saldo']=$valor;
        
        $alunos->update($saldo);
        return redirect()->route('papelaria.carregamentos.carregamentos',[
            'id'=>$idAluno
        ]);
    }
}
