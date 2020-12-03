<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

class TurmasController extends Controller
{
    //

     public function create(){

        $turmas=Turma::all();
        return view('turmas.create',[
            'turmas'=>$turmas,
        ]);
    }

     public function store(Request $req){

        $novaTurma=$req->validate([
            'nome'=>['required','min:3','max:100'],
            'ano'=>['required','min:2','max:3'],
            'curso_abreviacao'=>['required','min:1','max:3'],
        ]);


        $turma=Turma::create($novaTurma);

        return redirect()->route('alunos.index');
    }

    public function destroy(Request $r){

        $turma=Turma::where('id_turma',$r->id)->first();
        
        if(is_null($turma)){

            return redirect()->route('alunos.index')->with('msg','O turma nao existe!!!');
        }
        else{

            $turma->delete();
            return redirect()->route('alunos.index');
        }
    }
}
