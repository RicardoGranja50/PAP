<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Movimento;

class PortariaController extends Controller
{
    //


	public function portaria(){

		if(auth()->check()){
            if(Gate::allows('portaria') || Gate::allows('admin')){
				$hoje=now()->startOfDay();
				$movimento=Movimento::where('tipo_movimento','portaria')->where('created_at','>',$hoje)->with('alunos')->orderBy('id_movimento','desc')->paginate(6);

				return view('portaria.index',[
					'movimentos'=>$movimento,
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

	public function formulario(Request $req){

		if(auth()->check()){
            if(Gate::allows('portaria') || Gate::allows('admin')){
				$cartao=$req->cartao;
				$aluno=Aluno::where('cartao_aluno',$cartao)->first();

				if(is_null($aluno)){
					$erro=1;
					return redirect()->route('portaria.index')->with('erro','Aluno inexistente!!');
				}
				else{
					$hoje=now()->startOfDay();

					$mov_teste=Movimento::where('id_aluno',$aluno->id_aluno)->where('tipo_movimento','portaria')->where('created_at','>',$hoje)->orderBy('id_movimento','desc')->first();
					if(!is_null($mov_teste)){
						if($mov_teste->entrada_saida==1){
							$movimento['tipo_movimento']="portaria";
							$movimento['id_aluno']=$aluno->id_aluno;
							$movimento['entrada_saida']=0;

							$add=Movimento::create($movimento);
						}	
						else{
							$movimento['tipo_movimento']="portaria";
							$movimento['id_aluno']=$aluno->id_aluno;
							$movimento['entrada_saida']=1;

							$add=Movimento::create($movimento);
						}
					}
					else{
						$movimento['tipo_movimento']="portaria";
						$movimento['id_aluno']=$aluno->id_aluno;
						$movimento['entrada_saida']=0;

						$add=Movimento::create($movimento);
					}	
					return redirect()->route('portaria.index');
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