@extends('layout')
@section('titulo')
	Editar Aluno
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
	<div class="container-fluid">
		<br>
		<h3 style="text-align: center;">Editar Aluno</h3><br>
		<form action="{{route('alunos.update',['id'=>$aluno->id_aluno])}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('patch')

		  	<div class="form-row">
			    <div class="form-group col-md-6">
			      	<label for="inputNome4"><b>Nome Aluno</b></label>
			      	<input type="text" name="nome" value="{{$aluno->nome}}" class="form-control">
			      	@if($errors->has('nome'))
			      		<br>
				    	<div class="alert alert-danger" role="alert">
  							O nome do aluno é de preenchimento obrigatório e deve se encontrar entre 3 e 150 caracteres.
						</div>
	    			@endif
			    </div>
			    <div class="form-group col-md-6">
			      	<label for="inputMorada4"><b>Morada</b></label>
			      	<input type="text" name="morada" value="{{$aluno->morada}}" class="form-control">
			      	@if($errors->has('morada'))
			      		<br>
				    	<div class="alert alert-danger" role="alert">
  							A morada do aluno é de preenchimento obrigatório e deve se encontrar entre 5 e 250 caracteres.
						</div>
	    			@endif
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-3">
				   	<label for="inputCodigo_Postal"><b>Código Postal</b></label>
				   <input type="text" name="codigo_postal" value="{{$aluno->codigo_postal}}" class="form-control">
				   	@if($errors->has('codigo_postal'))
			      		<br>
				    	<div class="alert alert-danger" role="alert">
  							Ex: 0000-000
						</div>
	    			@endif
				</div>
				<div class="form-group col-md-3">
				   <label><b>Turma</b></label>
				   <select name="id_turma" class="custom-select">
				   		<option>Turma...</option>
				        @foreach($turmas as $turma)
				            <option value="{{$turma->id_turma}}" @if($turma->id_turma==$aluno->id_turma)selected @endif>{{$turma->ano}}{{$turma->curso_abreviacao}}</option>
				        @endforeach
    				</select>
					@if($errors->has('id_turma'))
				      	<br>
				      	<br>
					    <div class="alert alert-danger" role="alert">
	  						Insira uma turma!
						</div>
	    			@endif
				</div>
				<div class="form-group col-md-6">
				   	<label for="inputLocalidade"><b>Localidade</b></label>
				   	<input type="text" name="localidade" value="{{$aluno->localidade}}" class="form-control">
				   	@if($errors->has('localidade'))
			      		<br>
				    	<div class="alert alert-danger" role="alert">
  							A localidade do aluno é de preenchimento obrigatório e deve se encontrar entre 4 e 250 caracteres.
						</div>
	    			@endif
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
				   	<label for="inputTelemovel2"><b>Telemovel Aluno</b></label>
				   	<input type="text" name="telemovel" value="{{$aluno->telemovel}}" class="form-control">
					@if($errors->has('telemovel'))
				      	<br>
					    <div class="alert alert-danger" role="alert">
	  						Número de telefone inválido.Ex:910000000
						</div>
		    		@endif
				</div>
				<div class="form-group col-md-6">
				   	<label for="inputCartao2"><b>Id Cartão Cidadão</b></label>
				   	<input type="text" name="id_civil_aluno" value="{{$aluno->id_civil_aluno}}" class="form-control">
				   	@if($errors->has('id_civil_aluno'))
				      	<br>
					    <div class="alert alert-danger" role="alert">
	  						Número civil inválido.Ex: 31012300 1 ZY4
						</div>
		    		@endif
				</div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      	<label for="inputEmail4"><b>Email</b></label>
			      	<input type="text" name="email" value="{{$aluno->email}}" class="form-control">
			      	@if($errors->has('email'))
				      	<br>
					    <div class="alert alert-danger" role="alert">
	  						O email do aluno é de preenchimento obrigatório e deve se encontrar entre 8 e 150 caracteres.
						</div>
		    		@endif
			    </div>
			    <div class="form-group col-md-6">
			      	<label for="inputData4"><b>Data Nascimento</b></label>
			      	<input type="date" name="nascimento" value="{{$aluno->nascimento->format('Y-m-d')}}" class="form-control">	
			      	@if($errors->has('nascimento'))
				      	<br>
					    <div class="alert alert-danger" role="alert">
	  						A data nascimento do aluno é de preenchimento obrigatório.
						</div>
		    		@endif
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
			      	<label for="inputData4"><b>Foto aluno</b></label>
			      	<input type="file" id="Foto4" name="foto_aluno" value="{{$aluno->foto_aluno}}">
			      	@if($errors->has('foto_aluno'))
				      	<br>
					    <div class="alert alert-danger" role="alert">
	  						Introduza uma foto.
						</div>
		    		@endif
			    </div>
			</div>
			<br>
			<h5 style="text-align: center;"><b>Informações Encarregado de Educação</b></h5><br>
			<div class="form-group">
	   			<label for="inputEnc"><b>Nome Encarregado de Educação</b></label>
	    		<input type="text" name="nome_enc" value="{{$aluno->nome_enc}}" class="form-control">
	    		@if($errors->has('nome_enc'))
				    <br>
					<div class="alert alert-danger" role="alert">
	  					O nome do Encarregado de Educação é de preenchimento obrigatório e deve se encontrar entre 3 e 150 caracteres
					</div>
		    	@endif
	  		</div>
	  		
  			<div class="form-group">
   				<label for="inputEncte"><b>Telemovel Encarregado de Educação</b></label>
    			<input type="text" name="telemovel_enc" value="{{$aluno->telemovel_enc}}" class="form-control">
    			@if($errors->has('telemovel_enc'))
				    <br>
					<div class="alert alert-danger" role="alert">
	  					Número de telefone inválido.Ex:910000000
					</div>
		    	@endif
  			</div>

		
		<button type="submit" class="btn btn-primary" style="background-color: #80bfff">Editar</button>
		<a href="{{route('alunos.showAlunos',['id'=>$aluno->id_aluno, 'idt'=>$aluno->id_turma])}}" class="btn btn-primary" style="background-color: #80bfff">Cancelar</a>
		</form>
	</div>
@endsection
