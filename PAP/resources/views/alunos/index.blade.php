@extends('layout')
@section('titulo')
	Turmas
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
	<br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<h3 style="text-align: center;">10º</h3><br>
					<ul>
					@foreach($decimos as $decimo)
						<li>
							<a href="{{route('alunos.show', ['id'=>$decimo->id_turma])}}"><h5>{{$decimo->nome}}</h5></a>
						</li>
					@endforeach
					</ul>
				</div>
				<div class="col-md-4">
					<h3 style="text-align: center;">11º</h3><br>
					<ul>
					@foreach($decimos1 as $decimo)
						<li>
							<a href="{{route('alunos.show', ['id'=>$decimo->id_turma])}}"><h5>{{$decimo->nome}}</h5></a>
						</li>
					@endforeach
					</ul>
				</div>
				<div class="col-md-4">
					<h3 style="text-align: center;">12º</h3><br>
					<ul>
					@foreach($decimos2 as $decimo)
						<li>
							<a href="{{route('alunos.show', ['id'=>$decimo->id_turma])}}"><h5>{{$decimo->nome}}</h5></a>
						</li>
					@endforeach
					</ul>
				</div>
			</div>
			<div class="container-fluid">
				<a href="{{route('turmas.create')}}" class="btn btn-primary" style="background-color: #80bfff" >Adicionar turma</a>
				<a href="" class="btn btn-primary" style="background-color: #80bfff">Eliminar turma</a>
			</div>
		</div>
	
	
@endsection