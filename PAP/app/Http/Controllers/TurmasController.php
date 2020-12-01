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
            'nome_completo'=>['required','min:3','max:100'],
            'nome'=>['required','min:4','max:7'],
        ]);

        $turma=Turma::create($novaTurma);

        return redirect()->route('alunos.index');
    }
}
