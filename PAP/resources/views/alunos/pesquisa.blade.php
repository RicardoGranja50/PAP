@extends('layout')
@section('titulo')
	Alunos
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
	<br>
	<h3 style="text-align: center;">Resultado da pesquisa : {{$nomeAluno}}</h3><br>
	@if(empty($nomeAluno))
		<div class="container-fluid">
			<div class="alert alert-danger" role="alert">
  				Digite um nome Valido. <br>
				Exemplo: Rui
			</div>
		</div>
	@else
		<ul>
			@if(count($alunos)<=0)
				<div class="alert alert-danger" role="alert">
			 		O resultado da sua pesquisa não foi encontrado.
				</div>
			@else
				@foreach($alunos as $aluno)
				<li>
					<a href="{{route('alunos.showAlunos', ['id'=>$aluno->id_aluno])}}"><h6>{{$aluno->nome}}</h6></a>
				</li>
				@endforeach
			@endif
		</ul>
	@endif
@endsection