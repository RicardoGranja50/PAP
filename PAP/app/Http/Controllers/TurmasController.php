<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

class TurmasController extends Controller
{
    //

     public function create(){

      
        return view('turmas.create');
    }

     public function store(Request $req){

        $novaTurma=$req->validate([
            'nome'=>['required','min:3','max:100'],
            'ano'=>['required','min:2','max:3'],
            'curso_abreviacao'=>['required','min:1','max:3'],
        ]);


        $turma=Turma::create($novaTurma);

        return redirect()->route('alunos.index')->with('criada','Turma criada!');
    }

    public function destroy(Request $r){

        $turma=Turma::where('id_turma',$r->idt)->first();
        
        if(is_null($turma)){

            return redirect()->route('alunos.index');
        }
        else{

            $turma->delete();
            return redirect()->route('alunos.index')->with('eliminada','A turma foi eliminada!');
        }
    }

    public function edit(Request $req){

        $idTurma=$req->idt;
        $turma=Turma::where('id_turma',$idTurma)->first();

        return view('turmas.edit',[
            'turma'=>$turma,
        ]);
    }

    public function update(Request $req){

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
}
