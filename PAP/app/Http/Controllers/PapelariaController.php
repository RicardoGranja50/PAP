<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimento;
use App\Models\Aluno;
use App\Models\Produto;
use App\Models\ProdutoCompra;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\Gate;

class PapelariaController extends Controller
{
    //

    public function papelaria(Request $req){
        $tipo = isset($req->tipo) ? $req->tipo: 'nada';
        $idProduto = isset($req->idp) ? $req->idp : null;

    	if(auth()->check()){
            if(Gate::allows('papelaria')){
                $produto=Produto::where('tipo_produto','papelaria')->paginate(18);
		    	$idAluno=$req->id;
		    	$aluno=Aluno::where('id_aluno', $idAluno)->first();
                // $movimento = Movimento::where('id_aluno', $idAluno)->where('tipo_movimento', 'papelaria')->where('carrinho', 1)->first();
                // $produtos = $produtos->with(['produtos'=>function ($query) use ($idMov) {
                //     return $query->where('id_movimento', $idMov);
                // }]);

                $produtos = Produto::whereHas('movimentos', function ($query) use ($idAluno) {
                    return $query->where('id_aluno', $idAluno)->where('tipo_movimento', 'papelaria')->where('carrinho', 1);
                });
                $produtosCart = $produtos->with('movimentos')->join('produtos_compras', 'produtos.id_produto', 'produtos_compras.id_produto');
                $produtosCart = $produtos->get();

                // $prd = \DB::table('produtos')->
                //     join('produtos_compras', 'produtos.id_produto', 'produtos_compras.id_produto')->
                //     join('produtos_compras', 'produtos.id_produto', 'produtos_compras.id_produto')->
                //     get();

                //dd($produtosCart);
                return view('papelaria.papelaria.papelaria',[
                    'aluno'=>$aluno,
                    'produtos'=>$produto,
                    'produto_compra' =>$produtosCart
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
            if(Gate::allows('papelaria')){
            	return view('papelaria.papelaria.produtos');
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
            if(Gate::allows('papelaria')){
                $novoProduto=$req->validate([
                    'nome'=>['required','min:3','max:150'],
                    'preco'=>['required','numeric'],
                    'foto'=>['required','image','max:2000']
                ]);

                $novoProduto['tipo_produto']="papelaria";

                if($req->hasFile('foto')){
                    $nomeFoto=$req->file('foto')->getClientOriginalName();
                    $nomeFoto=time().'_'.$nomeFoto;
                    $guardarFoto=$req->file('foto')->storeAs('imagens/produtos',$nomeFoto);
                    
                    $novoProduto['foto']=$nomeFoto;
                }

                $produto=Produto::create($novoProduto);

                return redirect()->route('papelaria.carregamentos.idAluno');

            }
             else{
                return redirect()->route('logout');
            }
        }
         else{
            return redirect()->route('home');
        }
    }   

    public function compra(Request $req){

        $p=Produto::where('tipo_produto','papelaria')->paginate(18);
        //$idProduto=$req->idp;
        //$produto=Produto::where('id_produto',$idProduto)->first();
        $idAluno=$req->id;
        $aluno=Aluno::where('id_aluno',$idAluno)->first();
        $movimento=Movimento::where('id_aluno',$idAluno)->where('carrinho',1)->first();
        if(is_null($movimento)){
            
            $novoMovimento['tipo_movimento']="papelaria";
            $novoMovimento['carrinho']=1;
            $novoMovimento['id_aluno']=$idAluno;
            $movimento=Movimento::create($novoMovimento); 
        }
        
        $novoProdutoCompra['id_produto']=$idProduto;
        $novoProdutoCompra['id_movimento']=$movimento->id_movimento;
        $novoProdutoCompra['valor']=$produto->preco;
        $add=ProdutoCompra::create($novoProdutoCompra);
        $idMov = $movimento->id_movimento;
        // $produto=ProdutoCompra::where('id_movimento',$movimento->id_movimento)->get();
      //  \DB::enableQueryLog();
        $produtos = Movimento::where('id_aluno', $idAluno)->where('tipo_movimento', 'papelaria')->where('carrinho', 1);
        $produtos = $produtos->with(['produtos'=>function ($query) use ($idMov) {
            return $query->where('id_movimento', $idMov);
        }]);

        $produtos = $produtos->get();
  //      $dumps = \DB::getQueryLog();
        //dd($produtos);
        return view('papelaria.papelaria.papelaria',[
            'aluno'=>$aluno,
            'produto_compra'=>$produtos,
            'produtos'=>$p
        ]);
    }  

    function obterMovimentos (Request $req) {

        $movimento=Movimento::where('id_aluno',$req->id)->where('carrinho',1)->with('produtos')->first();
        $mov = $movimento->produtos;
        $produto=Produto::where('id_produto',$req->idp)->first();
        $mov=$mov->pluck('id_produto')->toArray();

        if (in_array($req->idp, $mov )) {
            
            $prodCompra=ProdutoCompra::where('id_produto',$req->idp)->first();
            $prodCompra['quantidade']=$prodCompra['quantidade']+1;
            $prodCompra['valor']=$produto->preco * $prodCompra['quantidade'];
            $prodCompra->update();
        }
        else {
            
            if(is_null($movimento)){
                
                $novoMovimento['tipo_movimento']="papelaria";
                $novoMovimento['carrinho']=1;
                $novoMovimento['id_aluno']=$req->id;
                $movimento=Movimento::create($novoMovimento); 
            }
        
            $novoProdutoCompra['id_produto']=$req->idp;
            $novoProdutoCompra['id_movimento']=$movimento->id_movimento;
            $novoProdutoCompra['valor']=$produto->preco;
            $add=ProdutoCompra::create($novoProdutoCompra);
        }
        
        //$idMov = $movimento->id_movimento;
        // $produto=ProdutoCompra::where('id_movimento',$movimento->id_movimento)->get();
        // \DB::enableQueryLog();
        //$produtos = Movimento::where('id_aluno', $req->id)->where('tipo_movimento', 'papelaria')->where('carrinho', 1);
        //$produtos = $produtos->with(['produtos'=>function ($query) use ($idMov) {
           // return $query->where('id_movimento', $idMov);
        //}]);

        //$produtos = $produtos->first();
        
        return redirect()->route('papelaria.papelaria.papelaria',[
            'id'=>$req->id,
        ]);
    }

    public function destroy(Request $req){

        $prodCompra=ProdutoCompra::where('id_produto',$req->idp)->first();
        
    }
}
