@extends('layout')
@section('titulo')
	Criar Aluno
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
	<div class="container-fluid">
		<br>
		<h3 style="text-align: center;">Criar Aluno</h3><br>
		<form action="{{route('alunos.store')}}" method="post" enctype="multipart/form-data">
			@csrf
		  	<div class="form-row">
			    <div class="form-group col-md-6">
			      	<label for="inputNome4"><b>Nome Aluno</b></label>
			      	<input type="text" class="form-control" id="inputNome4" placeholder="Nome" name="nome" value="{{old('nome')}}">
			      	@if($errors->has('nome'))
			      		<br>
				    	<div class="alert alert-danger" role="alert">
  							O nome do aluno é de preenchimento obrigatório e deve se encontrar entre 3 e 150 caracteres.
						</div>
	    			@endif
			    </div>
			    <div class="form-group col-md-6">
			      	<label for="inputMorada4"><b>Morada</b></label>
			      	<input type="text" class="form-control" id="inputMorada4" placeholder="Ex: Rua dos Talhos, nº 0" name="morada" value="{{old('morada')}}">
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
				   	<input type="text" class="form-control" id="inputCodigo_Postal" placeholder="Ex: 0000-000" name="codigo_postal" value="{{old('codigo_postal')}}">
				   	@if($errors->has('codigo_postal'))
			      		<br>
				    	<div class="alert alert-danger" role="alert">
  							Ex: 0000-000
						</div>
	    			@endif
				</div>
				<div class="form-group col-md-3">
				   <label><b>Turma</b></label>
				   <select name="id_turma" class="custom-select" value="{{old('id_turma')}}">
				   		<option>Turma...</option>
				        @foreach($turmas as $turma)
				            <option value="{{$turma->id_turma}}">{{$turma->ano}}{{$turma->curso_abreviacao}}</option>
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
				   	<input type="text" class="form-control" id="inputLocalidade" placeholder="Ex: Vila das Aves, S.Martinho..." name="localidade" value="{{old('localidade')}}">
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
				   	<input type="text" class="form-control" id="inputTelemovel2" placeholder="Ex: 911230183" name="telemovel" value="{{old('telemovel')}}">
					@if($errors->has('telemovel'))
				      	<br>
					    <div class="alert alert-danger" role="alert">
	  						Número de telefone inválido.Ex:910000000
						</div>
		    		@endif
				</div>
				<div class="form-group col-md-6">
				   	<label for="inputCartao2"><b>Id Cartão Cidadão</b></label>
				   	<input type="text" class="form-control" id="inputCartao2" placeholder="Ex: 31012300 1 ZY4 " name="id_civil_aluno" value="{{old('id_civil_aluno')}}">
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
			      	<input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{old('email')}}">
			      	@if($errors->has('email'))
				      	<br>
					    <div class="alert alert-danger" role="alert">
	  						O email do aluno é de preenchimento obrigatório e deve se encontrar entre 8 e 150 caracteres.
						</div>
		    		@endif
			    </div>
			    <div class="form-group col-md-6">
			      	<label for="inputData4"><b>Data Nascimento</b></label>
			      	<input type="date" class="form-control" id="Data4" placeholder="Data" name="nascimento" value="{{old('nascimento')}}">
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
			      	<input type="file" id="Foto4" name="foto_aluno" value="{{old('foto_aluno')}}">
			      	@if($errors->has('foto_aluno'))
				      	<br>
					    <div class="alert alert-danger" role="alert">
	  						Introduza uma foto.
						</div>
		    		@endif
			    </div>
			</div>
			<h5 style="text-align: center;">Informações Encarregado de Educação</h5><br>
			<div class="form-group">
	   			<label for="inputEnc"><b>Nome Encarregado de Educação</b></label>
	    		<input type="text" class="form-control" id="inputEnc" placeholder="Nome" name="nome_enc" value="{{old('nome_enc')}}">
	    		@if($errors->has('nome_enc'))
				    <br>
					<div class="alert alert-danger" role="alert">
	  					O nome do Encarregado de Educação é de preenchimento obrigatório e deve se encontrar entre 3 e 150 caracteres
					</div>
		    	@endif
	  		</div>
	  		
  			<div class="form-group">
   				<label for="inputEncte"><b>Telemovel Encarregado de Educação</b></label>
    			<input type="text" class="form-control" id="inputEncte" placeholder="Ex: 911230183" name="telemovel_enc" value="{{old('telemovel_enc')}}">
    			@if($errors->has('telemovel_enc'))
				    <br>
					<div class="alert alert-danger" role="alert">
	  					Número de telefone inválido.Ex:910000000
					</div>
		    	@endif
  			</div>

		 	<button type="submit" class="btn btn-primary" style="background-color: #80bfff">Criar</button>
		  	<a href="{{route('alunos.index')}}" class="btn btn-primary" style="background-color: #80bfff">Cancelar</a>
		</form>

	</div>
@endsection