@extends('layout')
@section('titulo')
	Criar Turma
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
	<br>
	<h3 style="text-align: center;">Adicionar Turma</h3><br>
	<br>
	<div class="container-fluid">
		<form action="{{route('turmas.store')}}" method="post">
			@csrf
	  		<div class="form-row">
	    		<div class="form-group col-md-6">
			      	<label><b>Nome Curso</b></label>
			      	<input type="text" class="form-control" placeholder="Nome Curso" name="nome_completo">

				    @if($errors->has('nome_completo'))
				    	<br>
				    	<div class="alert alert-danger" role="alert">
  							O nome da turma deve se encontrar entre 4 e 100 caracteres
						</div>
	    			@endif
	    		</div>
	
			    <div class="form-group col-md-6">
			      	<label><b>Abreviação</b></label>
			      	<input type="text" class="form-control" placeholder="Abreviação" name="nome">

				    @if('nome'!= '10º' || 'nome'!= '11º' || 'nome'!= '12º')
				    	<br>
				    	<div class="alert alert-danger" role="alert">
  							Insira uma turma válida.Exemplo:10ºI1
						</div>
	    			@endif
			    </div>
			</div>
			<button type="submit" class="btn btn-primary" value="enviar">Criar</button>
		</form>
	</div>
@endsection