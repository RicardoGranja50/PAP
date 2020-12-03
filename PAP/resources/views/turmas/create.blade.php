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
			      	<input type="text" class="form-control" placeholder="Nome Curso" name="nome">

				    @if($errors->has('nome'))
				    	<br>
				    	<div class="alert alert-danger" role="alert">
  							O nome da turma deve se encontrar entre 4 e 100 caracteres
						</div>
	    			@endif
	    		</div>
	
			    <div class="form-group col-md-6">
			      	<label><b>Curso Abreviação</b></label>
			      	<input type="text" class="form-control" placeholder="Curso Abreviação" name="curso_abreviacao">
				    <br>
				    @if($errors->has('curso_abreviacao'))
				    	
				    	<div class="alert alert-danger" role="alert">
  							Insira uma abreviação válida.Exemplo:I
						</div>
	    			@endif
			    </div>

			    	
			    <div class="form-group col-md-6">
					  <label><b>Ano</b></label>
					  <select class="custom-select my-1 mr-sm-2" name="ano">
						    <option selected>Escolha...</option>
						    <option value="10º">10º</option>
						    <option value="11º">11º</option>
						    <option value="12º">12º</option>
					  </select>
					@if($errors->has('ano'))
					    <div class="alert alert-danger" role="alert">
	  						Insira um ano !
						</div>
	    			@endif
				</div>

			</div>
			
			<button type="submit" class="btn btn-primary" value="enviar">Criar</button>
		</form>
	</div>
@endsection