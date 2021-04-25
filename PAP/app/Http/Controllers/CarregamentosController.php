<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimento;
use App\Models\Aluno;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\Gate;

class CarregamentosController extends Controller
{
    public function index(Request $req){

        if(auth()->check()){
            if(Gate::allows('papelaria') || Gate::allows('admin')){
                $idAluno=$req->id;
                $aluno=Aluno::where('id_aluno',$idAluno)->first();
                $movimento=Movimento::where('id_aluno',$idAluno)->where('tipo_movimento','carregamento')->orderBy('id_movimento','desc')->paginate(10);
                
            	return view('papelaria.carregamentos.carregamentos',[
                    'aluno'=>$aluno,
                    'movimento'=>$movimento
                ]);
            }
            else{
                return redirect()->route('logout');
            }
        }
        else{
            return redirect()->route('home');
        }
    }

    public function idAluno(){

        if(auth()->check()){
            if(Gate::allows('papelaria') || Gate::allows('admin')){
    	       return view('papelaria.carregamentos.idAluno');
            }
            else{
                return redirect()->route('logout');
            }
        }
        else{
            return redirect()->route('home');
        }
    }

    public function exec(Request $req){

         if(auth()->check()){
            if(Gate::allows('papelaria') || Gate::allows('admin')){
            	$cartao=$req->idAluno;
            	$aluno=Aluno::where('cartao_aluno',$cartao)->first();



            	if(!empty($aluno)){ 
                    $hoje=now()->startOfDay();
                    $entrada_saida=Movimento::where('id_aluno',$aluno->id_aluno)->where('tipo_movimento','portaria')->where('created_at','>',$hoje)->orderBy('id_movimento','desc')->first();
                    if(!is_null($entrada_saida)){
                        if($entrada_saida->entrada_saida==0){
                            return redirect()->route('papelaria.carregamentos.carregamentos',[
                                'id'=>$aluno->id_aluno
                            ]);
                        }
                        else{
                            return redirect()->route('papelaria.carregamentos.idAluno')->with('msg','O aluno não passou a pulseira na portaria!');
                        }
                    }
                    else{
                        return redirect()->route('papelaria.carregamentos.idAluno')->with('msg','O aluno não passou a pulseira na portaria!');
                    }
            	}
            	else{
            		return redirect()->route('papelaria.carregamentos.idAluno')->with('msg','O aluno não existe');
            	}
            }
            else{
                return redirect()->route('logout');
            }
        }
        else{
            return redirect()->route('home');
        }
    }

    public function carregamentos(Request $req){
        
        if(auth()->check()){
            if(Gate::allows('papelaria') || Gate::allows('admin')){
                $carregamento=$req->display_final;
                
                $idAluno=$req->id;

                $alunos=Aluno::where('id_aluno',$idAluno)->first();
                
                if($carregamento>=0.30){
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
                else{
                    return redirect()->route('papelaria.carregamentos.carregamentos',[
                        'id'=>$idAluno
                    ])->with('msg','Valor incorreto');
                }
            }
            else{
                return redirect()->route('logout');
            }
        }
        else{
            return redirect()->route('home');
        }  
    }
}
