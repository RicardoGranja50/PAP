@extends('layout')
@section('titulo')
	Alunos
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
	<br>
	<h3 style="text-align: center;">Alunos</h3><br>
	<ul>
		@foreach($alunos as $aluno)
			<li>
				<a href="{{route('alunos.showAlunos', ['id'=>$aluno->id_aluno])}}"><h6>{{$aluno->nome}}</h6></a>
			</li>
		@endforeach
	</ul>
	<div class="container-fluid">
			<a href="" class="btn btn-primary" style="background-color: #80bfff">Adicionar Aluno</a>
	</div>
@endsection