@extends('layout')
@section('titulo')
	Transações
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
<br>
	<div class="container-fluid">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 text-white bg-dark">
					Nome Aluno
				</div>
				<div class="col-md-2 text-white bg-dark">
					Turma
				</div>
				<div class="col-md-3 text-white bg-dark">
					Tipo Transação
				</div>
				<div class="col-md-2 text-white bg-dark">
					Valor
				</div>
				<div class="col-md-2 text-white bg-dark">
					Data/Hora
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 text-white bg-secondary">
					&nbsp
				</div>
				@foreach($mov as $m)
					<div class="col-md-3 text-white bg-secondary">
						{{$m->alunos->nome}}
					</div>
					<div class="col-md-2 text-white bg-secondary">
						{{$m->alunos->turma->ano}}{{$m->alunos->turma->curso_abreviacao}}
					</div>
					<div class="col-md-3 text-white bg-secondary">
						{{$m->tipo_movimento}}
					</div>

					@if($m->tipo_movimento=='carregamento')
						<div class="col-md-2 text-success bg-secondary">
							+{{$m->carregamento}}
						</div>
					@else
						<div class="col-md-2 text-danger bg-secondary">
							-{{$m->carregamento}}
						</div>
					@endif

					<div class="col-md-2 text-white bg-secondary">
						{{$m->created_at->format('d/m/Y H:i:s')}}
					</div>
				@endforeach
				
			</div>
		</div>
	</div><br>{{$mov->render()}}
	<br>
	<a href="{{route('alunos.index')}}" class="btn btn-primary" style="background-color: #80bfff">Cancelar</a>
@endsection