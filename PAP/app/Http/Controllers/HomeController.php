<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->check()){
            if(Gate::allows('papelaria')){
                return redirect()->route('papelaria.carregamentos.idAluno');
            }
            elseif(Gate::allows('bar')){
                return redirect()->route('bar.idAluno');
            }
            else{
                return redirect()->route('alunos.index');
            }
        }   
    }
}
