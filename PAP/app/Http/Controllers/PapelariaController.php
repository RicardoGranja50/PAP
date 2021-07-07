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
        $a=null;
        if($req->is('aedah/papelaria/*')){
            $tipo='papelaria';
            $totalItems=18;

        }
        else{
            $tipo='bar';
            $a=$req->cat;
            $totalItems=12;
        }
    	if(auth()->check()){
            if(Gate::allows('papelaria') || Gate::allows('bar') || Gate::allows('admin')){
                if($a=='tudo' || is_null($a)) {
                    $produto=Produto::where('tipo_produto',$tipo)->paginate($totalItems);
                }
                else{
                    $produto=Produto::where('tipo_produto',$tipo)->where('cat',$a)->paginate($totalItems);
                }
		    	$idAluno=$req->id;
		    	$aluno=Aluno::where('id_aluno', $idAluno)->first();
                // $movimento = Movimento::where('id_aluno', $idAluno)->where('tipo_movimento', 'papelaria')->where('carrinho', 1)->first();
                // $produtos = $produtos->with(['produtos'=>function ($query) use ($idMov) {
                //     return $query->where('id_movimento', $idMov);
                // }]);

                $checkMov = Movimento::where('id_aluno', $idAluno)->where('tipo_movimento', $tipo)->where('carrinho', 1)->get();

                $movimentos = Movimento::where('id_aluno', $idAluno)->where('tipo_movimento', $tipo)->where('carrinho', 1);
                
                // $movimentos = $movimentos->with(['produtos'=>function ($query) {
                //     return $query->where('produtos_compras')
                // }]);
                $movimentos = $movimentos->with(['produtos']);
                $movimentos = $movimentos->first();

                //dd($movimentos->produtos);
                // foreach ($movimentos->produtos as $prod) {
                //       echo($prod->nome)  ;
                //       echo($prod->pivot->valor)  ;
                //       echo '<br>';
                // }
               // exit();
                //$mov = $movimentos->id_movimento;
                //$produtos = Produto::whereHas('movimentos',function ($query) use ($mov) {
                   // return $query->where('produtos_compras.id_movimento',$mov);
                //});
                //vai buscar produtos de carrinho=0 e não deve
               

                // $produtos= $produtos->get();
                    // dd($produtos);
                // $produtos = Produto::whereHas('movimentos', function ($query) use ($idAluno) {
                //     return $query->where('id_aluno', $idAluno)->where('tipo_movimento', 'papelaria')->where('carrinho', 1);
                // });
                // dd($produtos); stor tire o mut

               // $produtosCart = $produtos->with(['movimentos'=>function ($query) use ($mov) {
               //      return $query->where('produtos_compras.id_movimento',$mov);
               //  }]);//->join('produtos_compras', 'produtos.id_produto', 'produtos_compras.id_produto');
               // //  dd($produtos->get());
               //  $produtosCart = $produtos->get();

               
           
                // $prd = \DB::table('produtos')->
                //     join('produtos_compras', 'produtos.id_produto', 'produtos_compras.id_produto')->
                //     join('produtos_compras', 'produtos.id_produto', 'produtos_compras.id_produto')->
                //     get();

                //dd($produtosCart);
                $total=0;
                if($movimentos==null){
                    $produtosCart=[];
                }
                else{
                    $produtosCart = $movimentos->produtos; 

                    $total=0;
                    foreach ($produtosCart as $v) {
                        $total=$total+$v->pivot->valor;
                    }
                }
                

                if($req->is('aedah/papelaria/*')){
                    return view('papelaria.papelaria.papelaria',[
                        'aluno'=>$aluno,
                        'produtos'=>$produto,
                        'produto_compra' =>$produtosCart,
                        'total_compra'=>$total
                    ]);
                }
                else{
                    return view('bar.bar',[
                        'cat'=>$a,
                        'aluno'=>$aluno,
                        'produtos'=>$produto,
                        'total_compra'=>$total,
                        'produto_compra' =>$produtosCart
                    ]);
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

    public function create(){

    	if(auth()->check()){
            if(Gate::allows('papelaria') || Gate::allows('admin')){
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
            if(Gate::allows('papelaria') || Gate::allows('admin')){
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


    function obterMovimentos (Request $req) {

        if(auth()->check()){
            if(Gate::allows('papelaria')|| Gate::allows('bar') || Gate::allows('admin')){

                if($req->is('aedah/papelaria/*')){
                    $tipo='papelaria';
                }
                else{
                    $tipo='bar';
                }
                $mov[]=-1;
                $movimento=Movimento::where('id_aluno',$req->id)->where('carrinho',1)->where('tipo_movimento',$tipo)->with('produtos')->first();
                
                $produto=Produto::where('id_produto',$req->idp)->first();
                if(!is_null($movimento)){
                    $mov = $movimento->produtos;
                    $mov=$mov->pluck('id_produto')->toArray();
                }
                

                if (in_array($req->idp, $mov )) {
                    
                    $prodCompra=ProdutoCompra::where('id_produto',$req->idp)->where('id_movimento',$movimento->id_movimento)->first();
                    $prodCompra['quantidade']=$prodCompra['quantidade']+1;
                    $prodCompra['valor']=$produto->preco * $prodCompra['quantidade'];
                    $prodCompra->update();
                }
                else {
                    
                    if(is_null($movimento)){
                        
                        $novoMovimento['tipo_movimento']=$tipo;
                        $novoMovimento['carrinho']=1;
                        $novoMovimento['id_aluno']=$req->id;
                        $movimento=Movimento::create($novoMovimento); 
                    }
                
                    $novoProdutoCompra['id_produto']=$req->idp;
                    $novoProdutoCompra['quantidade']=1;
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
                

                if($req->is('aedah/papelaria/*')){
                    return redirect()->route('papelaria.papelaria.papelaria',[
                        'id'=>$req->id,
                    ]);
                }
                else{
                     return redirect()->route('bar.bar',[
                        'id'=>$req->id,
                        'cat'=>'tudo'
                    ]);
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
   

    public function destroy(Request $req){


         if(auth()->check()){
            if(Gate::allows('papelaria') || Gate::allows('bar') || Gate::allows('admin')){
                $movimento=Movimento::where('id_aluno',$req->id)->where('carrinho',1)->with('produtos')->first();
                $mov = $movimento->produtos;
                $produto=Produto::where('id_produto',$req->idp)->first();
                $mov=$mov->pluck('id_produto')->toArray();
                
                if (in_array($req->idp, $mov )) {
                    
                    $prodCompra=ProdutoCompra::where('id_produto',$req->idp)->where('id_movimento',$movimento->id_movimento)->first();
                    $prodCompra['quantidade']=$prodCompra['quantidade']-1;
                    $prodCompra['valor']=$produto->preco * $prodCompra['quantidade'];
                    $prodCompra->update();
                    
                    if($prodCompra['quantidade']==0){

                        $prodCompra=ProdutoCompra::where('id_produto',$req->idp)->where('id_movimento',$movimento->id_movimento)->first();
                        $prodCompra->delete();
                    }
                }
                else {
                    
                    $prodCompra=ProdutoCompra::where('id_produto',$req->idp)->where('id_movimento',$movimento->id_movimento)->first();
                    $prodCompra->delete();
                }

                $prodCompra=ProdutoCompra::where('id_movimento',$movimento->id_movimento)->first();

                if(is_null($prodCompra)){
                    $movimento->delete();
                }

                if($req->is('aedah/papelaria/*')){
                    return redirect()->route('papelaria.papelaria.papelaria',[
                        'id'=>$req->id,
                    ]);
                }
                else{
                    return redirect()->route('bar.bar',[
                        'id'=>$req->id,
                        'cat'=>'tudo'
                    ]);
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

    public function compraFinal(Request $req){


         if(auth()->check()){
            if(Gate::allows('papelaria') || Gate::allows('bar') || Gate::allows('admin')){

                if($req->is('aedah/papelaria/*')){
                    $tipo='papelaria';
                }
                else{
                    $tipo='bar';
                }

                $movimento=Movimento::where('id_aluno',$req->id)->where('carrinho',1)->where('tipo_movimento',$tipo)->with('produtos')->first();
                $saldo_aluno=Aluno::where('id_aluno',$req->id)->first();


                if($req->total>$saldo_aluno->saldo){


                    return redirect()->route('papelaria.papelaria.papelaria',[
                        'id'=>$req->id,
                    ])->with('saldo','Saldo insuficiente');
                }
                else{

                    $movimento['carrinho']=0;
                    $movimento['carregamento']=$req->total;
                    $saldo_aluno['saldo']=$saldo_aluno['saldo'] - $req->total;
                    $movimento->update();
                    $saldo_aluno->update();

                    if($req->is('aedah/papelaria/*')){
                        return redirect()->route('papelaria.papelaria.papelaria',[
                            'id'=>$req->id,
                        ]);
                    }
                    else{
                        return redirect()->route('bar.bar',[
                            'id'=>$req->id,
                            'cat'=>'tudo'
                        ]);
                    }
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

     public function index(){

        if(auth()->check()){
            if(Gate::allows('papelaria') || Gate::allows('admin')){
                $tipo='papelaria';
                $produtos=Produto::where('tipo_produto', $tipo)->paginate(12);
                return view('papelaria.papelaria.produtos_index',[
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

    public function edit(Request $req){

        if(auth()->check()){
            if(Gate::allows('admin')){

                $idProduto=$req->idp;
                $produto=Produto::where('id_produto',$idProduto)->first();

                return view('papelaria.papelaria.produtos_edit',[
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
            if(Gate::allows('admin')){
                $idProduto=$req->idp;
                $produto=Produto::where('id_produto',$idProduto)->first();
                $imagemAntiga=$produto->foto;

 
                $atualizarProduto=$req->validate([
                    'nome'=>['required','min:3','max:150'],
                    'preco'=>['required','numeric'],
                    'foto'=>['nullable','image','max:2000'],
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

                return redirect()->route('papelaria.papelaria.produtos.index')->with('editado','Produto Editado');
            }
            else{
                return redirect()->route('logout');
            }
        }
        else{
            return redirect()->route('home');
        }
    }

    public function delete(Request $r){

        if(auth()->check()){
            if(Gate::allows('admin')){
                $produto=Produto::where('id_produto',$r->idp)->first();
                $fotoAntiga=$produto->foto;

                if(!is_null($fotoAntiga)){
                    Storage::Delete('imagens/produtos/'.$fotoAntiga);
                }
                $produto->delete();  
                return redirect()->route('papelaria.papelaria.produtos.index')->with('eliminada','Produto eliminado!');
            }
        }
    }
}
