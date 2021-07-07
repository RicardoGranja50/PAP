@extends('layout')
@section('titulo')
	Transações de {{$aluno->nome}}
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
<br>

	<h3 style="text-align: center;">Transações de {{$aluno->nome}}</h3><br>
	<div class="container-fluid">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 text-white bg-dark">
					Tipo Transação
				</div>
				<div class="col-md-4 text-white bg-dark">
					Valor
				</div>
				<div class="col-md-4 text-white bg-dark">
					Data/Hora
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="container-fluid">
			<div class="row">
				
				@foreach($mov as $m)
					<div class="col-md-4 text-white bg-secondary">
						{{$m->tipo_movimento}}
					</div>

					@if($m->tipo_movimento=='carregamento')
						<div class="col-md-4 text-success bg-secondary">
							+{{$m->carregamento}}
						</div>
					@else
						<div class="col-md-4 text-danger bg-secondary">
							-{{$m->carregamento}}
						</div>
					@endif

					<div class="col-md-4 text-white bg-secondary">
						{{$m->created_at->format('d/m/Y H:i:s')}}
					</div>
				@endforeach
			</div>
		</div>
	</div><br>{{$mov->render()}}
	<br>
	<div class="container-fluid">
		<a href="{{route('alunos.showAlunos', ['id'=>$aluno->id_aluno,'idt'=>$aluno->id_turma])}}" class="btn btn-primary" style="background-color: #80bfff">Cancelar</a> 
		<a target="_blank" href="{{route('extrato.aluno', ['id'=>$aluno->id_aluno])}}" class="btn btn-primary" style="background-color: #80bfff">Extrato do Aluno</a>
	</div>
@endsection