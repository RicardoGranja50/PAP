@extends('layout')
@section('titulo')
	Associar Cartão
@endsection
@section('a')
@endsection
@section('conteudo')
	<div class="container-fluid">
		<br>
		<h3 style="text-align: center;">Associar Cartão do Aluno {{$aluno->nome}}</h3><br>
		<form action="{{route('alunos.cartao.store',['id'=>$aluno->id_aluno])}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('patch')
		  	<div class="form-row">
			    <div class="form-group col-md-6">
			      	<label for="inputNome"><b>Cartao</b></label>
			      	<input type="text" class="form-control" id="inputCartao4" placeholder="Cartao Aluno" name="cartao_aluno" value="{{old('cartao_aluno')}}">
			      	@if($errors->has('cartao_aluno'))
			      		<br>
				    	<div class="alert alert-danger" role="alert">
  							O campo é de preenchimento obrigatório.
						</div>
	    			@endif
			    </div>
			</div>
		 	<button type="submit" class="btn btn-primary" style="background-color: #80bfff">Criar</button>
		  	<a href="{{route('alunos.showAlunos',['id'=>$aluno->id_aluno,'idt'=>$aluno->id_turma])}}" class="btn btn-primary" style="background-color: #80bfff">Cancelar</a>
		</form>

	</div>
@endsection