@extends('layout')
@section('titulo')
	Editar Turma
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
	<br>
	<h3 style="text-align: center;">Editar Turma</h3><br>
	<br>
	<div class="container-fluid">
		<form action="{{route('turmas.update',['idt'=>$turma->id_turma])}}" method="post">
			@csrf
			@method('patch')

	  		<div class="form-row">
	    		<div class="form-group col-md-6">
			      	<label><b>Nome Curso</b></label>
			      	<input type="text" name="nome" value="{{$turma->nome}}" class="form-control">

				    @if($errors->has('nome'))
				    	<br>
				    	<div class="alert alert-danger" role="alert">
  							O nome da turma deve se encontrar entre 4 e 100 caracteres
						</div>
	    			@endif
	    		</div>
	
			    <div class="form-group col-md-6">
			      	<label><b>Curso Abreviação</b></label>
			      	<input type="text" name="curso_abreviacao" value="{{$turma->curso_abreviacao}}" class="form-control">
				    <br>
				    @if($errors->has('curso_abreviacao'))
				    	
				    	<div class="alert alert-danger" role="alert">
  							Insira uma abreviação válida.Exemplo:I
						</div>
	    			@endif
			    </div>

			    	
			    <div class="form-group col-md-6">
					  <label><b>Ano</b></label>
					  <select class="custom-select my-1 mr-sm-2" name="ano" value="{{$turma->ano}}">
						    <!-- <option selected>Escolha...</option> -->
						    <option value="10º" @if($turma->ano=='10º')selected @endif>10º</option>
						    <option value="11º" @if($turma->ano=='11º')selected @endif>11º</option>
						    <option value="12º" @if($turma->ano=='12º')selected @endif>12º</option>
					  </select>
					@if($errors->has('ano'))
					    <div class="alert alert-danger" role="alert">
	  						Insira um ano !
						</div>
	    			@endif
				</div>

			</div>
			
			<button type="submit" class="btn btn-primary" value="enviar" style="background-color: #80bfff">Editar</button>
			<a href="{{route('alunos.show',['id'=>$turma->id_turma])}}" class="btn btn-primary" style="background-color: #80bfff">Cancelar</a>
		</form>
	</div>
@endsection