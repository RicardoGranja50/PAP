@extends('layout')
@section('titulo')
	Informação Aluno
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
	<script>
		function visivel() {
			document.getElementById("box").style.display = "initial";
		}
		function nao(){
			document.getElementById("box").style.display = "none";
			document.getElementById("box").addEventListener("click", function(event){
  				event.preventDefault()
			});
		}
	</script>
	<br>

	<h3 style="text-align: center;">Informações de {{$aluno->nome}}</h3><br>
	<div class="container-fluid">
		@if(isset($aluno->foto_aluno))
			<img src="{{asset('imagens/alunos/'.$aluno->foto_aluno)}}">
		@endif
	</div>

	<br>
	<div class="container-fluid">
		<div class="alert alert-secondary" role="alert">
			<h6> <b>Morada :</b> {{$aluno->morada}}</h6> 
		</div>
		<div class="alert alert-secondary" role="alert">
			<h6> <b>Turma :</b> {{$aluno->turma->ano}}{{$aluno->turma->curso_abreviacao}}</h6> 
		</div>
		<div class="alert alert-secondary" role="alert">
			<h6> <b>Código Postal :</b> {{$aluno->codigo_postal}}</h6> 
		</div>
		<div class="alert alert-secondary" role="alert">
			<h6> <b>Localidade :</b> {{$aluno->localidade}}</h6> 
		</div>
		<div class="alert alert-secondary" role="alert">
			<h6> <b>Telemovel :</b> {{$aluno->telemovel}}</h6> 
		</div>
		<div class="alert alert-secondary" role="alert">
			<h6> <b>Email :</b> {{$aluno->email}}</h6> 
		</div>
		<div class="alert alert-secondary" role="alert">
			<h6> <b>ID cartão de cidadão :</b> {{$aluno->id_civil_aluno}}</h6> 
		</div>
		<div class="alert alert-secondary" role="alert">
			<h6> <b>Data Nascimento :</b> {{$aluno->nascimento->format('m-d-Y')}}</h6> 
		</div>
		<div class="alert alert-secondary" role="alert">
			<h6> <b>Nome Encarregado de Educação :</b> {{$aluno->nome_enc}}</h6> 
		</div>
		<div class="alert alert-secondary" role="alert">
			<h6> <b>Telemovel Encarregado de Educação :</b> {{$aluno->telemovel_enc}}</h6> 
		</div>
	</div>

	<div class="container-fluid">
			<a href="{{route('alunos.edit', ['id'=>$aluno->id_aluno])}}" class="btn btn-primary" style="background-color: #80bfff">Alterar</a>
			<a class="btn btn-primary" style="background-color: #80bfff" onclick="visivel()">Eliminar Aluno</a>
			<a href="{{route('alunos.index')}}" class="btn btn-primary" style="background-color: #80bfff">Cancelar</a>
			<span id="box" style="display:none">
				<div class="alert alert-danger" role="alert">
					Deseja eliminar o seguinte aluno?
					<form method="post" action="{{route('alunos.destroy', ['id'=>$aluno->id_aluno])}}">
						@csrf
						@method('delete')
						<input type="submit" value="Sim" onclick="this.form.submit()">
						<input type="submit" value="Não" onclick="nao()">
					</form>
				</div>
			</span>
			
	</div>

@endsection