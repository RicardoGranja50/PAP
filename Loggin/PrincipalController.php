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
        $password1=Principal::where('password',$password)->where('username',$nome)->first();
        $password1=bcrypt($password1);
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

    public function edit(){
        return view('principal.edit');
    }

    public function update(Request $req){


        $nome=$req->nome;

        $password=$req->passwordOld;
        $passwordNew=$req->passwordNew;

        $verifieP=Principal::where('password',$password)->first();
        $verifieN=Principal::where('username',$nome)->first();

        if(is_null($verifieP) || is_null($verifieN)){
            return redirect()->route('principal.edit')->with('pass','Password ou Username incorreto!');
        }
        else{

            $atualizarPass=$req->validate([

                'password'=>['required','min:8','max:150']
            ]);
            
            $atualizarPass['password']=bcrypt($atualizarPass['password']);

            $verifieP->update($atualizarPass);

            return redirect()->route('principal.principal')->with('pass','Password editada com sucesso !');
        }
    }
}
