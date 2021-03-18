<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\Gate;


class BarController extends Controller
{
    //

    public function idAluno(){

    	if(auth()->check()){
            if(Gate::allows('bar')){
    	       return view('bar.idAluno');
            }
            else{
                return redirect()->route('logout');
            }
        }
        else{
            return redirect()->route('home');
        }
    }

    public function bar(){

        if(auth()->check()){
            if(Gate::allows('bar')){
             
                

             
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
