@extends('layout')
@section('titulo')
	Alunos
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
	<br>
	<h3 style="text-align: center;">Resultado da pesquisa : {{$nomeAluno}}</h3><br>
	@if(empty($nomeAluno) && $nomeAluno <=0)
		<div class="container-fluid">
			<div class="alert alert-danger" role="alert">
  				Digite um nome Valido. <br>
				Exemplo: Rui
			</div>
		</div>
	@elseif(count($alunos)<=0)
		<div class="alert alert-danger" role="alert">
			O resultado da sua pesquisa não foi encontrado.
		</div>
	@else
		<table class="table">
			<thead class="thead-dark">
				<tr>
				    <th scope="col">Turma</th>
				    <th scope="col">Nome Aluno</th>
				    <th scope="col">Cartao do Aluno</th>
				</tr>
			</thead>
			<tbody>
				@foreach($alunos as $aluno)	
					<tr>
					    <th scope="row"><a href="{{route('alunos.show', ['id'=>$aluno->turma->id_turma])}}"><h6>{{$aluno->turma->nome}}</h6></a> </th>
					    <td><a href="{{route('alunos.showAlunos', ['id'=>$aluno->id_aluno])}}"><h6>{{$aluno->nome}}</h6></a></td>
					    <td>          </td>
					</tr>
				 @endforeach
			</tbody>
		</table>
	@endif
@endsection