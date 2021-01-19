<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use Auth;
use Illuminate\Support\Facades\Gate;

class TurmasController extends Controller
{
    //

     public function create(){

        if(auth()->check()){
            if(Gate::allows('admin')){
                return view('turmas.create');
            }
            else{
                return redirect()->route('alunos.index')->with('eliminada','Não tem permissão !');
            }
        }
    }

     public function store(Request $req){

        if(auth()->check()){
            if(Gate::allows('admin')){
                $novaTurma=$req->validate([
                    'nome'=>['required','min:3','max:100'],
                    'ano'=>['required','min:2','max:3'],
                    'curso_abreviacao'=>['required','min:1','max:3'],
                ]);


                $turma=Turma::create($novaTurma);

                return redirect()->route('alunos.index')->with('criada','Turma criada!');
            }
            else{
                return redirect()->route('alunos.index')->with('eliminada','Não tem permissão !');
            }
        }
    }

    public function destroy(Request $r){

        if(auth()->check()){
            if(Gate::allows('admin')){
                $turma=Turma::where('id_turma',$r->idt)->first();
                
                if(is_null($turma)){

                    return redirect()->route('alunos.index');
                }
                else{

                    $turma->delete();
                    return redirect()->route('alunos.index')->with('eliminada','A turma foi eliminada!');
                }
            }
            else{
                return redirect()->route('alunos.index')->with('eliminada','Não tem permissão !');
            }
        }
    }

    public function edit(Request $req){

        if(auth()->check()){
            if(Gate::allows('admin')){
                $idTurma=$req->idt;
                $turma=Turma::where('id_turma',$idTurma)->first();

                return view('turmas.edit',[
                    'turma'=>$turma,
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
                $idTurma=$req->idt;
                $turma=Turma::where('id_turma',$idTurma)->first();

                $atualizarTurma=$req->validate([
                    'nome'=>['required','min:3','max:100'],
                    'ano'=>['required','min:2','max:3'],
                    'curso_abreviacao'=>['required','min:1','max:3'],
                ]);

                $turma->update($atualizarTurma);

                return redirect()->route('alunos.index')->with('editado','Turma Editada');
            }
            else{
                return redirect()->route('alunos.index')->with('eliminada','Não tem permissão !');
            }
        }
    }
}
