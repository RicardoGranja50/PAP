<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Principal;

class PrincipalController extends Controller
{
    //

    public function principal(){

    	return view('principal.principal');
    }

    public function login(Request $req){

    	$idl=$req->idl;
    	return view('principal.login',[
    		'idl'=>$idl,
    	]);
    }

    public function entrar(Request $req){

    	$idl=$req->idl;
        $nome=$req->nome;
        $password=$req->password;
        $password1=Principal::where('password',$password)->first();
        if($idl==1){
            if($nome=="admin" && isset($password1)){
               return redirect()->route('alunos.index');
            }
            else{
                return redirect()->route('principal.login',['idl'=>$idl])->with('msg','Login errado!');
            }
        }
        else{
             return redirect()->route('principal.login',['idl'=>$idl])->with('msg','Login errado!');
        }
    }	
}
