@extends('layout')
@section('titulo')
	Editar Produto
@endsection
@section('a')
@endsection
@section('conteudo')
	
	<div class="container-fluid">
		<br>
		<h3 style="text-align: center;">Editar Produto</h3><br>
		<form action="{{route('papelaria.papelaria.produtos.update',['idp'=>$produto->id_produto])}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('patch')
		  	<div class="form-row">
			    <div class="form-group col-md-6">
			      	<label for="inputNome"><b>Nome Produto</b></label>
			      	<input type="text" class="form-control" id="inputNome4" name="nome" value="{{$produto->nome}}">
			      	@if($errors->has('nome'))
			      		<br>
				    	<div class="alert alert-danger" role="alert">
  							O nome do produto é de preenchimento obrigatório e deve se encontrar entre 4 a 250 caracteres.
						</div>
	    			@endif
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-3">
				   	<label for="inputCodigoPreco"><b>Preço Produto</b></label>
				   	<input type="text" class="form-control" id="inputCodigoPreco" name="preco" value="{{$produto->preco}}">
				   	@if($errors->has('preco'))
			      		<br>
				    	<div class="alert alert-danger" role="alert">
  							Ex: 10.9
						</div>
	    			@endif
				</div>	
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
			      	<label for="inputFoto4"><b>Foto produto</b></label>
			      	<input type="file" id="Foto4" name="foto">
			      	@if($errors->has('foto'))
				      	<br>
					    <div class="alert alert-danger" role="alert">
	  						Introduza uma foto.
						</div>
		    		@endif
			    </div>
			</div>
		 	<button type="submit" class="btn btn-primary" style="background-color: #80bfff">Editar</button>
		  	<a href="{{route('papelaria.carregamentos.idAluno')}}" class="btn btn-primary" style="background-color: #80bfff">Cancelar</a>
		</form>

	</div>
@endsection
