<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;

class AlunosController extends Controller
{
    //

	public function index(){

		//$turmas = Turma::all()->sortby('nome');
		$dez=10;
		$onze=11;
		$doze=12;
		$decimo=Turma::where('nome','Like','%'.$dez.'%')->get();
		$decimo1=Turma::where('nome','Like','%'.$onze.'%')->get();
		$decimo2=Turma::where('nome','Like','%'.$doze.'%')->get();
		return view('alunos.index',[
			'decimos'=>$decimo,
			'decimos1'=>$decimo1,
			'decimos2'=>$decimo2,
		]);
	}

	public function show(Request $req){

		$idTurma=$req->id;
		$alunos=Aluno::where('id_turma',$idTurma)->get()->sortby('nome');

		return view('alunos.show', [

			'alunos'=>$alunos
		]);
	}

	public function showAlunos(Request $req){

		$idAluno=$req->id;
		$aluno=Aluno::where('id_aluno',$idAluno)->first();
		return view('alunos.showAlunos',[
			'aluno'=>$aluno,
		]);
	}

	public function pesquisa(Request $req){

		$nomeAluno=$req->pesquisa;
		$alunos=Aluno::where('nome','Like','%'.$nomeAluno.'%')->with('turma')->get();
	
		 return view('alunos.pesquisa',[
		 	'alunos'=>$alunos,
		 	'nomeAluno'=>$nomeAluno,
		 ]);
	}

	public function destroy(Request $r){

		$aluno=Aluno::where('id_aluno',$r->id)->first();
		
		if(is_null($aluno)){

			return redirect()->route('alunos.index')->with('msg','O aluno nao existe!!!');
		}
		else{

			$aluno->delete();
			return redirect()->route('alunos.index');
		}
	}

    public function create(){

    	return view('alunos.create');
    }
}
