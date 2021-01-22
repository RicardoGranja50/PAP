<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\Gate;

class AlunosController extends Controller
{
    //
    private $x;

	public function index(){

        if(auth()->check()){

            //$turmas = Turma::all()->sortby('nome');
            $dez=10;
            $onze=11;
            $doze=12;
            $decimo=Turma::where('ano','Like','%'.$dez.'%')->get();
            $decimo1=Turma::where('ano','Like','%'.$onze.'%')->get();
            $decimo2=Turma::where('ano','Like','%'.$doze.'%')->get();
            return view('alunos.index',[
                'decimos'=>$decimo,
                'decimos1'=>$decimo1,
                'decimos2'=>$decimo2,
            ]);
        }
	}

	public function show(Request $req){

        if(auth()->check()){
    		$idTurma=$req->id;
    		$turma=Turma::where('id_turma',$idTurma )->first();
    		$alunos=Aluno::where('id_turma',$idTurma)->get()->sortby('nome');
            $vazio=Aluno::where('id_turma',$idTurma)->first();

    		return view('alunos.show', [

    			'alunos'=>$alunos,
    			'turma'=>$turma,
                'vazio'=>$vazio
    		]);
        }
	}

	public function showAlunos(Request $req){

        if(auth()->check()){
    		$idAluno=$req->id;
    		$aluno=Aluno::where('id_aluno',$idAluno)->with('turma')->first();
    		return view('alunos.showAlunos',[
    			'aluno'=>$aluno,
                
    		]);
        }
	}

	public function pesquisa(Request $req){

        if(auth()->check()){
    		$nomeAluno=$req->pesquisa;
    		$alunos=Aluno::where('nome','Like','%'.$nomeAluno.'%')->with('turma')->get();
    	
    		 return view('alunos.pesquisa',[
    		 	'alunos'=>$alunos,
    		 	'nomeAluno'=>$nomeAluno,
    		 ]);
        }
	}

	public function destroy(Request $r){

        if(auth()->check()){
            if(Gate::allows('admin')){
                $aluno=Aluno::where('id_aluno',$r->id)->first();
            
                if(is_null($aluno)){

                    return redirect()->route('alunos.index');
                }
                else{

                    $idAluno=$r->id;
                    $aluno=Aluno::findOrFail($idAluno);
                    $fotoAntiga=$aluno->foto_aluno;

                    if(!is_null($fotoAntiga)){
                        Storage::Delete('imagens/alunos/'.$fotoAntiga);
                    }
                    $aluno->delete();  
                    return redirect()->route('alunos.index')->with('eliminada','Aluno eliminado!');
                }
            }
            else{
                return redirect()->route('alunos.index')->with('eliminada','Não tem permissão !');
            }
        }
    }
    

    public function create(){

        if(auth()->check()){
             if(Gate::allows('admin')){
         		$turmas=Turma::all();
            	return view('alunos.create',[
            		'turmas'=>$turmas,
            	]);
            }
            else{
                return redirect()->route('alunos.index')->with('eliminada','Não tem permissão !');
            }
        }
    }

    public function store(Request $req){


        if(auth()->check()){
            if(Gate::allows('admin')){
            	$novoAluno=$req->validate([
                    'nome'=>['required','min:3','max:150'],
                    'morada'=>['required','min:5','max:250'],
                    'codigo_postal'=>['required','min:8','max:8'],
                    'telemovel'=>['nullable','min:9','max:9'],
                    'email'=>['nullable','min:8','max:150'],
                    'nome_enc'=>['required','min:3','max:150'],
                    'telemovel_enc'=>['required','min:9','max:9'],
                    'id_civil_aluno'=>['required','min:14','max:14'],
                    'localidade'=>['required','min:4','max:250'],
                    'nascimento'=>['required', 'date'],
                    'id_turma'=>['required', 'numeric'],
                    'foto_aluno'=>['required','image','max:2000']
                ]);

               
                $cartao=Aluno::max('cartao_aluno');
                

                $cartao=$cartao+'1';

                $novoAluno['cartao_aluno']=$cartao;

                if($req->hasFile('foto_aluno')){
                    $nomeFoto=$req->file('foto_aluno')->getClientOriginalName();
                    $nomeFoto=time().'_'.$nomeFoto;
                    $guardarFoto=$req->file('foto_aluno')->storeAs('imagens/alunos',$nomeFoto);
                
                    $novoAluno['foto_aluno']=$nomeFoto;
                }


              

                $aluno=Aluno::create($novoAluno);

                return redirect()->route('alunos.index')->with('criada','Aluno criado!');
            }
            else{
                return redirect()->route('alunos.index')->with('eliminada','Não tem permissão !');
            }
        }
    }

    public function edit(Request $req){

        if(auth()->check()){
            if(Gate::allows('admin')){
            	$turmas=Turma::all();

            	$idAluno=$req->id;
            	$aluno=Aluno::where('id_aluno',$idAluno)->first();

            	return view('alunos.edit',[
            		'aluno'=>$aluno,
            		'turmas'=>$turmas
            	]);
            }
            else{
                 return redirect()->route('alunos.index')->with('eliminada','Não tem permissão !');
            }
        }
    }

    public function update(Request $req){

        if(auth()->check()){
            if(Gate::allows('admin')){
            	$idAluno=$req->id;
            	$aluno=Aluno::where('id_aluno',$idAluno)->first();
                $imagemAntiga=$aluno->foto_aluno;

            	$atualizarAluno=$req->validate([
            		'nome'=>['required','min:3','max:150'],
                    'morada'=>['required','min:5','max:250'],
                    'codigo_postal'=>['required','min:8','max:8'],
                    'telemovel'=>['nullable','min:9','max:9'],
                    'email'=>['nullable','min:8','max:150'],
                    'nome_enc'=>['required','min:3','max:150'],
                    'telemovel_enc'=>['required','min:9','max:9'],
                    'id_civil_aluno'=>['required','min:14','max:14'],
                    'localidade'=>['required','min:4','max:250'],
                    'nascimento'=>['required', 'date'],
                    'id_turma'=>['required', 'numeric'],
                    'foto_aluno'=>['required','image','max:2000']
            	]);
                
                if($req->hasFile('foto_aluno')){

                    $nomeFoto=$req->file('foto_aluno')->getClientOriginalName();
                    $nomeFoto=time().'_'.$nomeFoto;
                    $guardarFoto=$req->file('foto_aluno')->storeAs('imagens/alunos',$nomeFoto);
                    
                    if(!is_null($imagemAntiga)){
                        Storage::Delete('imagens/alunos/'.$imagemAntiga);
                    }
                    $atualizarAluno['foto_aluno']=$nomeFoto;
                }

            	$aluno->update($atualizarAluno);

            	return redirect()->route('alunos.index')->with('editado','Aluno Editado');
            }
        }
        else{
            return redirect()->route('alunos.index')->with('eliminada','Não tem permissão !');
        }
    }
}
