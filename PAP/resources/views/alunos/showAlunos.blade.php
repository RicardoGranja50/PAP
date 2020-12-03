@extends('layout')
@section('titulo')
	Aluno
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
		}
	</script>
	<br>
	<h3 style="text-align: center;">Informações de {{$aluno->nome}}</h3><br>
	<br>
	<div class="container-fluid">
		<div class="alert alert-secondary" role="alert">
			<h6> <b>Morada :</b> {{$aluno->morada}}</h6> 
		</div>
		<div class="alert alert-secondary" role="alert">
			<h6> <b>Código Postal :</b> {{$aluno->codigo_postal}}</h6> 
		</div>
		<div class="alert alert-secondary" role="alert">
			<h6> <b>Localidade :</b> {{$aluno->mlocalidade}}</h6> 
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
			<a href="" class="btn btn-primary" style="background-color: #80bfff">Alterar</a>
			<a class="btn btn-primary" style="background-color: #80bfff" onclick="visivel()">Eliminar Aluno</a>
			<span id="box" style="display:none">
				<div class="alert alert-danger" role="alert">
					Deseja eliminar o seguinte aluno?
					<form method="post" action="{{route('alunos.destroy', ['id'=>$aluno->id_aluno])}}">
						@csrf
						@method('delete')
						<input type="submit" value="Sim">
						<input type="submit" value="Não" onclick="preventDefault();nao()">
					</form>
				</div>
			</span>
	</div>

@endsection