<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Aluno;
use App\Models\Produto;


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


    public function exec(Request $req){

         if(auth()->check()){
            if(Gate::allows('bar')){
                $cartao=$req->idAluno;
                $aluno=Aluno::where('cartao_aluno',$cartao)->first();
                $cat='tudo';
                if(!empty($aluno)){
                    return redirect()->route('bar.bar',[
                        'id'=>$aluno->id_aluno,
                        'cat'=>$cat
                    ]);
                }
                else{
                    return redirect()->route('bar.idAluno')->with('msg','O aluno não existe');
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


    public function bar(Request $req){

        if(auth()->check()){
            if(Gate::allows('bar')){

                $aluno=Aluno::where('id_aluno',$req->id)->first();
                $tipo='bar';
                $a=$req->cat;
                if ($a=='tudo') {
                   $produtos=Produto::where('tipo_produto',$tipo)->paginate(12);
                }
                else{
                    $produtos=Produto::where('tipo_produto',$tipo)->where('cat',$a)->paginate(12);
                }

                return view('bar.bar',[
                    'cat'=>$a,
                    'aluno'=>$aluno,
                    'produtos'=>$produtos
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


    public function produtos(){

        if(auth()->check()){
            if(Gate::allows('bar')){
                $tipo='bar';
                $produtos=Produto::where('tipo_produto', $tipo)->paginate(12);
                return view('bar.produtos',[
                    'produtos'=>$produtos,
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

    public function create(){

        if(auth()->check()){
            if(Gate::allows('bar')){
                return view('bar.produtos_create');
            }
            else{
                return redirect()->route('logout');
            }
        }
        else{
            return redirect()->route('home');
        }
    }

    public function store(Request $req){

        if(auth()->check()){
            if(Gate::allows('bar')){
                $novoProduto=$req->validate([
                    'nome'=>['required','min:3','max:150'],
                    'preco'=>['required','numeric'],
                    'foto'=>['required','image','max:2000'],
                    'cat'=>['required']
                ]);

                $novoProduto['tipo_produto']="bar";

                if($req->hasFile('foto')){
                    $nomeFoto=$req->file('foto')->getClientOriginalName();
                    $nomeFoto=time().'_'.$nomeFoto;
                    $guardarFoto=$req->file('foto')->storeAs('imagens/produtos',$nomeFoto);
                    
                    $novoProduto['foto']=$nomeFoto;
                }

                $produto=Produto::create($novoProduto);

                return redirect()->route('bar.produtos')->with('editado','Produto Criado');

            }
             else{
                return redirect()->route('logout');
            }
        }
         else{
            return redirect()->route('home');
        }
    }   


    public function edit(Request $req){

        if(auth()->check()){
            if(Gate::allows('bar')){

                $idProduto=$req->idp;
                $produto=Produto::where('id_produto',$idProduto)->first();

                return view('bar.produtos_edit',[
                    'produto'=>$produto,
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

    public function update(Request $req){

        if(auth()->check()){
            if(Gate::allows('bar')){
                $idProduto=$req->idp;
                $produto=Produto::where('id_produto',$idProduto)->first();
                $imagemAntiga=$produto->foto;

 
                $atualizarProduto=$req->validate([
                    'nome'=>['required','min:3','max:150'],
                    'preco'=>['required','numeric'],
                    'foto'=>['nullable','image','max:2000'],
                    'cat'=>['required'],
                ]);
                
                if($req->hasFile('foto')){

                    $nomeFoto=$req->file('foto')->getClientOriginalName();
                    $nomeFoto=time().'_'.$nomeFoto;
                    $guardarFoto=$req->file('foto')->storeAs('imagens/produtos',$nomeFoto);
                    
                    if(!is_null($imagemAntiga)){
                        $imagemAntiga = 'imagens/produtos/'.$imagemAntiga;
                        
                        $b=Storage::disk('public')->delete($imagemAntiga);

                    }

                    $atualizarProduto['foto']=$nomeFoto;
                }

                $produto->update($atualizarProduto);

                return redirect()->route('bar.produtos')->with('editado','Produto Editado');
            }
            else{
                return redirect()->route('logout');
            }
        }
        else{
            return redirect()->route('home');
        }
    }

    public function destroy(Request $r){

        if(auth()->check()){
            if(Gate::allows('bar')){
                $produto=Produto::where('id_produto',$r->idp)->first();
                $fotoAntiga=$produto->foto;

                if(!is_null($fotoAntiga)){
                    Storage::Delete('imagens/produtos/'.$fotoAntiga);
                }
                $produto->delete();  
                return redirect()->route('bar.produtos')->with('eliminada','Produto eliminado!');
            }
        }
    }
}
